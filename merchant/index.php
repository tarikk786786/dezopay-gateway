<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DEZOPAY - Premium UPI Payment Gateway</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Inter',sans-serif;background:#0a0a14;color:#fff;overflow-x:hidden;}

/* ─── LOGIN SECTION ─── */
.login-section{
  min-height:100vh;display:flex;align-items:center;justify-content:center;
  background:linear-gradient(135deg,#0f0c29,#302b63,#24243e);
  position:relative;overflow:hidden;
}
.login-section::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse at 20% 50%,rgba(108,99,255,.25) 0%,transparent 60%),
             radial-gradient(ellipse at 80% 20%,rgba(59,130,246,.2) 0%,transparent 50%);
}
.orb{position:absolute;border-radius:50%;filter:blur(80px);animation:float 8s ease-in-out infinite;}
.orb1{width:400px;height:400px;background:rgba(108,99,255,.2);top:-100px;right:-100px;animation-delay:0s;}
.orb2{width:300px;height:300px;background:rgba(59,130,246,.15);bottom:-50px;left:-50px;animation-delay:3s;}
@keyframes float{0%,100%{transform:translateY(0);}50%{transform:translateY(-30px);}}

.login-card{
  position:relative;z-index:10;width:420px;
  background:rgba(255,255,255,.05);
  backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);
  border:1px solid rgba(255,255,255,.1);
  border-radius:24px;padding:48px 40px;
  box-shadow:0 25px 60px rgba(0,0,0,.5),inset 0 1px 0 rgba(255,255,255,.1);
  animation:slideUp .8s ease-out;
}
@keyframes slideUp{from{opacity:0;transform:translateY(40px);}to{opacity:1;transform:translateY(0);}}

.logo-wrap{text-align:center;margin-bottom:32px;}
.logo-icon{
  width:64px;height:64px;border-radius:16px;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;
  background:linear-gradient(135deg,#6c63ff,#3b82f6);
  box-shadow:0 8px 32px rgba(108,99,255,.4);font-size:28px;
}
.brand-name{font-size:28px;font-weight:900;letter-spacing:2px;}
.brand-name .dezo{color:#fff;}
.brand-name .pay{color:#6c63ff;}
.tagline{color:rgba(255,255,255,.5);font-size:13px;margin-top:4px;}

.form-group{margin-bottom:20px;}
.form-group label{display:block;font-size:13px;font-weight:500;color:rgba(255,255,255,.7);margin-bottom:8px;}
.form-group input{
  width:100%;padding:14px 16px;background:rgba(255,255,255,.07);
  border:1px solid rgba(255,255,255,.1);border-radius:12px;
  color:#fff;font-size:14px;font-family:'Inter',sans-serif;
  transition:all .3s;outline:none;
}
.form-group input:focus{border-color:#6c63ff;background:rgba(108,99,255,.1);box-shadow:0 0 0 3px rgba(108,99,255,.15);}
.form-group input::placeholder{color:rgba(255,255,255,.3);}
.input-wrap{position:relative;}
.input-wrap input{padding-right:44px;}
.eye-toggle{position:absolute;right:14px;top:50%;transform:translateY(-50%);cursor:pointer;color:rgba(255,255,255,.4);}

.login-btn{
  width:100%;padding:16px;border:none;border-radius:12px;cursor:pointer;
  background:linear-gradient(135deg,#6c63ff,#3b82f6);
  color:#fff;font-size:15px;font-weight:700;letter-spacing:.5px;
  transition:all .3s;margin-top:8px;position:relative;overflow:hidden;
}
.login-btn:hover{transform:translateY(-2px);box-shadow:0 12px 40px rgba(108,99,255,.5);}
.login-btn::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,#7c73ff,#4b92f6);opacity:0;transition:.3s;
}
.login-btn:hover::after{opacity:1;}
.login-btn span{position:relative;z-index:1;}

.form-footer{text-align:center;margin-top:24px;font-size:13px;color:rgba(255,255,255,.4);}
.form-footer a{color:#6c63ff;font-weight:600;}

#otpformbox { display: none; }
.otp-inputs { display: flex; justify-content: center; margin-bottom: 20px; gap: 10px; }
.otp-input { width: 45px; height: 45px; font-size: 18px; text-align: center; background:rgba(255,255,255,.07); border:1px solid rgba(255,255,255,.1); border-radius:12px; color:#fff; outline:none; transition:all .3s; }
.otp-input:focus { border-color:#6c63ff; background:rgba(108,99,255,.1); box-shadow:0 0 0 3px rgba(108,99,255,.15); }

.simple-spinner { width: 30px; height: 30px; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); }
.simple-spinner span { display: block; width: 60px; height: 60px; border: 3px solid transparent; border-radius: 50%; border-right-color: rgba(255, 255, 255, 0.7); animation: spinner-anim 0.8s linear infinite; }
@keyframes spinner-anim { from { transform: rotate(0); } to { transform: rotate(360deg); } }
#loading_ajax { display: none; background: rgba(0, 0, 0, 0.4); position: fixed; bottom: 0; left: 0; right: 0; top: 0; z-index: 9998; }

</style>
</head>
<body>

<div id="loading_ajax">
  <div class="simple-spinner">
    <span></span>
  </div>
</div>

<div class="login-section">
  <div class="orb orb1"></div>
  <div class="orb orb2"></div>
  
  <div class="login-card">
    <div class="logo-wrap">
      <div class="logo-icon">💳</div>
      <div class="brand-name"><span class="dezo">DEZO</span><span class="pay">PAY</span></div>
      <div class="tagline">The Future of UPI Payments</div>
    </div>
    
    <!-- Login Form -->
    <div id="loginformbox">
      <form class="login-form" method="POST" id="login_form">
        <div class="form-group">
          <label for="mobile">Mobile Number</label>
          <input type="text" id="mobile" name="username" placeholder="Enter your 10-digit mobile number" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
        </div>
        <div class="form-group">
          <label for="passwordlogin">Password</label>
          <div class="input-wrap">
            <input type="password" id="passwordlogin" name="password" placeholder="••••••••••••" required>
            <span class="eye-toggle"><i class="fa fa-eye-slash"></i></span>
          </div>
        </div>
        
        <div style="display:flex;justify-content:space-between;font-size:12px;color:rgba(255,255,255,.4);margin-bottom:20px;">
          <label style="display:flex;align-items:center;gap:6px;cursor:pointer;"><input type="checkbox" id="staySigned" style="accent-color:#6c63ff"> Stay Signed in</label>
          <a href="forgotpassword" style="color:#6c63ff;text-decoration:none;">Forgot Password?</a>
        </div>
        
        <!-- Google reCAPTCHA -->
        <div class="g-recaptcha mb-3" data-sitekey="<?= $website_settings['recaptcha_site_key'] ?>" style="margin-bottom:20px; transform:scale(0.85); transform-origin:0 0;"></div>
        
        <button class="login-btn" type="submit" name="submit"><span>🚀 Login to DEZOPAY</span></button>
        <div class="form-footer">New here? <a href="register">Create an account</a></div>
      </form>
    </div>

    <!-- OTP Form -->
    <div id="otpformbox">
      <form class="login-form" method="POST" id="loginotpform">
        <input type="hidden" name="useridmodal" id="useridmodal">
        <div style="text-align:center; margin-bottom: 20px;">
            <h3 style="font-size:18px; margin-bottom:8px;">Verify Your Account</h3>
            <p style="font-size:13px; color:rgba(255,255,255,.6);">We sent a verification code to your mobile.</p>
        </div>
        
        <div class="otp-inputs">
          <input type="text" maxlength="1" class="otp-input" id="otp1" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp2" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp3" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp4" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp5" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp6" autocomplete="off">
        </div>
        
        <button class="login-btn" type="submit" name="submit"><span>✅ VERIFY OTP</span></button>
        
        <div class="form-footer mt-3" style="margin-top:16px;">
          Didn't receive the code? 
          <a href="#" id="resendOtpBtn" style="pointer-events:none; opacity:0.5;">Resend OTP</a> 
          in <span id="timer">30</span>s
        </div>
      </form>
    </div>

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/login.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const eyeToggle = document.querySelector('.eye-toggle');
  const passwordInput = document.getElementById('passwordlogin');
  
  if(eyeToggle && passwordInput) {
    eyeToggle.addEventListener('click', function() {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.innerHTML = type === 'password' ? '<i class="fa fa-eye-slash"></i>' : '<i class="fa fa-eye"></i>';
    });
  }

  // OTP input auto-focus
  const otpInputs = document.querySelectorAll('.otp-input');
  otpInputs.forEach((input, index) => {
    input.addEventListener('input', (e) => {
      if (e.target.value.length === 1 && index < otpInputs.length - 1) {
        otpInputs[index + 1].focus();
      }
    });
    
    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && index > 0 && !e.target.value) {
        otpInputs[index - 1].focus();
      }
    });
  });
  
  // OTP timer functionality
  let timeLeft = 30;
  const timerElement = document.getElementById('timer');
  const resendBtn = document.getElementById('resendOtpBtn');
  
  const timer = setInterval(() => {
    timeLeft--;
    if(timerElement) timerElement.textContent = timeLeft;
    
    if (timeLeft <= 0) {
      clearInterval(timer);
      if(resendBtn) {
        resendBtn.style.pointerEvents = 'auto';
        resendBtn.style.opacity = '1';
      }
      if(timerElement) timerElement.parentElement.innerHTML = 'Didn\'t receive the code? <a href="#" id="resendOtpBtn">Resend OTP</a>';
    }
  }, 1000);
});
</script>
</body>
</html>