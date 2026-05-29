@extends('layouts.dashboard')
@section('content')

<div class="container">
<div class="card p-3">
    <h1 class="border-bottom pb-2 mb-3" style="font-family: 'Poppins', sans-serif; font-weight: 400; font-style: normal;">Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="background-color: 
rgb(246, 177, 206);">
                <div class="card-body text-white">
                    <p class="card-text"><i class="bi bi-people-fill me-3"></i>Total Users</p>
                    <h4 class="card-title ">{{$userCount}}</h4>
                    <!-- <a href="#" class="btn btn-primary">Button</a> -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="background-color: rgb(140, 199, 196);">
                <div class="card-body text-white">
                    <p class="card-text "><i class="fi fi-sr-room-service me-3"></i>Total Menus</p>
                    <h4 class="card-title ">{{ $menuCount }}</h4>
                    <!-- <a href="#" class="btn btn-primary">Button</a> -->
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-md-5 border ms-3 mt-3 rounded-1">
            <canvas id="myChart"></canvas>
        </div>

        <div class="col-md-3 border ms-3 mt-3 rounded-1">
            <canvas id="myChart1"></canvas>
        </div>
    </div>
</div>
</div>


@endsection
@section('script')


<script>
    const ctx = document.getElementById('myChart');
    const ctx1 = document.getElementById('myChart1');


    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Users', 'Menu'],
        datasets: [{
            label: 'System Data',
            data: [{{$userCount}}, {{$menuCount}}],
            backgroundColor: [
                'rgb(140, 199, 196)',
                'rgb(246, 177, 206)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgb(246, 177, 206)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: {
                display: true,
                text: 'System Overview'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,        // Good for integer counts
                    precision: 0
                }
            }
        }
    }
});

new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: ['Foods', 'Drinks'],
        datasets: [{
            label: 'System Data',
            data: [{{$foodsCount}}, {{$drinksCount}}],
            backgroundColor: [
                'rgb(140, 199, 196)',
                'rgb(246, 177, 206)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgb(246, 177, 206)'
            ],
            borderWidth: 1
        }]
    }
});
</script>






@endsection