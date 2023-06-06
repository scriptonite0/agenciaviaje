var datos1 = {
    "accion": "mostrarDatosGraficoClientes1"
}
$.ajax({
    url: "../../Controller/ReportesController.php",
    type: "POST",
    data: datos1,
    dataType: "json",
    success: function (response) {
        const ctx = document.getElementById("grafico-destinos");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    label: '# de Boletos',
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
                myChart.data['labels'].push(key)
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
    "accion": "mostrarDatosGraficoClientes2"
}
$.ajax({
    url: "../../Controller/ReportesController.php",
    type: "POST",
    data: datos2,
    dataType: "json",
    success: function (response) {
        const ctx = document.getElementById("grafico-clientes-frecuentes");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    label: '# de Viajes',
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
                myChart.data['labels'].push(key)
                myChart.data['datasets'][0].data.push(response[key])
            }
        }
    },
    error: function () {
        console.log("Error al cargar el reporte.");
    }
});


function mostrarReportesClientes() {
    var desde = $("#reporte-cliente-desde").val();
    var hasta = $("#reporte-cliente-hasta").val();

    var datos = {
        "accion": "mostrarReportesClientes",
        "desde": desde,
        "hasta": hasta
    }
    $.ajax({
        url: "../../Controller/ReportesController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            $("#cantidad_clientes")[0].innerHTML = response.cantidad_clientes;


        },
        error: function () {
            console.log("Error al cargar el reporte.");
        }
    });
}