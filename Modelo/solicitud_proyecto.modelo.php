<?php

    class Solicitud_Proyecto_Modelo{
        
        private $db;
        
        private $datos;
        
        
        public function __construct(){
            
            $this->db=Conectar::Conexion();
            
            $this->datos=array();
        }

        public function Eliminar_Solicitud_Proyecto($estadoProyecto, $id){
            
            $consulta=$this->db->prepare("UPDATE solicitudproyecto SET fkEstadoProyecto = '$estadoProyecto' WHERE idSolicitudProyecto = '$id'" );
        
            $consulta->execute();
            
                        
        }

        public function Insertar_Solicitud_Proyecto($FkUsuario, $Fecha, $FkProyecto, $fkEstadoProyecto){
            
            $consult = $this->db->prepare("INSERT INTO solicitudproyecto(fkUsuario, fechaSP, fkProyecto, fkEstadoProyecto) VALUES(?, ?, ?, ?)");
            
            $consult->bind_param('ssii', $FkUsuario, $Fecha, $FkProyecto, $fkEstadoProyecto);

            $consult->execute();
        
        }

        public function Buscar_Solicitud_Cliente($Run){

            $consulta = $this->db->query("SELECT * FROM solicitudproyecto INNER JOIN proyecto ON solicitudproyecto.fkProyecto = proyecto.idProyecto INNER JOIN tipoproyecto ON proyecto.fkTipoProyecto = tipoproyecto.idTipoProyecto INNER JOIN estadoproyecto ON solicitudproyecto.fkEstadoProyecto = estadoproyecto.idEstadoProyecto WHERE solicitudproyecto.fkUsuario = '$Run'");
                
                while($filas=$consulta->fetch_assoc()){
                                
                    $this->datos[]=$filas;
                                
                }
                                
                return $this->datos;

            }

            public function Buscar_Proceso_Solicitud($idProcesoSolicitud){
                
                $consulta = $this->db->query("SELECT * FROM procesosolicitudproyecto INNER JOIN estadoproyecto ON estadoproyecto.idEstadoProyecto = procesosolicitudproyecto.fkEstadoProyecto WHERE fkSolicitudProyecto = '$idProcesoSolicitud'");
                                
                    while($filas=$consulta->fetch_assoc()){
                                                
                        $this->datos[]=$filas;
                                                
                    }
                                                
                        return $this->datos;
                
            }

            public function Insertar_Proceso_Solicitud($id, $detalle, $fecha, $estadoSolicitud){

                $consult = $this->db->prepare("INSERT INTO procesosolicitudproyecto(fkSolicitudProyecto, detallePSP, fechaPSP, fkEstadoProyecto) VALUES(?, ?, ?, ?)");
                
                $consult->bind_param('issi', $id, $detalle, $fecha, $estadoSolicitud);
    
                $consult->execute();

            }

            public function Listar_Solicitudes(){

                $consulta = $this->db->query("SELECT * FROM solicitudproyecto INNER JOIN estadoproyecto ON fkEstadoProyecto = idEstadoProyecto INNER JOIN proyecto ON proyecto.idProyecto = solicitudproyecto.fkProyecto INNER JOIN tipoproyecto ON tipoproyecto.idTipoProyecto = proyecto.fkTipoProyecto INNER JOIN usuario ON solicitudproyecto.fkUsuario = usuario.runU");

                    while($filas=$consulta->fetch_assoc()){
                    
                        $this->datos[]=$filas;
                    
                    }
                    
                    return $this->datos;   
            }
            

        
    }

?>