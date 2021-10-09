<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($user_email) && !empty($password) )
    {

        //read from database
        $query = "SELECT * FROM users WHERE id = 1 limit 1 ";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) >= 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {

                    $_SESSION['user_email'] = $user_data['user_email'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        
        echo "wrong username or password!";
    }else
    {
        echo "wrong username or password!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
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
                    <h1 id="MainHead">Login</h1>
                </div><br>
                <div id="entry">
                    <label class="labels">Email</label> <br><br>
                    <input type="email" name="email" placeholder="Enter email address" class="box"><br><br>
                    
                    <label class="labels">Password</label> <br><br>
                    <input type="password" name="password" placeholder="Enter your password" class="box"><br><br>
                    
                    <div class="signup" ><a href="register.php">Do Not Have an Account?</a></div></br>
                    
                    <input type="submit" class="button1" value="Login"> <br> <br>
                </div>
            </form>
        </div>
    </header>
</body>
</html>