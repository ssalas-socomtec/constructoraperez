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

            $("#alertaSesion").hide();

            $('#inicioSesionModal').modal('show');

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
        <div class="modal" tabindex="-1" role="dialog" id="inicioSesionModal">
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