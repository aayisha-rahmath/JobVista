<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, last_name, email, username, password) 
            VALUES ('$fname', '$lname', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registered successfully!";
        header("Location: login.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>JobVista - Sign Up</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

  <style>
    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background-color: #f5f7fa;
    }

    .container {
      width: 100%;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px; 
      box-sizing: border-box;
    }

    .card {
      width: 900px;
      display: flex;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      flex-direction: row;
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
      align-items: center;
      text-align: center;
    }

    .card-right img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
      border: 2px solid white;
    }

    .card-right h4 {
      margin-bottom: 15px;
      font-size: 22px;
    }

    .card-right p {
      font-size: 15px;
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      .container {
        padding: 20px;
      }

      .card {
        flex-direction: column;
        min-height: auto;
        height: auto;
      }

      .card-left,
      .card-right {
        width: 100%;
        padding: 30px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="card">
      <!-- Left Panel -->
      <div class="card-left">
        <h3>Create Your JobVista Account</h3>

        <form action="register.php" method="POST">
  <div class="form-group">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Enter your first name" />
  </div>

  <div class="form-group">
    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" placeholder="Enter your last name" />
  </div>

  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" />
  </div>

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Choose a username" />
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Create a password" />
  </div>

  <button type="submit" class="btn"><i class="fas fa-user-plus"></i> Sign Up</button>
</form>

      </div>

      <!-- Right Panel -->
      <div class="card-right">
        <img src="img/jobvista.png" alt="JobVista Logo">
        <h4>JobVista — Where Skills Meet Opportunities</h4>
        <p>Unlock new possibilities by joining JobVista. Whether you're launching your career or expanding your team, we're here to empower your journey with opportunities that match your potential.</p>
      </div>
    </div>
  </div>

</body>
</html>
