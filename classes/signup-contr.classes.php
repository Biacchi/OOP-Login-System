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

    // Signing up the user if there are no errors
    private function signupUser() {
        if ($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            // echo "Invalid username!";
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            // echo "Invalid email!";
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            // echo "Passwords don't match!";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            // echo "Username or email taken!";
            header("location: ../index.php?error=usernameoremailtaken");
            exit();
        }
        // If we don't catchg any of these errors, we'll sign in the user
        $this->setUser();
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

    // Checking to see if there are any other users with the same name or email - 38 minutes (ish)
    private function uidTakenCheck() {
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