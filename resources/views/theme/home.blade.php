@extends('theme.master')

@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <h1>Hello Admin!</h1>
        </div>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Users</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $totalUsers }}</h2>
                                <p class="text-white mb-0">{{ now()->toDateString() }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Recipes</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $totalRecipes }}</h2>
                                <p class="text-white mb-0">{{ now()->toDateString() }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-utensils"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Categories</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $totalCategories }}</h2>
                                <p class="text-white mb-0">{{ now()->toDateString() }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-globe"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Blogs</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $totalBlogs }}</h2>
                                <p class="text-white mb-0">{{ now()->toDateString() }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Users Per Country</h3>
                            <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                                <canvas id="usersPerCountryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Most Active Users</h3>
                            <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                                <canvas id="mostActiveUsersChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx1 = document.getElementById('usersPerCountryChart').getContext('2d');
            var usersPerCountryChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: @json($usersPerCountry->pluck('address')),
                    datasets: [{
                        label: 'Number of Users',
                        data: @json($usersPerCountry->pluck('user_count')),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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

            var ctx2 = document.getElementById('mostActiveUsersChart').getContext('2d');
            var mostActiveUsersChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: @json($mostActiveUsersDetails->pluck('name')),
                    datasets: [{
                        label: 'Number of Blogs',
                        data: @json($mostActiveUsers->pluck('blog_count')),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
        });
    </script>
@endsection