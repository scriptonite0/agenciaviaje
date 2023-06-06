<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="card-title"><b>Reporte de Ventas</b></h4>
                            </div>
                            <div class="col-sm-3">
                                <div class="mr-3 input-group">
                                    <span class="input-group-text">Desde</span>
                                    <input type="date" id="reporte-venta-desde" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="ml-3 input-group">
                                    <span class="input-group-text">Hasta</span>
                                    <input type="date" id="reporte-venta-hasta" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" onclick="mostrarReportesVentas()">Mostrar Reportes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="max-width: 540px; margin:10px;">
                    <div class="row g-0">
                        <div class="col-sm-8 text-center">
                            <div class="card-header">
                                <h5 class="card-title">Ventas Realizadas</h5>
                            </div>
                            <div class=" card-body ">
                                <p class="card-text">Número de Ventas realizadas en el periodo especificado.</p>
                            </div>
                        </div>
                        <div id="num-ventas" class=" col-sm-4 justify-content-center" style="font-size:36px; border-left: 2px solid gray; align-items: center; display: flex; ">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style="max-width: 540px; margin:10px;">
                    <div class="row g-0">
                        <div id="monto-ventas" class=" col-sm-4 justify-content-center" style="font-size:28px; border-right: 2px solid gray; align-items: center; display: flex; ">
                        </div>
                        <div class="col-sm-8 text-center">
                            <div class="card-header">
                                <h5 class="card-title">Monto Total de Ventas</h5>
                            </div>
                            <div class=" card-body ">
                                <p class="card-text">Monto Total obtenido por la Ventas de Boletos en el periodo especificado.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style=" margin:10px;">
                    <div class="row g-0">
                        <div class="col-sm-12 text-center">
                            <div class="card-header">
                                <h5 class="card-title">Cantidad de Ventas por Día</h5>
                            </div>
                            <div class=" card-body bg-white " style="height:40vh;">
                                <canvas id="grafico-cantidad-ventas" class="" style="width: 70vh;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style=" margin:10px;">
                    <div class="row g-0">
                        <div class="col-sm-12 text-center">
                            <div class="card-header">
                                <h5 class="card-title">Monto Total de Ventas por Día</h5>
                            </div>
                            <div class=" card-body bg-white " style="height:40vh;">
                                <canvas id="grafico-monto-ventas" class="" style="width: 70vh;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/reportes_ventas.js"></script>
<?php
}
?>