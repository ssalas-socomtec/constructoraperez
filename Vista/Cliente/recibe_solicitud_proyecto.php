<?php

    require_once("../../Modelo/solicitud_proyecto.modelo.php");
    require_once("../../Controlador/solicitud_proyecto.controlador.php");
    require_once("../../Conexion/db.php");

    session_start();
    date_default_timezone_set('America/Santiago');
    $usuario = $_SESSION['id'];
    $idProyecto = $_POST['idProyecto'];
    $fecha = date("Y-m-d");

    Agregar_Solicitud_Proyecto($usuario, $fecha, $idProyecto, 1);

    echo 1;
?>