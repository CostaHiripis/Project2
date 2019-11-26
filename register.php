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
              <input class="mail" type="email" name="email" placeholder="Email">
              <input type="password" name="pw" placeholder="Password">
              <input type="password" name="pwr" placeholder="Repeat Password">
              <div id="errorDiv">
              <?php
                $existingUsers = file("users.csv");
                  if(isset($_POST['register'])){
                    if(!empty($_POST['email']) && !empty($_POST['pw']) && !empty($_POST['pwr'])){
                      if($_POST['pw'] != $_POST['pwr']){
                        echo "<p>Passwords do not match!</p>";
                      }else{
                        $inputEmail=$_POST['email'];
                        $inputPW=password_hash($_POST['pw'], PASSWORD_DEFAULT);
                        if(sizeof($existingUsers)>0){
                        foreach ($existingUsers as $email) { //checks if the user is already registered
                          $email = explode(",",$email);
                          if($email[0] == $inputEmail){
                            echo "<p>Email already registered!</p>";
                            break;
                          }else{
                            $userData = fopen("users.csv","a");
                            $temp = array($inputEmail,$inputPW);
                            fputcsv($userData, $temp);
                            fclose($userData);
                            echo "<p class='success'>Email succesfully registered!</p>";
                            break;
                          }
                        }
                      }
                      else{
                        $userData = fopen("users.csv","a");
                        $temp = array($inputEmail,$inputPW);
                        fputcsv($userData, $temp);
                        fclose($userData);
                        echo "<p class='success'>Email succesfully registered!</p>";
                      }
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
