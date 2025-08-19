<?php
include "db.php";

$full_name = $_POST['full_name'];
$email     = $_POST['email'];
$password  = password_hash($_POST['password'], PASSWORD_BCRYPT);
$mobile    = $_POST['mobile'];
$gender    = $_POST['gender'];
$dob       = $_POST['dob'];
$qualification = $_POST['qualification'];
$specialization = $_POST['specialization'];
$experience = $_POST['experience'];
$university = $_POST['university'];
$institution = $_POST['institution'];

$sql = "INSERT INTO teachers (full_name,email,password,mobile,gender,dob,qualification,specialization,experience,university,institution)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssiss", $full_name,$email,$password,$mobile,$gender,$dob,$qualification,$specialization,$experience,$university,$institution);

if($stmt->execute()){
    echo "<div class='alert alert-success'>Teacher Registered Successfully!</div>";
}else{
    echo "<div class='alert alert-danger'>Error: ".$stmt->error."</div>";
}
?>
