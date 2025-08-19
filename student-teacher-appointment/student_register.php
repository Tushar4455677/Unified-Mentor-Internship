<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$pass = "";
$db = "appointment"; // Change this

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error){
    echo json_encode(['status'=>'error','message'=>'Database connection failed']);
    exit;
}

// POST variables
$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$age_class = $_POST['age_class'] ?? '';
$gender = $_POST['gender'] ?? '';
$subjects = $_POST['subjects'] ?? '';
$level_class = $_POST['level_class'] ?? '';
$mode = $_POST['mode'] ?? '';
$preferred_teacher = $_POST['preferred_teacher'] ?? '';
$date_slot = $_POST['date_slot'] ?? '';
$time_slot = $_POST['time_slot'] ?? '';
$instructions = $_POST['instructions'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Basic validation
if(empty($full_name) || empty($email) || empty($phone) || empty($age_class) || empty($subjects) || empty($level_class) || empty($mode) || empty($preferred_teacher) || empty($date_slot) || empty($time_slot) || empty($password)){
    echo json_encode(['status'=>'error','message'=>'Please fill all required fields!']);
    exit;
}

if($password !== $confirm_password){
    echo json_encode(['status'=>'error','message'=>'Passwords do not match!']);
    exit;
}

// Password hashing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into database
$stmt = $conn->prepare("INSERT INTO students (full_name,email,phone,age_class,gender,subjects,level_class,mode,preferred_teacher,date_slot,time_slot,instructions,password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssss",$full_name,$email,$phone,$age_class,$gender,$subjects,$level_class,$mode,$preferred_teacher,$date_slot,$time_slot,$instructions,$hashed_password);

if($stmt->execute()){
    echo json_encode(['status'=>'success','message'=>'Registration Successful!']);
}else{
    echo json_encode(['status'=>'error','message'=>'Something went wrong!']);
}

$stmt->close();
$conn->close();
?>
