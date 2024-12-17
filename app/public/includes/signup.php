<?php
    //Grabbing the data
    if(isset($_POST["submit"]))
    {
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdrepeat = $_POST["pwdrepeat"];
        $email = $_POST["email"];
    }

    //Instanciate SignupContr class

    include "../../controllers/SignUpController.php";
    //Running error handlers and user signup

    //Going to back to front page
?>