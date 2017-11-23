<?php 

	require_once("../Modelo/usuario.modelo.php");

	function Agregar_Usuario($Run, $PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $FkTipoUsuario){

		$Modelo_Usuario = new Usuario_Modelo;
		$Datos = $Modelo_Usuario->Insertar_Usuario($Run, $PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $FkTipoUsuario);

	}

	function Verificar_Usuario($Correo, $Contrasena){

		$Modelo_Usuario = new Usuario_Modelo;
		$Datos = $Modelo_Usuario->Buscar_Usuario($Correo, $Contrasena);
		return $Datos;

	}

	function Modificar_Usuario($PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $Run){

		$Modelo_Usuario = new Usuario_Modelo;
		$Datos = $Modelo_Usuario->Editar_Usuario($PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $Run);

	}



?>