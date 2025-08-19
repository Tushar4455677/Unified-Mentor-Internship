<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Teacher Booking Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    /* Navbar Styles */
    .navbar {
      background-color: #ffffff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      padding: 0.7rem 0;
    }

    .navbar-brand {
      font-size: 1.4rem;
      font-weight: bold;
      color: #007bff !important;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar-brand i {
      color: #007bff;
      font-size: 1.5rem;
    }

    .nav-link {
      font-weight: 500;
      color: #333 !important;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .nav-link:hover {
      color: #007bff !important;
      transform: translateY(-2px);
    }

    .btn-login {
      border: 1px solid #007bff;
      color: #007bff;
      background: transparent;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background-color: #007bff;
      color: #fff;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(to right, #e9f2ff, #ffffff);
      padding: 100px 0;
    }

    .hero h1 {
      font-size: 2.8rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.1rem;
      color: #555;
    }

    .hero img {
      max-width: 100%;
      border-radius: 10px;
    }

    /* How It Works */
    .how-it-works img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 15px;
    }

    /* Testimonials */
    .testimonial {
      background: #f8f9fa;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      text-align: center;
    }

    .testimonial p {
      font-style: italic;
      color: #555;
    }

    .testimonial h6 {
      margin-top: 15px;
      font-weight: bold;
    }

    .how-it-works img {
      width: 140px;
      height: 140px;
      object-fit: cover;
      margin-bottom: 15px;
      border-radius: 50%;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* Testimonial images */
    .testimonial img {
      width: 140px;
      height: 140px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 15px;
      border: 3px solid #007bff;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-calendar-check"></i> Book Your Appointment
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto me-3">
          <li class="nav-item"><a class="nav-link" href="#" style="margin-right: 30px;"><i class="fas fa-star"></i>
              Features</a></li>
          <li class="nav-item"><a class="nav-link" href="#" style="margin-right: 30px;"><i class="fas fa-tags"></i>
              Pricing</a></li>
          <li class="nav-item"><a class="nav-link" href="#" style="margin-right: 30px;"><i class="fas fa-plug"></i>
              Integrations</a></li>
          <li class="nav-item"><a class="nav-link" href="#" style="margin-right: 30px;"><i class="fas fa-headset"></i>
              Support</a></li>
        </ul>
        <div class="d-flex">
          <a href="#" class="btn btn-login me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
    <i class="fas fa-sign-in-alt"></i> Login
</a>

          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentRegisterModal">
            <i class="fas fa-user-plus"></i> Get Started
          </a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Small Teacher Navbar -->
<nav class="navbar navbar-light bg-light border-top py-1" style="margin-top:76px;">
  <div class="container d-flex justify-content-end">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teacherLoginModal">
  Teacher Login
</button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teacherModal" style="margin-left:30px;">
  Register as Teacher
</button>
  </div>
</nav>
<div class="modal fade" id="teacherModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Teacher Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="msg"></div>
        <form id="teacherForm">
          <!-- Basic Info -->
          <div class="row">
            <div class="col-md-6 mb-2">
              <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="col-md-6 mb-2">
              <input type="email" name="email" class="form-control" placeholder="Email ID" required>
            </div>
            <div class="col-md-6 mb-2">
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required>
            </div>
            <div class="col-md-6 mb-2">
              <select name="gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="col-md-6 mb-2">
              <input type="date" name="dob" class="form-control" required>
            </div>
          </div>
          
          <!-- Professional Info -->
          <div class="row">
            <div class="col-md-6 mb-2">
              <input type="text" name="qualification" class="form-control" placeholder="Qualification" required>
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" name="specialization" class="form-control" placeholder="Specialization" required>
            </div>
            <div class="col-md-6 mb-2">
              <input type="number" name="experience" class="form-control" placeholder="Experience (Years)" required>
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" name="university" class="form-control" placeholder="University Name" required>
            </div>
            <div class="col-md-12 mb-2">
              <input type="text" name="institution" class="form-control" placeholder="Current Institution/Organization">
            </div>
          </div>

          <button type="submit" class="btn btn-success mt-2">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Teacher Login Modal -->
<div class="modal fade" id="teacherLoginModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Teacher Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="loginMsg"></div>
        <form id="teacherLoginForm" action="teacher_login.php">
          <div class="mb-3">
            <label>Email ID</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="msg"></div>
        <form id="loginForm" action="login.php">
          <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>


  <!-- Student Register Modal -->
  
  <div class="modal fade" id="studentRegisterModal" tabindex="-1" aria-labelledby="studentRegisterLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="studentRegisterLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="message"></div>
        <form id="studentForm">
          <div class="row mb-2">
            <div class="col-md-6">
              <label>Full Name</label>
              <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-md-6">
              <label>Phone Number</label>
              <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Age / Class / Grade</label>
              <input type="text" name="age_class" class="form-control" required>
            </div>
          </div>

          <div class="mb-2">
            <label>Gender</label>
            <select name="gender" class="form-control">
              <option value="">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="mb-2">
            <label>Subjects (comma separated)</label>
            <input type="text" name="subjects" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>Level / Class / Year</label>
            <input type="text" name="level_class" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>Preferred Mode</label>
            <select name="mode" class="form-control" required>
              <option value="">Select Mode</option>
              <option value="Online">Online</option>
              <option value="Offline">Offline</option>
            </select>
          </div>
          <div class="mb-2">
            <label>Preferred Teacher</label>
            <input type="text" name="preferred_teacher" class="form-control" required>
          </div>

          <div class="row mb-2">
            <div class="col-md-6">
              <label>Date</label>
              <input type="date" name="date_slot" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Time</label>
              <input type="time" name="time_slot" class="form-control" required>
            </div>
          </div>

          <div class="mb-2">
            <label>Special Instructions</label>
            <textarea name="instructions" class="form-control"></textarea>
          </div>

          <!-- Password Fields -->
          <div class="row mb-2">
            <div class="col-md-6">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" required>
            </div>
          </div>

          <button type="submit" class="btn btn-success">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1>Book Appointments with Your Teachers Easily</h1>
          <p>Schedule one-on-one sessions, get guidance, and manage your learning time effectively.</p>
          <a href="#" class="btn btn-primary btn-lg mt-3"><i class="fas fa-calendar-plus"></i> Book Now</a>
        </div>
        <div class="col-lg-6 text-center">
          <!-- Placeholder for Hero Image -->
          <img src="images/student.jpg" alt="Teacher and Student">
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section class="how-it-works py-5 text-center">
    <div class="container">
      <h2 class="mb-4">How It Works</h2>
      <div class="row">
        <div class="col-md-4">
          <img src="images/find-teacher.webp" alt="Find Teacher">
          <h5>1. Find Your Teacher</h5>
          <p>Browse through a list of available teachers and select the right one for your needs.</p>
        </div>
        <div class="col-md-4">
          <img src="images/book.png" alt="Book Slot">
          <h5>2. Book a Time Slot</h5>
          <p>Choose a date and time that works best for you and your teacher.</p>
        </div>
        <div class="col-md-4">
          <img src="images/attend.png" alt="Attend Session">
          <h5>3. Attend the Session</h5>
          <p>Join the meeting on time and make the most out of your learning experience.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">What Students Say</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="testimonial">
            <img src="images/human1.jpg" alt="Riya Sharma">
            <p>"This platform made booking my teacher so simple and fast. Highly recommended!"</p>
            <h6>- Riya Sharma</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial">
            <img src="images/human2.jpg" alt="Aarav Verma">
            <p>"I can easily manage my study schedule now. The booking system is smooth and efficient."</p>
            <h6>- Aarav Verma</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial">
            <img src="images/human3.jpg" alt="Priya Patel">
            <p>"The reminder feature is amazing. I never miss my sessions anymore!"</p>
            <h6>- Priya Patel</h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5">Why Choose Our Platform?</h2>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <i class="fas fa-clock fa-3x text-primary mb-3"></i>
          <h5>Flexible Scheduling</h5>
          <p>Book sessions at times that suit your busy schedule without any hassle.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-video fa-3x text-primary mb-3"></i>
          <h5>Online or In-Person</h5>
          <p>Attend your sessions from anywhere via video call or meet face-to-face.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-bell fa-3x text-primary mb-3"></i>
          <h5>Smart Reminders</h5>
          <p>Get instant reminders so you never miss your appointments again.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Teachers Section -->
  <section class="teachers py-5">
    <div class="container">
      <h2 class="text-center mb-5">Meet Our Expert Teachers</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 text-center shadow-sm">
            <img src="images/taecher1.jpg" class=" rounded-circle mx-auto mt-3 " alt="Teacher 1"
              style="width:120px;height:120px;">
            <div class="card-body">
              <h5 class="card-title">Mr. Rahul Sharma</h5>
              <p class="card-text">Mathematics Expert with 10+ years of teaching experience.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 text-center shadow-sm">
            <img src="images/teacher 2.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Teacher 2"
              style="width:120px;height:120px;">
            <div class="card-body">
              <h5 class="card-title">Ms. Ananya Singh</h5>
              <p class="card-text">Physics Specialist helping students ace their exams efficiently.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 text-center shadow-sm">
            <img src="images/teacher 3.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Teacher 3"
              style="width:120px;height:120px;">
            <div class="card-body">
              <h5 class="card-title">Mr. Arjun Verma</h5>
              <p class="card-text">Chemistry Guru providing practical and easy-to-understand lessons.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5">Frequently Asked Questions</h2>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne">
              How do I book an appointment with a teacher?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Simply select your preferred teacher, choose a date and time, and click the "Book Now" button.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Can I reschedule or cancel an appointment?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes, you can reschedule or cancel appointments up to 24 hours before the scheduled session.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Are sessions online or in-person?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              You can choose either online or in-person sessions depending on your teacher’s availability.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Video Section -->

  <section class="video-section py-5 text-center">
    <div class="container">
      <h2 class="mb-4">Learn How It Works</h2>
      <div class="ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Demo Video" allowfullscreen></iframe>
      </div>
      <p class="mt-3">Watch this video to see how easy it is to book a session with your teacher.</p>
    </div>
  </section>
  <!-- Video Section -->

  <!-- Pricing / Packages Section -->
  <section class="pricing py-5">
    <div class="container">
      <h2 class="text-center mb-5">Choose Your Plan</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card text-center shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Basic Plan</h5>
              <p class="card-text">1 session per week, access to basic teachers.</p>
              <h3 class="my-3">$10 / month</h3>
              <a href="#" class="btn btn-primary">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center shadow-sm h-100 border-primary">
            <div class="card-body">
              <h5 class="card-title">Standard Plan</h5>
              <p class="card-text">3 sessions per week, priority booking & access to all teachers.</p>
              <h3 class="my-3">$25 / month</h3>
              <a href="#" class="btn btn-primary">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">Premium Plan</h5>
              <p class="card-text">Unlimited sessions, 1-on-1 mentorship, and premium support.</p>
              <h3 class="my-3">$50 / month</h3>
              <a href="#" class="btn btn-primary">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Call-to-Action Section -->
  <section class="cta-section py-5 text-white" style="background: linear-gradient(90deg, #007bff, #0056b3);">
    <div class="container text-center">
      <h2 class="mb-4">Ready to Book Your First Appointment?</h2>
      <p class="mb-4" style="font-size: 1.1rem;">Connect with top teachers and make learning more effective today.</p>
      <a href="#" class="btn btn-light btn-lg"><i class="fas fa-calendar-plus"></i> Get Started Now</a>
    </div>
  </section>

  <!-- Features / Benefits Section -->
  <section class="features-section py-5">
    <div class="container">
      <h2 class="text-center mb-5">Why Choose Our Platform?</h2>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <i class="fas fa-user-clock fa-3x mb-3" style="color:#007bff;"></i>
          <h5>Flexible Scheduling</h5>
          <p>Easily choose time slots that fit your schedule and never miss a session with your teachers.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-bell fa-3x mb-3" style="color:#00aaff;"></i>
          <h5>Instant Notifications</h5>
          <p>Get reminders and updates instantly for upcoming sessions to stay on track with your learning.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-chalkboard-teacher fa-3x mb-3" style="color:#007bff;"></i>
          <h5>Expert Teachers</h5>
          <p>Connect with verified and experienced teachers to enhance your learning experience.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-mobile-alt fa-3x mb-3" style="color:#00aaff;"></i>
          <h5>Mobile Friendly</h5>
          <p>Manage your bookings on any device, anywhere, anytime with our responsive platform.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-shield-alt fa-3x mb-3" style="color:#007bff;"></i>
          <h5>Secure & Reliable</h5>
          <p>Your data is safe, and our system ensures reliable scheduling and smooth session management.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-comments fa-3x mb-3" style="color:#00aaff;"></i>
          <h5>Easy Communication</h5>
          <p>Chat or message your teachers easily within the platform for seamless coordination.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
      <div class="row">
        <!-- About -->
        <div class="col-md-4 mb-3">
          <h5>About</h5>
          <p>Student-Teacher Appointment Platform helps you easily schedule and manage sessions with your teachers.
            Efficient, fast, and reliable.</p>
        </div>
        <!-- Quick Links -->
        <div class="col-md-4 mb-3">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light">Home</a></li>
            <li><a href="#" class="text-light">Features</a></li>
            <li><a href="#" class="text-light">Pricing</a></li>
            <li><a href="#" class="text-light">Support</a></li>
          </ul>
        </div>
        <!-- Contact & Social -->
        <div class="col-md-4 mb-3">
          <h5>Contact</h5>
          <p>Email: info@unifiedmentor.com</p>
          <p>Phone: +91-7438547365</p>
          <div class="d-flex gap-2">
            <a href="#" class="text-light fs-4"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-light fs-4"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-light fs-4"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-light fs-4"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
      <hr class="bg-light">
      <p class="text-center mb-0">&copy; 2025 Student-Teacher Booking Platform. All Rights Reserved.</p>
    </div>
  </footer>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#studentForm').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: 'student_register.php',
            type: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function(response){
                if(response.status == 'error'){
                    $('#message').html('<div class="alert alert-danger">'+response.message+'</div>').fadeIn();
                    setTimeout(function(){ $('#message').fadeOut(); }, 3000);
                } 
                else if(response.status == 'success'){
                    $('#message').html('<div class="alert alert-success">'+response.message+'</div>').fadeIn();
                    form[0].reset();
                    setTimeout(function(){ 
                        $('#message').fadeOut();
                        $('#studentRegisterModal').modal('hide');
                    }, 3000);
                }
            },
            error: function(){
                $('#message').html('<div class="alert alert-danger">Something went wrong!</div>').fadeIn();
                setTimeout(function(){ $('#message').fadeOut(); }, 3000);
            }
        });
    });
});
</script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
    $("#loginForm").submit(function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "login.php",
            data: $(this).serialize(),
            success: function(response){
                $("#msg").html(response);

                // 3 sec ke baad msg hide
                setTimeout(function(){
                    $("#msg").html("");
                }, 3000);
            }
        });
    });
});
</script>
<script>
$(document).on("submit","#teacherForm",function(e){
    e.preventDefault();
    $.ajax({
        url: "teacher_register.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(response){
            $("#msg").html(response);
            setTimeout(() => { $("#msg").html(""); }, 3000);
            $('#teacherForm')[0].reset();
        }
    });
});
</script>
<script>
$(document).ready(function(){
  $("#teacherLoginForm").on("submit", function(e){
    e.preventDefault();
    $.ajax({
      url: "teacher_login.php",
      type: "POST",
      data: $(this).serialize(),
      success: function(response){
        $("#loginMsg").html(response);
        setTimeout(() => { $("#loginMsg").html(""); }, 3000);
      }
    });
  });
});
</script>


</body>

</html>