<?php
$title ='Index'; 
require_once 'includes/header.php';
require_once 'db/conn.php';
$results = $crud->getSpecialties();
?>


<h1 class="text-center">Registraion for IT Conference</h1>

<form enctype="multipart/form-data" method="post" action="success.php">
    <div class="mb-3">
      <label for="firstname" class="form-label">First Name</label>
      <input required type="text" class="form-control" id="firstname" name="firstname" >
      
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Last Name</label>
      <input required type="text" class="form-control" id="lastname" name="lastname" >
    
    </div>
    <div class="mb-3">
      <label for="dob" class="form-label">Date of birth</label>
      <input required type="text" class="form-control" id="dob" name="dob" >
      
    </div>
    <div class="mb-3">
      <label for="specialty_id" class="form-label">specialty</label>
      <select class="form-select" id="specialty_id" name="specialty_id" aria-label="Default select example">
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
          <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']; ?></option>
        <?php }?>

      </select>
      
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Contact Number</label>
      <input required type="Text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
      <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>
    <div class=" mb-3 ">
            <input type="file" accept="image/*" class="form-control custom-file-input" id="avatar" name="avatar" >
            <label class="custom-file-label" for="avatar"></label>
            <small id="avatar" class="form-text text-danger">File Upload is Optional</small>

        </div>
    <div class="d-grid gap-2">
      <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
      </div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>






<?php require_once 'includes/footer.php';?>

