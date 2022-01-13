<?php
//(mail,username,passHash,userFirstName,userLastName,creationDate,removeDate,lastSignIn,active) 
    require_once('connecta_db.php');

    function verificaUsuari($nom,$pass)
    {
        $usuario = NULL;
        $db = GetDb();
        try{
            $sql = 'SELECT username, userFirstName, userLastName, mail ,passHash FROM users';
            $usuaris = $db->query($sql);
            if($usuaris){
                foreach ($usuaris as $fila) {
                    if((($nom==$fila['mail']) || ($nom==$fila['username'])) && password_verify($pass,$fila['passHash'])){
                        $usuario['name'] = $fila['username'];
                        break;
                    }
                }
            }
        }catch(PDOException $e){
            echo 'Error amb la BDs: ' . $e->getMessage();
        }
        return $usuario;
    }
