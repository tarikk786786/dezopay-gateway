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

*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Inter',sans-serif;background:var(--bg-main);color:var(--text-main);overflow-x:hidden;}

/* ─── LOGIN SECTION ─── */
.login-section{
  min-height:100vh;display:flex;align-items:center;justify-content:center;
  background:var(--bg-main);
  position:relative;overflow:hidden;
}
.login-section::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse at 20% 50%,rgba(212,175,55,.07) 0%,transparent 60%),
             radial-gradient(ellipse at 80% 20%,rgba(255,255,255,.03) 0%,transparent 50%);
}
.orb{position:absolute;border-radius:50%;filter:blur(100px);animation:float 10s ease-in-out infinite;}
.orb1{width:350px;height:350px;background:rgba(212,175,55,.08);top:-50px;right:-50px;animation-delay:0s;}
.orb2{width:250px;height:250px;background:rgba(255,255,255,.02);bottom:-50px;left:-50px;animation-delay:3s;}
@keyframes float{0%,100%{transform:translateY(0) scale(1);}50%{transform:translateY(-20px) scale(1.05);}}

.login-card{
  position:relative;z-index:10;width:420px;
  background:rgba(18,18,18,0.75);
  backdrop-filter:blur(25px);-webkit-backdrop-filter:blur(25px);
  border:1px solid var(--border);
  border-radius:24px;padding:48px 40px;
  box-shadow:0 30px 70px rgba(0,0,0,.8), inset 0 1px 0 rgba(255,255,255,.05);
  animation:slideUp .8s cubic-bezier(0.16, 1, 0.3, 1);
  transition: border-color 0.4s ease;
}
.login-card:hover {
  border-color: rgba(212, 175, 55, 0.25);
}
@keyframes slideUp{from{opacity:0;transform:translateY(30px);}to{opacity:1;transform:translateY(0);}}

.logo-wrap{text-align:center;margin-bottom:32px;}
.logo-icon{
  width:64px;height:64px;border-radius:18px;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;
  background:linear-gradient(135deg, var(--primary), var(--primary-soft));
  box-shadow:0 8px 30px rgba(212, 175, 55, 0.25);font-size:26px;
  color: #050505;
}
.brand-name{font-size:28px;font-weight:900;letter-spacing:2px;font-family:'Inter', sans-serif;}
.brand-name .dezo{color:var(--accent);}
.brand-name .pay{color:var(--primary);background:linear-gradient(135deg, var(--primary), var(--primary-soft));-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
.tagline{color:var(--text-secondary);font-size:13px;margin-top:6px;font-weight: 500;letter-spacing: 0.5px;}

.form-group{margin-bottom:22px;}
.form-group label{display:block;font-size:13px;font-weight:600;color:var(--text-secondary);margin-bottom:8px;letter-spacing:0.5px;}
.form-group input{
  width:100%;padding:14px 16px;background:rgba(255,255,255,.03);
  border:1px solid var(--border);border-radius:12px;
  color:var(--text-main);font-size:14px;font-family:'Inter',sans-serif;
  transition:all .3s cubic-bezier(0.16, 1, 0.3, 1);outline:none;
}
.form-group input:focus{
  border-color:var(--primary);
  background:rgba(212,175,55,.03);
  box-shadow:0 0 0 3px rgba(212,175,55,.15);
}
.form-group input::placeholder{color:rgba(255,255,255,.25);}
.input-wrap{position:relative;}
.input-wrap input{padding-right:44px;}
.eye-toggle{position:absolute;right:16px;top:50%;transform:translateY(-50%);cursor:pointer;color:var(--text-secondary);transition: color 0.2s;}
.eye-toggle:hover{color: var(--primary);}

.login-btn{
  width:100%;padding:16px;border:none;border-radius:12px;cursor:pointer;
  background:linear-gradient(135deg, var(--primary), var(--primary-dark));
  color:#050505;font-size:15px;font-weight:700;letter-spacing:.8px;
  transition:all .3s cubic-bezier(0.16, 1, 0.3, 1);margin-top:8px;position:relative;overflow:hidden;
  box-shadow: 0 4px 15px rgba(212, 175, 55, 0.15);
}
.login-btn:hover{
  transform:translateY(-2px);
  box-shadow:0 12px 35px rgba(212,175,55,.35);
}
.login-btn::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg, var(--primary-soft), var(--primary));opacity:0;transition:.3s;
}
.login-btn:hover::after{opacity:1;}
.login-btn span{position:relative;z-index:2;display: flex;align-items: center;justify-content: center;gap: 8px;}

.form-footer{text-align:center;margin-top:26px;font-size:13px;color:var(--text-secondary);}
.form-footer a{color:var(--primary);font-weight:600;text-decoration:none;transition:color 0.2s;}
.form-footer a:hover{color:var(--primary-soft);text-decoration:underline;}

#otpformbox { display: none; }
.otp-inputs { display: flex; justify-content: center; margin-bottom: 24px; gap: 10px; }
.otp-input { width: 45px; height: 45px; font-size: 18px; text-align: center; background:rgba(255,255,255,.03); border:1px solid var(--border); border-radius:12px; color:var(--text-main); outline:none; transition:all .3s; }
.otp-input:focus { border-color:var(--primary); background:rgba(212,175,55,.03); box-shadow:0 0 0 3px rgba(212,175,55,.15); }

.simple-spinner { width: 30px; height: 30px; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); }
.simple-spinner span { display: block; width: 60px; height: 60px; border: 3px solid transparent; border-radius: 50%; border-right-color: var(--primary); animation: spinner-anim 0.8s linear infinite; }
@keyframes spinner-anim { from { transform: rotate(0); } to { transform: rotate(360deg); } }
#loading_ajax { display: none; background: rgba(0, 0, 0, 0.7); position: fixed; bottom: 0; left: 0; right: 0; top: 0; z-index: 9998; backdrop-filter: blur(5px); }

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
      <div class="logo-icon"><i class="fa-solid fa-shield-halved"></i></div>
      <div class="brand-name"><span class="dezo">DEZO</span><span class="pay">PAY</span></div>
      <div class="tagline">PREMIUM UPI GATEWAY</div>
    </div>
    
    <!-- Login Form -->
    <div id="loginformbox">
      <form class="login-form" method="POST" id="login_form">
        <div class="form-group">
          <label for="mobile">MOBILE NUMBER</label>
          <input type="text" id="mobile" name="username" placeholder="Enter your 10-digit number" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
        </div>
        <div class="form-group">
          <label for="passwordlogin">PASSWORD</label>
          <div class="input-wrap">
            <input type="password" id="passwordlogin" name="password" placeholder="••••••••••••" required>
            <span class="eye-toggle"><i class="fa fa-eye-slash"></i></span>
          </div>
        </div>
        
        <div style="display:flex;justify-content:space-between;font-size:12px;color:var(--text-secondary);margin-bottom:24px;">
          <label style="display:flex;align-items:center;gap:6px;cursor:pointer;"><input type="checkbox" id="staySigned" style="accent-color:var(--primary)"> Stay signed in</label>
          <a href="forgotpassword" style="color:var(--primary);text-decoration:none;font-weight:500;transition:color 0.2s;">Forgot Password?</a>
        </div>
        
        <!-- Google reCAPTCHA -->
        <div class="g-recaptcha mb-3" data-sitekey="<?= $website_settings['recaptcha_site_key'] ?>" style="margin-bottom:24px; transform:scale(0.85); transform-origin:0 0; border-radius: 8px; overflow: hidden; border: 1px solid var(--border);"></div>
        
        <button class="login-btn" type="submit" name="submit"><span><i class="fa-solid fa-lock"></i> Secure Login</span></button>
        <div class="form-footer">Partner onboarding? <a href="register">Register Now</a></div>
      </form>
    </div>

    <!-- OTP Form -->
    <div id="otpformbox">
      <form class="login-form" method="POST" id="loginotpform">
        <input type="hidden" name="useridmodal" id="useridmodal">
        <div style="text-align:center; margin-bottom: 24px;">
            <h3 style="font-size:18px; margin-bottom:8px; font-weight:700; color:var(--accent);">Verify Identity</h3>
            <p style="font-size:13px; color:var(--text-secondary);">We sent a verification code to your device.</p>
        </div>
        
        <div class="otp-inputs">
          <input type="text" maxlength="1" class="otp-input" id="otp1" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp2" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp3" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp4" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp5" autocomplete="off">
          <input type="text" maxlength="1" class="otp-input" id="otp6" autocomplete="off">
        </div>
        
        <button class="login-btn" type="submit" name="submit"><span><i class="fa-solid fa-circle-check"></i> Verify &amp; Access</span></button>
        
        <div class="form-footer mt-3" style="margin-top:20px;">
          Didn't receive the code? 
          <a href="#" id="resendOtpBtn" style="pointer-events:none; opacity:0.5; color:var(--primary);">Resend OTP</a> 
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