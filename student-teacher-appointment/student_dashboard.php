<?php
session_start();
include "db.php";

// Agar student login nahi hai toh redirect
if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Student details fetch karna
$sql = "SELECT name, email FROM students WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

// Teacher list fetch karna
$teachers = $conn->query("SELECT id, name, subject FROM teachers");

// Student ke appointments fetch karna
$app_sql = "SELECT a.id, t.name AS teacher_name, t.subject, a.appointment_date 
            FROM appointments a 
            JOIN teachers t ON a.teacher_id = t.id 
            WHERE a.student_id = ? ORDER BY a.appointment_date DESC";
$app_stmt = $conn->prepare($app_sql);
$app_stmt->bind_param("i", $student_id);
$app_stmt->execute();
$appointments = $app_stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body { background: #f4f6f9; }
    .sidebar { width: 250px; height: 100vh; position: fixed; background: #343a40; color: white; }
    .sidebar h2 { padding: 20px; font-size: 20px; }
    .sidebar a { display: block; padding: 15px 20px; color: white; text-decoration: none; }
    .sidebar a:hover { background: #495057; }
    .content { margin-left: 260px; padding: 20px; }
    .card { border-radius: 12px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <h2>📘 Student Panel</h2>
  <a href="#">Dashboard</a>
  <a href="#">Book Appointment</a>
  <a href="#">My Appointments</a>
  <a href="logout.php">Logout</a>
</div>

<!-- Main Content -->
<div class="content">
  <h3>Welcome, <?php echo $student['name']; ?> 👋</h3>
  <p>Email: <?php echo $student['email']; ?></p>

  <!-- Teacher List -->
  <div class="card mt-4 p-3">
    <h5>Available Teachers</h5>
    <table class="table table-striped">
      <thead><tr><th>Name</th><th>Subject</th><th>Action</th></tr></thead>
      <tbody>
        <?php while($t = $teachers->fetch_assoc()): ?>
          <tr>
            <td><?php echo $t['name']; ?></td>
            <td><?php echo $t['subject']; ?></td>
            <td>
              <form method="post" action="book_appointment.php">
                <input type="hidden" name="teacher_id" value="<?php echo $t['id']; ?>">
                <input type="date" name="appointment_date" required>
                <button type="submit" class="btn btn-sm btn-primary">Book</button>
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- My Appointments -->
  <div class="card mt-4 p-3">
    <h5>My Appointments</h5>
    <table class="table table-bordered">
      <thead><tr><th>Teacher</th><th>Subject</th><th>Date</th></tr></thead>
      <tbody>
        <?php while($a = $appointments->fetch_assoc()): ?>
          <tr>
            <td><?php echo $a['teacher_name']; ?></td>
            <td><?php echo $a['subject']; ?></td>
            <td><?php echo $a['appointment_date']; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
