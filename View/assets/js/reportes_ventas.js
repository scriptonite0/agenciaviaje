var datos1 = {
    "accion": "mostrarDatosGraficoVentas1"
}
$.ajax({
    url: "../../Controller/ReportesController.php",
    type: "POST",
    data: datos1,
    dataType: "json",
    success: function (response) {
        const ctx = document.getElementById("grafico-monto-ventas");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    label: 'Monto Total de Ventas por Día',
                    backgroundColor: ['#6bf1ab', '#63d69f', '#438c6c', '#509c7f', '#1f794e', '#34444c', '#90CAF9', '#64B5F6', '#42A5F5', '#2196F3', '#0D47A1'],
                    borderColor: ['black'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        for (var key in response) {
            if (response.hasOwnProperty(key)) {
                myChart.data['labels'].push("Día " + key)
                myChart.data['datasets'][0].data.push(response[key])
                console.log(key + ": " + response[key]);
            }
        }
    },
    error: function () {
        console.log("Error al cargar el reporte.");
    }
});
var datos2 = {
    "accion": "mostrarDatosGraficoVentas2"
}
$.ajax({
    url: "../../Controller/ReportesController.php",
    type: "POST",
    data: datos2,
    dataType: "json",
    success: function (response) {
        const ctx = document.getElementById("grafico-cantidad-ventas");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    label: 'Cantidad de Ventas por Día',
                    backgroundColor: ['#6bf1ab', '#63d69f', '#438c6c', '#509c7f', '#1f794e', '#34444c', '#90CAF9', '#64B5F6', '#42A5F5', '#2196F3', '#0D47A1'],
                    borderColor: ['black'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        for (var key in response) {
            if (response.hasOwnProperty(key)) {
                myChart.data['labels'].push("Día " + key)
                myChart.data['datasets'][0].data.push(response[key])
            }
        }
    },
    error: function () {
        console.log("Error al cargar el reporte.");
    }
});


function mostrarReportesVentas() {
    var desde = $("#reporte-venta-desde").val();
    var hasta = $("#reporte-venta-hasta").val();

    var datos = {
        "accion": "mostrarReportesVentas",
        "desde": desde,
        "hasta": hasta
    }
    $.ajax({
        url: "../../Controller/ReportesController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            $("#num-ventas")[0].innerHTML = response.numero_ventas;
            if (response.monto_ventas == null) {
                $("#monto-ventas")[0].innerHTML = "S/. 0";
            } else {
                $("#monto-ventas")[0].innerHTML = "S/. " + response.monto_ventas;
            }

        },
        error: function () {
            console.log("Error al cargar el reporte.");
        }
    });
}