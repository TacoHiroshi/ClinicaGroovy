<?php
require 'serverside.php';
$table_data->getObtnerListadoUsario('view_listar_usuario','usu_id',array('usu_id','per_nombre','usu_contrasena','rol_id','rol_nombre','usu_status','per_email','usu_foto'));

?>
