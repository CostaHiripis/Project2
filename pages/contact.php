<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css?">
    <link rel="stylesheet" type="text/css" href="../CSS/boxstyle.css?">
    <link rel="stylesheet" type="text/css" href="../CSS/Security.css?">
    <link rel="stylesheet" type="text/css" href="../CSS/Faq.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Admin.css?">
  </head>
  <body>
    <div id="fullPage">
      <div id="header">
        <div id="header">
        <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
          <div id="admin">
              <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
              <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
          </div>
        </div>
      </div>
      <div class="contact" id="effectblue">
        <div class="c1">
          <a class="mail" href="mailto:robert.murcsek@student.nhlstenden.com?" id="effectlblue" target="_top">konstantin.boguev.boguev@student.nhlstenden.com</a>
          <a class="mail" href="mailto:robert.murcsek@student.nhlstenden.com?" id="effectlblue" target="_top">jeremi.haakmat@student.nhlstenden.com</a>
          <a class="mail" href="mailto:robert.murcsek@student.nhlstenden.com?" id="effectlblue" target="_top">costandino.hiripis@student.nhlstenden.com</a>
          <a class="mail" href="mailto:robert.murcsek@student.nhlstenden.com?" id="effectlblue" target="_top">robin.michael.visser@student.nhlstenden.com</a>
          <a class="mail" href="mailto:robert.murcsek@student.nhlstenden.com?" id="effectlblue" target="_top">danil.zhdamarov@student.nhlstenden.com</a>
          <a class="mail" href="mailto:robert.murcsek@student.nhlstenden.com?" id="effectlblue" target="_top">robert.murcsek@student.nhlstenden.com</a>
        </div>
        <div class="c2">
          <h3 id="effectlblue" class="mail">Konstantin Boguev</h3>
          <h3 id="effectlblue"class="mail">Jeremi Haakmat</h3>
          <h3 id="effectlblue"class="mail">Costandindo Hiripis</h3>
          <h3 id="effectlblue"class="mail">Robin Visser</h3>
          <h3 id="effectlblue"class="mail">Danil Zhdamarov</h3>
          <h3 id="effectlblue"class="mail">Robert Murcsek</h3>
        </div>
      </div>
    </div>
  </body>
</html>
