<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card mt-3 shadow">
                <img src="../assets/images/img-caja-ventas.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Perfil</h5>
                    <p class="card-text">Aquí podras ver los datos de tu cuenta.</p>
                    <a href="#" class="btn btn-primary" onclick="abrirSeccion($('#list-ventas')[0],'clientes','cliente/')">Ir a la sección</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card mt-3 shadow">
                <img src="../assets/images/img-caja-detalle-venta.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Registrar un Boleto</h5>
                    <p class="card-text">Aquí podras registrar un boleto en vez te hacerlo de manera presencial.</p>
                    <a href="#" class="btn btn-primary" onclick="abrirSeccion($('#list-detalle-ventas')[0],'detalle-ventas','caja/')">Ir a la sección</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card mt-3 shadow">
                <img src="../assets/images/img-caja-boletos.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mis Boletos Registrados</h5>
                    <p class="card-text">Aquí podras ver y gestionar tus boletos registrados.</p>
                    <a href="#" class="btn btn-primary" onclick="abrirSeccion($('#list-boletos')[0],'boletos','caja/')">Ir a la sección</a>
                </div>
            </div>
        </div>
    </div>
</div>