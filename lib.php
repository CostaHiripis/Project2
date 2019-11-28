<?php
function registerUser($firstName,$lastName,$inputEmail,$inputPW,$repeatPW){
$existingUsers = file("users.csv");
      if($inputPW != $repeatPW){
        echo "<p>Passwords do not match!</p>";
      }else{
        $firstName=ucfirst(strtolower($firstName));
        $lastName=ucfirst(strtolower($lastName));
        $inputPW=password_hash($_POST['pw'], PASSWORD_DEFAULT);
        if(sizeof($existingUsers)>0){
        foreach ($existingUsers as $key) { //checks if the user is already registered
          $key = explode(",",$key);
          if($key[0] == $inputEmail){
            echo "<p>Email already registered!</p>";
            break;
          }else{
            $userFile = fopen("users.csv","a");
            $userData = array($inputEmail,$inputPW,$firstName,$lastName);
            fputcsv($userFile, $userData);
            fclose($userFile);
            echo "<p class='success'>Email succesfully registered!</p>";
            break;
          }
        }
      }
      else{
        $userFile = fopen("users.csv","a");
        $userData = array($inputEmail,$inputPW,$firstName,$lastName);
        fputcsv($userFile, $userData);
        fclose($userFile);
        echo "<p class='success'>Email succesfully registered!</p>";
      }
    }
  }
/*$existingUsers = file("users.csv");
  if(isset($_POST['register'])){
    if(!empty($_POST['email']) && !empty($_POST['pw']) && !empty($_POST['pwr']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
      if($_POST['pw'] != $_POST['pwr']){
        echo "<p>Passwords do not match!</p>";
      }else{
        $firstName=ucfirst(strtolower($_POST['firstname']));
        $lastName=ucfirst(strtolower($_POST['lastname']));
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
            $temp = array($inputEmail,$inputPW,$firstName,$lastName);
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
}*/
?>
