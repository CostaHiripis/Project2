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
                <button class="accordion">Help penis is hurt what do?</button>
                <div class="panel">
                    <p>Sell penis to black market and then die ok thx.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">What is this shit?</button>
                <div class="panel">
                    <p>Bruh.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Fuck you.</button>
                <div class="panel">
                    <p>No ur mom.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Help penis is hurt what do?</button>
                <div class="panel">
                    <p>Sell penis to black market and then die ok thx.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">What is this shit?</button>
                <div class="panel">
                    <p>Bruh.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Fuck you.</button>
                <div class="panel">
                    <p>No ur mom.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Help penis is hurt what do?</button>
                <div class="panel">
                    <p>Sell penis to black market and then die ok thx.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">What is this shit?</button>
                <div class="panel">
                    <p>Bruh.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Fuck you.</button>
                <div class="panel">
                    <p>No ur mom.</p>
                </div>

                <div class="small-spacing-faq"></div>
     
                <button class="accordion">Help penis is hurt what do?</button>
                <div class="panel">
                    <p>Sell penis to black market and then die ok thx.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">What is this shit?</button>
                <div class="panel">
                    <p>Bruh.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Fuck you.</button>
                <div class="panel">
                    <p>No ur mom.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Help penis is hurt what do?</button>
                <div class="panel">
                    <p>Sell penis to black market and then die ok thx.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">What is this shit?</button>
                <div class="panel">
                    <p>Bruh.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Fuck you.</button>
                <div class="panel">
                    <p>No ur mom.</p>
                </div>

                <div class="small-spacing-faq"></div>
            </div>
        </div>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        </script>
</body>

</html>