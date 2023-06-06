<?php

session_start();
if (isset($_SESSION['dni_usuario'])) {
} else {

?><div class="modal fade show" id="acceso-denegado-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="header-modal" aria-modal="true" role="dialog" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="header-modal">ACCESO DENEGADO</h1>
                </div>
                <div class="modal-body">
                    Usted no tiene permiso para acceder al Sistema.
                </div>
                <div class="modal-footer mx-auto">
                    <a href="../index.php" class="btn btn-danger">Volver al Inicio</a>
                </div>
            </div>
        </div>
    </div>
<?php
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($_SESSION["tipo_usuario"]); ?> - Agencia de Viajes</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">

    <!-- CDN - CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

    </style>
</head>

<body>
    <div id="contenido">
        <div id="sidebar" class="close mx-auto text-center shadow">
            <div class="logo-details">
                <img class="" src="../assets/images/logo.png" style=" background-size: cover; width:70px; margin: 10px 20px 0px 5px;"><span class="logo_name">Agencia</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="dashboard.php">
                        <i class="fa-solid fa-house"></i><span class="link_name">Inicio</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="dashboard.php"></a>Inicio</li>
                    </ul>
                </li>
                <hr>
                <?php
                if ($_SESSION["tipo_usuario"] == "GERENTE") {
                ?>
                    <li>
                        <div class="iocn-link">
                            <a href="#" onclick="abrirSeccion($('#list-empleados')[0],'gestion','gestion/')">
                                <i class="fa-solid fa-screwdriver-wrench"></i><span class="link_name">Gestión</span>
                            </a>
                            <i class="fa-solid fa-angles-down arrow"></i>
                        </div>
                        <ul class="sub-menu">
                            <li id="list-gestion" class="btns-sidebar"><a class="link_name" href="#" onclick="abrirSeccion($('#list-empleados')[0],'gestion','gestion/')">Gestión</a></li>
                            <li id="list-empleados" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-empleados')[0],'empleados','gestion/')"><i class="fa-solid fa-user-tie"></i>Empleados</a></li>
                            <li id="list-clientes" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-clientes')[0],'clientes','gestion/')"><i class="fa-solid fa-person-walking-luggage"></i>Clientes</a></li>
                            <li id="list-rutas" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-rutas')[0],'rutas','gestion/')"><i class="fa-solid fa-route"></i>Rutas</a></li>
                            <li id="list-transportes" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-transportes')[0],'transportes','gestion/')"><i class="fa-solid fa-truck-plane"></i>Transportes</a></li>
                        </ul>
                    </li>
                    <hr>
                <?php
                }
                if ($_SESSION["tipo_usuario"] == "GERENTE" || $_SESSION["tipo_usuario"] == "EMPLEADO DE CAJA") {
                ?>
                    <li>
                        <div class="iocn-link">
                            <a href="#" onclick="abrirSeccion($('#list-empleados')[0],'caja','caja/')">
                                <i class="fa-solid fa-cash-register"></i><span class="link_name">Caja</span>
                            </a>
                            <i class="fa-solid fa-angles-down arrow"></i>
                        </div>
                        <ul class="sub-menu">
                            <li id="list-caja" class="btns-sidebar"><a class="link_name" href="#" onclick="abrirSeccion($('#list-empleados')[0],'caja','caja/')">Caja</a></li>
                            <li id="list-ventas" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-ventas')[0],'ventas','caja/')"><i class="fa-solid fa-hand-holding-dollar"></i>Ventas</a></li>
                            <li id="list-boletos" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-boletos')[0],'boletos','caja/')"><i class="fa-solid fa-ticket"></i>Boletos</a></li>
                        </ul>
                    </li>
                    <hr>
                <?php
                }
                if ($_SESSION["tipo_usuario"] == "GERENTE") {
                ?>
                    <li>
                        <div class="iocn-link">
                            <a href="#" onclick="abrirSeccion($('#list-reportes')[0],'reportes','reportes/')">
                                <i class="fa-solid fa-chart-line"></i><span class="link_name">Reportes</span>
                            </a>
                            <i class="fa-solid fa-angles-down arrow"></i>
                        </div>
                        <ul class="sub-menu">
                            <li><a class="link_name" href="#">Reportes</a></li>
                            <li id="list-reporte-ventas" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-reporte-ventas')[0],'reportes-ventas','reportes/')"><i class="fa-solid fa-hand-holding-dollar"></i>Ventas</a></li>
                            <li id="list-reporte-boletos" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-reporte-boletos')[0],'reportes-boletos','reportes/')"><i class="fa-solid fa-ticket"></i>Boletos</a></li>
                            <li id="list-reporte-clientes" class="btns-sidebar"><a href="#" style="width:100%;" onclick="abrirSeccion($('#list-reporte-clientes')[0],'reportes-clientes','reportes/')"><i class="fa-solid fa-person-walking-luggage"></i>Clientes</a></li>
                        </ul>
                    </li>
                    <hr>
                <?php
                }
                if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                ?>
                    <li id="cliente-datos-perfil" class="btns-sidebar">
                        <div class="iocn-link">
                            <a href="#" onclick="abrirSeccion($('#cliente-datos-perfil')[0],'clientes-perfil','cliente/')">
                                <i class="fa-regular fa-address-card"></i><span class="link_name">Mi Perfil</span>
                            </a>
                        </div>
                        <ul class="sub-menu">
                            <li><a class="link_name" href="#" onclick="abrirSeccion($('#cliente-datos-perfil')[0],'clientes-perfil','cliente/')">Mi Perfil</a></li>
                        </ul>
                    </li>
                    <hr>
                <?php
                }
                if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                ?>
                    <li id="cliente-registrar-boleto" class="btns-sidebar">
                        <div class="iocn-link">
                            <a href="#" onclick="abrirSeccion($('#cliente-registrar-boleto')[0],'clientes-registrar-boleto','cliente/')">
                                <i class="fa-solid fa-square-plus"></i><span class="link_name">Registrar Boletos</span>
                            </a>
                        </div>
                        <ul class="sub-menu">
                            <li><a class="link_name" href="#" onclick="abrirSeccion($('#cliente-registrar-boleto')[0],'clientes-registrar-boleto','cliente/')">Registrar Boletos</a></li>
                        </ul>
                    </li>
                    <hr>
                <?php
                }
                if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                ?>
                    <li id="cliente-boletos" class="btns-sidebar">
                        <div class="iocn-link">
                            <a href="#" onclick="abrirSeccion($('#cliente-boletos')[0],'clientes-boletos','cliente/')">
                                <i class="fa-solid fa-ticket"></i><span class="link_name">Mis Boletos</span>
                            </a>
                        </div>
                        <ul class="sub-menu">
                            <li><a class="link_name" href="#" onclick="abrirSeccion($('#cliente-boletos')[0],'clientes-boletos','cliente/')">Mis Boletos</a></li>
                        </ul>
                    </li>
                    <hr>
                <?php
                }
                ?>

                <li>
                    <a onclick="cerrarSesion()">
                        <i class="fa-solid fa-right-from-bracket" style="color:red;"></i><span class="link_name" style="color:red;">Cerrar Sesión</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li style="color:red;"><a class="link_name" onclick="cerrarSesion()"></a>Cerrar Sesión</li>
                    </ul>
                </li>

            </ul>
        </div>
        <div id="main">
            <?php
            include_once("layers/breadcrumb.php");
            ?>

            <div id="section" style="overflow: hidden;">
                <div class="container">
                    <div class="row">
                        <?php
                        if ($_SESSION["tipo_usuario"] == "GERENTE") {
                        ?>
                            <div class="col-sm-4">
                                <div class="card mt-3 shadow" >
                                    <img src="../assets/images/img-gestion.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Gestión</h5>
                                        <p class="card-text">Sección en la que se podra gestionar los datos de los empleados, los clientes, las rutas y los transportes.</p>
                                        <a href="#" class="btn btn-primary shadow" onclick="abrirSeccion($('#list-empleados')[0],'gestion','gestion/')">Ir a la Sección</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        if ($_SESSION["tipo_usuario"] == "GERENTE" || $_SESSION["tipo_usuario"] == "EMPLEADO DE CAJA") {
                        ?>
                            <div class="col-sm-4">
                                <div class="card mt-3 shadow" >
                                    <img src="../assets/images/img-caja.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Caja</h5>
                                        <p class="card-text">Sección en la que se podra registrar los boletos y las ventas realizadas.</p>
                                        <a href="#" class="btn btn-primary shadow" onclick="abrirSeccion($('#list-empleados')[0],'caja','caja/')">Ir a la Sección</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        if ($_SESSION["tipo_usuario"] == "GERENTE") {
                        ?>
                            <div class="col-sm-4">
                                <div class="card mt-3 shadow">
                                    <img src="../assets/images/img-reportes.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Reportes</h5>
                                        <p class="card-text">Sección en la que se podra visualizar los reportes en base a los datos recopilados en la base de datos.</p>
                                        <a href="#" class="btn btn-primary shadow" onclick="abrirSeccion($('#list-reportes')[0],'reportes','reportes/')">Ir a la Sección</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                        ?>
                            <div class="col-sm-4">
                                <div class="card mt-3 shadow" >
                                    <div class="card-header text-center">
                                        <h4>Mi Perfil</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <p class="card-text p-2 text-center">Aquí podras ver los datos de tu <b>Perfil de Usuario</b> y <b>Actualizarlos</b> en cualquier momento.</p>
                                        <a onclick="abrirSeccion($('#cliente-datos-perfil')[0],'clientes-perfil','cliente/')">
                                            <img src="../assets/images/img-clientes-perfil.jpg" class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                        ?>
                            <div class="col-sm-4">
                                <div class="card mt-3 shadow" >
                                    <div class="card-header text-center">
                                        <h4>Registrar Boletos</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <p class="card-text p-2 text-center">Aquí podras registrar tus <b>Boletos</b> a los destinos que quieras visitar sin necesidad de hacerlo presencialmente.</p>
                                        <a onclick="abrirSeccion($('#cliente-registrar-boleto')[0],'clientes-registrar-boleto','cliente/')">
                                            <img src="../assets/images/img-clientes-boletos-registro.png" class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                        ?>
                            <div class="col-sm-4">
                                <div class="card mt-3 shadow" >
                                    <div class="card-header text-center">
                                        <h4>Mis Boletos</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <p class="card-text p-2 text-center">Aquí podras gestionar tus <b>Boletos</b> antes del dia de viaje. Puedes cambiar el <b>destino</b>, la <b>hora de viaje</b>, entre otros más.</p>
                                        <a onclick="abrirSeccion($('#cliente-boletos')[0],'clientes-boletos','cliente/')">
                                            <img src="../assets/images/img-clientes-boletos.png" class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once("modal/modals.php");
        ?>
    </div>
    <script src="../assets/js/cdn/bootstrap.min.js"></script>
    <script src="../assets/js/cdn/popper.min.js"></script>
    <script src="../assets/js/cdn/jquery.min.js"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.getElementById("sidebar");
        let sidebarBtn = document.getElementById("open-sidebar");
        let iconoBtn = document.getElementById("mostrarSidebar");
        let isRotated = false;

        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if (isRotated) {
                iconoBtn.style.transform = "rotate(-360deg)";
            } else {
                iconoBtn.style.transition = "0.3s ease all";
                iconoBtn.style.transform = "rotate(-180deg)";
            }
            isRotated = !isRotated;
        });

        function cerrarSesion() {
            let datos = {
                "accion": "cerrarSesion"
            }
            $.ajax({
                url: "../../Controller/UsuariosController.php",
                type: "POST",
                data: datos,
                success: function(response) {
                    location.href = response;
                },
                error: function() {}
            });
        }
    </script>
</body>

</html>