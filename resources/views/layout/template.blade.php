<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Portal')</title>
    <style>
        button,
        input[type="submit"],
        .btn,
        .login-btn,
        .reg-btn,
        .nav-register,
        .nav-login,
        .register-link,
        .login-link,
        .forgot-link {
            transition: transform 0.15s ease, background 0.2s ease, opacity 0.2s ease;
            cursor: pointer;
        }
        button:hover,
        input[type="submit"]:hover,
        .btn:hover,
        .login-btn:hover,
        .reg-btn:hover,
        .nav-register:hover,
        .nav-login:hover,
        .register-link:hover,
        .login-link:hover,
        .forgot-link:hover {
            transform: translateY(-1px);
            opacity: 0.95;
        }
    </style>
</head>
<body style="
  margin: 0;
  padding-top: 80px;
  padding-bottom: 60px;
  min-height: 100vh;
  box-sizing: border-box;
  background: #f5f7ff;
  overflow-y: auto;
">
    @include('partials.nav')

    @yield('content')
    
    @include('partials.footer')
</body>
</html>