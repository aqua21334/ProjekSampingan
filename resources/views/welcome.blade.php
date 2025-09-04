<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      /* Background dari folder assets */
      background: url('{{ asset("assets/bg.png") }}') no-repeat center center/cover;
    }

    /* Overlay semi-transparent */
    body::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    .login-container {
      position: relative;
      z-index: 1;
      width: 400px;
      padding: 40px 30px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.4);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .login-container:hover {
      transform: translateY(-5px);
    }

    .logo-container img {
      width: 100px;
      height: 100px;
      border-radius: 16px;
      border: 3px solid #7C62FF;
      object-fit: cover;
      margin-bottom: 15px;
    }

    h2 {
      margin-bottom: 25px;
      font-size: 28px;
      color: #fff;
      font-weight: 700;
      text-shadow: 0 2px 4px rgba(0,0,0,0.4);
    }

    .form-group {
      text-align: left;
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-size: 14px;
      color: #eee;
      margin-bottom: 5px;
      text-shadow: 0 1px 2px rgba(0,0,0,0.4);
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: none;
      font-size: 14px;
      outline: none;
      background: rgba(255, 255, 255, 0.25);
      color: #fff;
      transition: all 0.3s ease;
      backdrop-filter: blur(5px);
    }

    .form-group input::placeholder {
      color: #eee;
    }

    .form-group input:focus {
      background: rgba(255, 255, 255, 0.35);
      box-shadow: 0 0 8px rgba(124,98,255,0.5);
    }

    .remember-me {
      display: flex;
      align-items: center;
      margin-bottom: 25px;
      font-size: 14px;
      color: #fff;
    }

    .login-btn {
      width: 100%;
      background: linear-gradient(135deg, #7C62FF, #4b39ef);
      color: #fff;
      border: none;
      padding: 14px;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 6px 12px rgba(124,98,255,0.6);
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(124,98,255,0.8);
    }

    .forgot-link {
      display: block;
      margin-top: 15px;
      font-size: 14px;
      color: #fff;
      text-decoration: underline;
      transition: color 0.3s ease;
    }

    .forgot-link:hover {
      color: #ffd700;
    }

    @media (max-width: 450px) {
      .login-container {
        width: 90%;
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <!-- Logo -->
    <div class="logo-container">
      <img src="{{ asset('assets/Logo.jpg') }}" alt="Logo">
    </div>

    <!-- Welcome Text -->
    <h2>Selamat Datang</h2>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
      </div>

      <div class="remember-me">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember" style="margin-left: 8px;">Ingat Saya</label>
      </div>

      <button type="submit" class="login-btn">Login</button>

      <a href="{{ route('password.request') }}" class="forgot-link">Lupa Password?</a>
    </form>
  </div>
</body>
</html>
