<?php
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/CategoryContainers.php");
require_once("includes/config.php");
require_once("includes/classes/Entity.php");
require_once("includes/classes/EntityProvider.php");
require_once("includes/classes/ErrorMessage.php");
require_once("includes/classes/SeasonProvider.php");
require_once("includes/classes/Season.php");
require_once("includes/classes/Video.php");


if (!isset($_SESSION["userLoggedIn"])) {
    header("Location: register.php");
}
$userLoggedIn = $_SESSION["userLoggedIn"];
?>

<!DOCTYPE html>

<head>
    <title>Welcome To This Page</title>
    <link rel="stylesheet" type="text/css" href="assest/style/style.css" />


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/986d4edcc7.js" crossorigin="anonymous"></script>
    <script src="assest/js/script.js"></script>
</head>

<body>
    <div class="wrapper">