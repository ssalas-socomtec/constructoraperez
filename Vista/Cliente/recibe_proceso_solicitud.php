<?php
   require_once("../../Controlador/solicitud_proyecto.controlador.php");
   require_once("../../Modelo/solicitud_proyecto.modelo.php");
   require_once("../../Conexion/db.php");

   $idSolicitudProyecto = $_POST['idProyecto'];

   echo json_encode(Buscar_Proceso_Solicitud($idSolicitudProyecto));

?>