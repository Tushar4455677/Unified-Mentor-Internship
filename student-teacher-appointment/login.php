<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prepare statement
    $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['student_id'] = $row['id'];
            $_SESSION['student_name'] = $row['full_name'];

            echo "<div class='alert alert-success'>Login successful! Redirecting...</div>";
            echo "<script>setTimeout(function(){ window.location='student_dashboard.php'; }, 3000);</script>";
            exit();
        } else {
            echo "<div class='alert alert-danger'>Invalid email or password!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password!</div>";
    }

    $stmt->close();
}
$conn->close();
?>
