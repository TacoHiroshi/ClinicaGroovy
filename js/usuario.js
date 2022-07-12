function Iniciar_Sesion(){
    rememberMe();
    let usuario = document.getElementById('text_usuario').value;
    let password = document.getElementById('text_contrasena').value;
    if (usuario.length ==0 || password.length == 0){
        return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertenci',
            text: 'Debe ingresar los campos requeridos',
            heightAuto: false
          });
    }
    mail_rex=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
    pass_rex=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/
	if(!mail_rex.exec(usuario)){
        return Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Datos Incorrectos:Correo',
            heightAuto: false
          });
    }
    if(!pass_rex.exec(password)){
        return Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Datos Incorrectos:Pass',
            heightAuto: false
          });
    }
    $.ajax({
        url: 'control/user/iniciar_sesion.php',
        type: 'POST',
        data:{
            u:usuario,
            p:password
        }
    }).done(function(response){
        let data = JSON.parse(response);
        if(data.length>0){
            /*if(data[0][4]=='INACTIVO'){
                return Swal.fire('Mensaje de Advertencia','Lo sentimos tu usuario no esta HABILITADO.Comuniquese con el Administrador','warning')
            }*/
            for(var i=0; i<data.length; i++){
                console.log(data[0][i]);
               }
            $.ajax({
                url: 'control/user/crear_sesion.php',
                type: 'POST',
                data: {
                    idusuario:data[0][0],
                    usuario:data[0][1],
                    rol:data[0][6],
                    nrol:data[0][3]

                }
            }).done(function(r){
                Swal.fire({
                  icon: 'success',
                  title: 'Acceso Correcto',
                  text: 'Bienvenido '+data[0][6]+' '+data[0][1],
                  timer: 2000, 
                  allowOutsideClick: false,
                  heightAuto: false,
                  didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                      b.textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.timer) {
                    location.reload();
                  }
                })    
            })
        }
        else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Datos Incorrectos',
                heightAuto: false
              });
        }
    })

}

function rememberMe(){
    if(rmcheck.checked && usuarioinput.value!=="" && passinput.value!==""){
        localStorage.usuario = usuarioinput.value;
        localStorage.pass = passinput.value;
        localStorage.checkbox = rmcheck.value;
    }else{
        localStorage.usuario = "";
        localStorage.pass = "";
        localStorage.checkbox = "";
    }
}
var tbl_listar_usuario;
function listar_usuario(){
    tbl_listar_usuario = $("#tabla_usuario").DataTable({
        "ordering":false,
        "bLengthChange":true,
        "searching": {"regex": false},
        "lengthMenu": [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax":{
            "url":"../control/user/control_listar_usuario.php",
            type:'POST'
            
        },
        "columns":[
            {"defaultContent":"usu_id"},
            {"data":"usu_nombre"},
            {"data":"usu_email"},
            {"data":"rol_nombre"},
            {"data":"editar",
                render: function(data,type,row){
                    return "<button class='editar btn btn-primary'><i class='fa fa-edit'></i></button>"; }
                }
           
           
        ]
    });
    tbl_listar_usuario.on('draw.td',function(){
        var PageInfo = $("#tabla_usuario").DataTable().page.info();
        tbl_listar_usuario.column(0, {page: 'current'}).nodes().each(function(cell, i){
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });


}
$('#tabla_usuario').on('click','.editar',function(){
    var data = tbl_listar_usuario.row($(this).parents('tr')).data();

    if(tbl_listar_usuario.row(this).child.isShown()){
        var data = tbl_listar_usuario.row(this).data();
    }
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_editar_usuario").modal('show');
    document.getElementById('txt_idusuario_edit').value=data["usu_id"];
    document.getElementById('txt_usuario_edit').value=data["usu_nombre"];
    document.getElementById('txt_email_edit').value=data["usu_email"];

    $("#select_rol_edit").select2().val(data["rol_nombre"]).trigger('change.select2');
})

function AbrirModalRegistroUsuario(){
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#Modal_registro_usuario").modal({backdrop:'static',keyboard:false})
    $("#Modal_registro_usuario").modal('show');
    

}
function Cargar_rol(){
    $.ajax({
        url:'../control/user/cargar_rol.php',
        type:'POST'
    }).done(function(resp){
      let data = JSON.parse(resp);
      let llenardato = "";
      if(data.length>0){
        for (let i = 0; i < data.length; i++) {
            llenardato += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
        }
        document.getElementById('select_rol').innerHTML=llenardato;
        document.getElementById('select_rol_edit').innerHTML=llenardato;
      }else{
        llenardato+= "<option value=''>No se encontraron datos en la BD</option>";
        document.getElementById('select_rol').innerHTML=llenardato;
        document.getElementById('select_rol_edit').innerHTML=llenardato;
      }
    })
}
function registrarusuario(){
    let usuario = document.getElementById('txt_usuario').value;
    let contra  = document.getElementById('txt_contra').value;
    let email   = document.getElementById('txt_email').value;
    let rol     = document.getElementById('select_rol').value;
    if(usuario.length==0 || contra.length==0 || email.length==0 || rol.length==0){
        validar_registro("txt_usuario", "txt_contra", "txt_email");
        return Swal.fire("Mensaje de Advertencia","Tiene algunos campos vacios","warning");
    }
    if(validar_emailR(email)){

    }else{
        return Swal.fire("Mensaje de advertencia", "El formato del correo es incorrecto", "warning");
    }

    let formData = new FormData();
    formData.append('u',usuario);
    formData.append('c',contra);
    formData.append('e',email);
    formData.append('r',rol);

    $.ajax({
        url:'../control/user/registrar_usuario.php',
        type:'POST',
        data:formData,
        contentType:false,
        processData:false,
        success: function(resp){
            if(resp>0){
                if(resp==1){
                    validar_registro("txt_usuario", "txt_contra", "txt_email");
                    limpiarmodalusu();
                    Swal.fire("Mensaje de Confirmacion","Nuevo usuario registrado","success").
                    then((value)=>{
                        tbl_listar_usuario.ajax.reload();
                    });

                }else{
                    Swal.fire("Mensaje de Advertencia","El usuario ingresado ya se encuentra registrado","warning")
                }

            }else{
                Swal.fire("Mensaje de Error", "No se pudo registrar al usuario","error")
            }
        }
    });
    return false;
}

function validar_registro(usuario, contra, email){
    Boolean(document.getElementById(usuario).value.length>0) ? $("#"+usuario).removeClass("is-invalid").addClass
    ("is-valid") : $("#"+usuario).removeClass("is-valid").addClass("is-invalid");
    if(contra != ""){
        Boolean(document.getElementById(contra).value.length>0) ? $("#"+contra).removeClass("is-invalid").addClass
    ("is-valid") : $("#"+contra).removeClass("is-valid").addClass("is-invalid");
    }
    
    Boolean(document.getElementById(email).value.length>0) ? $("#"+email).removeClass("is-invalid").addClass
    ("is-valid") : $("#"+email).removeClass("is-valid").addClass("is-invalid");
}

function validar_emailR(email){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}
function limpiarmodalusu(){
    document.getElementById('txt_usuario').value="";
    document.getElementById('txt_contra').value="";
    document.getElementById('txt_email').value="";
 
}

function modificar_usuario(){
    let id = document.getElementById('txt_idusuario_edit').value;
    let rol = document.getElementById('select_rol_edit').value;
    let email   = document.getElementById('txt_email_edit').value;
    if(rol.length==0 || email.length==0 || id.length==0){
        validar_registro("txt_usuario_edit", "","txt_email_edit");
        return Swal.fire("Mensaje de Advertencia","Tiene algunos campos vacios","warning");
    }
    if(validar_emailR(email)){

    }else{
        return Swal.fire("Mensaje de advertencia", "El formato del correo es incorrecto", "warning");
    }
    $.ajax({
        url:'../control/user/control_mod_usuario.php',
        type:'POST',
        data:{
            id:id,
            rol:rol,
            email:email
        }
    }).done(function(resp){
        if(resp>0){
                Swal.fire("Mensaje de Confirmacion","Datos Actualizados correctamente","success").
                then((value)=>{
                    tbl_listar_usuario.ajax.reload();
                });

        }else{
            Swal.fire("Mensaje de Error", "No se pudo actualizar los datos","error")
        }
    })
}