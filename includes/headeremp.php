<?php
// Start session

// Initialize $emp_data to an empty array
$emp_data = [];

// Check if emp is logged in
if (isset($_SESSION['emp_id'])) {
    // emp is logged in, fetch emp data
    $emp_id = $_SESSION['emp_id'];
    
    // Fetch emp data from the database
    // Include your database connection file
    include_once "db_connection.php";

    // Prepare and execute query to fetch emp data
    $sql_emp = "SELECT * FROM boatend WHERE empid = ?";
    $stmt_emp = $conn->prepare($sql_emp);
    $stmt_emp->bind_param("i", $emp_id);
    $stmt_emp->execute();
    $result_emp = $stmt_emp->get_result();

    // Check if emp data exists
    if ($result_emp->num_rows > 0) {
        // emp data found, fetch and assign to $emp_data
        $emp_data = $result_emp->fetch_assoc();
    }
}
function getCurrentPage() {
    return basename($_SERVER['PHP_SELF']);
}

$current_page = getCurrentPage();
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
    
    <!-- CSS Styles for Sidebar -->
    <style>
        /* Sidebar */
        #sidebar {
            height: 100%;
            width: 250px; /* Initial width */
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden */
            z-index: 1000;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        #sidebar .sidebar-content {
            padding: 16px;
            color: white;
        }

        /* Profile icon button */
        #logo {
            font-size: 16px;
            border: none;
            cursor: pointer;
            background-color: transparent;
            color: white;
            margin-right: 20px;
        }

        /* Close button inside the sidebar */
        #sidebar .close-btn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            cursor: pointer;
        }
        
        a.linker{
            color:white;
            text:bold;
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
            <div class="row gx-0 align-items-center" style="height: 45px;">
                <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <a href="#" class="text-light me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Kerala</a>
                        <a href="#" class="text-light me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+91 9497384572</a>
                        <a href="#" class="text-light me-0"><i class="fas fa-envelope text-primary me-2"></i>enquiriesdeepak@gmail.com</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-light btn-square border rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->
<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
       
            <?php if (!empty($emp_data)) : ?>
                    <div id="logo" class="d-flex align-items-center" style="color: white;">
                        <img src="img/blueicon.jpg" alt="emp Profile Icon" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                        <h5><?php echo $emp_data['empname']; ?></h5>
                    </div>
                <?php endif; ?>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="userhome.php" class="navbar-brand p-0">
        <div class="d-flex flex-grow-1 justify-content-end align-items-center pe-5">
            <h3 class="text-primary m-0"></i>Waterway</h3>
            </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                    <?php if (isset($_SESSION['emp_id'])) : ?>
                                <a href="empdashboard.php" class="nav-item nav-link <?php echo $current_page == 'empdashboard.php' ? 'active' : ''; ?>">Home&nbsp;&nbsp;</a>
                                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle <?php echo in_array($current_page, ['boatendbooking.php','boatendprice.php']) ? 'active' : ''; ?>" data-bs-toggle="dropdown">Manage</a>
                        <div class="dropdown-menu m-0">
                                <a href="boatendbooking.php" class="dropdown-item">Bookings</a>
                                <a href="boatendprice.php" class="dropdown-item" >Prices</a>
                    </div>
                    </div>
                    </div>
                    
                    <a href="logout_emp.php" class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Logout</a>&nbsp;&nbsp;
                <?php else : ?>
                    <a href="loginboatendhtml.php" class= "btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Login</a>&nbsp;&nbsp;
                <?php endif; ?>
           
        </div>
    </nav>
</div>
        
        <!-- Sidebar -->
        <?php if (!empty($emp_data)) : ?>
            <div id="sidebar">
                <img src="img/blueicon.jpg" alt="emp Profile Icon" style="width: 70px; height: 70px; border-radius: 50%;">
                <div class="sidebar-content">
                    <span class="close-btn" onclick="closeNav()">&times;</span>
                    <h2>emp Profile</h2>
                    <p>Welcome, <?php echo $emp_data['empname']; ?>!</p>
                    <ul class="menu">
                    <li>&nbsp;<a class="linker"  href="empdashboard.php">Home</a></li>
                                <li>&nbsp;<a class="linker" href="loginboatendhtml.php" >emp</a></li>
                                 <!-- If emp is Logged In -->
                                 <li>&nbsp;<a class="linker" href="logout_emp.php" class="drop-text">Logout</a></li>
                                
                    
                    </ul>
                </div>
            </div>
            <!-- //Sidebar -->
        <?php endif; ?>
                                </div>
        <!-- main content -->
        <div class="content">
            <!-- Your main content goes here -->
        </div>
        <!-- //main content -->
        </div>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- JavaScript for Sidebar -->
    <script>
        // Function to open the sidebar
        function openNav() {
            document.getElementById("sidebar").style.left = "0";
        }

        // Function to close the sidebar
        function closeNav() {
            document.getElementById("sidebar").style.left = "-250px";
        }

        // Add event listener to profile icon button
        document.getElementById("logo").addEventListener("click", function() {
            openNav();
        });
    </script>
</body>

</html>
