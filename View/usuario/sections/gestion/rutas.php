<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container text-center">
        <div class="row " style="padding-top:1rem;">

            <!-- TABLA -->
            <div id="div-tabla-rutas" class="col-md-11">
                <div class="card difuminado shadow" style="height: 80vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Rutas</h3>
                        <div class="input-group  ms-auto" style="width: 40%;">
                            <input id="buscar-ruta" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarPor();">
                            <select class="form-select bg-light shadow  fs-5" id="filtrar-ruta">
                                <option value="id_ruta" selected>ID Ruta</option>
                                <option value="ciudad_salida">Ciudad de Partida</option>
                                <option value="ciudad_llegada">Ciudad de Llegada</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 65vh;">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Ruta</th>
                                        <th scope="col">Terminal de Salida</th>
                                        <th scope="col">Terminal de Llegada</th>
                                        <th scope="col">Ciudad de Partida</th>
                                        <th scope="col">Ciudad de Destino</th>
                                        <th scope="col">Tipo de Viaje</th>
                                        <th scope="col">Costo</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-rutas">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FUNCIONES -->
        <div id="card-funciones-rutas" class="position-absolute top-50 end-0 translate-middle-y" style="transition: 0.3s ease all;">
            <div class="card difuminado shadow" style="border-radius: 20px 0 0 20px !important;">
                <div class="card-header">
                    <h5><b>Opciones</b></h5>
                </div>
                <div class="card-body d-block">
                    <button id="btn-agregar-ruta" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#agregar-ruta"><i class="fa-solid fa-plus" style="font-size:32px;"></i></button>
                    <hr>
                    <button id="btn-editar-ruta" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#editar-ruta" disabled><i class="fa-solid fa-pen-to-square" style="font-size:32px;"></i></button>
                    <hr>
                    <button id="btn-borrar-ruta" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-eliminar-ruta" disabled><i class="fa-solid fa-trash-can" style="font-size:32px;"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/rutas.js"></script>
<?php
}
?>