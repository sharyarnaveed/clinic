<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">
    <title>Client</title>
</head>
<?php


  if(isset($_POST["login_username"])&&isset($_POST["login_password"]))
  {
    $login_user=$_POST["login_username"];
    $loginpass=$_POST["login_password"];
    if($login_user=="sharyar"&&$loginpass=="pass123")
  {
    header('Location:main.php');
  }
  else
  {
   $display_messege="1";
  }
  }

  
?>
<body>
    <!-- login to enter the system first -->
    <div class="container">
<img src="images/hush-naidoo-jade-photography-yo01Z-9HQAw-unsplash.jpg" alt="background image">
        <div class="login_entry">
           <h2>Login</h2>

            <form action="index.php" method="post">
            <p style='color:#ff4567' ><?php if(!empty($display_messege))
                {
                      echo "Invalid Username or Password!";
                }
                ?>
                </p>
                <input type="text" name="login_username" placeholder="User Name">
                <input type="password" name="login_password" placeholder="Password" required>
                
<!-- <input type="submit" value=""> -->
<button type="submit">Log In</button>

            </form>
        </div>

    </div>


</body>

</html>
