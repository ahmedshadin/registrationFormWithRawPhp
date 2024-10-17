<?php 
    session_start();
    require_once("functions.php");
    if(isset($_SESSION["success"])) {
        header("location: profile.php");
        die();
    }

    if(isset($_POST["sign_in"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!email_exits()) {
            $error = array();

            if($email == NULL) {
                $error["email"] = "Email is missing";
            }
    
            if($password == NULL) {
                $error["password"] = "Password is missing";
            }
    
            elseif(strlen($password) <= 6) {
                $error["password"] = "password require minimum six characrters";
            }
    
            if(count($error) == 0) {
                $insert = mysqli_query($connection, "INSERT INTO users(
                    email, password
                ) VALUES ('$email', '$password')");
                if($insert) {
                    $success = "Successfully Registered! please <a href='login.php'>login</a>";
                }
            } 
        }
        else {
            $exits = "email already exits!";
        }
        
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="register">
        <form action="" method="POST">
            <label for="email">Email</label> <br>
            <input type="email" class="gap" name="email" id="email"> <br>

            <div class="warning">
                <?php 
                    if(isset($error["email"])) {
                        echo $error["email"];
                    }
                ?>
            </div>

            <label for="password">Password</label> <br>
            <input type="password" class="gap" name="password" id="password"> <br>

            <div class="warning">
                <?php 
                    if(isset($error["password"])) {
                        echo $error["password"];
                    }
                ?>
            </div>

            <input type="submit" name="sign_in" value="Sign">
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
                if(isset($exits)) {
                    echo $exits;
                }
            ?>
        </div>

        <h3>if you already register please <a href="login.php">login</a></h3>
        
   </div> 
</body>
</html>