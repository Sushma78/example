<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");


$account = new Account($con);

if (isset($_POST["submitButton"])) {
    $username = FromSanitizer::sanitizeFormUsername($_POST["username"]);
    $password = FromSanitizer::sanitizeFormPassword($_POST["password"]);

    $success = $account->login($username, $password);

    if ($success) {
        //Store Session
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>

<head>
    <title>Welcome To This Page</title>
    <link rel="stylesheet" type="text/css" href="assest/style/style.css" />
</head>

<body>
    <div class="singInContainer">
        <div class="column">


            <div class="header">
                <img src="assest/images/logo.png" alt="Logo" />
                <h3>Sign In</h3>
                <span>To Continue To This Site.</span>


            </div>

            <form method="POST">

                <?php echo $account->getError(Constants::$loginFailed); ?>
                <input type="text" name="username" placeholder="User Name" required>


                <input type="password" name="password" placeholder="Password" required>


                <input type="submit" name="submitButton" value="SUBMIT">

            </form>

            <a href="register.php" class="signInMessage">Need An Account? Sign Up Here!</a>

        </div>
    </div>
</body>

</html>