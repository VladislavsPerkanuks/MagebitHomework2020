<?php

include_once("createTable.php");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $error = errorChecker($email);
    if (!empty($error)) {
        header("Location: /index.php?error=$error");
    } elseif (checkForDuplicates($email, $mysqli)) {
        $sql     = "INSERT INTO users_email (email,date) VALUES ('$email','$date')";
        $success = $mysqli->query($sql);
        $error   = !$success ?: "Something went wrong";
        header($success ? "Location: /subscription.php"
            : "Location: /index.php?error=$error");
    } else {
        $error = "Provided email is already subscribed";
        header("Location: /index.php?error=$error");
    }
}

function checkForDuplicates($email, $mysqli)
{
    $result
        = $mysqli->query("SELECT id FROM users_email WHERE email  = '$email' ");
    if ($result->num_rows == 0) {
        return true;
    }

    return false;
}

function errorChecker($email)
{
    $errorEmpty       = notEmpty($email);
    $errorNotEmail    = isEmail($email);
    $errorWrongDomain = checkDomain($email);
    $errorUnchecked   = checkboxCheck();

    $errors = $errorEmpty.$errorNotEmail.$errorWrongDomain.$errorUnchecked;
    $error  = explode("  ", $errors);

    return ($error[0]);
}

function notEmpty($email)
{
    return !$email ? "Email address is required  " : "";
}

function isEmail($email)
{
    return !filter_var($email, FILTER_VALIDATE_EMAIL)
        ? "Please provide a valid e-mail address  " : "";
}

function checkDomain($email)
{
    $pos    = strrpos($email, '.', -1);
    $domain = substr($email, $pos);

    return $domain == ".co"
        ? "We are not accepting subscriptions from Colombia emails  " : "";
}

function checkboxCheck()
{
    return !(isset($_POST['checkbox']))
        ? "You must accept the terms and conditions  " : "";
}
