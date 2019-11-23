<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/loginstyle.css">
  </head>
  <body>
    <div class="outer">
      <div class="middle">
        <div class="inner">
          <form method="post">
              <img src="img/nhl.png" alt="nhl">
              <input type="email" name="email" placeholder="Email">
              <input type="password" name="pw" placeholder="Password">
              <input type="password" name="pwr" placeholder="Repeat Password">
              <div id="errorDiv">
              <?php
                $existingUsers = file("users.csv");
                //register button code
                if(isset($_POST['register'])){
                  if(!empty($_POST['email']) && !empty($_POST['pw']) && !empty($_POST['pw2'])){
                    if($_POST['pw'] == $_POST['pw2']){
                    foreach ($existingUsers as $email) { //checks if the user is already registered
                      $email = explode(",",$email);
                      if($email[0] == $_POST['email']){
                        echo "<p>Email already registered!</p>";
                        break;
                      }else{
                        $userData = fopen("users.csv","a");
                        $temp = array($_POST['email'],$_POST['pw']);
                        fputcsv($userData, $temp);
                        fclose($userData);
                        break;
                        }
                      }
                    }else{
                      echo "<p>Passwords do not match!</p>";
                    }
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
