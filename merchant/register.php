<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEZOPAY - Merchant Partner Onboarding</title>
    
    <!-- Favicons -->
    <link href="<?= $site_url ?>/newassets/images/favicon.png" rel="icon">
    <link href="<?= $site_url ?>/newassets/images/favicon.png" rel="apple-touch-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --bg-main: #050505;
            --bg-secondary: #0E0E0E;
            --card-bg: #121212;
            --primary: #D4AF37;
            --primary-soft: #F5D76E;
            --primary-dark: #AA7C11;
            --accent: #FFFFFF;
            --text-main: #F8F8F8;
            --text-secondary: #BDBDBD;
            --border: rgba(255, 255, 255, 0.08);
            --success: #19C37D;
            --danger: #FF4D4F;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-main) !important;
            color: var(--text-main);
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 10% 30%, rgba(212,175,55,.05) 0%, transparent 60%),
                        radial-gradient(ellipse at 90% 80%, rgba(255,255,255,.02) 0%, transparent 50%);
            z-index: -1;
            pointer-events: none;
        }
        
        a {
            text-decoration: none !important;
            color: var(--primary);
            transition: color 0.2s ease;
        }
        
        a:hover {
            color: var(--primary-soft);
        }
        
        .card {
            background: rgba(18, 18, 18, 0.65) !important;
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid var(--border) !important;
            border-radius: 24px !important;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.8) !important;
            overflow: hidden;
            transition: border-color 0.4s ease;
        }
        .card:hover {
            border-color: rgba(212, 175, 55, 0.2) !important;
        }
        
        .register-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .register-heading {
            color: var(--accent);
            font-weight: 800;
            letter-spacing: -0.5px;
            font-size: 28px;
        }
        .register-heading span {
            background: linear-gradient(135deg, var(--primary), var(--primary-soft));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .form-label {
            font-weight: 600;
            font-size: 12px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }
        
        .form-control {
            height: 48px;
            background-color: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid var(--border) !important;
            border-radius: 12px !important;
            color: var(--text-main) !important;
            font-size: 14px;
            padding: 10px 16px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }
        
        .form-control:focus {
            background-color: rgba(212, 175, 55, 0.03) !important;
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15) !important;
            outline: none;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            border: none !important;
            padding: 14px !important;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 0.8px;
            color: #050505 !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.15) !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(212, 175, 55, 0.35) !important;
            background: linear-gradient(135deg, var(--primary-soft), var(--primary)) !important;
        }
        
        .footer-text {
            font-size: 11px;
            color: var(--text-secondary);
            text-align: justify;
            line-height: 1.6;
            border-top: 1px solid var(--border);
            padding-top: 18px;
        }
        
        /* Compliance Disclaimer Modal */
        .disclaimer-modal .modal-content {
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.8);
            color: var(--text-main);
        }
        
        .disclaimer-modal .modal-header {
            border-bottom: 1px solid var(--border);
            background: rgba(212,175,55,0.03);
            padding: 20px 24px;
        }
        
        .disclaimer-modal .modal-title {
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            letter-spacing: 0.5px;
        }
        
        .disclaimer-modal .modal-body {
            padding: 24px;
            font-size: 14px;
            line-height: 1.6;
            color: var(--text-secondary);
        }
        
        .disclaimer-modal .modal-body p {
            margin-bottom: 14px;
        }
        
        .disclaimer-modal .modal-body ul {
            padding-left: 20px;
            margin-bottom: 16px;
        }
        
        .disclaimer-modal .modal-body li {
            margin-bottom: 8px;
        }
        
        .disclaimer-modal .modal-footer {
            border-top: 1px solid var(--border);
            padding: 16px 24px;
        }
        
        /* ─── LIVE DASHBOARD MOCKUP ─── */
        .dashboard-mockup {
            background: rgba(10, 10, 10, 0.4);
            border-radius: 20px;
            padding: 28px;
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
            width: 100%;
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 14px;
        }
        
        .dashboard-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 1px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .status-dot {
            width: 8px;
            height: 8px;
            background-color: var(--success);
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 10px var(--success);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(25, 195, 125, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(25, 195, 125, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(25, 195, 125, 0); }
        }
        
        .stat-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
        }
        
        .stat-label {
            font-size: 11px;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: 800;
            color: var(--accent);
            letter-spacing: -0.5px;
        }
        
        .stat-change {
            font-size: 12px;
            color: var(--success);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 4px;
        }
        
        .feed-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .feed-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 12px;
            transition: all 0.3s;
        }
        .feed-item:hover {
            background: rgba(212,175,55,0.02);
            border-color: rgba(212,175,55,0.1);
        }
        
        .feed-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .feed-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: rgba(25, 195, 125, 0.1);
            color: var(--success);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }
        
        .feed-info {
            display: flex;
            flex-direction: column;
        }
        
        .feed-tx {
            font-weight: 600;
            color: var(--accent);
        }
        
        .feed-time {
            font-size: 10px;
            color: var(--text-secondary);
            margin-top: 2px;
        }
        
        .feed-right {
            text-align: right;
            font-weight: 700;
            color: var(--accent);
        }
        
        .activation-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(212, 175, 55, 0.1);
            color: var(--primary);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }
        
        @media (max-width: 991px) {
            .register-img-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Audio Element -->
    <audio id="loginSound" src="<?= $site_url ?>/Voice/Register.mp3" preload="auto"></audio>

    <script>
        window.onload = function() {
            if (!sessionStorage.getItem("soundPlayed")) {
                var sound = document.getElementById("loginSound");
                sound.play().catch(e => console.log("Audio play failed:", e));
                sessionStorage.setItem("soundPlayed", "true");
            }
        };
    </script>

    <!-- Compliance Disclaimer Modal -->
    <div class="modal fade disclaimer-modal" id="disclaimer" tabindex="-1" aria-labelledby="Disclaimer" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-shield-halved"></i> Compliance &amp; Operational Agreement</h5>
                </div>
                <div class="modal-body">
                    <p>DEZOPAY provides high-performance dynamic routing APIs and payment orchestration layers for corporate entities and merchants.</p>
                    <p>By proceeding with merchant onboarding, you explicitly acknowledge and agree to the following operational parameters:</p>
                    <ul>
                        <li><strong>Dynamic QR Routing:</strong> We supply a secure routing API layer to generate dynamic UPI QR codes and track webhook delivery signals.</li>
                        <li><strong>Fund Settlement:</strong> DEZOPAY is a technology platform and does not settle, hold, or store user funds directly. All transaction settlements are processed directly by certified NPCI acquiring bank networks to your configured VPA.</li>
                        <li><strong>Compliance Policy:</strong> You warrant that your business acts in absolute compliance with NPCI directives, Prevention of Money Laundering Act (PMLA) norms, and general Indian financial guidelines.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary px-4 text-white border-secondary" style="border-radius: 8px;" onclick="window.location.href='<?= $site_url ?>'">Decline</button>
                    <button type="button" class="btn btn-primary px-4" style="background: var(--primary) !important; color: #050505 !important; border-radius: 8px;" data-bs-dismiss="modal">Accept &amp; Continue</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="register-container">
            <div class="card">
                <div class="row g-0">
                    <!-- Left Column (Dashboard Mockup) -->
                    <div class="col-lg-6 register-img-container d-flex align-items-center">
                        <div class="p-5 w-100">
                            <div class="mb-4">
                                <div class="activation-badge"><i class="fa-solid fa-bolt"></i> Instant Sandbox Enabled</div>
                                <h3 class="mt-3 text-white font-weight-bold" style="font-size: 26px;">The Enterprise Route to Seamless UPI</h3>
                                <p class="text-muted" style="font-size: 14px; line-height: 1.6;">Onboard now to orchestrate dynamic bank-grade UPI payments with 0% transaction fees and real-time webhook signaling.</p>
                            </div>
                            
                            <!-- Premium Mock Dashboard -->
                            <div class="dashboard-mockup">
                                <div class="dashboard-header">
                                    <div class="dashboard-title">
                                        <i class="fa-solid fa-circle-nodes"></i> DEZOPAY Live Gateway Engine
                                    </div>
                                    <div>
                                        <span class="status-dot"></span>
                                        <span style="font-size: 11px; color: var(--success); font-weight: 600; margin-left: 4px;">SYSTEM OPERATIONAL</span>
                                    </div>
                                </div>
                                
                                <div class="stat-card">
                                    <div class="stat-label">Processed Today (Dynamic Settlement)</div>
                                    <div class="stat-value">₹3,48,920.00</div>
                                    <div class="stat-change">
                                        <i class="fa-solid fa-arrow-trend-up"></i> +18.4% volume increase (24h)
                                    </div>
                                </div>
                                
                                <div class="stat-label mb-2">Live Webhook Stream</div>
                                <div class="feed-container">
                                    <div class="feed-item">
                                        <div class="feed-left">
                                            <div class="feed-icon"><i class="fa-solid fa-check"></i></div>
                                            <div class="feed-info">
                                                <span class="feed-tx">TXID_DEZO8923012</span>
                                                <span class="feed-time">Dynamic QR Generated</span>
                                            </div>
                                        </div>
                                        <div class="feed-right">₹12,500.00</div>
                                    </div>
                                    <div class="feed-item">
                                        <div class="feed-left">
                                            <div class="feed-icon"><i class="fa-solid fa-check"></i></div>
                                            <div class="feed-info">
                                                <span class="feed-tx">TXID_DEZO8923011</span>
                                                <span class="feed-time">Webhook Dispatched</span>
                                            </div>
                                        </div>
                                        <div class="feed-right">₹4,850.00</div>
                                    </div>
                                    <div class="feed-item">
                                        <div class="feed-left">
                                            <div class="feed-icon" style="color: var(--primary); background: rgba(212,175,55,0.1);"><i class="fa-solid fa-rotate"></i></div>
                                            <div class="feed-info">
                                                <span class="feed-tx">TXID_DEZO8923010</span>
                                                <span class="feed-time">Callback Listen Active</span>
                                            </div>
                                        </div>
                                        <div class="feed-right">₹280,000.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column (Form) -->
                    <div class="col-lg-6" style="border-left: 1px solid var(--border);">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <h3 class="register-heading">Merchant Onboarding</h3>
                                <p class="text-muted" style="font-size: 14px;">Establish your premium business portal</p>
                            </div>
                            
                            <?php
                            // include "config.php"; // Moved to top

                            if (isset($_POST['create'])) {
                                $mobile = $_POST['mobile'];
                                $email = $_POST['email'];

                                $checkMobileQuery = "SELECT * FROM `users` WHERE `mobile` = '$mobile'";
                                $checkMobileResult = mysqli_query($conn, $checkMobileQuery);

                                $checkEmailQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
                                $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

                                if (mysqli_num_rows($checkMobileResult) > 0) {
                                    echo '
                                    <script>
                                        Swal.fire({
                                            title: "Mobile Number Exists",
                                            text: "This mobile number is already registered. Please use a different number.",
                                            icon: "error",
                                            confirmButtonText: "OK"
                                        })
                                    </script>';
                                } elseif (mysqli_num_rows($checkEmailResult) > 0) {
                                    echo '
                                    <script>
                                        Swal.fire({
                                            title: "Email Exists",
                                            text: "This email address is already registered. Please use a different email.",
                                            icon: "error",
                                            confirmButtonText: "OK"
                                        })
                                    </script>';
                                } else {
                                    $password = $_POST['password'];
                                    $name = $_POST['name'];
                                    $company = $_POST['company'];
                                    $pin = $_POST['pin'];
                                    $pan = $_POST['pan'];
                                    $aadhaar = $_POST['aadhaar'];
                                    
                                    $checkpan = "SELECT * FROM `users` WHERE `pan` = '$pan'";
                                    $checkpanResult = mysqli_query($conn, $checkpan);

                                    $checkaadhar = "SELECT * FROM `users` WHERE `aadhaar` = '$aadhaar'";
                                    $checkAadharResult = mysqli_query($conn, $checkaadhar);

                                    if (mysqli_num_rows($checkpanResult) > 0) {
                                        echo '
                                        <script>
                                            Swal.fire({
                                                title: "PAN Exists",
                                                text: "This PAN number is already registered. Please use a different PAN.",
                                                icon: "error",
                                                confirmButtonText: "OK"
                                            })
                                        </script>';
                                    } elseif (mysqli_num_rows($checkAadharResult) > 0) {
                                        echo '
                                        <script>
                                            Swal.fire({
                                                title: "Aadhaar Exists",
                                                text: "This Aadhaar number is already registered. Please use a different Aadhaar.",
                                                icon: "error",
                                                confirmButtonText: "OK"
                                            })
                                        </script>';
                                    } else {  
                                        $sponser_id = $_POST['sponser_id'];
                                        $location = $_POST['location'];
                                        $key = md5(rand(00000000, 99999999));
                                        $pass = password_hash($password, PASSWORD_BCRYPT);
                                        $today = date("Y-m-d", strtotime("+3 days"));

                                        function generateRandomInstanceId($length = 16) {
                                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                            $randomString = 'I';
                                            for ($i = 1; $i < $length - 6; $i++) {
                                                $randomString .= $characters[rand(0, strlen($characters) - 1)];
                                            }
                                            $currentTime = time();
                                            $lastSixDigits = substr(strval($currentTime), -6);
                                            $randint = rand(100, 900);
                                            return $randomString . $randint . $lastSixDigits;
                                        }

                                        $instanceId = generateRandomInstanceId();

                                        $register = "INSERT INTO `users`(`name`, `mobile`, `role`, `password`, `email`, `company`, `pin`, `pan`, `aadhaar`, `location`, `user_token`, `expiry`, `sponser_by`,`instance_id`) 
                                        VALUES ('$name', '$mobile', 'User', '$pass', '$email', '$company', '$pin', '$pan', '$aadhaar', '$location', '$key', '$today', '$sponser_id', '$instanceId')";

                                        $result = mysqli_query($conn, $register);

                                        if ($result) {
                                            $usid = mysqli_insert_id($conn);
                                            $sponserid = "IMBRFL00$usid";
                                            $conn->query("UPDATE `users` SET `sponser_id` = '$sponserid' WHERE id = '$usid'");
                                            
                                            echo '
                                            <script>
                                                Swal.fire({
                                                    title: "Registration Successful!",
                                                    text: "Your account has been created successfully.",
                                                    icon: "success",
                                                    confirmButtonText: "Continue"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = "index";
                                                    }
                                                });
                                            </script>';
                                        } else {
                                            echo '
                                            <script>
                                                Swal.fire({
                                                    title: "Registration Failed",
                                                    text: "There was an error creating your account. Please try again.",
                                                    icon: "error",
                                                    confirmButtonText: "OK"
                                                })
                                            </script>';
                                        }
                                    }
                                }
                            }
                            ?>
                            
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" placeholder="Enter Password" class="form-control" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="name" placeholder="Enter Your Name" class="form-control" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" name="company" placeholder="Enter Company Name" class="form-control" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">PIN Code</label>
                                        <input type="text" name="pin" placeholder="Enter Area PIN" class="form-control"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">PAN Number</label>
                                        <input type="text" name="pan" placeholder="Enter PAN (AAAAANNNNA)" class="form-control"
                                            pattern="[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}" title="Enter PAN number in the format: AAAAANNNNA"
                                            oninput="this.value = this.value.toUpperCase();" maxlength="10" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Aadhaar Number</label>
                                        <input type="text" name="aadhaar" placeholder="Enter Aadhaar Number" class="form-control"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);" required />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" name="location" placeholder="Enter Your Location" class="form-control" required />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Sponsor ID (Optional)</label>
                                        <input type="text" name="sponser_id" placeholder="Enter Referral ID" class="form-control"
                                            <?php if(isset($_GET["sponserid"]) && $_GET["sponserid"] != ''){ ?>
                                            readonly value="<?= htmlspecialchars($_GET["sponserid"]) ?>"
                                            <?php } ?>
                                        />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <button type="submit" name="create" class="btn btn-primary w-100 py-2">
                                            <i class="fas fa-user-plus me-2"></i> Register Now
                                        </button>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="mb-0">Already have an account? <a href="index">Login here</a></p>
                                    </div>
                                </div>
                            </form>
                            
                            <p class="footer-text mt-4">
                                *imb Pay Gateway provides Dynamic QR Generating service. IMB Payment Gateway does not offer payment gateway service, nor does it provide UPI ID and UPI Merchant account. Please read our policy and T&amp;C before using our services
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/register.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#disclaimer').modal({
                backdrop: 'static',
                keyboard: false
            });
         
        });
    </script>
</body>
</html>