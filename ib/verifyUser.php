<?php
    require('connecta_db.php');
function verifyUserDataBase(&mail,&user,&password,&fName,&lName){

    $check_user = $db->prepare("SELECT username FROM `user` WHERE username = ':name'");
    $check_user->execute(":user"=>$username);
    if($check_user->rowCount() > 0){
        echo('User Already exists');
    } else {
        $check_mail = $db->prepare("SELECT mail FROM `user` WHERE username = ':mail'");
        $check_mail->execute(":mail"=>$mail);
        if($check_mail->rowCount() > 0){
            echo('Mail Already exists');
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                crearUser($mail, $username, $password, $fName, $lName);
                echo('Record Entered Successfully');
        }
    }
}
?>