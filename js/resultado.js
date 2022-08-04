var tbl_listar_paciente;
function listar_paciente_serverside(){
    tbl_listar_paciente = $("#tabla_usuario").DataTable({
        "pageLength": 10,
        "destroy": true,
        "bProcessing": true,
        "bDeferRender": true,
        "bServerSide": true,
        "sAjaxSource": "../control/user/serverside/serversideResu.php",
        "columns":[
            {"defaultContent":""},
            {"data":0},
            {"data":1},
            {"data":2},
            {"data":3},
            {"data":4},
            {"data":7},
            
            {"data":8,
                render: function(data,type,row){
                    return "<button class='descargar btn btn-sm btn-primary'><i class='fa fa-download'></i></button>&nbsp<button class='enviar btn btn-sm btn-orange'><i class='fa fa-envelope'></i></button>";
        
                }
                }
           
           
        ]
    });
    tbl_listar_paciente.on('draw.td',function(){
        var PageInfo = $("#tabla_usuario").DataTable().page.info();
        tbl_listar_paciente.column(0, {page: 'current'}).nodes().each(function(cell, i){
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });


}

function listar_pacienteJ_serverside(){
    tbl_listar_pacienteJ = $("#tabla_usuario").DataTable({
        "pageLength": 10,
        "destroy": true,
        "bProcessing": true,
        "bDeferRender": true,
        "bServerSide": true,
        "sAjaxSource": "../control/user/serverside/serversideResu.php",
        "columns":[
            {"defaultContent":""},
            {"data":0},
            {"data":1},
            {"data":2},
            {"data":3},
            {"data":4},
            {"data":5},
            {"data":6},
            {"data":7},
            
            {"data":8,
                render: function(data,type,row){
                    return "<button class='descargar btn btn-sm btn-primary'><i class='fa fa-download'></i></button>&nbsp<button class='enviar btn btn-sm btn-orange'><i class='fa fa-envelope'></i></button>";
        
                }
                }
           
           
        ]
    });
    tbl_listar_pacienteJ.on('draw.td',function(){
        var PageInfo = $("#tabla_usuario").DataTable().page.info();
        tbl_listar_pacienteJ.column(0, {page: 'current'}).nodes().each(function(cell, i){
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

$('#tabla_usuario').on('click','.descargar',function(){
    var data = tbl_listar_paciente.row($(this).parents('tr')).data();

    if(tbl_listar_paciente.row(this).child.isShown()){
        var data = tbl_listar_paciente.row(this).data();
    }
    for (i=0; i<data.length; i++){
        console.log(i+','+data[i]);
    }
    localStorage.clear();
    localStorage.setItem('resultadosarray', JSON.parse(data[9]));
    localStorage.setItem('apepaterno', data[1]);
    localStorage.setItem('apematerno', data[2]);
    localStorage.setItem('nombre', data[3]);
    localStorage.setItem('sexo', data[12]);
    localStorage.setItem('dni', data[0]);
    localStorage.setItem('tipodedad', data[14]);
    localStorage.setItem('edad', data[13]);
    localStorage.setItem('examen_id', data[8]);
    localStorage.setItem('examenes_agregados', JSON.parse(data[10]));
    localStorage.setItem('fecha_examen', data[4]);
    localStorage.setItem('hora_examen', data[11]);

    cargar_contenido('contenido_principal','../vista/examenes/ex_impresion_guardado.php');
    //$('.form-control').removeClass("is-invalid").removeClass("is-valid");
    
    /*
    document.getElementById('txt_usuario_edit').value=data[1];
    document.getElementById('txt_email_edit').value=data[6];
    
    document.getElementById('txt_idusuario_edit').value=data[0];

    $("#select_rol_edit").val(data[3]).trigger("change"); 
    */
})