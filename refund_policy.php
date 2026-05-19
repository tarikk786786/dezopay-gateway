<?php
require_once 'merchant/config.php';
include 'imb-header1.php';
?>

    <!-- Main Content -->
    <main>
        <!-- Refund Policy Section -->
        <section class="refund-policy pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="refund-content">
                            <div class="policy-header text-center mb-50">
                                <span class="premium-badge mb-15">TRANSACTION POLICIES</span>
                                <h2>Refund Policy</h2>
                                <p class="policy-subtitle">Clear, fair, and regulatory-aligned payment guidelines for merchants and customers using DEZOPAY.</p>
                            </div>
                            
                            <div class="policy-section">
                                <h4>1. Refund Eligibility</h4>
                                <p>DEZOPAY provides clear refund guidelines for transaction processing. A buyer or merchant is eligible to trigger refund requests under the following criteria:</p>
                                <ul>
                                    <li><strong>Deducted but Failed:</strong> The transaction was reported failed by the bank or API, yet funds were successfully debited from the payer's account.</li>
                                    <li><strong>Duplicate Processing:</strong> An error led to duplicate transactions being executed and settled for a single purchase.</li>
                                    <li><strong>Incorrect Routing:</strong> Technical server anomalies caused payments to be routed to incorrect settlement pools.</li>
                                    <li><strong>Non-Delivery of Merchant Services:</strong> In verified cases where the merchant fails to provide the product or service as bound by the sale agreement.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>2. Non-Refundable Scenarios</h4>
                                <p>We typically cannot authorize or process refunds for:</p>
                                <ul>
                                    <li>Transactions that were successfully executed, where the merchant delivered products/services as described in their policies.</li>
                                    <li>Refund claims filed more than 180 days after the original transaction timestamp.</li>
                                    <li>Cases where the customer provided incorrect beneficiary credentials or incomplete UPI routing addresses.</li>
                                    <li>Standard government tax levies or non-refundable bank integration fees.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>3. Refund Request Procedure</h4>
                                <p>To initiate a refund verification query:</p>
                                <ol>
                                    <li>File a formal ticket via your DEZOPAY Merchant Dashboard or contact the support desk directly at <a href="mailto:refunds@dezopay.com">refunds@dezopay.com</a>.</li>
                                    <li>Supply complete transaction metadata: the exact transaction amount, transaction date, and the unique 12-digit Bank UTR/UPI Ref number.</li>
                                    <li>Submit bank statements showing debits if requested by our support desk.</li>
                                    <li>Our risk mitigation department will audit and verify the request within 3 to 5 business days.</li>
                                    <li>Upon verification, standard funds are routed back to the original payer account within 7 to 10 banking business days.</li>
                                </ol>
                            </div>
                            
                            <div class="policy-section">
                                <h4>4. Refund Payout Routes</h4>
                                <p>Refund settlements are completed via:</p>
                                <ul>
                                    <li><strong>Original Payment Method:</strong> The standard route where funds return directly to the debited bank account/UPI ID.</li>
                                    <li><strong>Direct Bank Settlement:</strong> Transferred directly to the verified bank account credentials of the buyer/merchant.</li>
                                </ul>
                                <p>Please note that banking processing partners may enforce independent settlement schedules.</p>
                            </div>
                            
                            <div class="policy-section">
                                <h4>5. Standard Refund Timelines</h4>
                                <p>Typical windows for successful fund routing include:</p>
                                <ul>
                                    <li><strong>Failed UPI Transactions:</strong> Automated bank loops generally process these in 3 to 5 business days.</li>
                                    <li><strong>Disputed Merchant Transactions:</strong> Formal mediation files are generally finalized within 7 to 14 business days.</li>
                                </ul>
                                <p>Partner bank settlement gateways may require an additional 1 to 3 business days to credit funds.</p>
                            </div>
                            
                            <div class="policy-section">
                                <h4>6. Chargebacks and Formal Disputes</h4>
                                <p>For disputed transactions:</p>
                                <ul>
                                    <li>We advise clients to seek direct resolution with the onboarding merchant.</li>
                                    <li>If dispute resolution fails, customers must register their claim through the DEZOPAY helpdesk within 60 days of the transaction.</li>
                                    <li>We reserve the right to temporarily freeze disputed funds in the merchant's settlement reserves during active investigations.</li>
                                    <li>Our security team will review claims from both parties and finalize rulings within 30 days.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>7. Merchant Commitments</h4>
                                <p>Merchants utilizing DEZOPAY must comply with standard transaction ethics:</p>
                                <ul>
                                    <li>Maintain a clearly visible, transparent, and accurate Refund Policy on their platform/app.</li>
                                    <li>Review and approve valid buyer refund requests within 7 calendar days.</li>
                                    <li>Maintain a healthy escrow or reserve balance in their DEZOPAY merchant account to cover chargeback liabilities.</li>
                                    <li>Submit all requested shipping, dispatch, and delivery proof during active dispute reviews.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>8. Delayed or Missing Payouts</h4>
                                <p>If a verified refund has not been credited within the specified timeframe:</p>
                                <ul>
                                    <li>Double-check your bank passbook/statement (bank notification systems may fail).</li>
                                    <li>Reach out to your banking branch using the unique 12-digit UTR/UPI reference code to trace the credit status.</li>
                                    <li>If the issue remains unresolved, contact our refunds team with your ticket ID for instant assistance.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-section">
                                <h4>9. Policy Modifications</h4>
                                <p>DEZOPAY reserves the right to amend this Refund Policy to match national banking regulations. All active merchants will receive prompt notifications regarding material changes.</p>
                            </div>
                            
                            <div class="policy-section">
                                <h4>10. Contact Our Refunds Desk</h4>
                                <p>For transaction traces, dispute submissions, or refund queries, contact our dedicated desk at:</p>
                                <div class="contact-card">
                                    <p><strong>DEZOPAY Refunds & Disputes Desk</strong></p>
                                    <p>Email: <a href="mailto:refunds@dezopay.com">refunds@dezopay.com</a></p>
                                    <p>Address: Odisha, India</p>
                                    <p>Phone: +91 9114411026</p>
                                    <p>Operating Hours: Monday to Saturday (10:00 AM – 6:00 PM IST)</p>
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
    /* Refund Policy Premium Dark Styles */
    .refund-policy {
        background-color: var(--bg-main);
        position: relative;
    }
    
    .refund-policy::before {
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
    
    .refund-content {
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
    
    .refund-content h2 {
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
        .refund-content {
            padding: 35px;
        }
        .refund-content h2 {
            font-size: 30px;
        }
    }
    
    @media (max-width: 767px) {
        .refund-content {
            padding: 25px;
            border-radius: 12px;
        }
        .refund-content h2 {
            font-size: 26px;
        }
    }
</style>