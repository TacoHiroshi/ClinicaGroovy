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