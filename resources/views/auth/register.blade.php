<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Portfolio Workspace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg-dark: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Elements */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.5;
            z-index: 0;
            animation: float 10s infinite ease-in-out alternate;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            background: rgba(99, 102, 241, 0.3);
            top: -100px;
            left: -100px;
        }

        .shape-2 {
            width: 500px;
            height: 500px;
            background: rgba(236, 72, 153, 0.2);
            bottom: -150px;
            right: -100px;
            animation-delay: -5s;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(30px, 50px) scale(1.1);
            }
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        .login-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border-color);
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .brand-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6366f1, #ec4899);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 0.5rem;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-subtitle {
            text-align: center;
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .form-floating {
            margin-bottom: 1.25rem;
        }

        .form-control {
            background-color: rgba(15, 23, 42, 0.6) !important;
            border: 1px solid var(--border-color);
            color: var(--text-main) !important;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            height: 3.5rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: rgba(15, 23, 42, 0.8) !important;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
        }

        .form-floating label {
            color: var(--text-muted);
            padding-left: 1.25rem;
        }

        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label {
            color: var(--primary);
            transform: scale(0.85) translateY(-0.75rem) translateX(0.15rem);
            background: transparent;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-hover));
            border: none;
            color: white;
            padding: 0.875rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 15px rgba(99, 102, 241, 0.2);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(99, 102, 241, 0.3);
            color: white;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .custom-alert {
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            border-radius: 12px;
            font-size: 0.9rem;
        }

        .auth-links {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .auth-link {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .auth-link:hover {
            color: var(--text-main);
        }

        .auth-link i {
            margin-right: 0.3rem;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <!-- Animated background shapes -->
    <div class="bg-shape shape-1"></div>
    <div class="bg-shape shape-2"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="brand-icon">
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <h1 class="login-title">Create Account</h1>
            <p class="login-subtitle">Register to share your thoughts and reviews</p>

            @if ($errors->any())
                <div class="alert custom-alert p-3 mb-4">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') ?? url('/register') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        placeholder="John Doe" required autofocus>
                    <label for="name"><i class="fa-regular fa-user me-2"></i>Full Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="name@example.com" required>
                    <label for="email"><i class="fa-regular fa-envelope me-2"></i>Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                    <label for="password"><i class="fa-solid fa-lock me-2"></i>Password</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" required>
                    <label for="password_confirmation"><i class="fa-solid fa-check-double me-2"></i>Confirm
                        Password</label>
                </div>

                <button type="submit" class="btn btn-login">
                    Create Account <i class="fa-solid fa-arrow-right ms-2"></i>
                </button>
            </form>

            <div class="auth-links">
                <a href="{{ url('/') }}" class="auth-link">
                    <i class="fa-solid fa-arrow-left"></i> Back to Website
                </a>
                <a href="{{ route('login') ?? url('/login') }}" class="auth-link">
                    Already registered? Login <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
