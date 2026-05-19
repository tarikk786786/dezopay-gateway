<?php
require_once 'merchant/config.php';
include 'imb-header1.php';
?>

    <!-- Main Content -->
    <main>
        <!-- Terms and Conditions Section -->
        <section class="terms-conditions pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="terms-content">
                            <div class="terms-header text-center mb-50">
                                <span class="premium-badge mb-15">LEGAL AGREEMENT</span>
                                <h2>Terms and Conditions</h2>
                                <p class="terms-subtitle">Please read these terms carefully before using the DEZOPAY payment services.</p>
                            </div>
                            
                            <div class="terms-section">
                                <h4>1. Acceptance of Terms</h4>
                                <p>By accessing or using DEZOPAY's UPI payment gateway services ("Services"), you agree to be bound by these Terms and Conditions ("Terms"). If you do not agree to all terms, you may not use our Services. These Terms constitute a binding legal agreement between you (the "Merchant" or "User") and DEZOPAY, under the directorship of Tarik Islam.</p>
                            </div>
                            
                            <div class="terms-section">
                                <h4>2. Service Description</h4>
                                <p>DEZOPAY provides a high-performance, secure digital payment gateway offering:</p>
                                <ul>
                                    <li>UPI payment processing services and instant settlement routing</li>
                                    <li>Merchant portal dashboard and transaction analytics</li>
                                    <li>Payment gateway APIs and checkout page integration</li>
                                    <li>Automated UTR and QR code generation facilities</li>
                                </ul>
                                <p>All services are subject to reserve guidelines issued by the Reserve Bank of India (RBI) and regulations formulated by the National Payments Corporation of India (NPCI).</p>
                            </div>
                            
                            <div class="terms-section">
                                <h4>3. Account Registration & KYC</h4>
                                <p>To utilize our payment gateway services, you must register a merchant account and comply with the following conditions:</p>
                                <ul>
                                    <li>Provide absolute, accurate, and complete registration information</li>
                                    <li>Be at least 18 years of age with full legal capacity</li>
                                    <li>Possess authorized signing capacity to bind your business entity</li>
                                    <li>Complete full Know Your Customer (KYC) verification including business PAN, bank details, and identity documents as required by regulatory mandates</li>
                                </ul>
                                <p>You are solely responsible for maintaining the strict confidentiality of your account credentials and api keys.</p>
                            </div>
                            
                            <div class="terms-section">
                                <h4>4. Prohibited Activities</h4>
                                <p>Users and merchants explicitly agree not to use DEZOPAY for:</p>
                                <ul>
                                    <li>Engaging in illegal activities, unauthorized sales, or prohibited business categories</li>
                                    <li>Attempting to bypass, reverse engineer, or compromise the gateway's security infrastructure</li>
                                    <li>Initiating, facilitating, or shielding fraudulent transactions</li>
                                    <li>Deploying scrapers, bots, automated request tools, or unauthorized testing scripts</li>
                                    <li>Violating any local, national, or international financial laws and regulations</li>
                                </ul>
                            </div>
                            
                            <div class="terms-section">
                                <h4>5. Transaction Processing</h4>
                                <p>All transactions processed through DEZOPAY are governed by:</p>
                                <ul>
                                    <li>UPI transaction limits and restrictions set by the RBI, NPCI, or processing partner banks</li>
                                    <li>Continuous fraud screening, velocity limit checks, and real-time risk assessment</li>
                                    <li>Bank settlement clearance schedules and availability</li>
                                </ul>
                                <p>DEZOPAY is not liable or responsible for transaction failures, delays, or errors arising from incorrect details supplied by the customer or bank server disruptions.</p>
                            </div>
                            
                            <div class="terms-section">
                                <h4>6. Fees and Charges</h4>
                                <p>Our transparent fee structure is defined as follows:</p>
                                <ul>
                                    <li><strong>UPI Transactions:</strong> 0% processing fees (unless premium enterprise routing is selected)</li>
                                    <li><strong>Disputed / Fraud Chargeback Handling:</strong> ₹200 per dispute instance</li>
                                    <li><strong>Premium Features / Add-ons:</strong> Subject to standard pricing listed on the platform</li>
                                </ul>
                                <p>We reserve the right to modify our service fee schedule by providing 30 days prior notice via email.</p>
                            </div>
                            
                            <div class="terms-section">
                                <h4>7. Settlement to Merchants</h4>
                                <p>Settlement guidelines are as follows:</p>
                                <ul>
                                    <li>Standard settlement: T+1 business days (transferred to your registered bank account)</li>
                                    <li>Minimum settlement threshold: ₹500</li>
                                    <li>Settlements are only made to verified, active bank accounts matching your registration details</li>
                                    <li>National holidays and banking closures may delay settlement cycles</li>
                                </ul>
                            </div>
                            
                            <div class="terms-section">
                                <h4>8. Dispute Resolution</h4>
                                <p>For transaction disputes and customer complaints:</p>
                                <ol>
                                    <li>We advise buyers to contact the merchant directly to resolve standard delivery issues</li>
                                    <li>Merchants and buyers can file formal disputes through the DEZOPAY support desk within 60 days of the transaction</li>
                                    <li>All relevant transaction receipts and UTR numbers must be provided for claim verification</li>
                                    <li>DEZOPAY reserves the final right of mediation to resolve disputed claims</li>
                                </ol>
                            </div>
                            
                            <div class="terms-section">
                                <h4>9. Limitation of Liability</h4>
                                <p>DEZOPAY's cumulative liability under any circumstances is strictly limited to:</p>
                                <ul>
                                    <li>The specific transaction amount out of which the direct dispute arose</li>
                                    <li>Proven direct losses caused solely by the willful neglect of our platform</li>
                                </ul>
                                <p>DEZOPAY, its directors, and affiliates shall not be held liable for:</p>
                                <ul>
                                    <li>Failures or downtime caused by NPCI, bank servers, or payment service providers</li>
                                    <li>Acts of God, force majeure events, or regulatory shutdowns</li>
                                    <li>Indirect, incidental, special, or consequential damages (including loss of profits)</li>
                                </ul>
                            </div>
                            
                            <div class="terms-section">
                                <h4>10. Suspension & Termination</h4>
                                <p>We reserve the right to suspend or terminate merchant accounts immediately for:</p>
                                <ul>
                                    <li>Any material violation of these Terms or our acceptable use guidelines</li>
                                    <li>Sudden high volumes of suspicious, fraudulent, or chargeback-heavy transactions</li>
                                    <li>Orders from state, federal, or regulatory authorities</li>
                                    <li>Inactivity exceeding 12 consecutive months</li>
                                </ul>
                            </div>
                            
                            <div class="terms-section">
                                <h4>11. Governing Law</h4>
                                <p>These Terms and Conditions shall be governed by and construed in accordance with the laws of India. Any disputes arising out of or in connection with these Services shall be subject to the exclusive jurisdiction of the competent courts in Odisha, India.</p>
                            </div>
                            
                            <div class="terms-section">
                                <h4>12. Amendments</h4>
                                <p>DEZOPAY reserves the right to amend these Terms at any time. Continued usage of the Services after modifications are posted constitutes absolute acceptance of the revised Terms.</p>
                            </div>
                            
                            <div class="terms-section">
                                <h4>13. Contact Information</h4>
                                <p>For any inquiries regarding these Terms and Conditions, please contact us at:</p>
                                <div class="contact-card">
                                    <p><strong>DEZOPAY Payment Gateway</strong></p>
                                    <p>Email: <a href="mailto:legal@dezopay.com">legal@dezopay.com</a></p>
                                    <p>Address: Odisha, India</p>
                                    <p>Phone: +91 9114411026</p>
                                </div>
                            </div>
                            
                            <p class="terms-update">Last Updated: May 17, 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main Content End -->

<?php include 'imb-footer1.php'; ?>

<style>
    /* Terms and Conditions Premium Dark Styles */
    .terms-conditions {
        background-color: var(--bg-main);
        position: relative;
    }
    
    .terms-conditions::before {
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
    
    .terms-content {
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
    
    .terms-content h2 {
        color: var(--accent) !important;
        font-size: 38px;
        font-weight: 800;
        margin-bottom: 15px;
    }
    
    .terms-subtitle {
        font-size: 16px;
        color: var(--text-secondary) !important;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .terms-section {
        margin-top: 40px;
        margin-bottom: 40px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding-bottom: 30px;
    }
    
    .terms-section:last-of-type {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .terms-section h4 {
        color: var(--primary) !important;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .terms-section p {
        color: var(--text-secondary) !important;
        line-height: 1.8;
        margin-bottom: 15px;
        font-size: 15px;
    }
    
    .terms-section ul, .terms-section ol {
        margin-left: 20px;
        margin-bottom: 20px;
    }
    
    .terms-section li {
        color: var(--text-secondary) !important;
        line-height: 1.8;
        margin-bottom: 10px;
        font-size: 14.5px;
        position: relative;
    }
    
    .terms-section ul li::marker {
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
    
    .terms-update {
        text-align: right;
        font-style: italic;
        color: rgba(255, 255, 255, 0.3) !important;
        margin-top: 40px;
        font-size: 13px;
    }
    
    @media (max-width: 991px) {
        .terms-content {
            padding: 35px;
        }
        .terms-content h2 {
            font-size: 30px;
        }
    }
    
    @media (max-width: 767px) {
        .terms-content {
            padding: 25px;
            border-radius: 12px;
        }
        .terms-content h2 {
            font-size: 26px;
        }
    }
</style>