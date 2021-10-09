<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="homepage.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
<header>
    <div class="wrapper">
        <ul class="nav-area">
          <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="welcome-text">
        <h1>"The Universe said,<span> Let Me Show"</span></h1>
        <h1>Hello, <?php echo $user_data['user_name']; ?></h1>
    </div>
</header>
</body>
</html>