<?php
    require_once('connecta_db.php');
    //require('./connecta_db.php');

    
    //$checkUser = "";
    function verifyUserDataBase($mail,$user){
    
        $db = GetDb();

        $sqlUser = 'SELECT username FROM `users` WHERE username = :user';
        $sqlMail = 'SELECT mail FROM `users` WHERE mail = :mail';
       
        $verificat=1;
        
        $checkUser = $db->prepare($sqlUser);
        $checkUser->execute(array(':user'=>$user));
        if($checkUser->rowCount() > 0) {echo('User Already exists'); $verificat=0;}

        $checkMail = $db->prepare($sqlMail);
        $checkMail->execute(array(':mail'=>$mail));
        if($checkMail->rowCount() > 0) {echo('Mail Already exists'); $verificat=0;}
    
        return $verificat; 
    } 
    
?>