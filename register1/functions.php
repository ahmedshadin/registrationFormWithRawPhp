<?php 
    require_once("config.php");

    function email_exits() {
        global $connection;
        global $email;
        
        $query = mysqli_query($connection,
         "SELECT * FROM users WHERE email = '$email'");

        if(mysqli_num_rows($query) == 1) {
            return true;
        }
    }
?>