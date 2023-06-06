<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card mt-3  shadow">
                    <img src="../assets/images/img-gestion-empleados.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Empleados</h5>
                        <p class="card-text">En esta sección se administra los empleados de la empresa, permitiendo registrar, editar o eliminar al empleado del sistema.</p>
                        <a href="#" class="btn btn-primary shadow" onclick="abrirSeccion($('#list-empleados')[0],'empleados','gestion/')">Gestionar Empleados</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mt-3  shadow">
                    <img src="../assets/images/img-gestion-clientes.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Clientes</h5>
                        <p class="card-text">Sección en la que se podra registrar los boletos y las ventas realizadas.</p>
                        <a href="#" class="btn btn-primary shadow" onclick="abrirSeccion($('#list-clientes')[0],'clientes','gestion/')">Gestionar Clientes</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mt-3  shadow">
                    <img src="../assets/images/img-gestion-rutas.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Rutas</h5>
                        <p class="card-text">Sección en la que se podra registrar nuevas rutas, editar las rutas exitentes o eliminarlas del sistema.</p>
                        <a href="#" class="btn btn-primary shadow" onclick="abrirSeccion($('#list-rutas')[0],'rutas','gestion/')">Gestionar Rutas</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mt-3  shadow">
                    <img src="../assets/images/img-gestion-transportes.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Transportes</h5>
                        <p class="card-text">Sección en la que se podra gestionar la información de los buses de transportes.</p>
                        <a href="#" class="btn btn-primary shadow" onclick="abrirSeccion($('#list-transportes')[0],'transportes','gestion/')">Gestionar Transportes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>