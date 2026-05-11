<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$pageTitle = 'MEDCASE - Select Patient Demographics';
include 'includes/head.php';
include 'includes/header.php';
?>
<!-- Main Content Area -->
<main class="flex-grow flex items-center justify-center p-lg md:p-xl relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-[-10%] left-[-5%] w-[40%] h-[40%] bg-secondary-container rounded-full mix-blend-multiply filter blur-3xl opacity-20 pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[30%] h-[30%] bg-tertiary-container rounded-full mix-blend-multiply filter blur-3xl opacity-10 pointer-events-none"></div>
    
    <div class="max-w-container-max w-full mx-auto relative z-10 flex flex-col items-center">
        <!-- Header Section -->
        <div class="text-center mb-xl">
            <h1 class="font-display text-display text-on-surface mb-sm">Select Demographics</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">
                Choose the patient age group for the upcoming clinical simulation.
            </p>
        </div>
        
        <!-- Selection Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg w-full max-w-6xl">
            <!-- Pediatric -->
            <div class="bg-surface rounded-xl border border-outline-variant soft-medical-shadow overflow-hidden flex flex-col transition-transform duration-300 hover:-translate-y-2 group cursor-pointer" onclick="selectDemographic('pediatric')">
                <div class="bg-surface-container-lowest p-md border-b border-outline-variant flex items-center gap-sm">
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">child_care</span>
                    <h2 class="font-h3 text-h3 text-on-surface">Pediatric</h2>
                </div>
                <div class="p-lg flex-grow flex flex-col items-center text-center">
                    <div class="w-32 h-32 mb-lg rounded-full border-4 border-surface-container-high overflow-hidden">
                        <img alt="Pediatric" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9sj_AJjGEygRbFDknVDBRXCCzfaDT4j2bBZJoFFfHT_Ph2OsCHPmoy1c8XMjU2_eOY9Naol-LjRzRSxhLqUg6Ks7s5SPuNp_AO12PEpv-2XohjtTWPbvR8Cp5DVdJ5hzLuLCLQDptteELAqYnZvZ32rSKChNdfFrkm2Mp0cxuxrvS_eblWS854TL1ZGODCefs2f3FXc8ZTnAgq6i3l7n3hbq7_uURJ3mmEde_2Q2ejiyU3COQTk7Ghl3Hp648NgFb-gwkJWblxb4"/>
                    </div>
                    <button class="w-full bg-surface-container-lowest border border-secondary text-secondary font-label-caps text-label-caps py-sm px-md rounded hover:bg-surface-container-low">
                        Select Pediatric
                    </button>
                </div>
            </div>
            
            <!-- Adult -->
            <div class="bg-surface rounded-xl border-2 border-secondary soft-medical-shadow overflow-hidden flex flex-col transition-transform duration-300 scale-105 z-10 cursor-pointer" onclick="selectDemographic('adult')">
                <div class="bg-secondary-container p-md border-b border-secondary flex items-center gap-sm">
                    <span class="material-symbols-outlined text-on-secondary-container" style="font-variation-settings: 'FILL' 1;">person</span>
                    <h2 class="font-h3 text-h3 text-on-secondary-container">Adult</h2>
                </div>
                <div class="p-lg flex-grow flex flex-col items-center text-center">
                    <div class="w-32 h-32 mb-lg rounded-full border-4 border-secondary-fixed-dim overflow-hidden">
                        <img alt="Adult" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCR179Nb1tz7MyzMMxSyg2zto-psu8fbVZihCmj03mbjGykvE6tA4lqtM1c6fTvUXatB_T0VEgPP6iz9ZmEgWQiN2PpvKBJweGeQzsjKbKuGqoKG74iLvfgPpLCjDJAQujznJXd1ojeGeg0Se7gnMQRoNCTaZErm4jQUL-LCinORJZoOlao08BjsORkTQNVp4ggGduZuN9d2FG4xXk20wBnX34b8BYxQJQGyjsFsWEbmqRZpChhmvEwLidfAdCKyo5mwk_tAhiUie4"/>
                    </div>
                    <button class="w-full bg-secondary text-on-primary font-label-caps text-label-caps py-sm px-md rounded hover:bg-secondary-fixed-dim shadow-sm">
                        Select Adult
                    </button>
                </div>
            </div>
            
            <!-- Geriatric -->
            <div class="bg-surface rounded-xl border border-outline-variant soft-medical-shadow overflow-hidden flex flex-col transition-transform duration-300 hover:-translate-y-2 group cursor-pointer" onclick="selectDemographic('geriatric')">
                <div class="bg-surface-container-lowest p-md border-b border-outline-variant flex items-center gap-sm">
                    <span class="material-symbols-outlined text-outline" style="font-variation-settings: 'FILL' 1;">elderly</span>
                    <h2 class="font-h3 text-h3 text-on-surface">Geriatric</h2>
                </div>
                <div class="p-lg flex-grow flex flex-col items-center text-center">
                    <div class="w-32 h-32 mb-lg rounded-full border-4 border-surface-container-high overflow-hidden">
                        <img alt="Geriatric" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPRHeycMVfdpjs5HO0YxKeiKton7q7HkZ3h3bBSBN_WC_NtkYbwiGSdNBg_oqC56yWbOyKpU3rL4XGzo_8CcQtgY9ynAXRLqfKKXOn8vB7KV6lvjyKyMqucj4bMxqZB6GeG3SpjxT2L69AZSjob38M11yJwQBH1oa5Dlsw-8TqG4pa-3GlfazQUz2qM6gm4D2zoy4DsPRcTC58WnS9VCmV2Thi5PlBICSKUnX4YQL7QR6cav3USvlFUCKvg5JJluzqa3-CMSsYsG4"/>
                    </div>
                    <button class="w-full bg-surface-container-lowest border border-outline-variant text-on-surface-variant font-label-caps text-label-caps py-sm px-md rounded hover:bg-surface-container-low">
                        Select Geriatric
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function selectDemographic(type) {
    sessionStorage.setItem('selected_demographic', type);
    window.location.href = 'simulation.php';
}
</script>
<?php include 'includes/footer.php'; ?>
