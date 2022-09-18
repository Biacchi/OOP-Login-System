<?php 

// Here we are going to run queries
class Signup extends dbh {
    protected function checkUser($uid, $email) {
        // stmt stands for "statement"
        // We use the prepare method and the query with the interrogation signs to prevent us from injection attacks
        $stmt  = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        if($stmt->execute)
    }
}