<script src="../js/usuario.js?rev=<?php echo time(); ?>"></script>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Gestion de Usuarios</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Principal</li>
            </ol>
          </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Listado de Usuarios</b></h5>
            <button class="btn btn-danger btn-sm float-right" onclick="AbrirModalRegistroUsuario()"><i class="fa fa-plus"></i> Nuevo Registro</button>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="tabla_usuario" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
        
    </div>

</div>
<!--Inicio Modal -->
<div class="modal fade" id="Modal_registro_usuario" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <label for="">Apellido Paterno</label>
                <input type="text" id="txt_appaterno" class="form-control">   
            </div>
            <div class="col-6">
                <label for="">Apellido Materno</label>
                <input type="text" id="txt_apmaterno" class="form-control">   
            </div>
            <div class="col-12">
                <label for="">Nombre Completo</label>
                <input type="text" id="txt_usuario" class="form-control">   
            </div>
            <div class="col-6">
                <label for="">DNI</label>
                <input type="text" id="txt_dni" class="form-control">   
            </div>
            <div class="col-6">
                <label for="">Num. de Celular</label>
                <input type="text" id="txt_celular" class="form-control">   
            </div>
            <div class="col-12">
                <label for="">Email</label>
                <input type="text" id="txt_email" class="form-control">
            </div>
            <div class="col-12">
                <label for="">Contraseña</label>
                <input type="password" id="txt_contra" class="form-control">
            </div>
            <div class="col-12">
                <label for="">Rol</label>
                <select class="js-example-basic-single" id="select_rol" style="width:100%"></select>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="registrarusuario()">Registrar</button>
      </div>
    </div>
  </div>
</div>
<!--fin modal-->
<!--Ini modal editar-->
<div class="modal fade" id="modal_editar_usuario" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Datos de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Usuario</label>
                <input type="text" id="txt_idusuario_edit" hidden>
                <input type="text" id="txt_usuario_edit" class="form-control" disabled>  
                
            </div>
            <div class="col-12">
                <label for="">Email</label>
                <input type="text" id="txt_email_edit" class="form-control">
            </div>
            <div class="col-12">
                <label for="">Rol</label>
                <select class="js-example-basic-single" id="select_rol_edit" style="width:100%"></select>
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="modificar_usuario()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<!--fin modal-->
<!--Ini modal editar-->
<div class="modal fade" id="modal_cambiar_contrasena" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Contraseña de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Usuario</label>
                <input type="text" id="text_idusuariocontra" hidden>
                <input type="text" id="text_usuariocontra" class="form-control" disabled>
            </div>
            <div class="col-12">
                <label for="">Contraseña Nueva</label>
                <input type="text" id="txt_contra_nueva" class="form-control" >  
            </div>
            <div class="col-12">
                <label for="">Repetir Contraseña </label>
                <input type="text" id="txt_contra_nueva_re" class="form-control">  
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="modificar_contra()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<!--fin modal-->
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
listar_usuario_serverside();
Cargar_rol();
</script>