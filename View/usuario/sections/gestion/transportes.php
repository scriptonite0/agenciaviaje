<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?><div class="container text-center">
        <div class="row " style="padding-top:1rem;">

            <!-- TABLA -->
            <div id="div-tabla-transportes" class="col-md-11">
                <div class="card difuminado shadow" style="height: 80vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Transportes</h3>
                        <div class="input-group  ms-auto" style="width: 40%;">
                            <input id="buscar-ruta" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarPor();">
                            <select class="form-select bg-light shadow  fs-5" id="filtrar-ruta">
                                <option value="id_transporte" selected>ID Transporte</option>
                                <option value="modelo_transporte">Modelo de Vehiculo</option>
                                <option value="placa_transporte">Placa de Vehiculo</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 65vh;">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Transporte</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Chofer</th>
                                        <th scope="col">Modelo Vehiculo</th>
                                        <th scope="col">Placa Vehiculo</th>
                                        <th scope="col">Seguro</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-transportes">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FUNCIONES -->
        <div id="card-funciones-transportes" class="position-absolute top-50 end-0 translate-middle-y" style="transition: 0.3s ease all;">
            <div class="card difuminado shadow" style="border-radius: 20px 0 0 20px !important;">
                <div class="card-header">
                    <h5><b>Opciones</b></h5>
                </div>
                <div class="card-body d-block">
                    <button id="btn-agregar-transporte" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#agregar-transporte"><i class="fa-solid fa-plus" style="font-size:32px;"></i></button>
                    <hr>
                    <button id="btn-editar-transporte" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#editar-transporte" disabled><i class="fa-solid fa-pen-to-square" style="font-size:32px;"></i></button>
                    <hr>
                    <button id="btn-borrar-transporte" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-eliminar-transporte" disabled><i class="fa-solid fa-trash-can" style="font-size:32px;"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/transportes.js"></script>
<?php
}
?>