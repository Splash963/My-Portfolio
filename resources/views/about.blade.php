<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @vite('resources/css/animations.css')
    @vite('resources/css/about.css')
</head>

<body>

    <head>
        @include('layouts.navbar')
    </head>

    <body>
        <div class="container mt-5 mb-5 pb-5">
            <h1 class="text-center mb-5 title" data-aos="fade-down">About Me</h1>

            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-5 text-center">
                    <div class="profile-img-container position-relative d-inline-block" data-aos="slide-right">
                        <img src="{{ asset('profille/Profile Image.png') }}" alt="Profile Image" class="img-fluid rounded border-accent profile-img shadow-lg">
                        <div class="accent-box"></div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h2 class="mb-4 subtitle fw-bold text-accent" data-aos="fade-up">I am a passionate multi-disciplinary designer and developer.</h2>
                    <p class="lead mb-4">Dedicated to building products that work as beautifully as they look. With a background spanning UI/UX Design, Web Design, Desktop Application Development and Mobile App Development, I bridge the gap between user needs and technical feasibility.</p>
                    <p class="lead mb-4">My journey in design and development has been driven by a desire to create meaningful and impactful digital experiences. I believe that great design is not just about aesthetics, but also about solving problems and enhancing user interactions.</p>

                    <div class="row mt-4 g-4">
                        <!-- <div class="col-md-6">
                            <div class="d-flex align-items-center info-box">
                                <i class="fa-solid fa-graduation-cap text-accent fs-3 me-3"></i>
                                <div>
                                    <h5 class="text-white mb-1 fw-bold">Education</h5>
                                    <p class="text-muted mb-0 small">BSc Computer Science</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center info-box">
                                <i class="fa-solid fa-briefcase text-accent fs-3 me-3"></i>
                                <div>
                                    <h5 class="text-white mb-1 fw-bold">Experience</h5>
                                    <p class="text-muted mb-0 small">3+ Years Working</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="d-flex align-items-center info-box">
                                <i class="fa-solid fa-download text-accent fs-3 me-3"></i>
                                <div>
                                    <a href="#" style="text-decoration: none;">
                                        <h5 class="text-white mb-1 fw-bold download-button">Download My Resume</h5>
                                    </a>
                                    <!-- <p class="text-muted mb-0 small">Click here to download my resume</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5 mt-4">
                <div class="col-lg-6">
                    <h3 class="mb-4 text-white fw-bold"><i class="fa-solid fa-code text-accent me-2"></i> Technical Skills</h3>
                    <div class="skills-card p-4 rounded bg-dark-card shadow" data-aos="fade-up" data-aos-delay="200">

                        <div class="mb-3">
                            <div class="d-flex justify-content-between text-white mb-1"><span>UI/UX Design</span><span>90%</span></div>
                            <div class="progress" style="height: 8px; background-color: #1a2732;">
                                <div class="progress-bar bg-accent" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between text-white mb-1"><span>Web Development (Laravel, Bootstrap, AJAX)</span><span>70%</span></div>
                            <div class="progress" style="height: 8px; background-color: #1a2732;">
                                <div class="progress-bar bg-accent" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between text-white mb-1"><span>Mobile Dev (Android Studio)</span><span>60%</span></div>
                            <div class="progress" style="height: 8px; background-color: #1a2732;">
                                <div class="progress-bar bg-accent" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between text-white mb-1"><span>WordPress Development</span><span>90%</span></div>
                            <div class="progress" style="height: 8px; background-color: #1a2732;">
                                <div class="progress-bar bg-accent" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="d-flex justify-content-between text-white mb-1"><span>Desktop Application</span><span>80%</span></div>
                            <div class="progress" style="height: 8px; background-color: #1a2732;">
                                <div class="progress-bar bg-accent" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <h3 class="mb-4 text-white fw-bold"><i class="fa-solid fa-timeline text-accent me-2"></i> Experience</h3>
                    <div class="experience-card p-4 rounded bg-dark-card shadow" data-aos="fade-up" data-aos-delay="200">
                        <p class="lead">Over the years, I have worked on various projects ranging from small business websites to complex mobile applications. My experience includes collaborating with cross-functional teams, conducting user research, and implementing scalable design systems.</p>
                        <p class="lead mb-0">I am committed to continuous learning and growth, always seeking new challenges and opportunities to expand my skillset and contribute to innovative technical projects.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <footer>
        @include('layouts.icons')
        @include('layouts.footer')
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out-cubic',
            once: true,
            offset: 100
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>