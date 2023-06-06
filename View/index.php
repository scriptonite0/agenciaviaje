<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Agencia de Viajes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/css/estilos.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow" style="background-color: rgba(0,0,0,0.5);">
        <div class="container">
            <a class="navbar-brand" href="#">PeruExpress</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-slide-to="0" data-target="#secciones">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-slide-to="1" data-target="#secciones">Nuestros Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-slide-to="2" data-target="#secciones">Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#modal-login">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success" href="#" data-toggle="modal" data-target="#modal-register">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="carousel slide" data-ride="carousel" id="secciones">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#secciones"></li>
            <li data-slide-to="1" data-target="#secciones"></li>
            <li data-slide-to="2" data-target="#secciones"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="First slide" class="d-block w-100" src="assets/images/carousel-1.jpg">
                <div class="carousel-caption d-none d-md-block " style="color: black; bottom:20%;">
                    <img class=" w-100" src="assets/images/logo-empresa.png">
                    <h3><b>LA MAYOR COMODIDAD AL MEJOR PRECIO</b></h3>
                    <h4><b>¡Registrate con tu DNI y se parte del cambio!</b></h4>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="Second slide" class="d-block w-100" src="assets/images/carousel-2.jpg">
                <div class="carousel-caption d-none d-md-block" style="bottom: 20%; color: white; border: 2px solid white; border-radius: 10px; background-color: rgba(0, 0, 0, 0.5);">
                    <h1 class="pb-3"><b>Te Ofrecemos:</b></h1>
                    <h3><b>- La capacidad de registrar tus boletos en cualquier hora y en cualquier lugar.</b></h3>
                    <h3><b>- Editar tus boletos de manera rápida y sin costo adicional.</b></h3>
                    <h3><b>- Una gran variedad de destinos en todo el Perú a los mejores precios.</b></h3>
                    <h3><b>- Diferentes métodos de pago como Yape, Izipay, entre otros.</b></h3>
                    <h2 class="pd-3"><b>¡Olvídate de hacer colas y viaja rápidamente!</b></h2>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="Third slide" class="d-block w-100" src="assets/images/carousel-3.jpg">
                <div class="carousel-caption d-none d-md-block" style=" bottom:30%; color: white; border: 2px solid white; border-radius:10px; background-color: rgba(0,0,0,0.5);">
                    <h5 class="mb-3">Contáctanos</h5>
                    <div class="row">
                        <div class="col-sm-4"><button class="btn btn-danger mb-4" style="font-size: 24px;"><i class="fa-regular fa-envelope"></i> GMAIL</button>
                            <div class="p-3" style="font-size:16px;"><b>agenciadeviajeperuexpress@gmail.com</b></div>
                        </div>
                        <div class="col-sm-4"><button class="btn btn-success mb-3" style="font-size: 24px;"><i class="fa-brands fa-whatsapp"></i> WHATSAPP</button>
                            <div class="p-3" style="font-size:24px;"><b>+51 901 980 253</b></div>
                        </div>
                        <div class="col-sm-4"><button class="btn btn-info mb-3" style="font-size: 24px;"><i class="fa-brands fa-twitter"></i>TWITTER</button>
                            <div class="p-3" style="font-size:20px;"><b>@PeruExpressOficial</b></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-sm-2 col-sm-8">
                        </div>
                    </div>
                </div>
            </div><a class="carousel-control-prev" data-slide="prev" href="#secciones" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
        </div>
        <!-- Modal Login -->
        <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: rgba(255,255,255,0.6);">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">Iniciar Sesión</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="login-dni" class="form-label">DNI</label>
                            <input type="email" class="form-control" id="login-dni" maxlength="8">
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="login-password">
                                <button id="btn-show-hide-login" class="btn btn-info" onclick="showHidePasswordLogin()">Mostrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a class="btn btn-primary" onclick="login()">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Register -->
        <div class="modal fade" id="modal-register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: rgba(255,255,255,0.6);">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">Registrarse</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="register-nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="register-nombres">
                        </div>
                        <div class="mb-2">
                            <label for="register-apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="register-apellidos">
                        </div>
                        <div class="mb-2">
                            <label for="register-dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="register-dni" maxlength="8">
                        </div>
                        <div class="mb-2">
                            <label for="register-password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="register-password">
                                <button id="btn-show-hide-register" class="btn btn-info" onclick="showHidePasswordRegister()">Mostrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a class="btn btn-primary" onclick="register()" data-dismiss="modal">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/index.js"></script>

        <script src="assets/js/cdn/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
        </script>
</body>

</html>