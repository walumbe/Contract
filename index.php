<?php
  
  // Include database file
  include 'contracts.php';

  $contractObj = new Contracts();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $contractObj->deleteRecord($deleteId);
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
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>
  <h2>View Records
    <a href="createContract.php" class="btn btn-primary" style="float:right;">Add New Record</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Description</th>
        <th>Category</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Status</th>
        <th>Termination Date</th>
        <th>Reason For Termination</th>
        <th>Date Created</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $contracts = $contractObj->displayData(); 
          if(is_array($contracts) || is_object($contracts))
          {
            foreach ($contracts as $contract) {
        ?>
        <tr>
          <td><?php echo $contract['id'] ?></td>
          <td><?php echo $contract['start_date'] ?></td>
          <td><?php echo $contract['end_date'] ?></td>
          <td><?php echo $contract['description'] ?></td>
          <td><?php echo $contract['category'] ?></td>
          <td><?php echo $contract['phone_number'] ?></td>
          <td><?php echo $contract['email_address'] ?></td>
          <td><?php echo $contract['status'] ?></td>
          <td><?php echo $contract['termination_date'] ?></td>
          <td><?php echo $contract['reason_for_termination'] ?></td>
          <td><?php echo $contract['date_created'] ?></td>
          <td>
            <a href="updateContract.php?editId=<?php echo $contract['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="index.php?deleteId=<?php echo $contract['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php }} ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>