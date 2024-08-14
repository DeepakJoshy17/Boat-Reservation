<?php
//session_start();
// Include database connection
include_once "db_connection.php";
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
    <?php include "includes/header.php";?>
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
                <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="userbooking.php">Book Tickets</a>
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
                <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="userbooking.php">Book Seats</a>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->
        </div>
        <!-- Navbar & Hero End -->


         <!-- Services Start -->
<!--<div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="sub-style">
                        <h4 class="sub-title px-3 mb-0">What We Offer</h4>
                    </div>
                    <h1 class="display-3 mb-4">Our Service Given to Public</h1>
                    <p class="mb-0">Sail through Kerala's mesmerizing destinations with just a click on Waterway!" Embark on a journey of discovery in God's Own Country, with Waterway as your guide!</p>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                                <img src="img/publictransportation.jpeg" class="img-fluid rounded-top w-100" alt="">
                           </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">Public Transportation</h5>
                                    <p class="mb-4">for residents within different areas, such as islands, waterfront districts communities.</p>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                                <img src="img/location(3).jpeg" class="img-fluid rounded-top w-100" alt="">
                           </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">Heart Locations</h5>
                                    <p class="mb-4">routes for various locations, including urban centers, islands, or tourist destinations</p>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                                <img src="img/acessibility.jpeg" class="img-fluid rounded-top w-100" alt="">
                           </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">Accessibility Services</h5>
                                    <p class="mb-4">facilities for passengers to select designated seating areas, and assistance services.</p>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                                <img src="img/ticket.jpeg" class="img-fluid rounded-top w-100" alt="">
                           </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">Ticketing and Fare </h5>
                                    <p class="mb-4">payment options such UPI, and ensuring fare transparency and affordability for passengers.</p>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                                <img src="img/info(1)(1).jpeg" class="img-fluid rounded-top w-100" alt="">
                           </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">Schedule Information</h5>
                                    <p class="mb-4"> allowing passengers to plan their journeys and stay informed about service changes or disruptions.</p>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                                <img src="img/support1(2).jpeg" class="img-fluid rounded-top w-100" alt="">
                           </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">Customer Service Support</h5>
                                    <p class="mb-4"> Including helplines, email support, or in-person assistance  to address inquiries, </p>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                                <img src="img/feedus.jpeg" class="img-fluid rounded-top w-100" alt="">
                           </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">Feed us option</h5>
                                    <p class="mb-4"> providing valuable insights for future customers and enhancing trust and transparency.</p>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                                <img src="img/Social Media1(1).jpeg" class="img-fluid rounded-top w-100" alt="">
                           </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">Social Media Intergration</h5>
                                    <p class="mb-4"> allowing users to share their experiences, reviews, and photos on social media platforms</p>
                                    <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                        <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Services More</a>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Services End -->


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


           <!-- Book Appointment Start -->
   <div class="container-fluid appointment py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2">
                        <div class="section-title text-start">
                            <h4 class="sub-title pe-3 mb-0">Feed Us with Opinions</h4>
                            <h1 class="display-4 mb-4">Your valuable insights enhance us</h1>
                            <p class="mb-4">Encourage users to leave feedback and reviews of their experience, providing valuable insights for future customers and enhancing trust and transparency.</p>
                            <div class="row g-4">
                                <div class="col-sm-6">
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-4">
                                            <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i>you are the future</h5>
                                            <p class="mb-0">By sharing your opinions, you're not only helping other users make informed decisions but also shaping the future of our platform.</p>
                                        </div>
                                        <div class="mb-4">
                                            <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i> your voice is valued</h5>
                                            <p class="mb-0">Our review moderation ensures that all content meets our community guidelines, ensuring credibility and authenticity.</p>
                                        </div>
                                        <div class="text-start mb-4">
                                            <a href="#" class="btn btn-primary rounded-pill text-white py-3 px-5">More Details</a>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-sm-6">
                                    <div class="video h-100">
                                        <img src="img/video-img.jpg" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                        <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                            <span></span>
                                        </button>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="appointment-form rounded p-5">
                            <p class="fs-4 text-uppercase text-primary">Get In Touch</p>
                            <h1 class="display-5 mb-4">Leave Your opinions</h1>
                            <form>
                                <div class="row gy-3 gx-4">
                                    <div class="col-xl-6">
                                        <input type="text" class="form-control py-3 border-primary bg-transparent text-white" placeholder="First Name">
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="email" class="form-control py-3 border-primary bg-transparent text-white" placeholder="Email">
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="phone" class="form-control py-3 border-primary bg-transparent" placeholder="Phone">
                                    </div>
                                    <div class="col-xl-6">
                                        <select class="form-select py-3 border-primary bg-transparent" aria-label="Default select example">
                                            <option selected>Your Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">FeMale</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="date" class="form-control py-3 border-primary bg-transparent">
                                    </div><!--
                                    <div class="col-xl-6">
                                        <select class="form-select py-3 border-primary bg-transparent" aria-label="Default select example">
                                            <option selected>Department</option>
                                            <option value="1">Physiotherapy</option>
                                            <option value="2">Physical Helth</option>
                                            <option value="2">Treatments</option>
                                        </select>
                                    </div>-->
                                    <div class="col-12">
                                        <textarea class="form-control border-primary bg-transparent text-white" name="text" id="area-text" cols="30" rows="5" placeholder="Write Comments"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary text-white w-100 py-3 px-5">ENLIGHT US</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Video -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Book Appointment End -->

              <!-- Team Start -->
<!--<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Meet our team</h4>
            </div>
            <h1 class="display-3 mb-4">Our Experts</h1>
            <p class="mb-0">Our team of dedicated professionals is committed to providing you with the best boat booking experience. With expertise in customer service, marketing, and boat maintenance, we ensure your journey with Waterway is smooth sailing all the way.!</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <div class="team-img rounded-top h-100">
                        <img src="img/person2(1).jpeg" class="img-fluid rounded-top w-100" alt="">
                        <div class="team-icon d-flex justify-content-center">
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="team-content text-center border border-primary border-top-0 rounded-bottom p-4">
                        <h5>John Doe</h5>
                        <p class="mb-0">Boat Booking Specialist</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded">
                    <div class="team-img rounded-top h-100">
                        <img src="img/person1(1).jpeg" class="img-fluid rounded-top w-100" alt="">
                        <div class="team-icon d-flex justify-content-center">
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="team-content text-center border border-primary border-top-0 rounded-bottom p-4">
                        <h5>Jane Smith</h5>
                        <p class="mb-0">Customer Support Specialist</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded">
                    <div class="team-img rounded-top h-100">
                        <img src="img/person5(1).jpeg" class="img-fluid rounded-top w-100" alt="">
                        <div class="team-icon d-flex justify-content-center">
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="team-content text-center border border-primary border-top-0 rounded-bottom p-4">
                        <h5>Emily Johnson</h5>
                        <p class="mb-0">Marketing Manager</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item rounded">
                    <div class="team-img rounded-top h-100">
                        <img src="img/person4.jpeg" class="img-fluid rounded-top w-100" alt="">
                        <div class="team-icon d-flex justify-content-center">
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="team-content text-center border border-primary border-top-0 rounded-bottom p-4">
                        <h5>Michael Brown</h5>
                        <p class="mb-0">Boat Maintenance Supervisor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- Team End --> 
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