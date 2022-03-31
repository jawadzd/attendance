<?php
    $title ='View'; 
    require_once 'includes/header.php';
    require_once 'includes/auth.php';
    require_once 'db/conn.php';
    //get attendee by id 
    if(!isset($_GET['id'])){
        include 'includes/errormsg.php';
       

    }else{
        $id=$_GET['id'];
        $result =$crud->getAttendeeDetails($id);
        
    
?>




<div class=" text-center card-body card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['firstname'].'   '. $result['lastname'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name'];?></h6>
            <br>
            <h7 class="card-subtitle mb-2 text-muted"><?php echo $result['contactnumber'];?></h7>
            <br>
            <h7 class="card-subtitle mb-2 text-muted"><?php echo $result['emailadress'];?></h7>
            <br>
            <h7 class="card-subtitle mb-2 text-muted"><?php echo $result['dateofbirth'];?></h7>
            <br>
            
            
          </div>
    </div>
    <br>

        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $result['attende_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete')" href="delete.php?id=<?php echo $result['attende_id'] ?>" class="btn btn-danger">Delete</a>


<?php } ?>

<br>
<br>
<br>
<br>
<br>
<br>






<?php require_once 'includes/footer.php';?>
