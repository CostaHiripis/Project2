<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/loginstyle.css">
  </head>
  <body>
    <div class="outer">
      <div class="middle">
        <div class="inner">
          <form method="post">
              <div><a href="login.php"><img id="backbtn" src="img/back.png" alt="back"></a></div>
              <img id="logo" src="img/nhl.png" alt="nhl">
              <input type="text" name="firstname" placeholder="First Name">
              <input type="text" name="lastname" placeholder="Last Name">
              <input class="mail" type="email" name="email" placeholder="Email">
              <input type="password" name="pw" placeholder="Password">
              <input type="password" name="pwr" placeholder="Repeat Password">
              <div id="errorDiv">
              <?php
                include("lib.php");
                if(isset($_POST['register'])){
                  if(!empty($_POST['email']) && !empty($_POST['pw']) && !empty($_POST['pwr']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
                  registerUser($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['pw'],$_POST['pwr']);
                  }else{
                    echo "<p>Please fill in your details!</p>";
                  }
                }
               ?>
              </div>
              <div class="regdiv">
                <input class="inputbtn" type="submit" name="register" value="Register">
              </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
