<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    @vite('resources/css/layouts/reviews.css')
</head>

<body>

    <head>
        @include('layouts.navbar')
    </head>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 90vh;">
                <div class="col-lg-6">
                    <div class="contact-card p-4 p-md-5 shadow-sm">
                        <h3 class="mb-4 fw-bold">Send a Review</h3>
                        <form action="#" method="POST" class="contact-form">
                            <!-- Note: CSRF token omitted since backend for this form is likely not requested yet, but keeping structure standard -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="companyName"
                                            placeholder="Company Name" required>
                                        <label for="companyName">Company Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="position" placeholder="Position"
                                            required>
                                        <label for="position">Position</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" placeholder="Leave a message here" id="review" style="height: 150px" required></textarea>
                                        <label for="review">Review</label>
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

    <footer>
        @include('layouts.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
