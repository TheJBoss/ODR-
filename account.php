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
        <link rel="stylesheet" href="css/test.css">
       
    </head>

 
    

    <body>

        <div class="container">
                
<!--Navbar at the top of the page-->
    <header>
        <div class="nav">
            <ul class="nav_links">
                <li class="list">
                    <a href="index.html">
                    <span class=icon>
                        <img width="100px" src="Images\logo.jpg">
                    </span>
                    <span class=text>Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="marketplace.html">
                    <span class=icon>
                        <img width="30px" src="Images\marketplace_icon.svg">
                    </span>
                    <span class=text>Marketplace</span>
                    </a>
                </li>
                <li class="list">
                    <a href="account.php">
                        <span class=icon>
                            <img width="30px" src="Images\hockey_player_icon.svg">
                        </span>
                    <span class=text>My Account</span>
                    </a>
                </li>
                <li class="list">
                    
                        <a href="logout.php">
                            <span class=icon>
                                <img width="30px" src="Images\hockey_puck_icon.svg">
                            </span>
                        
                        <span class=text>logout</span>
                        </a>
                    
                </li>
                <li class="list">
                    <a href="Samples/edittedSample1.html">
                        <span class=icon>
                            <img width="28px" src="Images\page_icon.svg">
                        </span>
                    <span class=text>A Better Sample</span>
                    </a>
                </li>
            </ul>
        </div>
    </header> 

        <div class="account_container">
            <div class='welcome'><h2>Welcome <?php echo $_SESSION['username']; ?></h2></div>

            <div class="info">
            
                <img src="Images\resizedHockeySil.jpg" width= 15%><br>
                <label for="userImg">Upload Profile Picture</label><br>
                <input type="file" name="userImg"><br>
                <input type="submit">
            
        

                <br><br>
            
                <h3>Username</h3>
                <?php echo $_SESSION['username']; ?><br><br>
                <form>
                    <label>Age</label><br>
                    <input type="number" name="age" min="13"><br><br>
                </form>
            </div>





            <div class="rinks">
                <h3>Preferred Rinks</h3>
                <table class="table" border="1px">
                    <th>Name</th><th>Distance</th>
                    <tr>
                        <td><a href=#>Public Rink 4</a></td><td>1 Km away</td>
                    </tr>
                    <tr>
                        <td><a href=#>Public Rink 6</a></td><td>4 Km away</td>
                    </tr>
                </table>
            </div>

            <div class="skills">
                <h3>Skill Level and Equipment</h3>
                    <p>Beginner
                    <li>Stick</li>
                    <li>Skates</li>
                    <li>Helmet</li>
                    <li>Gloves</li></p>
            </div>
        
            <div class="listings">
                
                <h3><?php echo $_SESSION['username']; ?>'s Marketplace listings</h4>
                    <table class="table" border="1px">
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
            </div>

            <div class="connections">
                <h3><?php echo $_SESSION['username']; ?>'s Connections
                <table class="table" border="1px">
                    <th>Connections</th><th>Friends</th><th>Teammates</th>
                    <tr>
                        <td><a href=#>Person A</a></td><td><a href=#>Person B</a></td><td><a href=#>Person B</a></td>
                    </tr>
                    <tr>
                        <td><a href=#>Person B</a></td><td><a href=#>Person C</a></td><td><a href=#>Person D</a></td>
                    </tr>
                </table>
            </div>
        </div>

    <footer >
        <hr class="footerHR">
        <ul class="footerLinks">
            <li class="left_footer">
                <a href="TaC.html">
                    <span class="text">Terms and Conditions</span>
                </a>
            </li>
          <li class="center_footer">
              <h3>Newsletter</h3>
              <form>
                  <input type="email" class="newsletter" placeholder="Join our newsletter" required><br>
                  <button type="submit">Join</button>
              </form>
          </li>
           <li class="right_footer">
                <a href="feedback.html">
                    <span class="text">Feedback</span>
                </a>
            </li>
        </ul>

  </footer>
                
            

   
    
<!--Sign up Modal-->
<div class="overlay" id="popup1">
    <div class="popup">
        <a class="close" href="#">&times;</a>

        <div class="content">
            
            <form action="signup_action.php" method="post">
                <div class="imgcontainer">
                    <img src="Images\resizedHockeySil.jpg" alt="Silhouette of a hockey player" width="150" />
                </div>

                <h1>Sign up</h1>
                <p>Please fill out your details below</p>
                <br>
                <div class="inputs">
                    <input type="text" class="user_inputs" placeholder="Username" name="username" required><br>

                    <input type="email" class="user_inputs" placeholder="Email" name="email" required><br>

                    <input type="password" class="user_inputs" placeholder="Password" name="pass"        required><br>

                    <input type="password" class="user_inputs" placeholder="Confirm Password" name="passConfirm" required><br>
                </div>
                <button type="submit" class="modal_button" name="signup">Sign Up</button>
            </form>
        </div>
    </div>
</div>

<!--Sign in Modal-->
<div class="overlay" id="popup2">
    <div class="popup">
        <a class="close" href="#">&times;</a>

        <div class="content">
            
            <form action="login_action.php" method="post">
                <div class="imgcontainer">
                    <img src="Images\resizedHockeySil.jpg" alt="Silhouette of a hockey player" width="150" />
                </div>

                <h1>Sign In</h1>
                <p>Please fill out your details below</p>
                <br>
                
                    <input type="text" class="user_inputs" placeholder="Username" name="username" required><br>

                    <input type="password" class="user_inputs" placeholder="Password" name="pass"        required><br>
                
                <button type="submit" class="modal_button" name="signIn">Sign In</button>
                <br>
                <div class="forgot">
                    <a href="forgotPassword.html"><button>Forgot Password</button></a>
                </div>
            </form>
            
        </div>
    </div>
</div>

    </body>
</html>
