<?php 

class Login extends Dbh {
    // Method to save the user into the database
    protected function getUser($uid, $pwd) {
        
        $stmt  = $this->connect()->prepare('SELECT  users_pwd FROM users WHERE users_uid = ? OR users_email =?;');
        
        // Checking for execution errors
        if(!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        // Checking to see if the user exists in the database
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        // This returns an associative array
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // password_verify is a built in php function to check hashed passwords. It returns true if the passwords match and false if they don't
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        // Returning an error if the passwords don't match
        if($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

            if(!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null; 
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();

            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];

            $stmt = null;

        }

    }

}