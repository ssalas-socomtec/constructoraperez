<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="JS/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <title>Constructora Perez</title>
    <script>
        $(document).ready(function(){
            
            $("#viewHomeButton").click(function(){

                    $("#viewHomeModal").modal("show");

                });

                $(".galeriaButton").click(function(){

                    $("#galeriaModal").modal("show");

                });

            $("#alertaSesion").hide();

            $("#solicitarButton").click(function(){

                var valor = $(this).attr('value');
                 
                    $.ajax({

                        async: false,
                        type: 'POST',
                        url: 'comprueba_inicio_sesion.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: 'json',
                        success: function(data){

                            if(data === "Error"){

                                $('#inicioSesionModal').modal('show');

                            }else{
                                
                                $("#proyectoOcultoInput").hide();
                                $("#proyectoOcultoInput").val(valor);
                                $('#confirmacionSolicitudModal').modal('show');

                                
                            }
                        } //Cierre de Success
                    }); //Cierre del Ajax
            }); //Cierre de SolicitarButton

            $("#enviarSolicitudButton").click(function(){

                var datos = new FormData();
                    datos.append('idProyecto', $("#proyectoOcultoInput").val());
                   

                    $.ajax({

                        async: false,
                        type: 'POST',
                        url: 'Cliente/recibe_solicitud_proyecto.php',
                        data: datos,
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: 'json',
                        success: function(data){
                            if(data == 1){
                              
                                $(location).attr('href', 'Cliente/');
                            }
                           
                        } //Cierre de Success
                    }); //Cierre del Ajax
            });

            $("#iniciarSesionButton").click(function(){
                $("#alertaSesion").hide();
                $("#correoUsuarioInput").removeClass("is-invalid");
                $("#contrasenaUsuarioInput").removeClass("is-invalid");
                var Comprobacion = true;
                var Usuario = $("#correoUsuarioInput").val();
                var Contrasena = $("#contrasenaUsuarioInput").val();

                if(Usuario == ""){

                   $("#correoUsuarioInput").addClass("is-invalid");
                   Comprobacion = false;

                }

                if(Contrasena == ""){

                    $("#contrasenaUsuarioInput").addClass("is-invalid");
                    Comprobacion = false;

                }

                if(Comprobacion){

                    var datos = new FormData();
                    datos.append('correoUsuario', $("#correoUsuarioInput").val());
                    datos.append('contrasenaUsuario', $("#contrasenaUsuarioInput").val());

                    $.ajax({

                        async: false,
                        type: 'POST',
                        url: 'recibe_inicio_sesion.php',
                        data: datos,
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: 'json',
                        success: function(data){

                            if(data === "Error al iniciar sesion"){
        
                                $("#alertaSesion").show();

                            }else{ 
                                
                                $(location).attr('href', data);

                            } //cierre del Else
                        } //Cierre de Success
                    }); //Cierre del Ajax
                }//Cierre la Comprobación para Ajax
            }); //Cierre del iniciar Sesion
        }); //Cierre del document ready
    </script>
</head>
<body>
    <div class="container">
    <br>
            <br>
            <br>
        <div class="row justify-content-center">
            <div class="card col-6" style="width: 20rem;">
                <a href="#" class="galeriaButton"><img class="card-img-top " src="Imagenes/modelo_casa/casa_1/1.jpg" alt="Card image cap"></a> 
                <div class="card-body">
                    <h4 class="card-title">Casa 1</h4>
                    <p class="card-text">Casa habitacional hecha en material liviano.</p>
                    <div class="text-center">
                        <hr />
                            <a href="detalle_proyecto.php" target="_blank" class="btn btn-info">Detalle <i class="fa fa-file-text" aria-hidden="true"></i></a>
                            <a href="#" id="viewHomeButton" class="btn btn-dark">View Home <i class="fa fa-home" aria-hidden="true"></i></a>
                            <a href="#" class="btn btn-primary">Cotizar <i class="fa fa-usd" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-footer bg-white text-dark text-center">
                    <a href="#" id="solicitarButton" value="1" class="btn btn-success">Solicitar <i class="fa fa-handshake-o" aria-hidden="true"></i></a>
                </div>
            </div>  
        </div> <!-- Cierre de Card -->

        <div id="galeriaModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header p-3 mb-2 bg-info text-white">
                    <h5 class="modal-title">Casa 1</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="Imagenes/modelo_casa/casa_2/1.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Imagenes/modelo_casa/casa_2/2.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Imagenes/modelo_casa/casa_2/3.jpg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>    
                </div> <!-- Cierre de modal Content -->
            </div>
        </div> <!-- Cierre de Modal View Home --> 

            <div id="viewHomeModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <a href="#" id="viewHomeButton" class="btn btn-success">DOWNLOAD SOFTWARE VIEW HOME <i class="fa fa-download" aria-hidden="true"></i></a>
                        <img src="Imagenes/modelo_casa/casa_1/view_home_scan.png" class="img-fluid" alt="">
                        
                        <a href="#" id="viewHomeButton" class="btn btn-info">DOWNLOAD CODIGO VIEW HOME <i class="fa fa-download" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div> <!-- Cierre de Modal View Home --> 

            <div id="confirmacionSolicitudModal" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title">Envio de Solicitud</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="proyectoOcultoInput">
                        <p>¿Realmente desea enviar la solicitud de construcción?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="enviarSolicitudButton" type="button" class="btn btn-primary">Enviar <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                    </div>
                </div>
            </div> <!-- Cierre de modal Confirmacion -->
        
        <div class="modal fade" tabindex="-1" role="dialog" id="inicioSesionModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    
                        <h5 class="modal-title">Iniciar Sesión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div>
                    <div id="alertaSesion" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error al iniciar sesión</strong>, verifique su usuario y la contraseña.
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="correoUsuarioInput">Usuario:</label>
                                <input type="email" class="form-control" id="correoUsuarioInput" aria-describedby="emailHelp" placeholder="Ingrese Email">
                                <div class="invalid-feedback">
                                    Porfavor, ingresa tu usuario.
                                </div>   
                            </div>
                            <div class="form-group">
                                <label for="contrasenaUsuarioInput">Contraseña:</label>
                                <input type="password" class="form-control" id="contrasenaUsuarioInput" placeholder="Ingrese Contraseña">
                                <div class="invalid-feedback">
                                    Porfavor, ingresa tu contraseña.
                                </div> 
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="iniciarSesionButton">Iniciar <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</body>
</html>