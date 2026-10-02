<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes por Zona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1 class="mb-4">📊 Clientes por Zona Geográfica</h1>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h6>Total de Clientes</h6>
                    <h2>{{ $totalGeneral }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h6>Zonas Activas</h6>
                    <h2>{{ $zonasConPorcentaje->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-dark text-white"><h5 class="mb-0">Detalle por Zona</h5></div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr><th>#</th><th>Zona</th><th>Total</th><th>%</th><th>Barra visual</th></tr>
                </thead>
                <tbody>
                    @foreach($zonasConPorcentaje as $i => $zona)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><strong>{{ $zona->zona_geografica }}</strong></td>
                        <td><span class="badge bg-primary fs-6">{{ $zona->total }}</span></td>
                        <td>{{ $zona->porcentaje }}%</td>
                        <td>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar bg-success" style="width: {{ $zona->porcentaje }}%">
                                    {{ $zona->porcentaje }}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- RETO: Zonas con mas del 15% --}}
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark"><h5 class="mb-0">⚡ Reto — Zonas con más del 15%</h5></div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-warning">
                    <tr><th>Zona</th><th>Total</th><th>%</th></tr>
                </thead>
                <tbody>
                    @foreach($zonasFiltradas as $zona)
                    <tr>
                        <td><strong>{{ $zona->zona_geografica }}</strong></td>
                        <td>{{ $zona->total }}</td>
                        <td>{{ $zona->porcentaje }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body"><canvas id="grafico" height="80"></canvas></div>
    </div>

    <div class="mt-3">
        <a href="{{ route('reportes.interacciones') }}" class="btn btn-primary">Siguiente reporte →</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    new Chart(document.getElementById('grafico'), {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Clientes por Zona',
                data: @json($data),
                backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#6f42c1']
            }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });
</script>
</body>
</html>