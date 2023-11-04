<?php

$errorMessage = "";
if (isset($_POST['submit'])) {
  $barangay = isset($_POST['barangay']) ? $_POST['barangay'] : '';
  $water = isset($_POST['water']) ? intval($_POST['water']) : 0;
  $rice = isset($_POST['rice']) ? intval($_POST['rice']) : 0;
  $milk = isset($_POST['milk']) ? intval($_POST['milk']) : 0;
  $noodles = isset($_POST['noodles']) ? intval($_POST['noodles']) : 0;
  $medicine = isset($_POST['medicine']) ? intval($_POST['medicine']) : 0;
  $cannedFood = isset($_POST['cannedFood']) ? intval($_POST['cannedFood']) : 0;

    $servername = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $database = 'zero_hunger';

    $conn = new mysqli($servername, $db_username, $db_password, $database);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $userID = '1';
    $sql = "INSERT INTO pending_request (userID, barangay, water, rice, milk, noodles, medicine, cannedFood) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiiiiii", $userID, $barangay, $water, $rice, $milk, $noodles, $medicine, $cannedFood);

    if ($stmt->execute()) {
      $errorMessage = "Successfully add a request.";
    } else {
        echo 'Error: ' . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Document</title>

  <link rel='stylesheet' href='style.css'>
</head>
<body>
  <div class='container'>
    <div class='backContainer'>
      <div class='backIconContainer'>
        <a href='/0-hunger/index.php'>
        <img class='back' src='/0-hunger/picture/arrow-back.svg' alt=''>
        </a>
      </div>
      
      <div class='errorContainer'>
        <p><?php echo"$errorMessage"; ?></p>
      </div>
    </div>

    <div class='requestFormContainer'>
      <form method='post' action='request.php' class='requestContainer'>

        <div class='logoContainer1'>
          <input class='input1' type='text' placeholder='Enter a Barangay' name='barangay' id='' required>
        </div>

        <div class='foodContainer'>
          <div class='subFoodContainer'>
            <div class='food1'>
              
              <p class='nameOfFood1'>Water</p>
              <input name="water" class='input2' type='text' placeholder='Quantity'>
            </div>
          </div>

          <div class='subFoodContainer'>
            <div class='food2'>
              
              <p class='nameOfFood2'>Rice</p>
              <input name="rice" class='input2' type='text' placeholder='Quantity'>
            </div>
          </div>

          <div class='subFoodContainer'>
            <div class='food3'>
              
              <p class='nameOfFood3'>Milk</p>
              <input name="milk" class='input2' type='text' placeholder='Quantity'>
            </div>
          </div>

          <div class='subFoodContainer'>
            <div class='food4'>
              
              <p class='nameOfFood4'>Canned food</p>
              <input name="cannedFood" class='input2' type='text' placeholder='Quantity'>
            </div>
          </div>

          <div class='subFoodContainer'>
            <div class='food5'>
              
              <p class='nameOfFood5'>Noodles</p>
              <input name="noodles" class='input2' type='text' placeholder='Quantity'>
            </div>
          </div>

          <div class='subFoodContainer'>
            <div class='food6'>
              
              <p class='nameOfFood6'>Medicine</p>
              <input name="medicine" class='input2' type='text' placeholder='Quantity'>
            </div>
          </div>
        </div>

        <div class='submitContainer'>
          <button name="submit" class='submitBtn'>Submit</button>
        </div>
      </form>

      <div class='logoContainer'>
        <div class='subLogoContainer'>
          <div class='logo'>
            <div class='imageContainer'>
              <img class='image' src='/0-hunger/picture/istockphoto-1333549239-612x612-removebg-preview.png' alt=''>
            </div>
          </div>

          <div class='logoNameContainer'>
            <p class='name'>ZeroHunger</p>
          </div>
        </div>

        <div class='subLogoContainer1'>
          <p class='paragraph1'>REQUEST FORM</p>
        </div>

        <div class='subLogoContainer'>
          <p class='paragraph2'>Help families suffering from hunger.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>