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
?><!DOCTYPE html>
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
    <!-- Testimonial Start -->
<div class="container-fluid testimonial py-5 wow zoomInDown" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title mb-5">
            <div class="sub-style">
                <h4 class="sub-title text-white px-3 mb-0">Testimonial</h4>
            </div>
            <h1 class="display-3 mb-4">What Our Users Say</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            <div class="testimonial-item">
                <div class="testimonial-inner p-5">
                    <div class="testimonial-inner-img mb-4">
                        <img src="img/blueprofile.jpeg" class="img-fluid rounded-circle" alt="Vishnu">
                    </div>
                    <p class="text-white fs-7">"Waterway made booking a boat so easy and hassle-free. I highly recommend it to anyone looking for a great boating experience!"</p>
                    <div class="text-center">
                        <h5 class="mb-2">Deepak</h5>
                        <p class="mb-2 text-white-50">Kottayam, India</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-inner p-5">
                    <div class="testimonial-inner-img mb-4">
                        <img src="img/blueprofile.jpeg" class="img-fluid rounded-circle" alt="Midhun">
                    </div>
                    <p class="text-white fs-7">"Waterway provided me with an unforgettable boating experience. Their service is top-notch and the staff are very friendly and helpful!"</p>
                    <div class="text-center">
                        <h5 class="mb-2">Ben</h5>
                        <p class="mb-2 text-white-50">Kochi, India</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-inner p-5">
                    <div class="testimonial-inner-img mb-4">
                        <img src="img/blueprofile.jpeg" class="img-fluid rounded-circle" alt="Ben">
                    </div>
                    <p class="text-white fs-7">"I had a fantastic time booking with Waterway. The process was smooth and the boats were in excellent condition. I'll definitely be using their service again!"</p>
                    <div class="text-center">
                        <h5 class="mb-2">Kevin</h5>
                        <p class="mb-2 text-white-50">Kochi ,India</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


       <!-- Blog Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Our Blog</h4>
            </div>
            <h1 class="display-3 mb-4">Stay Updated with Waterway News</h1>
            <p class="mb-0">Explore our latest articles and stay informed about the latest updates, tips, and insights about boating and travel.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-item rounded">
                    <div class="blog-img">
                        <img src="img/boat4.jpeg" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="blog-centent p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> 15 May 2024</p>
                            <a href="#" class="text-muted"><span class="fa fa-comments text-primary"></span> 5 Comments</a>
                        </div>
                        <a href="#" class="h4">Exploring Kerala's Backwaters: A Must-Do Experience</a>
                        <p class="my-4">Discover the charm and beauty of Kerala's backwaters through this insightful article.</p>
                        <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-1">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="blog-item rounded">
                    <div class="blog-img">
                        <img src="img/blog2.png" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="blog-centent p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> 20 April 2024</p>
                            <a href="#" class="text-muted"><span class="fa fa-comments text-primary"></span> 8 Comments</a>
                        </div>
                        <a href="#" class="h4">Tips for Safe and Enjoyable Boat Trips</a>
                        <p class="my-4">Ensure your boat trips are both safe and enjoyable with these essential tips.</p>
                        <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-1">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="blog-item rounded">
                    <div class="blog-img">
                        <img src="img/blog1.png" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="blog-centent p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> 10 March 2024</p>
                            <a href="#" class="text-muted"><span class="fa fa-comments text-primary"></span> 12 Comments</a>
                        </div>
                        <a href="#" class="h4">Discovering Hidden Gems: Offbeat Boating Destinations</a>
                        <p class="my-4">Uncover lesser-known boating destinations that offer unique experiences and tranquility.</p>
                        <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-1">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

        <?php include 'includes/footer.php' ?>

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