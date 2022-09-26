<?php 

// Here we are going to run queries/we will interact with the database
class Signup extends Dbh {
    // Method to save the user into the database
    protected function setUser($uid, $pwd, $email) {
        
        $stmt  = $this->connect()->prepare('INSERT INTO USERS (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');
        // For security reasons, we are going to hash the password before actually putting it in the database
        // password_hash is a built in PHP method. The second argument is the type of hashing we want to use
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null; 
    }


    protected function checkUser($uid, $email) {
        // stmt stands for "statement"
        // We use the prepare method and the query with the interrogation signs to prevent us from injection attacks
        $stmt  = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        // Checking to see if the statement failed executing into the database
        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        // Checking to see if any rows were returned from the query above. We do this to see if there are users already using the email or username submited in the signup form         
        $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}