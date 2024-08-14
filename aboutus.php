<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//session_start(); // Start session   
include 'db_connection.php'; // Include your database connection file

// Check if user is logged in
/*if (!isset($_SESSION['user_id'])) {
    header("Location: userhome.php");
    exit;
}*/
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
    </head>
    <?php include "includes/header.php"?>

    <body>
        
 <!-- About Start -->
 
   <div class="container-fluid about bg-light py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-img pb-5 ps-5">
                            <img src="img/boat4.jpeg" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                            <!--
                            <div class="about-img-inner">
                                <img src="img/about2.jpeg" class="img-fluid rounded-circle w-100 h-100" alt="Image">
                            </div>-->
                            <div class="about-experience">&nbsp;5 years experience</div>
                        </div>
                    </div>
                    <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="section-title text-start mb-5">
                            <h4 class="sub-title pe-3 mb-0">About Us</h4>
                            <h1 class="display-3 mb-4">Destination for hassle free bookings.</h1>
                            <p class="mb-4"> We're dedicated to providing seamless booking experiences for water enthusiasts worldwide.</p>
                                <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> prioritize users by offering a booking process that focuses on individual seat reservations</p>
                                <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> ensures customer satisfaction by providing a user-friendly interface for hassle-free bookings</p>
                                <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> maintain's rigorous standards ensuring a secure and enjoyable experience for all passengers</p>
                            </div>
                            <a href="#" class="btn btn-primary rounded-pill text-white py-3 px-5">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
         <!-- Feature Start -->
         <div class="container-fluid feature py-5">
            <div class="container py-5">
                <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h4 class="sub-title px-3 mb-0">Why Choose Us?</h4>
                    </div>
                    <h1 class="display-3 mb-4">Make Trips organized</h1>
                    <p class="mb-0">Our website is designed with you in mind, so you can quickly find and reserve seats without any hassle. Need help? Our team is available 24/7 to assist you.</p>
                    </div>
                    <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                     <div class="feature-icon mb-4">
                    <!-- Replace the icon with your image -->
                    <div class="p-3 d-inline-flex bg-white rounded">
                    <img src="img/seat.jpeg" alt="Your Image" style="width: 100px; height: auto;">
                    </div>
                    </div>
                      <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-4">Focus on Seat Booking</h5>
                                    <p class="mb-0"> unique aspect of us is to focus on booking individual seats on boats rather than entire boats. .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                     <div class="feature-icon mb-4">
                    <!-- Replace the icon with your image -->
                    <div class="p-3 d-inline-flex bg-white rounded">
                    <img src="img/interface.jpeg" alt="Your Image" style="width: 100px; height: auto;">
                    </div>
                    </div>
                     <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-4">User-Friendly Interface</h5>
                                    <p class="mb-0">customers can easily select seats complete bookings in just a few clicks,</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                     <div class="feature-icon mb-4">
                    <!-- Replace the icon with your image -->
                    <div class="p-3 d-inline-flex bg-white rounded">
                    <img src="img/boats.jpeg" alt="Your Image" style="width: 100px; height: auto;">
                    </div>
                    </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-4">Wide Range of Options</h5>
                                    <p class="mb-0">Highlight the variety of boats and destinations available on your platform. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        
                            <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                     <div class="feature-icon mb-4">
                    <!-- Replace the icon with your image -->
                    <div class="p-3 d-inline-flex bg-white rounded">
                    <img src="img/person.jpeg" alt="Your Image" style="width: 100px; height: auto;">
                    </div>
                    </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-4">Customer Satisfaction</h5>
                                    <p class="mb-0"> Share's reviews from customers to showcase the experiences others have had with the website.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="row-cols-1 feature-item p-4">
                            <div class="col-12">
                           
                     <div class="feature-icon mb-4">
                    <!-- Replace the icon with your image -->
                    <div class="p-3 d-inline-flex bg-white rounded">
                    <img src="img/customer.jpeg" alt="Your Image" style="width: 100px; height: auto;">
                    </div>
                    </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-4">24/7 Customer Support</h5>
                                    <p class="mb-0">reassuring that our customer support team is always ready to assist them around the clock.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                     <div class="feature-icon mb-4">
                    <!-- Replace the icon with your image -->
                    <div class="p-3 d-inline-flex bg-white rounded">
                    <img src="img/enviornment.jpeg" alt="Your Image" style="width: 100px; height: auto;">
                    </div>
                    </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-4">Environmental Response</h5>
                                    <p class="mb-0">efforts to reduce carbon emissions, waste, support marine conservation efforts.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                     <div class="feature-icon mb-4">
                    <!-- Replace the icon with your image -->
                    <div class="p-3 d-inline-flex bg-white rounded">
                    <img src="img/community.jpeg" alt="Your Image" style="width: 100px; height: auto;">
                    </div>
                    </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-4">Community Engagement</h5>
                                    <p class="mb-0">supporting waterfront cleanup efforts, or promoting responsible boating practices</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                     <div class="feature-icon mb-4">
                    <!-- Replace the icon with your image -->
                    <div class="p-3 d-inline-flex bg-white rounded">
                    <img src="img/idea.jpeg" alt="Your Image" style="width: 100px; height: 100px;">
                    </div>
                    </div>
                                <div class="feature-content d-flex flex-column">
                                    <h5 class="mb-4">Future Plans</h5>
                                    <p class="mb-0">by sharing your vision for the future for enhancing existing services </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                        <a href="#" class="btn btn-primary rounded-pill text-white py-3 px-5">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->
        <?php include 'includes/footer.php'; ?>
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