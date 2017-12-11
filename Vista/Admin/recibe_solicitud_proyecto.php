<?php

    require_once("../../Modelo/solicitud_proyecto.modelo.php");
    require_once("../../Controlador/solicitud_proyecto.controlador.php");
    require_once("../../Conexion/db.php");

    echo json_encode(Listar_Solicitudes());

?>