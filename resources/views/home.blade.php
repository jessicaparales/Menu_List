@extends('layouts.dashboard')
@section('content')

<div class="container">
<div class="card p-3">
    <h1 class="border-bottom pb-2 mb-3" style="font-family: 'Poppins', sans-serif; font-weight: 400; font-style: normal;">Dashboard</h1>

    {{-- Row 1: KPI Cards --}}
    <div class="row g-3 mb-3">
        <div class="col-md-3">
            <div class="card h-100" style="background-color: rgb(246, 177, 206);">
                <div class="card-body text-white">
                    <p class="card-text"><i class="bi bi-people-fill me-2"></i>Total Users</p>
                    <h4 class="card-title">{{ $userCount }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100" style="background-color: rgb(140, 199, 196);">
                <div class="card-body text-white">
                    <p class="card-text"><i class="fi fi-sr-room-service me-2"></i>Total Menus</p>
                    <h4 class="card-title">{{ $menuCount }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100" style="background-color: rgb(180, 160, 220);">
                <div class="card-body text-white">
                    <p class="card-text"><i class="bi bi-archive-fill me-2"></i>Archived</p>
                    <h4 class="card-title">{{ $archivedCount }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100" style="background-color: rgb(250, 200, 130);">
                <div class="card-body text-white">
                    <p class="card-text"><i class="bi bi-tag-fill me-2"></i>Avg Price</p>
                    <h4 class="card-title">₱{{ number_format($avgPrice, 2) }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Row 2: System overview bar + foods/drinks pie --}}
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <div class="border rounded-1 p-2">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border rounded-1 p-2">
                <canvas id="categoryCountChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Row 3: Items per category + Avg price per category --}}
    <div class="row g-3 mb-3">
        
        <div class="col-md-6">
            <div class="border rounded-1 p-2">
                <canvas id="myChart1"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border rounded-1 p-2">
                <canvas id="categoryAvgPriceChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Row 4: Incomplete Items --}}
    @if($incompleteItems->count() > 0)
    <div class="row">
        <div class="col-12">
            <div class="card border-warning">
                <div class="card-header bg-warning text-white">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Incomplete Items ({{ $incompleteItems->count() }}) — missing image or description
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Missing</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incompleteItems as $item)
                            <tr>
                                <td>{{ $item->menu_id }}</td>
                                <td>{{ $item->menu_name }}</td>
                                <td>{{ $item->menu_category }}</td>
                                <td>₱{{ number_format($item->menu_price, 2) }}</td>
                                <td>
                                    @if(empty($item->menu_picture))
                                        <span class="badge bg-warning text-dark me-1">No image</span>
                                    @endif
                                    @if(empty($item->menu_description))
                                        <span class="badge bg-secondary me-1">No description</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
</div>

@endsection
@section('script')

<script>
    const ctx  = document.getElementById('myChart');
    const ctx1 = document.getElementById('myChart1');
    const ctx2 = document.getElementById('categoryCountChart');
    const ctx3 = document.getElementById('categoryAvgPriceChart');

    // Chart 1 — System overview bar
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Users', 'Menu', 'Archived'],
            datasets: [{
                label: 'System Data',
                data: [{{ $userCount }}, {{ $menuCount }}, {{ $archivedCount }}],
                backgroundColor: [
                    'rgb(246, 177, 206)',
                    'rgb(140, 199, 196)',
                    'rgb(180, 160, 220)'
                ],
                borderColor: [
                    'rgb(246, 177, 206)',
                    'rgb(140, 199, 196)',
                    'rgb(180, 160, 220)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'System Overview' }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1, precision: 0 } }
            }
        }
    });

    // Chart 2 — Foods vs Drinks pie
    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Foods', 'Drinks'],
            datasets: [{
                label: 'Menu Categories',
                data: [{{ $foodsCount }}, {{ $drinksCount }}],
                backgroundColor: [
                    'rgb(140, 199, 196)',
                    'rgb(246, 177, 206)'
                ],
                borderColor: [
                    'rgb(140, 199, 196)',
                    'rgb(246, 177, 206)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Item per category' }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1, precision: 0 } }
            }
        }
    });

    // Chart 3 — Items per category bar
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: {!! $categoryLabels !!},
            datasets: [{
                label: 'Items per Category',
                data: {!! $categoryCounts !!},
                backgroundColor: 'rgb(140, 199, 196)',
                borderColor: 'rgb(140, 199, 196)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Items per Category' }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1, precision: 0 } }
            }
        }
    });

    // Chart 4 — Avg price per category bar
    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: {!! $categoryLabels !!},
            datasets: [{
                label: 'Avg Price (₱)',
                data: {!! $categoryAvgPrice !!},
                backgroundColor: 'rgb(250, 200, 130)',
                borderColor: 'rgb(250, 200, 130)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Avg Price per Category' }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) { return '₱' + value; }
                    }
                }
            }
        }
    });
</script>

@endsection