<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Document</title>

  <link rel='stylesheet' href='style.css'>
</head>
<body>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "zero_hunger";

$error = "";
$conn = new mysqli($servername, $username, $password, $database);

$destination = "/0-hunger/index.html";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM useraccount WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['userID'] = $row['userID'];
        header("location: $destination");
    } else {
        $error = "Invalid username or password";
    }
}
    echo"<div class='container'>
      <div class='backContainer'>
        <div class='backIconContainer'>
          <a href='/0-hunger/index.php'>
          <img class='back' src='/0-hunger/picture/arrow-back.svg' alt=''>
          </a>
        </div>
        
        <div class='errorContainer'>
          <p>" .$error. "</p>
        </div>
      </div>

      <div class='loginFormContainer'>
        <div class='subLoginContainer'>
          <div class='picturecontainer2'></div>
  
          <form action='login.php' method='post' class='loginForm'>
  
            <div class='subLoginForm'>
              <div class='usernameContainer'>
                <div class='username'>
                  <p class='name'>Username: </p>
                </div>
  
                <div class='inputContainer'>
                      <input name='username' class='input1' type='text' required>
                </div>
              </div>
  
              <div class='passwordContainer'>
                  <div class='username'>
                      <p class='name'>Password: </p>
                  </div>
  
                  <div class='inputContainer'>
                      <input name='password' class='input1' type='password' required>
                </div>
              </div>
            </div>
  
            <div class='registerContainer'>
              <p>doesnt't have an account yet? <a class='register' href='/0-hunger/login/register.php'>Register</a></p>
            </div>
  
            <div class='submitContainer'>
              <button value='Login' class='submitBtn'>
                  Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>";
    
    $conn->close();
    ?>
</body> 
</html>