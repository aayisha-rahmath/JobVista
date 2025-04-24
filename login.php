<?php
include 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: home.html");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobVista Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background-color: #f5f7fa;
    }

    .container {
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      width: 900px;
      height: 550px;
      display: flex;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
    }

    .card-left {
      width: 50%;
      background-color: #ffffff;
      padding: 40px;
      box-sizing: border-box;
    }

    .card-left img {
      width: 140px;
      display: block;
      margin: 0 auto 20px;
    }

    .card-left h3 {
      text-align: center;
      color: #2c365d;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      color: #333;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background-color: #2c365d;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    .btn:hover {
      background-color: #1f2746;
    }

    .form-footer {
      text-align: center;
      margin-top: 15px;
    }

    .form-footer a {
      font-size: 14px;
      text-decoration: none;
      color: #2c365d;
    }

    .form-footer a:hover {
      text-decoration: underline;
    }

    .signup {
      text-align: center;
      margin-top: 20px;
    }

    .signup p {
      margin: 0;
      font-size: 14px;
    }

    .signup a {
      color: #bfa76f;
      text-decoration: none;
      font-weight: bold;
    }

    .signup a:hover {
      text-decoration: underline;
    }

    .card-right {
      width: 50%;
      padding: 40px;
      color: white;
      background: linear-gradient(to bottom right, #bfa76f, #2c365d);
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .card-right h4 {
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
    }

    .card-right p {
      font-size: 15px;
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      .card {
        flex-direction: column;
        height: auto;
      }
      .card-left,
      .card-right {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="card">
      <!-- Left Panel -->
      <div class="card-left">
        <img src="img/jobvista.png" alt="JobVista Logo">
        <h3>Welcome to JobVista</h3>

        <form action="login.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Enter your username">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password">
  </div>

  <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i> Log In</button>

  <div class="form-footer">
    <a href="#">Forgot password?</a>
  </div>

  <div class="signup">
    <p>Don't have an account? <a href="register.php">Create Account</a></p>
  </div>
</form>

      </div>

      <!-- Right Panel -->
      <div class="card-right">
        <h4>JobVista — Where Skills Meet Opportunities</h4>
        <p>We connect passionate individuals with the perfect job opportunities. Whether you're seeking your dream role or hiring the best talent, JobVista is your trusted platform to grow, network, and succeed.</p>
      </div>
    </div>
  </div>

</body>
</html>
