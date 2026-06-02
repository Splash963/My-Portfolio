@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
            <div>
                <h1 class="text-center mt-5" style="color: #BFC9D1;">Admin Dashboard</h1>
                <p class="text-center" style="color: #BFC9D1;">Welcome to the admin dashboard. Here you can manage the website content and settings.</p>
            </div>

            <div class="quick-links mb-5">
                <div class="card">
                    <div class="card-body data1">
                        <h5 class="card-title">Pending Bookings :</h5>
                        <h5 class="card-title">0</h5>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body data2">
                        <h5 class="card-title">Pending Reviews :</h5>
                        <h5 class="card-title">{{ $pendingCommentsCount ?? 0 }}</h5>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body data3">
                        <h5 class="card-title">Total Projects :</h5>
                        <h5 class="card-title">{{ $totalProjectsCount ?? 0 }}</h5>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body data4">
                        <h5 class="card-title">Total Reviews : </h5>
                        <h5 class="card-title">{{ $totalCommentsCount ?? 0 }}</h5>
                    </div>
                </div>
            </div>


            <div class="charts me-0 mb-5">
                <div class="tables">
                    <div class="card mb-5 table">
                        <div class="card-body" style="background-color: #D1D3D4;">
                            <p class="card-title mb-3 fw-semibold fs-4" style="color: #333;">Pending Appointments</p>
                            <div class="overflow-y-scroll" style="max-height: 9rem; scrollbar-width: thin;">

                                <div class="item-data" style="background-color: transparent;">
                                    <div class="picture">
                                        <img src="{{ asset('images/pngtree-medical-microscope-isolated-png-image_11975870.png') }}" class="img-fluid" alt="" style="max-height: 8.5rem;">
                                    </div>
                                    <div class="content">
                                        <div class="details" style="color: #333;">
                                            <p>Username :</p>
                                            <p>Division :</p>
                                            <p>Date :</p>
                                        </div>
                                        <div class="buttons">
                                            <div class="button-cover">
                                                <button type="button" class="btn btn-primary">View</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="card mb-5 table">
                        <div class="card-body" style="background-color: #D1D3D4;">
                            <p class="card-title fw-semibold fs-4" style="color: #333;">Cancelled Appointments</p>
                            <div class="overflow-y-scroll" style="max-height: 9rem; scrollbar-width: thin;">

                                <div class="item-data" style="background-color: transparent;">
                                    <div class="picture">
                                        <img src="{{ asset('images/pngtree-medical-microscope-isolated-png-image_11975870.png') }}" class="img-fluid" alt="" style="max-height: 8.5rem;">
                                    </div>
                                    <div class="content">
                                        <div class="details" style="color: #333;">
                                            <p>Username :</p>
                                            <p>Division :</p>
                                            <p>Employee Name :</p>
                                            <p>Reason :</p>
                                            <p>Date :</p>
                                        </div>
                                        <div class="buttons">
                                            <div class="button-cover">
                                                <button type="button" class="btn btn-primary">View</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle">
                    <div class="card circle-card">
                        <div class="card-body">
                            <h5 class="card-title mb-5">Monthly Summary</h5>
                            <div class="chart-container">
                                <canvas id="myDonutChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('scripts')
    <script>
        const ctx = document.getElementById('myDonutChart').getContext('2d');
        const myDonutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Get Items', 'Not Added Items', 'Newly Added Items', 'Damaged items'],
                datasets: [{
                    data: [25, 20, 30, 25],
                    backgroundColor: ['#36a2eb', '#ffce56', '#4bc0c0', '#ff6384'],
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // allow CSS height to control chart
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endsection