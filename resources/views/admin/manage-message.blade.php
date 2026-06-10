<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Manage Messages</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    @vite(['resources/css/admin/manage-reviews.css'])
    @vite(['resources/js/admin/manage-messages.js'])
    <script>
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
                <h2 class="mb-0 fw-bold display-5" style="letter-spacing: 1px; color: white">Manage Messages</h2>
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
                            data-bs-target="#pills-replyed" type="button" role="tab">Replyed
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
                        <h1 class="text-center mt-5 text-white">All Messages</h1>
                    </div>
                    @forelse ($messages as $message)
                        <div class="cards mb-3">
                            <div class="image">
                                <img src="{{ asset('profille/message.png') }}" class="img-fluid img"
                                    alt="User Profile Image">
                            </div>
                            <div class="description">
                                <p>Sender Name : {{ $message->user_name }}</p>
                                <p>Email : {{ $message->email }}</p>
                                <p>Subject : {{ $message->subject }}</p>
                                <p>Status :
                                    <span
                                        class="@if ($message->status == 'Pending') badge bg-warning text-dark @elseif ($message->status == 'Replied') badge bg-success @endif">
                                        {{ $message->status }}
                                    </span>
                                </p>
                                <p>Date :
                                    {{ $message->created_at->setTimezone('Asia/Colombo')->format('Y-m-d H:i:s') }}
                                </p>
                            </div>
                            <div class="action">
                                <button class="btn btn btn-info view-btn" data-bs-toggle="modal"
                                    data-bs-target="#messageModal" data-id="{{ $message->id }}"
                                    data-user-name="{{ $message->user_name }}" data-email="{{ $message->email }}"
                                    data-subject="{{ $message->subject }}" data-message="{{ $message->message }}"
                                    data-status="{{ $message->status }}"
                                    data-created-at="{{ $message->created_at->format('Y-m-d H:i') }}"
                                    data-updated-at="{{ $message->updated_at->format('Y-m-d H:i') }}">
                                    View
                                </button>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center mt-5 text-white">There are NO Messages Here</h1>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Pending Messages --}}
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab"
                    tabindex="0">
                    <div class="mb-5">
                        <h1 class="text-center mt-5 text-white">Pending Messages</h1>
                    </div>
                    @forelse ($pendingMessages as $message)
                        <div class="cards mb-3">
                            <div class="image">
                                <img src="{{ asset('profille/message.png') }}" class="img-fluid img"
                                    alt="User Profile Image">
                            </div>
                            <div class="description">
                                <p>Sender Name : {{ $message->user_name }}</p>
                                <p>Email : {{ $message->email }}</p>
                                <p>Subject : {{ $message->subject }}</p>
                                <p>Status :
                                    <span
                                        class="@if ($message->status == 'Pending') badge bg-warning text-dark @elseif ($message->status == 'Replied') badge bg-success @endif">
                                        {{ $message->status }}
                                    </span>
                                </p>
                                <p>Date :
                                    {{ $message->created_at->setTimezone('Asia/Colombo')->format('Y-m-d H:i:s') }}
                                </p>
                            </div>
                            <div class="action">
                                <button class="btn btn btn-info view-btn" data-bs-toggle="modal"
                                    data-bs-target="#messageModal" data-id="{{ $message->id }}"
                                    data-user-name="{{ $message->user_name }}" data-email="{{ $message->email }}"
                                    data-subject="{{ $message->subject }}" data-message="{{ $message->message }}"
                                    data-status="{{ $message->status }}"
                                    data-created-at="{{ $message->created_at->format('Y-m-d H:i') }}"
                                    data-updated-at="{{ $message->updated_at->format('Y-m-d H:i') }}">
                                    View
                                </button>
                                <button type="button" class="btn btn-success reply-btn"
                                    data-id="{{ $message->id }}">
                                    Replyed
                                </button>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center mt-5 text-white">There are NO Messages Here</h1>
                    @endforelse
                </div>
            </div>
        </div>


        {{-- Replyed Messages --}}
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-replyed" role="tabpanel" aria-labelledby="pills-replyed-tab"
                    tabindex="0">
                    <div class="mb-5">
                        <h1 class="text-center mt-5 text-white">Replyed Messages</h1>
                    </div>
                    @forelse ($repliedMessages as $message)
                        <div class="cards mb-3">
                            <div class="image">
                                <img src="{{ asset('profille/message.png') }}" class="img-fluid img"
                                    alt="User Profile Image">
                            </div>
                            <div class="description">
                                <p>Sender Name : {{ $message->user_name }}</p>
                                <p>Email : {{ $message->email }}</p>
                                <p>Subject : {{ $message->subject }}</p>
                                <p>Status :
                                    <span
                                        class="@if ($message->status == 'Pending') badge bg-warning text-dark @elseif ($message->status == 'Replied') badge bg-success @endif">
                                        {{ $message->status }}
                                    </span>
                                </p>
                                <p>Date :
                                    {{ $message->created_at->setTimezone('Asia/Colombo')->format('Y-m-d H:i:s') }}
                                </p>
                            </div>
                            <div class="action">
                                <button class="btn btn btn-info view-btn" data-bs-toggle="modal"
                                    data-bs-target="#messageModal" data-id="{{ $message->id }}"
                                    data-user-name="{{ $message->user_name }}" data-email="{{ $message->email }}"
                                    data-subject="{{ $message->subject }}" data-message="{{ $message->message }}"
                                    data-status="{{ $message->status }}"
                                    data-created-at="{{ $message->created_at->format('Y-m-d H:i') }}"
                                    data-updated-at="{{ $message->updated_at->format('Y-m-d H:i') }}">
                                    View
                                </button>
                                <button type="button" class="btn btn-warning pending-btn"
                                    data-id="{{ $message->id }}">
                                    Pending
                                </button>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center mt-5 text-white">There are NO Messages Here</h1>
                    @endforelse
                </div>
            </div>
        </div>


        <!-- View All Data Modal -->
        <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="messageModalLabel">Message Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-md-4 mb-3 d-flex justify-content-center">
                                    <div class="card shadow-sm" style="width: 10rem;">
                                        <img src="{{ asset('profille/message.png') }}" id="review-profile"
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
                                        <p style="text-align: left;" class="fw-bold">Subject : <span id="subject"
                                                class="fw-normal"></span></p>
                                        <p style="text-align: left;" class="fw-bold">Message : <span id="message"
                                                class="fw-normal"></span></p>
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
                        <button type="button" class="btn btn-danger delete-btn"
                            data-id="{{ isset($message->id) ? $message->id : '' }}">
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
