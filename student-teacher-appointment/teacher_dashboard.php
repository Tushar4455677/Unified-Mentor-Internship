<?php
session_start();
include 'db.php';

// Agar teacher login nahi hai to redirect karo
if (!isset($_SESSION['teacher_id'])) {
    header("Location: index.php");
    exit();
}

// Teacher ka data fetch kar lo
$teacher_id = $_SESSION['teacher_id'];

$stmt = $conn->prepare("SELECT * FROM teachers WHERE id = ?");
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();
$teacher = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f7fb;
    }
    .sidebar {
      height: 100vh;
      background: #343a40;
      color: #fff;
      padding-top: 20px;
      position: fixed;
      left: 0;
      top: 0;
      width: 250px;
      transition: all 0.3s ease;
    }
    .sidebar a {
      color: #ddd;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      transition: background 0.3s;
    }
    .sidebar a:hover {
      background: #495057;
      color: #fff;
    }
    .content {
      margin-left: 250px;
      padding: 20px;
      animation: fadeIn 0.6s ease;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
    .card {
      border-radius: 15px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <h4 class="text-center mb-4"><i class="fas fa-chalkboard-teacher"></i> Teacher</h4>
  <a href="#"><i class="fas fa-user"></i> Profile</a>
  <a href="#"><i class="fas fa-calendar-alt"></i> Appointments</a>
  <a href="#"><i class="fas fa-book"></i> Subjects</a>
  <a href="#"><i class="fas fa-cog"></i> Settings</a>
  <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<!-- Main Content -->
<div class="content">
  <h2 class="mb-4">Welcome, <?php echo htmlspecialchars($teacher['full_name']); ?> 👋</h2>

  <div class="row">
    <!-- Profile Card -->
    <div class="col-md-6 mb-4">
      <div class="card p-4">
        <h5 class="mb-3"><i class="fas fa-id-card"></i> Profile Information</h5>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($teacher['email']); ?></p>
        <p><strong>Mobile:</strong> <?php echo htmlspecialchars($teacher['mobile']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($teacher['gender']); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($teacher['dob']); ?></p>
      </div>
    </div>

    <!-- Professional Details -->
    <div class="col-md-6 mb-4">
      <div class="card p-4">
        <h5 class="mb-3"><i class="fas fa-graduation-cap"></i> Academic Details</h5>
        <p><strong>Qualification:</strong> <?php echo htmlspecialchars($teacher['qualification']); ?></p>
        <p><strong>Specialization:</strong> <?php echo htmlspecialchars($teacher['specialization']); ?></p>
        <p><strong>Experience:</strong> <?php echo htmlspecialchars($teacher['experience']); ?> years</p>
        <p><strong>University:</strong> <?php echo htmlspecialchars($teacher['university']); ?></p>
        <p><strong>Current Institution:</strong> <?php echo htmlspecialchars($teacher['institution']); ?></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
