<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container2">
        <div class="card">
            <div class="card-body">
                Bienvenido al menú administrativo
            </div>
        </div>
    </div>
    <div class="py-12 container2">
        <div class="grid lg:grid-cols-2">
            <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white relative mr-2" id="container-speed"></div>
            <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white relative mr-2" id="container-speed2"></div>
        </div>   
    </div>
    <div class="py-12 container2">
        <div class="grid lg:grid-cols-2">
            <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white relative mr-2" id="container-speed3"></div>
            <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white relative mr-2" id="container-speed4"></div>
        </div>   
    </div>    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        var datas = <?php echo json_encode($cupones_disponibles) ?>;
        var datas2= <?php echo json_encode($cupones_asignados) ?>;
        var datas3= <?php echo json_encode($inicios_de_sesion) ?>;
        var datas4= <?php echo json_encode($beneficios_open) ?>;
        var gaugeOptions = {
        chart: {
            type: 'solidgauge'
        },

        title: null,

        pane: {
            center: ['50%', '85%'],
            size: '140%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },

        exporting: {
            enabled: false
        },

        tooltip: {
            enabled: false
        },
        // the value axis
        yAxis: {
            stops: [
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            lineWidth: 0,
            tickWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -70
            },
            labels: {
                y: 16
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };

    // The speed gauge
    var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 200,
            title: {
                text: 'Cupones Disponibles en Plataforma'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Cupones de Hoy',
            data: [datas],
            dataLabels: {
                format:
                    '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">Cantidad</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: ' Cantidad'
            }
        }]

    }));

    // The speed gauge
    var chartSpeed = Highcharts.chart('container-speed2', Highcharts.merge(gaugeOptions, {
        yAxis: {
            stops: [
                [0.1, 'blue'], // green
            ],
            min: 0,
            max: 200,
            title: {
                text: 'Cupones Canjeados hoy'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Cupones Canjeados',
            data: [datas2],
            dataLabels: {
                format:
                    '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">Cantidad</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: ' Cantidad'
            }
        }]

    }));

    // The speed gauge
    var chartSpeed = Highcharts.chart('container-speed3', Highcharts.merge(gaugeOptions, {
        yAxis: {
            stops: [
                [0.1, 'red'], // green
            ],
            min: 0,
            max: 200,
            title: {
                text: 'Inicios de Sesión de hoy'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Cupones Canjeados',
            data: [datas3],
            dataLabels: {
                format:
                    '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">Cantidad</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: ' Cantidad'
            }
        }]

    }));

    // The speed gauge
    var chartSpeed = Highcharts.chart('container-speed4', Highcharts.merge(gaugeOptions, {
        yAxis: {
            stops: [
                [0.1, 'orange'], // green
            ],
            min: 0,
            max: 200,
            title: {
                text: 'Beneficios abiertos Hoy'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Cupones Canjeados',
            data: [datas4],
            dataLabels: {
                format:
                    '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">Cantidad</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: ' Cantidad'
            }
        }]

    }));            
        
    </script>
</x-app-layout>

