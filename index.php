<?php
$pageTitle = 'MEDCASE - Master Clinical Reasoning';
include 'includes/head.php';
include 'includes/header.php';
?>
<main class="w-full">
    <!-- Hero Section -->
    <section class="relative pt-24 pb-32 overflow-hidden flex flex-col items-center justify-center min-h-[90vh]">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-surface-container-high/50 blur-3xl opacity-60"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-primary-fixed/30 blur-3xl opacity-50"></div>
        </div>
        <div class="container mx-auto px-lg md:px-xl relative z-10 max-w-container-max flex flex-col lg:flex-row items-center gap-xl">
            <div class="w-full lg:w-1/2 flex flex-col items-start gap-lg">
                <div class="inline-flex items-center gap-sm px-sm py-xs bg-surface-container-low rounded-full border border-outline-variant/50">
                    <span class="bg-secondary text-on-secondary font-label-caps text-label-caps px-2 py-1 rounded-full">NEW</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant pr-2">Advanced Trauma Module Released</span>
                </div>
                <h1 class="font-display text-display text-on-background leading-tight">
                    Master Clinical Reasoning with <span class="text-secondary">High-Fidelity Simulation</span>
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                    Elevate diagnostic accuracy and decision-making skills through immersive, real-world patient scenarios designed for medical professionals and institutions.
                </p>
                <div class="flex flex-col sm:flex-row gap-md mt-sm w-full sm:w-auto">
                    <button class="bg-secondary text-on-secondary px-xl py-md rounded-lg font-body-lg hover:bg-on-secondary-fixed-variant transition-colors btn-primary-glow flex items-center justify-center gap-sm w-full sm:w-auto active:scale-95 duration-200">
                        Start Free Trial
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                    <button class="bg-surface text-on-surface border border-outline-variant px-xl py-md rounded-lg font-body-lg hover:bg-surface-container-low transition-colors flex items-center justify-center gap-sm w-full sm:w-auto active:scale-95 duration-200">
                        <span class="material-symbols-outlined">play_circle</span>
                        View Demo
                    </button>
                </div>
                <div class="mt-lg flex items-center gap-md text-on-surface-variant font-body-sm text-body-sm">
                    <div class="flex -space-x-2">
                        <img alt="Doctor" class="w-8 h-8 rounded-full border-2 border-surface object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYxEGuD5DbXs_Y9BauGBtc0TqCSZ3CKaOl6jdrqX6q_g0-MorLRFCLvyNnQtRe4eZCzW_C5h0ySUJHj85gPgUJBrHdPyD-37d6tbWVk3NClZhzs88bMSeFkaQ9J_CaqIMhANY_cGyclcSZWPu3I-RGihuauqnwUKcjJkMMn8lEUbzQPvBCdFNT1yYC3qLHy5QXUMvcelL_hy7JwilBvI3Io7W8gKU42O94a-TaH9pUG7N3jBWyMuWm_47trLtMG0nmh7bPSjdDfgg"/>
                        <img alt="Doctor" class="w-8 h-8 rounded-full border-2 border-surface object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtHzfubRTDJtvCp0bVzWPGnP7Y7YBhhcQuCy_9-nastgESvLGxXZqVL3C0lufuedMOkxg7Z7LpA_GD0D1mv9I6lUOX3OpWj3fdpsmq595C2XTBoEkqJb1U8Nrgr5O29Ca3El7M-xFpgTzMy4GrJ9TyVGk3iz-G_zb_ho-ai6mnrTGwzzeBwcXjFaLakqsuZ0_xGHYFeUOvQ6aOYfbWNLWWlbAyLIH7o7mJpi4wLNRGpzOCycUq3QyRt1yeVaGXWfiLpXg3HpCtT08"/>
                        <div class="w-8 h-8 rounded-full border-2 border-surface bg-surface-container-high flex items-center justify-center text-xs text-on-surface-variant">+2k</div>
                    </div>
                    <span>Trusted by leading medical institutions worldwide</span>
                </div>
            </div>
            <!-- Hero Image/UI Mockup -->
            <div class="w-full lg:w-1/2 relative mt-xl lg:mt-0">
                <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden glass-panel soft-medical-shadow p-2">
                    <div class="w-full h-full bg-surface-container-lowest rounded-lg border border-outline-variant/30 overflow-hidden relative">
                        <!-- Header of mockup -->
                        <div class="w-full h-12 bg-surface flex items-center px-md border-b border-outline-variant/30 gap-sm">
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 rounded-full bg-error/80"></div>
                                <div class="w-3 h-3 rounded-full bg-surface-tint/80"></div>
                                <div class="w-3 h-3 rounded-full bg-tertiary-container/80"></div>
                            </div>
                            <div class="mx-auto w-1/2 h-6 bg-surface-container-low rounded flex items-center justify-center">
                                <span class="text-[10px] text-on-surface-variant font-label-caps">CASE: 42M - ACUTE CHEST PAIN</span>
                            </div>
                        </div>
                        <!-- Content of mockup -->
                        <div class="flex h-[calc(100%-3rem)]">
                            <!-- Sidebar -->
                            <div class="w-16 md:w-48 border-r border-outline-variant/30 bg-surface-container-low/50 p-sm flex flex-col gap-sm">
                                <div class="h-8 rounded bg-secondary-container/50 flex items-center px-sm gap-sm">
                                    <span class="material-symbols-outlined text-[16px] text-secondary">monitor_heart</span>
                                    <span class="hidden md:block text-xs font-semibold text-secondary">Vitals</span>
                                </div>
                                <div class="h-8 rounded hover:bg-surface-container-high/50 flex items-center px-sm gap-sm cursor-pointer transition-colors">
                                    <span class="material-symbols-outlined text-[16px] text-on-surface-variant">biotech</span>
                                    <span class="hidden md:block text-xs text-on-surface-variant">Labs</span>
                                </div>
                            </div>
                            <!-- Main Content Area -->
                            <div class="flex-1 p-md flex flex-col gap-md bg-surface-bright">
                                <div class="flex gap-md">
                                    <div class="flex-1 bg-surface-container-lowest border border-outline-variant/30 rounded-lg p-sm shadow-sm">
                                        <div class="text-[10px] font-label-caps text-on-surface-variant mb-1">HEART RATE</div>
                                        <div class="text-2xl font-display text-on-surface flex items-baseline gap-1">112 <span class="text-xs text-on-surface-variant font-body-sm">bpm</span></div>
                                    </div>
                                    <div class="flex-1 bg-surface-container-lowest border border-outline-variant/30 rounded-lg p-sm shadow-sm">
                                        <div class="text-[10px] font-label-caps text-on-surface-variant mb-1">BLOOD PRESSURE</div>
                                        <div class="text-2xl font-display text-on-surface flex items-baseline gap-1">145/90 <span class="text-xs text-on-surface-variant font-body-sm">mmHg</span></div>
                                    </div>
                                </div>
                                <div class="flex-1 bg-surface-container-lowest border border-outline-variant/30 rounded-lg p-md shadow-sm relative overflow-hidden">
                                    <div class="text-[10px] font-label-caps text-on-surface-variant mb-2">ECG MONITOR (LEAD II)</div>
                                    <div class="w-full h-full border-t border-b border-surface-container-high relative flex items-center opacity-70">
                                        <svg class="w-full h-16 text-secondary" fill="none" preserveaspectratio="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 100 20">
                                            <path d="M0 10 L10 10 L12 8 L14 12 L16 10 L30 10 L32 2 L34 18 L36 10 L50 10 L55 5 L60 10 L100 10" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Bento Grid Section -->
    <section class="py-24 bg-surface-container-low/30 relative">
        <div class="container mx-auto px-lg md:px-xl max-w-container-max">
            <div class="text-center mb-16 max-w-3xl mx-auto">
                <h2 class="font-h2 text-h2 text-on-background mb-sm">Comprehensive Simulation Environment</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">Experience a fully integrated clinical workspace designed to mirror real-world diagnostic workflows and pressure.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg auto-rows-[300px]">
                <!-- Feature 1: Large -->
                <div class="md:col-span-2 bg-surface-container-lowest border border-outline-variant/50 rounded-xl p-xl soft-medical-shadow flex flex-col justify-between group hover:border-secondary/30 transition-colors">
                    <div>
                        <div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center mb-md group-hover:bg-secondary-container transition-colors">
                            <span class="material-symbols-outlined text-[24px] text-on-surface group-hover:text-on-secondary-container">neurology</span>
                        </div>
                        <h3 class="font-h3 text-h3 text-on-surface mb-xs">Interactive Patient Cases</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant max-w-md">Navigate complex, evolving scenarios with branching logic. Every decision impacts patient vitals and outcomes in real-time.</p>
                    </div>
                </div>
                <!-- Feature 2: Tall -->
                <div class="bg-surface-container-lowest border border-outline-variant/50 rounded-xl p-xl soft-medical-shadow flex flex-col group hover:border-secondary/30 transition-colors">
                    <div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center mb-md group-hover:bg-secondary-container transition-colors">
                        <span class="material-symbols-outlined text-[24px] text-on-surface group-hover:text-on-secondary-container">science</span>
                    </div>
                    <h3 class="font-h3 text-h3 text-on-surface mb-xs">Real-time Investigations</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Order and interpret labs, imaging, and physical exams with realistic delays and costs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-surface-bright border-t border-outline-variant/30">
        <div class="container mx-auto px-lg md:px-xl max-w-4xl text-center">
            <h2 class="font-display text-4xl text-on-background mb-md">Ready to Elevate Clinical Training?</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mb-xl max-w-2xl mx-auto">Join thousands of medical professionals using MEDCASE to sharpen their diagnostic skills and improve patient outcomes.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-md">
                <button class="bg-secondary text-on-secondary px-xl py-md rounded-lg font-body-lg hover:bg-on-secondary-fixed-variant transition-colors btn-primary-glow flex items-center justify-center gap-sm active:scale-95 duration-200">
                    Start Your Free Trial
                </button>
                <button class="bg-surface text-on-surface border border-outline-variant px-xl py-md rounded-lg font-body-lg hover:bg-surface-container-low transition-colors flex items-center justify-center gap-sm active:scale-95 duration-200">
                    Contact Sales
                </button>
            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
