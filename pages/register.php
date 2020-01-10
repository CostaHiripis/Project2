
    <div class="outer">
      <div class="middle">
        <div class="inner">
          <form method="post">
              <div><a href="index.php?page=login"><img id="backbtn" src="../img/back.png" alt="back"></a></div>
              <img id="logo" src="../img/nhl.png" alt="nhl">
              <input class="inp" type="text" name="firstname" placeholder="First Name" pattern="[a-zA-Z']*">
              <input class="inp" type="text" name="lastname" placeholder="Last Name" pattern="[a-zA-Z']*">
              <input class="mail inp" type="email" name="email" placeholder="Email">
              <input class="inp" type="text" name="companyname" placeholder="Company Name">
              <input class="inp" type="password" name="pw" placeholder="Password">
              <input class="inp" type="password" name="pwr" placeholder="Repeat Password">
              <div id="errorDiv">
              <?php
                if(isset($_POST['register'])){
                  include("lib.php");
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
