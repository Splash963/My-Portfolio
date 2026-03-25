<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/contact.css')
</head>

<body>

    <head>
        @include('layouts.navbar')
    </head>

    <body>
        <div class="container mt-5 mb-5 pb-5">
            <h1 class="text-center mb-5 title">Get In Touch</h1>
            
            <p class="text-center lead mb-5 mx-auto" style="max-width: 800px;">
                Have a project in mind or just want to say hi? I'd love to hear from you. Fill out the form below and I'll get back to you as soon as possible.
            </p>

            <div class="row g-5 justify-content-center">
                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="contact-card p-4 p-md-5 shadow-sm">
                        <h3 class="mb-4 fw-bold">Send a Message</h3>
                        <form action="#" method="POST" class="contact-form">
                            <!-- Note: CSRF token omitted since backend for this form is likely not requested yet, but keeping structure standard -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-4">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn-lg w-100 send-btn shadow" type="submit">
                                        <span>Send Message</span>
                                        <i class="fa-solid fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-5">
                    <div class="info-card p-4 p-md-5 shadow-sm h-100 bg-primary text-white">
                        <h3 class="mb-4 fw-bold text-white">Contact Info</h3>
                        <p class="mb-4 opacity-75">
                            Whether you're looking to build a new website, improve your UI/UX, or need an app developed, feel free to reach out. I'm currently available for freelance work.
                        </p>
                        
                        <div class="d-flex align-items-center mb-4 info-item">
                            <div class="icon-box me-3">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 text-white">Location</h5>
                                <p class="mb-0 opacity-75">Sri Lanka</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4 info-item">
                            <div class="icon-box me-3">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 text-white">Email</h5>
                                <p class="mb-0 opacity-75">theekshanahirushan10@gmail.com</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-5 info-item">
                            <div class="icon-box me-3">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 text-white">Phone</h5>
                                <p class="mb-0 opacity-75">+94 71 618 2310</p>
                            </div>
                        </div>

                        <h5 class="mb-3 text-white">Follow Me</h5>
                        <div class="social-links d-flex gap-3">
                            <a href="#" class="social-icon"><i class="fa-brands fa-github"></i></a>
                            <a href="#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <footer>
        @include('layouts.footer')
    </footer>
    
</body>

</html>
