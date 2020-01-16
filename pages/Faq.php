<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frequently Asked Questions</title>
    <link rel="stylesheet" type="text/css" href="../CSS/Faq.css">
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
                <button class="accordion">How do I submit a ticket?</button>
                <div class="panel">
                    <p>Once you have succesfully logged in to the Stenden HelpDesk
                    you will be greeted by the main menu. Towards the top you will 
                    see a big button labeled ticket, once you click it you'll be 
                    redirected to the page where you can fill out a form and submit 
                    a ticket to our system.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Why was this system implemented?</button>
                <div class="panel">
                    <p>Stenden eHelp was looking for a more efficient way to respond 
                    to any enquiries our clients might have and in order to reduce 
                    phone call clutter we developed this system which allows users to 
                    submit a ticket and get a response in a more organized and more 
                    detailed manner..</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">How do I register my company?</button>
                <div class="panel">
                    <p>Once you access our website you will be greeted by the login 
                        screen, below it you'll be able to see a button which says 
                        "Sign Up", when clicked this button will take you to the Sign 
                        Up page where you can register.
                    </p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">What kind of tickets are there?</button>
                <div class="panel">
                    <p>You'll be able to select between a wish, a hardware related 
                        ticket and a software related ticket.
                    </p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">How long does it take for my tickets to be answered?</button>
                <div class="panel">
                    <p>We have implemented a priority system which assures that all 
                        tickets gets a response by three days following the submission.
                    </p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Is there a way for my ticket to be answered faster?</button>
                <div class="panel">
                    <p>No.</p>
                </div>

                <div class="small-spacing-faq"></div>

                <button class="accordion">Is there a way to contact Stenden eHelp?</button>
                <div class="panel">
                    <p>Yes! To contact us just click on the "Contact Us" button on the main screen.</p>
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