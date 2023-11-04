<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "zero_hunger";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$errorMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $connection->real_escape_string($_POST['firstName']);
    $lastName = $connection->real_escape_string($_POST['lastName']);
    $phoneNumber = $connection->real_escape_string($_POST['phoneNumber']);
    $emailAddress = $connection->real_escape_string($_POST['emailAddress']);
    $money = $connection->real_escape_string($_POST['money']);

    $userID = 1;
    
    $sql = "INSERT INTO donate (userID, firstName, lastName, phoneNumber, emailAddress, money) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("issisi", $userID, $firstName, $lastName, $phoneNumber, $emailAddress, $money);

    if ($stmt->execute()) {
        $errorMessage = "Thank you for your donation.";
    } else {
        $errorMessage = "Insertion failed: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="backContainer">
      <div class="backIconContainer">
        <a href="/0-hunger/index.php">
        <img class="back" src="/0-hunger/picture/arrow-back.svg" alt="">
        </a>
      </div>
      
      <div class="errorContainer">
        <p><?php echo"$errorMessage";?></p>
      </div>
    </div>

    <div class="requestFormContainer">
      <form method="post" action="donation.php" class="requestContainer">
        <div class="infoContainer">
          <div class="inputContainer">
            <div class="nameContainer">
              <p class="name1">First Name:</p>
            </div>

            <div class="subInputContainer">
              <input name="firstName" class="input3" type="text" placeholder="Enter your first name" required>
            </div>
          </div>

          <div class="inputContainer">
            <div class="nameContainer">
              <p class="name1">Last Name:</p>
            </div>

            <div class="subInputContainer">
              <input name="lastName" class="input3" type="text" placeholder="Enter your last name" required>
            </div>
          </div>

          <div class="inputContainer">
            <div class="nameContainer">
              <p class="name1">Phone Number:</p>
            </div>

            <div class="subInputContainer">
              <input name="phoneNumber" class="input3" type="text" placeholder="Enter your phone number" required>
            </div>
          </div>

          <div class="inputContainer">
            <div class="nameContainer">
              <p class="name1">Email Address:</p>
            </div>

            <div class="subInputContainer">
              <input name="emailAddress" class="input3" type="text" placeholder="Enter you email address" required>
            </div>
          </div>  
        </div>

        <div class="donateContainer">
          <div class="nameContainer">
            <p class="name1">How much do you wish to donate?</p>
          </div>

          <div class="subInputContainer">
            <input name="money" class="input3" type="text" placeholder="₱:" required>
          </div>
        </div>

        <div class="submitContainer">
          <button name="sibmit" class="submitBtn">Submit</button>
        </div>
      </form>

      <div class="logoContainer">
        <div class="subLogoContainer">
          <div class="logo">
            <div class="imageContainer">
              <img class="image" src="/0-hunger/picture/istockphoto-1333549239-612x612-removebg-preview.png" alt="">
            </div>
          </div>

          <div class="logoNameContainer">
            <p class="name">ZeroHunger</p>
          </div>
        </div>

        <div class="subLogoContainer1">
          <p class="paragraph1">DONATION FORM</p>
        </div>

        <div class="subLogoContainer">
          <p class="paragraph2">Help families suffering from hunger.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>