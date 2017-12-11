<?php 



	function Agregar_Solicitud_Proyecto($FkUsuario, $Fecha, $FkProyecto, $fkEstadoProyecto){
		$Modelo_Solicitud_Proyecto = new Solicitud_Proyecto_Modelo;
		$Datos = $Modelo_Solicitud_Proyecto->Insertar_Solicitud_Proyecto($FkUsuario, $Fecha, $FkProyecto, $fkEstadoProyecto);
  }

  function Buscar_Solicitudes_Cliente($Run){
		$Modelo_Solicitud_Proyecto = new Solicitud_Proyecto_Modelo;
		$Datos = $Modelo_Solicitud_Proyecto->Buscar_Solicitud_Cliente($Run);
		return $Datos;
	}

	function Eliminar_Solicitud($fkEstadoProyecto, $idSolicitud){

		$Modelo_Solicitud_Proyecto = new Solicitud_Proyecto_Modelo;
		$Datos = $Modelo_Solicitud_Proyecto->Eliminar_Solicitud_Proyecto($fkEstadoProyecto, $idSolicitud);

	}

	function Buscar_Proceso_Solicitud($idSolicitudCLiente){

		$Modelo_Solicitud_Proyecto = new Solicitud_Proyecto_Modelo;
		$Datos = $Modelo_Solicitud_Proyecto->Buscar_Proceso_Solicitud($idSolicitudCLiente);
		return $Datos;

	}

	function Agregar_Proceso_Solicitud($id, $detalle, $fecha, $estadoSolicitud){

		$Modelo_Solicitud_Proyecto = new Solicitud_Proyecto_Modelo;
		$Datos = $Modelo_Solicitud_Proyecto->Insertar_Proceso_Solicitud($id, $detalle, $fecha, $estadoSolicitud);
		return $Datos;

	}

	function Listar_Solicitudes(){
		$Modelo_Solicitud_Proyecto = new Solicitud_Proyecto_Modelo;
		$Datos = $Modelo_Solicitud_Proyecto->Listar_Solicitudes();
		return $Datos;
	}

?>