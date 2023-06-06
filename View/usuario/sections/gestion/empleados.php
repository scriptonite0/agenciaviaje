<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container text-center">
        <div class="row " style="padding-top:1rem;">

            <!-- TABLA -->
            <div id="div-tabla-empleados" class="col-md-11">
                <div class="card difuminado shadow" style="height: 80vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Empleados</h3>
                        <div class="input-group  ms-auto" style="width: 40%;">
                            <input id="buscar-empleado" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarPor();">
                            <select class="form-select bg-light shadow  fs-5" id="filtrar-empleado">
                                <option value="nombres" selected>Nombres</option>
                                <option value="apellidos">Apellidos</option>
                                <option value="dni">DNI</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 65vh;">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Foto</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-empleados">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FUNCIONES -->
        <div id="card-funciones-empleados" class="position-absolute top-50 end-0 translate-middle-y" style="transition: 0.3s ease all;">
            <div class="card difuminado shadow" style="border-radius: 20px 0 0 20px !important;">
                <div class="card-header">
                    <h5><b>Opciones</b></h5>
                </div>
                <div class="card-body d-block">
                    <button id="btn-agregar-empleado" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#agregar-empleado"><i class="fa-solid fa-plus" style="font-size:32px;"></i></button>
                    <hr>
                    <button id="btn-editar-empleado" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#editar-empleado" disabled><i class="fa-solid fa-pen-to-square" style="font-size:32px;"></i></button>
                    <hr>
                    <button id="btn-borrar-empleado" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-eliminar-empleado" disabled><i class="fa-solid fa-trash-can" style="font-size:32px;"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/empleados.js"></script>
<?php
}
?>