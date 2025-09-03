<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.3);
      width: 400px;
      text-align: center;
    }

    .login-container img {
      width: 80px;
      height: 80px;
      margin-bottom: 10px;
    }

    .login-container h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .form-group {
      text-align: left;
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-size: 14px;
      color: #555;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      font-size: 14px;
      color: #555;
    }

    .login-btn {
      width: 100%;
      background: #1e3c72;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .login-btn:hover {
      background: #2a5298;
    }

    .logo-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }

    .logo-container img {
      border-radius: 14px;
      border: 3px #7C62FF solid;
    }

    .logo-container span {
      font-weight: bold;
      font-size: 18px;
      color: #333;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <!-- Logo -->
    <div class="logo-container">
            <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="mx-auto w-20 h-20 rounded-lg object-cover" />
    </div>

    <!-- Welcome Text -->
    <h2>Welcome</h2>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <div class="remember-me">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember" style="margin-left: 5px;">Remember me</label>
      </div>

      <button type="submit" class="login-btn">Login</button>
    </form>
  </div>
</body>
</html>
