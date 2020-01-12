<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stenden HelpDesk</title>
    <link rel="stylesheet" href="../CSS/loginstyle.css">
    <link rel="stylesheet" href="../CSS/boxstyle.css">
  </head>
  <body>
    <div id="fullPage">
      <div id="header">
        <img id="logoPic" src="../img/nhl.png" alt="nhl">
        <img id="userPic" src="../img/Jesus.jpg" alt="userPic">
      </div>
      <div id="main">
        <div class="outer">
          <div class="middle">
            <div style="height:400px" class="inner">
              <form action="#" method="post">
                  <h2 id="maintitle">Please fill out all the fields!</h2>
                  <input id="title" type="text" name="title" placeholder="Title">
                  <textarea name="description" placeholder="Description" rows="8" cols="50"></textarea>
                  <div id="errorDiv">
                  </div>
                <div class="ticketbtn">
                  <input class="inputbtn" type="submit" name="submit" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
