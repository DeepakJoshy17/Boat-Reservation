<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if admin is logged in, if not, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: loginadminhtml.php");
    exit;
}

// Include database connection
include_once "db_connection.php";

// Get admin ID from session
$admin_id = $_SESSION['admin_id'];

// Fetch admin-specific data
$sql_admin = "SELECT * FROM Users WHERE user_id = ? AND role = 'Admin'";
$stmt_admin = $conn->prepare($sql_admin);

if ($stmt_admin) {
    $stmt_admin->bind_param("i", $admin_id);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    // Check if admin exists
    if ($result_admin->num_rows > 0) {
        $admin_data = $result_admin->fetch_assoc();
    } else {
        // If admin does not exist, redirect to login page
        header("Location: loginadminhtml.php");
        exit();
    }
    
    $stmt_admin->close();
} else {
    // Handle error if statement preparation fails
    echo "Error preparing statement: " . $conn->error;
}

// Include headeradmin.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Terapia - Physical Therapy Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
/* Hide Owl Carousel navigation arrows */
.owl-nav {
    display: none !important;
}
</style>
</head>
<body>
    <?php include "includes/headeradmin.php";?>
            <!-- Carousel Start -->
       <div class="header-carousel owl-carousel">
    <div class="header-carousel-item">
        <img src="img/carousel-1.jpg" class="img-fluid w-100" alt="Image">
        <div class="carousel-caption">
            <div class="carousel-caption-content p-3">
                <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"></h5>
                <h1 class="display-1 text-capitalize text-white mb-4">your ticket to scenic wonders!</h1>
                <p class="mb-5 fs-5">Sail through Kerala's mesmerizing destinations with just a click on Waterway!" Embark on a journey of discovery in God's Own Country, with Waterway as your guide!
                </p>
                <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="adminseats.php">Manage Boats</a>
            </div>
        </div>
    </div>
    <div class="header-carousel-item">
        <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="Image">
        <div class="carousel-caption">
            <div class="carousel-caption-content p-3">
                <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"></h5>
                <h1 class="display-1 text-capitalize text-white mb-4">gateway to Kerala's enchanting destinations! </h1>
                <p class="mb-5 fs-5 animated slideInDown">seamless travel experiences at your fingertips. Join us on a journey of discovery and let Kerala's allure captivate you!"
                </p>
                <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="adminroute.php">Manage Routes</a>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->
        </div>
        <!-- Navbar & Hero End -->




        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4"><i class="fas fa-star-of-life me-3"></i>Waterway</h4>
                            <p>eamless travel experiences at your fingertips. Join us on a journey of discovery and let Kerala's allure captivate you!"
                            </p>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Quick Links</h4>
                            <a href="feedback.php"><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                            <a href="aboutus.php"><i class="fas fa-angle-right me-2"></i> Why Us?</a>
                            <a href="blog.php"><i class="fas fa-angle-right me-2"></i> Our Blog & News</a>
                            <a href="team.php"><i class="fas fa-angle-right me-2"></i> Our Team</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Waterway Services</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i>Public Transportation</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Schedule Information</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Feed us option</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Accessibility Services</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Various Locations</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Customer Service Support</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Contact Info</h4>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> 123 Street, Kerala, INDIA</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> deepakjoshy17@gmail.com</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> enquirieswaterway@gmail.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +91 9497384572</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +07 210 699</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Waterway</a>, © 2024 . All rights reserved |.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">Deepak Joshy</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

     
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        
    </body>

</html>