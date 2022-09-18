<?php 

class SignupContr {

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->$uid = $uid; 
        $this->$pwd = $pwd;   
        $this->$pwdRepeat = $pwdRepeat;   
        $this->$email = $email;   
    }

    // Here are the error handlers for the sign up form

    // Checking if it is an empty string
    private function emptyInput() {
        $result;
        if (empty($this->$uid) || empty($this->$pwd) || empty($this->$pwdRepeat) || empty($this->$emai)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    // Checking for invalid characters
    private function invalidUid() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$", $this->$uid)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return result; 
    }

    // Email validation
    private function invalidEmail() {
        $result;
        if (!filter_var($this->$email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // Check if the passwords match
    private function pwdMatch() {
        $result;
        if ($this->$pwd !== $this->$pwdRepeat) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // Checking to see if there are any other users with the same name or email
    private function checkingForClones() {
        $result;
        if ($this->checkUser($this->$uid, $this->$email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // We  will create one more validation to make sure there isnt another user with the same username when we sign up
    // but we can't do that yet

}