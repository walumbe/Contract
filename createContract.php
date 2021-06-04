<?php

  // Include database file
  include 'contracts.php';

  $contractObj = new Contracts();

  // Insert Record in contract table
  if(isset($_POST['submit'])) {
    $contractObj->insertData($_POST);
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
  <form action="createContract.php" method="POST">
    <div class="form-group">
      <label for="name">Start Date:</label>
      <input type="date" class="form-control" name="start_date" placeholder="Enter start date" required="">
    </div>
    <div class="form-group">
      <label for="name">End Date:</label>
      <input type="date" class="form-control" name="end_date" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="name">Description:</label>
      <textarea rows = "4" cols = "20" class = "form-control" name= "description" placeholder= "Enter description.."></textarea>
    </div>
    <div class="form-group">
      <label for="name">Category:</label>
      <select name="category">
        <option value = "intern">Intern</option>
        <option value = "employee">Employee</option>
        <option value = "supplier">Supplier</option>
        <option value = "other">Other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="phone_number">Phone Number:</label>
      <input type="tel" class="form-control" name="name" placeholder="Enter phone number.." required="">
    </div>
    <div class="form-group">
      <label for="email_address">Email address:</label>
      <input type="email" class="form-control" name="email_address" placeholder="Enter email" required="">
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
      <input type="date" class="form-control" name="termination_date" placeholder="Enter termination date" required="">
    </div>
    <div class="form-group">
      <label for="reason_for_termination">Reason For Termination</label>
      <textarea name="reason_for_termination" class="form-control" rows = "4" cols = "50" placeholder="Enter reason for termination..." required=""></textarea>
    </div>
    <div class="form-group">
      <label for="date_created">Date Created</label>
      <input type="date" class="form-control" name="date_created" placeholder="Enter date created..." required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>