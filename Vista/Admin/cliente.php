<?php 
    require_once("../../Controlador/usuario.controlador.php");
    require_once("../../Modelo/usuario.modelo.php");
    require_once("../../Conexion/db.php");
?>

<!DOCTYPE html>
<html lang="es">
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

            $(".editarUsuarioBtn").click(function(){

                var Run = $(this).attr('value'); 
                var datos = new FormData();
                datos.append('runCliente', Run);
                    $.ajax({

                        async: false,
                        type: 'POST',
                        url: 'recibe_buscar_cliente.php',
                        data: datos,
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: 'json',
                        success: function(data){
                            $("#runUsuarioInput").val(data[0].runU);
                            $("#primerNombreInput").val(data[0].primerNombreU);
                            $("#segundoNombreInput").val(data[0].segundoNombreU);
                            $("#apellidoPaternoInput").val(data[0].apellidoPaternoU);
                            $("#apellidoMaternoInput").val(data[0].apellidoMaternoU);
                            $("#telefonoInput").val(data[0].telefonoU);
                            $("#correoInput").val(data[0].correoU);
                            $("#direccionInput").val(data[0].direccionU);
                            $("#editarUsuarioModal").modal('show');
                        } //Cierre de Success
                    }); //Cierre del Ajax

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
                        <td><?php echo $Cliente['COMUNA_NOMBRE']; ?> </td>
                        <td>
                            <div class="row">
                                <div>
                                    <button  class="editarUsuarioBtn btn btn-warning" value=<?php echo $Cliente['runU']; ?> ><i class="fa fa-pencil" aria-hidden="true"></i> </button>
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
        
        <div id="editarUsuarioModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h5 class="modal-title">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="runUsuarioInput">Run:</label>
                                    <input type="text" class="form-control" id="runUsuarioInput">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="primerNombreInput">Primer Nombre:</label>
                                    <input type="text" class="form-control" id="primerNombreInput">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="segundoNombreInput">Segundo Nombre:</label>
                                    <input type="text" class="form-control" id="segundoNombreInput">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="apellidoPaternoInput">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="apellidoPaternoInput">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="apellidoMaternoInput">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="apellidoMaternoInput">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="generoSelect">Género:</label>
                                    <select id="generoSelect" class="form-control">
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="telefonoInput">Teléfono:</label>
                                    <input type="text" class="form-control" id="telefonoInput">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="CorreoInput">Correo:</label>
                                    <input type="text" class="form-control" id="correoInput">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="direccionInput">Dirección:</label>
                                    <input type="text" class="form-control" id="direccionInput">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="regionSelect">Región:</label>
                                    <select id="regionSelect" class="form-control">
                                        <option>Maule</option>
                                        <option>Ñuble</option>
                                        <option>Bio-Bio</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="provinciaSelect">Provincia:</label>
                                    <select id="provinciaSelect" class="form-control">
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="ciudadSelect">Ciudad:</label>
                                    <select id="ciudadSelect" class="form-control">
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-3">
                                    <label for="generoSelect">Estado Usuario:</label>
                                    <select id="generoSelect" class="form-control">
                                        <option>Activo</option>
                                        <option>Desactivado</option>
                                       
                                    </select>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-warning">Editar</button>
                    </div>
                </div>
            </div>
        </div> <!-- Cierre del Modal Editar -->
    </div> <!-- Cierre del Container-Fluid -->
    
</body>
</html>