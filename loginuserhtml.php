<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Login form styling */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            box-sizing: border-box;
        }

        .login-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form input,
        .login-form button {
            border-radius: 10px;
        }

        .sign-in-option {
            font-size: 14px;
        }

        .d-flex {
            display: flex;
        }

        .flex-grow-1 {
            flex-grow: 1;
        }
    </style>
</head>

<body>
    <?php include 'topbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh;">
            <div class="col-md-4">
                <div class="d-flex flex-grow-1 justify-content-center align-items-center pe-5">
                    <h3 class="text-primary m-0">Waterway</h3>
                </div><br>
                <div class="login-form">
                    <div class="text-end mt-3">
                        <a href="loginboatendhtml.php">Employee</a>
                        <br>
                        <a href="loginadminhtml.php">Admin</a>
                    </div>
                    <form novalidate class="was-validated" action="loginuser.php" method="post">
                        <h3 class="text-center">Login</h3><br>
                        <?php
                           // session_start();
                            if(isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])) {
                                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['login_error'] . '</div>';
                                unset($_SESSION['login_error']);
                            }
                        ?>
                        <div class="form-floating mb-3">
                            <input type="email" id="email" class="form-control" placeholder=" " name="email" required>
                            <label for="email">Email</label>
                            <div class="invalid-feedback">Invalid Email and Paassword</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" id="password" class="form-control" placeholder=" " name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <button type="submit" id="submitBtn" class="btn btn-outline-secondary btn-block" disabled>Submit</button>
                        <div class="sign-in-option text-center mt-3">Don't have an account? <a href="signupuserhtml.php">Sign up</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="loginuser.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
