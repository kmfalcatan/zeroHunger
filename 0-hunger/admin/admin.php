<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "zero_hunger";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorMessage = '';
$userID = '1';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $barangay = $_POST['barangay'];
    $water = $_POST['water'];
    $rice = $_POST['rice'];
    $milk = $_POST['milk'];
    $noodles = $_POST['noodles'];
    $medicine = $_POST['medicine'];
    $cannedFood = $_POST['cannedFood'];
    $pendingRequestID = $_POST['pendingRequestID'];

    if ($_POST['action'] == "Approve") {
      $sql = "SELECT * FROM pending_request WHERE pendingRequestID = '$pendingRequestID'";
      $result = $conn->query($sql);
  
      if ($result->num_rows == 1) {
          $row = $result->fetch_assoc();
  
          $sql = "INSERT INTO request (userID, barangay, water, rice, milk, noodles, medicine, cannedFood) 
          VALUES ('$userID', '$barangay', '$water', '$rice', '$milk', '$noodles', '$medicine', '$cannedFood')";
          if ($conn->query($sql) === true) {
              $sql = "DELETE FROM pending_request WHERE pendingRequestID = '$pendingRequestID'";
              $conn->query($sql);
          }
      }
  } elseif ($_POST['action'] == "Decline") {
        $sql = "DELETE FROM pending_request WHERE pendingRequestID = '$pendingRequestID'";
        if ($conn->query($sql) === true) {
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/0-hunger/style.css">
  <link rel="stylesheet" href="/0-hunger/admin/admin.css">

  <style>
    html {
      scroll-behavior: smooth;
    }

    * {
      padding: 0;
      margin: 0;
    }

    body {
      overflow-x: hidden;
    }
  </style>
</head>
<body>
  <div class="headerContainer">
    <div class="logoContainer">
      <div class="subLogoContainer">
        <img
          class="logo"
          src="/0-hunger/picture/istockphoto-1333549239-612x612-removebg-preview.png"
          alt=""
        />
      </div>

      <div class="logoNameContainer">
        <p class="name">ZERO HUNGER</p>
      </div>
    </div>
    
    <div class="errorMessage">
      <p><?php echo"$errorMessage"; ?></p>
    </div>

    <div class="navBarContianer1">
      <div class="menuIconContainer">
        <div class="menubarContainer" onclick="toggleMenu(this)">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="sideNavBarContainer">
    <a class="link1" href="/0-hunger/records/records.php">
      <div class="sideNavBar1">
        <p>records of the request</p>
      </div>
    </a>

    <a class="link1" href="/0-hunger/recordsDonation/records.php">
      <div class="sideNavBar1">
        <p>records of donation</p>
      </div>
    </a>
  </div>

  <div class="container1">
    <div class="statusOrderContainer">
      <div class="searchBarContainer">
        <input class="searchBar" type="text" placeholder="Type here to search by order number, name or status">
        <img src="" alt="">
      </div>

      <div class="subStatusOrderContainer"> 
      <table id="requestsTable">
          <tr>
            <th>Barangay</th>
            <th>Water</th>
            <th>Rice</th>
            <th>Milk</th>
            <th>Noodles</th>
            <th>Medicine</th>
            <th>Canned Food</th>
            <th>Action</th>
          </tr>
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "zero_hunger";
          
          $connection = new mysqli($servername, $username, $password, $database);
          if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
          }
          
          $sql = "SELECT * FROM pending_request";
          $result = $connection->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["barangay"] . "</td>";
              echo "<td>" . $row["water"] . "</td>";
              echo "<td>" . $row["rice"] . "</td>";
              echo "<td>" . $row["milk"] . "</td>";
              echo "<td>" . $row["noodles"] . "</td>";
              echo "<td>" . $row["medicine"] . "</td>";
              echo "<td>" . $row["cannedFood"] . "</td>";
              echo "<td>
                <form method='POST' action='admin.php'>
                <input type='hidden' name='pendingRequestID' value='" .$row["pendingRequestID"]. "'>
                  <input type='hidden' name='barangay' value='" . $row["barangay"] . "'>
                  <input type='hidden' name='water' value='" . $row["water"] . "'>
                  <input type='hidden' name='rice' value='" . $row["rice"] . "'>
                  <input type='hidden' name='milk' value='" . $row["milk"] . "'>
                  <input type='hidden' name='noodles' value='" . $row["noodles"] . "'>
                  <input type='hidden' name='medicine' value='" . $row["medicine"] . "'>
                  <input type='hidden' name='cannedFood' value='" . $row["cannedFood"] . "'>
                  <input type='submit' class='btn1' name='action' value='Approve'>
                  <form method='POST' action='admin.php'>
                  <input type='hidden' name='pendingRequestID' value='" .$row["pendingRequestID"]. "'>
                  <input type='submit' class='btn2' name='action' value='Decline'>
              </form>
                </form>
              </td>";
              echo "</tr>";
            }
          } else {
            $errorMessage = "No pending requests found.";
          }
          $connection->close();
          ?>
        </table>
      </div>
    </div>

    
    
  <script src="script.js"></script>
  <script src="/0-hunger/script.js"></script>
</body>
</html>