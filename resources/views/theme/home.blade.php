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

            <!-- New section for Top 3 Most Liked Blogs -->
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Top 3 Most Liked Blogs</h3>
                            <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                                <canvas id="topLikedBlogsChart"></canvas>
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
            var gradient1 = ctx1.createLinearGradient(0, 0, 0, 400);
            gradient1.addColorStop(0, 'rgba(255, 87, 51, 0.2)');
            gradient1.addColorStop(1, 'rgba(255, 87, 51, 1)');

            var usersPerCountryChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: @json($usersPerCountry->pluck('address')),
                    datasets: [{
                        label: 'Number of Users',
                        data: @json($usersPerCountry->pluck('user_count')),
                        backgroundColor: gradient1,
                        borderColor: 'rgba(255, 87, 51, 1)',
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
            var gradient2 = ctx2.createLinearGradient(0, 0, 0, 400);
            gradient2.addColorStop(0, 'rgba(255, 87, 51, 0.2)');
            gradient2.addColorStop(1, 'rgba(255, 87, 51, 1)');

            var mostActiveUsersChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: @json($mostActiveUsersDetails->pluck('name')),
                    datasets: [{
                        label: 'Number of Blogs',
                        data: @json($mostActiveUsers->pluck('blog_count')),
                        backgroundColor: gradient2,
                        borderColor: 'rgba(255, 87, 51, 1)',
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

            var ctx3 = document.getElementById('topLikedBlogsChart').getContext('2d');
            var gradient3 = ctx3.createLinearGradient(0, 0, 0, 400);
            gradient3.addColorStop(0, 'rgba(255, 87, 51, 0.2)');
            gradient3.addColorStop(1, 'rgba(255, 87, 51, 1)');

            var topLikedBlogsChart = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: @json($topLikedBlogDetails->pluck('recipe_name')),
                    datasets: [{
                        label: 'Number of Likes',
                        data: @json($topLikedBlogDetails->pluck('like_count')),
                        backgroundColor: gradient3,
                        borderColor: 'rgba(255, 87, 51, 1)',
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