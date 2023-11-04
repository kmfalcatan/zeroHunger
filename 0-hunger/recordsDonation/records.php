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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $donateID = $_POST['donateID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $emailAddress = $_POST['emailAddress'];
    $money = $_POST['money'];

    if ($_POST['action'] == "Delete") {
        $sql = "DELETE FROM donate WHERE donateID = '$donateID'";
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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/0-hunger/style.css">

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
  </div>

  <div class="sideNavBarContainer">
      <div class="sideNavBar1">
        <p>records</p>
      </div>
  </div>

  <div class="container1">
    <div class="backContainer">
      <a href="/0-hunger/admin/admin.php">
        <img class="back" src="/0-hunger/picture/arrow-back.svg" alt="">
      </a>
    </div>

    <div class="statusOrderContainer">
      <div class="searchBarContainer">
        <input class="searchBar" type="text" placeholder="Type here to search by order number, name or status">
        <img src="" alt="">
      </div>

      <div class="subStatusOrderContainer"> 
      <table id="donatesTable">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Donation</th>
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
          
          $sql = "SELECT * FROM donate";
          $result = $connection->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["firstName"] . "</td>";
              echo "<td>" . $row["lastName"] . "</td>";
              echo "<td>" . $row["phoneNumber"] . "</td>";
              echo "<td>" . $row["emailAddress"] . "</td>";
              echo "<td>" . $row["money"] . "</td>";
              echo "<td>
                <form method='POST' action='records.php'>
                <input type='hidden' name='donateID' value='" .$row["donateID"]. "'>
                  <input type='hidden' name='firstName' value='" . $row["firstName"] . "'>
                  <input type='hidden' name='lastName' value='" . $row["lastName"] . "'>
                  <input type='hidden' name='phoneNumber' value='" . $row["phoneNumber"] . "'>
                  <input type='hidden' name='emailAddress' value='" . $row["emailAddress"] . "'>
                  <input type='hidden' name='money' value='" . $row["money"] . "'>
                  <form method='POST' action='records.php'>
                  <input type='hidden' name='donateID' value='" .$row["donateID"]. "'>
                  <input type='submit' class='btn2' name='action' value='Delete'>
              </form>
                </form>
              </td>";
              echo "</tr>";
            }
          } else {
            $errorMessage = "No donation was found..";
          }
          $connection->close();
          ?>
        </table>
      </div>
    </div>
</body>
</html>