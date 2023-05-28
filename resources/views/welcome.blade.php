<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Intro System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    /* Add your custom styles here */
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-image: linear-gradient(45deg, #FF0000, #00FF00, #0000FF);
      background-size: 600% 600%;
      animation: gradientAnimation 15s ease infinite;
    }

    @keyframes gradientAnimation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    .intro-container {
      background-color: transparent;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      opacity: 0;
      animation: fade-in 2s forwards;
    }

    @keyframes fade-in {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    .intro-container h1 {
      font-size: 48px;
      margin-bottom: 20px;
    }

    .intro-container p {
      font-size: 18px;
      margin-bottom: 40px;
    }

    .login-button {
      font-size: 18px;
      padding: 10px 20px;
    }
  </style>
</head>
<body>
  <div class="intro-container">
    <h1>Welcome to our GTVHub!</h1>
    <p>Discover amazing features and more.</p>
    <a href="{{ route('login') }}" class="btn btn-primary login-button">Login</a>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
