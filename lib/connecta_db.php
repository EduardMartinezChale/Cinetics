<?php

    function GetDb() {
        //$cadena_connexio = 'mysql:dbname=bdcinetics;host=localhost';
        $host = 'localhost:3307';
        $database = 'bdcinetics';
        $usuari = 'root';
        $passwd = '1234';

        $connexio='mysql:dbname=bdcinetics;host=localhost:3307';
        $usu='root';
        $pass='1234';

        $db = NULL;
        try{
            //$db = new PDO('mysql:dbname=bdcinetics;host=localhost', $usuari, $passwd, array(PDO::ATTR_PERSISTENT => true));
            //$db = new PDO("mysql:host=$host;dbname=$database", $usuari, $passwd); 
            $db =new PDO($connexio,$usu,$pass);

            $db->exec("set names utf8");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $db;
            
        }catch(PDOException $e){
            echo 'Error amb la BDs: ' . $e->getMessage();
            echo '<p>NO SE HA CONNECTADO</p>';
        }
        
    }


/*

$connexio='mysql:dbname=phpmyadmin;host=localhost';
$usu='root';
$pass='1234';


$db =new PDO($connexio,$usu,$pass);
function getDB() 
{
$dbhost=DB_SERVER;
$dbuser=DB_USERNAME;
$dbpass=DB_PASSWORD;
$dbname=DB_DATABASE;
try {
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
$dbConnection->exec("set names utf8");
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}

}

//lo que hay en el powerpoint
    $cadena_connexio='mysql:dbname=pizzeria;host=localhost';
    $usuari='root';
    $passwd='1234';
    try{
        db = new PDO($cadena_connexio,$usuari,$passwd,array(PDO::ATTR_PERSISTENT=>true));
    }
    catch(PDOException $e)
    {
            echo 'Error amb la BDs: ' . $e->getMessage();
            echo '<p>NO SE HA CONNECTADO</p>';
    }
*/
?>