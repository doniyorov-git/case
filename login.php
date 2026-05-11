<?php
$pageTitle = 'MEDCASE - Login';
include 'includes/head.php';
?>
<!-- Split Screen Layout -->
<div class="flex w-full min-h-screen">
    <!-- Left Side: Clinical Imagery (Hidden on mobile) -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-surface-variant overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA_uK_nQwtchwnySkGtJ4H3OEtwIE3NjUWBqf_X6P0dUNN7qHVgnZUTNSJWvKHgLLS9Rc5BJGC4FC2VheJs5DKwxh17THLvHJIwsB5MAt9IZtrKvs6G6AJxzAy53B1EiDRtuN6QQNJnXhBgyHnX2P5imtwOj9ftoenr7zpO1FpAHkuF6FRLOW6s-Bta5RiPVovlPMfbF4PWO6W0FI6yq3vSUU5S4oX_877aZVgN_uP712FpGLhLt9BdgwidpdvYX7IdARHDKvzjhfQ');"></div>
        <!-- Technical Glassmorphism Overlay -->
        <div class="absolute inset-0 bg-inverse-surface/40 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/80 via-transparent to-transparent"></div>
        <!-- Brand Badge / Quote -->
        <div class="absolute bottom-xl left-xl right-xl z-10 text-on-primary">
            <div class="backdrop-blur-xl bg-inverse-surface/30 border border-outline-variant/30 p-lg rounded-xl max-w-lg">
                <p class="font-h3 text-h3 text-on-primary mb-sm leading-snug">
                    "Precision diagnostics begin with unparalleled simulation accuracy."
                </p>
                <div class="flex items-center gap-sm mt-md">
                    <span class="material-symbols-outlined text-tertiary-fixed-dim" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                    <span class="font-label-caps text-label-caps text-primary-fixed-dim">Enterprise Security Level 4 Enabled</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Right Side: Authentication Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-md sm:p-xl bg-surface relative z-10">
        <div class="w-full max-w-[420px] flex flex-col">
            <!-- Logo -->
            <div class="mb-xl flex justify-center lg:justify-start">
                <a href="index.php">
                    <img alt="MEDCASE Logo" class="h-16 w-auto object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC30SCEFMHB6wY78_5KYxcJelG5UgBqFb-175F70qPHLf2DNu6I7mXmC1AWO8pbf-1jdMusgnbbErlD1nabXkZ7eW-THrGsEW8pN7IF8MJVRCPUBaz8_vqHqjNi30hiNKKYbqCMAObQ3byQvs4xHfhfrlzcYZNvhj7wd7UyrcZdMY0n_Y_boAmldy4e8Bf1CWHvS0xu0ESgD5reasgj_AmTSzY_D0I05KLBykS9Uuuy46m3kHvMVUgAti3g44-f7zxWJDlAPuJlNx0"/>
                </a>
            </div>
            <!-- Header -->
            <div class="mb-lg text-center lg:text-left">
                <h1 class="font-h1 text-h1 text-on-surface mb-xs">Welcome Back</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Securely access your clinical simulation hub.</p>
            </div>
            <!-- Email Form -->
            <form id="loginForm" class="flex flex-col gap-md">
                <div id="errorMessage" class="hidden p-sm bg-error-container text-on-error-container rounded-lg text-sm"></div>
                <!-- Email Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface mb-xs" for="email">Professional Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline">mail</span>
                        </div>
                        <input class="w-full pl-[44px] pr-md py-[10px] bg-surface-bright border border-outline-variant rounded-lg text-on-surface placeholder:text-outline focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all font-body-md text-body-md outline-none" id="email" name="email" placeholder="dr.smith@institution.edu" required="" type="email"/>
                    </div>
                </div>
                <!-- Password Input -->
                <div>
                    <div class="flex justify-between items-center mb-xs">
                        <label class="block font-label-caps text-label-caps text-on-surface" for="password">Password</label>
                        <a class="font-label-caps text-label-caps text-secondary hover:text-secondary-container transition-colors" href="#">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline">lock</span>
                        </div>
                        <input class="w-full pl-[44px] pr-md py-[10px] bg-surface-bright border border-outline-variant rounded-lg text-on-surface placeholder:text-outline focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all font-body-md text-body-md outline-none" id="password" name="password" placeholder="••••••••" required="" type="password"/>
                    </div>
                </div>
                <!-- Sign In Button -->
                <button class="w-full mt-sm py-[12px] px-lg bg-secondary text-on-secondary font-label-caps text-label-caps rounded-lg hover:bg-secondary/90 hover:shadow-md active:scale-[0.98] transition-all duration-200 relative overflow-hidden flex items-center justify-center gap-sm" type="submit">
                    <div class="absolute top-0 left-0 w-full h-[1px] bg-white/30"></div>
                    <span>Sign In Securely</span>
                    <span class="material-symbols-outlined" style="font-size: 18px;">arrow_forward</span>
                </button>
            </form>
            <!-- Footer Link -->
            <div class="mt-xl text-center">
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Don't have an account? 
                    <a class="font-label-caps text-label-caps text-secondary hover:underline underline-offset-4 ml-xs" href="#">Request Clinical Access</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());
    const errorEl = document.getElementById('errorMessage');
    
    try {
        const response = await fetch('api/auth/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        if (result.success) {
            window.location.href = 'dashboard.php';
        } else {
            errorEl.textContent = result.message || 'Login failed';
            errorEl.classList.remove('hidden');
        }
    } catch (err) {
        errorEl.textContent = 'A server error occurred';
        errorEl.classList.remove('hidden');
    }
});
</script>
</body></html>
