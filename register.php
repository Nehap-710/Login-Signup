<?php
session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST" )
  {
      //something was posted
      $user_name = $_POST["name"];
      $user_contact = $_POST["contact"];
      $user_email = $_POST["email"];
      $password = $_POST["password"];

      if(!empty($user_email) && !empty($password))
      {
          //save to database
          $query =  "insert into users (user_name,user_email,user_contact,password) values('$user_name', '$user_email', '$user_contact', '$password')";
          
          mysqli_query($con, $query);

          header("Location: login.php");
          die;

      }
      else{
          echo "Please Enter same valid information!!!";
      }
  }
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css?v=<?php echo time(); ?>">
    <title>Login</title>
</head>
<body>
    <header>
        <div class="wrapper">
            <ul class="nav-area">
                <li><a href="homepage.php">Back to Homepage</a></li>
            </ul>
        </div>
        <div class="inputs">
            <form method="POST">
                <div class="Heading">
                    <h1 id="MainHead">Register</h1>
                </div><br>
                <div id="entry">
                    <label class="labels">Name</label> <br><br>
                    <input type="text" name="name" placeholder="Enter your Full Name" class="box"><br><br>
                    
                    <label class="labels">Email</label> <br><br>
                    <input type="email" name="email" placeholder="Enter email address" class="box"><br><br>
                    
                    <label class="labels">Contact</label> <br><br>
                    <input type="text" name="contact" placeholder="Enter your contact number" class="box"><br><br>
                    
                    <label class="labels">Password</label> <br><br>
                    <input type="password" name="password" placeholder="Enter your password" class="box"><br><br>
                    
                    <div class="signup" ><a href="login.php">Already Have an account?</a></div></br>
                    
                    <input type="submit" class="button1" value="Register"> <br> <br>
                </div>
            </form>
        </div>
    </header>
</body>
</html>