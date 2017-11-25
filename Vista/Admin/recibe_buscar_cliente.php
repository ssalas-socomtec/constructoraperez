<?php
    require_once('../../Controlador/usuario.controlador.php');
    require_once('../../Modelo/usuario.modelo.php');
    require_once('../../Conexion/db.php');

    $runUsuario = $_POST['runCliente'];

    echo json_encode(Buscar_Cliente($runUsuario));


?>