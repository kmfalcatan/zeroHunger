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
    $username = $connection->real_escape_string($_POST['username']);
    $password = $connection->real_escape_string($_POST['password']);

    $sql = "INSERT INTO useraccount (username, password) 
            VALUES ('$username', '$password')";
    if ($connection->query($sql) === true) {
        $errorMessage = "Successfully registered.";
    } else {
        $errorMessage = "Registration failed: " . $connection->error;
    }
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
        <a href="/0-hunger/login/login.php">
          <div class="backIconContainer">
            <img class="back" src="/0-hunger/picture/arrow-back.svg" alt="">
          </div>
        </a>
        
        <div class="errorContainer">
          <p><?php echo"$errorMessage"; ?></p>
        </div>
      </div>

      <div class="loginFormContainer">
        <div class="subLoginContainer">
          <div class="picturecontainer2"></div>
  
          <form action='register.php' method='post' class="loginForm">
  
            <div class="subLoginForm">
              <div class="usernameContainer">
                <div class="username">
                  <p class="name">Username: </p>
                </div>
  
                <div class="inputContainer">
                      <input name="username" class="input1" type="text" required>
                </div>
              </div>
  
              <div class="passwordContainer">
                  <div class="username">
                      <p class="name">Password: </p>
                  </div>
  
                  <div class="inputContainer">
                      <input name="password" class="input1" type="password" required>
                </div>
              </div>
            </div>
  
            <div class="submitContainer">
              <input value='Register' class='submitBtn' type='submit'>
            </div>
          </form>
        </div>
      </div>
    </div>
</body> 
</html>