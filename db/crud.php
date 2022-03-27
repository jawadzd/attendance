<?php

    class crud {
        //private database object 
        private $db;
        //constructor to initialize private variable to the database connectionn
        function __construct($conn)
        {
            $this->db = $conn;
            
        }
        public function insertAttendees($fname, $lname, $dob, $email,$contact,$specialty_id)
        {
            try {
                $sql="INSERT INTO attende (firstname, lastname, dateofbirth, emailadress, contactnumber, specialty_id) 
                VALUES(:fname,:lname,:dob,:email,:contact,:specialty_id)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty_id',$specialty_id);

                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getAttendees(){
            try{
            $sql = "SELECT * FROM `attende` a inner join specialties s on a.specialty_id =s.specialty_id";
            $result = $this ->db->query($sql);
            return $result;
        } 
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;


        }}

        public function getSpecialties(){
            try{
            $sql = "SELECT * FROM `specialties`;";
            $result = $this ->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;}}

        public function getAttendeeDetails($id){
            try{
            $sql ="select * from attende a inner join specialties s on a.specialty_id =s.specialty_id where attende_id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
        
            return $result;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;}}
        public function editAttendee($id,$fname, $lname, $dob, $email,$contact,$specialty_id){
           try{
           $sql="UPDATE `attende` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,
            `emailadress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty_id WHERE `attende_id` = :id";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id',$id);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':specialty_id',$specialty_id);

            $stmt->execute();
            return true;

        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }}

        public function deletAttendee($id){
            try{

            
            $sql="delete from attende where attende_id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        }
    }

?>