<?php

    require_once("../../Controlador/solicitud_proyecto.controlador.php");
    require_once("../../Modelo/solicitud_proyecto.modelo.php"); 
    require_once("../../Conexion/db.php");
    date_default_timezone_set('America/Santiago');

    $id = $_POST['idProyecto'];
    

    $estadoSolicitudEliminacion = 5;
    $detalleEliminacion = "La solicitud fue eliminada por el Usuario";
    $fechaEliminacion = date("Y-m-d");

    Eliminar_Solicitud($estadoSolicitudEliminacion, $id);
    
    Agregar_Proceso_Solicitud($id, $detalleEliminacion, $fechaEliminacion, $estadoSolicitudEliminacion);
    
    echo "1";


?>