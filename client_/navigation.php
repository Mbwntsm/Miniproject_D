<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Navigation Bar</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background-color: #333;
      color: white;
    }

    .nav-left ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .nav-left li {
      margin-right: 20px;
    }

    .nav-left a {
      color: white;
      text-decoration: none;
      padding: 5px 10px;
      transition: background-color 0.3s;
    }

    .nav-left a:hover {
      background-color: #575757;
      border-radius: 5px;
    }

    .nav-right {
      display: flex;
      align-items: center;
      margin-left: auto;
      margin-right: 50px;
    }

    .logout-button {
      background-color: #e74c3c;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .logout-button:hover {
      background-color: #c0392b;
    }


    .profile-sidebar {
      position: fixed;
      top: 0;
      right: -350px;
      /* Initially hidden offscreen */
      width: 350px;
      height: 100%;
      background-color: #fff;
      box-shadow: -3px 0 5px rgba(0, 0, 0, 0.2);
      transition: right 0.3s ease;
      overflow-y: auto;
      padding: 20px;
      z-index: 1000;
    }

    .profile-sidebar.active {
      right: 0;
      /* Slide in when active */
    }

    .close-btn {
      font-size: 24px;
      color: #333;
      text-decoration: none;
      display: block;
      text-align: right;
      margin-bottom: 15px;
    }

    #profile-content {
      margin-top: 20px;
    }

    /* Profile card content styling */
    .profile-card {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .profile-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 2px solid #ddd;
    }

    .profile-card h2 {
      margin: 0 0 10px;
      font-size: 22px;
      color: #333;
    }

    .profile-card p {
      margin: 5px 0;
      font-size: 16px;
      color: #666;
    }

    .profile-card p strong {
      color: #333;
    }

    hr {
      border: none;
      border-top: 1px solid #ddd;
      margin: 20px 0;
    }
  </style>
</head>

<body>

  <nav class="navbar">
    <div class="nav-left">
      <ul>
        <li><a href="availableLabour.php">Explore Work</a></li>
        <li><a href="creatjob.php">Create Job</a></li>
        <li><a href="view.php">View Post</a></li>
        <li><a href="#" class="" id="profile-link">View Profile</a></li>
      </ul>
    </div>
    <div class="nav-right">

      <a href="../Shared/logout.php"> <button class="logout-button">Logout</button>

    </div>
  </nav>


</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Card Sidebar</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f0f2f5;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .profile-sidebar {
      position: fixed;
      top: 0;
      right: -350px;
      /* Initially hidden offscreen */
      width: 350px;
      height: 100%;
      background-color: #fff;
      box-shadow: -3px 0 5px rgba(0, 0, 0, 0.2);
      transition: right 0.3s ease;
      overflow-y: auto;
      padding: 20px;
      z-index: 1000;
    }

    .profile-sidebar.active {
      right: 0;
      /* Slide in when active */
    }

    .close-btn {
      font-size: 24px;
      color: #333;
      text-decoration: none;
      display: block;
      text-align: right;
      margin-bottom: 15px;
    }

    #profile-content {
      margin-top: 20px;
    }

    /* Profile card content styling */
    .profile-card {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .profile-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 2px solid #ddd;
    }

    .profile-card h2 {
      margin: 0 0 10px;
      font-size: 22px;
      color: #333;
    }

    .profile-card p {
      margin: 5px 0;
      font-size: 16px;
      color: #666;
    }

    .profile-card p strong {
      color: #333;
    }

    hr {
      border: none;
      border-top: 1px solid #ddd;
      margin: 20px 0;
    }
  </style>
</head>

<body>

  <!-- Profile Link -->


  <!-- Profile Card Sidebar -->
  <div id="profile-card" class="profile-sidebar">
    <a href="#" id="close-btn" class="close-btn">&times;</a>
    <div id="profile-content">
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const profileLink = document.getElementById('profile-link');
      const profileCard = document.getElementById('profile-card');
      const closeBtn = document.getElementById('close-btn');
      const profileContent = document.getElementById('profile-content');


      profileLink.addEventListener('click', function(e) {
        e.preventDefault();
        const userId = 1;
        loadProfileData(userId);
        profileCard.classList.toggle('active');
      });
      closeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        profileCard.classList.remove('active');
      });

      function loadProfileData(userId) {
        fetch(`profile1.php?user_ID=${userId}`)
          .then(response => response.text())
          .then(data => {
            profileContent.innerHTML = data;
          })
          .catch(error => console.error('Error fetching profile data:', error));
      }
    });
  </script>
</body>

</html>