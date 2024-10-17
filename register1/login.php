<?php 
    session_start();
    require_once("functions.php");
    if(isset($_SESSION["success"])) {
        header("location: profile.php");
        die();
    }

    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        

         if(email_exits()) {
            
            $pass_query = mysqli_query($connection, "SELECT password FROM users WHERE 
            email = '$email'");

            $row = mysqli_fetch_assoc($pass_query);

            if($password == $row["password"]) {
                $_SESSION["success"] = "logged-in";
                header("location: profile.php");
                
            }
            else {
                $warning = "Password does not match";
            }

         }
         else {
            $warning = "email does not exits!";
         }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <form action="" method="POST">
            <label for="email">Email</label> <br>
            <input type="email" name="email" class="gap" id="email"> <br>

            <label for="password">Password</label> <br>
            <input type="password" class="gap" name="password" id="password"> <br>

            <input type="submit" name="login" value="Login">
        </form>
        <div class="success">
            <?php 
                if(isset($success)) {
                    echo $success;
                }
            ?>
        </div>

        <div class="warning">
            <?php 
                if(isset($warning)) {
                    echo $warning;
                }
            ?>
        </div>
        <h3>if you do not registration,please <a href="register.php">register</a> first</h3>
    </div>
</body>
</html>