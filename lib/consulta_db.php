<?php
//(mail,username,passHash,userFirstName,userLastName,creationDate,removeDate,lastSignIn,active) 
    require_once('connecta_db.php');
    $db = GetDb();
    try{
        //$sql = "SELECT 'username' 'userFirstName' 'userLastName' 'mail' 'passHash' FROM 'users'";
        $sql = 'SELECT username, userFirstName, userLastName, mail ,passHash FROM users';

        $usuaris = $db->query($sql);
        if($usuaris){
            echo '<p>' . $usuaris->rowCount() . '</p>';
            echo '<table>';
            foreach ($usuaris as $fila) {
                echo '<tr>';
                echo '<td>' . ' User:   ' . $fila['username'] . '</td>';
                echo '<td>' . ' FirstName:  ' . $fila['userFirstName'] . '</td>';
                echo '<td>' . ' SecondName: ' . $fila['userLastName'] . '</td>';
                echo '<td>' . ' Email:  ' . $fila['mail'] . '</td>';
                echo '<td>' . ' Hash_Password:  '. $fila['passHash'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }catch(PDOException $e){
        echo 'Error amb la BDs: ' . $e->getMessage();
    }

    /*
    $sql = 'SELECT username, userFirstName, userLastName, mail ,passHash FROM users';
    
    function verificaUsuari($nom, $clau){
        $usuari = FALSE;
        foreach ($usuaris as $fila) {
            if ((($nom==$user['mail']) || ($nom==$user['username'])) && password_verify($pass,$user['passHash'][$i]))
            {
                $usuari['nom'] = $fila['nom'];
                $usuari['pass'] = $fila['passwors'];
            }
        }
        return $usuari;
    }*/