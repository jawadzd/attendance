<?php
    $title ='Success'; 
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    if(isset($_POST['submit'])){
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $contact = $_POST['phone'];
        $specialty_id = $_POST['specialty_id'];


        
        //file upload
        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);}
       

       
        $isSuccess=$crud->insertAttendees($fname,$lname,$dob,$email,$contact,$specialty_id,$destination);
        if($isSuccess){
            include 'includes/successmsg.php';

        }else{
            include 'includes/errormsg.php';

        }
    }
?>


   
    
    <!-- this prints the values by using get  -->
    <!--
    <div class=" text-center card-body card">
        <div class="card-body">
            <h5 class="card-title"><?php // echo $_GET['firstname'].'   '. $_GET['lastname'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['specialty'];?></h6>
            <h7 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['phone'];?></h7>
            
            
          </div>
    </div>
   
-->
<img src="<?php echo $destination; ?>" clss="rounded-circle" style="width: 20%; height: 20%" />
<div class=" text-center card-body card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'].'   '. $_POST['lastname'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty_id'];?></h6>
            <h7 class="card-subtitle mb-2 text-muted"><?php echo $_POST['phone'];?></h7>
            
            
          </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>



<?php require_once 'includes/footer.php';?>