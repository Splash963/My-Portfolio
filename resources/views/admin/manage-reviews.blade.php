<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Manage Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>

    <head>
        @include('admin.layouts.offcanvas')
    </head>

    <body>
        <div class="container mt-1">
            <div class="text-center py-4 px-3 rounded shadow-sm">
                <h2 class="mb-0 fw-bold display-5" style="letter-spacing: 1px; color: white">Reviews</h2>
            </div>
        </div>

        {{-- Tabs --}}
        <div>
            <nav class="navbar justify-content-center">
                <ul class="buttons mb-1 mt-3 ms-0 ps-0" id="pills-tab" role="tablist">
                    <li class="links">
                        <button class="btn btn-outline-primary active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab">All Appointments</button>
                    </li>
                    <li class="links">
                        <button class="btn btn-outline-primary" id="pills-pending-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-pending" type="button" role="tab">Pending
                            Appointments</button>
                    </li>
                    <li class="links">
                        <button class="btn btn-outline-primary" id="pills-confirmed-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-confirmed" type="button" role="tab">Confirmed
                            Appointments</button>
                    </li>
                    <li class="links">
                        <button class="btn btn-outline-primary" id="pills-complete-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-complete" type="button" role="tab">Complete
                            Appointments</button>
                    </li>
                    <li class="links">
                        <button class="btn btn-outline-primary" id="pills-canceled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-canceled" type="button" role="tab">Canceled
                            Appointments</button>
                    </li>
                </ul>

            </nav>
        </div>


        {{-- View Data --}}
        <div class="container">
            <div class="tab-content" id="pills-tabContent">

                <!-- All Appointments -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="mb-5">
                        <h1 class="text-center mt-5 text-white">All Appointments</h1>
                    </div>
                    @forelse ($all_appointments as $appointment)
                        <div class="cards mb-3">
                            <div class="image">
                                <img src="{{ asset('Profile/default.png') }}" class="img-fluid img"
                                    alt="User Profile Image">
                            </div>
                            <div class="description">
                                <p>Customer Name : {{ $appointment->customer->name }}</p>
                                <p>Repair Items : {{ $appointment->repairItems->pluck('repair_item')->implode(' | ') }}
                                </p>
                                <p>Repair Description : {{ $appointment->description }}</p>
                                <p>Status :
                                    <span
                                        class="@if ($appointment->status == 'Pending') badge bg-warning text-dark @elseif ($appointment->status == 'Confirmed') badge bg-primary @elseif ($appointment->status == 'Completed') badge bg-success @endif">
                                        {{ $appointment->status }}
                                    </span>
                                </p>
                                <p>Date :
                                    {{ $appointment->created_at->setTimezone('Asia/Colombo')->format('Y-m-d H:i:s') }}
                                </p>
                            </div>
                            <div class="action">
                                <button type="button" class="btn btn-primary view-btn" data-id="{{ $appointment->id }}"
                                    data-bs-toggle="modal" data-bs-target="#appointmentModal">
                                    View
                                </button>
                                <button type="button" class="btn btn-success update-btn"
                                    data-id="{{ $appointment->id }}" data-bs-toggle="modal"
                                    data-bs-target="#updateAppointmentModal">
                                    Confirm
                                </button>
                                <button type="button" class="btn btn-danger update-btn"
                                    data-id="{{ $appointment->id }}" data-bs-toggle="modal"
                                    data-bs-target="#updateAppointmentModal">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-secondary update-btn"
                                    data-id="{{ $appointment->id }}" data-bs-toggle="modal"
                                    data-bs-target="#quotationAction">
                                    Quotation
                                </button>
                            </div>
                        </div>
                    @empty
                        <h1>There are NO Appointments Here</h1>
                    @endforelse
                </div>
            </div>
        </div>

    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
