var datos1 = {
    "accion": "mostrarDatosGraficoBoletos1"
}
$.ajax({
    url: "../../Controller/ReportesController.php",
    type: "POST",
    data: datos1,
    dataType: "json",
    success: function (response) {
        const ctx = document.getElementById("grafico-boletos-registrados");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    label: 'Boletos Registrados',
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


function mostrarReportesBoletos() {
    var desde = $("#reporte-boleto-desde").val();
    var hasta = $("#reporte-boleto-hasta").val();

    var datos = {
        "accion": "mostrarReportesBoletos",
        "desde": desde,
        "hasta": hasta
    }
    $.ajax({
        url: "../../Controller/ReportesController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            if (response.cantidad_boletos == null) {
                $("#cantidad-boletos")[0].innerHTML = "0";
            } else {
                $("#cantidad-boletos")[0].innerHTML = response.cantidad_boletos;
            }

        },
        error: function () {
            console.log("Error al cargar el reporte.");
        }
    });
}