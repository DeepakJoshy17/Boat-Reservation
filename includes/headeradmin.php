<?php
// Start session
// Check if a session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize $admin_data to an empty array
$admin_data = [];

// Check if admin is logged in
if (isset($_SESSION['admin_id'])) {
    // Admin is logged in, fetch admin data
    $admin_id = $_SESSION['admin_id'];
    
    // Fetch admin data from the database
    // Include your database connection file
    include_once "db_connection.php";

    // Prepare and execute query to fetch admin data
    $sql_admin = "SELECT * FROM Users WHERE user_id = ? AND role = 'Admin'";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("i", $admin_id);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    // Check if admin data exists
    if ($result_admin->num_rows > 0) {
        // Admin data found, fetch and assign to $admin_data
        $admin_data = $result_admin->fetch_assoc();
    } else {
        // Admin not found, redirect to login page
        header("Location: loginadminhtml.php");
        exit();
    }

    $stmt_admin->close();
} else {
    // Admin not logged in, redirect to login page
    header("Location: loginadminhtml.php");
    exit();
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
       
            <?php if (!empty($admin_data)) : ?>
                    <div id="logo" class="d-flex align-items-center" style="color: white;">
                        <img src="img/blueicon.jpg" alt="User Profile Icon" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                        <h5><?php echo $admin_data['name']; ?></h5>
                    </div>
                <?php endif; ?>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="userhome.php" class="navbar-brand p-0">
        <div class="d-flex flex-grow-1 justify-content-end align-items-center pe-5">
            <h3 class="text-primary m-0"><Waterway</h3>
            </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                    <?php if (isset($_SESSION['admin_id'])) : ?>
                                <a href="admindashboard.php" class="nav-item nav-link <?php echo $current_page == 'admindashboard.php' ? 'active' : ''; ?>">Home&nbsp;&nbsp;</a>
                                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle <?php echo in_array($current_page, ['adminroute.php', 'adminboat.php', 'adminprice.php', 'adminseats.php','adminseatavailability.php']) ? 'active' : ''; ?>" data-bs-toggle="dropdown">Manage</a>
                        <div class="dropdown-menu m-0">
                        <a href="manage_boats.php" class="dropdown-item">Boats</a>
                        <a href="manage_routes.php" class="dropdown-item">Routes</a>
                                <a href="manage_stops.php" class="dropdown-item">Stops</a>
                                <a href="manage_schedules.php" class="dropdown-item">Schedule</a>
                                <a href="view_logs.php" class="dropdown-item">Logs</a>
                                <a href="admin_seat_management.php" class="dropdown-item">Seats</a>

                    </div>
                    </div>
                    </div>
                    
                    <a href="logout_admin.php" class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Logout</a>&nbsp;&nbsp;
                <?php else : ?>
                    <a href="loginadminhtml.php" class= "btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Login</a>&nbsp;&nbsp;
                <?php endif; ?>
            <a href="adminseats.php" class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">&nbsp;Seats&nbsp;</a>
        </div>
    </nav>
</div>
        
        <!-- Sidebar -->
        <?php if (!empty($admin_data)) : ?>
            <div id="sidebar">
                <img src="img/blueicon.jpg" alt="User Profile Icon" style="width: 70px; height: 70px; border-radius: 50%;">
                <div class="sidebar-content">
                    <span class="close-btn" onclick="closeNav()">&times;</span>
                    <h2>User Profile</h2>
                    <p>Welcome, <?php echo $admin_data['name']; ?>!</p>
                    <ul class="menu">
                    <li>&nbsp;<a class="linker"  href="admindashboard.php">Home</a></li>
                                <li>&nbsp;<a class="linker" href="loginuserhtml.php" >User</a></li>
                                 <!-- If User is Logged In -->
                                 <li>&nbsp;<a class="linker" href="logout_user.php" class="drop-text">Logout</a></li>
                                
                    
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
    <br><br><br><br>
</body>

</html>
