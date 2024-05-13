@extends('layouts.app')
@section('content')
@include('partials.header')
@include('partials.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
 <!-- Main Cards Section -->
 <div class="row">
            <!-- Card 1: Total Websites -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Websites</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-globe"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalWebsites }}</h6>
                                <!-- You can add additional info here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Card 1 -->

            <!-- Card 2: Online Websites -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Online Websites</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $onlineWebsites }}</h6>
                                <!-- You can add additional info here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Card 2 -->

            <!-- Card 3: Offline Websites -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Offline Websites</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-x-circle"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $offlineWebsites }}</h6>
                                <!-- You can add additional info here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Card 3 -->

            <!-- Card 4: Average Response Time -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Average Response Time</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-stopwatch"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $averageResponseTime }} ms</h6>
                                <!-- You can add additional info here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Card 4 -->
        </div>
        <!-- /Main Cards Section -->

        <!-- Website List Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Website List</h5>
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>URL</th>
            <th>Status</th>
            <th>Response Time</th>
            <th>Days Up</th>
            <th>Uptime Progress (24 Hours)</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dummy data loop -->
        @foreach($websites as $website)
        <tr>
            <td>{{ $website->url }}</td>
            <td><span class="badge {{ $website->status == 'Online' ? 'bg-success' : 'bg-danger' }}">{{ $website->status }}</span></td>
            <td>{{ $website->response_time ?? 'N/A' }} ms</td>
            <!-- Calculate number of days up -->
            <td>{{ $website->created_at->diffInDays() }} days</td>
            <td>
                <div class="progress">
                    @php
                    // Calculate uptime progress over 24 hours
                    $uptimePercentage = ($website->uptime_minutes / (24 * 60)) * 100;
                    @endphp
                    <div class="progress-bar" role="progressbar" style="width: {{ $uptimePercentage }}%;" aria-valuenow="{{ $uptimePercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </td>
        </tr>
        @endforeach
        <!-- /Dummy data loop -->
    </tbody>
</table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Website List Section -->

            <!-- Line Chart Section -->
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Website Status Trend</h4>
                    </div>
                    <div class="card-body">
                        <!-- Placeholder chart with dummy data -->
                        <canvas id="lineChart" style="height: 400px;"></canvas>
                    </div>
                </div>
            </div>
</div>
    </div>
  </main><!-- End #main -->


 <!-- Chart.js Library -->

<!-- Line Chart Script -->
<script>
    var ctx = document.getElementById('lineChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Online',
                data: [10, 20, 15, 25, 30, 20, 35],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }, {
                label: 'Offline',
                data: [5, 15, 10, 20, 25, 15, 30],
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
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
</script>
@endsection

@push('js')

    @endpush
