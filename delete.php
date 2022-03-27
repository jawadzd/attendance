<?php 
    require_once 'db/conn.php';
    if(!$_GET['id']){
        echo 'error';
    }
    else{
        $id=$_GET['id'];

        $result =$crud->deletAttendee($id);
        if($result)
        {
            header("Location: viewrecords.php");
        }
        else{
            echo 'error';
        }
    }
?>