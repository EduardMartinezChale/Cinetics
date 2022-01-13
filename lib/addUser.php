<?php 
    require('connecta_db.php');
    
    function crearUser($mail, $username, $password, $fName, $lName) {
        $passHash = password_hash("$password", PASSWORD_DEFAULT);
        $active = 1;
        $db = GetDb();

        $sql = "INSERT INTO users  (mail,username,passHash,userFirstName,userLastName,active) 
                VALUES(:mail,:user,:pass,:fname,:lname,:active)";
                
                //VALUES ('{$mail}', '{$username}', '{$passHash}', '{$fName}', '{$lName}', '{$active}')";
        $preparada = $db->prepare($sql);
        $preparada->execute(array(":mail"=>$mail,":user"=>$username,":pass"=>$passHash,":fname"=>$fName,":lname"=>$lName,":active"=>$active));
        if ($preparada->rowCount()==1) {
            echo "New record created successfully";
        }
    }
?>
