 <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = mysqli_connect("localhost", "u856909805_state", "Ramdoot@123", "u856909805_real");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['EMAIL']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "❌ Invalid email format.";
    } else {
        $email = mysqli_real_escape_string($con, $email);
        $check = mysqli_query($con, "SELECT id FROM newsletter_subscribers WHERE email='$email' LIMIT 1");

        if (mysqli_num_rows($check) > 0) {
            $message = "⚠️ Email already subscribed.";
        } else {
            $insert = mysqli_query($con, "INSERT INTO newsletter_subscribers (email) VALUES ('$email')");
            if ($insert) {
                $message = "✅ Thank you for subscribing!";
                $to = "tushar.guptaganesh@gmail.com"; // apna email daal
    $subject = "New Newsletter Subscriber";
    $body = "A new user has subscribed with the email: $email";
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: no-reply@yourdomain.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($to, $subject, $body, $headers);
                
            } else {
                $message = "❌ MySQL Error: " . mysqli_error($con);
            }
        }
    }
}
?>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Commercial Property in Nagpur: 2025 Investment Guide for MIHAN & Wardha Road & Besa Road and Luxury Properties</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
    body {
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

    /* 🔹 Top Bar */
    .top-bar {
      background: #ffc107;
      font-size: 14px;
      font-weight: 500;
      padding: 6px 0;
    }
    .top-bar .contact-info li {
      list-style: none;
      margin-right: 20px;
      color: #000;
    }
    .top-bar .social-icons a {
      color: #000;
      margin-left: 12px;
      transition: 0.3s;
    }
    .top-bar .social-icons a:hover {
      color: #e67e22;
    }

    /* 🔹 Navbar */
    .navbar {
      background: rgba(255, 255, 255, 0.95);
      transition: all 0.3s ease-in-out;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .navbar-brand img {
      height: 60px;
    }
    .navbar-nav .nav-link {
      position: relative;
      font-weight: 500;
    }
    .navbar-nav .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -4px;
      background-color: #FF8C00;
      transition: width 0.3s ease;
    }
    .navbar-nav .nav-link:hover::after {
      width: 100%;
    }
    .btn-book {
      background: #e67e22;
      color: #fff;
      padding: 8px 20px;
      border-radius: 25px;
      transition: 0.3s;
      font-weight: 600;
    }
    .btn-book:hover {
      background: #cf711f;
      transform: translateY(-2px);
    }
  .hero-section {
  background: url('assets/img/hero/real.jpg') no-repeat center center/cover;
}

    /* 🔹 Hero Section */
   /* Hero Background */
.hero-section {
  background: url('assets/img/hero/real.jpg') no-repeat center center/cover;
  position: relative;
  height: 100vh; /* full screen hero */
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

/* Overlay for text visibility */
.hero-overlay {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.55);
  z-index: 1;
}

/* Hero Content */
.hero-content {
  position: relative;
  color: #fff;
  z-index: 2;
  max-width: 800px;
  text-align: center;
}

/* Animated H2 */
.hero-content h2 {
  font-weight: 700;
  color:#FF7700;
  margin-bottom: 35px;
  letter-spacing: 2px;
  font-size: 36px;
  animation: pulseText 2.5s ease-in-out infinite, floatText 5s ease-in-out infinite alternate;
}

/* Animated H1 */
.hero-content h1 {
  font-size: 48px;
  font-weight: 800;
  color: #fff;
  text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
  letter-spacing: 2px;
  background: linear-gradient(90deg, #facc15, #f97316);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-bottom: 35px;
  animation: fadeInUp 1.8s ease forwards;
}

/* Hero Paragraph */
.hero-content p {
  font-size: 18px;
  margin-bottom: 30px;
  color: #fff;
  line-height: 1.8;
  letter-spacing: 0.5px;
  max-width: 650px;
  font-weight: 500;
  text-shadow: 0 4px 12px rgba(0,0,0,0.4);
  transition: all 0.3s ease-in-out;
  opacity: 0;
  animation: fadeInUp 2s ease forwards;
  animation-delay: 0.5s;
}

/* Paragraph Hover Glow */
.hero-content p:hover {
  color: #FFD700;
  text-shadow: 0 6px 18px rgba(0,0,0,0.5), 0 0 12px rgba(255,215,0,0.3);
}

/* Hero Button */
.hero-content .btn {
  padding: 16px 40px;
  font-size: 20px;
  font-weight: 600;
  border-radius: 50px;
  border: none;
  background: linear-gradient(135deg, #FFD700, #FF8C00, #FFA500);
  color: #fff;
  cursor: pointer;
  transition: all 0.4s ease-in-out;
  box-shadow: 0 6px 15px rgba(0,0,0,0.2);
  opacity: 0;
  animation: fadeInUp 2s ease forwards;
  animation-delay: 1s;
}

.hero-content .btn:hover {
  background: linear-gradient(135deg, #FFA500, #FF8C00, #FFD700);
  transform: scale(1.1) translateY(-3px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.3), 0 0 20px rgba(255,215,0,0.7);
}

/* Keyframes */

/* Continuous pulse for H2 */
@keyframes pulseText {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.1); opacity: 0.85; }
}

/* Floating up-down effect */
@keyframes floatText {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
  100% { transform: translateY(0px); }
}

/* Fade In Up for H1, Paragraph & Button */
@keyframes fadeInUp {
  0% { opacity: 0; transform: translateY(30px); }
  100% { opacity: 1; transform: translateY(0); }
}


   .logo-img {
  width: 250px;   /* width fix */
  height: 250px;   /* height adjust automatically */
 
}
/* Section Title */
.section-title {
  font-size: 42px; /* bada heading */
  font-weight: 800;
  color: #0a1f44;
  margin-bottom: 20px;
  position: relative;
  text-transform: uppercase;
}

.section-title::after {
  content: '';
  display: block;
  width: 100px;
  height: 5px;
  background: linear-gradient(90deg, #ff7e5f, #feb47b);
  margin: 12px auto 0;
  border-radius: 3px;
}

.section-subtitle {
  font-size: 18px;
  color: #555;
  max-width: 650px;
  margin: 0 auto 40px;
  line-height: 1.6;
}

/* Service Cards */
.service-card {
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  transition: all 0.4s ease-in-out;
  position: relative;
  height: 100%;
}

.service-card:hover {
  transform: translateY(-12px);
  box-shadow: 0 15px 40px rgba(0,0,0,0.18);
}

.service-img img {
  width: 100%;
  height: 280px; /* bada image */
  object-fit: cover;
  transition: transform 0.5s ease;
}

.service-card:hover .service-img img {
  transform: scale(1.1);
}

.service-content {
  padding: 30px; /* zyada padding */
  text-align: center;
}

.service-content h4 {
  font-size: 24px; /* bada title */
  font-weight: 700;
  margin-bottom: 15px;
  color: #0a1f44;
}

.service-content p {
  font-size: 17px; /* bada paragraph */
  color: #444;
  margin-bottom: 25px;
  line-height: 1.6;
}

.btn-service {
  background: linear-gradient(135deg, #2563eb, #1e40af); /* Blue Gradient */
  color: white;
  font-size: 18px;
  font-weight: 600;
  padding: 14px 32px;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
  transition: all 0.4s ease-in-out;
  background-size: 200% 200%; /* gradient animation ke liye */
}

.btn-service:hover {
  background: linear-gradient(135deg, #1e40af, #3b82f6); /* Reverse Gradient */
  background-position: right center; /* Gradient move karega */
  transform: scale(1.08);
  box-shadow: 0 12px 25px rgba(37, 99, 235, 0.5); /* Blue Glow */
}
/* Gold Button Style */
.btn-gold {
    padding: 16px 45px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 50px;
    background: linear-gradient(135deg, #FFD700, #FFA500, #FFB84D);
    color: #fff;
    border: none;
    cursor: pointer;
    transition: all 0.4s ease-in-out;
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

.btn-gold:hover {
    background: linear-gradient(135deg, #FFB84D, #FFA500, #FFD700);
    transform: scale(1.1) translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.3), 0 0 20px rgba(255,223,0,0.7);
}

/* About Section */
/* Gold Button Style */
.btn-gold {
    padding: 16px 45px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 50px;
    background: linear-gradient(135deg, #FFD700, #FFA500, #FFB84D);
    color: #fff;
    border: none;
    cursor: pointer;
    transition: all 0.4s ease-in-out;
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

.btn-gold:hover {
    background: linear-gradient(135deg, #FFB84D, #FFA500, #FFD700);
    transform: scale(1.1) translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.3), 0 0 20px rgba(255,223,0,0.7);
}

/* About Section */
.about-realestate-area {
    position: relative;
}

.back-text {
    font-size: 60px;
    font-weight: 800;
    color: rgba(0,0,0,0.05);
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    letter-spacing: 10px;
}

/* Paragraph hover effect for interactivity */
.about-caption p:hover {
    color: #FF8C00;
    transition: color 0.3s ease-in-out;
}
/* Project Area */
.project-area {
  padding: 100px 0;
  background: #f8f9fa; /* light background for contrast */
}

/* Our Projects Section Heading */
.project-heading {
  position: relative;
  margin-bottom: 70px;
}

.project-heading h2 {
  font-size: 48px;
  font-weight: 800;
  text-transform: uppercase;
  background: linear-gradient(90deg, #FF8C00, #FFD700);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  letter-spacing: 2px;
  position: relative;
  display: inline-block;
  animation: headingBounce 2s infinite;
}

/* Glow underline */
.project-heading h2::after {
  content: '';
  position: absolute;
  width: 80px;
  height: 4px;
  background: linear-gradient(90deg, #FFD700, #FF8C00);
  bottom: -15px;
  left: 0;
  border-radius: 2px;
  box-shadow: 0 0 15px rgba(255,215,0,0.5);
}

/* Heading animation */
@keyframes headingBounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
}


/* Single Project Card */
.single-project {
  position: relative;
  overflow: hidden;
  border-radius: 15px;
  cursor: pointer;
  transition: all 0.5s ease-in-out;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.single-project:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

/* Project Image */
.project-img img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  transition: all 0.5s ease;
}

.single-project:hover .project-img img {
  transform: scale(1.1) rotate(1deg);
  filter: brightness(1.1);
}

/* Overlay Gradient on hover */
.single-project::after {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: linear-gradient(180deg, rgba(255,215,0,0.2) 0%, rgba(255,87,34,0.2) 100%);
  opacity: 0;
  transition: all 0.5s ease;
}

.single-project:hover::after {
  opacity: 1;
}

/* Project Caption */
.project-cap {
  position: absolute;
  bottom: -100%;
  left: 0;
  width: 100%;
  background: rgba(0,0,0,0.6);
  color: #fff;
  text-align: center;
  padding: 20px;
  transition: all 0.5s ease;
}

.single-project:hover .project-cap {
  bottom: 0;
}

/* Project Titles */
.project-cap h4 {
  font-size: 18px;
  margin: 5px 0;
  font-weight: 600;
  transition: all 0.3s ease;
}

.project-cap h4 a {
  color: #fff;
  text-decoration: none;
}

.project-cap h4 a:hover {
  color: #FFD700;
  text-shadow: 0 4px 12px rgba(255,215,0,0.6);
}

/* Plus Button */
.plus-btn {
  display: inline-block;
  width: 45px;
  height: 45px;
  line-height: 45px;
  border-radius: 50%;
  background: linear-gradient(45deg, #FFD700, #FF8C00);
  color: #fff;
  font-size: 20px;
  text-align: center;
  margin-bottom: 10px;
  transition: all 0.3s ease;
}

.single-project:hover .plus-btn {
  transform: scale(1.2) rotate(10deg);
  box-shadow: 0 0 15px rgba(255,215,0,0.6);
}
.single-project {
  opacity: 0;
  transform: translateY(40px);
  transition: all 0.8s ease-out;
}

/* Class to show when in viewport */
.single-project.show {
  opacity: 1;
  transform: translateY(0);
}
.team-area {
    padding: 120px 0;
    background: #f9f9f9;
}

/* Section Title */
/* Team Section Title */
/* Team Section Title */
.team-title {
    font-size: 48px;
    font-weight: 900;
    color: #FF7700;
    text-transform: uppercase;
    letter-spacing: 3px;
    position: relative;
    display: inline-block;
    animation: glow 2s infinite alternate;
}

@keyframes glow {
    from { text-shadow: 0 0 12px #FFD700, 0 0 24px #FFA500; }
    to { text-shadow: 0 0 24px #FFD700, 0 0 36px #FFA500; }
}

/* Team Card */
.single-team {
    position: relative;
    overflow: hidden;
    border-radius: 25px;
    box-shadow: 0 15px 45px rgba(0,0,0,0.3);
    transition: transform 0.5s ease, box-shadow 0.5s ease;
    background: #fff;
    width: 100%;       /* pura column width le */
    max-width: 450px;  /* bade screens ke liye max width */
    margin: 0 auto 60px;
}

.single-team:hover {
    transform: translateY(-20px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.35);
}

/* Team Image */
.team-img {
    position: relative;
    overflow: hidden;
    border-radius: 25px 25px 0 0;
    width: 100%;
    height: 500px; /* bada height */
}

.team-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.single-team:hover .team-img img {
    transform: scale(1.1);
}

/* Overlay */
.team-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.85);
    color: #fff;
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px;
    transition: opacity 0.5s ease;
    text-align: left;
    border-radius: 25px 25px 0 0;
}

.single-team:hover .team-overlay {
    opacity: 1;
}

/* Team Info */
.team-info p {
    font-size: 16px;
    line-height: 1.8;
    margin: 8px 0;
}

.team-info p strong {
    color: #FFD700;
}

/* Caption */
.team-caption {
    padding: 25px;
    text-align: center;
}

.team-role {
    display: block;
    color: #FF7700;
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 8px;
}

.team-name {
    font-size: 28px;
    font-weight: 800;
    color: #222;
}
222;
}

/* Footer Base */
/* Footer Main */
/* Footer Base */
.footer-main {
    background: linear-gradient(135deg, #1a1a1a, #111);
    color: #fff;
    font-family: 'Poppins', sans-serif;
}

.footer-logo-img {
    width: 220px;
    height: auto;
    transition: transform 0.5s ease;
}
.footer-logo-img:hover {
    transform: scale(1.1);
}

/* Footer Headings */
.footer-main h4 {
    font-size: 20px;
    font-weight: 700;
    color: #FF7700;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}
.footer-main h4::after {
    content: '';
    position: absolute;
    width: 50px;
    height: 3px;
    background: #FF7700;
    bottom: -5px;
    left: 0;
    border-radius: 2px;
    animation: glowLine 2s infinite alternate;
}

@keyframes glowLine {
    from { box-shadow: 0 0 5px #FFD700, 0 0 10px #FFA500; }
    to { box-shadow: 0 0 10px #FFD700, 0 0 20px #FFA500; }
}

/* Text & Paragraphs */
.footer-about p, .footer-contact li a, .footer-links li a {
    color: #fff;
    font-size: 15px;
    line-height: 1.8;
    transition: color 0.3s ease, transform 0.3s ease;
}
.footer-about p strong {
    color: #FFD700;
}
.footer-links li a:hover,
.footer-contact li a:hover {
    color: #FF7700;
    transform: translateX(5px);
}

/* Lists */
.footer-links, .footer-contact {
    list-style: none;
    padding: 0;
}
.footer-links li, .footer-contact li {
    margin-bottom: 10px;
}

/* Footer Form */
.footer-form input[type="email"] {
    width: 100%;
    padding: 12px 15px;
    border-radius: 8px;
    border: none;
    margin-bottom: 10px;
    font-size: 15px;
}
.footer-form button {
    width: 100%;
    padding: 12px;
    border: none;
    background: #ff4b2b;
    color: #fff;
    font-weight: 700;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.footer-form button:hover {
    background: #FF7700;
    transform: scale(1.05);
}

/* Footer Bottom */
.footer-bottom {
    padding: 15px 0;
    background: #0a0a0a;
    font-size: 14px;
}
.testimonials-section {
    padding: 80px 0;
    background: #111;
    color: #fff;
    text-align: center;
}

.section-title {
    font-size: 36px;
    font-weight: 800;
    color: #FF7700;
    margin-bottom: 50px;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    width: 60px;
    height: 3px;
    background: #FF7700;
    display: block;
    margin: 10px auto 0;
    border-radius: 2px;
}

.testimonials-slider {
    display: flex;
    overflow-x: auto;
    gap: 30px;
    scroll-behavior: smooth;
    padding-bottom: 20px;
}

.testimonial-card {
    background: #1a1a1a;
    border-radius: 20px;
    padding: 30px;
    min-width: 300px;
    flex: 0 0 auto;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 45px rgba(255, 119, 0, 0.3);
}

.testimonial-card p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
    font-style: italic;
}

.client-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.client-info img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #FF7700;
}

.client-info h4 {
    font-size: 18px;
    font-weight: 700;
    margin: 0;
    color: #FFD700;
}

.stars {
    color: #FF7700;
    font-size: 16px;
}


/* Responsive */
@media (max-width: 992px) {
    .footer-main .col-lg-4, .footer-main .col-lg-3, .footer-main .col-lg-2 {
        margin-bottom: 30px;
    }
}

/* Body adjustments */
body, html {
    margin: 0;
    padding: 0;
}
.features-section {
    padding: 80px 0;
    background: #f7f7f7;
    text-align: center;
}

.features-section .section-title {
    font-size: 42px;
    font-weight: 800;
    color: #FF7700;
    margin-bottom: 50px;
    position: relative;
}

.features-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
}

.feature-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 40px 20px;
    width: 250px;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.feature-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 45px rgba(0,0,0,0.25);
}

.feature-icon {
    font-size: 40px;
    color: #FF7700;
    margin-bottom: 20px;
}

.feature-card h4 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 10px;
}

.feature-card p {
    font-size: 15px;
    line-height: 1.6;
}

/* Counters */
.counters {
    display: flex;
    justify-content: center;
    gap: 50px;
    margin-top: 60px;
}

.counter h3 {
    font-size: 40px;
    font-weight: 800;
    color: #FF7700;
}

.counter p {
    font-size: 16px;
    font-weight: 500;
    margin-top: 5px;
}
.cta-section {
  background: linear-gradient(135deg, #FF7700, #ff4b2b);
  padding: 80px 20px;
  text-align: center;
  color: #fff;
  position: relative;
  overflow: hidden;
}

.cta-section h2 {
  font-size: 42px;
  font-weight: 800;
  margin-bottom: 15px;
  animation: glowText 2s infinite alternate;
}

.cta-section p {
  font-size: 18px;
  margin-bottom: 30px;
}

.cta-btn {
  background: #fff;
  color: #FF4B2B;
  padding: 15px 40px;
  font-weight: 700;
  border-radius: 8px;
  text-decoration: none;
  transition: transform 0.3s, background 0.3s, color 0.3s;
  margin-right: 15px;
}

.cta-btn:hover {
  background: #ff4b2b;
  color: #fff;
  transform: scale(1.05);
}

.cta-whatsapp {
  background: #25D366;
  color: #fff;
  padding: 15px 25px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 700;
  transition: transform 0.3s;
}

.cta-whatsapp:hover {
  transform: scale(1.05);
}
.featured-section {
  padding: 80px 20px;
  text-align: center;
  background: #f5f5f5;
}

.featured-section .section-title {
  font-size: 42px;
  font-weight: 800;
  color: #FF7700;
  margin-bottom: 50px;
}

.project-carousel {
  display: flex;
  gap: 30px;
  overflow-x: auto;
  scroll-behavior: smooth;
}

.project-card {
  min-width: 300px;
  position: relative;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 35px rgba(0,0,0,0.2);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.project-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.project-card:hover img {
  transform: scale(1.1);
}

.project-card .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.65);
  color: #fff;
  opacity: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition: opacity 0.3s ease;
  padding: 20px;
}

.project-card:hover .overlay {
  opacity: 1;
}

.view-btn {
  background: #FF7700;
  color: #fff;
  padding: 10px 20px;
  margin-top: 10px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: transform 0.3s;
}

.view-btn:hover {
  transform: scale(1.05);
}
.faq-section {
    padding: 80px 0;
    background: #f9f9f9;
    font-family: 'Poppins', sans-serif;
}

.section-title {
    font-size: 38px;
    font-weight: 700;
    color: #FF7700;
    text-align: center;
    margin-bottom: 50px;
    position: relative;
}

.section-title::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: #FF7700;
    margin: 10px auto 0;
    border-radius: 2px;
}

.faq-wrapper {
    max-width: 900px;
    margin: 0 auto;
}

.faq-item {
    background: #fff;
    margin-bottom: 15px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-question {
    padding: 20px 25px;
    cursor: pointer;
    font-weight: 600;
    position: relative;
    font-size: 18px;
}

.faq-toggle {
    position: absolute;
    right: 25px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 24px;
    font-weight: bold;
    color: #FF7700;
    transition: transform 0.3s ease;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    padding: 0 25px;
    font-size: 16px;
    line-height: 1.7;
    background: #fefefe;
    transition: all 0.4s ease;
}

.faq-item.active .faq-answer {
    max-height: 500px; /* Enough for text */
    padding: 20px 25px;
}

.faq-item.active .faq-toggle {
    transform: translateY(-50%) rotate(45deg);
}

@keyframes glowText {
  from { text-shadow: 0 0 10px #FFD700, 0 0 20px #FFA500; }
  to { text-shadow: 0 0 20px #FFD700, 0 0 30px #FFA500; }
}

/* Responsive */
@media(max-width:768px){
  .cta-section h2 { font-size: 32px; }
  .cta-section p { font-size: 16px; }
  .cta-btn, .cta-whatsapp { display: block; margin: 10px auto; }
}


/* Responsive */
@media (max-width: 768px) {
    .features-grid {
        flex-direction: column;
        align-items: center;
    }
    .counters {
        flex-direction: column;
        gap: 30px;
    }
}


/* Responsive adjustments */
@media (max-width: 991px) {
    .footer-main .row > div {
        margin-bottom: 30px;
        padding: 0 10px;
    }
    .footer-form input[type="email"] {
        margin-bottom: 10px;
    }
}


/* Responsive */
@media (max-width: 992px) {
    .footer-main .col-lg-4, .footer-main .col-lg-3, .footer-main .col-lg-2 {
        margin-bottom: 30px;
    }
}


/* Responsive Grid */
@media(max-width: 991px){
  .project-img img {
    height: 250px;
  }
}

@media(max-width: 767px){
  .project-img img {
    height: 200px;
  }
}


/* Responsive Video */
@media (max-width: 991px) {
    .about-media video {
        width: 100%;
        height: auto;
    }
}





@media (max-width: 768px) {
  .logo-img {
    height: 60px; /* mobile me thoda chhota */
  }
}

    /* 🔹 Responsive Fixes */
    @media (min-width: 768px) {
      .hero-content h1 {
        font-size: 3.5rem;
      }
      .hero-content p {
        font-size: 1.2rem;
      }
    }
     @keyframes fadeInUp {
      from {opacity:0; transform: translateY(40px);}
      to {opacity:1; transform: translateY(0);}
    }
  </style>
   
<!-- Animation CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta name="description" content="Explore NMRDA-approved plots for sale in Nagpur’s hottest and most affordable corridors — MIHAN/Wardha Road, Besa, Jamtha, Pipla & Mankapur. Verified listings under ₹35 Lacs with clear titles, excellent connectivity & future growth prospects.">
    <meta name="keywords" content="Best plots in Nagpur, Nagpur real estate investment, Residential land for sale Nagpur, Buy plots near MIHAN, NIT approved plots Nagpur, Top real estate projects Nagpur, Plot booking Nagpur, Ramdoot Infra Nagpur, Property investment Nagpur, Nagpur real estate 2025">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logo.webp">
        <link rel="canonical" href="https://www.ramdootinfra.com">
		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <!-- Google tag (gtag.js) -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DBV4MR20G7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DBV4MR20G7');
</script>
            <style>
                .float{
               position:fixed;
               width:60px;
               height:60px;
               bottom:100px;
               right:30px;
               background-color:#25d366;
               color:#FFF;
               border-radius:50px;
               text-align:center;
             font-size:30px;
               box-shadow: 2px 2px 3px #999;
             z-index:100;
           }
           
           .my-float{
               margin-top:15px;
           }
               </style>
 <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "RealEstateAgent",
      "name": "Ramdoot Infra",
      "url": "https://www.ramdootinfra.com",
      "logo": "https://www.ramdootinfra.com/assets/img/logo/logo.webp",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Nagpur",
        "addressRegion": "MH",
        "postalCode": "440001",
        "addressCountry": "IN"
      },
      "telephone": "+91-7249570906",
      "description": "Trusted real estate company offering plots for sale in Nagpur. Residential and commercial land options available."
    }
    </script>
   </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.webp" alt="logo">
                </div>
            </div>
        </div>
    </div>
    
      <!-- 🔹 Top Bar (Now Responsive) -->
<div class="top-bar">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-8 col-12 mb-2 mb-md-0">
        <ul class="d-flex flex-wrap contact-info m-0 p-0">
          <li><i class="fa fa-phone me-1"></i> +91 9689773228</li>
          <li><i class="fa fa-envelope me-1"></i> ramdootinfra46@gmail.com</li>
          <li><i class="fa fa-clock me-1"></i> Mon - Sat 10:00 - 6:30, Friday - CLOSED</li>
        </ul>
      </div>
      <div class="col-md-4 col-12 text-md-end text-center">
        <div class="social-icons">
          <a href="https://x.com/ramdootinfra"><i class="fab fa-twitter"></i></a>
          <a href="https://www.facebook.com/profile.php?id=61567334202120"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/infraramdoot/"><i class="fab fa-instagram"></i></a>
          <a href="https://www.youtube.com/@RamdootInfra"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 🔹 Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">

  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="assets/img/logo/logo.webp" alt="Ramdoot Infra" class="logo-img">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="index.php"   style="margin-right:40px;color:black;">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php" style="margin-right:40px;color:black;">About</a></li>
        <li class="nav-item"><a class="nav-link" href="https://ramdootinfra.blogspot.com/"           style="margin-right:40px;color:black;">Blogs</a></li>
        <li class="nav-item"><a class="nav-link" href="project.php" style="margin-right:40px;color:black;">Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="services.php" style="margin-right:40px;color:black;">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php" style="margin-right:40px;color:black;">Contact</a></li>
      </ul>
      <a href="contact.php" class="btn btn-book">Book Now</a>
    </div>
  </div>
</nav>

<!-- 🔹 Hero Section -->
<section class="hero-section" style="background-image: url(''assets/img/hero/real.jpg);">
  <div class="hero-overlay"></div>
  <div class="container text-center">
    <div class="hero-content">
      <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Ramdoot Infra!</span></h2>
      <h1 class="animate__animated animate__fadeInUp">From Foundations to Future Homes</h1>
      <p class="animate__animated animate__fadeInUp animate__delay-1s">
        World-class plots & construction services with trust & transparency.
      </p>
      <a href="services.php" class="btn btn-warning text-dark animate__animated animate__zoomIn animate__delay-2s">
        Our Services
      </a>
    </div>
  </div>
</section>


        <!-- slider Area End-->
        <!-- Services Area Start -->
       <!-- Services Section -->
<section class="services-area section-padding30">
  <div class="container">
    <!-- Section Title -->
    <div class="row text-center mb-5">
      <div class="col-lg-12">
        <h2 class="section-title">Our Premium Services</h2>
        <p class="section-subtitle">Discover properties tailored to your dreams and lifestyle</p>
      </div>
    </div>

    <!-- Services Cards -->
    <div class="row g-4">
      <!-- Service 1 -->
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="service-card wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
          <div class="service-img">
            <img src="assets/img/service/ser1.jpg" alt="Plots Available">
          </div>
          <div class="service-content">
            <h4>Plots Available</h4>
            <p>Premium locations with complete infrastructure support for your future investment.</p>
            <a href="contact.php" class="btn-service">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="service-card wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
          <div class="service-img">
            <img src="assets/img/service/ser2.webp" alt="Residential Plots">
          </div>
          <div class="service-content">
            <h4>Residential Plots under 35 lakhs</h4>
            <p>Secure and affordable residential spaces with world-class amenities nearby.</p>
            <a href="contact.php" class="btn-service">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="service-card wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
          <div class="service-img">
            <img src="assets/img/service/ser3.jpg" alt="Commercial Plots">
          </div>
          <div class="service-content">
            <h4>Commercial Plots under 30 lakhs</h4>
            <p>High potential commercial plots ideal for business & investment opportunities.</p>
            <a href="contact.php" class="btn-service">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="featured-projects" class="featured-section">
  <div class="container">
    <h2 class="section-title">Featured Plots</h2>
    <div class="project-carousel">
      <div class="project-card">
        <img src="assets/img/team/plot 1.jpeg" alt="Residential Plot">
        <div class="overlay">
          <h4>Residential Plot</h4>
          <p>Location: Nagpur</p>
          <a href="project.php" class="view-btn">View Details</a>
        </div>
      </div>
      <div class="project-card">
        <img src="assets/img/team/plot 2.jpg" alt="Commercial Plot">
        <div class="overlay">
          <h4>Commercial Plot</h4>
          <p>Location: Nagpur</p>
          <a href="project.php" class="view-btn">View Details</a>
        </div>
      </div>
      <div class="project-card"> 
        <img src="assets/img/team/plot 3.jpg" alt="Land Plot">
        <div class="overlay">
          <h4>Land Plot</h4>
          <p>Location: Nagpur</p>
          <a href="project.php" class="view-btn">View Details</a>
        </div>
      </div>
      <!-- Add more project cards as needed -->
    </div>
  </div>
</section>
<section id="faq" class="faq-section">
    <div class="container">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <div class="faq-wrapper">

            <!-- Booking Question -->
            <div class="faq-item">
                <div class="faq-question">
                    What is the process to book a plot?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    To book a plot, visit our site or contact us via WhatsApp at <strong>+91 9689773228</strong> to get details and schedule a visit.
                </div>
            </div>

            <!-- Possession -->
            <div class="faq-item">
                <div class="faq-question">
                    Are the plots ready for immediate possession?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    Yes, most plots are ready for immediate possession. Specific details are shared during site visit or consultation.
                </div>
            </div>

            <!-- Financing -->
            <div class="faq-item">
                <div class="faq-question">
                    Do you offer financing options?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    We guide you through financing options with partner banks. Contact our team for personalized plans.
                </div>
            </div>

            <!-- Wardha Road Plot Rates -->
            <div class="faq-item">
                <div class="faq-question">
                    What is the plot rate on Wardha Road?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    Wardha Road plots are available from <strong>₹2000 per sq.ft</strong>. Rates may vary based on location and size.
                </div>
            </div>

            <!-- Samruddhi Plots -->
            <div class="faq-item">
                <div class="faq-question">
                    What is the rate at Samruddhi project?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    Samruddhi plots are priced at <strong>₹2400–2500 per sq.ft</strong> depending on the plot location and size.
                </div>
            </div>

            <!-- Besa & Gogli Road -->
            <div class="faq-item">
                <div class="faq-question">
                    Any plots near Godrej, Besa & Gogli Road?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    Yes, plots are available near Godrej, Besa & Gogli Road with Silver Icon 3 & 4, priced between <strong>₹3550–3900 per sq.ft</strong>.
                </div>
            </div>

            <!-- Nagalwadi Plots -->
            <div class="faq-item">
                <div class="faq-question">
                    What is the plot rate at Nagalwadi?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    Nagalwadi plots are available from <strong>₹1850 per sq.ft</strong>. Budget-friendly options are available based on plot size and location.
                </div>
            </div>

            <!-- Budget-friendly options -->
            <div class="faq-item">
                <div class="faq-question">
                    Do you provide plots for different budgets?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    Yes, we offer plots for all budgets. Our team helps you choose the best option based on your financial plan and preferred location.
                </div>
            </div>

            <!-- Best real estate locations in Nagpur -->
            <div class="faq-item">
                <div class="faq-question">
                    Which are the best locations in Nagpur for plots?
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    We guide our clients to the most promising locations in Nagpur based on development potential, connectivity, and pricing.
                </div>
            </div>

        </div>
    </div>
</section>




        <!-- Services Area End -->

        <!-- About Area Start -->
        <!-- About Area Start -->
        <!-- About Area Start -->
<section class="about-realestate-area pt-120 pb-120" style="background: linear-gradient(135deg, #f5f7fa, #e8edf1);">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Left Content: Text -->
            <div class="col-lg-6">
                <div class="section-title mb-50">
                    <h2 class="animate__animated animate__fadeInUp" style="color:#FF8C00;">Who We Are</h2>
                    <span class="back-text animate__animated animate__fadeInUp animate__delay-1s">About Us</span>
                </div>
                <div class="about-caption">
                    <p class="animate__animated animate__fadeInUp animate__delay-2s" style="font-size:18px; line-height:1.8; color:#333;">
                        <strong>Ramdoot Infra</strong> is transforming the real estate landscape of <strong>Nagpur</strong> with expertly curated residential and commercial plots. From the MIHAN SEZ to Wardha Road, Besa, and Hingna, our properties promise strategic connectivity, verified titles, and exponential growth potential. We guide investors and first-time buyers with precise market insights to ensure profitable decisions.
                    </p>
                    <p class="animate__animated animate__fadeInUp animate__delay-3s" style="font-size:18px; line-height:1.8; color:#333;">
                        Key infrastructure developments like <strong>Samruddhi Expressway, Nagpur Metro expansion, and emerging commercial hubs</strong> are fueling property appreciation. Investing with us ensures access to premium plots, seamless documentation, and expert support — making your real estate journey secure and rewarding.
                    </p>
                    <p class="animate__animated animate__fadeInUp animate__delay-4s" style="font-size:18px; line-height:1.8; color:#333;">
                        Join hundreds of satisfied clients who have made Nagpur their preferred investment destination. <strong>Residential plots, commercial spaces, luxury lands</strong> — we don’t just sell properties, we lay the foundation for your prosperous future.
                    </p>
                    <a href="contact.php" class="btn btn-gold animate__animated animate__fadeInUp animate__delay-5s">Book Now</a>
                </div>
            </div>
            
            <!-- Right Content: Video -->
            <div class="col-lg-6">
                <div class="about-media text-center animate__animated animate__fadeInRight">
                    <video width="100%" height="auto" autoplay loop muted playsinline controls style="border-radius:20px; box-shadow: 0 10px 40px rgba(0,0,0,0.3);">
                        <source src="assets/video/video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

        </div>
    </div>
</section>


        <!-- About Area End -->
        <!-- Project Area Start -->
        <section class="project-area  section-padding30">
            <div class="container">
               <div class="project-heading mb-35">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle3">
                                <div class="front-text">
                                    <h2 class="" style="color:orange;">Our Projects</h2>
                                </div>
                                <!--<span class="back-text">Gellary</span>-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="properties__button">
                                <!--Nav Button  -->                                            
                                <nav> 
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false"> Show  all </a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Residential Plots</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Commercials Plots</a>
                                        <!-- <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Big building</a>
                                        <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Park</a> -->
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
               </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content active" id="nav-tabContent">
                            <!-- card ONE -->
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                <div class="project-caption">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/iknow.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h4><a href="#">Commercials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/gmt.webp" alt="Recidencials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Recidencials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/com.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Commercials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/commm.webp" alt="Residentials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Residentials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/comr.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Commercials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/bhm.webp" alt="Residentials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Residentials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card TWO -->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="project-caption">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/ho1.webp" alt="Residentials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Residentials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/ho2.webp" alt="Residentials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Residentials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/ho3.webp" alt="Residentials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Residentials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/ho4.webp" alt="Residentials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Residentials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/ho5.webp" alt="Residentials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Residentials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/bhm.webp" alt="Residentials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Residentials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card THREE -->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="project-caption">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/oh1.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="">Commercials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/oh2.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Commercials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/oh3.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Commercials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/oh4.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Commercials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/oh5.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Commercials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="assets/img/gallery/oh6.webp" alt="Commercials">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project.php" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h4><a href="#">Commerials</a></h4>
                                                    <h4><a href="#">Plots</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <section id="testimonials" class="testimonials-section">
    <div class="container">
        <h2 class="section-title">What Our Clients Say</h2>
        <div class="testimonials-slider">
            <div class="testimonial-card">
                <p>"Ramdoot Infra helped me buy my dream plot. Highly recommended!"</p>
                <div class="client-info">
                    <img src="assets/img/team/tushar1.jpeg" alt="Client 1">
                    <div>
                        <h4>Mrs Tushar Gupta</h4>
                        <div class="stars">
                            ⭐⭐⭐⭐⭐
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <p>"Professional team and excellent service. Very happy with my investment."</p>
                <div class="client-info">
                    <img src="assets/img/team/img1.jpeg" alt="Client 2">
                    <div>
                        <h4>Ms.Chaitanya Mankar</h4>
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>
            <!-- Add more testimonials here -->
        </div>
    </div>
</section>

<section id="features" class="features-section">
    <div class="container">
        <h2 class="section-title">Why Choose Ramdoot Infra?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-award feature-icon"></i>
                <h4>10+ Years Experience</h4>
                <p>We have more than a decade of experience in real estate projects.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-users feature-icon"></i>
                <h4>Trusted by 100+ Clients</h4>
                <p>Our clients trust us for transparency and reliability.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-handshake feature-icon"></i>
                <h4>Expert Team</h4>
                <p>Our team consists of highly skilled professionals in the field.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-wallet feature-icon"></i>
                <h4>Affordable Pricing</h4>
                <p>We offer competitive pricing without compromising quality.</p>
            </div>
        </div>

        <!-- Animated Counters -->
        

</section>
<section id="cta" class="cta-section">
  <div class="cta-container">
    <div class="cta-content">
      <h2>Book Your Dream Plot Today!</h2>
      <p>Connect with our experts for personalized assistance and site visits.</p>
      <a href="contact.php" class="cta-btn">Contact Now</a>
      <a href="https://wa.me/919689773228" class="cta-whatsapp" target="_blank">
        <i class="fab fa-whatsapp"></i> WhatsApp Us
      </a>
    </div>
  </div>
</section>


                            <!-- card FUR -->
                            <!--<div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">-->
                            <!--    <div class="project-caption">-->
                            <!--        <div class="row">-->
                            <!--            <div class="col-lg-4 col-md-6">-->
                            <!--                <div class="single-project mb-30">-->
                            <!--                    <div class="project-img">-->
                            <!--                        <img src="assets/img/gallery/project1.png" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="project-cap">-->
                            <!--                        <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                            <!--                       <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                            <!--                        <h4><a href="project_details.html">Factory</a></h4>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="col-lg-4 col-md-6">-->
                            <!--                <div class="single-project mb-30">-->
                            <!--                    <div class="project-img">-->
                            <!--                        <img src="assets/img/gallery/project2.png" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="project-cap">-->
                            <!--                        <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                            <!--                       <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                            <!--                        <h4><a href="project_details.html">Factory</a></h4>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="col-lg-4 col-md-6">-->
                            <!--                <div class="single-project mb-30">-->
                            <!--                    <div class="project-img">-->
                            <!--                        <img src="assets/img/gallery/project3.png" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="project-cap">-->
                            <!--                        <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                            <!--                       <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                            <!--                        <h4><a href="project_details.html">Factory</a></h4>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="col-lg-4 col-md-6">-->
                            <!--                <div class="single-project mb-30">-->
                            <!--                    <div class="project-img">-->
                            <!--                        <img src="assets/img/gallery/project4.png" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="project-cap">-->
                            <!--                        <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                            <!--                       <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                            <!--                        <h4><a href="project_details.html">Factory</a></h4>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="col-lg-4 col-md-6">-->
                            <!--                <div class="single-project mb-30">-->
                            <!--                    <div class="project-img">-->
                            <!--                        <img src="assets/img/gallery/project5.png" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="project-cap">-->
                            <!--                        <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                            <!--                       <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                            <!--                        <h4><a href="project_details.html">Factory</a></h4>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="col-lg-4 col-md-6">-->
                            <!--                <div class="single-project mb-30">-->
                            <!--                    <div class="project-img">-->
                            <!--                        <img src="assets/img/gallery/project6.png" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="project-cap">-->
                            <!--                        <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                            <!--                       <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                            <!--                        <h4><a href="project_details.html">Factory</a></h4>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- card FIVE -->
                        <!--    <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">-->
                        <!--        <div class="project-caption">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-lg-4 col-md-6">-->
                        <!--                    <div class="single-project mb-30">-->
                        <!--                        <div class="project-img">-->
                        <!--                            <img src="assets/img/gallery/project1.png" alt="">-->
                        <!--                        </div>-->
                        <!--                        <div class="project-cap">-->
                        <!--                            <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                        <!--                           <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                        <!--                            <h4><a href="project_details.html">Factory</a></h4>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-lg-4 col-md-6">-->
                        <!--                    <div class="single-project mb-30">-->
                        <!--                        <div class="project-img">-->
                        <!--                            <img src="assets/img/gallery/project2.png" alt="">-->
                        <!--                        </div>-->
                        <!--                        <div class="project-cap">-->
                        <!--                            <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                        <!--                           <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                        <!--                            <h4><a href="project_details.html">Factory</a></h4>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-lg-4 col-md-6">-->
                        <!--                    <div class="single-project mb-30">-->
                        <!--                        <div class="project-img">-->
                        <!--                            <img src="assets/img/gallery/project3.png" alt="">-->
                        <!--                        </div>-->
                        <!--                        <div class="project-cap">-->
                        <!--                            <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                        <!--                           <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                        <!--                            <h4><a href="project_details.html">Factory</a></h4>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-lg-4 col-md-6">-->
                        <!--                    <div class="single-project mb-30">-->
                        <!--                        <div class="project-img">-->
                        <!--                            <img src="assets/img/gallery/project4.png" alt="">-->
                        <!--                        </div>-->
                        <!--                        <div class="project-cap">-->
                        <!--                            <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                        <!--                           <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                        <!--                            <h4><a href="project_details.html">Factory</a></h4>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-lg-4 col-md-6">-->
                        <!--                    <div class="single-project mb-30">-->
                        <!--                        <div class="project-img">-->
                        <!--                            <img src="assets/img/gallery/project5.png" alt="">-->
                        <!--                        </div>-->
                        <!--                        <div class="project-cap">-->
                        <!--                            <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                        <!--                           <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                        <!--                            <h4><a href="project_details.html">Factory</a></h4>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-lg-4 col-md-6">-->
                        <!--                    <div class="single-project mb-30">-->
                        <!--                        <div class="project-img">-->
                        <!--                            <img src="assets/img/gallery/project6.png" alt="">-->
                        <!--                        </div>-->
                        <!--                        <div class="project-cap">-->
                        <!--                            <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>-->
                        <!--                           <h4><a href="project_details.html">Floride Chemicals</a></h4>-->
                        <!--                            <h4><a href="project_details.html">Factory</a></h4>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    <!-- End Nav Card -->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!-- Project Area End -->
        <!-- contact with us Start -->
        <!-- <section class="contact-with-area" data-background="assets/img/gallery/section-bg2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 offset-xl-1 offset-lg-1">
                        <div class="contact-us-caption">
                            <div class="team-info mb-30 pt-45"> -->
                                <!-- Section Tittle -->
                                <!-- <div class="section-tittle section-tittle4">
                                    <div class="front-text">
                                        <h2 class="">Lats talk with us</h2>
                                    </div>
                                    <span class="back-text">Lat`s chat</span>
                                </div>
                                <p>Mollit anim laborum.Dvcuis aute iruxvfg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur sfwsignjnt occa cupidatat non aute iruxvfg dhjinulpadeserunt mollitemnth incididbnt ut;o5tu layjobore mofllit anim.</p>
                                <a href="#" class="white-btn">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- contact with us End-->
        <!-- CountDown Area Start -->
        <!-- <div class="count-area">
            <div class="container">
                <div class="count-wrapper count-bg" data-background="assets/img/gallery/section-bg3.jpg">
                    <div class="row justify-content-center" >
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter">34</span>
                                    </div>
                                    <div class="count-text">
                                        <p>Machinery</p>
                                        <h5>Tools</h5>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter">76</span>
                                    </div>
                                    <div class="count-text">
                                        <p>Machinery</p>
                                        <h5>Tools</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter">08</span>
                                    </div> -->
                                    <!-- <div class="count-text">
                                        <p>Machinery</p>
                                        <h5>Tools</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- CountDown Area End -->
        <!-- Team Start -->
       <section class="team-area section-padding30 bg-light">
    <div class="container">
        <!-- Section Title -->
        <div class="row">
            <div class="col-xl-12 text-center mb-70">
                <h2 class="team-title animate__animated animate__fadeInDown">
                    Our Team
                </h2>
            </div>
        </div>

        <!-- Team Member -->
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 mb-50">
                <div class="single-team animate__animated animate__fadeInUp" style="animation-delay:0.2s;">
                    <div class="team-img">
                        <img src="assets/img/team/ramgupta.png" alt="Mr Ram Gupta">
                        <div class="team-overlay">
                            <div class="team-info">
                                <p><strong>Age:</strong> 34</p>
                                <p><strong>Role:</strong> Director / Founder</p>
                                <p><strong>Experience:</strong> 10+ years in real estate & property development</p>
                                <p>Mr. Ram Gupta leads Ramdoot Infra with a vision to provide world-class residential & commercial plots in Nagpur. His expertise ensures transparent deals, prime location investments, and exceptional client satisfaction.</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-caption text-center">
                        <span class="team-role">Director / Founder</span>
                        <h3 class="team-name">Mr. Ram Gupta</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

     
     </div>
        <!-- Team End -->
        <!-- Testimonial Start -->
        <!-- <div class="testimonial-area t-bg testimonial-padding"> -->
            <!-- <div class="container ">
                <div class="row">
                    <div class="col-xl-12"> -->
                        <!-- Section Tittle -->
                        <!-- <div class="section-tittle section-tittle6 mb-50">
                            <div class="front-text">
                                <h2 class="">Testimonial</h2>
                            </div>
                            <span class="back-text">Feedback</span>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-xl-10 col-lg-11 col-md-10 offset-xl-1"> -->
                        <!-- <div class="h1-testimonial-active"> -->
                            <!-- Single Testimonial -->
                            <!-- <div class="single-testimonial"> -->
                                 <!-- Testimonial Content -->
                                <!-- <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap"> -->
                                        <!-- SVG icon -->
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"width="86px" height="63px">
                                        <path fill-rule="evenodd"  stroke-width="1px" stroke="rgb(255, 95, 19)" fill-opacity="0" fill="rgb(0, 0, 0)"
                                        d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z"/>
                                        </svg>
                                        <p>Mollit anim laborum.Dvcuis aute iruxvfg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur sfwsignjnt occa cupidatat non aute iruxvfg dhjinulpadeserunt mollitemnth incididbnt ut;o5tu layjobore mofllit anim. Mollit anim laborum.Dvcuis aute iruxvfg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur sfwsignjn.</p>
                                    </div> -->
                                    <!-- founder -->
                                    <!-- <div class="testimonial-founder d-flex align-items-center">
                                       <div class="founder-text">
                                            <span>Jessya Inn</span>
                                            <p>Co Founder</p>
                                       </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Single Testimonial -->
                            <!-- <div class="single-testimonial"> -->
                                 <!-- Testimonial Content -->
                                <!-- <div class="testimonial-caption "> -->
                                    <!-- <div class="testimonial-top-cap"> -->
                                        <!-- SVG icon -->
                                        <!-- 
                                         -->
                                    <!-- founder -->
                                    <!-- <div class="testimonial-founder d-flex align-items-center">
                                       <div class="founder-text">
                                            <span>Jessya Inn</span>
                                            <p>Co Founder</p>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div> -->
        <!-- Testimonial End -->
        <!--latest Nnews Area start -->
        <!-- <div class="latest-news-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12"> -->
                        <!-- Section Tittle -->
                        <!-- <div class="section-tittle section-tittle7 mb-50">
                            <div class="front-text">
                                <h2 class="">latest news</h2>
                            </div>
                            <span class="back-text">Our Blog</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6"> -->
                        <!-- single-news -->
                        <!-- <div class="single-news mb-30">
                            <div class="news-img">
                                <img src="assets/img/david/david_1.png" alt="">
                                <div class="news-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="news-caption">
                                <ul class="david-info">
                                    <li> | &nbsp; &nbsp;  Porperties</li>
                                </ul>
                                <h2><a href="single-blog.html">Footprints in Time is perfect
                                    House in Kurashiki</a></h2>
                                <a href="single-blog.html" class="d-btn">Read more »</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-xl-6 col-lg-6 col-md-6"> -->
                        <!-- single-news -->
                        <!-- <div class="single-news mb-30">
                            <div class="news-img">
                                <img src="assets/img/david/david_2.png" alt="">
                                <div class="news-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="news-caption">
                                <ul class="david-info">
                                    <li> | &nbsp; &nbsp;  Porperties</li>
                                </ul>
                                <h2><a href="single-blog.html">Footprints in Time is perfect
                                    House in Kurashiki</a></h2>
                                <a href="single-blog.html" class="d-btn">Read more » </a>
                            </div>
                        </div>
                    </div>
               </div>
            </div> -->
        <!-- </div> -->
        <!--latest News Area End -->

    <!-- </main>
    <footer> -->
        <!-- Footer Start-->
          <!-- Footer Start -->
<footer class="footer-main">
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Logo + About -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-logo mb-3">
                            <a href="index.php"><img src="assets/img/logo/logo.webp" alt="Ramdoot Infra" class="footer-logo-img"></a>
                        </div>
                        <div class="footer-about">
                            <p>At <strong>Ramdoot Infra</strong>, we don’t just sell land; we help you lay the foundation for a prosperous future.</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <h4>Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="about.php">About</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="project.php">Projects</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <h4>Contact</h4>
                        <p style="color:white;">Plot No. 12, Second Floor Amarjyoti Nagar, Near Mahindra Showroom, Beltarodi Road, Nagpur</p>
                        <ul class="footer-contact">
                            <li><a href="tel:+919762030834">Phone: +91 9762030834</a></li>
                            <li><a href="tel:+919689773228">Cell: +91 9689773228</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter / Book Now -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-footer-caption mb-50">
                        <h4>Subscribe / Book Now</h4>
                        <form method="POST" class="footer-form">
                            <input type="email" name="EMAIL" placeholder="Email Address" required>
                            <button type="submit">Book Now</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom text-center">
        <p style="color:white;">&copy; 2025 Ramdoot Infra. All Rights Reserved.</p>
    </div>
</footer>
<!-- Footer End -->

<?php if ($message) { echo "<p style='color:red;'>$message</p>"; } ?>



<a href="https://api.whatsapp.com/send?phone=9689773228&text=ramdootinfra" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
   
   
	<!-- JS here -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
               
        <!-- counter , waypoint -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
                <script>
                    
document.addEventListener("DOMContentLoaded", function() {
  const projects = document.querySelectorAll('.single-project');
  projects.forEach((card, index) => {
    card.style.opacity = 0;
    setTimeout(() => {
      card.style.transition = "all 0.6s ease-out";
      card.style.opacity = 1;
      card.style.transform = "translateY(0)";
    }, index * 150); // stagger animation
  });
});
</script>
<script>
function isInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
    rect.top <= (window.innerHeight || document.documentElement.clientHeight) - 100
  );
}

const projectCards = document.querySelectorAll('.single-project');

function revealProjects() {
  projectCards.forEach((card, index) => {
    if (isInViewport(card)) {
      setTimeout(() => {
        card.classList.add('show');
      }, index * 150); // staggered effect
    }
  });
}

window.addEventListener('scroll', revealProjects);
window.addEventListener('load', revealProjects);
</script>


                <script>
   
    document.querySelector('button[type="submit"]').addEventListener('mouseover', function(){
        this.style.backgroundColor = '#ff1e00';
        this.style.transform = 'scale(1.05)';
        this.style.boxShadow = '0px 4px 10px rgba(0,0,0,0.3)';
    });

    document.querySelector('button[type="submit"]').addEventListener('mouseout', function(){
        this.style.backgroundColor = '#ff4b2b';
        this.style.transform = 'scale(1)';
        this.style.boxShadow = 'none';
    });
</script>

<script>
    const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
    item.querySelector('.faq-question').addEventListener('click', () => {
        // Close other items
        faqItems.forEach(i => {
            if(i !== item) i.classList.remove('active');
        });

        // Toggle current
        item.classList.toggle('active');
    });
});

</script>

        
    </body>
</html>