<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stenden HelpDesk</title>
    <link rel="stylesheet" type="text/css" href="../CSS/boxstyle.css">
</head>

<body>
  <div id="fullPage">
    <div id="header">
      <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
      <div id="user">
  			<div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png' ></a></div>
  	    <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
      </div>
    </div>
    <div id="main">
      <div id="section1">
        <div class="boxNormal boxLeft">
          <a href="#">
            <div class="effect" id="effectblue">

            </div>
          </a>
        </div>
        <div class="boxNormal boxRight">
          <a href="#">
            <div class="effect" id="effectblue">

            </div>
          </a>
        </div>
      </div>
      <div id="section2">
        <div id="boxWide">
          <a href="#">
            <div class="effect" id="effectlblue">

            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
