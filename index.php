
<?php
require_once 'merchant/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DEZOPAY - Premium UPI Payment Gateway</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Inter',sans-serif;background:#0a0a14;color:#fff;overflow-x:hidden;}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 5%;
    background: rgba(10, 10, 20, 0.8);
    backdrop-filter: blur(10px);
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}
.brand-name { font-size: 24px; font-weight: 900; letter-spacing: 2px; }
.brand-name .dezo { color: #fff; }
.brand-name .pay { color: #6c63ff; }
.nav-links a { color: rgba(255,255,255,0.7); text-decoration: none; margin-left: 32px; font-weight: 500; font-size: 14px; transition: 0.3s; }
.nav-links a:hover { color: #fff; }
.nav-btn { background: linear-gradient(135deg, #6c63ff, #3b82f6); color: #fff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; margin-left: 32px; transition: 0.3s; }
.nav-btn:hover { box-shadow: 0 4px 20px rgba(108,99,255,0.4); transform: translateY(-2px); }

/* Hero */
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 120px 5% 60px;
    position: relative;
    overflow: hidden;
}
.hero::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse at 50% 0%, rgba(108,99,255,0.15) 0%, transparent 60%),
                radial-gradient(ellipse at 50% 100%, rgba(59,130,246,0.1) 0%, transparent 50%);
    z-index: -1;
}
.hero-content { max-width: 800px; position: relative; z-index: 10; }
.hero-badge { display: inline-block; padding: 6px 16px; background: rgba(108,99,255,0.1); border: 1px solid rgba(108,99,255,0.2); border-radius: 30px; color: #6c63ff; font-size: 13px; font-weight: 600; margin-bottom: 24px; }
.hero h1 { font-size: 64px; font-weight: 900; line-height: 1.1; margin-bottom: 24px; letter-spacing: -1px; }
.hero h1 span { background: linear-gradient(135deg, #6c63ff, #3b82f6); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
.hero p { font-size: 18px; color: rgba(255,255,255,0.6); margin-bottom: 40px; line-height: 1.6; max-width: 600px; margin-left: auto; margin-right: auto; }
.hero-btns { display: flex; gap: 16px; justify-content: center; }
.btn-primary { background: linear-gradient(135deg, #6c63ff, #3b82f6); color: #fff; padding: 16px 32px; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 16px; transition: 0.3s; }
.btn-primary:hover { box-shadow: 0 8px 30px rgba(108,99,255,0.4); transform: translateY(-2px); }
.btn-secondary { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; padding: 16px 32px; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 16px; transition: 0.3s; }
.btn-secondary:hover { background: rgba(255,255,255,0.1); transform: translateY(-2px); }

/* Features */
.features { padding: 100px 5%; background: #0d0d1a; }
.section-title { text-align: center; margin-bottom: 64px; }
.section-title h2 { font-size: 40px; font-weight: 800; margin-bottom: 16px; }
.section-title p { color: rgba(255,255,255,0.5); font-size: 16px; max-width: 500px; margin: 0 auto; }
.grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px; max-width: 1200px; margin: 0 auto; }
.feature-card { background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); padding: 40px; border-radius: 24px; transition: 0.3s; }
.feature-card:hover { transform: translateY(-5px); border-color: rgba(108,99,255,0.3); background: rgba(255,255,255,0.05); box-shadow: 0 20px 40px rgba(0,0,0,0.4); }
.feature-icon { width: 64px; height: 64px; border-radius: 16px; background: linear-gradient(135deg, rgba(108,99,255,0.1), rgba(59,130,246,0.1)); display: flex; align-items: center; justify-content: center; font-size: 24px; color: #6c63ff; margin-bottom: 24px; }
.feature-card h3 { font-size: 20px; font-weight: 700; margin-bottom: 12px; }
.feature-card p { color: rgba(255,255,255,0.5); line-height: 1.6; font-size: 14px; }

/* Dashboard Preview */
.preview-section { padding: 100px 5%; text-align: center; }
.preview-img { max-width: 1000px; width: 100%; margin: 0 auto; border-radius: 24px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 40px 100px rgba(0,0,0,0.5); position: relative; }
.preview-img::before { content: ''; position: absolute; inset: -2px; background: linear-gradient(135deg, #6c63ff, #3b82f6); border-radius: 26px; z-index: -1; opacity: 0.5; filter: blur(20px); }

/* Footer */
.footer { padding: 60px 5% 40px; border-top: 1px solid rgba(255,255,255,0.05); text-align: center; color: rgba(255,255,255,0.4); font-size: 14px; }
</style>
</head>
<body>

<nav class="navbar">
    <div class="brand-name"><span class="dezo">DEZO</span><span class="pay">PAY</span></div>
    <div class="nav-links">
        <a href="#features">Features</a>
        <a href="#developers">Developers</a>
        <a href="#contact">Contact</a>
        <a href="merchant/register">Create Account</a>
        <a href="merchant/index" class="nav-btn">Sign In</a>
    </div>
</nav>

<section class="hero">
    <div class="hero-content">
        <div class="hero-badge">🚀 The Next Generation UPI Gateway</div>
        <h1>Instant Payments.<br><span>Zero Hassle.</span></h1>
        <p>Experience the fastest, most reliable UPI payment gateway designed for modern businesses. 0% transaction fees on payments received using DEZOPAY APIs.</p>
        <div class="hero-btns">
            <a href="merchant/register" class="btn-primary">Get Started Now</a>
            <a href="merchant/index" class="btn-secondary">View Dashboard</a>
        </div>
    </div>
</section>

<section id="features" class="features">
    <div class="section-title">
        <h2>Why Choose DEZOPAY?</h2>
        <p>We provide enterprise-grade infrastructure to help you scale your business without worrying about payment failures.</p>
    </div>
    <div class="grid">
        <div class="feature-card">
            <div class="feature-icon"><i class="fas fa-bolt"></i></div>
            <h3>Lightning Fast</h3>
            <p>Our distributed infrastructure ensures your payments are processed in milliseconds, offering the highest success rates in the industry.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
            <h3>Bank-Grade Security</h3>
            <p>End-to-end encryption and advanced fraud detection systems keep your money and customer data completely safe.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><i class="fas fa-code"></i></div>
            <h3>Easy Integration</h3>
            <p>Integrate our powerful APIs into your website or app in less than 5 minutes with our comprehensive developer documentation.</p>
        </div>
    </div>
</section>

<section class="preview-section">
    <div class="section-title">
        <h2>Powerful Analytics Dashboard</h2>
        <p>Track your business growth, monitor transactions in real-time, and get deep insights with our beautiful dashboard.</p>
    </div>
    <div style="position:relative; max-width:1000px; margin:0 auto; border-radius:24px; overflow:hidden; border:1px solid rgba(255,255,255,0.1); box-shadow:0 30px 80px rgba(0,0,0,0.5);">
        <!-- Dashboard mockup image placeholder or CSS mock -->
        <div style="background:#0d0d1a; padding:40px; text-align:left;">
            <div style="display:flex; justify-content:space-between; margin-bottom:30px;">
                <div style="font-size:24px; font-weight:800;">Payment <span>Analytics</span></div>
                <div style="background:linear-gradient(135deg,#22c55e,#16a34a); padding:8px 16px; border-radius:8px; font-weight:600;">💰 Balance: ₹24,500.00</div>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:20px;">
                <div style="background:rgba(255,255,255,0.05); padding:20px; border-radius:16px;">
                    <div style="color:rgba(255,255,255,0.5); font-size:12px;">Today's Success</div>
                    <div style="font-size:28px; font-weight:800; color:#22c55e;">₹1,24,590</div>
                </div>
                <div style="background:rgba(255,255,255,0.05); padding:20px; border-radius:16px;">
                    <div style="color:rgba(255,255,255,0.5); font-size:12px;">Today's Pending</div>
                    <div style="font-size:28px; font-weight:800; color:#eab308;">₹8,340</div>
                </div>
                <div style="background:rgba(255,255,255,0.05); padding:20px; border-radius:16px;">
                    <div style="color:rgba(255,255,255,0.5); font-size:12px;">Today's Failed</div>
                    <div style="font-size:28px; font-weight:800; color:#ef4444;">₹3,210</div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="brand-name" style="font-size:20px; margin-bottom:16px;"><span class="dezo">DEZO</span><span class="pay">PAY</span></div>
    <p>&copy; <?= date('Y') ?> DEZOPAY. All rights reserved.</p>
</footer>

</body>
</html>