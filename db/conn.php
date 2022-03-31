<?php
//we want to write a connection string

            //Development Connection
            $host = 'sql11.freesqldatabase.com';
            $db = 'sql11482734';
            $user = 'sql11482734';
            $pass = 'pcf2rCQmSf';
            $charset = 'utf8mb4';






        /*$host='127.0.0.1'; //or  $host = 'localhost';
        $db='attendance_db';
        $user='root';
        $pass='';
        $charset ='utf8mb4';*/

        $dsn ="mysql:host=$host;dbname=$db;charset=$charset";
       
        try{
            $pdo = new PDO($dsn , $user ,$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//we are asking the code to show us if there is any error 

        }catch(PDOException $e){
            throw new PDOException($e->getMessage());

        }
        
        //include the crud file here after connecting to the databse

        require_once 'crud.php';
        require_once 'user.php';

        $crud = new crud($pdo);
        $user = new user($pdo);
        $user->insertuser("admin","password");




?>