<?php 
    require_once("../../Controlador/usuario.controlador.php");
    require_once("../../Modelo/usuario.modelo.php");
    require_once("../../Conexion/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="../JS/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <title>Constructora Perez</title>

    <script>
        $(document).ready(function(){

            $(".eliminarUsuarioBtn").click(function(){

                $('#eliminarUsuarioModal').modal('show');

            });

            

        });
    </script>
</head>
<body>

    <div class="container-fluid">
        <h2>Clientes</h2>
        <hr>
        <br />

        <table class="table">
            <thead class="thead-dark"> 
                <tr>
                    <th>Run</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Ciudad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(Listar_Cliente() AS $Cliente){ ?>
                    <tr >
                        <td><?php echo $Cliente['runU']; ?> </td>
                        <td><?php echo $Cliente['primerNombreU'] ." " .$Cliente['apellidoPaternoU']; ?> </td>
                        <td><?php echo $Cliente['telefonoU']; ?> </td>
                        <td><?php echo $Cliente['correoU']; ?> </td>
                        <td><?php echo $Cliente['fkCiudad']; ?> </td>
                        <td>
                            <div class="row">
                                <div>
                                    <button  class="editarUsuarioBtn btn btn-warning" ><i class="fa fa-pencil" aria-hidden="true"></i> </button>
                                </div>
                                <div >
                                    <button class="eliminarUsuarioBtn btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </div>
                                <div>
                                    <button class="verUsuarioBtn btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table> <!-- Cierre de la Tabla Cliente -->

        <div id="eliminarUsuarioModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Eliminar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Realmente desea eliminar al usuario?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </div>
        </div> <!-- Cierre del Modal Eliminar Usuario -->

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    ...
                </div>
            </div>
        </div> <!-- Cierre del Modal Editar -->
    </div> <!-- Cierre del Container-Fluid -->
    
</body>
</html>