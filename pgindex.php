<?php
// Initialize or load any configs here if needed.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Complete Your Payment | DEZOPAY Secure Checkout</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e',
                        },
                        paytm: '#002970',
                        gpay: '#ea4335',
                        phonepe: '#5f259f'
                    },
                    boxShadow: {
                        'premium': '0 20px 40px -15px rgba(0,0,0,0.05), 0 0 20px 0 rgba(0,0,0,0.02)',
                        'inner-soft': 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.03)',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                        'slide-up': 'slideUp 0.6s ease-out forwards',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(15px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>
    <!-- Phosphor Icons for premium icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <style>
        body {
            background-color: #f8fafc;
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 24px 24px;
            -webkit-font-smoothing: antialiased;
        }
        
        /* Custom Scrollbar for hidden elements */
        ::-webkit-scrollbar {
            width: 4px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        
        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.9);
        }
        
        .loader-spinner {
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top: 3px solid white;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 text-slate-800">

    <div class="w-full max-w-md animate-slide-up">
        <!-- Secure Header -->
        <div class="flex items-center justify-center gap-2 mb-4 text-slate-500 text-sm font-medium animate-fade-in">
            <i class="ph-fill ph-lock-key text-green-500 text-base"></i>
            <span>100% Secure Payment by DEZOPAY</span>
        </div>

        <!-- Main Checkout Card -->
        <div class="glass-panel shadow-premium rounded-3xl overflow-hidden relative">
            
            <!-- Top Gradient Bar -->
            <div class="h-2 w-full bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>
            
            <!-- Merchant Header -->
            <div class="px-6 py-6 border-b border-slate-100 flex flex-col items-center justify-center text-center relative bg-white">
                <div class="w-14 h-14 bg-slate-50 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-center mb-3">
                    <!-- Placeholder for Merchant Logo -->
                    <i class="ph-duotone ph-storefront text-2xl text-brand-600"></i>
                </div>
                <h1 class="font-bold text-lg text-slate-800 tracking-tight">Dhanya Infotech Pvt. Ltd.</h1>
                <div class="flex items-center gap-1.5 mt-1.5 px-3 py-1 bg-green-50 rounded-full border border-green-100">
                    <i class="ph-fill ph-check-circle text-green-600 text-sm"></i>
                    <span class="text-xs font-semibold text-green-700 uppercase tracking-wide">Verified Business</span>
                </div>
            </div>

            <!-- Amount Section -->
            <div class="bg-slate-50 px-6 py-5 border-b border-slate-100 flex justify-between items-center">
                <div class="flex flex-col">
                    <span class="text-xs text-slate-500 font-medium uppercase tracking-wider mb-1">Total Amount Due</span>
                    <div class="flex items-baseline gap-1">
                        <span class="text-xl font-bold text-slate-700">₹</span>
                        <span class="text-3xl font-extrabold text-slate-900 tracking-tight">1,250</span>
                        <span class="text-lg font-semibold text-slate-500">.00</span>
                    </div>
                </div>
                
                <div class="flex flex-col items-end">
                    <span class="text-xs text-slate-500 font-medium mb-1">Time Remaining</span>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-600 rounded-lg font-mono font-bold text-sm border border-red-100 shadow-inner-soft">
                        <i class="ph-duotone ph-timer"></i>
                        <span id="timer">05:00</span>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white">
                
                <!-- QR Code Area -->
                <div class="flex flex-col items-center justify-center mb-8">
                    <div class="relative group cursor-pointer">
                        <div class="absolute inset-0 bg-brand-500 blur-xl opacity-20 rounded-3xl animate-pulse-slow"></div>
                        <div class="relative bg-white p-4 rounded-3xl border-2 border-slate-100 shadow-sm transition-transform duration-300 group-hover:scale-[1.02]">
                            <!-- Static QR placeholder for now -->
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=upi://pay?pa=merchant@upi&pn=DhanyaInfotech&am=1250&cu=INR" alt="Scan to pay" class="w-40 h-40 rounded-xl opacity-90 transition-opacity duration-300 group-hover:opacity-100">
                            
                            <!-- Scanner overlay effect -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-brand-500/50 shadow-[0_0_8px_2px_rgba(14,165,233,0.5)] rounded-full hidden group-hover:block" style="animation: scan 2s linear infinite;"></div>
                        </div>
                    </div>
                    <p class="mt-4 text-sm font-semibold text-slate-500 tracking-wide uppercase">Scan with any UPI App</p>
                    
                    <div class="flex items-center justify-center gap-3 mt-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Google_Pay_Logo.svg" alt="GPay" class="h-4 grayscale hover:grayscale-0 transition-all">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/PhonePe_logo.png" alt="PhonePe" class="h-4 grayscale hover:grayscale-0 transition-all">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/24/Paytm_Logo_%28standalone%29.svg" alt="Paytm" class="h-3 grayscale hover:grayscale-0 transition-all">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e1/UPI-Logo-vector.svg" alt="UPI" class="h-4 grayscale hover:grayscale-0 transition-all">
                    </div>
                </div>

                <!-- Divider -->
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-px bg-slate-200 flex-1"></div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Or pay via</span>
                    <div class="h-px bg-slate-200 flex-1"></div>
                </div>

                <!-- One-Click UPI Options -->
                <div class="space-y-3">
                    
                    <button class="w-full flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 hover:border-slate-300 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center border border-slate-100">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Google_Pay_Logo.svg" alt="GPay" class="h-4">
                            </div>
                            <div class="flex flex-col text-left">
                                <span class="font-semibold text-slate-800 text-sm">Google Pay</span>
                                <span class="text-xs text-slate-500 font-medium">Fastest checkout</span>
                            </div>
                        </div>
                        <i class="ph-bold ph-caret-right text-slate-400 group-hover:text-slate-600 group-hover:translate-x-1 transition-transform"></i>
                    </button>

                    <button class="w-full flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 hover:border-slate-300 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#5f259f]/5 flex items-center justify-center border border-[#5f259f]/10">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/PhonePe_logo.png" alt="PhonePe" class="h-5">
                            </div>
                            <div class="flex flex-col text-left">
                                <span class="font-semibold text-slate-800 text-sm">PhonePe</span>
                                <span class="text-xs text-slate-500 font-medium">Pay directly via app</span>
                            </div>
                        </div>
                        <i class="ph-bold ph-caret-right text-slate-400 group-hover:text-slate-600 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    
                    <button class="w-full flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 transition-all group mt-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center border border-slate-200 shadow-sm">
                                <i class="ph-duotone ph-list-plus text-xl text-slate-600"></i>
                            </div>
                            <div class="flex flex-col text-left">
                                <span class="font-semibold text-slate-800 text-sm">More UPI Apps</span>
                                <span class="text-xs text-slate-500 font-medium">Paytm, BHIM, Amazon Pay</span>
                            </div>
                        </div>
                        <i class="ph-bold ph-caret-down text-slate-400"></i>
                    </button>

                </div>

            </div>
            
            <!-- Secure Footer Badge -->
            <div class="bg-slate-50 p-4 border-t border-slate-100 flex items-center justify-center gap-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e1/UPI-Logo-vector.svg" alt="UPI" class="h-4 opacity-50">
                <div class="w-px h-4 bg-slate-300"></div>
                <div class="flex items-center gap-1 opacity-50">
                    <i class="ph-fill ph-shield-check text-slate-600"></i>
                    <span class="text-xs font-semibold text-slate-600">PCI-DSS Compliant</span>
                </div>
            </div>

        </div>
        
        <!-- Support link -->
        <div class="mt-6 text-center text-sm font-medium text-slate-500">
            Having trouble? <a href="#" class="text-brand-600 hover:text-brand-700 transition-colors">Contact Support</a>
        </div>
    </div>

    <style>
        @keyframes scan {
            0% { top: 0; opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }
    </style>

    <!-- Timer Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const timerElement = document.getElementById('timer');
            let timeRemaining = 300; // 5 minutes

            const countdown = setInterval(() => {
                const minutes = Math.floor(timeRemaining / 60);
                const seconds = timeRemaining % 60;
                
                timerElement.textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

                if (timeRemaining > 0) {
                    timeRemaining--;
                    // Add subtle pulse when time is running out (< 1 min)
                    if (timeRemaining < 60 && !timerElement.parentElement.classList.contains('animate-pulse')) {
                        timerElement.parentElement.classList.add('animate-pulse');
                    }
                } else {
                    clearInterval(countdown);
                    timerElement.textContent = '00:00';
                    timerElement.parentElement.classList.replace('bg-red-50', 'bg-slate-100');
                    timerElement.parentElement.classList.replace('text-red-600', 'text-slate-500');
                    timerElement.parentElement.classList.replace('border-red-100', 'border-slate-200');
                    // Add session expiry logic here
                }
            }, 1000);
        });
    </script>
</body>
</html>
