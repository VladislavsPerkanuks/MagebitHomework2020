<?php

session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/style.css">
    <title>Vladislavs Perkanuks</title>
</head>

<header class="header">
    <div class="container">
        <div class="header__inner">
            <img class="logo" src="img/Union.png" alt="pineapple"/>
            <p class="pineapple">pineapple.</p>
            <nav class="nav">
                <a class="nav__link" href="#">About</a>
                <a class="nav__link" href="#">How it works</a>
                <a class="nav__link" href="#">Contact</a>
            </nav>
        </div>
    </div>
</header>

<body>
<section class="section">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Subscribe to newsletter </h2>
            <div class="section__text">
                <p>
                    Subscribe to our newsletter and get 10% discount on
                    pineapple glasses.
                </p>
            </div>
        </div>

        <div class="email-container">
            <form name="myform" class="form" id="myform" action="insert.php"
                  method="POST">
                <input type="text" id="email" name="email"
                       placeholder="Type your email address here…" class="email"
                       oninput="isValid(document.getElementById('email').value)"
                       ;/>

                <input class="arrow" type="submit" id="submit" value="submit"
                       name="submit"/>

                <input type="checkbox" id="terms" class="CheckBox"
                       name="checkbox"
                       onclick="isValid(document.getElementById('email').value)"
                       ;/>
                <label for="terms">
                        <span class="agree">
                            I agree to <a class="ToS"
                                          href="#">terms of service </a></span>
                </label>

            </form>
            <div id="error-block">
                <span class="error hidden"> Please provide a valid e-mail address</span>
                <span class="error hidden"> Email address is required</span>
                <span class="error hidden"> We are not accepting subscriptions from Colombia emails</span>
                <span class="error hidden"> You must accept the terms and conditions</span>
                <span class="error"> <?php echo $_GET['error']; ?> </span>
            </div>
        </div>

        <div class="ToS__container">
            <div class="social__container">
                <ul class="social__icons">
                    <li><a class="social__icon-facebook" href="#"></a></li>
                    <li><a class="social__icon-instagram" href="#"></a></li>
                    <li><a class="social__icon-twitter" href="#"></a></li>
                    <li><a class="social__icon-youtube" href="#"></a></li>
                </ul>
            </div>
        </div>
    </div>

</section>
<div class="background"></div>
<script src="js/script.js"></script>
</body>

</html>