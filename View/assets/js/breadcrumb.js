function abrirSeccion(elemento, pagina, seccion) {
    let home = '<li class="breadcrumb-item active" aria-current="page"><a href="dashboard.php">Inicio</a></li>';
    let breadcrumb = "";
    switch (pagina) {
        case "gestion":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Gestión</li>';
            break;
        case "empleados":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'gestion\',\'gestion/\')" >Gestión</a></li><li class="breadcrumb-item active" aria-current="page">Empleados</li>';
            $("#div-mostrar-ocultar-funciones")[0].innerHTML = "<button id='btn-mostrar-funciones' value='empleados' class='btn btn-light shadow open' style='font - size: 24px; ' onclick='mostrarFunciones()'><b><i id='icono' class='fa-solid fa-angles-right'></i></b></button>";
            break;
        case "clientes":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'gestion\',\'gestion/\')">Gestión</a></li> <li class="breadcrumb-item active" aria-current="page">Clientes</li>';
            $("#div-mostrar-ocultar-funciones")[0].innerHTML = "<button id='btn-mostrar-funciones' value='clientes' class='btn btn-light shadow open' style='font - size: 24px; ' onclick='mostrarFunciones()'><b><i id='icono' class='fa-solid fa-angles-right'></i></b></button>";

            break;
        case "rutas":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'gestion\',\'gestion/\')">Gestión</a></li><li class="breadcrumb-item active" aria-current="page">Rutas</li>';
            $("#div-mostrar-ocultar-funciones")[0].innerHTML = "<button id='btn-mostrar-funciones' value='rutas' class='btn btn-light shadow open' style='font - size: 24px; ' onclick='mostrarFunciones()'><b><i id='icono' class='fa-solid fa-angles-right'></i></b></button>";

            break;
        case "transportes":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'gestion\',\'gestion/\')">Gestión</a></li><li class="breadcrumb-item active" aria-current="page">Transportes</li>';
            $("#div-mostrar-ocultar-funciones")[0].innerHTML = "<button id='btn-mostrar-funciones' value='transportes' class='btn btn-light shadow open' style='font - size: 24px; ' onclick='mostrarFunciones()'><b><i id='icono' class='fa-solid fa-angles-right'></i></b></button>";
            break;
        case "caja":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Caja</li>';
            break;
        case "ventas":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'caja\',\'caja/\')" >Caja</a></li><li class="breadcrumb-item active" aria-current="page">Ventas</li>';
            $("#div-mostrar-ocultar-funciones")[0].innerHTML = "<button id='btn-mostrar-funciones' value='ventas' class='btn btn-light shadow open' style='font - size: 24px; ' onclick='mostrarFunciones()'><b><i id='icono' class='fa-solid fa-angles-right'></i></b></button>";
            break;
        case "detalle-ventas":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'caja\',\'caja/\')" >Caja</a></li><li class="breadcrumb-item active" aria-current="page">Detalle de Ventas</li>';
            break;
        case "boletos":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'caja\',\'caja/\')" >Caja</a></li><li class="breadcrumb-item active" aria-current="page">Boletos de Viaje</li>';
            $("#div-mostrar-ocultar-funciones")[0].innerHTML = "<button id='btn-mostrar-funciones' value='boletos' class='btn btn-light shadow open' style='font - size: 24px; ' onclick='mostrarFunciones()'><b><i id='icono' class='fa-solid fa-angles-right'></i></b></button>";
            break;
        case "reportes":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Reportes</li>';
            $("#div-mostrar-ocultar-funciones")[0].html = "";
            break;
        case "reportes-ventas":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'reportes\',\'reportes/\')" >Reportes</a></li><li class="breadcrumb-item active" aria-current="page">Reporte de Ventas</li>';
            $("#div-mostrar-ocultar-funciones")[0].html = "";
            break;
        case "reportes-boletos":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'reportes\',\'reportes/\')" >Reportes</a></li><li class="breadcrumb-item active" aria-current="page">Reporte de Boletos</li>';
            $("#div-mostrar-ocultar-funciones")[0].html = "";
            break;
        case "reportes-clientes":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="abrirSeccion(\'\',\'reportes\',\'reportes/\')" >Reportes</a></li><li class="breadcrumb-item active" aria-current="page">Reporte de Clientes</li>';
            $("#div-mostrar-ocultar-funciones")[0].html = "";
            break;
        case "clientes-perfil":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Perfil</li>';
            break;
            case "clientes-registrar-boleto":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Registro de Boletos</li>';
            break;
            case "clientes-boletos":
            breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Mis Boletos</li>';
            $("#div-mostrar-ocultar-funciones")[0].innerHTML = "<button id='btn-mostrar-funciones' value='boletos-clientes' class='btn btn-light shadow open' style='font - size: 24px; ' onclick='mostrarFunciones()'><b><i id='icono' class='fa-solid fa-angles-right'></i></b></button>";
            break;
    }

    $.ajax({
        url: "sections/" + seccion + pagina + ".php",
        type: "GET",
        success: function (response) {

            $("#section").html(response);
            const elementos = document.querySelectorAll('.btns-sidebar');
            for (let i = 0; i < elementos.length; i++) {
                elementos[i].style.backgroundColor = '';
                elementos[i].classList.remove("shadow");
            }
            if (elemento != null && elemento != "") {
                elemento.classList.add("shadow");
                elemento.style.color = "black";
                elemento.style.backgroundColor = "rgba(0,0,0,0.5)";
            }
            document.getElementById("breadcrumb").innerHTML = home + breadcrumb;
        },
        error: function () {
            console.log("Error al cargar la sección de usuario.");
        }
    });

}
function mostrarFunciones() {
    var btn = $("#btn-mostrar-funciones")[0],
        icon = $("#icono")[0];

    if (btn.classList.contains("open")) {
        icon.classList.replace("fa-angles-right", "fa-angles-left");
        btn.classList.remove("open");

        var funciones = $("#card-funciones-" + btn.value)[0],
            tabla = $("#div-tabla-" + btn.value)[0];
        funciones.style.opacity = 0;
        tabla.style.transition = "0.3s ease all";
        tabla.classList.replace("col-md-11", "col-md-12");
    } else {
        icon.classList.replace("fa-angles-left", "fa-angles-right");
        btn.classList.add("open");

        var funciones = $("#card-funciones-" + btn.value)[0],
            tabla = $("#div-tabla-" + btn.value)[0];
        funciones.style.opacity = 1;
        tabla.classList.replace("col-md-12", "col-md-11");
    }

}