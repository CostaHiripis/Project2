<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/loginstyle.css">
  </head>
  <body>
    <?php
    class User
    {
      public $email;
      public $pw;

      function __construct($email,$pw){
        $this->email = $email;
        $this->pw = password_hash($pw, PASSWORD_DEFAULT);
      }
      function get_email() {
        return $this->email;
      }
      function get_pw() {
        return $this->pw;
      }
    }
    ?>
    <div class="outer">
      <div class="middle">
        <div class="inner">
          <form action="#" method="post">
              <img src="img/NHL_Stenden.png" alt="nhl">
              <input type="email" name="email" placeholder="Email">
              <input type="password" name="pw" placeholder="Password">
              <div>
              <?php
                $existingUsers = file("users.csv");
                //register button code
                if(isset($_POST['register'])){
                  if(!empty($_POST['email']) && !empty($_POST['pw']));
                    foreach ($existingUsers as $email) { //checks if the user is already registered
                      $email = explode(",",$email);
                      if($email[0] == $_POST['email']){
                        echo "<p>Email already registered!</p>";
                        break;
                      }else{
                        $user = new User($_POST['email'],$_POST['pw']);
                        $userData = fopen("users.csv","a");
                        $temp = array($user->get_email(),$user->get_pw());
                        fputcsv($userData, $temp);
                        fclose($userData);
                      }
                    }
                  }
                if(isset($_POST['login'])){
                  if(!empty($_POST['email']) && !empty($_POST['pw'])){
                    foreach ($existingUsers as $test) {
                      $test = explode(",",$test);
                      if($test[0] == $_POST['email'] ||
                      !(password_verify($_POST['pw'], $test[1]))){
                        echo "REDIRECT TO MAIN";
                      }
                      else{
                        echo "<p>Invalid password or email!</p>";
                      }
                    }
                  }
                }
               ?>
              </div>
              <input class="inputbtn" type="submit" name="register" value="Register">
              <input class="inputbtn" type="submit" name="login" value="Login">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
