<?php

//start session
session_start();

//check session status

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) 
{
    header("location: account.php");
    exit;
}

require_once("connect.php");

//Required Variables-starts empty
$username = "";
$pass = "";


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    test_input($username);
    test_input($pass);
    echo $username;

    //Select statement
    $sql = "SELECT id, username, hashpass FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) 
    {
        //Bind variables to the prepared statement as paramenters 
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        //Username paramenter
        $param_username = $username;
        //Try to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) 
        {

            //Store result
            mysqli_stmt_store_result($stmt);

            //Check is user exists
            if (mysqli_stmt_num_rows($stmt) == 1) 
            {

                mysqli_stmt_bind_result($stmt, $id, $username, $hashpass);

                if (mysqli_stmt_fetch($stmt)) 
                {

                    //Check if password is correct
                    if (password_verify($pass, $hashpass)) 
                    {
                        session_start();
                        echo "Logged in!";

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;

                        header("location: account.php");

                    } 
                    else 
                    {
                        //Invalid password
                        echo "Invalid username or password.";
                    }
                    
                }
            }
            else
            {
                echo "Invalid username or password";
            }
        }
        else
        {
            echo "Something went wrong, please try again later.";
        }
        mysqli_stmt_close($stmt);
        
    }
    mysqli_close($conn);
}

//PHP help from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
?>