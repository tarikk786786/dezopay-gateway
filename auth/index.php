<?php
include "config.php";
include 'function.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login | DEZOPAY Dashboard</title>
    <link rel="icon" href="https://pay.dezo.in/common/img/logoshild.png">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 & Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { brand: { 400: '#8b84ff', 500: '#6c63ff', 600: '#534bea' }, accent: '#3b82f6' }
                }
            }
        }
    </script>
    
    <!-- Disable DevTools -->
    <script disable-devtool-auto="" src="https://cdn.jsdelivr.net/npm/disable-devtool@0.3.8/disable-devtool.min.js"></script>

    <style>
        body {
            background: #0a0a14;
            color: #fff;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
        }
        
        .login-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            position: relative;
            overflow: hidden;
        }
        .login-section::before {
            content: ''; position: absolute; inset: 0;
            background: radial-gradient(ellipse at 20% 50%, rgba(108,99,255,.25) 0%, transparent 60%),
                        radial-gradient(ellipse at 80% 20%, rgba(59,130,246,.2) 0%, transparent 50%);
        }
        .orb { position: absolute; border-radius: 50%; filter: blur(80px); animation: float 8s ease-in-out infinite; }
        .orb1 { width: 400px; height: 400px; background: rgba(108,99,255,.2); top: -100px; right: -100px; }
        .orb2 { width: 300px; height: 300px; background: rgba(59,130,246,.15); bottom: -50px; left: -50px; animation-delay: 3s; }
        
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-30px); } }
        
        .login-card {
            position: relative; z-index: 10; width: 100%; max-width: 440px; margin: 20px;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px; padding: 48px 40px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.1);
            animation: slideUp 0.8s ease-out;
        }
        @keyframes slideUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
        
        .logo-icon {
            width: 64px; height: 64px; border-radius: 16px; margin: 0 auto 16px;
            display: flex; align-items: center; justify-content: center;
            background: linear-gradient(135deg, #6c63ff, #3b82f6);
            box-shadow: 0 8px 32px rgba(108,99,255,0.4); font-size: 28px;
        }
        
        .form-input {
            width: 100%; padding: 14px 16px; background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1); border-radius: 12px;
            color: #fff; font-size: 14px; transition: all 0.3s; outline: none;
        }
        .form-input:focus {
            border-color: #6c63ff; background: rgba(108,99,255,0.1);
            box-shadow: 0 0 0 3px rgba(108,99,255,0.15);
        }
        .form-input::placeholder { color: rgba(255,255,255,0.3); }
        
        .login-btn {
            width: 100%; padding: 16px; border: none; border-radius: 12px; cursor: pointer;
            background: linear-gradient(135deg, #6c63ff, #3b82f6);
            color: #fff; font-size: 15px; font-weight: 700; letter-spacing: 0.5px;
            transition: all 0.3s; position: relative; overflow: hidden;
        }
        .login-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 40px rgba(108,99,255,0.5); }
        .login-btn:disabled { opacity: 0.7; cursor: not-allowed; transform: none; box-shadow: none; }
        
        .swal2-popup {
            background: #1a1a2e !important;
            border: 1px solid rgba(255,255,255,0.1);
            color: white !important;
            border-radius: 16px !important;
        }
        .swal2-title { color: white !important; }
        .swal2-html-container { color: rgba(255,255,255,0.7) !important; }
    </style>
</head>

<?php
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
                confirmButtonColor: "#6c63ff",
                confirmButtonText: "Ok"
            }).then(() => {
                window.location.href = "index.php";
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
                    confirmButtonColor: "#6c63ff",
                    confirmButtonText: "Ok"
                }).then(() => {
                    window.location.href = "index.php";
                });
                </script>';
                exit;
            }

            echo '<script>Swal.fire({title: "Invalid Password!", text: "Please try again.", icon: "error", confirmButtonColor: "#6c63ff"});</script>';
        }
    } else {
        echo '<script>Swal.fire({title: "Invalid Username!", text: "No account found with this mobile number.", icon: "error", confirmButtonColor: "#6c63ff"});</script>';
    }
}
?>

<body>
    <div class="login-section">
        <div class="orb orb1"></div>
        <div class="orb orb2"></div>
        
        <div class="login-card">
            <div class="text-center mb-8">
                <div class="logo-icon"><i class="fa-solid fa-credit-card"></i></div>
                <div class="text-3xl font-black tracking-widest uppercase mb-1">
                    <span class="text-white">DEZO</span><span class="text-brand-500">PAY</span>
                </div>
                <div class="text-sm text-gray-400">The Future of UPI Payments</div>
            </div>

            <form action="index.php" method="POST" id="loginForm">
                <div class="mb-5">
                    <label class="block text-[13px] font-medium text-gray-400 mb-2">Mobile Number</label>
                    <input type="text" name="username" class="form-input" 
                           placeholder="Enter your 10-digit mobile number" 
                           maxlength="10" pattern="\d{10}" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-[13px] font-medium text-gray-400 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" class="form-input pr-12" 
                               placeholder="••••••••••••" required>
                        <span id="togglePassword" class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-gray-400 hover:text-white transition-colors">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs text-gray-400 mb-6">
                    <label class="flex items-center gap-2 cursor-pointer hover:text-gray-300 transition-colors">
                        <input type="checkbox" required class="w-4 h-4 accent-brand-500 rounded bg-gray-800 border-gray-700">
                        <span>Accept Terms & Conditions</span>
                    </label>
                    <a href="../forgot-password" class="text-brand-400 hover:text-brand-300 font-semibold transition-colors">Forgot Password?</a>
                </div>

                <button type="submit" name="submit" id="loginBtn" class="login-btn mb-6">
                    <span id="btnText"><i class="fa-solid fa-rocket mr-2"></i> Login to DEZOPAY</span>
                    <span id="btnLoader" class="hidden"><i class="fa-solid fa-circle-notch fa-spin mr-2"></i> Authenticating...</span>
                </button>
            </form>

            <div class="text-center text-[13px] text-gray-400">
                New to DEZOPAY? <a href="../Register.php" class="text-brand-400 hover:text-brand-300 font-semibold transition-colors">Create an account</a>
            </div>
            
            <div class="mt-8 flex items-center justify-center gap-2 text-[11px] text-gray-500 font-medium">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Secured with 256-bit SSL encryption</span>
            </div>
        </div>
    </div>

    <script>
        // Password Visibility Toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const pwd = document.getElementById('password');
            const icon = this.querySelector('i');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                pwd.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });

        // Form Submit Loader
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('loginBtn');
            const text = document.getElementById('btnText');
            const loader = document.getElementById('btnLoader');
            
            btn.disabled = true;
            text.classList.add('hidden');
            loader.classList.remove('hidden');
        });
    </script>
</body>
</html>
