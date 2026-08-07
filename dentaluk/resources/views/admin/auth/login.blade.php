<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CMS Login | Icon Dental Wembley</title>
    
    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e2b1d 0%, #111a10 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            padding: 20px;
        }
        .login-card {
            background: rgba(35, 50, 34, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(177, 152, 111, 0.3);
            border-radius: 24px;
            padding: 45px 40px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5), 0 0 30px rgba(177, 152, 111, 0.15);
        }
        .brand-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            font-weight: 700;
            color: #d6c09b;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }
        .brand-subtitle {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }
        .form-control-cms {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(177, 152, 111, 0.3);
            border-radius: 12px;
            color: #ffffff;
            padding: 13px 18px;
            font-size: 14.5px;
            transition: all 0.3s ease;
        }
        .form-control-cms:focus {
            background: rgba(0, 0, 0, 0.4);
            border-color: #b1986f;
            box-shadow: 0 0 15px rgba(177, 152, 111, 0.3);
            color: #ffffff;
        }
        .password-toggle-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: rgba(177, 152, 111, 0.7);
            font-size: 16px;
            cursor: pointer;
            padding: 6px;
            transition: color 0.3s ease;
            z-index: 10;
        }
        .password-toggle-btn:hover {
            color: #d6c09b;
        }
        .btn-cms-login {
            background: linear-gradient(135deg, #b1986f, #8e7751);
            color: #111a10;
            font-weight: 700;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-size: 15px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-cms-login:hover {
            background: linear-gradient(135deg, #d6c09b, #b1986f);
            color: #111a10;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(177, 152, 111, 0.4);
        }
    </style>
</head>
<body>
    <div class="login-card text-center">
        <div class="mb-3">
            <i class="fa-solid fa-tooth text-gold fs-1" style="color: #b1986f;"></i>
        </div>
        <h1 class="brand-title">ICON DENTAL</h1>
        <p class="brand-subtitle">Practice CMS Control Panel</p>

        @if (session('error'))
            <div class="alert alert-danger border-0 rounded-3 p-3 mb-4 text-start" style="font-size: 13.5px; background: rgba(220, 53, 69, 0.2); color: #ff8b94;">
                <i class="fa-solid fa-triangle-exclamation me-1"></i> {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success border-0 rounded-3 p-3 mb-4 text-start" style="font-size: 13.5px; background: rgba(40, 167, 69, 0.2); color: #85e39d;">
                <i class="fa-solid fa-circle-check me-1"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            
            <div class="mb-3 text-start">
                <label class="form-label text-light small fw-medium">Email Address</label>
                <input type="email" name="email" class="form-control form-control-cms @error('email') is-invalid @enderror" value="{{ old('email', 'admin@icondentalwembley.co.uk') }}" placeholder="admin@icondentalwembley.co.uk" required autofocus>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 text-start">
                <label class="form-label text-light small fw-medium">Password</label>
                <div class="position-relative">
                    <input type="password" id="adminPassword" name="password" class="form-control form-control-cms @error('password') is-invalid @enderror" placeholder="••••••••" required style="padding-right: 48px;">
                    <button type="button" id="togglePassword" class="password-toggle-btn" aria-label="Toggle password visibility">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4 text-start">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="rememberMe" checked>
                    <label class="form-check-label small text-white-50" for="rememberMe">Remember me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-cms-login">
                Sign In to CMS <i class="fa-solid fa-right-to-bracket ms-1"></i>
            </button>
        </form>

        <p class="text-white-50 small mt-4 mb-0" style="font-size: 12px;">Icon Dental Wembley &copy; {{ date('Y') }} All Rights Reserved.</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('adminPassword');
            const eyeIcon = document.getElementById('eyeIcon');

            if (togglePasswordBtn && passwordInput && eyeIcon) {
                togglePasswordBtn.addEventListener('click', function() {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    
                    if (isPassword) {
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                });
            }
        });
    </script>
</body>
</html>
