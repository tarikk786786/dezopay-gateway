<?php
session_start();
// The form submits to itself for password reset logic.
// You can add your backend processing here for sending OTP/reset link.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Forgot Password | DEZOPAY Dashboard</title>
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
            text-transform: uppercase;
        }
        .form-input::placeholder { text-transform: none; color: rgba(255,255,255,0.3); }
        .form-input:focus {
            border-color: #6c63ff; background: rgba(108,99,255,0.1);
            box-shadow: 0 0 0 3px rgba(108,99,255,0.15);
        }
        
        .login-btn {
            width: 100%; padding: 16px; border: none; border-radius: 12px; cursor: pointer;
            background: linear-gradient(135deg, #6c63ff, #3b82f6);
            color: #fff; font-size: 15px; font-weight: 700; letter-spacing: 0.5px;
            transition: all 0.3s; position: relative; overflow: hidden;
        }
        .login-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 40px rgba(108,99,255,0.5); }
        .login-btn:disabled { opacity: 0.7; cursor: not-allowed; transform: none; box-shadow: none; }
    </style>
</head>

<body>
    <div class="login-section">
        <div class="orb orb1"></div>
        <div class="orb orb2"></div>
        
        <div class="login-card">
            <div class="text-center mb-8">
                <div class="logo-icon"><i class="fa-solid fa-lock"></i></div>
                <div class="text-2xl font-bold mb-2">Reset Password</div>
                <div class="text-[13px] text-gray-400">Enter your registered mobile & PAN to receive a reset link via WhatsApp/Email.</div>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="resetForm">
                <div class="mb-5">
                    <label class="block text-[13px] font-medium text-gray-400 mb-2">Mobile Number</label>
                    <input type="text" name="username" class="form-input" style="text-transform: none;"
                           placeholder="Enter your 10-digit mobile number" 
                           maxlength="10" pattern="\d{10}" 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-[13px] font-medium text-gray-400 mb-2">PAN Number</label>
                    <input type="text" name="pan" class="form-input" 
                           placeholder="Enter PAN Number (e.g. ABCDE1234F)" 
                           pattern="[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}" 
                           title="Enter PAN number in the format: AAAAANNNNA"
                           oninput="this.value = this.value.toUpperCase();" maxlength="10" required>
                </div>

                <button type="submit" name="submit" id="resetBtn" class="login-btn mb-6">
                    <span id="btnText"><i class="fa-solid fa-paper-plane mr-2"></i> Send Reset Link</span>
                    <span id="btnLoader" class="hidden"><i class="fa-solid fa-circle-notch fa-spin mr-2"></i> Processing...</span>
                </button>
            </form>

            <div class="text-center text-[13px] text-gray-400">
                <a href="auth/index.php" class="flex items-center justify-center gap-2 text-brand-400 hover:text-brand-300 font-semibold transition-colors">
                    <i class="fa-solid fa-arrow-left"></i> Back to Login
                </a>
            </div>
            
            <div class="mt-8 flex items-center justify-center gap-2 text-[11px] text-gray-500 font-medium">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Secured with 256-bit SSL encryption</span>
            </div>
        </div>
    </div>

    <script>
        // Form Submit Loader
        document.getElementById('resetForm').addEventListener('submit', function() {
            const btn = document.getElementById('resetBtn');
            const text = document.getElementById('btnText');
            const loader = document.getElementById('btnLoader');
            
            btn.disabled = true;
            text.classList.add('hidden');
            loader.classList.remove('hidden');
        });
    </script>
</body>
</html>