<?php
include "auth/config.php";
include 'auth/function.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure database connection is established
    // Assuming $conn is your MySQLi/PDO connection object

    // Handle mobile number check
    if (isset($_POST['checkMobile'])) {
        $mobile = $_POST['mobile'];
        
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE mobile = ?");
        $stmt->bind_param("s", $mobile);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        
        header('Content-Type: application/json');
        echo json_encode(['exists' => $count > 0]);
        $stmt->close();
        $conn->close();
        exit;
    }

    // Handle email check
    if (isset($_POST['checkEmail'])) {
        $email = $_POST['email'];
        
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        
        header('Content-Type: application/json');
        echo json_encode(['exists' => $count > 0]);
        $stmt->close();
        $conn->close();
        exit;
    }

    // Handle Aadhaar check
    if (isset($_POST['checkAadhaar'])) {
        $aadhaar = $_POST['aadhaar'];
        
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE aadhaar = ?");
        $stmt->bind_param("s", $aadhaar);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        
        header('Content-Type: application/json');
        echo json_encode(['exists' => $count > 0]);
        $stmt->close();
        $conn->close();
        exit;
    }

    // Handle PAN check
    if (isset($_POST['checkPAN'])) {
        $pan = $_POST['pan'];
        
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE pan = ?");
        $stmt->bind_param("s", $pan);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        
        header('Content-Type: application/json');
        echo json_encode(['exists' => $count > 0]);
        $stmt->close();
        $conn->close();
        exit;
    }
    if (isset($_POST['refotp'])) {
        $mobile = $_POST['mobile'];
        $message = $_POST['message'];
        
        $result = sendwa($mobile, $message);
        echo $result;
        $conn->close();
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $site_settings['brand_name'] ?? 'DEZOPAY'; ?> | Registration</title>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
            padding: 40px 20px;
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
            position: relative; z-index: 10; width: 100%; max-width: 500px; margin: 0 auto;
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
if (isset($_GET['referral_code'])) {
    $referred_by = $_GET['referral_code'];
    
    // Check if the referred_by code exists in the database
    $sql_check = "SELECT id FROM users WHERE referral_code = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $referred_by);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    
    if ($result_check->num_rows > 0) {
        // If referral code exists, store it in a session or variable
        $valid_referral = true;
        $referred_by_user = $result_check->fetch_assoc()['id']; // User ID of the referrer
    } else {
        // If referral code does not exist, show error
        $valid_referral = false;
        $referred_by_user = null;
        echo "<script>alert('Invalid referral code! $referred_by');</script>";
    }
} else {
    // If 'referred_by' is not provided, treat it as no referral
    $valid_referral = false;
    $referred_by_user = null;
}


if (isset($_POST['create'])) {
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $secretKey = "6Le_GvAqAAAAAIMsH2dKjYWbSbFOQXKyJ0luafeQ";
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Google reCAPTCHA API Request
    $verifyURL = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$responseKey}&remoteip={$userIP}";

    $response = file_get_contents($verifyURL);
    $responseData = json_decode($response);

    if ($responseData->success) {
        // यहाँ पर आपका फॉर्म प्रोसेसिंग कोड
    
$use_referral = isset($_POST['use_referral']) ? true : false;
$referred_by = $_POST['referral_code'];

    // Check if the referred_by code exists in the database
    $sql_check = "SELECT id FROM users WHERE referral_code = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $referred_by);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    
    if ($result_check->num_rows > 0) {
        // If referral code exists, store it in a session or variable
        $valid_referral = true;
        $referred_by_user = $result_check->fetch_assoc()['id']; // User ID of the referrer
    } else {
        // If referral code does not exist, show error
        $valid_referral = false;
        $referred_by_user = null;
    }


$mobile =  $_POST['mobile'];
$email = $_POST['email'];
$referralCode = generateReferralCode();

$checkMobileQuery = "SELECT * FROM `users` WHERE `mobile` = '$mobile'";
$checkMobileResult = mysqli_query($conn, $checkMobileQuery);

$checkEmailQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
$checkEmailResult = mysqli_query($conn, $checkEmailQuery);

if (mysqli_num_rows($checkMobileResult) > 0) {
echo "<script>alert('Oops! Sorry, Mobile Number Already Exists. Please use a different number.');</script>";
exit;
} elseif (mysqli_num_rows($checkEmailResult) > 0) {
// The email already exists, display an error message
echo "<script>alert('Oops! Sorry, Email Already Exists. Please use a different email.');</script>";
exit;
} else {
// Proceed with user registration
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
echo "<script>alert('Oops! Sorry, PAN Number Already Exists. Please use a different PAN number.');</script>";
exit;
} elseif (mysqli_num_rows($checkAadharResult) > 0) {
// The email already exists, display an error message
echo "<script>alert('Oops! Sorry, Aadhaar Number Already Exists. Please use a different Aadhaar Number.');</script>";
exit;
}else{  
 // Function to generate a random instance_id
function generateRandomInstanceId($length = 16) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = 'I'; // Fixed 'I' as the first character

  // Generate a random string with the specified length - 7 (for the time part and additional digit)
  for ($i = 1; $i < $length - 6; $i++) {
  $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }

  // Get the current time in seconds since the epoch
  $currentTime = time();

  // Take the last 6 digits from the current time and append them to the random string
  $lastSixDigits = substr(strval($currentTime), -6);
  $randint = rand(100, 900);
  
  return $randomString . $randint . $lastSixDigits;
}

if ($use_referral && $valid_referral) {
// Generate random instance_id and instance_secret
$instanceId = generateRandomInstanceId();
$location = $_POST['location'];
$key = md5(rand(00000000, 99999999));
$pass = password_hash($password, PASSWORD_BCRYPT);
$today = date("Y-m-d", strtotime("+1 days"));


$register = "INSERT INTO `users`(`name`, `mobile`, `role`, `balance`, `password`, `email`, `company`, `pin`, `pan`, `aadhaar`, `location`, `user_token`, `expiry`,`vip_expiry`, `instance_id`, referral_code, referred_by, planId) 
VALUES ('$name', '$mobile', 'User','0.00', '$pass', '$email', '$company', '$pin', '$pan', '$aadhaar', '$location', '$key', '$today','$today', '$instanceId', '$referralCode', '$referred_by_user','5')";


$result = mysqli_query($conn, $register);



if ($result) {
$msg = "Dear $name thanks For Registering Us
Your Username = $mobile
Your Password = $password
Thanks & Regards
*DEZOPAY™*";
// sendWA($mobile,$encodedMsg);
sendNotification($mobile, $email, $msg, "Well-Come To DEZOPAY Family");
// Fetch plans from the database
$sql = "SELECT id, plan_name, amount, expiry FROM subscription_plan";
$result = $conn->query($sql);

$plans = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $plans[] = $row;
    }
}
?>

<script>
    Swal.fire({
        title: "Referral Applied!",
        html: `
            <form id="planForm">
                <div style="margin-bottom: 10px;">
                    <label for="plan" style="display: block; font-weight: bold;">Select Plan</label>
                    <select id="plan" name="plan" class="form-control" required>
                        <option value="" disabled selected>Select a plan</option>
                        <?php foreach ($plans as $plan) { ?>
                            <option value="<?php echo $plan['plan_name']; ?>" 
                                data-planid="<?php echo $plan['id']; ?>"
                                data-amount="<?php echo $plan['amount']; ?>" 
                                data-expiry="<?php echo $plan['expiry']; ?>">
                                <?php echo "RS. ".$plan['amount'].' - ' . $plan['plan_name']; ?>

                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="mobile" style="display: block; font-weight: bold;">Mobile Number</label>
                    <input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>" class="form-control" placeholder="Mobile Number" readonly>
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="amount" style="display: block; font-weight: bold;">Amount</label>
                    <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount" readonly>
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="validity" style="display: block; font-weight: bold;">Validity (in days)</label>
                    <input type="text" id="validity" name="validity" class="form-control" placeholder="Validity" readonly>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Submit</button>
            </form>
        `,
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            const planDropdown = document.getElementById('plan');
            const amountField = document.getElementById('amount');
            const validityField = document.getElementById('validity');
            const mobileField = document.getElementById('mobile');

            planDropdown.addEventListener('change', (event) => {
                const selectedOption = event.target.selectedOptions[0];
                amountField.value = selectedOption.getAttribute('data-amount');
                validityField.value = selectedOption.getAttribute('data-expiry');
            });

            const form = document.getElementById('planForm');
            form.addEventListener('submit', (e) => {
                e.preventDefault();

                const selectedOption = planDropdown.selectedOptions[0];
                const referpay = 'referpay'; // यहां पर सही referpay वैल्यू डालें
                const planid = selectedOption.getAttribute('data-planid');
                const amount = amountField.value;
                const validity = validityField.value;
                const mobile = mobileField.value;

                // Create a dynamic form for redirection
                const dynamicForm = document.createElement('form');
                dynamicForm.method = 'POST';
                dynamicForm.action = 'auth/lib/pay.php';

                // Add form fields
                dynamicForm.innerHTML = `
                    <input type="hidden" name="for" value="${referpay}">
                    <input type="hidden" name="planid" value="${planid}">
                    <input type="hidden" name="plan" value="${selectedOption.value}">
                    <input type="hidden" name="amount" value="${amount}">
                    <input type="hidden" name="validity" value="${validity}">
                    <input type="hidden" name="mobile" value="${mobile}">
                `;

                // Append and submit the form
                document.body.appendChild(dynamicForm);
                dynamicForm.submit();
            });
        }
    });
</script>
<?}?>


<?php
        exit;
    } else {
$location = $_POST['location'];
$key = md5(rand(00000000, 99999999));
$pass = password_hash($password, PASSWORD_BCRYPT);
$today = date("Y-m-d", strtotime("+1 days"));




// Generate random instance_id and instance_secret
$instanceId = generateRandomInstanceId();


$register = "INSERT INTO `users`(`name`, `mobile`, `role`, `balance`, `password`, `email`, `company`, `pin`, `pan`, `aadhaar`, `location`, `user_token`, `expiry`,`vip_expiry`, `instance_id`, referral_code, referred_by, planId) 
VALUES ('$name', '$mobile', 'User','0.00', '$pass', '$email', '$company', '$pin', '$pan', '$aadhaar', '$location', '$key', '$today','$today', '$instanceId', '$referralCode', '$referred_by_user','5')";


$result = mysqli_query($conn, $register);



if ($result) {
$msg = "Dear $name thanks For Registering Us
Your Username = $mobile
Your Password = $password
Thanks & Regards
*DEZOPAY™*";


$encodedMsg = urlencode($msg);

// sendWA($mobile,$encodedMsg);
sendNotification($mobile, $email, $msg, "Well-Come To DEZOPAY Family");

echo '
    <script>
        alert("Registration Successful! Click OK to continue.");
        window.location.href = "auth/index"; // Replace with your desired redirect URL
    </script>
    ';
    exit;
} else {
echo '
    <script>
        alert("Registration Failed! Please try again.");
        window.location.href = "auth/register"; // Optionally redirect back to registration page
    </script>
    ';
    exit;
}
}
}
}
}else {
    echo '<script>
    alert("reCAPTCHA Failed!\nPlease try again.");
    setTimeout(() => {
        history.back();
    }, 2000);
</script>';
exit;
    }
}
}
?>
<body>
    <div class="login-section">
        <div class="orb orb1"></div>
        <div class="orb orb2"></div>
        
        <div class="login-card">
            <div class="text-center mb-8">
                <div class="logo-icon"><i class="fa-solid fa-user-plus"></i></div>
                <div class="text-3xl font-black tracking-widest uppercase mb-1">
                    <span class="text-white">DEZO</span><span class="text-brand-500">PAY</span>
                </div>
                <div class="text-sm text-gray-400">Create your merchant account</div>
            </div>

            <div id="toast-container" class="toast-container"></div>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
                <div class="mb-5">
                    <label class="block text-[13px] font-medium text-gray-400 mb-2">Name</label>
                    <input type="text" id="username" name="name" class="form-input" placeholder="Enter your Name" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" required autofocus onkeyup="checkInitialFields(); validateName()">
                    <div id="name-warning" class="text-red-400 text-xs mt-1"></div>
                </div>
                
                <div class="mb-5">
                    <label class="block text-[13px] font-medium text-gray-400 mb-2">Mobile Number</label>
                    <input type="number" id="Number" name="mobile" class="form-input" placeholder="Enter your 10-digit Mobile Number" pattern="[0-9]{10}" title="Enter exactly 10 digits" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" required onkeyup="checkInitialFields(); validateMobile()">
                    <div id="mobile-warning" class="text-red-400 text-xs mt-1"></div>
                </div>

                <div class="mb-5" id="otpDiv" style="display: none;">
                    <label class="block text-[13px] font-medium text-gray-400 mb-2">OTP</label>
                    <div class="flex gap-2">
                        <input type="number" id="otp" name="otp" class="form-input flex-1" placeholder="Enter 6-digit OTP" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);" required onkeyup="validateOTP()">
                        <button type="button" class="px-4 py-2 bg-brand-500 hover:bg-brand-600 text-white rounded-xl text-sm font-semibold transition-colors" onclick="verifyOTP()">Verify</button>
                    </div>
                    <div id="otp-warning" class="text-red-400 text-xs mt-1"></div>
                    <div class="flex justify-between items-center mt-2">
                        <div class="text-xs text-gray-400">OTP sent on WhatsApp. Support: 9876543210</div>
                        <button type="button" id="resendBtn" class="text-brand-400 text-xs hover:text-brand-300 font-semibold disabled:opacity-50 disabled:cursor-not-allowed" onclick="resendOTP()" disabled>Resend OTP</button>
                    </div>
                    <div id="resend-message" class="text-xs text-gray-400 mt-1 text-right"></div>
                </div>
                
                <div id="hiddenFields" style="display: none;">
                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-gray-400 mb-2">Email Id</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a valid email address" required onkeyup="validateEmail()">
                        <div id="email-warning" class="text-red-400 text-xs mt-1"></div>
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-gray-400 mb-2">Company Name</label>
                        <input type="text" id="company" name="company" class="form-input" placeholder="Enter your Company Name" required>
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-gray-400 mb-2">Aadhaar Number</label>
                        <input type="number" id="aadhar" name="aadhaar" class="form-input" placeholder="Enter your 12-digit Aadhaar Number" pattern="[0-9]{12}" title="Enter exactly 12 digits" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);" required onkeyup="validateAadhaar()">
                        <div id="aadhaar-warning" class="text-red-400 text-xs mt-1"></div>
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-gray-400 mb-2">PAN Number</label>
                        <input type="text" id="pan" name="pan" class="form-input uppercase" placeholder="Enter your PAN Number" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" title="Enter valid PAN (e.g., ABCDE1234F)" maxlength="10" oninput="this.value = this.value.toUpperCase();" required onkeyup="validatePAN()">
                        <div id="pan-warning" class="text-red-400 text-xs mt-1"></div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label class="block text-[13px] font-medium text-gray-400 mb-2">Location</label>
                            <input type="text" id="location" name="location" class="form-input" placeholder="City/State" required>
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-gray-400 mb-2">Pincode</label>
                            <input type="number" id="pin" name="pin" class="form-input" placeholder="6 digits" pattern="[0-9]{6}" title="Enter exactly 6 digits" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);" required onkeyup="validatePin()">
                            <div id="pin-warning" class="text-red-400 text-xs mt-1"></div>
                        </div>
                    </div>
                    
                    <div class="mb-5">
                        <label class="block text-[13px] font-medium text-gray-400 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="form-input pr-12" placeholder="••••••••••••" onkeyup="checkPasswordStrength()" required>
                            <span id="togglePassword" class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-gray-400 hover:text-white transition-colors">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                        <div id="password-strength" class="text-xs font-semibold mt-2"></div>
                    </div>
                    
                    <div class="mb-5 flex items-center">
                        <label class="flex items-center gap-2 cursor-pointer hover:text-gray-300 transition-colors text-[13px] text-gray-400">
                            <input type="checkbox" id="use_referral" name="use_referral" class="w-4 h-4 accent-brand-500 rounded bg-gray-800 border-gray-700" onchange="toggleReferralInput(this)">
                            <span>Apply Referral Code</span>
                        </label>
                    </div>

                    <div id="referralCodeContainer" class="mb-5" style="display: none;">
                        <label class="block text-[13px] font-medium text-gray-400 mb-2">Referral Code</label>
                        <input type="text" id="referral_code" name="referral_code" class="form-input uppercase" placeholder="Referral Code (Optional)" onkeyup="validateReferral()">
                        <div id="referral-warning" class="text-red-400 text-xs mt-1"></div>
                    </div>
                    
                    <div class="mb-5 flex justify-center">
                        <div class="g-recaptcha" data-sitekey="6Le_GvAqAAAAAPAhNpadyjfYK_GoY24yVf77kYhC" required></div>
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center gap-2 cursor-pointer hover:text-gray-300 transition-colors text-[13px] text-gray-400">
                            <input type="checkbox" id="terms-conditions" name="terms" class="w-4 h-4 accent-brand-500 rounded bg-gray-800 border-gray-700" required>
                            <span>I agree to <a href="javascript:void(0);" class="text-brand-400 hover:text-brand-300 font-semibold transition-colors">privacy policy & terms</a></span>
                        </label>
                    </div>
                    
                    <button type="submit" name="create" id="registerBtn" class="login-btn mb-6">
                        <span id="btnText"><i class="fa-solid fa-user-check mr-2"></i> Sign up</span>
                    </button>
                </div>
            </form>

            <div class="text-center text-[13px] text-gray-400">
                Already have an account? <a href="auth/index.php" class="text-brand-400 hover:text-brand-300 font-semibold transition-colors">Sign in instead</a>
            </div>
            
            <div class="mt-8 flex items-center justify-center gap-2 text-[11px] text-gray-500 font-medium">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Secured with 256-bit SSL encryption</span>
            </div>
        </div>
    </div>

<script>
    // Password Toggle
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');
        const icon = this.querySelector('i');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        } else {
            password.type = 'password';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        }
    });
    // URL से referral code निकालने का function
function getReferralCode() {
    const urlParams = new URLSearchParams(window.location.search);
    const referralCode = urlParams.get('referred_by');
    
    if (referralCode) {
        const referralInput = document.getElementById('referral_code');
        const applyReferralCheckbox = document.getElementById('use_referral');
        const referralCodeContainer = document.getElementById('referralCodeContainer');

        // इनपुट फील्ड में वैल्यू सेट करना और readonly बनाना
        referralInput.value = referralCode;
        referralInput.readOnly = true;
        
        // Referral input को दिखाना (display:block)
        referralCodeContainer.style.display = "block";

        // Checkbox को checked रखना
        applyReferralCheckbox.checked = true;
        applyReferralCheckbox.disabled = true;
    }
}



    // Page लोड होते ही function call होगा
    window.onload = getReferralCode;



function showToast(message, type = "info") {
    Swal.fire({
        text: message,
        icon: type,
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
}


let generatedOTP = '';
let lastOTPSentTime = 0;
const OTP_RESEND_DELAY = 120000; // 2 minutes in milliseconds

function checkInitialFields() {
    const name = document.getElementById('username').value;
    const mobile = document.getElementById('Number').value;
    const namePattern = /^[A-Za-z\s]+$/;
    const mobilePattern = /^[0-9]{10}$/;

    if (!namePattern.test(name)) {
        document.getElementById('name-warning').textContent = 'Name should contain only letters and spaces';
        document.getElementById('otpDiv').style.display = 'none';
        return;
    }

    if (!mobilePattern.test(mobile)) {
        document.getElementById('mobile-warning').textContent = 'Please enter a valid 10-digit mobile number';
        document.getElementById('otpDiv').style.display = 'none';
        return;
    }

    // Check if mobile number already exists
    fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `checkMobile=true&mobile=${mobile}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.exists) {
            document.getElementById('mobile-warning').textContent = 'This mobile number is already registered Plese Sign in';
            document.getElementById('otpDiv').style.display = 'none';
        } else {
            document.getElementById('otpDiv').style.display = 'block';
            document.getElementById('name-warning').textContent = '';
            document.getElementById('mobile-warning').textContent = '';
            sendOTP(mobile);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('mobile-warning').textContent = 'Error checking mobile number';
    });
}

function validateName() {
    const name = document.getElementById('username').value;
    const namePattern = /^[A-Za-z\s]+$/;
    const warningDiv = document.getElementById('name-warning');
    
    if (!namePattern.test(name) && name.length > 0) {
        warningDiv.textContent = 'Only letters and spaces are allowed';
    } else {
        warningDiv.textContent = '';
    }
}

function validateMobile() {
    const mobile = document.getElementById('Number').value;
    const mobilePattern = /^[0-9]{10}$/;
    const warningDiv = document.getElementById('mobile-warning');
    
    if (!mobilePattern.test(mobile) && mobile.length > 0) {
        warningDiv.textContent = 'Mobile number must be exactly 10 digits';
    } else {
        warningDiv.textContent = '';
    }
}

function validateOTP() {
    const otp = document.getElementById('otp').value;
    const warningDiv = document.getElementById('otp-warning');
    
    if (otp.length > 0 && otp.length < 6) {
        warningDiv.textContent = 'OTP must be 6 digits';
    } else {
        warningDiv.textContent = '';
    }
}

// Existing validateEmail function
function validateEmail() {
    const email = document.getElementById('email').value;
    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    const warningDiv = document.getElementById('email-warning');
    
    if (!emailPattern.test(email) && email.length > 0) {
        warningDiv.textContent = 'Please enter a valid email address';
        return;
    } else {
        warningDiv.textContent = '';
    }

    // Real-time email check
    if (emailPattern.test(email)) {
        fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `checkEmail=true&email=${encodeURIComponent(email)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                warningDiv.textContent = 'This email is already registered. Please use a different email or sign in.';
            } else {
                warningDiv.textContent = '';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            warningDiv.textContent = 'Error checking email';
        });
    }
}

// Existing validateAadhaar function
function validateAadhaar() {
    const aadhaar = document.getElementById('aadhar').value;
    const aadhaarPattern = /^[0-9]{12}$/;
    const warningDiv = document.getElementById('aadhaar-warning');
    
    if (!aadhaarPattern.test(aadhaar) && aadhaar.length > 0) {
        warningDiv.textContent = 'Aadhaar must be exactly 12 digits';
        return;
    } else {
        warningDiv.textContent = '';
    }

    // Real-time Aadhaar check
    if (aadhaarPattern.test(aadhaar)) {
        fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `checkAadhaar=true&aadhaar=${aadhaar}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                warningDiv.textContent = 'This Aadhaar number is already registered.';
            } else {
                warningDiv.textContent = '';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            warningDiv.textContent = 'Error checking Aadhaar';
        });
    }
}

// Existing validatePAN function
function validatePAN() {
    const pan = document.getElementById('pan').value;
    const panPattern = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    const warningDiv = document.getElementById('pan-warning');
    
    if (!panPattern.test(pan) && pan.length > 0) {
        warningDiv.textContent = 'PAN must be in format ABCDE1234F';
        return;
    } else {
        warningDiv.textContent = '';
    }

    // Real-time PAN check
    if (panPattern.test(pan)) {
        fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `checkPAN=true&pan=${pan}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                warningDiv.textContent = 'This PAN is already registered.';
            } else {
                warningDiv.textContent = '';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            warningDiv.textContent = 'Error checking PAN';
        });
    }
}

function validatePin() {
    const pin = document.getElementById('pin').value;
    const pinPattern = /^[0-9]{6}$/;
    const warningDiv = document.getElementById('pin-warning');
    
    if (!pinPattern.test(pin) && pin.length > 0) {
        warningDiv.textContent = 'Pincode must be exactly 6 digits';
    } else {
        warningDiv.textContent = '';
    }
}

function validateReferral() {
    const referral = document.getElementById('referred_by').value;
    const referralPattern = /^[A-Za-z0-9]{6,10}$/;
    const warningDiv = document.getElementById('referral-warning');
    
    if (referral.length > 0 && !referralPattern.test(referral)) {
        warningDiv.textContent = 'Referral code must be 6-10 alphanumeric characters';
    } else {
        warningDiv.textContent = '';
    }
}

function sendOTP(mobile) {
    generatedOTP = Math.floor(100000 + Math.random() * 900000).toString();
    const regotpmsg = `Your OTP for registration is ${generatedOTP}`;
    
    fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `refotp=true&mobile=${mobile}&message=${encodeURIComponent(regotpmsg)}`
    })
    .then(response => response.text())
    .then(data => {
        showToast("OTP sent successfully via WhatsApp!", "success");
        lastOTPSentTime = Date.now();
        startResendTimer();
    })
    .catch(error => console.error('Error:', error));
}

function resendOTP() {
    const currentTime = Date.now();
    if (currentTime - lastOTPSentTime >= OTP_RESEND_DELAY) {
        const mobile = document.getElementById('Number').value;
        sendOTP(mobile);
    } else {
        showToast("Please wait 2 minutes before resending OTP", "warning");
    }
}

function startResendTimer() {
    const resendBtn = document.getElementById('resendBtn');
    resendBtn.disabled = true;
    
    const updateTimer = () => {
        const currentTime = Date.now();
        const timeLeft = Math.max(0, OTP_RESEND_DELAY - (currentTime - lastOTPSentTime));
        const minutes = Math.floor(timeLeft / 60000);
        const seconds = Math.floor((timeLeft % 60000) / 1000);
        
        document.getElementById('resend-message').textContent = 
            `Resend available in ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        
        if (timeLeft <= 0) {
            resendBtn.disabled = false;
            document.getElementById('resend-message').textContent = '';
        } else {
            setTimeout(updateTimer, 1000);
        }
    };
    
    updateTimer();
}

function verifyOTP() {
    const enteredOTP = document.getElementById('otp').value;
    if (enteredOTP === generatedOTP && enteredOTP.length === 6) {
        document.getElementById('hiddenFields').style.display = 'block';
        document.getElementById('otpDiv').style.display = 'none';
        showToast("OTP verified successfully! 🎉 Now fill in the remaining details, and you're good to go! 😊✨", "success");
    } else {
        showToast("Invalid OTP. Try again!", "error");
    }
}

// Update validateForm to ensure no warnings exist before submission
function validateForm() {
    const name = document.getElementById('username').value;
    const mobile = document.getElementById('Number').value;
    const email = document.getElementById('email').value;
    const aadhaar = document.getElementById('aadhar').value;
    const pan = document.getElementById('pan').value;
    const pin = document.getElementById('pin').value;
    const referral = document.getElementById('referral_code').value;

    const namePattern = /^[A-Za-z\s]+$/;
    const mobilePattern = /^[0-9]{10}$/;
    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    const aadhaarPattern = /^[0-9]{12}$/;
    const panPattern = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    const pinPattern = /^[0-9]{6}$/;
    const referralPattern = /^[A-Za-z0-9]{6,10}$/;

    // Check for warning messages
    const warnings = [
        document.getElementById('name-warning').textContent,
        document.getElementById('mobile-warning').textContent,
        document.getElementById('email-warning').textContent,
        document.getElementById('aadhaar-warning').textContent,
        document.getElementById('pan-warning').textContent,
        document.getElementById('pin-warning').textContent,
        document.getElementById('referral-warning').textContent
    ];

    if (warnings.some(warning => warning !== '')) {
        showToast("Please fix the errors before submitting.", "error");
        return false;
    }

    if (!namePattern.test(name)) {
        showToast("Invalid name format.", "error");
        return false;
    }
    if (!mobilePattern.test(mobile)) {
        showToast("Invalid mobile number.", "error");
        return false;
    }
    if (!emailPattern.test(email)) {
        showToast("Invalid email address.", "error");
        return false;
    }
    if (!aadhaarPattern.test(aadhaar)) {
        showToast("Invalid Aadhaar number.", "error");
        return false;
    }
    if (!panPattern.test(pan)) {
        showToast("Invalid PAN number.", "error");
        return false;
    }
    if (!pinPattern.test(pin)) {
        showToast("Invalid Pincode.", "error");
        return false;
    }
    // if (document.getElementById('use_referral').checked && referral.length > 0 && !referralPattern.test(referral)) {
    //     showToast("Invalid referral code.", "error");
    //     return false;
    // }
    return true;
}

function checkPasswordStrength() {
    const password = document.getElementById('password').value;
    const strengthDiv = document.getElementById('password-strength');
    
    let strength = 0;
    if (password.length > 5) strength++;
    if (password.length > 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    switch(strength) {
        case 0:
        case 1:
            strengthDiv.textContent = 'Weak';
            strengthDiv.style.color = 'red';
            break;
        case 2:
        case 3:
            strengthDiv.textContent = 'Medium';
            strengthDiv.style.color = 'orange';
            break;
        case 4:
            strengthDiv.textContent = 'Strong';
            strengthDiv.style.color = 'blue';
            break;
        case 5:
            strengthDiv.textContent = 'Very Strong';
            strengthDiv.style.color = 'green';
            break;
    }
}

function toggleReferralInput(checkbox) {
    const referralContainer = document.getElementById('referralCodeContainer');
    if (checkbox.checked) {
        referralContainer.style.display = 'block';
    } else {
        referralContainer.style.display = 'none';
        document.getElementById('referred_by').value = '';
        document.getElementById('referral-warning').textContent = '';
    }
}

document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const icon = this.querySelector('i');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('ri-eye-off-line');
        icon.classList.add('ri-eye-line');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('ri-eye-line');
        icon.classList.add('ri-eye-off-line');
    }
});
</script>
</body>
</html>
<!-- beautify ignore:end -->