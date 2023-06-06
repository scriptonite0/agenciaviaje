<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container text-center">
        <div class="row " style="padding-top:1rem;">

            <!-- TABLA -->
            <div id="div-tabla-ventas" class="col-md-11  ">
                <div class="card difuminado shadow" style="height: 80vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Detalle de Ventas</h3>
                        <div class="input-group  ms-auto" style="width: 40%;">
                            <input id="buscar-detalle-venta" class="form-control shadow" style="width: 40%;" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarPor();">
                            <select class="form-select bg-light shadow fs-5" id="filtrar-detalle-venta">
                                <option value="nombres" selected>Nombres</option>
                                <option value="apellidos">Apellidos</option>
                                <option value="dni">DNI</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body" style="padding:var(--bs-card-spacer-x);">
                        <div class="table-responsive " style="height: 65vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Venta</th>
                                        <th scope="col">ID Cliente</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Cantidad Boletos</th>
                                        <th scope="col">Monto Total</th>
                                        <th scope="col">Fecha de Venta</th>
                                        <th scopte="col">Detalles</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-detalle-ventas">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="../assets/js/detalle_ventas.js"></script>
<?php
}
?>