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
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💎</text></svg>">
    
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
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 { color: var(--accent); line-height: 1.2; font-weight: 700; }
        p { color: var(--text-secondary); }
        a { text-decoration: none; color: var(--text-main); transition: all 0.3s ease; }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 5%; }

        .btn {
            display: inline-block; padding: 14px 28px; border-radius: 8px;
            font-weight: 600; font-size: 15px; cursor: pointer;
            transition: all 0.3s ease; text-align: center; border: none; outline: none;
        }

        .btn-primary { background-color: var(--primary); color: var(--bg-main); position: relative; overflow: hidden; }
        .btn-primary::after { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: 0.5s; }
        .btn-primary:hover::after { left: 100%; }
        .btn-primary:hover { background-color: var(--primary-soft); box-shadow: 0 4px 20px rgba(212, 175, 55, 0.3); transform: translateY(-2px); }

        .btn-secondary { background-color: transparent; color: var(--primary); border: 1px solid var(--primary); }
        .btn-secondary:hover { background-color: rgba(212, 175, 55, 0.1); transform: translateY(-2px); }

        .section { padding: 100px 0; }
        .section-alt { background-color: var(--bg-secondary); }

        .section-header { text-align: center; margin-bottom: 60px; max-width: 700px; margin-left: auto; margin-right: auto; }
        .section-header h2 { font-size: 40px; margin-bottom: 16px; letter-spacing: -1px; }
        .section-header p { font-size: 18px; }

        /* Glass Card Utility */
        .glass-card { background: var(--card-bg); border: 1px solid var(--border); border-radius: 16px; backdrop-filter: blur(10px); }

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
        .nav-item { font-size: 14px; font-weight: 500; color: var(--text-secondary); position: relative; }
        .nav-item::after { content: ''; position: absolute; bottom: -5px; left: 0; width: 0; height: 2px; background: var(--primary); transition: width 0.3s ease; }
        .nav-item:hover { color: var(--accent); }
        .nav-item:hover::after { width: 100%; }

        .nav-btns { display: flex; gap: 16px; }
        .mobile-toggle { display: none; font-size: 24px; cursor: pointer; color: var(--text-main); }

        /* 2. Hero Section */
        .hero { min-height: 100vh; display: flex; align-items: center; padding-top: 100px; position: relative; overflow: hidden; }
        .hero-glow { position: absolute; top: 20%; left: 50%; transform: translateX(-50%); width: 600px; height: 600px; background: radial-gradient(circle, rgba(212, 175, 55, 0.15) 0%, rgba(5,5,5,0) 70%); z-index: 0; pointer-events: none; }
        .hero-content { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; position: relative; z-index: 10; }
        .hero-text h1 { font-size: 56px; line-height: 1.1; margin-bottom: 24px; letter-spacing: -1.5px; animation: slideUp 0.8s ease forwards; }
        .hero-text p { font-size: 18px; margin-bottom: 40px; max-width: 500px; animation: slideUp 1s ease forwards; opacity: 0; }
        .hero-btns { display: flex; gap: 16px; margin-bottom: 40px; animation: slideUp 1.2s ease forwards; opacity: 0; }
        .trust-badges { display: flex; flex-wrap: wrap; gap: 20px; animation: slideUp 1.4s ease forwards; opacity: 0; }
        .trust-badge { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-secondary); font-weight: 500; }
        .trust-badge i { color: var(--primary); }

        @keyframes slideUp { 0% { opacity: 0; transform: translateY(30px); } 100% { opacity: 1; transform: translateY(0); } }

        .hero-visual { position: relative; width: 100%; height: 500px; animation: fadeIn 1.5s ease forwards; opacity: 0; }
        @keyframes fadeIn { to { opacity: 1; } }

        .mockup-card { background: rgba(21, 21, 21, 0.9); backdrop-filter: blur(10px); border: 1px solid var(--primary); border-radius: 16px; padding: 24px; position: absolute; box-shadow: 0 0 40px rgba(212, 175, 55, 0.15); }
        .mockup-main { width: 100%; max-width: 420px; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2; }
        .mockup-float-1 { width: 280px; top: 5%; right: -15%; z-index: 3; animation: float 6s ease-in-out infinite; border-color: var(--border); }
        .mockup-float-2 { width: 260px; bottom: 5%; left: -10%; z-index: 1; animation: float 8s ease-in-out infinite reverse; border-color: var(--border); }
        
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }

        .mockup-header { display: flex; justify-content: space-between; margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 15px; }
        .mockup-amount { font-size: 36px; font-weight: 700; color: var(--accent); margin-bottom: 10px; }
        
        .success-pulse { display: flex; align-items: center; gap: 12px; margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border); }
        .success-icon { width: 32px; height: 32px; border-radius: 50%; background: rgba(25, 195, 125, 0.1); color: var(--success); display: flex; align-items: center; justify-content: center; font-size: 14px; animation: pulse 2s infinite; }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(25, 195, 125, 0.4); } 70% { box-shadow: 0 0 0 10px rgba(25, 195, 125, 0); } 100% { box-shadow: 0 0 0 0 rgba(25, 195, 125, 0); } }

        /* 3. Company Identity Section */
        .identity-section { padding: 40px 0; border-bottom: 1px solid var(--border); }
        .identity-card { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; padding: 30px 40px; }
        .id-left { display: flex; align-items: center; gap: 20px; }
        .id-icon { width: 50px; height: 50px; background: rgba(212, 175, 55, 0.1); color: var(--primary); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; border: 1px solid var(--primary); }
        .id-title { font-size: 20px; font-weight: 700; color: var(--accent); }
        .id-subtitle { font-size: 14px; color: var(--text-secondary); display: flex; align-items: center; gap: 5px; margin-top: 4px; }
        .id-subtitle i { color: #1DA1F2; font-size: 14px; } /* Verified blue tick style */
        .id-details { display: flex; gap: 40px; flex-wrap: wrap; }
        .id-item { display: flex; flex-direction: column; }
        .id-label { font-size: 12px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .id-value { font-size: 15px; font-weight: 600; color: var(--accent); display: flex; align-items: center; gap: 8px; }
        .id-value i { color: var(--primary); font-size: 14px; }

        /* 4. Problem Section */
        .problem-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px; }
        .problem-card { padding: 30px; transition: transform 0.3s ease; }
        .problem-card:hover { transform: translateY(-5px); border-color: rgba(255, 77, 79, 0.3); }
        .problem-icon { color: var(--danger); font-size: 24px; margin-bottom: 20px; }
        .problem-card h3 { font-size: 18px; margin-bottom: 12px; color: var(--text-main); }
        .problem-card p { font-size: 14px; }

        /* 5. Features Section */
        .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }
        .feature-card { padding: 40px 30px; transition: all 0.3s ease; }
        .feature-card:hover { transform: translateY(-5px); border-color: var(--primary); box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .feature-icon-wrapper { width: 56px; height: 56px; border-radius: 12px; background: rgba(212, 175, 55, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 24px; }
        .feature-card h3 { font-size: 20px; margin-bottom: 12px; }
        .feature-card p { font-size: 15px; }

        /* 6. Solutions Section */
        .solutions-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
        .solution-card { display: flex; align-items: flex-start; gap: 20px; padding: 30px; transition: 0.3s; }
        .solution-card:hover { border-color: var(--primary); }
        .solution-icon { font-size: 28px; color: var(--primary); }
        .solution-card h3 { font-size: 18px; margin-bottom: 8px; }

        /* 7. Security Section */
        .security-container { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
        .security-visual { text-align: center; position: relative; background: url('data:image/svg+xml;utf8,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><path d="M10 10h80v80H10z" stroke="rgba(212,175,55,0.1)" stroke-width="1" fill="none"/></svg>') repeat; padding: 60px 0; border-radius: 20px; }
        .shield-icon { font-size: 120px; color: var(--primary); filter: drop-shadow(0 0 30px rgba(212, 175, 55, 0.2)); animation: pulseglow 4s infinite; }
        @keyframes pulseglow { 0%, 100% { filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.2)); } 50% { filter: drop-shadow(0 0 50px rgba(212, 175, 55, 0.5)); } }
        .security-list { list-style: none; margin-top: 30px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .security-list li { display: flex; align-items: flex-start; gap: 12px; font-size: 15px; color: var(--text-secondary); }
        .security-list li i { color: var(--primary); font-size: 18px; margin-top: 2px; }

        /* 8. Payment Flow */
        .flow-container { display: flex; justify-content: space-between; position: relative; margin-top: 60px; }
        .flow-line { position: absolute; top: 40px; left: 50px; right: 50px; height: 2px; background: var(--border); z-index: 0; }
        .flow-line-progress { position: absolute; top: 0; left: 0; height: 100%; width: 50%; background: var(--primary); animation: flowProgress 3s infinite linear; box-shadow: 0 0 10px var(--primary); }
        @keyframes flowProgress { 0% { left: 0; width: 0%; opacity: 1; } 50% { width: 50%; } 100% { left: 100%; width: 0%; opacity: 0; } }
        .flow-step { position: relative; z-index: 1; text-align: center; width: 16%; }
        .flow-icon { width: 80px; height: 80px; border-radius: 50%; background: var(--card-bg); border: 2px solid var(--primary); display: flex; align-items: center; justify-content: center; font-size: 24px; color: var(--primary); margin: 0 auto 20px; box-shadow: 0 0 20px rgba(0,0,0,0.5); transition: 0.3s; }
        .flow-step:hover .flow-icon { transform: scale(1.1); background: var(--primary); color: var(--bg-main); }
        .flow-step h4 { font-size: 15px; margin-bottom: 8px; }
        .flow-step p { font-size: 13px; }

        /* 9. Dashboard Preview */
        .dashboard-preview { overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.6); }
        .dashboard-header { background: rgba(255,255,255,0.02); padding: 20px 30px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
        .dashboard-body { padding: 30px; }
        .dash-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px; }
        .dash-stat-card { background: var(--bg-main); padding: 20px; border-radius: 12px; border: 1px solid var(--border); }
        .dash-stat-title { font-size: 13px; color: var(--text-secondary); margin-bottom: 10px; }
        .dash-stat-value { font-size: 28px; font-weight: 700; color: var(--accent); }
        
        .dash-main-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
        
        .dash-table-wrap { background: var(--bg-main); border-radius: 12px; border: 1px solid var(--border); padding: 20px; overflow-x: auto; }
        .dash-table { width: 100%; border-collapse: collapse; min-width: 500px; }
        .dash-table th, .dash-table td { padding: 15px; text-align: left; border-bottom: 1px solid var(--border); font-size: 14px; }
        .dash-table th { color: var(--text-secondary); font-weight: 500; }
        .status-badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .status-success { background: rgba(25, 195, 125, 0.1); color: var(--success); }
        .status-failed { background: rgba(255, 77, 79, 0.1); color: var(--danger); }
        .status-pending { background: rgba(212, 175, 55, 0.1); color: var(--primary); }
        
        .dash-side-cards { display: flex; flex-direction: column; gap: 20px; }
        .dash-small-card { background: var(--bg-main); border-radius: 12px; border: 1px solid var(--border); padding: 20px; }

        /* 10. Developer Section */
        .dev-container { display: grid; grid-template-columns: 1fr 1.2fr; gap: 50px; align-items: center; }
        .code-window { background: #0d0d0d; border-radius: 12px; border: 1px solid var(--border); overflow: hidden; position: relative; }
        .code-header { background: #1a1a1a; padding: 12px 20px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); }
        .code-dots { display: flex; gap: 8px; }
        .code-dot { width: 12px; height: 12px; border-radius: 50%; }
        .code-dot.r { background: #ff5f56; } .code-dot.y { background: #ffbd2e; } .code-dot.g { background: #27c93f; }
        .copy-btn { background: none; border: none; color: var(--text-secondary); cursor: pointer; font-size: 14px; }
        .copy-btn:hover { color: var(--primary); }
        .code-body { padding: 24px; font-family: 'Courier New', Courier, monospace; font-size: 14px; color: #d4d4d4; line-height: 1.6; overflow-x: auto; border-left: 2px solid var(--primary); }
        .code-body .keyword { color: #c678dd; } .code-body .string { color: #98c379; } .code-body .function { color: #61afef; } .code-body .property { color: #e06c75; }

        /* 11. Pricing Section */
        .pricing-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
        .pricing-card { padding: 40px 30px; text-align: center; position: relative; }
        .pricing-popular { border-color: var(--primary); transform: scale(1.05); z-index: 2; box-shadow: 0 20px 40px rgba(0,0,0,0.5); }
        .popular-badge { position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--primary); color: var(--bg-main); padding: 6px 16px; border-radius: 20px; font-size: 12px; font-weight: 700; }
        .pricing-price { font-size: 40px; font-weight: 800; color: var(--accent); margin: 20px 0; }
        .pricing-price span { font-size: 16px; color: var(--text-secondary); font-weight: 400; }
        .pricing-list { list-style: none; margin: 30px 0; text-align: left; }
        .pricing-list li { margin-bottom: 16px; display: flex; align-items: center; gap: 12px; color: var(--text-secondary); font-size: 15px; }
        .pricing-list li i { color: var(--primary); }

        /* 12. Trust Section */
        .trust-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; text-align: center; margin-top: 40px; }
        .trust-item h4 { font-size: 32px; margin-bottom: 10px; color: var(--primary); }
        .trust-points { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; max-width: 800px; margin: 0 auto; text-align: left; }
        .trust-points li { display: flex; align-items: center; gap: 12px; font-size: 16px; color: var(--text-main); }
        .trust-points li i { color: var(--success); }

        /* 13. Testimonials */
        .testimonial-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
        .testimonial-card { padding: 30px; }
        .stars { color: var(--primary); margin-bottom: 20px; font-size: 14px; }
        .testimonial-text { font-size: 15px; line-height: 1.7; margin-bottom: 24px; color: var(--text-secondary); }
        .client-info { display: flex; align-items: center; gap: 16px; }
        .client-avatar { width: 50px; height: 50px; border-radius: 50%; background: rgba(212, 175, 55, 0.1); display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--primary); }

        /* 14. FAQ */
        .faq-item { margin-bottom: 16px; overflow: hidden; transition: 0.3s; }
        .faq-question { padding: 24px; display: flex; justify-content: space-between; align-items: center; cursor: pointer; font-weight: 600; font-size: 17px; transition: color 0.3s; }
        .faq-question:hover { color: var(--primary); }
        .faq-answer { padding: 0 24px; max-height: 0; overflow: hidden; transition: max-height 0.4s ease, padding 0.4s ease; color: var(--text-secondary); }
        .faq-item.active { border-color: var(--primary); }
        .faq-item.active .faq-answer { padding: 0 24px 24px; max-height: 300px; }
        .faq-item.active .faq-question i { transform: rotate(180deg); color: var(--primary); }
        .faq-question i { transition: transform 0.3s ease; }

        /* 15. Contact */
        .contact-container { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; }
        .contact-form { padding: 40px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        .form-group.full { grid-column: 1 / -1; }
        .form-label { display: block; margin-bottom: 8px; font-size: 14px; color: var(--text-secondary); }
        .form-control { width: 100%; padding: 14px 16px; background: var(--bg-main); border: 1px solid var(--border); border-radius: 8px; color: var(--text-main); font-family: 'Inter', sans-serif; font-size: 15px; transition: border-color 0.3s ease; }
        .form-control:focus { outline: none; border-color: var(--primary); }
        textarea.form-control { height: 120px; resize: vertical; }

        /* 16. Footer */
        .footer { background: var(--bg-secondary); border-top: 1px solid var(--border); padding: 80px 0 40px; }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 60px; }
        .footer-brand p { margin-top: 20px; font-size: 14px; max-width: 300px; color: var(--text-secondary); margin-bottom: 20px; }
        .footer-contact p { font-size: 14px; color: var(--text-secondary); margin-bottom: 10px; display: flex; align-items: center; gap: 10px; }
        .footer-contact p i { color: var(--primary); width: 16px; }
        .footer-title { color: var(--accent); font-size: 16px; font-weight: 600; margin-bottom: 24px; }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a { color: var(--text-secondary); font-size: 14px; }
        .footer-links a:hover { color: var(--primary); }
        .footer-bottom { padding-top: 30px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; font-size: 14px; color: var(--text-secondary); }
        .social-links { display: flex; gap: 16px; }
        .social-links a { width: 40px; height: 40px; border-radius: 50%; background: var(--bg-main); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border); }
        .social-links a:hover { color: var(--primary); border-color: var(--primary); }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-content, .security-container, .dev-container, .contact-container, .dash-main-grid { grid-template-columns: 1fr; }
            .pricing-grid { grid-template-columns: 1fr; max-width: 500px; margin: 0 auto; }
            .pricing-popular { transform: none; }
            .flow-container { flex-direction: column; align-items: center; gap: 40px; }
            .flow-line { display: none; }
            .flow-step { width: 100%; max-width: 300px; }
            .dash-stats { grid-template-columns: 1fr 1fr; }
            .trust-grid { grid-template-columns: 1fr 1fr; }
            .solutions-grid { grid-template-columns: 1fr 1fr; }
        }
        
        @media (max-width: 768px) {
            .nav-links, .nav-btns { display: none; }
            .mobile-toggle { display: block; }
            .hero-text h1 { font-size: 40px; }
            .hero-btns { flex-direction: column; }
            .testimonial-grid { grid-template-columns: 1fr; }
            .form-grid { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr; }
            .dash-stats { grid-template-columns: 1fr; }
            .solutions-grid { grid-template-columns: 1fr; }
            .trust-grid { grid-template-columns: 1fr; }
            .trust-points { grid-template-columns: 1fr; }
            .id-card { flex-direction: column; align-items: flex-start; gap: 20px; }
        }

        /* Mobile Menu */
        .mobile-menu { position: fixed; top: 0; left: -100%; width: 100%; height: 100vh; background: var(--bg-main); z-index: 1001; transition: 0.3s; padding: 80px 5%; display: flex; flex-direction: column; gap: 24px; }
        .mobile-menu.open { left: 0; }
        .mobile-menu a { font-size: 20px; font-weight: 600; border-bottom: 1px solid var(--border); padding-bottom: 16px; color: var(--text-main); }
        .close-menu { position: absolute; top: 20px; right: 5%; font-size: 28px; cursor: pointer; color: var(--text-main); }
    </style>
</head>
<body>

    <!-- 1. Premium Sticky Navbar -->
    <nav class="navbar">
        <a href="#" class="brand">
            <i class="fa-solid fa-gem brand-icon"></i> DEZOPAY
        </a>
        <div class="nav-links">
            <a href="#" class="nav-item">Home</a>
            <a href="#features" class="nav-item">Features</a>
            <a href="#solutions" class="nav-item">Solutions</a>
            <a href="#security" class="nav-item">Security</a>
            <a href="#pricing" class="nav-item">Pricing</a>
            <a href="#developers" class="nav-item">Developers</a>
            <a href="#contact" class="nav-item">Contact</a>
        </div>
        <div class="nav-btns">
            <a href="merchant/index.php" class="btn btn-secondary" style="padding: 10px 20px;">Sign In</a>
            <a href="merchant/register.php" class="btn btn-primary" style="padding: 10px 20px;">Get Started</a>
        </div>
        <div class="mobile-toggle" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div>
    </nav>

    <div class="mobile-menu" id="mobileMenu">
        <div class="close-menu" onclick="toggleMenu()"><i class="fa-solid fa-xmark"></i></div>
        <a href="#" onclick="toggleMenu()">Home</a>
        <a href="#features" onclick="toggleMenu()">Features</a>
        <a href="#solutions" onclick="toggleMenu()">Solutions</a>
        <a href="#security" onclick="toggleMenu()">Security</a>
        <a href="#pricing" onclick="toggleMenu()">Pricing</a>
        <a href="#developers" onclick="toggleMenu()">Developers</a>
        <a href="#contact" onclick="toggleMenu()">Contact</a>
        <a href="merchant/index.php" onclick="toggleMenu()" style="color: var(--primary);">Sign In</a>
        <a href="merchant/register.php" onclick="toggleMenu()" style="color: var(--primary);">Get Started</a>
    </div>

    <!-- 2. Hero Section -->
    <section class="hero">
        <div class="hero-glow"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Accept Payments Online with <span>Speed, Security & Confidence</span></h1>
                    <p>DEZOPAY is a modern payment gateway built for businesses that need secure online payments, smooth checkout experiences, clear transaction tracking, and professional payment infrastructure.</p>
                    <div class="hero-btns">
                        <a href="merchant/register.php" class="btn btn-primary">Start Accepting Payments</a>
                        <a href="#features" class="btn btn-secondary">View Features</a>
                    </div>
                    <div class="trust-badges">
                        <div class="trust-badge"><i class="fa-solid fa-shield-check"></i> Secure Payments</div>
                        <div class="trust-badge"><i class="fa-solid fa-bolt"></i> Fast Confirmation</div>
                        <div class="trust-badge"><i class="fa-solid fa-code"></i> Easy Integration</div>
                        <div class="trust-badge"><i class="fa-solid fa-chart-pie"></i> Business Dashboard</div>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="mockup-card mockup-main">
                        <div class="mockup-header">
                            <div>
                                <div style="color:var(--text-secondary); font-size:12px;">Secure Checkout</div>
                                <div style="font-weight:600;">DEZOPAY Platform</div>
                            </div>
                            <div class="brand-icon"><i class="fa-solid fa-gem"></i></div>
                        </div>
                        <div class="mockup-amount">₹ 4,999.00</div>
                        <div style="margin-bottom: 20px; font-size: 14px; color: var(--text-secondary);">Select Payment Method</div>
                        <div style="display:flex; gap:10px; margin-bottom:15px;">
                            <div style="flex:1; border:1px solid var(--primary); border-radius:8px; padding:12px; text-align:center; background:rgba(212,175,55,0.1); color:var(--primary); font-weight:600; cursor:pointer;">UPI</div>
                            <div style="flex:1; border:1px solid var(--border); border-radius:8px; padding:12px; text-align:center; color:var(--text-secondary); cursor:pointer;">Cards</div>
                        </div>
                        <button class="btn btn-primary" style="width:100%; margin-top:10px;">Pay Now</button>
                    </div>
                    
                    <div class="mockup-card mockup-float-1">
                        <div style="font-size: 14px; font-weight: 600; margin-bottom: 15px; color: var(--text-secondary);">Daily Volume</div>
                        <div style="height: 60px; display: flex; align-items: flex-end; gap: 8px;">
                            <div style="width: 20%; background: var(--border); height: 30%; border-radius: 4px;"></div>
                            <div style="width: 20%; background: var(--border); height: 50%; border-radius: 4px;"></div>
                            <div style="width: 20%; background: var(--border); height: 70%; border-radius: 4px;"></div>
                            <div style="width: 20%; background: var(--primary); height: 100%; border-radius: 4px; box-shadow: 0 0 10px rgba(212,175,55,0.3);"></div>
                        </div>
                        <div style="margin-top: 15px; font-size: 24px; font-weight: 700;">+42.8% <i class="fa-solid fa-arrow-trend-up" style="color:var(--success); font-size:16px;"></i></div>
                    </div>
                    
                    <div class="mockup-card mockup-float-2">
                        <div style="display:flex; align-items:center; gap:15px;">
                            <div class="success-icon"><i class="fa-solid fa-check"></i></div>
                            <div>
                                <div style="font-size:14px; font-weight:600;">Payment Success</div>
                                <div style="font-size:12px; color:var(--text-secondary);">txn_8943209582</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Company Identity Section -->
    <section class="identity-section">
        <div class="container">
            <div class="glass-card identity-card">
                <div class="id-left">
                    <div class="id-icon"><i class="fa-solid fa-building-shield"></i></div>
                    <div>
                        <div class="id-title">Official Company Information</div>
                        <div class="id-subtitle">Verified Payment Infrastructure <i class="fa-solid fa-circle-check"></i></div>
                    </div>
                </div>
                <div class="id-details">
                    <div class="id-item">
                        <span class="id-label">Company Name</span>
                        <span class="id-value">DEZOPAY</span>
                    </div>
                    <div class="id-item">
                        <span class="id-label">Director</span>
                        <span class="id-value"><i class="fa-solid fa-user-tie"></i> Tarik Islam</span>
                    </div>
                    <div class="id-item">
                        <span class="id-label">Location</span>
                        <span class="id-value"><i class="fa-solid fa-location-dot"></i> Odisha, India</span>
                    </div>
                    <div class="id-item">
                        <span class="id-label">Official Phone</span>
                        <a href="tel:9114411026" class="id-value" style="text-decoration: underline; text-decoration-color: var(--primary); text-underline-offset: 4px;"><i class="fa-solid fa-phone"></i> 9114411026</a>
                    </div>
                    <div class="id-item">
                        <span class="id-label">Official Email</span>
                        <a href="mailto:support@dezopay.com" class="id-value" style="text-decoration: underline; text-decoration-color: var(--primary); text-underline-offset: 4px;"><i class="fa-solid fa-envelope"></i> support@dezopay.com</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Problem Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Online Payments Should Be <span>Simple, Secure & Reliable</span></h2>
                <p>Many businesses lose customers because of slow checkout, failed payments, unclear payment status, and lack of trust. DEZOPAY is designed to create a smooth, secure, and professional payment experience for businesses and customers.</p>
            </div>
            <div class="problem-grid">
                <div class="glass-card problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <h3>Failed Payment Issues</h3>
                    <p>Poor bank routing causes high transaction failures, leading to lost sales.</p>
                </div>
                <div class="glass-card problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-hourglass-half"></i></div>
                    <h3>Slow Checkout Experience</h3>
                    <p>Long, multi-step checkout pages frustrate customers and increase drop-offs.</p>
                </div>
                <div class="glass-card problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
                    <h3>Unclear Settlement Tracking</h3>
                    <p>Businesses struggle to track when their own money will reach their bank.</p>
                </div>
                <div class="glass-card problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-puzzle-piece"></i></div>
                    <h3>Complicated Setup</h3>
                    <p>Complex API structures require days of developer time to integrate properly.</p>
                </div>
                <div class="glass-card problem-card">
                    <div class="problem-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Lack of Customer Trust</h3>
                    <p>Unprofessional checkout designs make customers hesitant to share payment details.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Features Section -->
    <section id="features" class="section">
        <div class="container">
            <div class="section-header">
                <h2>Everything Your Business Needs to <span>Accept Payments</span></h2>
                <p>A full suite of professional tools built to streamline your financial operations.</p>
            </div>
            <div class="feature-grid">
                <div class="glass-card feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-wallet"></i></div>
                    <h3>Multiple Payment Modes</h3>
                    <p>Allow businesses to accept digital payments through supported payment options securely.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-bolt"></i></div>
                    <h3>Fast Checkout</h3>
                    <p>Give customers a smooth and simple payment experience designed for high conversion.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-lock"></i></div>
                    <h3>Secure Transactions</h3>
                    <p>Create secure payment handling with safe transaction processing algorithms.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-chart-line"></i></div>
                    <h3>Business Dashboard</h3>
                    <p>Track payments, refunds, settlements, customers, and transaction activity effortlessly.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-bell"></i></div>
                    <h3>Instant Payment Alerts</h3>
                    <p>Show real-time payment confirmation and transaction updates via robust webhooks.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-code"></i></div>
                    <h3>Easy Website Integration</h3>
                    <p>Make it simple to connect DEZOPAY with websites, apps, and custom platforms.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-rotate-left"></i></div>
                    <h3>Refund Management</h3>
                    <p>Allow businesses to manage refunds clearly and professionally directly from the dashboard.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon-wrapper"><i class="fa-solid fa-building-columns"></i></div>
                    <h3>Settlement Tracking</h3>
                    <p>Show payout and settlement status in a clean dashboard with predictable timelines.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Solutions Section -->
    <section id="solutions" class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Built for <span>Every Type of Business</span></h2>
                <p>Powerful payment solutions tailored for different business models.</p>
            </div>
            <div class="solutions-grid">
                <div class="glass-card solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-store"></i></div>
                    <div>
                        <h3>E-commerce Stores</h3>
                        <p style="font-size: 14px; color: var(--text-secondary);">Accept online payments for products and orders directly on your storefront.</p>
                    </div>
                </div>
                <div class="glass-card solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div>
                        <h3>Service Businesses</h3>
                        <p style="font-size: 14px; color: var(--text-secondary);">Collect payments for services, consultations, and bookings effortlessly.</p>
                    </div>
                </div>
                <div class="glass-card solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <div>
                        <h3>Digital Agencies</h3>
                        <p style="font-size: 14px; color: var(--text-secondary);">Receive client payments professionally with branded checkout experiences.</p>
                    </div>
                </div>
                <div class="glass-card solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                    <div>
                        <h3>Education & Coaching</h3>
                        <p style="font-size: 14px; color: var(--text-secondary);">Accept course fees, admission payments, and student payments securely.</p>
                    </div>
                </div>
                <div class="glass-card solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-shop"></i></div>
                    <div>
                        <h3>Local Businesses</h3>
                        <p style="font-size: 14px; color: var(--text-secondary);">Move from manual payments to clean digital payments with simple tools.</p>
                    </div>
                </div>
                <div class="glass-card solution-card">
                    <div class="solution-icon"><i class="fa-solid fa-palette"></i></div>
                    <div>
                        <h3>Creators & Sellers</h3>
                        <p style="font-size: 14px; color: var(--text-secondary);">Sell digital products, templates, subscriptions, and online services.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Security Section -->
    <section id="security" class="section">
        <div class="container security-container">
            <div class="security-visual">
                <i class="fa-solid fa-shield-halved shield-icon"></i>
            </div>
            <div>
                <h2 style="font-size: 40px; margin-bottom: 20px;">Security <span>Comes First</span></h2>
                <p style="font-size: 18px; margin-bottom: 30px;">DEZOPAY communicates trust, safety, and reliability. Feel confident that your payments and business transactions are handled with the utmost care.</p>
                <ul class="security-list">
                    <li><i class="fa-solid fa-lock"></i> Encrypted transaction flow</li>
                    <li><i class="fa-solid fa-shield-check"></i> Secure checkout experience</li>
                    <li><i class="fa-solid fa-eye"></i> Fraud monitoring</li>
                    <li><i class="fa-solid fa-server"></i> Safe merchant dashboard</li>
                    <li><i class="fa-solid fa-user-shield"></i> Protected customer payment data</li>
                    <li><i class="fa-solid fa-file-invoice"></i> Clear transaction records</li>
                    <li><i class="fa-solid fa-check-double"></i> Secure payment confirmation</li>
                    <li><i class="fa-solid fa-route"></i> Reliable payment status tracking</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 8. Payment Flow Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>A Simple Payment Flow for <span>Every Customer</span></h2>
                <p>Designed to be seamless from click to settlement.</p>
            </div>
            <div class="flow-container">
                <div class="flow-line">
                    <div class="flow-line-progress"></div>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    <h4>Step 1</h4>
                    <p>Customer chooses product or service.</p>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-hand-pointer"></i></div>
                    <h4>Step 2</h4>
                    <p>Customer clicks Pay Now.</p>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-credit-card"></i></div>
                    <h4>Step 3</h4>
                    <p>Customer enters payment details or method.</p>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-lock"></i></div>
                    <h4>Step 4</h4>
                    <p>Payment is processed securely.</p>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-bell"></i></div>
                    <h4>Step 5</h4>
                    <p>Business receives payment confirmation.</p>
                </div>
                <div class="flow-step">
                    <div class="flow-icon"><i class="fa-solid fa-chart-pie"></i></div>
                    <h4>Step 6</h4>
                    <p>Merchant tracks settlement from dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. Dashboard Preview Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Powerful Dashboard, <span>Simple Experience</span></h2>
                <p>Your complete command center to manage payments, monitor growth, and handle your business finances securely.</p>
            </div>
            
            <div class="dashboard-preview glass-card">
                <div class="dashboard-header">
                    <div style="display:flex; align-items:center; gap:15px;">
                        <i class="fa-solid fa-gem" style="color:var(--primary); font-size:20px;"></i>
                        <span style="font-weight:600; font-size:18px;">DEZOPAY Business</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:20px;">
                        <span style="color:var(--text-secondary); font-size:14px; border: 1px solid var(--border); padding: 4px 10px; border-radius: 12px;">Live Mode</span>
                        <div style="width:35px; height:35px; border-radius:50%; background:var(--primary); color:var(--bg-main); display:flex; align-items:center; justify-content:center; font-weight:700;">TI</div>
                    </div>
                </div>
                <div class="dashboard-body">
                    <div class="dash-stats">
                        <div class="dash-stat-card">
                            <div class="dash-stat-title">Total Payments</div>
                            <div class="dash-stat-value">₹ 14,25,000</div>
                        </div>
                        <div class="dash-stat-card">
                            <div class="dash-stat-title">Successful Transactions</div>
                            <div class="dash-stat-value" style="color:var(--success);">1,284</div>
                        </div>
                        <div class="dash-stat-card">
                            <div class="dash-stat-title">Failed Transactions</div>
                            <div class="dash-stat-value" style="color:var(--danger);">23</div>
                        </div>
                        <div class="dash-stat-card">
                            <div class="dash-stat-title">Refunds</div>
                            <div class="dash-stat-value" style="color:var(--text-secondary);">₹ 4,500</div>
                        </div>
                    </div>
                    
                    <div class="dash-main-grid">
                        <div class="dash-table-wrap">
                            <h3 style="margin-bottom: 20px; font-size: 16px;">Recent Transactions</h3>
                            <table class="dash-table">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-family:monospace; color:var(--text-secondary);">txn_8943209582</td>
                                        <td style="font-weight:600;">₹ 4,999.00</td>
                                        <td>user@example.com</td>
                                        <td><span class="status-badge status-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td style="font-family:monospace; color:var(--text-secondary);">txn_8943209581</td>
                                        <td style="font-weight:600;">₹ 1,200.00</td>
                                        <td>buyer@domain.com</td>
                                        <td><span class="status-badge status-failed">Failed</span></td>
                                    </tr>
                                    <tr>
                                        <td style="font-family:monospace; color:var(--text-secondary);">txn_8943209580</td>
                                        <td style="font-weight:600;">₹ 8,500.00</td>
                                        <td>client@company.com</td>
                                        <td><span class="status-badge status-success">Success</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="dash-side-cards">
                            <div class="dash-small-card">
                                <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 10px;">Settlements</h3>
                                <div style="font-size: 24px; font-weight: 700; color: var(--accent);">₹ 3,45,000</div>
                                <div style="font-size: 12px; color: var(--success); margin-top: 5px;">Settled Today</div>
                            </div>
                            <div class="dash-small-card">
                                <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 10px;">Payment Links</h3>
                                <div style="font-size: 24px; font-weight: 700; color: var(--accent);">42 Active</div>
                                <div style="font-size: 12px; color: var(--primary); margin-top: 5px;">Manage Links &rarr;</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. Developer Section -->
    <section id="developers" class="section section-alt">
        <div class="container dev-container">
            <div>
                <h2 style="font-size: 40px; margin-bottom: 20px;">Easy Integration for <span>Developers</span></h2>
                <p style="font-size: 18px; margin-bottom: 30px;">DEZOPAY feels developer-friendly while remaining simple for business owners. Integration is clean, structured, and easy to understand.</p>
                <ul class="security-list" style="grid-template-columns: 1fr;">
                    <li><i class="fa-solid fa-code"></i> Simple API structure</li>
                    <li><i class="fa-solid fa-money-bill-wave"></i> Payment creation flow</li>
                    <li><i class="fa-solid fa-reply"></i> Payment status response</li>
                    <li><i class="fa-solid fa-arrows-spin"></i> Webhook support</li>
                    <li><i class="fa-solid fa-toggle-on"></i> Test mode and live mode</li>
                    <li><i class="fa-solid fa-book"></i> Clear documentation layout</li>
                    <li><i class="fa-solid fa-plug"></i> Easy checkout button integration</li>
                    <li><i class="fa-solid fa-triangle-exclamation"></i> Error handling messages</li>
                </ul>
            </div>
            
            <div class="code-window">
                <div class="code-header">
                    <div class="code-dots">
                        <div class="code-dot r"></div>
                        <div class="code-dot y"></div>
                        <div class="code-dot g"></div>
                    </div>
                    <button class="copy-btn" onclick="alert('Code copied to clipboard!')"><i class="fa-regular fa-copy"></i> Copy</button>
                </div>
                <div class="code-body">
<span class="keyword">const</span> payment = <span class="keyword">await</span> dezopay.<span class="function">createPayment</span>({
  <span class="property">amount</span>: <span class="string">999</span>,
  <span class="property">customerName</span>: <span class="string">"Customer Name"</span>,
  <span class="property">customerEmail</span>: <span class="string">"customer@example.com"</span>,
  <span class="property">purpose</span>: <span class="string">"Website Service Payment"</span>
});

console.<span class="function">log</span>(payment.<span class="property">status</span>); <span class="comment">// Returns 'created'</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. Pricing Section -->
    <section id="pricing" class="section">
        <div class="container">
            <div class="section-header">
                <h2>Simple Pricing for <span>Growing Businesses</span></h2>
                <p>Choose the plan that fits your current volume and scales with your ambition.</p>
            </div>
            <div class="pricing-grid">
                <div class="glass-card pricing-card">
                    <h3>Starter</h3>
                    <p style="font-size: 14px; margin-top: 10px; color: var(--text-secondary);">For small businesses starting online payments.</p>
                    <div class="pricing-price">2% <span>/ txn</span></div>
                    <ul class="pricing-list">
                        <li><i class="fa-solid fa-check"></i> Standard Checkout Flow</li>
                        <li><i class="fa-solid fa-check"></i> All Major Payment Methods</li>
                        <li><i class="fa-solid fa-check"></i> Standard T+2 Settlements</li>
                        <li><i class="fa-solid fa-check"></i> Email Support</li>
                    </ul>
                    <a href="merchant/register.php" class="btn btn-secondary" style="width:100%;">Get Started</a>
                </div>
                
                <div class="glass-card pricing-card pricing-popular">
                    <div class="popular-badge">RECOMMENDED</div>
                    <h3>Growth</h3>
                    <p style="font-size: 14px; margin-top: 10px; color: var(--text-secondary);">For agencies, stores, and growing businesses.</p>
                    <div class="pricing-price">1.5% <span>/ txn</span></div>
                    <ul class="pricing-list">
                        <li><i class="fa-solid fa-check"></i> Custom Branded Checkout</li>
                        <li><i class="fa-solid fa-check"></i> Webhook Integrations</li>
                        <li><i class="fa-solid fa-check"></i> Faster T+1 Settlements</li>
                        <li><i class="fa-solid fa-check"></i> Priority Support</li>
                    </ul>
                    <a href="merchant/register.php" class="btn btn-primary" style="width:100%;">Get Started</a>
                </div>
                
                <div class="glass-card pricing-card">
                    <h3>Enterprise</h3>
                    <p style="font-size: 14px; margin-top: 10px; color: var(--text-secondary);">For high-volume businesses needing custom support.</p>
                    <div class="pricing-price" style="font-size: 32px; margin: 28px 0;">Contact Us</div>
                    <ul class="pricing-list">
                        <li><i class="fa-solid fa-check"></i> Dedicated Account Manager</li>
                        <li><i class="fa-solid fa-check"></i> Custom Rate Processing</li>
                        <li><i class="fa-solid fa-check"></i> Instant Settlements</li>
                        <li><i class="fa-solid fa-check"></i> 24/7 Phone Support</li>
                    </ul>
                    <a href="#contact" class="btn btn-secondary" style="width:100%;">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. Trust Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Made for Businesses That Need <span>Reliable Payments</span></h2>
                <p>We built our platform on absolute reliability so you can focus on building your product.</p>
            </div>
            
            <ul class="trust-points">
                <li><i class="fa-solid fa-shield-check"></i> Secure checkout</li>
                <li><i class="fa-solid fa-chart-pie"></i> Professional dashboard</li>
                <li><i class="fa-solid fa-bolt"></i> Fast onboarding</li>
                <li><i class="fa-solid fa-file-invoice"></i> Transparent records</li>
                <li><i class="fa-solid fa-headset"></i> Business support</li>
                <li><i class="fa-solid fa-face-smile"></i> Clean customer experience</li>
                <li><i class="fa-solid fa-magnifying-glass"></i> Payment status tracking</li>
                <li><i class="fa-solid fa-money-bill-transfer"></i> Refund and settlement clarity</li>
            </ul>
            
            <div class="trust-grid">
                <div class="trust-item">
                    <h4>99.9%</h4>
                    <p>Smooth checkout experience</p>
                </div>
                <div class="trust-item">
                    <h4><i class="fa-solid fa-bolt"></i></h4>
                    <p>Fast payment confirmation</p>
                </div>
                <div class="trust-item">
                    <h4><i class="fa-solid fa-chart-line"></i></h4>
                    <p>Business-first dashboard</p>
                </div>
                <div class="trust-item">
                    <h4><i class="fa-solid fa-shield-halved"></i></h4>
                    <p>Secure transaction flow</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 13. Testimonials Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Trusted by Businesses and <span>Growing Brands</span></h2>
                <p>Hear from the business owners who have transformed their payment flow with DEZOPAY.</p>
            </div>
            <div class="testimonial-grid">
                <div class="glass-card testimonial-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-text">"DEZOPAY gives our business a clean and professional way to collect payments online. The checkout experience feels simple, secure, and reliable."</p>
                    <div class="client-info">
                        <div class="client-avatar">AK</div>
                        <div>
                            <div style="font-weight:700; color:var(--accent);">Arjun K.</div>
                            <div style="font-size:12px; color:var(--text-secondary);">E-commerce Owner</div>
                        </div>
                    </div>
                </div>
                <div class="glass-card testimonial-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-text">"The dashboard clarity is amazing. I finally know exactly what payments failed, what succeeded, and when my settlements are arriving without needing to call support."</p>
                    <div class="client-info">
                        <div class="client-avatar">SM</div>
                        <div>
                            <div style="font-weight:700; color:var(--accent);">Sneha M.</div>
                            <div style="font-size:12px; color:var(--text-secondary);">Service Agency</div>
                        </div>
                    </div>
                </div>
                <div class="glass-card testimonial-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Our developers integrated DEZOPAY in less than a day. The API is clean, structured, and behaves exactly as documented. A truly premium experience."</p>
                    <div class="client-info">
                        <div class="client-avatar">PR</div>
                        <div>
                            <div style="font-weight:700; color:var(--accent);">Priya R.</div>
                            <div style="font-size:12px; color:var(--text-secondary);">SaaS Founder</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 14. FAQ Section -->
    <section class="section section-alt">
        <div class="container">
            <div class="section-header">
                <h2>Frequently Asked <span>Questions</span></h2>
            </div>
            
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="glass-card faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        What is DEZOPAY? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">DEZOPAY is a payment gateway platform built to help businesses accept online payments securely and professionally.</p>
                    </div>
                </div>
                
                <div class="glass-card faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        Who can use DEZOPAY? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">E-commerce stores, service businesses, agencies, educators, creators, and local businesses can use DEZOPAY.</p>
                    </div>
                </div>
                
                <div class="glass-card faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        Can I use DEZOPAY on my website? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">Yes, DEZOPAY should be designed for easy website and platform integration.</p>
                    </div>
                </div>
                
                <div class="glass-card faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        Does DEZOPAY have a dashboard? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">Yes, DEZOPAY should present a clean merchant dashboard for tracking payments, refunds, settlements, and transaction activity.</p>
                    </div>
                </div>

                <div class="glass-card faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        How can I contact DEZOPAY? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">You can contact DEZOPAY using the official phone number <a href="tel:9114411026" style="color:var(--primary);">9114411026</a> or through the website contact form.</p>
                    </div>
                </div>

                <div class="glass-card faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        Where is DEZOPAY located? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">DEZOPAY is based in Odisha, India.</p>
                    </div>
                </div>

                <div class="glass-card faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        Who is the Director of DEZOPAY? <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-top: 15px;">The Director of DEZOPAY is Tarik Islam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 15. Contact Section -->
    <section id="contact" class="section">
        <div class="container contact-container">
            <div>
                <h2 style="font-size: 40px; margin-bottom: 20px;">Start Accepting Payments with <span>DEZOPAY</span></h2>
                <p style="font-size: 18px; margin-bottom: 40px;">Ready to bring your business online with a secure and professional payment gateway? Contact DEZOPAY today and request onboarding.</p>
                
                <div style="margin-bottom: 30px;" class="glass-card">
                    <div style="padding: 30px;">
                        <h4 style="margin-bottom: 20px; font-size: 18px; border-bottom: 1px solid var(--border); padding-bottom: 10px;">Official Contact Details</h4>
                        <div style="display:flex; align-items:center; gap:15px; margin-bottom:15px;">
                            <i class="fa-solid fa-user-tie" style="color:var(--primary); font-size:20px; width: 20px;"></i>
                            <span style="font-size:16px;">Director: Tarik Islam</span>
                        </div>
                        <div style="display:flex; align-items:center; gap:15px; margin-bottom:15px;">
                            <i class="fa-solid fa-location-dot" style="color:var(--primary); font-size:20px; width: 20px;"></i>
                            <span style="font-size:16px;">Odisha, India</span>
                        </div>
                        <div style="display:flex; align-items:center; gap:15px; margin-bottom:15px;">
                            <i class="fa-solid fa-phone" style="color:var(--primary); font-size:20px; width: 20px;"></i>
                            <a href="tel:9114411026" style="font-size:16px; text-decoration: underline; text-underline-offset: 4px;">9114411026</a>
                        </div>
                        <div style="display:flex; align-items:center; gap:15px;">
                            <i class="fa-solid fa-envelope" style="color:var(--primary); font-size:20px; width: 20px;"></i>
                            <a href="mailto:support@dezopay.com" style="font-size:16px; text-decoration: underline; text-underline-offset: 4px;">support@dezopay.com</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="glass-card contact-form">
                <form onsubmit="event.preventDefault(); alert('Request submitted successfully! Our team will contact you shortly.');">
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
                        <div class="form-group">
                            <label class="form-label">Business Type</label>
                            <select class="form-control" required style="appearance:none; background-image:url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23D4AF37%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat:no-repeat; background-position:right .7em top 50%; background-size:.65em auto;">
                                <option value="" disabled selected>Select business type</option>
                                <option value="E-commerce">E-commerce</option>
                                <option value="Services">Services</option>
                                <option value="Digital Goods">Digital Goods</option>
                                <option value="Education">Education</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Monthly Payment Volume</label>
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
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Request Onboarding</button>
                    <a href="https://wa.me/919114411026" target="_blank" class="btn btn-secondary" style="width: 100%; margin-top: 15px; border-color: #25D366; color: #25D366;">
                        <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                    </a>
                </form>
            </div>
        </div>
    </section>

    <!-- 16. Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#" class="brand" style="margin-bottom: 15px;">
                        <i class="fa-solid fa-gem brand-icon"></i> DEZOPAY
                    </a>
                    <p>Secure online payment gateway for modern businesses.</p>
                    <div class="footer-contact">
                        <p><i class="fa-solid fa-user-tie"></i> Director: Tarik Islam</p>
                        <p><i class="fa-solid fa-location-dot"></i> Odisha, India</p>
                        <p><i class="fa-solid fa-phone"></i> <a href="tel:9114411026" style="color:var(--text-secondary);">9114411026</a></p>
                        <p><i class="fa-solid fa-envelope"></i> <a href="mailto:support@dezopay.com" style="color:var(--text-secondary);">support@dezopay.com</a></p>
                    </div>
                </div>
                
                <div>
                    <h5 class="footer-title">Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="footer-title">Product</h5>
                    <ul class="footer-links">
                        <li><a href="#features">Payment Gateway</a></li>
                        <li><a href="#">Payment Links</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#developers">Developer API</a></li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="footer-title">Resources</h5>
                    <ul class="footer-links">
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#security">Security</a></li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="footer-title">Legal</h5>
                    <ul class="footer-links">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Refund Policy</a></li>
                        <li><a href="#">Merchant Agreement</a></li>
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
        
        // Sticky Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                nav.style.background = 'rgba(5, 5, 5, 0.95)';
                nav.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.5)';
            } else {
                nav.style.background = 'rgba(5, 5, 5, 0.85)';
                nav.style.boxShadow = 'none';
            }
        });
    </script>
</body>
</html>