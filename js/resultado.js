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
            {"data":5},
            
            {"data":6,
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

$('#tabla_usuario').on('click','.descargar',function(){
    var data = tbl_listar_paciente.row($(this).parents('tr')).data();

    if(tbl_listar_paciente.row(this).child.isShown()){
        var data = tbl_listar_paciente.row(this).data();
    }
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_editar_usuario").modal('show');
    document.getElementById('txt_usuario_edit').value=data[1];
    document.getElementById('txt_email_edit').value=data[6];
    
    document.getElementById('txt_idusuario_edit').value=data[0];

    $("#select_rol_edit").val(data[3]).trigger("change"); 
})