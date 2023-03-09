<?php include('connect.php'); 

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>My Account</title>

        <!--Links at the top of the page-->
    <div class="links">
        <a href="index.html">Home</a> <a href="marketplace.html">Marketplace</a> <a href="logout.php">Logout</a>
        </div><br><br>
    </head>

    <body>
        <h2>Welcome <?php echo $_SESSION['username']; ?></h2><br><br>

        <div class="userImg">
            <img src="Images\resizedHockeySil.jpg" width= 15%><br>
            <label for="userImg">Upload Profile Picture</label><br>
            <input type="file" name="userImg"><br>
            <input type="submit">
        </div>

        <div class="userInfo">
            <label>Username</label>
            <?php echo $_SESSION['username']; ?><br><br>
            <form>
                <label>Age</label><br>
                <input type="number" name="age" min="13"><br><br>
            </form>
        </div>
            <h4>Preferred Rinks</h4>
            <table border="1px">
                <th>Name</th><th>Distance</th>
                <tr>
                    <td><a href=#>Public Rink 4</a></td><td>1 Km away</td>
                </tr>
                <tr>
                    <td><a href=#>Public Rink 6</a></td><td>4 Km away</td>
                </tr>
            </table>

           <h4>Skill Level and Equipment</h4>
            <p>Beginner
            <li>Stick</li>
            <li>Skates</li>
            <li>Helmet</li>
            <li>Gloves</li></p>
        </div>

        <div class="userListings">
            <table border="1px"></table>
            <h4><?php echo $_SESSION['username']; ?>'s Marketplace listings</h4>
                <table border="1px">
                    <th>Item</th><th>Price</th>
                    <tr>
                        <td><a href=#>Item for sale</a></td> <td>$1</td>
                    </tr>
                
                    <tr>
                        <td><a href=#>Item for sale</a></td> <td>$2</td>
                    </tr>
                
                    <tr>
                        <td><a href=#>Item for sale</a></td> <td>$3</td>
                    </tr>
                </table>
            <br>
        <div class="connections">
            
            <table border="1px">
                <th>Connections</th><th>Friends</th><th>Teammates</th>
                <tr>
                    <td><a href=#>Person A</a></td><td><a href=#>Person B</a></td><td><a href=#>Person B</a></td>
                </tr>
                <tr>
                    <td><a href=#>Person B</a></td><td><a href=#>Person C</a></td><td><a href=#>Person D</a></td>
                </tr>



    </body>
</html>