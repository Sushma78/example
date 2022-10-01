<?php

class User
{
    private $con, $sqlData;

    public function __construct($con, $username)
    {
        $this->con = $con;

        $query = $this->con->prepare("SELECT * FROM user WHERE username=:un");
        $query->bindParam(":un", $username);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }
    public function getFirstName()
    {
        return $this->sqlData["firstName"];
    }
    public function getLastName()
    {
        return $this->sqlData["firstName"];
    }
    public function getEmail()
    {
        return $this->sqlData["email"];
    }
}
