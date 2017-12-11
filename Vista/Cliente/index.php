<?php 

require_once("../../Modelo/solicitud_proyecto.modelo.php");
require_once("../../Controlador/solicitud_proyecto.controlador.php");
require_once("../../Conexion/db.php");
session_start();
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

                var solicitud;
                var fecha;

                $(".verSolicitudButton").click(function(){
                   
                    var numeroSolicitud= $(this).parents("tr").find("td").eq(0).html();
                    numeroSolicitud = numeroSolicitud.replace('#', '' );
                    solicitud = parseInt(numeroSolicitud);
                    $("#tituloVerSolicitudModal").text("Solicitud N° " + numeroSolicitud);

                    var datos = new FormData();
                    datos.append('idProyecto', solicitud);
                    $(".tr").remove();
                    $.ajax({
                        
                        async: false,
                        type: 'POST',
                        url: 'recibe_proceso_solicitud.php',
                        data: datos,
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: 'json',
                        success: function(data){
                            var tr;
                           $.each(data, function(index){
                                var fechaSolicitud = data[index].fechaPSP.split("-");
                               tr += "<tr class='tr'>";
                               tr += "<td>" + fechaSolicitud[2] + "/" +  fechaSolicitud[1] + "/" + fechaSolicitud[0]  + "</td>";
                               tr += "<td>" + data[index].descripcionEP + "</td>";
                               tr += "<td>" + data[index].detallePSP + "</td>";
                               tr += "</tr>";
              
                           });

                           $("#datos").html(tr);
                            
                        } //Cierre de Success
                    }); //Cierre del Ajax

                    $("#verSolicitudModal").modal('show');
                });

                $(".eliminarSolicitudButton").click(function(){
                    
                    var numeroSolicitud= $(this).parents("tr").find("td").eq(0).html();
                    fecha = $(this).parents("tr").find("td").eq(1).html();

                    numeroSolicitud = numeroSolicitud.replace('#', '' );
                    solicitud = parseInt(numeroSolicitud);
                    $("#tituloEliminarSolicitudModal").text("Eliminar Solicitud N° " + numeroSolicitud);
                    $("#eliminarSolicitudModal").modal('show');
                   
                   
                });
                
                $("#eliminarButton").click(function(){
                    
                    var fechaCreacion = fecha.replace(' ', '');
                    var datos = new FormData();
                    datos.append('idProyecto', solicitud);
                    datos.append('fecha', fechaCreacion);

                    $.ajax({

                        async: false,
                        type: 'POST',
                        url: 'recibe_eliminacion_solicitud.php',
                        data: datos,
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: 'json',
                        success: function(data){

                            if(data == 1){

                                location.reload();
                                
                            }
                              
                        } //Cierre de Success
                    }); //Cierre del Ajax
                    
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <table class="table">
                <thead class="thead-dark text-center">
                    <th>Número Solicitud</th>
                    <th>Fecha Solicitud</th>
                    <th>Nombre Proyecto</th>
                    <th>Tipo Proyecto</th>
                    <th>Valor UF</th>
                    <th>Estado Solicitud</th>
                    <th>Acciones</th>

                </thead>
                <tbody class="text-center">
                <?php foreach(Buscar_Solicitudes_Cliente($_SESSION['id']) AS $Solicitud){ ?>
                    <tr>
                        <td>#<?php echo $Solicitud['idSolicitudProyecto']; ?> </td>
                        <td><?php 
                        $fecha = explode("-",  $Solicitud['fechaSP']);
                        echo $fecha[2] ."/" .$fecha[1] ."/" .$fecha[0]; ?> </td>
                        <td><?php echo $Solicitud['nombreP']; ?> </td>
                        <td><?php echo $Solicitud['descripcionTP']; ?> </td>
                        <td><?php echo $Solicitud['valorP']; ?> </td>
                        <td><?php echo $Solicitud['descripcionEP']; ?> </td>
                        <td>
                            
                            <button class="btn btn-success verSolicitudButton" ><i class="fa fa-eye" aria-hidden="true"></i></button>
                            
                            <?php if($Solicitud['descripcionEP'] != "Eliminada" && $Solicitud['descripcionEP'] != "Pago" &&  $Solicitud['descripcionEP'] != "Finalizada" ){ ?>

                            <button class="btn btn-danger eliminarSolicitudButton"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table> <!-- Cierre de la tabla Solicitud Proyecto --> 

            <div id="verSolicitudModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header p-3 mb-2 bg-success text-white">
                            <h5 class="modal-title" id="tituloVerSolicitudModal"> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datos">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Cierre modal ver solicitud Proyecto -->

            <div id="eliminarSolicitudModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header p-3 mb-2 bg-danger text-white">
                            <h5 class="modal-title" id="tituloEliminarSolicitudModal"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Esta seguro que desea eliminar la solicitud?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button id="eliminarButton" type="button" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Cierre modal Eliminar solicitud Proyecto -->
        </div> <!--Cierre de Container -->
        
    </body>
</html>