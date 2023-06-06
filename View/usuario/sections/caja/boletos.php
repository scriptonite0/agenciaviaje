<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container text-center">
        <div class="row " style="padding-top:1rem;">

            <!-- TABLA -->
            <div id="div-tabla-boletos" class="col-md-11  ">
                <div class="card difuminado shadow" style="height: 80vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Boletos de Viaje</h3>
                        <div class="input-group  ms-auto" style="width: 40%;">
                            <input id="buscar-boleto" class="form-control shadow" style="width: 40%;" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarPor();">
                            <select class="form-select bg-light shadow fs-5" id="filtrar-boleto">
                                <option value="id_boleto" selected>ID Boleto</option>
                                <option value="id_ruta">ID Ruta</option>
                                <option value="id_cliente">ID Cliente</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body" style="padding:var(--bs-card-spacer-x);">
                        <div class="table-responsive " style="height: 65vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Boleto</th>
                                        <th scope="col">ID Cliente</th>
                                        <th scope="col">ID Ruta</th>
                                        <th scope="col">Hora de Viaje</th>
                                        <th scope="col">Fecha de Viaje</th>
                                        <th scope="col">Hora Registro</th>
                                        <th scope="col">Fecha Registro</th>
                                        <th scope="col">Detalles</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-boletos">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FUNCIONES -->
        <div id="card-funciones-boletos" class="position-absolute top-50 end-0 translate-middle-y" style="transition: 0.3s ease all;">
            <div class="card difuminado shadow" style="border-radius: 20px 0 0 20px !important;">
                <div class="card-header">
                    <h5><b>Opciones</b></h5>
                </div>
                <div class="card-body d-block">
                    <button id="btn-agregar-boleto" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#agregar-boleto" onclick="setFecha()"><i class="fa-solid fa-plus" style="font-size:32px;"></i></button>
                    <hr>
                    <button id="btn-editar-boleto" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#editar-boleto" disabled><i class="fa-solid fa-pen-to-square" style="font-size:32px;"></i></button>
                    <hr>
                    <button id="btn-borrar-boleto" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-eliminar-boleto" disabled><i class="fa-solid fa-trash-can" style="font-size:32px;"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/boletos.js"></script>
<?php
}
?>