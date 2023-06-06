<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container ">
        <div class="row d-flex">
            <!--REPORTE 1-->
            <div class="col-sm-6">
                <div class="card m-2 shadow" style="max-width: 540px; ">
                    <div class="row g-0">
                        <div class="col-auto d-none d-lg-block col-sm-5">
                            <img src="../assets/images/reporte-ventas.jpg" class="img-reportes img-fluid rounded-start" style="border-right :1px solid gray; background-size: cover; height: 100%; width: auto;" alt="...">
                        </div>
                        <div class="col-sm-7 text-center">
                            <div class="card-header">
                                <h5 class="card-title"><b>Reportes de Ventas</b></h5>
                            </div>
                            <div class="col-auto d-none d-lg-block card-body">
                                En esta sección de Reportes se podra visualizar algunos datos importantes como: <b>Total de ventas realizadas y monto total por ventas.</b></div>
                            <div class="card-footer">
                                <a class="btn btn-success shadow" onclick="abrirSeccion($('#list-reporte-ventas')[0],'reportes-ventas','reportes/')" style="font-size: 20px;"><i class="fa-solid fa-right-long"></i> Ir al Reporte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--REPORTE 2-->
            <div class="col-sm-6">
                <div class="card m-2" style="max-width: 540px; ">
                    <div class="row g-0 shadow">
                        <div class="col-sm-7 text-center">
                            <div class="card-header">
                                <h5 class="card-title"><b>Reportes de Boletos</b></h5>
                            </div>
                            <div class=" col-auto d-none d-lg-block card-body ">
                                <p class="card-text">En esta sección de Reportes se podra visualizar algunos datos importantes como: <b>Total de boletos registrados y cantidad de boletos en un mes.</b></p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-success shadow" style="font-size: 20px;" onclick="abrirSeccion($('#list-reporte-boletos')[0],'reportes-boletos','reportes/')"><i class="fa-solid fa-right-long"></i> Ir al Reporte</a>
                            </div>
                        </div>
                        <div class="col-auto d-none d-lg-block col-sm-5">
                            <img src="../assets/images/reporte-boletos.jpg" class="img-reportes img-fluid rounded-end" style="border-left :1px solid gray; background-size: cover; height: 100%;" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <!--REPORTE 2-->
            <div class="offset-sm-3 col-sm-6">
                <div class="card m-2 shadow" style="max-width: 540px; ">
                    <div class="row g-0">
                        <div class="col-auto d-none d-lg-block col-sm-5">
                            <img src="../assets/images/reporte-clientes.jpeg" class="img-reportes img-fluid rounded-start" style="border-right :1px solid gray; background-size: cover; height: 100%; width: auto;" alt="...">
                        </div>
                        <div class="col-sm-7 text-center">
                            <div class="card-header">
                                <h5 class="card-title"><b>Reportes de Clientes</b></h5>
                            </div>
                            <div class="col-auto d-none d-lg-block card-body">
                                <p class="card-text">En esta sección de Reportes se podra visualizar de manera gráfica algunos datos importantes como: <b>Rutas mas visitadas por los clientes y los clientes más frecuentes.</b></p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-success shadow" style="font-size: 20px;" onclick="abrirSeccion($('#list-reporte-clientes')[0],'reportes-clientes','reportes/')"><i class="fa-solid fa-right-long"></i> Ir al Reporte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>