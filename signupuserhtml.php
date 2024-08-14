<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            box-sizing: border-box;
        }
        .signup-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .signup-form form {
            width: 100%;
        }
        .signup-form input,
        .signup-form select {
            border-radius: 10px;
        }
        .signup-form button {
            border-radius: 10px;
            margin-top: 10px;
        }
        .container {
            height: 100%;
        }
    </style>
</head>
<?php include 'topbar.php'; ?>
<body>
    <br><br><br><br>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh;">
            <div class="col-md-4">
                <div class="d-flex flex-grow-1 justify-content-center align-items-center pe-5">
                    <h3 class="text-primary m-0">Waterway</h3>
                </div><br>
                <div class="signup-form">
                    <form id="signup-form" action="signupuser.php" method="post" novalidate>
                        <h3 class="text-center">Sign Up</h3><br>
                        <?php
                            // Display signup error message, if any
                            if (isset($_SESSION['signup_error']) && !empty($_SESSION['signup_error'])) {
                                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['signup_error'] . '</div>';
                                unset($_SESSION['signup_error']);
                            }
                        ?>
                        <div class="form-floating mb-3">
                            <input type="text" id="name" name="name" class="form-control" placeholder=" " required>
                            <label for="name">Full Name</label>
                            <div class="invalid-feedback">Please enter your full name.</div>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="email" id="email" name="email" class="form-control" placeholder=" " required>
                            <label for="email">Email</label>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="tel" id="phoneNumber" name="phone_number" class="form-control" placeholder=" " required>
                            <label for="phoneNumber">Phone Number</label>
                            <div class="invalid-feedback">Please enter a valid phone number.</div>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" id="address" name="address" class="form-control" placeholder=" " required>
                            <label for="address">Address</label>
                            <div class="invalid-feedback">Please enter your address.</div>
                        </div>
                        <div class="mb-3 form-floating">
                            <select id="role" name="role" class="form-select" required>
                                <option value="" disabled selected>Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                            <label for="role">Role</label>
                            <div class="invalid-feedback">Please select a role.</div>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
                            <label for="password">Password</label>
                            <div class="invalid-feedback">Please enter a password.</div>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" id="confirmPassword" class="form-control" placeholder=" " required>
                            <label for="confirmPassword">Confirm Password</label>
                            <div class="invalid-feedback">Please confirm your password.</div>
                        </div>
                        <button type="submit" id="submitBtn" class="btn btn-outline-secondary" disabled>Sign Up</button>
                        <button type="reset" class="btn btn-outline-secondary ms-2">Reset</button>
                    </form>
                    <!-- Option to go to login page -->
                    <div class="text-end mt-3">
                        <a href="loginuserhtml.php">Already have an account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55ND..."></script>
    <script src="signupuser.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>
