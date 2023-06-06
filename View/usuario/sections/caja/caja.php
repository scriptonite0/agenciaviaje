<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card m-4 shadow">
                    <img src="../assets/images/img-caja-ventas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ventas</h5>
                        <p class="card-text">Sección en la que se podra administrar las ventas permitiendo al usuario agregar, editar o eliminar una venta.</p>
                        <a href="#" class="btn btn-primary" onclick="abrirSeccion($('#list-ventas')[0],'ventas','caja/')">Administrar Ventas</a>
                    </div>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="card m-4 shadow">
                    <img src="../assets/images/img-caja-boletos.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Boletos</h5>
                        <p class="card-text">Sección en la que se podra administrar los boletos registrados permitiendo editar o eliminarlos del sistema..</p>
                        <a href="#" class="btn btn-primary" onclick="abrirSeccion($('#list-boletos')[0],'boletos','caja/')">Administrar los boletos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>