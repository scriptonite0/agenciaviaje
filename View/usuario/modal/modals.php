<!-------------------------------------------------------- MODALS EMPLEADO ---------------------------------------------------------->

<!-- AGREGAR EMPLEADO  -->
<div class="modal fade" id="agregar-empleado" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 800px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 92rem; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Registrar Empleado</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="agregar-empleado-nombres" class="col-form-label"><b>Nombres</b></label>
                            <input type="text" class="form-control shadow" id="agregar-empleado-nombres">
                            <label for="agregar-empleado-apellidos" class="col-form-label"><b>Apellidos</b></label>
                            <input type="text" class="form-control shadow" id="agregar-empleado-apellidos">
                            <label for="agregar-empleado-dni" class="col-form-label "><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="agregar-empleado-dni" maxlength="8">
                            <label for="agregar-empleado-cargo" class="col-form-label"><b>Cargo</b></label>
                            <select type="text" class="form-select shadow" id="agregar-empleado-cargo">
                                <option value="EMPLEADO DE CAJA">Empleado de Caja</option>
                                <option value="GERENTE">Gerente</option>
                                <option value="CHOFER">Chofer</option>
                            </select>
                            <label for="agregar-empleado-direccion" class="col-form-label"><b>Dirección</b></label>
                            <input type="text" class="form-control shadow" id="agregar-empleado-direccion">
                            <label for="agregar-empleado-telefono" class="col-form-label"><b>Telefono</b></label>
                            <input type="text" class="form-control shadow" id="agregar-empleado-telefono">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="agregar-empleado-correo" class="col-form-label"><b>Correo</b></label>
                        <input type="text" class="form-control shadow" id="agregar-empleado-correo">
                        <div class="mt-3 mb-3">
                            <label for="agregar-empleado-foto" class="form-label "><b>Subir Foto</b></label>
                            <div id="mostrar-foto-empleado" class="mx-auto mt-2 shadow" style="height: 240px; width: 200px; background-color: white; background-size: cover; background-position: center;">
                            </div>
                            <input class="form-control shadow mt-2" type="file" id="agregar-empleado-foto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-agregar-empleado">Agregar Empleado</button>
            </div>
        </div>
    </div>
</div>
<!-- CONFIRMAR AGREGAR -->
<div class="modal fade" id="confirmar-agregar-empleado" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de registrar el empleado en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="agregarEmpleado()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR EMPLEADO  -->
<div class="modal fade" id="editar-empleado" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 800px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto;">
            <div class="modal-header shadow ">
                <h1 class="modal-title fs-5 text-white"><b>Editar Datos del Empleado</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="editar-empleado-nombres" class="col-form-label"><b>Nombres</b></label>
                            <input type="text" class="form-control shadow" id="editar-empleado-nombres">
                            <label for="editar-empleado-apellidos" class="col-form-label"><b>Apellidos</b></label>
                            <input type="text" class="form-control shadow" id="editar-empleado-apellidos">
                            <label for="editar-empleado-dni" class=" col-form-label "><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="editar-empleado-dni" maxlength="8" disabled>
                            <label for="editar-empleado-cargo" class="col-form-label"><b>Cargo</b></label>
                            <select type="text" class="form-select shadow" id="editar-empleado-cargo">
                                <option value="EMPLEADO DE CAJA">Empleado de Caja</option>
                                <option value="GERENTE">Gerente</option>
                                <option value="CHOFER">Chofer</option>
                            </select>
                            <label for="editar-empleado-direccion" class="col-form-label"><b>Dirección</b></label>
                            <input type="text" class="form-control shadow" id="editar-empleado-direccion">
                            <label for="editar-empleado-telefono" class="col-form-label"><b>Telefono</b></label>
                            <input type="text" class="form-control shadow" id="editar-empleado-telefono">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="editar-empleado-correo" class="col-form-label"><b>Correo</b></label>
                        <input type="text" class="form-control shadow" id="editar-empleado-correo">
                        <div class="mt-3 mb-3">
                            <label for="editar-empleado-foto" class="form-label"><b>Subir Foto</b></label>
                            <div id="cargar-foto-empleado" class="mx-auto mt-2 shadow" style="height: 250px; width: 200px; background-color: white; background-size: cover; background-position: center;">
                            </div>
                            <input class="form-control mt-2" type="file" id="editar-empleado-foto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmar-editar-empleado">Editar Datos</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR EDITAR -->
<div class="modal fade" id="confirmar-editar-empleado" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de registrar el empleado en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="editarEmpleado()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR ELIMINAR -->
<div class="modal fade" id="confirmar-eliminar-empleado" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de eliminar el empleado seleccionado del sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="borrarEmpleado()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------- MODALS BOLETO ---------------------------------------------------------->

<!-- AGREGAR BOLETO  -->
<div class="modal fade" id="agregar-boleto" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 1200px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90rem; overflow-y: auto; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Registrar Boleto</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5><b>Datos del Cliente</b></h5>
                        <div class="mb-1">
                            <label for="agregar-boleto-id-cliente" class="col-form-label"><b>ID Cliente</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="agregar-boleto-id-cliente" readonly>
                                <button class="btn btn-info shadow" value="agregar" data-bs-toggle="modal" data-bs-target="#seleccionar-cliente" onclick="cargarClientes(this);"><i class="fa-solid fa-person-walking-luggage"></i></button>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-nombres" class="col-form-label"><b>Nombres</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-nombres" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-dni" class="col-form-label "><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-dni" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-carnet-extranjeria" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-pasaporte" class="col-form-label"><b>Pasaporte</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-pasaporte" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Datos de Ruta</b></h5>
                        <div class="mb-1">
                            <label for="agregar-boleto-id-ruta" class="col-form-label"><b>ID Ruta</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="agregar-boleto-id-ruta" readonly>
                                <button class="btn btn-info shadow" value="agregar" data-bs-toggle="modal" data-bs-target="#seleccionar-ruta" onclick="cargarRutas(this);"><i class="fa-solid fa-route"></i></button>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-ciudad-salida" class="col-form-label"><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-ciudad-salida" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-ciudad-llegada" class="col-form-label"><b>Ciudad de Llegada</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-ciudad-llegada" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-tipo-viaje" class="col-form-label"><b>Tipo de Viaje</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-tipo-viaje" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-precio" class="col-form-label"><b>Precio</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-precio" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Datos del Boleto</b></h5>
                        <div class="mb-1">
                            <label for="agregar-boleto-hora-viaje" class="col-form-label"><b>Hora de Viaje</b></label>
                            <select class="form-select shadow" id="agregar-boleto-hora-viaje">
                                <option value="1">6:00 AM</option>
                                <option value="2">8:00 AM</option>
                                <option value="3">10:00 AM</option>
                                <option value="4">12:00 PM</option>
                                <option value="5">14:00 PM</option>
                                <option value="6">16:00 PM</option>
                                <option value="7">18:00 PM</option>
                                <option value="8">20:00 PM</option>
                                <option value="9">22:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-fecha-viaje" class="col-form-label"><b>Fecha de Viaje</b> (año-mes-día)</label>
                            <input type="date" class="form-control shadow" id="agregar-boleto-fecha-viaje">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-hora-registro" class="col-form-label"><b>Hora de Registro</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-hora-registro" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-fecha-registro" class="col-form-label"><b>Fecha de Registro</b> (año-mes-día)</label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-fecha-registro" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-agregar-boleto">Agregar Boleto</button>
            </div>
        </div>
    </div>
</div>
<!-- CONFIRMAR AGREGAR -->
<div class="modal fade" id="confirmar-agregar-boleto" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de registrar el boleto en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="agregarBoleto()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR BOLETO  -->
<div class="modal fade" id="editar-boleto" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 1200px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90rem;  ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Editar Boleto</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5><b>Datos del Cliente</b></h5>
                        <div class="mb-1">
                            <label for="editar-boleto-id-cliente" class="col-form-label"><b>ID Cliente</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="editar-boleto-id-cliente" readonly>
                                <?php
                                if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                                } else {
                                ?>
                                    <button class="btn btn-info shadow" value="editar" data-bs-toggle="modal" data-bs-target="#seleccionar-cliente" onclick="cargarClientes(this);"><i class="fa-solid fa-person-walking-luggage"></i></button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-nombres" class="col-form-label"><b>Nombres</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-nombres" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-dni" class="col-form-label "><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-dni" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-carnet-extranjeria" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-pasaporte" class="col-form-label"><b>Pasaporte</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-pasaporte" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Datos de Ruta</b></h5>
                        <div class="mb-1">
                            <label for="editar-boleto-id-ruta" class="col-form-label"><b>ID Ruta</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="editar-boleto-id-ruta" readonly>
                                <button class="btn btn-info shadow" value="editar" data-bs-toggle="modal" data-bs-target="#seleccionar-ruta" onclick="cargarRutas(this);"><i class="fa-solid fa-route"></i></button>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-ciudad-salida" class="col-form-label"><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-ciudad-salida" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-ciudad-llegada" class="col-form-label"><b>Ciudad de Llegada</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-ciudad-llegada" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-tipo-viaje" class="col-form-label"><b>Tipo de Viaje</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-tipo-viaje" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-precio" class="col-form-label"><b>Precio</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-precio" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Datos del Boleto</b></h5>
                        <div class="mb-1">
                            <label for="editar-boleto-hora-viaje" class="col-form-label"><b>Hora de Viaje</b></label>
                            <select class="form-select shadow" id="editar-boleto-hora-viaje">
                                <option value="1">6:00 AM</option>
                                <option value="2">8:00 AM</option>
                                <option value="3">10:00 AM</option>
                                <option value="4">12:00 PM</option>
                                <option value="5">14:00 PM</option>
                                <option value="6">16:00 PM</option>
                                <option value="7">18:00 PM</option>
                                <option value="8">20:00 PM</option>
                                <option value="9">22:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-fecha-viaje" class="col-form-label"><b>Fecha de Viaje</b> (año-mes-día)</label>
                            <input type="date" class="form-control shadow" id="editar-boleto-fecha-viaje">
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-hora-registro" class="col-form-label"><b>Hora de Registro</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-hora-registro" <?php
                                                                                                            if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                                                                                                                echo "disabled";
                                                                                                            } else {
                                                                                                            ?> <?php
                                                                                                            }
                                                                                                                ?>>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-fecha-registro" class="col-form-label"><b>Fecha de Registro</b> (año-mes-día)</label>
                            <input type="text" class="form-control shadow" id="editar-boleto-fecha-registro" <?php
                                                                                                                if ($_SESSION["tipo_usuario"] == "CLIENTE") {
                                                                                                                    echo "disabled";
                                                                                                                } else {
                                                                                                                ?> <?php
                                                                                                                }
                                                                                                                    ?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-editar-boleto">Editar Boleto</button>
            </div>
        </div>
    </div>
</div>


<!-- INFO BOLETO  -->
<div class="modal fade" id="info-boleto" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 1200px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90rem; overflow-y: auto; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Información del Boleto</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5><b>Datos del Cliente</b></h5>
                        <div class="mb-1">
                            <label for="info-boleto-id-cliente" class="col-form-label"><b>ID Cliente</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-id-cliente" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-nombres" class="col-form-label"><b>Nombres</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-nombres" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-dni" class="col-form-label "><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-dni" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-carnet-extranjeria" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-pasaporte" class="col-form-label"><b>Pasaporte</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-pasaporte" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Datos de Ruta</b></h5>
                        <div class="mb-1">
                            <label for="info-boleto-id-ruta" class="col-form-label"><b>ID Ruta</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-id-ruta" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-ciudad-salida" class="col-form-label"><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-ciudad-salida" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-ciudad-llegada" class="col-form-label"><b>Ciudad de Llegada</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-ciudad-llegada" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-tipo-viaje" class="col-form-label"><b>Tipo de Viaje</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-tipo-viaje" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-precio" class="col-form-label"><b>Precio</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-precio" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Datos del Boleto</b></h5>
                        <div class="mb-1">
                            <label for="info-boleto-hora-viaje" class="col-form-label"><b>Hora de Viaje</b></label>
                            <select class="form-select shadow" id="info-boleto-hora-viaje" disabled>
                                <option value="1">6:00 AM</option>
                                <option value="2">8:00 AM</option>
                                <option value="3">10:00 AM</option>
                                <option value="4">12:00 PM</option>
                                <option value="5">14:00 PM</option>
                                <option value="6">16:00 PM</option>
                                <option value="7">18:00 PM</option>
                                <option value="8">20:00 PM</option>
                                <option value="9">22:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-fecha-viaje" class="col-form-label"><b>Fecha de Viaje</b> (año-mes-día)</label>
                            <input type="text" class="form-control shadow" id="info-boleto-fecha-viaje" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-hora-registro" class="col-form-label"><b>Hora de Registro</b></label>
                            <input type="text" class="form-control shadow" id="info-boleto-hora-registro" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="info-boleto-fecha-registro" class="col-form-label"><b>Fecha de Registro</b> (año-mes-día)</label>
                            <input type="text" class="form-control shadow" id="info-boleto-fecha-registro" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR EDITAR -->
<div class="modal fade" id="confirmar-editar-boleto" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5>¿Está seguro de editar el <b>boleto de viaje</b> en el sistema?</h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="editarBoleto()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>
<!-- SELECCIONAR CLIENTE -->
<div class="modal fade" id="seleccionar-cliente" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 900px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto;">
            <div class="modal-header shadow ">
                <h1 class="modal-title fs-5 text-white" id=""><b>Clientes Registrados</b></h1>
            </div>
            <div class="modal-body">
                <div class="card difuminado shadow" style="height: 65vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Clientes</h3>
                        <div class="input-group  ms-auto" style="width: 50%;">
                            <input id="seleccionar-buscar-cliente" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarClientePor();">
                            <select class="form-select bg-light shadow  fs-5" id="seleccionar-filtrar-cliente">
                                <option value="nombres" selected>Nombres</option>
                                <option value="apellidos">Apellidos</option>
                                <option value="dni">DNI</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 50vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Carnet Extranjeria</th>
                                        <th scope="col">Pasaporte</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Foto</th>
                                    </tr>
                                </thead>
                                <tbody id="seleccionar-tabla-clientes">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="" onclick="volver()">Volver</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="" onclick="setInputCliente()">Seleccionar Cliente</button>
            </div>
        </div>
    </div>
</div>

<!-- SELECCIONAR RUTA -->
<div class="modal fade" id="seleccionar-ruta" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 800px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto;">
            <div class="modal-header shadow ">
                <h1 class="modal-title fs-5 text-white" id=""><b>Rutas Registradas</b></h1>
            </div>
            <div class="modal-body">
                <div class="card difuminado shadow" style="height: 65vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Rutas</h3>
                        <div class="input-group  ms-auto" style="width: 50%;">
                            <input id="seleccionar-buscar-ruta" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarRutaPor();">
                            <select class="form-select bg-light shadow  fs-5" style id="seleccionar-filtrar-ruta">
                                <option value="id_ruta" selected>ID Ruta</option>
                                <option value="ciudad_salida">Ciudad de Partida</option>
                                <option value="ciudad_llegada">Ciudad de Destino</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 50vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Ruta</th>
                                        <th scope="col">Terminal Salida</th>
                                        <th scope="col">Terminal Llegada</th>
                                        <th scope="col">Ciudad Partida</th>
                                        <th scope="col">Ciudad Destino</th>
                                        <th scope="col">Tipo Viaje</th>
                                        <th scope="col">Costo</th>
                                    </tr>
                                </thead>
                                <tbody id="seleccionar-tabla-rutas">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="" onclick="volver()">Volver</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="" onclick="setInputRuta()">Seleccionar Ruta</button>
            </div>
        </div>
    </div>
</div>

<!-- SELECCIONAR TRANSPORTE -->
<div class="modal fade" id="seleccionar-transporte" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 900px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto;">
            <div class="modal-header shadow ">
                <h1 class="modal-title fs-5 text-white" id=""><b>Transportes Registradas</b></h1>
            </div>
            <div class="modal-body">
                <div class="card difuminado shadow" style="height: 65vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Transportes</h3>
                        <div class="input-group  ms-auto" style="width: 50%;">
                            <input id="seleccionar-buscar-transporte" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarTransportePor();">
                            <select class="form-select bg-light shadow  fs-5" style id="seleccionar-filtrar-transporte">
                                <option value="id_transporte" selected>ID Transporte</option>
                                <option value="modelo_transporte">Modelo de Transporte</option>
                                <option value="placa_transporte">Placa de Vehiculo</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 50vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Transporte</th>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Modelo de Vehiculo</th>
                                        <th scope="col">Placa de Vehiculo</th>
                                        <th scope="col">Seguro</th>
                                    </tr>
                                </thead>
                                <tbody id="seleccionar-tabla-transportes">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="" onclick="volver()">Volver</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="" onclick="setInputTransporte()">Seleccionar Transporte</button>
            </div>
        </div>
    </div>
</div>


<!-- CONFIRMAR ELIMINAR -->
<div class="modal fade" id="confirmar-eliminar-boleto" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de eliminar el <b>boleto de viaje</b> seleccionado del sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="borrarEmpleado()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------- MODALS CLIENTE ---------------------------------------------------------->

<!-- AGREGAR CLIENTE  -->
<div class="modal fade" id="agregar-cliente" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 900px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Registrar Cliente</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5><b>Datos Necesarios <i class="fa-solid fa-triangle-exclamation"></i></b></h5>
                        <div class="mb-1">
                            <label for="agregar-cliente-nombres" class="col-form-label"><b>Nombres</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-nombres">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-cliente-apellidos" class="col-form-label"><b>Apellidos</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-apellidos">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-cliente-dni" class="col-form-label"><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-dni">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-cliente-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria </b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-carnet-extranjeria">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-cliente-pasaporte" class="col-form-label "><b>Pasaporte</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-pasaporte">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Datos Opcionales</b></h5>
                        <div class="mb-1">
                            <label for="agregar-cliente-direccion" class="col-form-label"><b>Dirección</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-direccion">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-cliente-telefono" class="col-form-label"><b>Telefono</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-telefono">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-cliente-correo" class="col-form-label"><b>Correo</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-correo">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-cliente-genero" class="col-form-label"><b>Genero</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-genero">
                        </div>
                        <div class="mb-1">
                            <label for="agregar-cliente-fecha-registro" class="col-form-label"><b>Fecha de Registro</b></label>
                            <input type="text" class="form-control shadow" id="agregar-cliente-fecha-registro" value="<?php date_default_timezone_set('America/Lima');
                                                                                                                        echo date("Y-m-d"); ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <label for="agregar-cliente-foto" class="form-label " style="margin-top: 2.5rem;"><b>Subir Foto</b></label>
                            <div id="mostrar-cliente-foto" class="mx-auto mt-2 shadow" style="height: 250px; width: 200; background-color: white; background-size: cover; background-position: center;">
                            </div>
                            <input class="form-control shadow mt-2" type="file" id="agregar-cliente-foto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-agregar-cliente">Registrar Cliente</button>
            </div>
        </div>
    </div>
</div>
<!-- CONFIRMAR CLIENTE -->
<div class="modal fade" id="confirmar-agregar-cliente" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de registrar el <b>cliente</b> en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="agregarCliente()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR CLIENTE  -->
<div class="modal fade" id="editar-cliente" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 900px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto;">
            <div class="modal-header shadow ">
                <h1 class="modal-title fs-5 text-white" id=""><b>Editar Datos del Cliente</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5><b>Datos Necesarios <i class="fa-solid fa-triangle-exclamation"></i></b></h5>
                        <div class="mb-1">
                            <label for="editar-cliente-nombres" class="col-form-label"><b>Nombres</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-nombres">
                        </div>
                        <div class="mb-1">
                            <label for="editar-cliente-apellidos" class="col-form-label"><b>Apellidos</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-apellidos">
                        </div>
                        <div class="mb-1">
                            <label for="editar-cliente-dni" class="col-form-label"><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-dni">
                        </div>
                        <div class="mb-1">
                            <label for="editar-cliente-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria </b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-carnet-extranjeria">
                        </div>
                        <div class="mb-1">
                            <label for="editar-cliente-pasaporte" class="col-form-label "><b>Pasaporte</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-pasaporte">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <h5><b>Datos Opcionales</b></h5>
                        <div class="mb-1">
                            <label for="editar-cliente-direccion" class="col-form-label"><b>Dirección</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-direccion">
                        </div>
                        <div class="mb-1">
                            <label for="editar-cliente-telefono" class="col-form-label"><b>Telefono</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-telefono">
                        </div>
                        <div class="mb-1">
                            <label for="editar-cliente-correo" class="col-form-label"><b>Correo</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-correo">
                        </div>
                        <div class="mb-1">
                            <label for="editar-cliente-genero" class="col-form-label"><b>Genero</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-genero">
                        </div>
                        <div class="mb-1">
                            <label for="editar-cliente-fecha-registro" class="col-form-label"><b>Fecha de Registro</b></label>
                            <input type="text" class="form-control shadow" id="editar-cliente-fecha-registro">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <label for="editar-cliente-foto" class="form-label" style="margin-top: 2.5rem;"><b>Subir Foto</b></label>
                            <div id="cargar-cliente-foto" class="mx-auto mt-2 shadow" style="height: 250px; width: 200; background-color: white; background-size: cover; background-position: center;">
                            </div>
                            <input class="form-control shadow mt-2" type="file" id="editar-cliente-foto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmar-editar-cliente">Editar Datos</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR EDITAR -->
<div class="modal fade" id="confirmar-editar-cliente" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5>¿Está seguro de editar el <b>cliente</b> en el sistema?</h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="editarCliente()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR ELIMINAR -->
<div class="modal fade" id="confirmar-eliminar-cliente" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de eliminar el <b>cliente</b> seleccionado del sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="borrarCliente()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------- MODALS RUTA ---------------------------------------------------------->
<!-- AGREGAR RUTA  -->
<div class="modal fade" id="agregar-ruta" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 500px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 39rem; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Registrar Ruta</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-2">
                            <label for="agregar-ruta-terminal-salida" class="col-form-label"><b>Terminal de Salida</b></label>
                            <input type="text" class="form-control shadow" id="agregar-ruta-terminal-salida">
                            <label for="agregar-ruta-terminal-llegada" class=" col-form-label"><b>Terminal de LLegada</b></label>
                            <input type="text" class="form-control shadow" id="agregar-ruta-terminal-llegada">
                            <label for="agregar-ruta-ciudad-salida" class="col-form-label "><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="agregar-ruta-ciudad-salida">
                            <label for="agregar-ruta-ciudad-llegada" class="col-form-label"><b>Ciudad de Destino</b></label>
                            <input type="text" class="form-control shadow" id="agregar-ruta-ciudad-llegada">
                            <label for="agregar-ruta-tipo-viaje" class="col-form-label"><b>Tipo de Viaje</b></label>
                            <input type="text" class="form-control shadow" id="agregar-ruta-tipo-viaje" value="TERRESTRE" disabled>
                            <label for="agregar-ruta-costo" class="col-form-label"><b>Costo</b></label>
                            <input type="number" class="form-control shadow" id="agregar-ruta-costo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-agregar-ruta">Agregar Ruta</button>
            </div>
        </div>
    </div>
</div>
<!-- CONFIRMAR AGREGAR -->
<div class="modal fade" id="confirmar-agregar-ruta" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de registrar la ruta en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="agregarRuta()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR RUTA  -->
<div class="modal fade" id="editar-ruta" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 500px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 39rem; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Editar Ruta</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-2">
                            <label for="editar-ruta-terminal-salida" class="col-form-label"><b>Terminal de Salida</b></label>
                            <input type="text" class="form-control shadow" id="editar-ruta-terminal-salida">
                            <label for="editar-ruta-terminal-llegada" class=" col-form-label"><b>Terminal de LLegada</b></label>
                            <input type="text" class="form-control shadow" id="editar-ruta-terminal-llegada">
                            <label for="editar-ruta-ciudad-salida" class="col-form-label "><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="editar-ruta-ciudad-salida">
                            <label for="editar-ruta-ciudad-llegada" class="col-form-label"><b>Ciudad de Destino</b></label>
                            <input type="text" class="form-control shadow" id="editar-ruta-ciudad-llegada">
                            <label for="editar-ruta-tipo-viaje" class="col-form-label"><b>Tipo de Viaje</b></label>
                            <input type="text" class="form-control shadow" id="editar-ruta-tipo-viaje" value="TERRESTRE" disabled>
                            <label for="editar-ruta-costo" class="col-form-label"><b>Costo</b></label>
                            <input type="number" class="form-control shadow" id="editar-ruta-costo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-editar-ruta">Editar Ruta</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR EDITAR -->
<div class="modal fade" id="confirmar-editar-ruta" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5>¿Está seguro de editar la <b>ruta</b> en el sistema?</h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="editarRuta()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR ELIMINAR -->
<div class="modal fade" id="confirmar-eliminar-ruta" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de eliminar la <b>ruta</b> seleccionada del sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="borrarRuta()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------- MODALS TRANSPORTE ---------------------------------------------------------->
<!-- AGREGAR TRANSPORTE  -->
<div class="modal fade" id="agregar-transporte" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 700px !important;">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content rounded-4 shadow " style="height: 39rem; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Registrar Transporte</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Datos del Chofer</b></h5>
                        <div class="mb-2">
                            <label for="agregar-transporte-id-empleado" class="col-form-label"><b>ID Empleado</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="agregar-transporte-id-empleado" readonly>
                                <button class="btn btn-info" value="agregar" data-bs-toggle="modal" data-bs-target="#seleccionar-empleado" onclick="cargarEmpleados(this)"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <label for="agregar-transporte-nombre-completo" class=" col-form-label"><b>Nombre Completo</b></label>
                            <input type="text" class="form-control shadow" id="agregar-transporte-nombre-completo" readonly>
                            <label for="agregar-transporte-dni" class="col-form-label "><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="agregar-transporte-dni" readonly>
                            <label for="agregar-transporte-telefono" class="col-form-label"><b>Telefono</b></label>
                            <input type="text" class="form-control shadow" id="agregar-transporte-telefono" readonly>
                            <label for="agregar-transporte-correo" class="col-form-label"><b>Correo</b></label>
                            <input type="text" class="form-control shadow" id="agregar-transporte-correo" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Datos del Vehiculo</b></h5>
                        <div class="mb-2">
                            <label for="agregar-transporte-modelo-vehiculo" class="col-form-label"><b>Modelo de Vehiculo</b></label>
                            <input type="text" class="form-control shadow" id="agregar-transporte-modelo-vehiculo">
                            <label for="agregar-transporte-placa-vehiculo" class=" col-form-label"><b>Placa de Vehiculo</b></label>
                            <input type="text" class="form-control shadow" id="agregar-transporte-placa-vehiculo">
                            <label for="agregar-transporte-seguro" class="col-form-label "><b>Seguro</b></label>
                            <input type="text" class="form-control shadow" id="agregar-transporte-seguro">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-agregar-transporte">Agregar Transporte</button>
            </div>
        </div>
    </div>
</div>
<!-- CONFIRMAR AGREGAR -->
<div class="modal fade" id="confirmar-agregar-transporte" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de registrar el transporte en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="agregarTransporte()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR TRANSPORTE  -->
<div class="modal fade" id="editar-transporte" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 700px !important;">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content rounded-4 shadow " style="height: 39rem; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Editar Transporte</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Datos del Chofer</b></h5>
                        <div class="mb-2">
                            <label for="editar-transporte-id-empleado" class="col-form-label"><b>ID Empleado</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="editar-transporte-id-empleado" readonly>
                                <button class="btn btn-info" value="editar" data-bs-toggle="modal" data-bs-target="#seleccionar-empleado" onclick="cargarEmpleados(this)"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <label for="editar-transporte-nombre-completo" class=" col-form-label"><b>Nombre Completo</b></label>
                            <input type="text" class="form-control shadow" id="editar-transporte-nombre-completo" readonly>
                            <label for="editar-transporte-dni" class="col-form-label "><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="editar-transporte-dni" readonly>
                            <label for="editar-transporte-telefono" class="col-form-label"><b>Telefono</b></label>
                            <input type="text" class="form-control shadow" id="editar-transporte-telefono" readonly>
                            <label for="editar-transporte-correo" class="col-form-label"><b>Correo</b></label>
                            <input type="text" class="form-control shadow" id="editar-transporte-correo" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Datos del Vehiculo</b></h5>
                        <div class="mb-2">
                            <label for="editar-transporte-modelo-vehiculo" class="col-form-label"><b>Modelo de Vehiculo</b></label>
                            <input type="text" class="form-control shadow" id="editar-transporte-modelo-vehiculo">
                            <label for="editar-transporte-placa-vehiculo" class=" col-form-label"><b>Placa de Vehiculo</b></label>
                            <input type="text" class="form-control shadow" id="editar-transporte-placa-vehiculo">
                            <label for="editar-transporte-seguro" class="col-form-label "><b>Seguro</b></label>
                            <input type="text" class="form-control shadow" id="editar-transporte-seguro">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-editar-transporte">Editar Transporte</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR EDITAR -->
<div class="modal fade" id="confirmar-editar-transporte" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5>¿Está seguro de editar el <b>transporte</b> en el sistema?</h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="editarTransporte()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>
<!-- SELECCIONAR EMPLEADO -->
<div class="modal fade" id="seleccionar-empleado" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 1000px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto;">
            <div class="modal-header shadow ">
                <h1 class="modal-title fs-5 text-white" id=""><b>Empleados Registrados</b></h1>
            </div>
            <div class="modal-body">
                <div class="card difuminado shadow" style="height: 65vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Empleados</h3>
                        <div class="input-group  ms-auto" style="width: 50%;">
                            <input id="seleccionar-buscar-empleado" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarEmpleadoPor();">
                            <select class="form-select bg-light shadow  fs-5" style id="seleccionar-filtrar-empleado">
                                <option value="nombres" selected>Nombres</option>
                                <option value="apellidos">Apellidos</option>
                                <option value="dni">DNI</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 50vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Empleado</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Foto</th>
                                    </tr>
                                </thead>
                                <tbody id="seleccionar-tabla-empleados">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="" onclick="volver()">Volver</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="" onclick="setInputEmpleado()">Seleccionar Empleado</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR ELIMINAR -->
<div class="modal fade" id="confirmar-eliminar-transporte" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de eliminar el <b>transporte</b> seleccionada del sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="borrarTransporte()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------- MODALS VENTA ---------------------------------------------------------->
<!-- AGREGAR VENTA  -->
<div class="modal fade" id="agregar-venta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 1100px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Registrar Venta</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Datos del Cliente</b></h5>
                        <div class="mb-2 d-flex ">
                            <div class="mb-1" style="width: 15%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-id-cliente" class="col-form-label"><b>ID Cliente</b></label>
                                <div class="input-group">
                                    <input type="text" class="form-control shadow" id="agregar-venta-id-cliente" readonly>
                                    <button class="btn btn-info shadow" value="agregar" data-bs-toggle="modal" data-bs-target="#seleccionar-cliente-venta" onclick="cargarClientes(this);"><i class="fa-solid fa-person-walking-luggage"></i></button>
                                </div>
                            </div>
                            <div class="mb-1" style="width: 30%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-nombres" class="col-form-label"><b>Nombres</b></label>
                                <input type="text" class="form-control shadow" id="agregar-venta-nombres" readonly>
                            </div>
                            <div class="mb-1" style="width: 15%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-dni" class="col-form-label "><b>DNI</b></label>
                                <input type="text" class="form-control shadow" id="agregar-venta-dni" readonly>
                            </div>
                            <div class="mb-1" style="width: 20%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria</b></label>
                                <input type="text" class="form-control shadow" id="agregar-venta-carnet-extranjeria" readonly>
                            </div>
                            <div class="mb-1" style="width: 20%; padding: 0 0 0 10px;">
                                <label for="agregar-venta-pasaporte" class="col-form-label"><b>Pasaporte</b></label>
                                <input type="text" class="form-control shadow" id="agregar-venta-pasaporte" readonly>
                            </div>
                        </div>
                        <h5><b>Datos de la Venta</b></h5>
                        <div class="mb-2 d-flex ">
                            <div class="mb-1" style="width: 15%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-cant-boletos" class="col-form-label"><b>N° Boletos</b></label>
                                <input type="text" class="form-control shadow" value="0" id="agregar-venta-cant-boletos" readonly>
                            </div>
                            <div class="mb-1" style="width: 20%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-tipo-pago" class="col-form-label"><b>Tipo de Pago</b></label>
                                <select type="text" class="form-select shadow" id="agregar-venta-tipo-pago">
                                    <option value="TARJETA" selected>Tarjeta</option>
                                    <option value="YAPE">Yape</option>
                                    <option value="IZIPAY">Izipay</option>
                                    <option value="PLIN">Plin</option>

                                </select>
                            </div>
                            <div class="mb-1" style="width: 15%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-monto" class="col-form-label "><b>Monto Total (S/.)</b></label>
                                <input type="text" class="form-control shadow" value="0" id="agregar-venta-monto" readonly>
                            </div>
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-hora-registro" class="col-form-label"><b>Hora de Registro</b></label>
                                <input type="text" class="form-control shadow" id="agregar-venta-hora-registro" readonly>
                            </div>
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="agregar-venta-fecha-registro" class="col-form-label"><b>Fecha de Registro</b></label>
                                <input type="text" class="form-control shadow" id="agregar-venta-fecha-registro" readonly>
                            </div>
                        </div>
                        <div class="w-100 d-flex ">
                            <h5><b>Boletos</b></h5>
                            <div class="d-flex offset-md-9">
                                <button id="btn-agregar-boleto-venta" class="btn btn-info" style="margin: 10px;" value="0" data-bs-toggle="modal" data-bs-target="#agregar-boleto-venta" disabled>Agregar</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="table-responsive " style="height: 30vh;">
                                <table class="table table-hover">
                                    <thead style="vertical-align: top;">
                                        <tr style="font-size:18px;">
                                            <th scope="col">#</th>
                                            <th scope="col">ID Ruta</th>
                                            <th scope="col">Ciudad de Partida</th>
                                            <th scope="col">Ciudad de Destino</th>
                                            <th scope="col">ID Hora</th>
                                            <th scope="col">Hora de Viaje</th>
                                            <th scope="col">Fecha de Viaje</th>
                                            <th scope="col">Costo de Viaje</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla-boletos-venta">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button id="btn-registrar-venta" type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-agregar-venta" disabled>Agregar Venta</button>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR VENTA  -->
<div class="modal fade" id="editar-venta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 1100px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Editar Venta</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Datos del Cliente</b></h5>
                        <div class="mb-2 d-flex ">
                            <div class="mb-1" style="width: 15%; padding: 0 10px 0 10px;">
                                <label for="editar-venta-id-cliente" class="col-form-label"><b>ID Cliente</b></label>
                                <div class="input-group">
                                    <input type="text" class="form-control shadow" id="editar-venta-id-cliente" readonly>
                                    <button class="btn btn-info shadow" value="editar" data-bs-toggle="modal" data-bs-target="#seleccionar-cliente-venta" onclick="cargarClientes(this);"><i class="fa-solid fa-person-walking-luggage"></i></button>
                                </div>
                            </div>
                            <div class="mb-1" style="width: 30%; padding: 0 10px 0 10px;">
                                <label for="editar-venta-nombres" class="col-form-label"><b>Nombres</b></label>
                                <input type="text" class="form-control shadow" id="editar-venta-nombres" readonly>
                            </div>
                            <div class="mb-1" style="width: 15%; padding: 0 10px 0 10px;">
                                <label for="editar-venta-dni" class="col-form-label "><b>DNI</b></label>
                                <input type="text" class="form-control shadow" id="editar-venta-dni" readonly>
                            </div>
                            <div class="mb-1" style="width: 20%; padding: 0 10px 0 10px;">
                                <label for="editar-venta-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria</b></label>
                                <input type="text" class="form-control shadow" id="editar-venta-carnet-extranjeria" readonly>
                            </div>
                            <div class="mb-1" style="width: 20%; padding: 0 0 0 10px;">
                                <label for="editar-venta-pasaporte" class="col-form-label"><b>Pasaporte</b></label>
                                <input type="text" class="form-control shadow" id="editar-venta-pasaporte" readonly>
                            </div>
                        </div>
                        <h5><b>Datos de la Venta</b></h5>
                        <div class="mb-2 d-flex ">
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="editar-venta-cant-boletos" class="col-form-label"><b>N° Boletos</b></label>
                                <input type="text" class="form-control shadow" value="0" id="editar-venta-cant-boletos" readonly>
                            </div>
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="editar-venta-tipo-pago" class="col-form-label"><b>Tipo de Pago</b></label>
                                <select type="text" class="form-select shadow" id="editar-venta-tipo-pago">
                                    <option value="TARJETA" selected>Tarjeta</option>
                                    <option value="YAPE">Yape</option>
                                    <option value="IZIPAY">Izipay</option>
                                    <option value="PLIN">Plin</option>

                                </select>
                            </div>
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="editar-venta-monto" class="col-form-label "><b>Monto Total (S/.)</b></label>
                                <input type="text" class="form-control shadow" value="0" id="editar-venta-monto" readonly>
                            </div>
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="editar-venta-fecha-registro" class="col-form-label"><b>Fecha de Registro</b></label>
                                <input type="text" class="form-control shadow" id="editar-venta-fecha-registro" readonly>
                            </div>
                        </div>
                        <div class="w-100 d-flex ">
                            <h5><b>Boletos</b></h5>
                            <div class="d-flex offset-md-9">
                            </div>
                        </div>
                        <div class="card">
                            <div class="table-responsive " style="height: 30vh;">
                                <table class="table table-hover">
                                    <thead style="vertical-align: top;">
                                        <tr style="font-size:18px;">
                                            <th scope="col">#</th>
                                            <th scope="col">ID Ruta</th>
                                            <th scope="col">Ciudad de Partida</th>
                                            <th scope="col">Ciudad de Destino</th>
                                            <th scope="col">ID Hora</th>
                                            <th scope="col">Hora de Viaje</th>
                                            <th scope="col">Fecha de Viaje</th>
                                            <th scope="col">Costo de Viaje</th>
                                        </tr>
                                    </thead>
                                    <tbody id="editar-tabla-boletos-venta">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
                <button id="btn-editar-registrar-venta" type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#confirmar-editar-venta" >Editar Venta</button>
            </div>
        </div>
    </div>
</div>

<!-- AGREGAR BOLETO VENTA -->
<div class="modal fade" id="agregar-boleto-venta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" style="--bs-modal-width: 800px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90rem; overflow-y: auto; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Agregar Boleto</b></h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Datos de Ruta</b></h5>
                        <div class="mb-1">
                            <label for="agregar-boleto-venta-id-ruta" class="col-form-label"><b>ID Ruta</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="agregar-boleto-venta-id-ruta" readonly>
                                <button class="btn btn-info shadow" value="agregar" data-bs-toggle="modal" data-bs-target="#seleccionar-ruta-venta" onclick="cargarRutas(this);"><i class="fa-solid fa-route"></i></button>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-venta-ciudad-salida" class="col-form-label"><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-venta-ciudad-salida" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-venta-ciudad-llegada" class="col-form-label"><b>Ciudad de Llegada</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-venta-ciudad-llegada" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-venta-tipo-viaje" class="col-form-label"><b>Tipo de Viaje</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-venta-tipo-viaje" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-venta-precio" class="col-form-label"><b>Precio</b></label>
                            <input type="text" class="form-control shadow" id="agregar-boleto-venta-precio" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Datos del Boleto</b></h5>
                        <div class="mb-1">
                            <label for="agregar-boleto-venta-hora-viaje" class="col-form-label"><b>Hora de Viaje</b></label>
                            <select class="form-select shadow" id="agregar-boleto-venta-hora-viaje">
                                <option value="1">6:00 AM</option>
                                <option value="2">8:00 AM</option>
                                <option value="3">10:00 AM</option>
                                <option value="4">12:00 PM</option>
                                <option value="5">14:00 PM</option>
                                <option value="6">16:00 PM</option>
                                <option value="7">18:00 PM</option>
                                <option value="8">20:00 PM</option>
                                <option value="9">22:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="agregar-boleto-venta-fecha-viaje" class="col-form-label"><b>Fecha de Viaje</b> (año-mes-día)</label>
                            <input type="date" class="form-control shadow" id="agregar-boleto-venta-fecha-viaje" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-primary shadow" value="0" data-bs-dismiss="modal" onclick="agregarBoletoEnLista(this)">Agregar Boleto a la Lista</button>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR BOLETO VENTA -->
<div class="modal fade" id="editar-boleto-venta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" style="--bs-modal-width: 800px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90rem; overflow-y: auto; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Editar Boleto</b></h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Datos de Ruta</b></h5>
                        <div class="mb-1">
                            <label for="editar-boleto-venta-id-ruta" class="col-form-label"><b>ID Ruta</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="editar-boleto-venta-id-ruta" readonly>
                                <button class="btn btn-info shadow" value="editar" data-bs-toggle="modal" data-bs-target="#seleccionar-ruta-venta" onclick="cargarRutas(this);"><i class="fa-solid fa-route"></i></button>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-venta-ciudad-salida" class="col-form-label"><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-venta-ciudad-salida" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-venta-ciudad-llegada" class="col-form-label"><b>Ciudad de Llegada</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-venta-ciudad-llegada" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-venta-tipo-viaje" class="col-form-label"><b>Tipo de Viaje</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-venta-tipo-viaje" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-venta-precio" class="col-form-label"><b>Precio</b></label>
                            <input type="text" class="form-control shadow" id="editar-boleto-venta-precio" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Datos del Boleto</b></h5>
                        <div class="mb-1">
                            <label for="editar-boleto-venta-hora-viaje" class="col-form-label"><b>Hora de Viaje</b></label>
                            <select class="form-select shadow" id="editar-boleto-venta-hora-viaje">
                                <option value="1">6:00 AM</option>
                                <option value="2">8:00 AM</option>
                                <option value="3">10:00 AM</option>
                                <option value="4">12:00 PM</option>
                                <option value="5">14:00 PM</option>
                                <option value="6">16:00 PM</option>
                                <option value="7">18:00 PM</option>
                                <option value="8">20:00 PM</option>
                                <option value="9">22:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="editar-boleto-venta-fecha-viaje" class="col-form-label"><b>Fecha de Viaje</b> (año-mes-día)</label>
                            <input type="text" class="form-control shadow" id="editar-boleto-venta-fecha-viaje" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-primary shadow" value="0" data-bs-dismiss="modal" onclick="EditarBoletoEnLista(this)">Editar el Boleto</button>
            </div>
        </div>
    </div>
</div>

<!-- SELECCIONAR CLIENTE - VENTA -->
<div class="modal fade" id="seleccionar-cliente-venta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 900px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto;">
            <div class="modal-header shadow ">
                <h1 class="modal-title fs-5 text-white" id=""><b>Clientes Registrados</b></h1>
            </div>
            <div class="modal-body">
                <div class="card difuminado shadow" style="height: 65vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Clientes</h3>
                        <div class="input-group  ms-auto" style="width: 50%;">
                            <input id="seleccionar-buscar-cliente-venta" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarClientePor();">
                            <select class="form-select bg-light shadow  fs-5" id="seleccionar-filtrar-cliente-venta">
                                <option value="nombres" selected>Nombres</option>
                                <option value="apellidos">Apellidos</option>
                                <option value="dni">DNI</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 50vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Carnet Extranjeria</th>
                                        <th scope="col">Pasaporte</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Foto</th>
                                    </tr>
                                </thead>
                                <tbody id="seleccionar-tabla-clientes-venta">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="" onclick="setInputCliente()">Seleccionar Cliente</button>
            </div>
        </div>
    </div>
</div>


<!-- SELECCIONAR RUTA - VENTA -->
<div class="modal fade" id="seleccionar-ruta-venta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 800px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; overflow-y: auto;">
            <div class="modal-header shadow ">
                <h1 class="modal-title fs-5 text-white" id=""><b>Rutas Registradas</b></h1>
            </div>
            <div class="modal-body">
                <div class="card difuminado shadow" style="height: 65vh;">
                    <div class="card-header d-flex">
                        <h3>Lista de Rutas</h3>
                        <div class="input-group  ms-auto" style="width: 50%;">
                            <input id="seleccionar-buscar-ruta-venta" class="form-control w-50 shadow" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarRutaPor();">
                            <select class="form-select bg-light shadow  fs-5" style id="seleccionar-filtrar-ruta-venta">
                                <option value="id_ruta" selected>ID Ruta</option>
                                <option value="ciudad_salida">Ciudad de Partida</option>
                                <option value="ciudad_llegada">Ciudad de Destino</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="height: 50vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Ruta</th>
                                        <th scope="col">Terminal Salida</th>
                                        <th scope="col">Terminal Llegada</th>
                                        <th scope="col">Ciudad Partida</th>
                                        <th scope="col">Ciudad Destino</th>
                                        <th scope="col">Tipo Viaje</th>
                                        <th scope="col">Costo</th>
                                    </tr>
                                </thead>
                                <tbody id="seleccionar-tabla-rutas-venta">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="" onclick="volver()">Volver</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="" onclick="setInputRuta()">Seleccionar Ruta</button>
            </div>
        </div>
    </div>
</div>


<!-- CONFIRMAR AGREGAR -->
<div class="modal fade" id="confirmar-agregar-venta" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de registrar la venta en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="agregarVenta()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>


<!-- CONFIRMAR EDITAR -->
<div class="modal fade" id="confirmar-editar-venta" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de editar la venta en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="editarVenta()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>
<!-- INFO VENTA -->
<div class="modal fade" id="info-venta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true" style="--bs-modal-width: 1100px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 90vh; ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id=""><b>Información de la Venta</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Datos del Cliente</b></h5>
                        <div class="mb-2 d-flex ">
                            <div class="mb-1" style="width: 15%; padding: 0 10px 0 10px;">
                                <label for="info-venta-id-cliente" class="col-form-label"><b>ID Cliente</b></label>
                                <div class="input-group">
                                    <input type="text" class="form-control shadow" id="info-venta-id-cliente" readonly>
                                </div>
                            </div>
                            <div class="mb-1" style="width: 30%; padding: 0 10px 0 10px;">
                                <label for="info-venta-nombres" class="col-form-label"><b>Nombres</b></label>
                                <input type="text" class="form-control shadow" id="info-venta-nombres" readonly>
                            </div>
                            <div class="mb-1" style="width: 15%; padding: 0 10px 0 10px;">
                                <label for="info-venta-dni" class="col-form-label "><b>DNI</b></label>
                                <input type="text" class="form-control shadow" id="info-venta-dni" readonly>
                            </div>
                            <div class="mb-1" style="width: 20%; padding: 0 10px 0 10px;">
                                <label for="info-venta-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria</b></label>
                                <input type="text" class="form-control shadow" id="info-venta-carnet-extranjeria" readonly>
                            </div>
                            <div class="mb-1" style="width: 20%; padding: 0 0 0 10px;">
                                <label for="info-venta-pasaporte" class="col-form-label"><b>Pasaporte</b></label>
                                <input type="text" class="form-control shadow" id="info-venta-pasaporte" readonly>
                            </div>
                        </div>
                        <h5><b>Datos de la Venta</b></h5>
                        <div class="mb-2 d-flex ">
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="info-venta-cant-boletos" class="col-form-label"><b>N° Boletos</b></label>
                                <input type="text" class="form-control shadow" value="0" id="info-venta-cant-boletos" readonly>
                            </div>
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="info-venta-tipo-pago" class="col-form-label"><b>Tipo de Pago</b></label>
                                <select type="text" class="form-select shadow" id="info-venta-tipo-pago" readonly>
                                    <option value="TARJETA" disabled>Tarjeta</option>
                                    <option value="YAPE" disabled>Yape</option>
                                    <option value="IZIPAY" disabled>Izipay</option>
                                    <option value="PLIN" disabled>Plin</option>

                                </select>
                            </div>
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="info-venta-monto" class="col-form-label "><b>Monto Total (S/.)</b></label>
                                <input type="text" class="form-control shadow" value="0" id="info-venta-monto" readonly>
                            </div>
                            <div class="mb-1" style="width: 25%; padding: 0 10px 0 10px;">
                                <label for="info-venta-fecha-registro" class="col-form-label"><b>Fecha de Registro</b></label>
                                <input type="text" class="form-control shadow" id="info-venta-fecha-registro" readonly>
                            </div>
                        </div>
                        <div class="w-100 d-flex ">
                            <h5><b>Boletos</b></h5>
                            <div class="d-flex offset-md-9">
                            </div>
                        </div>
                        <div class="card">
                            <div class="table-responsive " style="height: 30vh;">
                                <table class="table table-hover">
                                    <thead style="vertical-align: top;">
                                        <tr style="font-size:18px;">
                                            <th scope="col">#</th>
                                            <th scope="col">ID Ruta</th>
                                            <th scope="col">Ciudad de Partida</th>
                                            <th scope="col">Ciudad de Destino</th>
                                            <th scope="col">ID Hora</th>
                                            <th scope="col">Hora de Viaje</th>
                                            <th scope="col">Fecha de Viaje</th>
                                            <th scope="col">Costo de Viaje</th>
                                        </tr>
                                    </thead>
                                    <tbody id="info-tabla-boletos-venta">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">

                <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Volver</button>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------- MODALS DE REGISTRAR BOLETO - CLIENTE --------------------------------------------------------->
<!-- AGREGAR BOLETO VENTA -->
<div class="modal fade" id="modal-registrar-boleto-venta" tabindex="-1" aria-hidden="true" style="--bs-modal-width: 600px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 35rem; overflow-y: auto; ">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-white" id=""><b>Agregar Boleto</b></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Datos de Ruta</b></h5>
                        <div class="mb-1">
                            <label for="modal-registrar-boleto-venta-id-ruta" class="col-form-label"><b>ID Ruta</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="modal-registrar-boleto-venta-id-ruta" readonly>
                                <button class="btn btn-info shadow" value="registrar" data-bs-toggle="modal" data-bs-target="#seleccionar-ruta-venta" onclick="cargarRutas(this);"><i class="fa-solid fa-route"></i></button>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="modal-registrar-boleto-venta-ciudad-salida" class="col-form-label"><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="modal-registrar-boleto-venta-ciudad-salida" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="modal-registrar-boleto-venta-ciudad-llegada" class="col-form-label"><b>Ciudad de Llegada</b></label>
                            <input type="text" class="form-control shadow" id="modal-registrar-boleto-venta-ciudad-llegada" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="modal-registrar-boleto-venta-precio" class="col-form-label"><b>Precio</b></label>
                            <input type="text" class="form-control shadow" id="modal-registrar-boleto-venta-precio" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Datos del Boleto</b></h5>
                        <div class="mb-1">
                            <label for="modal-registrar-boleto-venta-hora-viaje" class="col-form-label"><b>Hora de Viaje</b></label>
                            <select class="form-select shadow" id="modal-registrar-boleto-venta-hora-viaje">
                                <option value="1">6:00 AM</option>
                                <option value="2">8:00 AM</option>
                                <option value="3">10:00 AM</option>
                                <option value="4">12:00 PM</option>
                                <option value="5">14:00 PM</option>
                                <option value="6">16:00 PM</option>
                                <option value="7">18:00 PM</option>
                                <option value="8">20:00 PM</option>
                                <option value="9">22:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="modal-registrar-boleto-venta-fecha-viaje" class="col-form-label"><b>Fecha de Viaje</b> (año-mes-día)</label>
                            <input type="date" class="form-control shadow" id="modal-registrar-boleto-venta-fecha-viaje">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>

                <button type="button" class="btn btn-primary shadow" value="0" data-bs-dismiss="modal" onclick="agregarBoletoEnLista(this)">Agregar Boleto a la Lista</button>
            </div>
        </div>
    </div>
</div>

<!-- CONFIRMAR AGREGAR -->
<div class="modal fade" id="confirmar-agregar-venta-cliente" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Mensaje de Confirmación</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5><b>¿Está seguro de registrar los boletos en el sistema?</b></h5>
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success m-3" onclick="registrarVenta()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Sí</button>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR BOLETO VENTA -->
<div class="modal fade" id="modal-editar-boleto-venta" tabindex="-1" aria-hidden="true" style="--bs-modal-width: 600px !important;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content rounded-4 shadow " style="height: 35rem; overflow-y: auto; ">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-white" id=""><b>Editar Boleto</b></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Datos de Ruta</b></h5>
                        <div class="mb-1">
                            <label for="modal-editar-boleto-venta-id-ruta" class="col-form-label"><b>ID Ruta</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow" id="modal-editar-boleto-venta-id-ruta" readonly>
                                <button class="btn btn-info shadow" value="editar" data-bs-toggle="modal" data-bs-target="#seleccionar-ruta-venta" onclick="cargarRutas(this);"><i class="fa-solid fa-route"></i></button>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="modal-editar-boleto-venta-ciudad-salida" class="col-form-label"><b>Ciudad de Partida</b></label>
                            <input type="text" class="form-control shadow" id="modal-editar-boleto-venta-ciudad-salida" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="modal-editar-boleto-venta-ciudad-llegada" class="col-form-label"><b>Ciudad de Llegada</b></label>
                            <input type="text" class="form-control shadow" id="modal-editar-boleto-venta-ciudad-llegada" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="modal-editar-boleto-venta-precio" class="col-form-label"><b>Precio</b></label>
                            <input type="text" class="form-control shadow" id="modal-editar-boleto-venta-precio" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Datos del Boleto</b></h5>
                        <div class="mb-1">
                            <label for="modal-editar-boleto-venta-hora-viaje" class="col-form-label"><b>Hora de Viaje</b></label>
                            <select class="form-select shadow" id="modal-editar-boleto-venta-hora-viaje">
                                <option value="1">6:00 AM</option>
                                <option value="2">8:00 AM</option>
                                <option value="3">10:00 AM</option>
                                <option value="4">12:00 PM</option>
                                <option value="5">14:00 PM</option>
                                <option value="6">16:00 PM</option>
                                <option value="7">18:00 PM</option>
                                <option value="8">20:00 PM</option>
                                <option value="9">22:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="modal-editar-boleto-venta-fecha-viaje" class="col-form-label"><b>Fecha de Viaje</b> (año-mes-día)</label>
                            <input type="date" class="form-control shadow" id="modal-editar-boleto-venta-fecha-viaje">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary shadow" value="0" data-bs-dismiss="modal" onclick="editarBoleto()">Editar el Boleto</button>
            </div>
        </div>
    </div>
</div>


<!-------------------------------------------------------- RESPUESTA DEL SERVIDOR --------------------------------------------------------->
<div class="modal fade" id="respuesta-servidor" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow ">
            <div class="modal-header shadow ">
                <div class="w-100 text-center">
                    <h3 class="modal-title fs-5 text-white" id=""><b>Respuesta del Servidor</b></h3>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="mensaje-servidor">
            </div>
            <div class="d-flex mx-auto">
                <button type="button" class="btn btn-danger m-3" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>