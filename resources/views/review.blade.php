<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Add Review</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    @vite('resources/css/layouts/reviews.css')
    @vite('resources/js/manage-reviews.js')

    <script>
        // Route එක විතරක් head එකේම define කරනවා JS එකට කලින් හම්බවෙන්න
        const reviewSubmitRoute = "{{ route('review.submit') }}";
    </script>
</head>

<body>
    @include('layouts.navbar')

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 90vh;">
                <div class="col-lg-6">
                    <div class="contact-card p-4 p-md-5 shadow-sm">
                        <h3 class="mb-4 fw-bold">Send a Review</h3>
                        <form id="reviewForm" class="contact-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="companyName" name="companyName"
                                            placeholder="Company Name" required>
                                        <label for="companyName">Company Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="position" name="position"
                                            placeholder="Position" required>
                                        <label for="position">Position</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" placeholder="Leave a message here" id="review" name="review" style="height: 150px;"
                                            required></textarea>
                                        <label for="review">Review</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center" style="gap: 2em;">
                                        <div>
                                            <label class="form-label d-block text-white">Your Rating</label>
                                        </div>
                                        <div class="fs-4" style="cursor: pointer; color: #ffc107;">
                                            <i class="fa-regular fa-star star-btn" data-value="1"></i>
                                            <i class="fa-regular fa-star star-btn" data-value="2"></i>
                                            <i class="fa-regular fa-star star-btn" data-value="3"></i>
                                            <i class="fa-regular fa-star star-btn" data-value="4"></i>
                                            <i class="fa-regular fa-star star-btn" data-value="5"></i>
                                        </div>
                                        <input type="hidden" id="rating_value" value="0" name="rating">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn-lg w-100 send-btn shadow" type="submit">
                                        <span>Send Review</span>
                                        <i class="fa-solid fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
