<?php
require 'common.php';

//Grab all the users from our database
$users = $database->select("users", [
    'id',
    'name',
    'rfid_uid'
]);

?>

<?php
//Check if we have a year passed in through a get variable, otherwise use the current year
if (isset($_GET['year'])) {
    $current_year = int($_GET['year']);
} else {
    $current_year = date('Y');
}

//Check if we have a month passed in through a get variable, otherwise use the current year
if (isset($_GET['month'])) {
    $current_month = $_GET['month'];
} else {
    $current_month = date('n');
}

//Calculate the amount of days in the selected month
$num_days = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin Dashboard | SVCI </title>
    <link rel="stylesheet" href="css/style.student.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="js/bootstrap.min.js"></script>
    </head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="images/svci.png.png" alt="SVCI LOGO">
      <span class="logo_name">Computer Laboratory</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="index.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class='bx bx-box' ></i>
            <span class="links_name">Students</span>
          </a>
        </li>
        <li>
          <a href="attendance.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Attendance</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-border-all'></i>
            <span class="links_name">Teachers</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Exam</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Student</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <i class='bx bx-user'></i>
        <span class="admin_name">Erica R.</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <div class="home-content">
      <div class="title">RADIO-FREQUENCY IDENTIFICATION INFORMATION</div>
      <div class="st-boxes">
        <div class="student box">
          <div class="container">
              <table class="table table-striped">
                  <thead class="thead-dark">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">RFID UID</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      //Loop through and list all the information of each user including their RFID UID
                      foreach($users as $user) {
                          echo '<tr>';
                          echo '<td scope="row">' . $user['id'] . '</td>';
                          echo '<td>' . $user['name'] . '</td>';
                          echo '<td>' . $user['rfid_uid'] . '</td>';
                          echo '</tr>';
                      }
                      ?>
                  </tbody>
              </table>
          </div>

          <div class="button">
            <a href="execute_script.php?action=start">Start</a>
          </div>
          <div class="button1">
            <a href="execute_script.php?action=stop">Stop</a>
        </div>

      </div>
    </div>
  </div>
  </section>
  <script src="js/script.dashboard.js"></script>
</body>
</html>
