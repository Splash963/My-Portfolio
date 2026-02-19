<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    @vite('resources/css/about.css')
</head>

<body>

    <head>
        @include('layouts.navbar')
    </head>

    <body>
        <div class="container text-center">
            <h1 class="mb-4">About Me</h1>
            <p class="lead">I am a passionate multi-disciplinary designer and developer dedicated to building products that work as beautifully as they look. With a background spanning UI/UX Design, Web Design, and Mobile App Development, I bridge the gap between user needs and technical feasibility.</p>
            <p class="lead">My journey in design and development has been driven by a desire to create meaningful and impactful digital experiences. I believe that great design is not just about aesthetics, but also about solving problems and enhancing user interactions. I am committed to continuous learning and growth, always seeking new challenges and opportunities to expand my skill set and contribute to innovative projects.</p>
        </div>
    </body>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>