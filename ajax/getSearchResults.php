<?php

require_once("../includes/config.php");
require_once("../includes/classes/SearchResultProvider.php");
require_once("../includes/classes/EntityProvider.php");
require_once("../includes/classes/Entity.php");
require_once("../includes/classes/PreviewProvider.php");

if (isset($_POST["term"]) && isset($_POST["username"])) {
    $srp = new SearchResultProvider($con, $_POST["username"]);
    echo $srp->getResults($_POST["term"]);
} else {
    echo "No term or username passed into file";
}
