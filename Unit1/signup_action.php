<?php

require_once("connect.php");

if(isset($_POST['submit'])){
    $username = $POST['username'];
    $email = $POST['email'];
    $pass = $POST['pass'];
    $passConfirm = $POST['passConfirm'];
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $pass = test_input($_POST["pass"]);
        $passConfirm = test_input($_POST['passConfirm']);

    }
    
    //Prepare input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Test if passwords match
    if($pass != $passConfirm){
        echo "Passwords did not match! Try again.";
    
    }
    else {
        $uquery = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        $equery = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        //Check if username or email exists
        if (mysqli_num_rows($uquery) > 0 ){
            echo "Username already exists";
        
        }
        elseif(mysqli_num_rows($equery) > 0){
            echo "Email already in use";
            
        }
        //if unique email and username add to table
        else {

            $sql = "INSERT INTO users VALUES ('0', '$username', '$email', '$pass')";

            $res = mysqli_query($conn, $sql);
            if($res)
            {
                //if successful redirect to login page
                header("location: login.html");
            }
        }
}
    

    // close connection
    $conn-> close();
    
?>

<html>  <br><br><a href="index.html">Home</a> <a href="signup.html">Sign Up</a> </html>
