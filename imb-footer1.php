  <!-- Footer Area -->
    <style>
        .footer-area {
            background: var(--bg-secondary) !important;
            border-top: 1px solid var(--border) !important;
            padding: 80px 0 0 !important;
        }
        .footer-top {
            padding-bottom: 60px !important;
        }
        .footer-widget .fw-title {
            color: var(--accent) !important;
            font-weight: 700 !important;
            font-size: 18px !important;
            margin-bottom: 25px !important;
            position: relative;
            padding-bottom: 10px;
        }
        .footer-widget .fw-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--primary);
        }
        .footer-widget .fw-link ul li {
            margin-bottom: 12px;
        }
        .footer-widget .fw-link ul li a {
            color: var(--text-secondary) !important;
            transition: all 0.3s ease !important;
            font-size: 14px;
            display: inline-block;
        }
        .footer-widget .fw-link ul li a:hover {
            color: var(--primary) !important;
            transform: translateX(5px);
        }
        .footer-about ul li {
            color: var(--text-secondary) !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            margin-bottom: 15px !important;
            font-size: 14px;
        }
        .footer-about ul li img {
            width: 16px;
            height: 16px;
            filter: sepia(1) saturate(5) hue-rotate(5deg);
        }
        .footer-about ul li a {
            color: var(--text-secondary) !important;
            transition: all 0.3s ease !important;
        }
        .footer-about ul li a:hover {
            color: var(--primary) !important;
        }
        .footer-contact span {
            color: var(--text-secondary) !important;
            font-size: 12px !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            display: block;
            margin-bottom: 5px;
        }
        .footer-contact .title a {
            color: var(--primary) !important;
            font-weight: 800 !important;
            font-size: 22px;
            transition: all 0.3s ease !important;
        }
        .footer-contact .title a:hover {
            color: var(--primary-soft) !important;
            text-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
        }
        .footer-social {
            margin-bottom: 20px;
        }
        .footer-social ul {
            display: flex;
            gap: 10px;
            list-style: none;
            padding: 0;
        }
        .footer-social ul li a {
            width: 40px;
            height: 40px;
            border-radius: 50% !important;
            background: var(--card-bg) !important;
            border: 1px solid var(--border) !important;
            color: var(--text-secondary) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.3s ease !important;
        }
        .footer-social ul li a:hover {
            color: var(--bg-main) !important;
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            transform: translateY(-3px);
        }
        .footer-social ul li a svg {
            fill: currentColor !important;
            width: 18px;
            height: 18px;
        }
        .footer-bottom {
            background: var(--bg-main) !important;
            border-top: 1px solid var(--border) !important;
            padding: 30px 0 !important;
            margin-top: 40px;
        }
        .copyright-text p {
            color: var(--text-secondary) !important;
            font-size: 14px !important;
            margin: 0;
        }
    </style>

    <footer>
        <div class="footer-area">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget">
                                <div class="logo" style="margin-bottom: 25px;">
                                    <a href="index"><img loading="lazy" src="<?= $site_url ?>/<?= $website_settings['logo'] ?>" alt="DEZOPAY Logo" style="max-height: 45px;"></a>
                                </div>
                                <div class="footer-social">
                                    <ul class="list-wrap">
                                        <li><a href="https://wa.me/919114411026" target="_blank" title="WhatsApp Chat">
                                                <svg class="icon-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li><a href="https://wa.me/919114411026" target="_blank" title="Telegram">
                                                <svg class="icon-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                                    <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 18.3z"/>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-contact">
                                    <span>Support Center</span>
                                    <h2 class="title"><a href="https://wa.me/919114411026" target="_blank">+91 9114411026</a></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="fw-title">DEZOPAY Solutions</h4>
                                <div class="fw-link">
                                    <ul class="list-wrap">
                                        <li><a href="Documentation">API Documentation</a></li>
                                        <li><a href="demo">Live Demo</a></li>
                                        <li><a href="service">Payment Services</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="fw-title">Merchant Hub</h4>
                                <div class="fw-link">
                                    <ul class="list-wrap">
                                        <li><a href="merchant/index">Merchant Login</a></li>
                                        <li><a href="merchant/register">Create Account</a></li>
                                        <li><a href="merchant/forgot-password">Reset Password</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="fw-title">Contact Office</h4>
                                <div class="footer-about">
                                    <ul class="list-wrap">
                                        <li><img loading="lazy" src="newassets/img/icon/phone_icon.svg" alt=""><a href="https://wa.me/919114411026">+91 9114411026</a></li>
                                        <li><img loading="lazy" src="newassets/img/icon/mail_icon.svg" alt=""><a href="mailto:support@dezopay.com">support@dezopay.com</a></li>
                                        <li><img loading="lazy" src="newassets/img/icon/loction_icon.svg" alt=""><span>Odisha, India</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <span style="font-weight: 700; font-size: 16px; color: var(--accent) !important; letter-spacing: 1px;">DEZOPAY<span style="color: var(--primary);">.</span></span>
                        </div>
                        <div class="col-md-6">
                            <div class="copyright-text text-end">
                                <p>© 2026 DEZOPAY Payment Gateway. Built with Security & Speed. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- JS here -->
    <script src="newassets/js/jquery-3.6.0.min.js"></script>
    <script src="newassets/js/bootstrap.min.js"></script>
    <script src="newassets/js/swiper-bundle.min.js"></script>
    <script src="newassets/js/slick.min.js"></script>
    <script src="newassets/js/wow.min.js"></script>
    <script src="newassets/js/main.js"></script>
    
    <script disable-devtool-auto="" src="newassets/disable-devtool.js" data-url="https://www.google.com/"></script>

</body>

</html>