<?php 

// Here we are going to run queries
class Signup extends dbh {
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
        return $resultcheck;
        
    }
}