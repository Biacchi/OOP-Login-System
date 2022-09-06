<?php 

if (isset($_POST['submit']) {
    // Grabbing the data
    $uid = $_POST['submit'];
    $uid = $_POST['pwd'];
    $uid = $_POST['pwdrepeat'];
    $uid = $_POST['email'];

    // Instantiate Signup controller class
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new signupContr($uid, $pwd, $pwdRepeat, $email);


    // Running error hanlers and user signup

    // Going back to front page

    
})