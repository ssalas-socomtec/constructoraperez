<?php 

	

	function Agregar_Usuario($Run, $PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $FkTipoUsuario){

		$Modelo_Usuario = new Usuario_Modelo;
		$Datos = $Modelo_Usuario->Insertar_Usuario($Run, $PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $FkTipoUsuario);

	}

	function Verificar_Usuario($Correo, $Contrasena){

		$Modelo_Usuario = new Usuario_Modelo;
		$Datos = $Modelo_Usuario->Verificar_Usuario($Correo, $Contrasena);
		return $Datos;

	}

	function Modificar_Usuario($PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $Run){

		$Modelo_Usuario = new Usuario_Modelo;
		$Datos = $Modelo_Usuario->Editar_Usuario($PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $Run);

	}

	function Listar_Cliente(){
		
		$Modelo_Usuario = new Usuario_Modelo;
		$Datos = $Modelo_Usuario->Listar_Cliente();
		return $Datos;
		
	}

	function Buscar_Cliente($Run){
		$Modelo_Usuario = new Usuario_Modelo;
		$Datos = $Modelo_Usuario->Buscar_Cliente($Run);
		return $Datos;

	}



?>