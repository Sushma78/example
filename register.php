<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");


$account = new Account($con);

if (isset($_POST["submitButton"])) {
    $fristName = FromSanitizer::sanitizeFormString($_POST["fristName"]);
    $lastName = FromSanitizer::sanitizeFormString($_POST["lastName"]);
    $username = FromSanitizer::sanitizeFormUsername($_POST["username"]);
    $email = FromSanitizer::sanitizeFormEmail($_POST["email"]);
    $email2 = FromSanitizer::sanitizeFormEmail($_POST["email2"]);
    $password = FromSanitizer::sanitizeFormPassword($_POST["password"]);
    $password2 = FromSanitizer::sanitizeFormPassword($_POST["password2"]);


    $success = $account->register($fristName, $lastName, $username, $email, $email2, $password, $password2);

    if ($success) {
        $_SESSION["userLoggedIn"] = $username;
        header("Location: index.php");
    }
}
function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
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
                <h3>Sign Up</h3>
                <span>To Continue To This Site.</span>


            </div>

            <form method="POST">

                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <input type="text" name="fristName" placeholder="Frist Name" value="<?php getInputValue("fristName"); ?>" required>


                <?php echo $account->getError(Constants::$LastNameCharacters); ?>
                <input type="text" name="lastName" placeholder="Last Name" value="<?php getInputValue("lastName"); ?>" required>


                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <input type="text" name="username" placeholder="User Name" value="<?php getInputValue("username"); ?>" required>


                <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email"); ?>" required>
                <input type="email" name="email2" placeholder="Confirm Email" value="<?php getInputValue("email2"); ?>" required>

                <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
                <?php echo $account->getError(Constants::$passwordLength); ?>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password2" placeholder="Confirm Password" required>

                <input type="submit" name="submitButton" value="SUBMIT">

            </form>

            <a href="login.php" class="signInMessage">Already Have An Account? Sign In Here!</a>

        </div>
    </div>
</body>

</html>