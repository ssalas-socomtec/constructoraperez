<?php

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
        <title>Constructora Perez - Administrador </title>
        <script>
            $(document).ready(function(){

               cargarDatos();

               

               $(".informacionUsuario").click(function(){

                    var idUsuario = $(this).attr("value");

                    var datos = new FormData();

                    datos.append('runCliente', idUsuario);

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
                            $.each(data, function(index){
                                $("#nombreUsuarioModal").text(data[index].primerNombreU + " " + data[index].segundoNombreU + " " + data[index].apellidoPaternoU + " " + data[index].apellidoMaternoU);
                                $("#rutUsuarioModal").text(data[index].runU);
                                $("#direccionUsuarioModal").text(data[index].direccionU);
                                $("#comunaUsuarioModal").text(data[index].COMUNA_NOMBRE);
                                $("#telefonoUsuarioModal").text(data[index].telefonoU);
                                $("#correoUsuarioModal").text(data[index].correoU);
                            });
                                
                            $("#informacionUsuarioModal").modal("show");
                        } //Cierre de Success
                    }); //Cierre del Ajax 

               });


            });

            function cargarDatos(){
                $.ajax({
                    
                    async: false,
                    type: 'POST',
                    url: 'recibe_solicitud_proyecto.php',
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    success: function(data){
                        
                        var tablaEspera = "";
                        var datosEspera = "";
                        var contadorEspera = 0;

                        var tablaEstudio = "";
                        var datosEstudio = "";
                        var contadorEstudio = 0;

                        var tablaPago = "";
                        var datosPago = "";
                        var contadorPago = 0;

                        var tablaFinalizada = "";
                        var datosFinalizada = "";
                        var contadorFinalizada = 0;

                        var tablaEliminada = "";
                        var datosEliminada = "";
                        var contadorEliminada = 0;


                        var tabla = '<table class="table table-striped"';
							tabla += "<thead class='thead-dark'>";
							tabla += '<tr>';
							tabla += '<th>Solicitud</th> <th>Fecha</th> <th>Nombre Proyecto</th> <th>Tipo Proyecto</th> <th>Usuario</th> <th>Acciones</th>';
							tabla += '</tr>';
							tabla += '</thead';
							tabla += '<tbody>';
                        

                        $.each(data, function(index){
                            var tr = "";
                            var fechaSolicitud = data[index].fechaSP.split("-");
                            tr += "<tr class='tr'>";
                            tr += "<td> #" + data[index].idSolicitudProyecto + "</td>";
                            tr += "<td>" + fechaSolicitud[2] + "/" +  fechaSolicitud[1] + "/" + fechaSolicitud[0]  + "</td>";
                            tr += "<td>" + data[index].nombreP + "</td>";
                            tr += "<td>" + data[index].descripcionTP + "</td>";
                            tr += "<td> <a class='informacionUsuario' href='#' value='" + data[index].runU + "'>" + data[index].primerNombreU + " " + data[index].apellidoPaternoU  + "</a></td>";
                           

                            switch(data[index].descripcionEP){
                                case "Espera":
                                                tr += "<td>" + "<button class='btn btn-success verSolicitudButton'> <i class='fa fa-check-square-o' aria-hidden='true'></i> </button>" + "</td>";
                                                tr += "</tr>";
                                                datosEspera += tr;
                                                contadorEspera++;
                                                break;

                                case "Estudio":

                                                datosEstudio +=tr;
                                                contadorEstudio++;
                                                break;

                                case "Pago":
                                                datosPago +=tr;
                                                contadorPago++;
                                                break;

                                case "Finalizada":
                                                datosFinalizada +=tr;
                                                contadorFinalizada++;
                                                break;

                                case "Eliminada":
                                                tr += "<td>" + "<button class='btn btn-success verSolicitudButton'> <i class='fa fa-check-square-o' aria-hidden='true'></i> </button>" + "</td>";
                                                tr += "</tr>";
                                                datosEliminada += tr;
                                                contadorEliminada ++;
                                                break;
                            }
          
                       });

                        tablaEspera += tabla + datosEspera + '</tbody> </table>';
                        tablaEstudio += tabla + datosEstudio + '</tbody> </table>';
                        tablaPago += tabla + datosPago + '</tbody> </table>';
                        tablaFinalizada += tabla + datosFinalizada + '</tbody> </table>';
                        tablaEliminada += tabla + datosEliminada + '</tbody> </table>';
                        
                        $("#contenidoEspera").html(tablaEspera);
                        $("#contadorEspera").html(contadorEspera);

                        $("#contenidoEstudio").html(tablaEstudio);
                        $("#contadorEstudio").html(contadorEstudio);

                        $("#contenidoPago").html(tablaPago);
                        $("#contadorPago").html(contadorPago);

                        $("#contenidoFinalizada").html(tablaFinalizada);
                        $("#contadorFinalizada").html(contadorFinalizada);

                        $("#contenidoEliminada").html(tablaEliminada);
                        $("#contadorEliminada").html(contadorEliminada);

                    } //Cierre de Success
                }); //Cierre del Ajax
            }
        </script>
    </head>
    <body>

        <div class="container">
            <br />
            <h3>Solicitudes de Proyecto</h3>
            <hr />
            <br />
            <nav class="nav nav-tabs" id="myTab" role="tablist">
                <a class="nav-item nav-link active" id="nav-espera-tab" data-toggle="tab" href="#nav-espera" role="tab" aria-controls="nav-espera" aria-selected="true">Espera <span class="badge badge-light" id="contadorEspera"></span></a>
                <a class="nav-item nav-link" id="nav-estudio-tab" data-toggle="tab" href="#nav-estudio" role="tab" aria-controls="nav-estudio" aria-selected="false">Estudio <span class="badge badge-light" id="contadorEstudio"></span></a>
                <a class="nav-item nav-link" id="nav-pago-tab" data-toggle="tab" href="#nav-pago" role="tab" aria-controls="nav-pago" aria-selected="false">Pago <span class="badge badge-light" id="contadorPago"></span></a>
                <a class="nav-item nav-link" id="nav-finalizada-tab" data-toggle="tab" href="#nav-finalizada" role="tab" aria-controls="nav-fanilizada" aria-selected="false">Finalizada <span class="badge badge-light" id="contadorFinalizada"></span></a>
                <a class="nav-item nav-link" id="nav-eliminada-tab" data-toggle="tab" href="#nav-eliminada" role="tab" aria-controls="nav-eliminada" aria-selected="false">Eliminada <span class="badge badge-light" id="contadorEliminada"></span></a>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-espera" role="tabpanel" aria-labelledby="nav-espera-tab">
                    <br>
                    <h5>Solicitudes en Espera:</h5>
                    <hr />
                    <div id="contenidoEspera">

                    </div>
                    
                </div>

                <div class="tab-pane fade" id="nav-estudio" role="tabpanel" aria-labelledby="nav-estudio-tab">
                    <br>
                    <h5>Solicitudes en Estudio:</h5>
                    <hr>
                    <div id="contenidoEstudio">

                    </div>
                </div>

                <div class="tab-pane fade" id="nav-Pago" role="tabpanel" aria-labelledby="nav-pago-tab">
                    <br>
                    <h5>Solicitudes en Espera de Pago:</h5>
                    <hr>
                    <div id="contenidoPago">

                    </div>
                </div>

                <div class="tab-pane fade" id="nav-finalizada" role="tabpanel" aria-labelledby="nav-finalizada-tab">
                    <br>
                    <h5>Solicitudes Finalizadas:</h5>
                    <hr>
                    <div id="contenidoFinalizada">

                    </div>
                </div>

                <div class="tab-pane fade" id="nav-eliminada" role="tabpanel" aria-labelledby="nav-eliminada-tab">
                    <br>
                    <h5>Solicitudes Eliminadas:</h5>
                    <hr>
                    <div id="contenidoEliminada">

                    </div>
                </div>
            </div> <!-- Cierre de tab content -->
            
        </div><!-- Cierre de Container -->
        <div class="modal fade" id="informacionUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Información del Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <br />
                        <dl class="row">                        
                            <dt class="col-sm-3">Nombre:</dt>
                            <dd class="col-sm-9" ><p id="nombreUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Rut:</dt>
                            <dd class="col-sm-9" ><p id="rutUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Dirección:</dt>
                            <dd class="col-sm-9" ><p id="direccionUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Comuna:</dt>
                            <dd class="col-sm-9" ><p id="comunaUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Teléfono:</dt>
                            <dd class="col-sm-9" ><p id="telefonoUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Correo:</dt>
                            <dd class="col-sm-9" ><p id="correoUsuarioModal"></p></dd>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>  
                    </div>
                </div>
            </div>
        </div><!-- Cierre Modal Usuario -->
        <div class="modal fade" id="cambiarEstadoProyectoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Información del Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <br />
                        <dl class="row">                        
                            <dt class="col-sm-3">Nombre:</dt>
                            <dd class="col-sm-9" ><p id="nombreUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Rut:</dt>
                            <dd class="col-sm-9" ><p id="rutUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Dirección:</dt>
                            <dd class="col-sm-9" ><p id="direccionUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Comuna:</dt>
                            <dd class="col-sm-9" ><p id="comunaUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Teléfono:</dt>
                            <dd class="col-sm-9" ><p id="telefonoUsuarioModal"></p></dd>
                            <dt class="col-sm-3">Correo:</dt>
                            <dd class="col-sm-9" ><p id="correoUsuarioModal"></p></dd>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>  
                    </div>
                </div>
            </div>
        </div><!-- Cierre Modal Usuario -->
        
    </body>
</html>