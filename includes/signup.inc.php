<?php 

if (isset($_POST['submit'])) {
    // Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    // Instantiate Signup controller class
    // The order of the includes matter, because the signup needs functions from the dbh file, the signup-contr needs functions from the signup.classes file and so on
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);


    // Running error handlers and user signup
    $signup->signupUser();

    // Going back to front page
    header("location: ../index.php?error=none");

}