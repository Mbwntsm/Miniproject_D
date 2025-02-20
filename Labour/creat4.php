<?php
session_start();

if (!isset($_SESSION["login_status"])) {
  echo "Login in skipped";
  die;
}

if ($_SESSION["login_status"] == false) {
  echo "Unauthorized Attempt";
  die;
}

include "menu.html";

echo "<h1 class='greeting'>Hello {$_SESSION['user_name']}</h1>";
echo "<h1 class='info'>If You want Work, Let your potential Client Know</h1>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .greeting {
      text-align: center;
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .info {
      text-align: center;
      margin-bottom: 30px;
    }

    form {
      background-color: #ffc107;
      padding: 20px;
      border-radius: 5px;
      width: 400px;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      background-color: #218838;
    }
  </style>
</head>

<body>

  <div>
    <form action="uploadL.php" method="post" enctype="multipart/form-data">
      <select name="workType" required>
        <option value="">Select Work Type</option>
        <option value="electrician">Electrician</option>
        <option value="plumber">Plumber</option>
        <option value="carpenter">Carpenter</option>
        <option value="painter">Painter</option>
        <option value="mason">Mason</option>
        <option value="other">Other</option>
      </select>

      <input type="number" placeholder="Salary you expect from client" name="salary" required>
      <input type="text" placeholder="Your Experience in this field" name="experience" required>

      <select name="city" required>
        <option value="">Select City</option>
        <option value="indore">Indore</option>
        <option value="bhopal">Bhopal</option>
        <option value="ujjain">Ujjain</option>
        <option value="daiwas">Daiwas</option>
      </select>

      <input type="text" placeholder="Area where client can find you" name="location" required>

      <input type="file" accept=".jpg, .png, .jpeg" name="pdtimg" required>

      <button type="submit">Create Post</button>
    </form>
  </div>

</body>

</html>