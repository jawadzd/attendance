<?php
    $title ='Edit'; 
    require_once 'includes/header.php';
    require_once 'includes/auth.php';
    require_once 'db/conn.php';
    $results = $crud ->getSpecialties();
    

    if(!isset($_GET['id'])){
        include 'includes/errormsg.php';
        header("Location; viewrecords.php");
    }else{
        $id = $_GET['id'];
        $attendee=$crud->getAttendeeDetails($id);
    
?>


<h1 class="text-center">Edit Record</h1>

<form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attende_id']?>" />
    <div class="mb-3">
      <label for="firstname" class="form-label">First Name</label>
      <input type="text" class="form-control" value=<?php echo $attendee['firstname'] ?> id="firstname" name="firstname" >
      
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Last Name</label>
      <input type="text" class="form-control" value=<?php echo $attendee['lastname'] ?>  id="lastname" name="lastname" >
    
    </div>
    <div class="mb-3">
      <label for="dob" class="form-label">Date of birth</label>
      <input type="text" class="form-control" value=<?php echo $attendee['dateofbirth'] ?>  id="dob" name="dob" >
      
    </div>
    <div class="mb-3">
      <label for="specialty_id" class="form-label">specialty</label>
      <select class="form-select" id="specialty_id" value=<?php echo $attendee['name'] ?>  name="specialty_id" aria-label="Default select example">
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
          <option value="<?php echo $r['specialty_id']?>"<?php if($r['specialty_id']==$attendee['specialty_id']) echo "selected"?>>
             <?php echo $r['name']; ?>
        </option>
        <?php }?>

      </select>
      
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" value=<?php echo $attendee['emailadress'] ?>  id="email" name="email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Contact Number</label>
      <input type="Text" class="form-control" id="phone" value=<?php echo $attendee['contactnumber'] ?>  name="phone" aria-describedby="phoneHelp">
      <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>
    <div class="d-grid gap-2">
      <button type="submit" name="submit" class="btn btn-block btn-success">Save</button>
      <a href="viewrecords.php" class="btn btn-default ">Back</a>
      </div>
</form>
        <?php } ?>
<br>
<br>
<br>
<br>
<br>
<br>






<?php require_once 'includes/footer.php';?>

