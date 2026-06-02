<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- FontAwesome for standard icons if needed -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/services.css')
</head>

<body>

    <head>
        @include('layouts.navbar')
    </head>

    <body>
        <div class="container mt-5 mb-5 pb-5">
            <h1 class="text-center mb-5 title">My Services</h1>

            <p class="text-center lead mb-5 mx-auto" style="max-width: 800px;">
                I offer a diverse range of design and development services tailored to help your business achieve its
                digital goals. By blending deep technical expertise with user-centered design, I craft solutions that
                are both beautiful and performant.
            </p>

            <div class="row g-4">
                <!-- UI/UX Design -->
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-wrapper mb-3 mx-auto">
                            <i class="fa-solid fa-pen-nib fs-2 text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">UI/UX Design</h4>
                        <p class="card-text text-muted">
                            Creating intuitive and engaging user experiences. I focus on human-centered design
                            principles to build interfaces that are aesthetically pleasing and easy to navigate.
                        </p>
                    </div>
                </div>

                <!-- Web Development -->
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-wrapper mb-3 mx-auto">
                            <i class="fa-solid fa-code fs-2 text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">Web Development</h4>
                        <p class="card-text text-muted">
                            Developing responsive, high-performance websites using the latest technologies including
                            modern HTML, CSS, JavaScript, Laravel, and React.
                        </p>
                    </div>
                </div>

                <!-- Mobile App Development -->
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-wrapper mb-3 mx-auto">
                            <i class="fa-solid fa-mobile-screen-button fs-2 text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">Mobile Apps</h4>
                        <p class="card-text text-muted">
                            Building cross-platform mobile applications that provide native-like experiences on both iOS
                            and Android using frameworks like Flutter and React Native.
                        </p>
                    </div>
                </div>

                <!-- WordPress Development -->
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-wrapper mb-3 mx-auto">
                            <i class="fa-brands fa-wordpress fs-2 text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">WordPress</h4>
                        <p class="card-text text-muted">
                            Custom WordPress theme and plugin development. Delivering scalable CMS solutions that
                            empower you to manage your content effortlessly.
                        </p>
                    </div>
                </div>

                <!-- Graphic Design -->
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-wrapper mb-3 mx-auto">
                            <i class="fa-solid fa-palette fs-2 text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">Graphic Design</h4>
                        <p class="card-text text-muted">
                            Crafting visual identities, logos, and marketing materials that resonate with your brand and
                            effectively communicate your message to the audience.
                        </p>
                    </div>
                </div>

                <!-- E-Commerce Solutions -->
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-wrapper mb-3 mx-auto">
                            <i class="fa-solid fa-cart-shopping fs-2 text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">E-Commerce</h4>
                        <p class="card-text text-muted">
                            Setting up robust online stores designed to convert visitors into customers, integrating
                            secure payment gateways and optimizing user journeys.
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5 pt-4">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg custom-btn shadow">Discuss Your
                    Project</a>
            </div>
        </div>
    </body>

    <footer>
        @include('layouts.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
