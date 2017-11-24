<?php

class Usuario_Modelo{
	
	private $db;
	
	private $datos;
	
	
	public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

	public function Insertar_Administrador_Zona($Run, $PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $FkTipoUsuario){
		
		$consult = $this->db->prepare("INSERT INTO usuario (runU, primerNombreU, segundoNombreU, apellidoPaternoU, apellidoMaternoU, telefonoU, correoU, fkCiudad, direccionU, fkGenero, contrasenaU, fkTipoUsuario) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		
		$consult->bind_param('sssssisisisi', $Run, $PrimerNombre, $SegundoNombre, $ApellidoPaterno, $ApellidoMaterno, $Telefono, $Correo, $FkCiudad, $Direccion, $fkGenero, $Contrasena, $FkTipoUsuario);

		$consult->execute();
	
	}

	public function Buscar_Usuario($Correo, $Contrasena){

		$consulta = $this->db->query("SELECT * FROM usuario WHERE usuario.correoU = '$Correo' AND usuario.contrasenaU = '$Contrasena'");

		while($filas=$consulta->fetch_assoc()){
				
			$this->datos[]=$filas;
				
		}
				
			return $this->datos;

	}

	public function Listar_Cliente(){
		
				$consulta = $this->db->query("SELECT * FROM usuario WHERE usuario.fkTipoUsuario = 2");
		
				while($filas=$consulta->fetch_assoc()){
						
					$this->datos[]=$filas;
						
				}
						
					return $this->datos;
		
			}

}