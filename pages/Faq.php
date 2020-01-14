<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frequently Asked Questions</title>
    <link rel="stylesheet" type="text/css" href="../CSS/mainmenu.css">
</head>

<body>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>

    <div id="fullPage">
        <div id="header">
            <a href='index.php'><img id="logoPic" src="../img/nhl.png" alt="nhl"></a>
            <!-- <div id="user">
                <div id='userNameLogOut'><a href="index.php?page=logout"><img src='../img/logout2.png'></a></div>
                <h1 id='userName'><?php echo $_SESSION['name']; ?></h1>
            </div> -->
        </div>

        <div id="body-space">
            <div id="faq-header">
                <h1 id="faq-letters">Frequently Asked Questions</h1>
            </div>

            <div id="question-section">
                <button class="collapsible">Open Collapsible</button>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
</body>

</html>