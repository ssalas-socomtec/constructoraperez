<?php

    require_once("../Controlador/usuario.controlador.php");
    require_once("../Modelo/usuario.modelo.php");
    require_once("../Conexion/db.php");

    $Correo = $_POST['correoUsuario'];
    $Contrasena = $_POST['contrasenaUsuario'];

    session_start();
    
    $Consulta = Verificar_Usuario($Correo, $Contrasena);

    if(!empty($Consulta)){

        foreach($Consulta AS $Usuario){

            $_SESSION['id'] = $Usuario['runU'];
            $_SESSION['primerNombre'] = $Usuario['primerNombreU'];
            $_SESSION['segundoNombre'] = $Usuario['segundoNombreU'];
            $_SESSION['apellidoPaterno'] = $Usuario['apellidoPaternoU'];
            $_SESSION['apellidoMaterno'] = $Usuario['apellidoMaternoU'];
            $_SESSION['telefono'] = $Usuario['telefonoU'];
            $_SESSION['correo'] = $Usuario['correoU'];
            $_SESSION['ciudad'] = $Usuario['fkComuna'];
            $_SESSION['direccion'] = $Usuario['direccionU'];
            $_SESSION['sexo'] = $Usuario['fkGenero'];
            $_SESSION['tipoUsuario'] = $Usuario['fkTipoUsuario'];
            
            switch($Usuario['fkTipoUsuario']){

                case 1 : echo json_encode("Admin/index.php");
                        break;
                        
                case 2 :  echo json_encode("index.php");
                        break;
            }    
              
        }

    }else{

        echo json_encode("Error al iniciar sesion");
    }
?>