<?php 

    if(file_exists("config.php")) {
        require_once("config.php");
    }
    if(isset($_POST["register"])) {
        $fname = $_POST["first_name"];
        $lname = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $error = array();

        if($fname == NULL) {
            $error["fname"] = "First name is missing";
        }

        if($lname == NULL) {
            $error["lname"] = "Last name is missing";
        }

        if($email == NULL) {
            $error["email"] = "Email is missing";
        }

        if($password == NULL) {
            $error["password"] = "Password is missing";
        }
        elseif(strlen($password) <= 6) {
            $error["password"] = "Password require minimum 6 characters";
        }

        if(count($error) == 0) {
            $query = mysqli_query($connection, "INSERT INTO info (
                first_name, last_name, email, password
            ) VALUES ('$fname', '$lname', '$email', '$password')");

            if($query) {
                $success = "Successfully Registered!";
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register">
        <form action="" method="POST">
            <label for="first_name">First name</label> <br>
            <input type="text" name="first_name" id="first_name" class="gap"> <br>

            <div class="warning">
                <?php 
                    if(isset($error["fname"])) {
                        echo $error["fname"];
                    }
                ?>
            </div>

            <label for="last_name">Last name</label> <br>
            <input type="text" name="last_name" id="last_name" class="gap"> <br>

            <div class="warning">
                <?php 
                    if(isset($error["fname"])) {
                        echo $error["fname"];
                    }
                ?>
            </div>

            <label for="email">Email</label> <br>
            <input type="email" name="email" id="email" class="gap"> <br>

            <div class="warning">
                <?php 
                    if(isset($error["fname"])) {
                        echo $error["fname"];
                    }
                ?>
            </div>

            <label for="password">Password</label> <br>
            <input type="text" name="password" id="password" class="gap"> <br>

            <div class="warning">
                <?php 
                    if(isset($error["fname"])) {
                        echo $error["fname"];
                    }
                ?>
            </div>

            <input type="submit" name="register" id="" value="Submit" class="gap">
        </form>
        <div class="success">
            <?php 
                if(isset($success)) {
                    echo $success;
                }
            ?>
        </div>
    </div>
</body>
</html>