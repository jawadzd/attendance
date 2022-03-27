<?php
    require_once 'db/conn.php';

if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $contact = $_POST['phone'];
    $specialty_id = $_POST['specialty_id'];

    $result =$crud-> editAttendee($id,$fname, $lname, $dob, $email,$contact,$specialty_id);
    if($result){
        header("Location: viewrecords.php");
    }else{
        include 'includes/errormsg.php';
    }
}
else{
    echo 'error';
}
?>


