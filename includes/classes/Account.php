<?php
class Account
{
    private $con;
    private $errorArray = array();
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2)
    {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateusername($un);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);

        if (empty($this->errorArray)) {
            return $this->insertUserDtails($fn, $ln, $un, $em, $pw);
        }
        return false;
    }


    public function login($un, $pw)
    {
        $pw = hash("sha512", $pw);
        $query = $this->con->prepare("SELECT * FROM user WHERE username=:un AND password=:pw");
        $query->bindParam(":un", $un);
        $query->bindParam(":pw", $pw);

        $query->execute();

        if ($query->rowCount() == 1) {
            return true;
        }
        array_push($this->errorArray, Constants::$loginFailed);
        return false;
    }

    private function insertUserDtails($fn, $ln, $un, $em, $pw)
    {
        $pw = hash("sha512", $pw);

        $query = $this->con->prepare("INSERT INTO user (firstName, lastName, username, email, password) VALUES (:fn, :ln, :un, :em, :pw)");
        $query->bindParam(":fn", $fn);
        $query->bindParam(":ln", $ln);
        $query->bindParam(":un", $un);
        $query->bindParam(":em", $em);
        $query->bindParam(":pw", $pw);

        return $query->execute();
    }



    private function validateFirstName($fn)
    {
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }


    private function validateLastName($ln)
    {
        if (strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorArray, Constants::$LastNameCharacters);
        }
    }


    private function validateUsername($un)
    {
        if (strlen($un) < 2 || strlen($un) > 25) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
        $query = $this->con->prepare("SELECT * FROM user WHERE username=:un");
        $query->bindValue(":un", $un);
        $query->execute();
        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }


    private function validateEmails($em, $em2)
    {
        if ($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }
        $query = $this->con->prepare("SELECT * FROM user WHERE email=:em");
        $query->bindValue(":em", $em);

        $query->execute();

        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }


    private function validatePasswords($pw, $pw2)
    {
        if ($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDontMatch);
            return;
        }
        if (strlen($pw) < 5 || strlen($pw) > 16) {
            array_push($this->errorArray, Constants::$passwordLength);
        }
    }
    public function getError($error)
    {
        if (in_array($error, $this->errorArray)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }
}
