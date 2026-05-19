<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $website_settings['title'] ?></title>
    <meta name="description" content="Explore <?= $website_settings['title'] ?>'s complete UPI payment services including instant payments, merchant solutions, secure transactions, and easy integration">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="<?= $site_url ?>/<?= $website_settings['favicon'] ?>">

    <!-- CSS here -->
    <link rel="stylesheet" href="newassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="newassets/css/animate.min.css">
    <link rel="stylesheet" href="newassets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="newassets/css/slick.css">
    <link rel="stylesheet" href="newassets/css/default.css">
    <link rel="stylesheet" href="newassets/css/style.css">
    <link rel="stylesheet" href="newassets/css/responsive.css">
    
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

        body {
            background-color: var(--bg-main) !important;
            color: var(--text-main) !important;
            font-family: 'Inter', sans-serif !important;
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--accent) !important;
        }

        p, span {
            color: var(--text-secondary) !important;
        }

        /* Glassmorphic Navbar Overrides */
        #sticky-header.menu-area {
            background: rgba(5, 5, 5, 0.85) !important;
            backdrop-filter: blur(12px) !important;
            border-bottom: 1px solid var(--border) !important;
            padding: 10px 0 !important;
        }

        .navigation > li > a {
            color: var(--text-secondary) !important;
            font-weight: 600 !important;
            font-size: 15px !important;
            transition: all 0.3s ease !important;
            text-transform: none !important;
        }

        .navigation > li > a:hover, 
        .navigation > li.active > a {
            color: var(--primary) !important;
        }

        /* Dropdown Overrides */
        .sub-menu {
            background: var(--card-bg) !important;
            border: 1px solid var(--border) !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6) !important;
            border-radius: 12px !important;
            padding: 15px 0 !important;
        }

        .sub-menu li a {
            color: var(--text-secondary) !important;
            padding: 10px 20px !important;
            transition: all 0.3s ease !important;
            font-weight: 500 !important;
        }

        .sub-menu li a:hover {
            color: var(--primary) !important;
            background: rgba(212, 175, 55, 0.1) !important;
        }

        /* Luxury Header Buttons */
        .header-action .btn {
            background: var(--primary) !important;
            color: var(--bg-main) !important;
            border: 1px solid var(--primary) !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            padding: 12px 28px !important;
            font-size: 14px !important;
            transition: all 0.3s ease !important;
            text-transform: none !important;
            display: inline-block !important;
        }

        .header-action .btn:hover {
            background: var(--primary-soft) !important;
            box-shadow: 0 4px 25px rgba(212, 175, 55, 0.3) !important;
            transform: translateY(-2px) !important;
            color: var(--bg-main) !important;
        }

        .mobile-nav-toggler svg {
            color: var(--primary) !important;
        }

        /* Mobile Drawer Customization */
        .mobile-menu .menu-box {
            background: var(--bg-secondary) !important;
            border-left: 1px solid var(--border) !important;
        }

        .mobile-menu .close-btn {
            color: var(--primary) !important;
        }

        .mobile-menu .navigation li a {
            color: var(--text-main) !important;
            font-weight: 600 !important;
        }

        .mobile-menu .navigation li a:hover {
            color: var(--primary) !important;
        }

        .mobile-menu .social-links .btn {
            border: 1px solid var(--border) !important;
            color: var(--text-main) !important;
            background: var(--card-bg) !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            padding: 12px 20px !important;
            margin-bottom: 10px !important;
            display: block !important;
            text-align: center !important;
        }

        .mobile-menu .social-links .btn:hover {
            background: var(--primary) !important;
            color: var(--bg-main) !important;
            border-color: var(--primary) !important;
        }

        /* Service Hero Section */
        .service-hero {
            background: linear-gradient(135deg, var(--bg-main) 0%, var(--bg-secondary) 100%) !important;
            border-bottom: 1px solid var(--border) !important;
            padding: 160px 0 100px !important;
            color: var(--text-main) !important;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .service-hero:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 30%, rgba(212, 175, 55, 0.12) 0%, rgba(5, 5, 5, 0) 70%) !important;
            pointer-events: none;
        }

        .service-hero h1 {
            font-size: 48px;
            font-weight: 900;
            margin-bottom: 20px;
            color: var(--accent) !important;
            letter-spacing: -1.5px;
        }

        .service-hero p {
            font-size: 18px;
            color: var(--text-secondary) !important;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Service Features Card */
        .service-card {
            background: var(--card-bg) !important;
            border-radius: 16px !important;
            padding: 45px 35px !important;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6) !important;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
            height: 100%;
            border: 1px solid var(--border) !important;
            position: relative;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-10px) !important;
            border-color: var(--primary) !important;
            box-shadow: 0 25px 60px rgba(212, 175, 55, 0.15) !important;
        }

        .service-card:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-soft) 100%) !important;
            transition: all 0.3s ease !important;
        }

        .service-card:hover:after {
            height: 6px;
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: rgba(212, 175, 55, 0.08) !important;
            border: 1px solid rgba(212, 175, 55, 0.3) !important;
            border-radius: 20px !important;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            transition: all 0.3s ease !important;
        }

        .service-card:hover .service-icon {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            color: var(--bg-main) !important;
        }

        .service-icon svg, .service-icon img {
            width: 40px;
            height: 40px;
            color: var(--primary) !important;
            transition: all 0.3s ease !important;
        }

        .service-card:hover .service-icon svg, 
        .service-card:hover .service-icon img {
            color: var(--bg-main) !important;
            filter: brightness(0) !important;
        }

        .service-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--accent) !important;
            font-weight: 700;
        }

        .service-card p {
            color: var(--text-secondary) !important;
            margin-bottom: 20px;
            font-size: 15px;
        }

        .service-features {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .service-features li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 25px;
            color: var(--text-secondary) !important;
            font-size: 14px;
        }

        .service-features li:before {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--primary) !important;
            font-size: 12px;
        }
        
        /* How It Works Section */
        .works-section {
            background: var(--bg-secondary) !important;
            padding: 100px 0 !important;
            border-top: 1px solid var(--border) !important;
            border-bottom: 1px solid var(--border) !important;
        }

        .work-step {
            position: relative;
            padding-left: 90px;
            margin-bottom: 40px;
        }

        .step-number {
            position: absolute;
            left: 0;
            top: 0;
            width: 60px;
            height: 60px;
            background: rgba(212, 175, 55, 0.10) !important;
            border: 2px solid var(--primary) !important;
            color: var(--primary) !important;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.1) !important;
        }

        .work-step h4 {
            font-size: 20px;
            margin-bottom: 10px;
            color: var(--accent) !important;
            font-weight: 700;
        }

        .work-step p {
            color: var(--text-secondary) !important;
            font-size: 15px;
        }
        
        /* Benefits Section */
        .benefit-card {
            background: var(--card-bg) !important;
            border: 1px solid var(--border) !important;
            border-radius: 16px !important;
            padding: 35px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4) !important;
            margin-bottom: 30px;
            height: 87%;
            transition: all 0.3s ease !important;
        }

        .benefit-card:hover {
            transform: translateY(-5px) !important;
            border-color: var(--primary) !important;
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.08) !important;
        }

        .benefit-card h4 {
            font-size: 20px;
            margin-bottom: 15px;
            color: var(--accent) !important;
            display: flex;
            align-items: center;
            font-weight: 700;
        }

        .benefit-card h4 img, .benefit-card h4 svg {
            margin-right: 15px;
            width: 30px;
            height: 30px;
            color: var(--primary) !important;
        }

        .benefit-card p {
            color: var(--text-secondary) !important;
            font-size: 15px;
            line-height: 1.6;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 767px) {
            .service-hero {
                padding: 140px 0 60px !important;
            }
            .service-hero h1 {
                font-size: 34px;
            }
            .work-step {
                padding-left: 75px;
            }
            .step-number {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Header Area -->
    <header>
        <div id="sticky-header" class="menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler">
                            <svg width="32" height="32" viewBox="0 0 448 512" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" class="icon-primary">
                                <path
                                    d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                            </svg>
                        </div>
                        <div class="menu-wrap">
                            <nav class="menu-nav">
                                <div class="logo">
                                    <a href="index"><img loading="lazy" src="<?= $site_url ?>/<?= $website_settings['logo'] ?>" alt="<?= $website_settings['title'] ?>"></a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li><a href="index">Home</a></li>
                                        <li><a href="service" class="active">Services</a></li>
                                        <li><a href="demo">Demo</a></li>
                                        <li class="menu-item-has-children dropdown-btn"><a href="#">Important link
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                    fill="currentColor" viewBox="0 0 16 16" style="margin-left: 6px;">
                                                    <path d="M1.5 5.5l6 6 6-6" stroke="currentColor" stroke-width="2"
                                                        fill="none" />
                                                </svg>
                                            </a>
                                            <ul class="sub-menu">
                                                <li><a href="Documentation">Documentation</a></li>
                                                <li><a href="privacy_policy">Privacy Policy</a></li>
                                                <li><a href="refund_policy">Refund Policy</a></li>
                                                <li><a href="Terms_and_Conditions">Terms and Conditions</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="merchant/register">Sign Up</a></li>
                                    </ul>
                                </div>
                                <div class="header-action">
                                    <ul class="list-wrap">
                                        <li class="header-btn"><a href="merchant/index" class="btn">Login<span></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Mobile Menu -->
                        <div class="mobile-menu">
                            <nav class="menu-box">
                                <div class="close-btn">
                                    <svg width="32" height="32" viewBox="0 0 448 512" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" class="icon-primary">
                                        <path
                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                    </svg>
                                </div>
                                <div class="nav-logo">
                                    <a href="index"><img loading="lazy" src="<?= $site_url ?>/<?= $website_settings['logo'] ?>" alt="<?= $website_settings['title'] ?>"></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="list-wrap">
                                        <li class="header-btn"><a href="merchant/index" class="btn">Login<span></span></a></li>
                                        <li class="header-btn"><a href="merchant/register" class="btn" style="background-color:blueviolet;">Register<span></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->