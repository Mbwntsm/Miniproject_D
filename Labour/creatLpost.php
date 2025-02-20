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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .title {
            text-align: center;
            margin-top: 20px;
            font-size: 2.5em;
            /* Increase font size */
            color: #ffc107;
            /* Bright color */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Shadow for depth */
            font-weight: bold;
            /* Bold font */
        }

        .subtitle {
            text-align: center;
            margin-top: 10px;
            font-size: 1.5em;
            /* Increase font size */
            color: #000000;
            /* White color */
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            /* Shadow for depth */
            font-weight: normal;
            /* Normal font */
        }

        .bg-warning {
            background-color: #000000 !important;
            /* Black color */
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 150px);
        }

        form {
            background-color: #000000;
            padding: 20px;
            border-radius: 5px;
            width: 90%;
            max-width: 400px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        @media (max-width: 480px) {
            form {
                width: 95%;
            }
        }
    </style>

</head>

<body>
    <?php include 'navigation.php'; ?>
    <?php
    echo "<h1 class='title'>Hello {$_SESSION['user_name']}</h1>";
    echo "<h1 class='subtitle'>If You want Work, Let your potential Client Know</h1>";
    ?>

    <div class="form-container">
        <form action="uploadL.php" method="post" enctype="multipart/form-data">
            <select name="workType">
                <option value="">Select Work Type</option>
                <option value="electrician">Electrician</option>
                <option value="plumber">Plumber</option>
                <option value="carpenter">Carpenter</option>
                <option value="painter">Painter</option>
                <option value="mason">Mason</option>
                <option value="other">Other</option>
            </select>

            <input type="number" placeholder="Expected Salary" name="salary" required>
            <input type="text" placeholder="Your Experience" name="experience" required>

            <select name="city">
                <option value="">Select City</option>
                <option value="indore">Indore</option>
                <option value="bhopal">Bhopal</option>
                <option value="ujjain">Ujjain</option>
                <option value="daiwas">Daiwas</option>
            </select>

            <input type="text" placeholder="Your Location" name="location" required>
            <input type="file" accept=".jpg, .png, .jpeg" name="pdtimg" required>

            <button type="submit">Create Post</button>
        </form>
    </div>

</body>

</html>