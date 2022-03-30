<?php

class user{ //private database object 
    private $db;
    //constructor to initialize private variable to the database connectionn
    function __construct($conn)
    {
        $this->db = $conn;
        
    }
    public function insertuser($username,$password){
        try {
            $result=$this->getuserbyusername($username);
            if($result['num'] > 0 ){
                return false;
            }else{
                $new_pass=md5($password.$username);
        $sql="INSERT INTO users (username,password) 
        VALUES(:username,:password)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindparam(':username',$username);
        $stmt->bindparam(':password',$new_pass);


        $stmt->execute();
        return true;

    } }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }

    }
    public function getuser($username,$password){
        try{
        $sql ="select * from users where username = :username AND password = :password";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':username',$username);
        $stmt->bindparam(':password',$password);
        $stmt->execute();
        $result = $stmt->fetch();
    
        return $result;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;}}


    
    public function getuserbyusername($username){
        try{
            $sql ="select count(*) as num from users where username =:username";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':username',$username);

            $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;}}
    }



?>
