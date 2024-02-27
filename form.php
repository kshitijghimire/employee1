<?php
include("connection.php");
error_reporting(0);
// mysqli_connect_error();
?>
<?php
if(isset($_POST['searchdata']))
{
$search=$_POST['search'];


$query ="SELECT * FROM form WHERE ID='$search'";
$data =mysqli_query($conn,$query);

$result =mysqli_fetch_assoc($data);

// $name =$result['emp_name'];
// echo $name;

 } 
 ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="center">
        <form action="#" method="POST">
        <h1>Employee Data Entry Automation Software</h1>
        <div class="form">

<input type="text" name="search"  class="textfield" placeholder="Search ID" 
value="<?php if(isset($_POST['searchdate'])){ echo $result['ID']; } ?>"
>


<input type="text" name="name" class="textfield" placeholder="Student Name" 
value="<?php 
if(isset($_POST['searchdate']))
{ 
    echo $result['emp_name']; 
} 
?>
">



<select class="textfield" name="gender">
    <option value="Not Select">Select Gender</option>

    <option value="Male" <?php if($result['emp_gender'] =='Male') {echo "selected";} ?> >Male</option>

    <option value="Female" <?php if($result['emp_gender'] =='Female') { echo "selected";} ?> >Female</option>

    <option value="Other" <?php if($result['emp_gender'] =='Other') {echo "selected";} ?> >Other</option>

</select>


<input type="text" name="email" class="textfield" placeholder="Email Address"
value="<?php if(isset($_POST['searchdate'])){ echo $result['emp_email']; } ?>" >


<select class="textfield" name="department">
    <option value="Not Select">Select Department</option>

    <option value="IT" <?php if($result['emp_department'] =='IT') {echo "selected";} ?> >IT</option>

    <option value="HR" <?php if($result['emp_department'] =='HR') {echo "selected";} ?> >HR</option>

    <option value="Accounts" <?php if($result['emp_department'] =='Accounts') {echo "selected";} ?> >Accounts</option>

    <option value="Sales" <?php if($result['emp_department'] =='Sales') {echo "selected";} ?> >Sales</option>

    <option value="Marketing" <?php if($result['emp_department'] =='Marketing') {echo "selected";} ?> >Marketing</option>

    <option value="Business Development" <?php if($result['emp_department'] =='Business Development') {echo "selected";} ?> >Business Development</option>

</select>
<textarea  name="address" placeholder="Address"><?php if(isset($_POST['searchdate'])){ echo $result['emp_address']; } ?>
</textarea>

<input type="submit" value="Search" name="searchdata" class="btn" >

<input type="submit"  name="save"   value="Save" class="btn" style="background-color:green;" >

<input type="submit" value="Modify" name=""   class="btn" style="background-color:orange;">

<input type="submit" value="Delete" name=""  class="btn" style="background-color:red;">

<input type="submit" value="Clear"  name=""  class="btn" style="background-color:blue;">



        </div>
        </form>
    </div>
    
</body>
</html>
<?php
if(isset($_POST['save']))
{
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $address=$_POST['address'];

    $query="INSERT INTO form(emp_name,emp_gender,emp_email,emp_department,emp_address) 
    VALUES('$name','$gender','$email','$department','$address')";
$data=mysqli_query($conn,$query);

if($data)
{
    echo "Data saved into Database";
}
else
{
    echo "Failed to save data";
}

}
?>
