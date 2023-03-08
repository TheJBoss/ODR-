<?php

    require_once("connect.php");
    //Prepare input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $passConfirm = $_POST['passConfirm'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $pass = test_input($_POST["pass"]);
        $passConfirm = test_input($_POST['passConfirm']);

        
        
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
            
            //if unique email and username hash password and add to table
            else {
                
                //Insert statement
                $sql = "INSERT INTO users (username, hashpass) VALUES (?, ?)";
                
                //Bind variables to prepared statement
                if($stmt = mysqli_prepare($conn, $sql)){

                
                    mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                    //Set parameters
                    $param_username = $username;
                    //Creates a password hash
                    $param_password = password_hash($password, PASSWORD_DEFAULT); 
                    
                    //Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){

                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        
                        //Redirect to login page
                        header("location: login.html");

                    } else{

                        echo "Oops! An error occurred. Try again..";
                    }
                }
            }   
        }
    }
    // close connection
    $conn-> close();

//PHP help from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
?>

<html>  <br><br><a href="index.html">Home</a> <a href="signup.html">Sign Up</a> </html>