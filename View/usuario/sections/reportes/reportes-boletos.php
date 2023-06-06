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
                                <h4 class="card-title"><b>Reporte de Boletos</b></h4>
                            </div>
                            <div class="col-sm-3">
                                <div class="mr-3 input-group">
                                    <span class="input-group-text">Desde</span>
                                    <input type="date" id="reporte-boleto-desde" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="ml-3 input-group">
                                    <span class="input-group-text">Hasta</span>
                                    <input type="date" id="reporte-boleto-hasta" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" onclick="mostrarReportesBoletos()">Mostrar Reportes</button>
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
                                <h5 class="card-title">Total de Boletos Registrados</h5>
                            </div>
                            <div class=" card-body ">
                                <p class="card-text">Cantidad de Boletos Registrados en el periodo especificado.</p>
                            </div>
                        </div>
                        <div id="cantidad-boletos" class=" col-sm-4 justify-content-center" style="font-size:36px; border-left: 2px solid gray; align-items: center; display: flex; ">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style="max-width: 540px; margin:10px;">
                    <div class="row g-0">
                        <div class="col-sm-12 text-center">
                            <div class="card-header">
                                <h5 class="card-title">Cantidad de Boletos Registrados en el Mes Actual</h5>
                            </div>
                            <div class=" card-body bg-white " style="height:40vh;">
                                <canvas id="grafico-boletos-registrados" class="" style="width: 70vh;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/reportes_boletos.js"></script>
<?php
}
?>