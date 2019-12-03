<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css">
  </head>
  <body>
    <div class="outer">
      <div class="middle">
        <div class="inner">
          <form action="#" method="post">
              <img id="loginnhl" src="../img/nhl.png" alt="nhl">
              <input type="email" name="email" placeholder="Email">
              <input type="password" name="pw" placeholder="Password">
              <div id="errorDiv">
              <?php
                $existingUsers = file("users.csv");
                if(isset($_POST['login'])){
                  if(!empty($_POST['email']) && !empty($_POST['pw'])){
                    foreach ($existingUsers as $test) {
                      $test = explode(",",$test);
                      if($test[0] == $_POST['email'] &&
                      !(password_verify($_POST['pw'], $test[1]))){
                        echo "REDIRECT TO MAIN";
                        break;
                      }
                      else{
                        echo "<p>Invalid password or email!</p>";
                        break;
                      }
                    }
                  }else{
                    echo "<p>Please fill in your details!</p>";
                  }
                }
              ?>
              </div>
            <div class="btndiv">
              <input class="inputbtn" type="submit" name="login" value="Login">
            </div>
          </form>
          <div class="btndiv">
            <form action="register.php" method="post">
              <input class="inputbtn" type="submit" value="Register">
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
