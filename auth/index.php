<?php
include "config.php";
include 'function.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="common/assets/" data-template="vertical-menu-template" data-style="light">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<link rel="icon" href="https://pay.dezo.in/common/img/logoshild.png">
<title><?php echo $site_settings['brand_name']; ?> | Login</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="../common/assets/vendor/css/pages/page-auth.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script disable-devtool-auto="" src="https://cdn.jsdelivr.net/npm/disable-devtool@0.3.8/disable-devtool.min.js" data-url="https://www.google.com/"></script>
</head>

<?php
session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE mobile = '$username'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);

    if (mysqli_num_rows($run) > 0) {
        $hashFromDatabase = $row['password'];
        $acc_lock = $row['acc_lock'];
        $acc_ban = $row['acc_ban'];
        $byteuserid = $row['id'];

        if ($acc_ban == 'on') {
            echo '
            <script>
            Swal.fire({
                title: "Account Locked!",
                text: "Please contact the administrator.",
                icon: "error",
                confirmButtonText: "Ok"
            }).then(() => {
                window.location.href = "index";
            });
            </script>';
            exit;
        }

        if (password_verify($password, $hashFromDatabase)) {
            // Reset failed attempts on successful login
            $query = "UPDATE users SET acc_lock = 0 WHERE mobile = '$username'";
            mysqli_query($conn, $query);

            // Set complete session
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $byteuserid;
            $token = bin2hex(random_bytes(32));
            $_SESSION['login_token'] = $token;
            $_SESSION['login_complete'] = true;
            mysqli_query($conn, "UPDATE users SET login_token='$token' WHERE mobile='$username'");

            echo '<script>window.location.href = "dashboard";</script>';
            exit;

        } else {
            // Increment failed attempts
            $acc_lock++;
            $query = "UPDATE users SET acc_lock = $acc_lock WHERE mobile = '$username'";
            mysqli_query($conn, $query);

            if ($acc_lock >= 3) {
                echo '
                <script>
                Swal.fire({
                    title: "Account Locked!",
                    text: "Too many failed login attempts. Please contact the administrator.",
                    icon: "error",
                    confirmButtonText: "Ok"
                }).then(() => {
                    window.location.href = "index";
                });
                </script>';
                exit;
            }

            echo '<script>Swal.fire("Invalid Password!", "Please try again.", "error");</script>';
        }
    } else {
        echo '<script>Swal.fire("Invalid Username!", "No account found with this mobile number.", "error");</script>';
    }
}
?>

<body>
    <div class="auth-container">
        <div class="auth-image">
            <div class="left-logo">
            <img src="" alt="">
            </div>
        </div>

        <div class="auth-form">
            <div class="reg-form-div">
                <img src="<?php echo $site_settings['logo_url']; ?>" alt="Logo" class="logo img-fluid">
                <h4 class="mb-1">Login <?php echo $site_settings['brand_name']; ?> 🚀</h4>
                <p class="mb-5">Start Your Journey To Advanced Payments!</p>
                <div id="toast-container" class="toast-container"></div>

                <form id="formAuthentication" class="mb-3" action="index.php" method="POST">
                    <div class="mb-1">
                        <label for="mobileNumber" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobileNumber" name="username" 
                               placeholder="Enter your 10-digit mobile number" maxlength="10" 
                               pattern="\d{10}" title="Please enter a valid 10-digit mobile number" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" 
                                   placeholder="••••••••••••" aria-describedby="password" required>
                            <span class="input-group-text cursor-pointer" id="togglePassword">
                                <i class="ri-eye-off-line"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between flex-wrap">
                        <div class="form-check mb-0">
                            <label class="form-check-label me-2" for="remember-me">
                                <input type="checkbox" id="remember-me" required>
                                Accept <a href="../tc">Terms & Conditions</a>
                            </label>
                            <a href="../forgot-password"> Forgot Password</a>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100" type="submit" id="loginBtn" name="submit">Login</button>
                </form>

                <p class="text-center">
                    New on our platform? <a href="../Register" class="text-primary">Create an account</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Login Button Spinner
        document.getElementById('loginBtn').addEventListener('click', function(event) {
            this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';
            this.form.submit();
            this.disabled = true;
        });

        // Password Toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.replace('ri-eye-off-line', 'ri-eye-line');
            } else {
                password.type = 'password';
                icon.classList.replace('ri-eye-line', 'ri-eye-off-line');
            }
        });
    </script>
</body>
</html>
