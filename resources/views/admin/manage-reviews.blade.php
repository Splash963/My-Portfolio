<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Manage Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    @vite(['resources/css/admin/manage-reviews.css'])
    @vite(['resources/js/manage-reviews.js'])
    <script>
        const viewAllDataRoute = "{{ route('reviews.view_all_data', ':id') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
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
                            data-bs-target="#pills-home" type="button" role="tab">All Reviews</button>
                    </li>
                    <li class="links">
                        <button class="btn btn-outline-primary" id="pills-pending-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-pending" type="button" role="tab">Pending
                            Reviews</button>
                    </li>
                    <li class="links">
                        <button class="btn btn-outline-primary" id="pills-confirmed-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-confirmed" type="button" role="tab">Confirmed
                            Reviews</button>
                    </li>
                    <li class="links">
                        <button class="btn btn-outline-primary" id="pills-canceled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-canceled" type="button" role="tab">Canceled
                            Reviews</button>
                    </li>
                </ul>

            </nav>
        </div>


        {{-- All Data --}}
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="mb-5">
                        <h1 class="text-center mt-5 text-white">All Appointments</h1>
                    </div>
                    @forelse ($reviews as $review)
                        <div class="cards mb-3">
                            <div class="image">
                                <img src="{{ asset('profille/default.png') }}" class="img-fluid img"
                                    alt="User Profile Image">
                            </div>
                            <div class="description">
                                <p>Customer Name : {{ $review->user_name }}</p>
                                <p>Review : {{ $review->review }}</p>
                                <p>Status :
                                    <span
                                        class="@if ($review->status == 'Pending') badge bg-warning text-dark @elseif ($review->status == 'Approved') badge bg-success @elseif ($review->status == 'Canceled') badge bg-danger @endif">
                                        {{ $review->status }}
                                    </span>
                                </p>
                                <p style="text-align: left;">Ratings :
                                    <span class="appointment-rating-stars" style="color: #ffc107; font-size: 1.1rem;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="fa-solid fa-star me-1"></i>
                                            @else
                                                <i class="fa-regular fa-star me-1"></i>
                                            @endif
                                        @endfor
                                    </span>
                                </p>
                                <p>Date :
                                    {{ $review->created_at->setTimezone('Asia/Colombo')->format('Y-m-d H:i:s') }}
                                </p>
                            </div>
                            <div class="action">
                                <button class="btn btn btn-info view-btn" data-bs-toggle="modal"
                                    data-bs-target="#reviewModal" data-id="{{ $review->id }}"
                                    data-user-name="{{ $review->user_name }}" data-email="{{ $review->email }}"
                                    data-company-name="{{ $review->company_name }}"
                                    data-position="{{ $review->position }}" data-review="{{ $review->review }}"
                                    data-rating="{{ $review->rating }}" data-status="{{ $review->status }}"
                                    data-created-at="{{ $review->created_at->format('Y-m-d H:i') }}"
                                    data-updated-at="{{ $review->updated_at->format('Y-m-d H:i') }}">
                                    View
                                </button>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center mt-5 text-white">There are NO Reviews Here</h1>
                    @endforelse
                </div>
            </div>
        </div>


        {{-- Pending Reviews --}}
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab"
                    tabindex="0">
                    <div class="mb-5">
                        <h1 class="text-center mt-5 text-white">Pending Appointments</h1>
                    </div>
                    @forelse ($pending_reviews as $review)
                        <div class="cards mb-3">
                            <div class="image">
                                <img src="{{ asset('profille/default.png') }}" class="img-fluid img"
                                    alt="User Profile Image">
                            </div>
                            <div class="description">
                                <p>Customer Name : {{ $review->user_name }}</p>
                                <p>Review : {{ $review->review }}</p>
                                <p>Status :
                                    <span
                                        class="@if ($review->status == 'Pending') badge bg-warning text-dark @elseif ($review->status == 'Approved') badge bg-success @elseif ($review->status == 'Canceled') badge bg-danger @endif">
                                        {{ $review->status }}
                                    </span>
                                </p>
                                <p style="text-align: left;">Ratings :
                                    <span class="appointment-rating-stars" style="color: #ffc107; font-size: 1.1rem;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="fa-solid fa-star me-1"></i>
                                            @else
                                                <i class="fa-regular fa-star me-1"></i>
                                            @endif
                                        @endfor
                                    </span>
                                </p>
                                <p>Date :
                                    {{ $review->created_at->setTimezone('Asia/Colombo')->format('Y-m-d H:i:s') }}
                                </p>
                            </div>
                            <div class="action">
                                <button class="btn btn btn-info view-btn" data-bs-toggle="modal"
                                    data-bs-target="#reviewModal" data-id="{{ $review->id }}"
                                    data-user-name="{{ $review->user_name }}" data-email="{{ $review->email }}"
                                    data-company-name="{{ $review->company_name }}"
                                    data-position="{{ $review->position }}" data-review="{{ $review->review }}"
                                    data-rating="{{ $review->rating }}" data-status="{{ $review->status }}"
                                    data-created-at="{{ $review->created_at->format('Y-m-d H:i') }}"
                                    data-updated-at="{{ $review->updated_at->format('Y-m-d H:i') }}">
                                    View
                                </button>
                                <button type="button" class="btn btn-success approve-btn"
                                    data-id="{{ $review->id }}">
                                    Approve
                                </button>
                                <button type="button" class="btn btn-danger reject-btn"
                                    data-id="{{ $review->id }}">
                                    Reject
                                </button>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center mt-5 text-white">There are NO Reviews Here</h1>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Confirmed Reviews --}}
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-confirmed" role="tabpanel"
                    aria-labelledby="pills-confirmed-tab" tabindex="0">
                    <div class="mb-5">
                        <h1 class="text-center mt-5 text-white">Pending Appointments</h1>
                    </div>
                    @forelse ($confirmed_reviews as $review)
                        <div class="cards mb-3">
                            <div class="image">
                                <img src="{{ asset('profille/default.png') }}" class="img-fluid img"
                                    alt="User Profile Image">
                            </div>
                            <div class="description">
                                <p>Customer Name : {{ $review->user_name }}</p>
                                <p>Review : {{ $review->review }}</p>
                                <p>Status :
                                    <span
                                        class="@if ($review->status == 'Pending') badge bg-warning text-dark @elseif ($review->status == 'Approved') badge bg-success @elseif ($review->status == 'Canceled') badge bg-danger @endif">
                                        {{ $review->status }}
                                    </span>
                                </p>
                                <p style="text-align: left;">Ratings :
                                    <span class="appointment-rating-stars" style="color: #ffc107; font-size: 1.1rem;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="fa-solid fa-star me-1"></i>
                                            @else
                                                <i class="fa-regular fa-star me-1"></i>
                                            @endif
                                        @endfor
                                    </span>
                                </p>
                                <p>Date :
                                    {{ $review->created_at->setTimezone('Asia/Colombo')->format('Y-m-d H:i:s') }}
                                </p>
                            </div>
                            <div class="action">
                                <button class="btn btn btn-info view-btn" data-bs-toggle="modal"
                                    data-bs-target="#reviewModal" data-id="{{ $review->id }}"
                                    data-user-name="{{ $review->user_name }}" data-email="{{ $review->email }}"
                                    data-company-name="{{ $review->company_name }}"
                                    data-position="{{ $review->position }}" data-review="{{ $review->review }}"
                                    data-rating="{{ $review->rating }}" data-status="{{ $review->status }}"
                                    data-created-at="{{ $review->created_at->format('Y-m-d H:i') }}"
                                    data-updated-at="{{ $review->updated_at->format('Y-m-d H:i') }}">
                                    View
                                </button>
                                <button type="button" class="btn btn-danger reject-btn"
                                    data-id="{{ $review->id }}">
                                    Reject
                                </button>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center mt-5 text-white">There are NO Reviews Here</h1>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Canceled Reviews --}}
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-canceled" role="tabpanel" aria-labelledby="pills-canceled-tab"
                    tabindex="0">
                    <div class="mb-5">
                        <h1 class="text-center mt-5 text-white">Canceled Appointments</h1>
                    </div>
                    @forelse ($canceled_reviews as $review)
                        <div class="cards mb-3">
                            <div class="image">
                                <img src="{{ asset('profille/default.png') }}" class="img-fluid img"
                                    alt="User Profile Image">
                            </div>
                            <div class="description">
                                <p>Customer Name : {{ $review->user_name }}</p>
                                <p>Review : {{ $review->review }}</p>
                                <p>Status :
                                    <span
                                        class="@if ($review->status == 'Pending') badge bg-warning text-dark @elseif ($review->status == 'Approved') badge bg-success @elseif ($review->status == 'Canceled') badge bg-danger @endif">
                                        {{ $review->status }}
                                    </span>
                                </p>
                                <p style="text-align: left;">Ratings :
                                    <span class="appointment-rating-stars" style="color: #ffc107; font-size: 1.1rem;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="fa-solid fa-star me-1"></i>
                                            @else
                                                <i class="fa-regular fa-star me-1"></i>
                                            @endif
                                        @endfor
                                    </span>
                                </p>
                                <p>Date :
                                    {{ $review->created_at->setTimezone('Asia/Colombo')->format('Y-m-d H:i:s') }}
                                </p>
                            </div>
                            <div class="action">
                                <button class="btn btn btn-info view-btn" data-bs-toggle="modal"
                                    data-bs-target="#reviewModal" data-id="{{ $review->id }}"
                                    data-user-name="{{ $review->user_name }}" data-email="{{ $review->email }}"
                                    data-company-name="{{ $review->company_name }}"
                                    data-position="{{ $review->position }}" data-review="{{ $review->review }}"
                                    data-rating="{{ $review->rating }}" data-status="{{ $review->status }}"
                                    data-created-at="{{ $review->created_at->format('Y-m-d H:i') }}"
                                    data-updated-at="{{ $review->updated_at->format('Y-m-d H:i') }}">
                                    View
                                </button>
                                <button type="button" class="btn btn-success approve-btn"
                                    data-id="{{ $review->id }}">
                                    Approve
                                </button>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center mt-5 text-white">There are NO Reviews Here</h1>
                    @endforelse
                </div>
            </div>
        </div>



        <!-- View All Data Modal -->
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="reviewModalLabel">Review Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-md-4 mb-3 d-flex justify-content-center">
                                    <div class="card shadow-sm" style="width: 10rem;">
                                        <img src="{{ asset('profille/default.png') }}" id="review-profile"
                                            class="card-img-top" alt="Profile"
                                            style="background-color: #001F3D !important; border-radius: 20px !important">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p style="text-align: left;" class="fw-bold">ID : <span id="id"
                                                class="fw-normal"></span></p>
                                        <p style="text-align: left;" class="fw-bold">User Name : <span id="user-name"
                                                class="fw-normal"></span></p>
                                        <p style="text-align: left;" class="fw-bold">Email : <span id="email"
                                                class="fw-normal"></span></p>
                                        <p style="text-align: left;" class="fw-bold">Company Name : <span
                                                id="company-name" class="fw-normal"></span></p>
                                        <p style="text-align: left;" class="fw-bold">Position : <span id="position"
                                                class="fw-normal"></span></p>
                                        <p style="text-align: left;" class="fw-bold">Rating : <span
                                                id="rating"></span>
                                        </p>
                                        <p style="text-align: left;" class="fw-bold">Review : <span id="review"
                                                class="fw-normal text-muted" style="white-space: pre-wrap;"></span>
                                        </p>
                                        <p style="text-align: left;" class="fw-bold">Status : <span id="status"
                                                class="badge"></span></p>
                                        <p style="text-align: left;" class="fw-bold">Created Date : <span
                                                id="created_at" class="fw-normal"></span></p>
                                        <p style="text-align: left;" class="fw-bold">Updated Date : <span
                                                id="updated_at" class="fw-normal"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="update-btn" data-bs-toggle="modal"
                            data-bs-target="#updateAppointmentModal">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger delete-btn" id="delete-btn" data-id=""
                            onclick="return confirm('Are you sure you want to delete ?');">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
