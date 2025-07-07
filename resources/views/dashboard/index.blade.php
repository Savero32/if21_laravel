@extends('main')

@section('title', 'Dashboard')

@section('content')

<!-- Load Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Chart CSS -->
<style>
    .highcharts-figure {
        min-width: 310px;
        max-width: 800px;
        margin: 2rem auto;
    }
    #container {
        height: 400px;
    }
</style>

<!-- Chart Containers -->
<div class="row">
    <div class="col-lg-6">
        <figure class="highcharts-figure">
            <div id="chart-prodi"></div>
        </figure>
    </div>
    <div class="col-lg-6">
        <figure class="highcharts-figure">
            <div id="chart-sma"></div>
        </figure>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <figure class="highcharts-figure">
            <div id="chart-tahun"></div>
        </figure>
    </div>
    <div class="col-lg-6">
        <figure class="highcharts-figure">
            <div id="chart-jadwal"></div>
        </figure>
    </div>
</div>

<!-- Highcharts Scripts -->
<script>
    // Mahasiswa per Prodi
    Highcharts.chart('chart-prodi', {
        chart: { type: 'column' },
        title: { text: 'Jumlah Mahasiswa per Program Studi' },
        xAxis: {
            categories: @json($mahasiswaprodi->pluck('nama')),
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: { text: 'Jumlah Mahasiswa' }
        },
        tooltip: { valueSuffix: ' Orang' },
        series: [{
            name: 'Mahasiswa',
            data: @json($mahasiswaprodi->pluck('jumlah'))
        }]
    });

    // Mahasiswa per Asal SMA
    Highcharts.chart('chart-sma', {
        chart: { type: 'column' },
        title: { text: 'Jumlah Mahasiswa per Asal SMA' },
        xAxis: {
            categories: @json($mahasiswaasalsma->pluck('asal_sma')),
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: { text: 'Jumlah Mahasiswa' }
        },
        tooltip: { valueSuffix: ' Orang' },
        series: [{
            name: 'Mahasiswa',
            data: @json($mahasiswaasalsma->pluck('jumlah'))
        }]
    });

    // Mahasiswa per Tahun Masuk
    Highcharts.chart('chart-tahun', {
        chart: { type: 'column' },
        title: { text: 'Jumlah Mahasiswa per Tahun Masuk' },
        xAxis: {
            categories: @json($mahasiswapertahun->pluck('tahun')),
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: { text: 'Jumlah Mahasiswa' }
        },
        tooltip: { valueSuffix: ' Orang' },
        series: [{
            name: 'Mahasiswa',
            data: @json($mahasiswapertahun->pluck('jumlah'))
        }]
    });

    // Jumlah Jadwal per Prodi
    Highcharts.chart('chart-jadwal', {
        chart: { type: 'column' },
        title: { text: 'Jumlah Jadwal per Program Studi' },
        xAxis: {
            categories: @json($data->pluck('prodi')),
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: { text: 'Jumlah Jadwal' }
        },
        tooltip: { valueSuffix: ' Jadwal' },
        series: [{
            name: 'Jadwal',
            data: @json($data->pluck('jumlah'))
        }]
    });
</script>

@endsection
