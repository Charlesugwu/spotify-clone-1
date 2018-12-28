<?php

class Account
{
    private $con;
    private $errorArray;

    public function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
    }
    public function login($un, $pw) {
        $pw = md5($pw);
        $loginQuery = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$un' AND password = '$pw'");

        if(mysqli_num_rows($loginQuery) == 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    public function register($run, $rfn, $rln, $rem, $remc, $rpw, $rpwc)
    {
        $this->validateRegisterUserName($run);
        $this->validateRegisterFirstName($rfn);
        $this->validateRegisterLastName($rln);
        $this->validateRegisterEmails($rem, $remc);
        $this->validateRegisterPasswords($rpw, $rpwc);

        if(empty($this->errorArray == true)){
          // insert into database
          return $this->insertUserDetails($run, $rfn, $rln, $rem, $rpw);
        } else {
            return false;
          }
        }
    
    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($run, $rfn, $rln, $rem, $rpw) {
        $encryptedPw = md5($rpw);
        $profilePic = "/assets/images/profile-pics/secondliferedhead.jpg";
        $date = date("Y-m-d");

        $result = mysqli_query($this->con, "INSERT INTO users VALUES(' ', '$run', '$rfn', '$rln', '$rem', '$encryptedPw', '$date', '$profilePic')");
        return $result;
    }
    private function validateRegisterUserName($run)
    {
        if (strlen($run) < 5 || strlen($run) > 25 ) {
            array_push($this->errorArray, Constants::$unLength);
            return;
        }
        // TODO: check if username exists
        $checkUserNameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username = '$run'");
        if(mysqli_num_rows($checkUserNameQuery) != 0) {
            array_push($this->errorArray, Constants::$userNameTaken);
            return;
        }
    }

    private function validateRegisterFirstName($rfn)
    {
        if (strlen($rfn) < 2 || strlen($rfn) > 25) {
            array_push($this->errorArray, Constants::$fnLength);
            return;
        }
    }

    private function validateRegisterLastName($rln)
    {
        if (strlen($rln) < 2 || strlen($rln) > 25) {
            array_push($this->errorArray, Constants::$lnLength);
            return;
        }
    }

    private function validateRegisterEmails($rem, $remc)
    {
        if ($rem != $remc) {
            array_push($this->errorArray, Constants::$emsDoNotMatch);
            return;
        }
        if (!filter_var($rem, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emInvalid);
            return;
        }

        // TODO: check to see that username hasn't been used
        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email = '$rem'");
        if (mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emTaken);
            return;
        }
    }

    private function validateRegisterPasswords($rpw, $rpwc)
    {
        if ($rpw != $rpwc) {
            array_push($this->errorArray, Constants::$pwsDoNotMatch);
            return;
        }
        if (preg_match('/[^A-Za-z0-9]/', $rpw)) {
            array_push($this->errorArray, Constants::$pwAlphaNumeric);
            return;
        }
        if (strlen($rpw) < 5 || strlen($rpw) > 30) {
            array_push($this->errorArray, Constants::$pwLength);
            return;
        }
    }
}

?>