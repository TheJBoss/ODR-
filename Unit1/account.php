<?php include('connect.php') ?>
<!DOCTYPE html>

<html>
    <head>
        <title>My Account</title>

        <!--Links at the top of the page-->
    <div class="links">
        <a href="index.html">Home</a> <a href="marketplace.html">Marketplace</a> <a href="logout.html">Logout</a>
        </div>
    </head>

    <body>
        Welcome <?php echo $_SESSION['username']; ?>
    </body>
</html>