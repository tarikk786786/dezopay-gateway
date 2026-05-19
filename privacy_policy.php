<?php
require_once 'merchant/config.php';
include 'imb-header1.php';
?>

    <!-- Main Content -->
    <main>
        <!-- Privacy Policy Section -->
        <section class="privacy-policy pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="privacy-content">
                            <div class="policy-header text-center mb-50">
                                <span class="premium-badge mb-15">DATA PROTECTION</span>
                                <h2>Privacy Policy</h2>
                                <p class="policy-subtitle">Your privacy is our utmost priority. Learn how DEZOPAY protects and handles your personal information.</p>
                            </div>
                            
                            <div class="policy-section">
                                <h4>1. Introduction</h4>
                                <p>DEZOPAY ("we," "our," or "us"), operated under the management of Tarik Islam, is committed to safeguarding your personal data and ensuring complete transparency. This Privacy Policy details how we collect, process, disclose, and secure your information when you utilize our secure UPI payment gateway services, merchant portal, and related web interfaces.</p>
                            </div>
                            
                            <div class="policy-section">
                                <h4>2. Information We Collect</h4>
                                <p>To deliver modern, secure, and regulatory-compliant payment services, we may collect:</p>
                                <ul>
                                    <li><strong>Personal & Business Identifiers:</strong> Your full name, official business name, email address, phone number, physical registered address, and taxation/corporate details.</li>
                                    <li><strong>KYC Verification Details:</strong> Permanent Account Number (PAN), Aadhaar card details, business registration certificates, and bank account information.</li>
                                    <li><strong>Transaction Metadata:</strong> Payment methods, transaction timestamps, payment amounts, beneficiary UPI IDs, UTR bank clearance codes, and device details.</li>
                                    <li><strong>Network & Technical Logins:</strong> Browser type, geographic location, IP address, system OS, and security audit log traces to secure the network.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>3. How We Use Your Information</h4>
                                <p>We process data strictly under relevant regulatory requirements to:</p>
                                <ul>
                                    <li>Authenticate user access and seamlessly execute UPI transactions.</li>
                                    <li>Mitigate financial fraud, run risk assessment algorithms, and prevent unauthorized card/UPI usage.</li>
                                    <li>Fulfill identity verification processes in alignment with RBI and banking mandates.</li>
                                    <li>Enhance our platform architecture, troubleshoot system anomalies, and deploy premium features.</li>
                                    <li>Dispatch crucial transaction notifications, system alerts, and merchant statements.</li>
                                    <li>Comply with judicial and administrative requests in accordance with Indian Law.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>4. Data Security Standards</h4>
                                <p>DEZOPAY employs state-of-the-art fintech grade security models, including:</p>
                                <ul>
                                    <li>256-bit Secure Sockets Layer (SSL) encryption for all operational network requests.</li>
                                    <li>PCI-DSS compliant infrastructure guidelines to handle high-volume digital merchant queries.</li>
                                    <li>Secure tokenization methods to prevent exposing merchant bank account numbers or customer identifiers.</li>
                                    <li>Strict, role-based internal data access configurations ensuring only certified security personnel oversee operations.</li>
                                    <li>Regular system vulnerability scans and independent server audits.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>5. Data Retention Policy</h4>
                                <p>We retain transaction and identity files only for the duration required to:</p>
                                <ul>
                                    <li>Perform our standard payment routing operations.</li>
                                    <li>Comply with Indian financial legislation (under which transaction logs must typically be preserved for a minimum of 7 years).</li>
                                    <li>Establish, exercise, or defend legitimate legal claims and audit requests.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>6. Third-Party Data Sharing</h4>
                                <p>DEZOPAY does not rent, sell, or commercialize your personal information. We share data only with:</p>
                                <ul>
                                    <li>Licensed partner banks and NPCI network routers to securely settle payments.</li>
                                    <li>Regulatory bodies, tax authorities, and legal entities in response to legal processes or criminal investigations.</li>
                                    <li>Strictly vetted technology providers (such as secure cloud hosts) who sign airtight non-disclosure agreements.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>7. Your Legal Rights</h4>
                                <p>Merchants and buyers have the following control rights regarding their personal profiles:</p>
                                <ul>
                                    <li>Request access to the exact personal records maintained in our systems.</li>
                                    <li>Initiate correction or updating of inaccurate or outdated KYC and profile details.</li>
                                    <li>Request deletion of account information (subject to Indian financial data retention laws).</li>
                                    <li>Object to certain automated processing elements or request manual reviews of transaction blocks.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>8. Cookies & Session Analytics</h4>
                                <p>We use session cookies and tracking tags to keep you authenticated inside the merchant dashboard, remember portal preferences, and monitor dashboard loading speeds. You can disable cookies inside browser preferences, though it may impair dashboard login capabilities.</p>
                            </div>
                            
                            <div class="policy-section">
                                <h4>9. Policy Updates</h4>
                                <p>DEZOPAY reserves the right to modify this Privacy Policy. We will announce material modifications by updating the effective date below and sending notices to active merchants.</p>
                            </div>
                            
                            <div class="policy-section">
                                <h4>10. Contact Our Privacy Desk</h4>
                                <p>For data inquiries, rights requests, or details regarding security protocols, please contact our Data Protection Desk at:</p>
                                <div class="contact-card">
                                    <p><strong>DEZOPAY Privacy Desk</strong></p>
                                    <p>Email: <a href="mailto:legal@dezopay.com">legal@dezopay.com</a></p>
                                    <p>Office Address: Odisha, India</p>
                                    <p>Phone: +91 9114411026</p>
                                </div>
                            </div>
                            
                            <p class="policy-update">Last Updated: May 17, 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main Content End -->

<?php include 'imb-footer1.php'; ?>

<style>
    /* Privacy Policy Premium Dark Styles */
    .privacy-policy {
        background-color: var(--bg-main);
        position: relative;
    }
    
    .privacy-policy::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top, rgba(212, 175, 55, 0.08) 0%, rgba(5, 5, 5, 0) 70%);
        pointer-events: none;
    }
    
    .privacy-content {
        background: var(--card-bg);
        border: 1px solid var(--border);
        padding: 50px;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
    }
    
    .premium-badge {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        color: var(--primary);
        background: rgba(212, 175, 55, 0.1);
        padding: 6px 16px;
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        text-transform: uppercase;
    }
    
    .privacy-content h2 {
        color: var(--accent) !important;
        font-size: 38px;
        font-weight: 800;
        margin-bottom: 15px;
    }
    
    .policy-subtitle {
        font-size: 16px;
        color: var(--text-secondary) !important;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .policy-section {
        margin-top: 40px;
        margin-bottom: 40px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding-bottom: 30px;
    }
    
    .policy-section:last-of-type {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .policy-section h4 {
        color: var(--primary) !important;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .policy-section p {
        color: var(--text-secondary) !important;
        line-height: 1.8;
        margin-bottom: 15px;
        font-size: 15px;
    }
    
    .policy-section ul, .policy-section ol {
        margin-left: 20px;
        margin-bottom: 20px;
    }
    
    .policy-section li {
        color: var(--text-secondary) !important;
        line-height: 1.8;
        margin-bottom: 10px;
        font-size: 14.5px;
        position: relative;
    }
    
    .policy-section ul li::marker {
        color: var(--primary);
    }
    
    .contact-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 25px;
        margin-top: 20px;
        max-width: 500px;
    }
    
    .contact-card p {
        margin-bottom: 8px;
        font-size: 14.5px;
    }
    
    .contact-card p strong {
        color: var(--accent);
        font-size: 16px;
    }
    
    .contact-card a {
        color: var(--primary);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .contact-card a:hover {
        color: var(--primary-soft);
        text-shadow: 0 0 10px rgba(212, 175, 55, 0.2);
    }
    
    .policy-update {
        text-align: right;
        font-style: italic;
        color: rgba(255, 255, 255, 0.3) !important;
        margin-top: 40px;
        font-size: 13px;
    }
    
    @media (max-width: 991px) {
        .privacy-content {
            padding: 35px;
        }
        .privacy-content h2 {
            font-size: 30px;
        }
    }
    
    @media (max-width: 767px) {
        .privacy-content {
            padding: 25px;
            border-radius: 12px;
        }
        .privacy-content h2 {
            font-size: 26px;
        }
    }
</style>