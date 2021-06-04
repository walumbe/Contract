<?php
  
  // Include database file
  include 'contracts.php';

  $contractObj = new Contracts();

  // Edit contract record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $contract = $contractObj->displyaRecordById($editId);
  }

  // Update Record in contracts table
  if(isset($_POST['update'])) {
    $contractObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hono Contracts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Hono Contracts</h4>
</div><br> 

<div class="container">
  <form action="updateContract.php" method="POST">
    <div class="form-group">
      <label for="start_date">Start Date:</label>
      <input type="date" class="form-control" name="start_date"  required="">
    </div>
    <div class="form-group">
      <label for="end_date">End Date:</label>
      <input type="date" class="form-control" name="end_date"  required="">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" name="description" placeholder="Enter description.." required=""></textarea>
    </div>
    <div class="form-group">
      <label for="category">Category:</label>
      <select name = "category">
      <option value = "intern">Intern</option>
        <option value = "employee">Employee</option>
        <option value = "supplier">Supplier</option>
        <option value = "other">Other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="phone_number">Phone Number:</label>
      <input type="text" class="form-control" name="phone_number" placeholder="Enter phone number.." required="">
    </div>
    <div class="form-group">
      <label for="email_address">Email Address:</label>
      <input type="email" class="form-control" name="email_address" placeholder="Enter email address.." required="">
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select name ="status">
        <option value="inactive">Inactive</option>
        <option value="active">Active</option>
        <option value="terminated">Terminated</option>
      </select>
    </div>
    <div class="form-group">
      <label for="termination_date">Termination Date</label>
      <input type="date" class="form-control" name="termination_date" required="">
    </div>
    <div class="form-group">
      <label for="reason_for_termination">Reason For Termination</label>
      <textarea name="reason_for_termination" class="form-control" rows = "4" cols = "50" placeholder="Enter reason for termination..." required=""></textarea>
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $contract['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>