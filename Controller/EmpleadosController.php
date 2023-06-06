<?php

session_start();
if (isset($_SESSION['dni_usuario'])) {

    include_once(__DIR__ . "/../Model/DAO/DAOEmpleados.php");


    if (isset($_POST["accion"])) {
        $DAO = new DaoEmpleado();
        switch ($_POST["accion"]) {
            case "listaEmpleados":
                $lista = $DAO->listaEmpleados();
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='empleado-" . $fila["id_empleado"] . "' onclick='seleccionarEmpleado(" . $fila["id_empleado"] . ")'>
                                <td>" . $fila["id_empleado"] . "</td>
                                <td>" . $fila["nombres"] . "</td>
                                <td>" . $fila["apellidos"] . "</td>
                                <td>" . $fila["dni"] . "</td>
                                <td>" . $fila["cargo"] . "</td>
                                <td>" . $fila["telefono"] . "</td>
                                <td>" . $fila["direccion"] . "</td>
                                <td>" . $fila["correo"] . "</td>
                                <td class='' ><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "buscarPor":
                $lista = $DAO->buscarPor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='empleado-" . $fila["id_empleado"] . "' onclick='seleccionarEmpleado(" . $fila["id_empleado"] . ")'>
                                <td>" . $fila["id_empleado"] . "</td>
                                <td>" . $fila["nombres"] . "</td>
                                <td>" . $fila["apellidos"] . "</td>
                                <td>" . $fila["dni"] . "</td>
                                <td>" . $fila["cargo"] . "</td>
                                <td>" . $fila["telefono"] . "</td>
                                <td>" . $fila["direccion"] . "</td>
                                <td>" . $fila["correo"] . "</td>
                                <td class='' ><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "agregarEmpleado":
                $datosEmpleado = json_decode(file_get_contents('php://input'), true);
                if ($_POST["agregarFoto"] == "si") {
                    $foto = $_FILES['imagen']['tmp_name'];
                    $datosEmpleado = new Empleado(0, $_POST["nombres"], $_POST["apellidos"], $_POST["dni"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"], $_POST["cargo"], $_POST["agregarFoto"], $foto);
                    $agregarEmpleado = $DAO->agregarEmpleado($datosEmpleado);
                } else {
                    $datosEmpleado = new Empleado(0, $_POST["nombres"], $_POST["apellidos"], $_POST["dni"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"], $_POST["cargo"], $_POST["agregarFoto"], "");
                    $agregarEmpleado = $DAO->agregarEmpleado($datosEmpleado);
                }
                echo $agregarEmpleado;
                break;
            case "editarEmpleado":
                $datosEmpleado = json_decode(file_get_contents('php://input'), true);
                if ($_POST["cambiarFoto"] == "si") {
                    $foto = $_FILES['imagen']['tmp_name'];
                    $datosEmpleado = new Empleado($_POST["id"], $_POST["nombres"], $_POST["apellidos"], $_POST["dni"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"], $_POST["cargo"], $_POST["cambiarFoto"], $foto);
                    $editarEmpleado = $DAO->editarEmpleado($datosEmpleado);
                } else {
                    $datosEmpleado = new Empleado($_POST["id"], $_POST["nombres"], $_POST["apellidos"], $_POST["dni"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"], $_POST["cargo"], $_POST["cambiarFoto"], "");
                    $editarEmpleado = $DAO->editarEmpleado($datosEmpleado);
                }
                echo $editarEmpleado;
                break;
            case "eliminarEmpleado":
                $eliminarEmpleado = $DAO->eliminarEmpleado($_POST["id"]);
                echo $eliminarEmpleado;
                break;
            case "seleccionarEmpleado":
                $seleccionarEmpleado = $DAO->seleccionarEmpleado($_POST["id"]);
                $datos = array(
                    "id" => $seleccionarEmpleado["id_empleado"],
                    "nombres" => $seleccionarEmpleado["nombres"],
                    "apellidos" => $seleccionarEmpleado["apellidos"],
                    "dni" => $seleccionarEmpleado["dni"],
                    "direccion" => $seleccionarEmpleado["direccion"],
                    "telefono" => $seleccionarEmpleado["telefono"],
                    "correo" => $seleccionarEmpleado["correo"],
                    "cargo" => $seleccionarEmpleado["cargo"],
                    "foto" => base64_encode($seleccionarEmpleado["foto"])
                );
                header('Content-Type: application/json');
                echo json_encode($datos);
                break;
        }
    }
}
