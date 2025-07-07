@extends('main')

@section('title', 'Dashboard')

@section('content')

<!-- html -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="row">
    <div class="col-lg-6">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
    <div class="col-lg-6">
        <figure class="highcharts-figure">
            <div id="container-asalsma"></div>
        </figure>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <figure class="highcharts-figure">
            <div id="container-pertahun"></div>
        </figure>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="container">
            <h2>Statistik Jadwal Per Prodi</h2>
            <canvas id="jadwalChart" height="100"></canvas>
        </div>
    </div>
</div>

<!-- css -->
 <style>
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

 </style>

<!-- javascript -->
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa Berdasarkan Program Studi'
    },
    subtitle: {
        text: 'Source: Universitas MDP'
    },
    xAxis: {
        categories: {!! json_encode(array_map(fn($item) => $item['nama'], $mahasiswaprodi)) !!},
        crosshair: true,
        accessibility: {
            description: 'Program Studi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: ' (Orang)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Mahasiswa',
            data: {!! json_encode(array_map(fn($item) => $item['jumlah'], $mahasiswaprodi)) !!}
        }
    ]
});

Highcharts.chart('container-asalsma', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa Berdasarkan Asal SMA'
    },
    subtitle: {
        text: 'Source: Universitas MDP'
    },
    xAxis: {
        categories: {!! json_encode(array_map(fn($item) => $item['asal_sma'], $mahasiswaasalsma)) !!},
        crosshair: true,
        accessibility: {
            description: 'Program Studi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: ' (Orang)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Mahasiswa',
            data: {!! json_encode(array_map(fn($item) => $item['jumlah'], $mahasiswaasalsma)) !!}
        }
    ]
});

Highcharts.chart('container-pertahun', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa Berdasarkan per Tahun Masuk'
    },
    subtitle: {
        text: 'Source: Universitas MDP'
    },
    xAxis: {
        categories: {!! json_encode(array_map(fn($item) => '20'.$item['tahun'], $mahasiswapertahun)) !!},
        crosshair: true,
        accessibility: {
            description: 'Tahun Masuk'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: ' (Orang)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Mahasiswa',
            data: {!! json_encode(array_map(fn($item) => $item['jumlah'], $mahasiswapertahun)) !!}
        }
    ]
});

const ctx = document.getElementById('jadwalChart');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode(array_map(fn($item) => $item['prodi'], $data)) !!},
        datasets: [{
            label: 'Jumlah Jadwal',
            data: {!! json_encode(array_map(fn($item) => $item['jumlah'], $data)) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: { precision: 0 }
            }
        }
    }
});
</script>

@endsection