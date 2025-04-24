<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $user_type = $_POST['user_type'];
    $job_title = $_POST['job_title'];
    $job_type = $_POST['job_type'];
    $applying_date = $_POST['applying_date'];

    
    $sql = "INSERT INTO job_applications (name, email, contact, user_type, job_title, job_type, applying_date)
            VALUES ('$name', '$email', '$contact', '$user_type', '$job_title', '$job_type', '$applying_date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.html");
        exit();
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
  <title>JobVista - Apply Now</title>
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

    .form-group input,
    .form-group select {
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
        <h3>Apply for a Job</h3>

        <form action="apply.php" method="POST">
          <div class="form-group">
            <label for="name">Full Name</label>
			<input type="text" name="name" placeholder="Your Name" required>
          </div>

          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Email Address" required>
          </div>

          <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="text" name="contact" placeholder="Contact Number" required>
          </div>

          <div class="form-group">
            <label for="user-type">User Type</label>
            <select name="user_type">
              <option value="fresher">Fresher</option>
              <option value="employee">Employee</option>
            </select>
          </div>

          <div class="form-group">
            <label for="job-title">Job Title</label>
             <input type="text" name="job_title" placeholder="Job Title" required>
          </div>

          <div class="form-group">
            <label for="job-type">Job Type</label>
            <select name="job_type">
			<option value="full-time">Full-Time</option>
			<option value="part-time">Part-Time</option>
			</select>
          </div>

          <div class="form-group">
            <label for="date">Applying Date</label>
            <input type="date" name="applying_date" required>
          </div>

          <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Submit Application</button>
        </form>
      </div>

      <!-- Right Panel -->
      <div class="card-right">
        <img src="img/jobvista.png" alt="JobVista Logo" />
        <h4>JobVista — Where Skills Meet Opportunities</h4>
        <p>Join us in connecting your talents to the right career path. Apply now and take your first step toward your future!</p>
      </div>
    </div>
  </div>

</body>
</html>
