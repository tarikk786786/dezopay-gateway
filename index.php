
<?php
require_once 'merchant/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEZOPAY – Secure Online Payment Gateway for Businesses</title>
    <meta name="description" content="DEZOPAY is a premium payment gateway platform built for businesses to accept online payments with secure checkout, fast payment confirmation, clean dashboard, and professional payment experience.">
    <meta property="og:title" content="DEZOPAY – Secure Online Payment Gateway for Businesses">
    <meta property="og:description" content="DEZOPAY is a premium payment gateway platform built for businesses to accept online payments with secure checkout, fast payment confirmation, clean dashboard, and professional payment experience.">
    <meta property="og:type" content="website">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-main: #050505;
            --bg-secondary: #0E0E0E;
            --card-bg: #151515;
            --primary: #D4AF37;
            --primary-soft: #F5D76E;
            --accent: #FFFFFF;
            --text-main: #F8F8F8;
            --text-secondary: #BDBDBD;
            --border: rgba(255, 255, 255, 0.10);
            --success: #19C37D;
            --danger: #FF4D4F;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 { color: var(--accent); line-height: 1.2; font-weight: 700; }
        p { color: var(--text-secondary); }
        a { text-decoration: none; color: var(--text-main); transition: color 0.3s ease; }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 5%; }

        .btn {
            display: inline-block; padding: 14px 28px; border-radius: 8px;
            font-weight: 600; font-size: 15px; cursor: pointer;
            transition: all 0.3s ease; text-align: center; border: none; outline: none;
        }

        .btn-primary { background-color: var(--primary); color: var(--bg-main); }
        .btn-primary:hover { background-color: var(--primary-soft); box-shadow: 0 4px 20px rgba(212, 175, 55, 0.3); transform: translateY(-2px); }

        .btn-secondary { background-color: transparent; color: var(--primary); border: 1px solid var(--primary); }
        .btn-secondary:hover { background-color: rgba(212, 175, 55, 0.1); transform: translateY(-2px); }

        .section { padding: 100px 0; }
        .section-alt { background-color: var(--bg-secondary); }

        .section-header { text-align: center; margin-bottom: 60px; max-width: 700px; margin-left: auto; margin-right: auto; }
        .section-header h2 { font-size: 40px; margin-bottom: 16px; letter-spacing: -1px; }
        .section-header h2 span { color: var(--primary); }
        .section-header p { font-size: 18px; }

        /* 1. Navbar */
        .navbar {
            position: fixed; top: 0; width: 100%; padding: 20px 5%;
            display: flex; justify-content: space-between; align-items: center;
            background: rgba(5, 5, 5, 0.85); backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border); z-index: 1000;
        }

        .brand { font-size: 24px; font-weight: 900; letter-spacing: 2px; color: var(--accent); display: flex; align-items: center; gap: 10px; }
        .brand-icon { color: var(--primary); font-size: 28px; }

        .nav-links { display: flex; gap: 32px; align-items: center; }
        .nav-links a.nav-item { font-size: 14px; font-weight: 500; color: var(--text-secondary); }
        .nav-links a.nav-item:hover { color: var(--primary); }

        .nav-btns { display: flex; gap: 16px; }

        .mobile-toggle { display: none; font-size: 24px; cursor: pointer; color: var(--text-main); }

        /* 2-5. Hero Section */
        .hero { min-height: 100vh; display: flex; align-items: center; padding-top: 100px; position: relative; overflow: hidden; }
        .hero-glow { position: absolute; top: 20%; left: 50%; transform: translateX(-50%); width: 600px; height: 600px; background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, rgba(5,5,5,0) 70%); z-index: 0; pointer-events: none; }
        .hero-content { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; position: relative; z-index: 10; }
        .hero-text h1 { font-size: 56px; line-height: 1.1; margin-bottom: 24px; letter-spacing: -1.5px; animation: slideUp 0.8s ease forwards; }
        .hero-text h1 span { color: var(--primary); }
        .hero-text p { font-size: 18px; margin-bottom: 40px; max-width: 500px; animation: slideUp 1s ease forwards; opacity: 0; }
        .hero-btns { display: flex; gap: 16px; animation: slideUp 1.2s ease forwards; opacity: 0; }

        @keyframes slideUp { 0% { opacity: 0; transform: translateY(30px); } 100% { opacity: 1; transform: translateY(0); } }

        .hero-visual { position: relative; width: 100%; height: 500px; animation: fadeIn 1.5s ease forwards; opacity: 0; }
        @keyframes fadeIn { to { opacity: 1; } }

        .mockup-card { background: var(--card-bg); border: 1px solid var(--border); border-radius: 16px; padding: 24px; position: absolute; box-shadow: 0 20px 40px rgba(0,0,0,0.5); }
        .mockup-main { width: 100%; max-width: 450px; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2; }
        .mockup-float-1 { width: 250px; top: 10%; right: -10%; z-index: 3; animation: float 6s ease-in-out infinite; }
        .mockup-float-2 { width: 250px; bottom: 5%; left: -5%; z-index: 1; animation: float 8s ease-in-out infinite reverse; }
        
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }

        .mockup-header { display: flex; justify-content: space-between; margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 15px; }
        .mockup-amount { font-size: 32px; font-weight: 700; color: var(--accent); margin-bottom: 10px; }
        
        .success-pulse { display: flex; align-items: center; gap: 12px; margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border); }
        .success-icon { width: 32px; height: 32px; border-radius: 50%; background: rgba(25, 195, 125, 0.1); color: var(--success); display: flex; align-items: center; justify-content: center; font-size: 14px; animation: pulse 2s infinite; }

        /* 6. Problem Section */
        .problem-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px; }
        .problem-card { background: var(--bg-main); border: 1px solid var(--border); padding: 30px; border-radius: 12px; transition: transform 0.3s ease; }
        .problem-card:hover { transform: translateY(-5px); border-color: rgba(255, 77, 79, 0.3); }
        .problem-icon { color: var(--danger); font-size: 24px; margin-bottom: 20px; }
        .problem-card h3 { font-size: 18px; margin-bottom: 12px; color: var(--text-main); }

        /* 7. Features Section */
        .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px; }
        .feature-card { background: var(--card-bg); border: 1px solid var(--border); padding: 40px 30px; border-radius: 16px; transition: all 0.3s ease; }
        .feature-card:hover { transform: translateY(-5px); border-color: var(--primary); box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .feature-icon-wrapper { width: 56px; height: 56px; border-radius: 12px; background: rgba(212, 175, 55, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 24px; }
        .feature-card h3 { font-size: 20px; margin-bottom: 12px; }

        /* 8. Solutions Section */
        .solutions-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 24px; }
        .solution-card { display: flex; align-items: flex-start; gap: 20px; padding: 30px; background: var(--card-bg); border: 1px solid var(--border); border-radius: 12px; transition: 0.3s; }
        .solution-card:hover { border-color: var(--primary); }
        .solution-icon { font-size: 28px; color: var(--primary); }

        /* 9. Security Section */
        .security-container { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
        .security-visual { text-align: center; position: relative; }
        .shield-icon { font-size: 120px; color: var(--primary); filter: drop-shadow(0 0 30px rgba(212, 175, 55, 0.2)); animation: pulseglow 4s infinite; }
        @keyframes pulseglow { 0%, 100% { filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.2)); } 50% { filter: drop-shadow(0 0 50px rgba(212, 175, 55, 0.5)); } }
        .security-list { list-style: none; margin-top: 30px; }
        .security-list li { display: flex; align-items: center; gap: 16px; margin-bottom: 20px; font-size: 16px; color: var(--text-secondary); }
        .security-list li i { color: var(--success); font-size: 20px; }

        /* 10. Payment Flow */
        .flow-container { display: flex; justify-content: space-between; position: relative; margin-top: 40px; }
        .flow-container::before { content: ''; position: absolute; top: 40px; left: 50px; right: 50px; height: 2px; background: var(--border); z-index: 0; }
        .flow-step { position: relative; z-index: 1; text-align: center; width: 18%; }
        .flow-icon { width: 80px; height: 80px; border-radius: 50%; background: var(--card-bg); border: 2px solid var(--primary); display: flex; align-items: center; justify-content: center; font-size: 24px; color: var(--primary); margin: 0 auto 20px; box-shadow: 0 0 20px rgba(0,0,0,0.5); }
        .flow-step h4 { font-size: 16px; margin-bottom: 8px; }
        .flow-step p { font-size: 13px; }

        /* 11. Dashboard Preview */
        .dashboard-preview { background: var(--card-bg); border: 1px solid var(--border); border-radius: 20px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.6); }
        .dashboard-header { background: rgba(255,255,255,0.02); padding: 20px 30px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
        .dashboard-body { padding: 30px; }
        .dash-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px; }
        .dash-stat-card { background: var(--bg-main); padding: 20px; border-radius: 12px; border: 1px solid var(--border); }
        .dash-stat-title { font-size: 13px; color: var(--text-secondary); margin-bottom: 10px; }
        .dash-stat-value { font-size: 28px; font-weight: 700; color: var(--accent); }
        .dash-table-wrap { background: var(--bg-main); border-radius: 12px; border: 1px solid var(--border); padding: 20px; overflow-x: auto; }
        .dash-table { width: 100%; border-collapse: collapse; min-width: 600px; }
        .dash-table th, .dash-table td { padding: 15px; text-align: left; border-bottom: 1px solid var(--border); font-size: 14px; }
        .dash-table th { color: var(--text-secondary); font-weight: 500; }
        .status-badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .status-success { background: rgba(25, 195, 125, 0.1); color: var(--success); }
        .status-failed { background: rgba(255, 77, 79, 0.1); color: var(--danger); }
        .status-pending { background: rgba(212, 175, 55, 0.1); color: var(--primary); }

        /* 12. Developers */
        .dev-container { display: grid; grid-template-columns: 1fr 1.2fr; gap: 50px; align-items: center; }
        .code-window { background: #1e1e1e; border-radius: 12px; border: 1px solid #333; overflow: hidden; }
        .code-header { background: #2d2d2d; padding: 12px 20px; display: flex; gap: 8px; }
        .code-dot { width: 12px; height: 12px; border-radius: 50%; }
        .code-dot.r { background: #ff5f56; } .code-dot.y { background: #ffbd2e; } .code-dot.g { background: #27c93f; }
        .code-body { padding: 24px; font-family: 'Courier New', Courier, monospace; font-size: 14px; color: #d4d4d4; line-height: 1.6; overflow-x: auto; }
        .code-body .keyword { color: #569cd6; } .code-body .string { color: #ce9178; } .code-body .function { color: #dcdcaa; }

        /* 13. Pricing */
        .pricing-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
        .pricing-card { background: var(--card-bg); border: 1px solid var(--border); border-radius: 16px; padding: 40px 30px; text-align: center; position: relative; }
        .pricing-popular { border-color: var(--primary); transform: scale(1.05); z-index: 2; box-shadow: 0 20px 40px rgba(0,0,0,0.5); }
        .popular-badge { position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--primary); color: var(--bg-main); padding: 6px 16px; border-radius: 20px; font-size: 12px; font-weight: 700; }
        .pricing-price { font-size: 48px; font-weight: 800; color: var(--accent); margin: 20px 0; }
        .pricing-price span { font-size: 18px; color: var(--text-secondary); font-weight: 400; }
        .pricing-list { list-style: none; margin: 30px 0; text-align: left; }
        .pricing-list li { margin-bottom: 16px; display: flex; align-items: center; gap: 12px; color: var(--text-secondary); font-size: 15px; }
        .pricing-list li i { color: var(--primary); }

        /* 14. Trust */
        .trust-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; text-align: center; }
        .trust-item h4 { font-size: 32px; margin-bottom: 10px; color: var(--primary); }

        /* 15. Testimonials */
        .testimonial-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
        .testimonial-card { background: var(--card-bg); padding: 30px; border-radius: 16px; border: 1px solid var(--border); }
        .stars { color: var(--primary); margin-bottom: 20px; font-size: 14px; }
        .testimonial-text { font-size: 16px; font-style: italic; margin-bottom: 24px; }
        .client-info { display: flex; align-items: center; gap: 16px; }
        .client-avatar { width: 50px; height: 50px; border-radius: 50%; background: rgba(212, 175, 55, 0.1); display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--primary); }

        /* 16. FAQ */
        .faq-item { background: var(--card-bg); border: 1px solid var(--border); border-radius: 12px; margin-bottom: 16px; overflow: hidden; transition: 0.3s; }
        .faq-question { padding: 24px; display: flex; justify-content: space-between; align-items: center; cursor: pointer; font-weight: 600; font-size: 18px; transition: color 0.3s; }
        .faq-question:hover { color: var(--primary); }
        .faq-answer { padding: 0 24px; max-height: 0; overflow: hidden; transition: max-height 0.4s ease, padding 0.4s ease; color: var(--text-secondary); }
        .faq-item.active { border-color: var(--primary); }
        .faq-item.active .faq-answer { padding: 0 24px 24px; max-height: 300px; }
        .faq-item.active .faq-question i { transform: rotate(180deg); color: var(--primary); }
        .faq-question i { transition: transform 0.3s ease; }

        /* 17. Contact */
        .contact-container { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; }
        .contact-form { background: var(--card-bg); padding: 40px; border-radius: 16px; border: 1px solid var(--border); }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        .form-group.full { grid-column: 1 / -1; }
        .form-label { display: block; margin-bottom: 8px; font-size: 14px; color: var(--text-secondary); }
        .form-control { width: 100%; padding: 14px 16px; background: var(--bg-main); border: 1px solid var(--border); border-radius: 8px; color: var(--text-main); font-family: 'Inter', sans-serif; font-size: 15px; transition: border-color 0.3s ease; }
        .form-control:focus { outline: none; border-color: var(--primary); }
        textarea.form-control { height: 120px; resize: vertical; }

        /* 18. Footer */
        .footer { background: var(--bg-secondary); border-top: 1px solid var(--border); padding: 80px 0 40px; }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 60px; }
        .footer-brand p { margin-top: 20px; font-size: 14px; max-width: 300px; }
        .footer-title { color: var(--accent); font-size: 16px; font-weight: 600; margin-bottom: 24px; }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a { color: var(--text-secondary); font-size: 14px; }
        .footer-links a:hover { color: var(--primary); }
        .footer-bottom { padding-top: 30px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; font-size: 14px; color: var(--text-secondary); }
        .social-links { display: flex; gap: 16px; }
        .social-links a { width: 40px; height: 40px; border-radius: 50%; background: var(--card-bg); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border); }
        .social-links a:hover { color: var(--primary); border-color: var(--primary); }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-content, .security-container, .dev-container, .contact-container { grid-template-columns: 1fr; }
            .pricing-grid { grid-template-columns: 1fr; max-width: 500px; margin: 0 auto; }
            .pricing-popular { transform: none; }
            .flow-container { flex-direction: column; align-items: center; gap: 40px; }
            .flow-container::before { display: none; }
            .flow-step { width: 100%; max-width: 300px; }
            .dash-stats { grid-template-columns: 1fr 1fr; }
            .trust-grid { grid-template-columns: 1fr 1fr; }
        }
        
        @media (max-width: 768px) {
            .nav-links, .nav-btns { display: none; }
            .mobile-toggle { display: block; }
            .hero-text h1 { font-size: 40px; }
            .hero-btns { flex-direction: column; }
            .testimonial-grid { grid-template-columns: 1fr; }
            .form-grid { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
            .dash-stats { grid-template-columns: 1fr; }
            .solutions-grid { grid-template-columns: 1fr; }
            .trust-grid { grid-template-columns: 1fr; }
        }

        /* Mobile Menu */
        .mobile-menu { position: fixed; top: 0; left: -100%; width: 100%; height: 100vh; background: var(--bg-main); z-index: 1001; transition: 0.3s; padding: 80px 5%; display: flex; flex-direction: column; gap: 24px; }
        .mobile-menu.open { left: 0; }
        .mobile-menu a { font-size: 20px; font-weight: 600; border-bottom: 1px solid var(--border); padding-bottom: 16px; }
        .close-menu { position: absolute; top: 20px; right: 5%; font-size: 28px; cursor: pointer; }
    </style>
</head>
<body>

    <!-- 1. Navbar -->
    <nav class="navbar">
        <a href="#" class="brand">
            <i class="fa-solid fa-gem brand-icon"></i> DEZOPAY
        </a>
        <div class="nav-links">
            <a href="#features" class="nav-item">Features</a>
            <a href="#solutions" class="nav-item">Solutions</a>
            <a href="#security" class="nav-item">Security</a>
            <a href="#pricing" class="nav-item">Pricing</a>
            <a href="#developers" class="nav-item">Developers</a>
            <a href="#contact" class="nav-item">Contact</a>
        </div>
        <div class="nav-btns">
            <a href="merchant/index.php" class="btn btn-secondary" style="padding: 10px 20px;">Sign In</a>
            <a href="merchant/register.php" class="btn btn-primary" style="padding: 10px 20px;">Create Account</a>
        </div>
        <div class="mobile-toggle" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div>
    </nav>

    <div class="mobile-menu" id="mobileMenu">
        <div class="close-menu" onclick="toggleMenu()"><i class="fa-solid fa-xmark"></i></div>
        <a href="#features" onclick="toggleMenu()">Features</a>
        <a href="#solutions" onclick="toggleMenu()">Solutions</a>
        <a href="#security" onclick="toggleMenu()">Security</a>
        <a href="#pricing" onclick="toggleMenu()">Pricing</a>
        <a href="#developers" onclick="toggleMenu()">Developers</a>
        <a href="merchant/index.php" onclick="toggleMenu()" style="color: var(--primary);">Sign In</a>
        <a href="merchant/register.php" onclick="toggleMenu()" style="color: var(--primary);">Create Account</a>
    </div>

    <!-- 2-5. Hero Section -->
    <section class="hero">
        <div class="hero-glow"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Accept Payments Online with <span>Speed, Security & Confidence</span></h1>
                    <p>DEZOPAY is the premium payment gateway platform built for businesses. Experience seamless checkout, real-time settlements, and a professional payment experience.</p>
                    <div class="hero-btns">
                        <a href="merchant/register.php" class="btn btn-primary">Start Accepting Payments</a>
                        <a href="#features" class="btn btn-secondary">View Features</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="mockup-card mockup-main">
                        <div class="mockup-header">
                            <div>
                                <div style="color:var(--text-secondary); font-size:12px;">DEZOPAY Checkout</div>
                                <div style="font-weight:600;">Premium Services LLC</div>
                            </div>
                            <div class="brand-icon"><i class="fa-solid fa-gem"></i></div>
                        </div>
                        <div class="mockup-amount">₹4,999.00</div>
                        <div style="margin-bottom: 20px; font-size: 14px; color: var(--text-secondary);">Select Payment Method</div>
                        <div style="display:flex; gap:10px; margin-bottom:15px;">
                            <div style="flex:1; border:1px solid var(--primary); border-radius:8px; padding:12px; text-align:center; background:rgba(212,175,55,0.1); color:var(--primary); font-weight:600;">UPI</div>
                            <div style="flex:1; border:1px solid var(--border); border-radius:8px; padding:12px; text-align:center; color:var(--text-secondary);">Cards</div>
                            <div style="flex:1; border:1px solid var(--border); border-radius:8px; padding:12px; text-align:center; color:var(--text-secondary);">NetBanking</div>
                        </div>
                        <button class="btn btn-primary" style="width:100%; margin-top:10px;">Pay Now</button>
                    </div>
                    
                    <div class="mockup-card mockup-float-1">
                        <div style="font-size: 14px; font-weight: 600; margin-bottom: 15px;">Revenue Growth</div>
                        <div style="height: 60px; display: flex; align-items: flex-end; gap: 8px;">
                            <div style="width: 15%; background: var(--border); height: 40%; border-radius: 4px;"></div>
                            <div style="width: 15%; background: var(--border); height: 60%; border-radius: 4px;"></div>
                            <div style="width: 15%; background: var(--primary); height: 80%; border-radius: 4px;"></div>
                            <div style="width: 15%; background: var(--primary); height: 100%; border-radius: 4px; box-shadow: 0 0 10px rgba(212,175,55,0.5);"></div>
                        </div>
                        <div style="margin-top: 15px; font-size: 24px; font-weight: 700;">+42.8% <i class="fa-solid fa-arrow-trend-up" style="color:var(--success); font-size:16px;"></i></div>
                    </div>
                    
                    <div class="mockup-card mockup-float-2">
                        <div style="display:flex; align-items:center; gap:15px;">
                            <div class="success-icon"><i class="fa-solid fa-check"></i></div>
                            <div>
                                <div style="font-size:14px; font-weight:600;">Payment Received</div>
                                <div style="font-size:12px; color:var(--text-secondary);">txn_8943209582</div>
                            </div>
                        </div>
                        <div style="margin-top: 15px; font-size: 20px; font-weight: 700; color:var(--success);">+ ₹12,500.00</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Problem Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Tired of Payment <span>Frictions?</span></h2>
                <p>Legacy payment gateways hold businesses back with outdated technology and poor user experiences.</p>
            </div>
            <div class="problem-grid">
                <div class="problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <h3>High Failure Rates</h3>
                    <p>Customers abandon carts when transactions fail or timeout due to poor bank routing.</p>
                </div>
                <div class="problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-hourglass-half"></i></div>
                    <h3>Slow Settlements</h3>
                    <p>Waiting days for your own money disrupts cash flow and hurts business growth.</p>
                </div>
                <div class="problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-puzzle-piece"></i></div>
                    <h3>Complex Integration</h3>
                    <p>Wasting developer hours on poorly documented APIs and broken SDKs.</p>
                </div>
                <div class="problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Lack of Trust</h3>
                    <p>Clunky, unbranded checkout pages make customers suspicious and drop off.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Features Section -->
    <section id="features" class="section">
        <div class="container">
            <div class="section-header">
                <h2>Premium <span>Features</span></h2>
                <p>Everything you need to accept payments, manage transactions, and scale your business securely.</p>
            </div>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-bolt"></i></div>
                    <h3>Fast Checkout Experience</h3>
                    <p>Optimized, frictionless checkout flows that increase conversion rates and reduce cart abandonment.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-wallet"></i></div>
                    <h3>Multiple Payment Modes</h3>
                    <p>Accept UPI, Credit/Debit Cards, NetBanking, and Wallets seamlessly through one unified integration.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-chart-line"></i></div>
                    <h3>Business Dashboard</h3>
                    <p>Get real-time insights, download reports, and manage your entire business financial health in one place.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-bell"></i></div>
                    <h3>Instant Payment Alerts</h3>
                    <p>Receive webhook notifications instantly as soon as a payment is successful, enabling immediate fulfillment.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-code"></i></div>
                    <h3>Developer Friendly Integration</h3>
                    <p>Clean, RESTful APIs with comprehensive documentation that your developers will love to work with.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-money-bill-transfer"></i></div>
                    <h3>Automated Settlements</h3>
                    <p>Track your settlements clearly and accurately. Know exactly when funds will hit your bank account.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Solutions Section -->
    <section id="solutions" class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Built for <span>Every Business</span></h2>
                <p>Whether you are an individual freelancer or an enterprise, DEZOPAY scales with you.</p>
            </div>
            <div class="solutions-grid">
                <div class="solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-store"></i></div>
                    <div>
                        <h3>E-Commerce Stores</h3>
                        <p style="font-size: 14px; margin-top: 8px;">Integrate directly with your store. Provide a smooth checkout experience that boosts sales.</p>
                    </div>
                </div>
                <div class="solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <div>
                        <h3>Agencies & SaaS</h3>
                        <p style="font-size: 14px; margin-top: 8px;">Handle recurring subscriptions and global payments with powerful API endpoints.</p>
                    </div>
                </div>
                <div class="solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                    <div>
                        <h3>Education Platforms</h3>
                        <p style="font-size: 14px; margin-top: 8px;">Collect course fees and manage student payments with easy-to-share payment links.</p>
                    </div>
                </div>
                <div class="solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div>
                        <h3>Service Businesses</h3>
                        <p style="font-size: 14px; margin-top: 8px;">Invoice clients professionally and get paid instantly securely via UPI or cards.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. Security Section -->
    <section id="security" class="section">
        <div class="container security-container">
            <div class="security-visual">
                <i class="fa-solid fa-shield-halved shield-icon"></i>
            </div>
            <div>
                <h2 style="font-size: 40px; margin-bottom: 20px;">Bank-Grade <span style="color: var(--primary);">Security</span></h2>
                <p style="font-size: 18px;">Your security is our top priority. DEZOPAY employs enterprise-level security protocols to ensure every transaction is protected against fraud and data breaches.</p>
                <ul class="security-list">
                    <li><i class="fa-solid fa-check-circle"></i> 256-bit AES Encryption for all transaction data.</li>
                    <li><i class="fa-solid fa-check-circle"></i> PCI-DSS Compliant infrastructure.</li>
                    <li><i class="fa-solid fa-check-circle"></i> Advanced AI-driven fraud monitoring and prevention.</li>
                    <li><i class="fa-solid fa-check-circle"></i> Secure, authenticated dashboard access.</li>
                    <li><i class="fa-solid fa-check-circle"></i> Tokenization for safe card storage and checkout.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 10. Payment Flow Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Smooth <span>Payment Flow</span></h2>
                <p>See exactly how money moves securely from your customer to your bank account.</p>
            </div>
            <div class="flow-container">
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    <h4>Customer Checkout</h4>
                    <p>Customer selects product and initiates payment.</p>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-mobile-screen"></i></div>
                    <h4>Secure Payment</h4>
                    <p>Customer completes payment via preferred mode.</p>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-check-double"></i></div>
                    <h4>Confirmation</h4>
                    <p>Business gets instant webhook/alert success.</p>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-building-columns"></i></div>
                    <h4>Settlement</h4>
                    <p>Funds are settled to the business bank account.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. Dashboard Preview Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Powerful <span>Business Dashboard</span></h2>
                <p>Everything you need to monitor transactions, handle refunds, and track settlements in one premium interface.</p>
            </div>
            
            <div class="dashboard-preview">
                <div class="dashboard-header">
                    <div style="display:flex; align-items:center; gap:15px;">
                        <i class="fa-solid fa-gem" style="color:var(--primary); font-size:20px;"></i>
                        <span style="font-weight:600; font-size:18px;">DEZOPAY Portal</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:20px;">
                        <span style="color:var(--text-secondary); font-size:14px;">Live Mode</span>
                        <div style="width:35px; height:35px; border-radius:50%; background:var(--border); display:flex; align-items:center; justify-content:center;"><i class="fa-solid fa-user"></i></div>
                    </div>
                </div>
                <div class="dashboard-body">
                    <div class="dash-stats">
                        <div class="dash-stat-card">
                            <div class="dash-stat-title">Total Volume</div>
                            <div class="dash-stat-value">₹ 24,59,000</div>
                        </div>
                        <div class="dash-stat-card">
                            <div class="dash-stat-title">Successful Transactions</div>
                            <div class="dash-stat-value" style="color:var(--success);">3,492</div>
                        </div>
                        <div class="dash-stat-card">
                            <div class="dash-stat-title">Refunds</div>
                            <div class="dash-stat-value" style="color:var(--danger);">12</div>
                        </div>
                        <div class="dash-stat-card">
                            <div class="dash-stat-title">Settlement Ready</div>
                            <div class="dash-stat-value" style="color:var(--primary);">₹ 1,42,000</div>
                        </div>
                    </div>
                    
                    <h3 style="margin-bottom: 20px; font-size: 18px;">Recent Transactions</h3>
                    <div class="dash-table-wrap">
                        <table class="dash-table">
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-family:monospace; color:var(--primary);">txn_109283749</td>
                                    <td>Oct 24, 14:32</td>
                                    <td style="font-weight:600;">₹ 4,999.00</td>
                                    <td>customer@email.com</td>
                                    <td><span class="status-badge status-success">Success</span></td>
                                </tr>
                                <tr>
                                    <td style="font-family:monospace; color:var(--primary);">txn_109283748</td>
                                    <td>Oct 24, 14:15</td>
                                    <td style="font-weight:600;">₹ 1,200.00</td>
                                    <td>user@example.com</td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td style="font-family:monospace; color:var(--primary);">txn_109283747</td>
                                    <td>Oct 24, 13:45</td>
                                    <td style="font-weight:600;">₹ 8,500.00</td>
                                    <td>buyer@company.com</td>
                                    <td><span class="status-badge status-success">Success</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. Developer Section -->
    <section id="developers" class="section section-alt">
        <div class="container dev-container">
            <div>
                <h2 style="font-size: 40px; margin-bottom: 20px;">Built for <span>Developers</span></h2>
                <p style="font-size: 18px; margin-bottom: 30px;">Integrate DEZOPAY in minutes. We provide clean, RESTful APIs, robust webhooks, and seamless test/live mode toggling.</p>
                <ul class="security-list">
                    <li><i class="fa-solid fa-code"></i> Copy-paste code snippets for quick integration.</li>
                    <li><i class="fa-solid fa-arrows-spin"></i> Reliable webhook support for real-time status.</li>
                    <li><i class="fa-solid fa-toggle-on"></i> Easy toggle between Test and Live environments.</li>
                    <li><i class="fa-solid fa-book"></i> Comprehensive, developer-first documentation.</li>
                </ul>
                <a href="#" class="btn btn-secondary" style="margin-top: 20px;">Read Documentation</a>
            </div>
            
            <div class="code-window">
                <div class="code-header">
                    <div class="code-dot r"></div>
                    <div class="code-dot y"></div>
                    <div class="code-dot g"></div>
                </div>
                <div class="code-body">
<span class="keyword">const</span> axios = require(<span class="string">'axios'</span>);

<span class="keyword">async function</span> <span class="function">createOrder</span>() {
  <span class="keyword">try</span> {
    <span class="keyword">const</span> response = <span class="keyword">await</span> axios.post(<span class="string">'https://api.dezopay.com/v1/orders'</span>, {
      amount: <span class="string">499900</span>, <span class="comment">// Amount in paise</span>
      currency: <span class="string">'INR'</span>,
      receipt: <span class="string">'rcptid_11'</span>,
      notes: {
        description: <span class="string">'Premium SaaS Plan'</span>
      }
    }, {
      headers: {
        <span class="string">'Authorization'</span>: <span class="string">'Bearer YOUR_SECRET_KEY'</span>
      }
    });
    
    console.log(response.data);
  } <span class="keyword">catch</span> (error) {
    console.error(error);
  }
}
                </div>
            </div>
        </div>
    </section>

    <!-- 13. Pricing Section -->
    <section id="pricing" class="section">
        <div class="container">
            <div class="section-header">
                <h2>Transparent <span>Pricing</span></h2>
                <p>Simple, predictable pricing. No hidden fees, no setup costs, pay only for what you use.</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Starter</h3>
                    <p style="font-size: 14px; margin-top: 10px;">For new businesses and startups.</p>
                    <div class="pricing-price">2% <span>/ txn</span></div>
                    <ul class="pricing-list">
                        <li><i class="fa-solid fa-check"></i> Standard Checkout</li>
                        <li><i class="fa-solid fa-check"></i> UPI, Credit, Debit Cards</li>
                        <li><i class="fa-solid fa-check"></i> T+2 Settlements</li>
                        <li><i class="fa-solid fa-check"></i> Email Support</li>
                    </ul>
                    <button class="btn btn-secondary" style="width:100%;">Get Started</button>
                </div>
                
                <div class="pricing-card pricing-popular">
                    <div class="popular-badge">MOST POPULAR</div>
                    <h3>Growth</h3>
                    <p style="font-size: 14px; margin-top: 10px;">For scaling businesses.</p>
                    <div class="pricing-price">1.5% <span>/ txn</span></div>
                    <ul class="pricing-list">
                        <li><i class="fa-solid fa-check"></i> Premium Custom Checkout</li>
                        <li><i class="fa-solid fa-check"></i> All Payment Modes</li>
                        <li><i class="fa-solid fa-check"></i> T+1 Settlements</li>
                        <li><i class="fa-solid fa-check"></i> Priority Email Support</li>
                    </ul>
                    <button class="btn btn-primary" style="width:100%;">Choose Growth</button>
                </div>
                
                <div class="pricing-card">
                    <h3>Enterprise</h3>
                    <p style="font-size: 14px; margin-top: 10px;">For large volume processing.</p>
                    <div class="pricing-price">Custom</div>
                    <ul class="pricing-list">
                        <li><i class="fa-solid fa-check"></i> Dedicated Account Manager</li>
                        <li><i class="fa-solid fa-check"></i> Volume Discounts</li>
                        <li><i class="fa-solid fa-check"></i> Instant Settlements</li>
                        <li><i class="fa-solid fa-check"></i> 24/7 Phone Support</li>
                    </ul>
                    <button class="btn btn-secondary" style="width:100%;">Contact Sales</button>
                </div>
            </div>
        </div>
    </section>

    <!-- 14. Trust Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="trust-grid">
                <div class="trust-item">
                    <h4>99.99%</h4>
                    <p>Uptime SLA</p>
                </div>
                <div class="trust-item">
                    <h4>10M+</h4>
                    <p>Transactions Processed</p>
                </div>
                <div class="trust-item">
                    <h4><i class="fa-solid fa-bolt"></i></h4>
                    <p>Fast Onboarding</p>
                </div>
                <div class="trust-item">
                    <h4><i class="fa-solid fa-headset"></i></h4>
                    <p>Business Support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 15. Testimonials -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Trusted by <span>Businesses</span></h2>
                <p>See what our clients have to say about the DEZOPAY experience.</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-text">"DEZOPAY completely changed how we handle online payments. The integration took less than a day, and our payment success rates jumped by 15%."</p>
                    <div class="client-info">
                        <div class="client-avatar">RK</div>
                        <div>
                            <div style="font-weight:700; color:var(--accent);">Rahul K.</div>
                            <div style="font-size:12px; color:var(--text-secondary);">Founder, TechShop</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-text">"The settlement transparency is unmatched. We always know exactly when our funds will arrive. Highly recommend DEZOPAY for serious businesses."</p>
                    <div class="client-info">
                        <div class="client-avatar">AS</div>
                        <div>
                            <div style="font-weight:700; color:var(--accent);">Ananya S.</div>
                            <div style="font-weight:700; color:var(--accent);">Ananya S.</div>
                            <div style="font-size:12px; color:var(--text-secondary);">CEO, LearnSpace</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Beautiful dashboard, secure checkout, and their developer docs are top-notch. Our engineering team loves working with DEZOPAY APIs."</p>
                    <div class="client-info">
                        <div class="client-avatar">VM</div>
                        <div>
                            <div style="font-weight:700; color:var(--accent);">Vikram M.</div>
                            <div style="font-size:12px; color:var(--text-secondary);">CTO, SaaSFlow</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 16. FAQ Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Frequently Asked <span>Questions</span></h2>
                <p>Everything you need to know about DEZOPAY integration and services.</p>
            </div>
            
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        How long does onboarding take? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">Onboarding with DEZOPAY is instant. Once you create an account and submit your KYC documents, our automated system verifies them rapidly, allowing you to go live within hours, not days.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        When do I receive my settlements? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">By default, settlements are processed on a T+2 basis (Transaction Date + 2 business days). However, for Enterprise and Growth plans, we offer T+1 and even Instant Settlements depending on the business category.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        Are there any setup or hidden fees? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">No. DEZOPAY believes in absolute transparency. There are zero setup fees, zero maintenance fees, and no hidden charges. You only pay the flat transaction rate on successful payments.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        Do you support international payments? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">Yes, DEZOPAY supports international payments out of the box. You can accept payments in over 100 currencies, which are automatically converted and settled in your local currency.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 17. Contact Section -->
    <section id="contact" class="section">
        <div class="container contact-container">
            <div>
                <h2 style="font-size: 40px; margin-bottom: 20px;">Ready to <span>Upgrade?</span></h2>
                <p style="font-size: 18px; margin-bottom: 40px;">Get in touch with our sales team to discuss custom pricing, integration help, or any other business queries.</p>
                
                <div style="margin-bottom: 30px;">
                    <div style="display:flex; align-items:center; gap:15px; margin-bottom:15px;">
                        <i class="fa-solid fa-envelope" style="color:var(--primary); font-size:20px;"></i>
                        <span style="font-size:16px;">support@dezopay.com</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:15px; margin-bottom:15px;">
                        <i class="fa-solid fa-phone" style="color:var(--primary); font-size:20px;"></i>
                        <span style="font-size:16px;">+91 1800-DEZO-PAY</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:15px;">
                        <i class="fa-solid fa-location-dot" style="color:var(--primary); font-size:20px;"></i>
                        <span style="font-size:16px;">Financial District, Tech Hub</span>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <form onsubmit="event.preventDefault(); alert('Message sent successfully! Our team will contact you soon.');">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" required placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Business Name</label>
                            <input type="text" class="form-control" required placeholder="Acme Corp">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" required placeholder="john@company.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" required placeholder="+91 98765 43210">
                        </div>
                        <div class="form-group full">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control" placeholder="https://yourwebsite.com">
                        </div>
                        <div class="form-group full">
                            <label class="form-label">Monthly Payment Volume (Approx)</label>
                            <select class="form-control" required style="appearance:none; background-image:url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23D4AF37%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat:no-repeat; background-position:right .7em top 50%; background-size:.65em auto;">
                                <option value="" disabled selected>Select volume range</option>
                                <option value="< 1 Lakh">Less than ₹1 Lakh</option>
                                <option value="1L - 10L">₹1 Lakh - ₹10 Lakhs</option>
                                <option value="10L - 1Cr">₹10 Lakhs - ₹1 Crore</option>
                                <option value="> 1Cr">More than ₹1 Crore</option>
                            </select>
                        </div>
                        <div class="form-group full">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" required placeholder="Tell us about your payment needs..."></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Request</button>
                </form>
            </div>
        </div>
    </section>

    <!-- 18. Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#" class="brand">
                        <i class="fa-solid fa-gem brand-icon"></i> DEZOPAY
                    </a>
                    <p>The modern, secure, and premium payment gateway designed to help businesses scale globally without friction.</p>
                </div>
                
                <div>
                    <h5 class="footer-title">Product</h5>
                    <ul class="footer-links">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#solutions">Solutions</a></li>
                        <li><a href="#">Payment Links</a></li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="footer-title">Resources</h5>
                    <ul class="footer-links">
                        <li><a href="#developers">Developer Docs</a></li>
                        <li><a href="#">API Reference</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Support Center</a></li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="footer-title">Legal</h5>
                    <ul class="footer-links">
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Refund Policy</a></li>
                        <li><a href="#">Compliance</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div>&copy; <?= date('Y') ?> DEZOPAY. All rights reserved.</div>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // FAQ Accordion
        function toggleFaq(element) {
            const item = element.parentElement;
            const allItems = document.querySelectorAll('.faq-item');
            
            allItems.forEach(i => {
                if(i !== item) {
                    i.classList.remove('active');
                }
            });
            
            item.classList.toggle('active');
        }

        // Mobile Menu
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('open');
            document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : 'auto';
        }
    </script>
</body>
</html>