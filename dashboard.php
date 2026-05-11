<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$pageTitle = 'MEDCASE - Dashboard';
include 'includes/head.php';
?>
<!-- TopAppBar -->
<header class="bg-surface/80 docked full-width top-0 backdrop-blur-xl border-b border-outline-variant shadow-sm flex justify-between items-center w-full px-lg py-sm sticky top-0 z-50">
    <div class="flex items-center gap-xl">
        <a href="index.php" class="font-h1 text-h1 font-bold tracking-tight text-secondary">MEDCASE</a>
        <nav class="hidden md:flex gap-lg items-center">
            <a class="text-secondary border-b-2 border-secondary pb-1 font-body-md active:opacity-70 transition-all" href="dashboard.php">Dashboard</a>
            <a class="text-on-surface-variant font-body-md hover:text-secondary transition-colors duration-200 active:opacity-70" href="patients.php">Cases</a>
            <a class="text-on-surface-variant font-body-md hover:text-secondary transition-colors duration-200 active:opacity-70" href="#">Resources</a>
        </nav>
    </div>
    <div class="flex items-center gap-md">
        <button class="text-on-surface-variant hover:text-secondary transition-colors duration-200">
            <span class="material-symbols-outlined">dark_mode</span>
        </button>
        <button class="text-on-surface-variant hover:text-secondary transition-colors duration-200">
            <span class="material-symbols-outlined">notifications</span>
        </button>
        <div class="flex items-center gap-sm">
            <div class="w-10 h-10 rounded-full bg-surface-variant overflow-hidden border border-outline-variant">
                <img alt="User Profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBEsOhXV6XFxIYaAhWZhktX2DY6HD8xAQR4ug2a79iqiOaBy1wXeIbcoQ8Nam7HpohjK0ox38raBlC5Tp8-A1RUU4dvoXZxtAbdkY_usithr8OVKwztzpvezFd4CNMeMhY868fKBLWld48_bMUOkQtIK10mwTMsd8L0eUKha8gcn_3sQgzLTHEmyanMUSD39cupxkXJM6e-FPQKPG3cZTn8dZAum-fo5I0DW01i7XO_z1kmPgF4Pie0NrS4RnKqgd_dmw8BuP1GPAk"/>
            </div>
            <a href="api/auth/logout.php" class="text-on-surface-variant hover:text-error transition-colors">
                <span class="material-symbols-outlined">logout</span>
            </a>
        </div>
    </div>
</header>

<div class="flex flex-1 overflow-hidden">
    <!-- SideNavBar -->
    <aside class="hidden lg:flex flex-col w-64 bg-surface-container-low/90 border-r border-outline-variant backdrop-blur-2xl shadow-md p-md z-40 shrink-0">
        <div class="mb-xl px-sm">
            <div class="flex items-center gap-sm mb-md">
                <span class="material-symbols-outlined text-secondary">insights</span>
                <h2 class="font-h3 text-h3 font-bold text-on-surface">Performance</h2>
            </div>
            <div class="bg-surface rounded-lg border border-outline-variant p-md soft-medical-shadow mb-lg">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-sm">Accuracy Trend (30d)</p>
                <div class="h-24 flex items-end justify-between gap-1">
                    <div class="w-full bg-secondary-container rounded-t-sm" style="height: 40%"></div>
                    <div class="w-full bg-secondary-container rounded-t-sm" style="height: 60%"></div>
                    <div class="w-full bg-secondary-container rounded-t-sm" style="height: 55%"></div>
                    <div class="w-full bg-secondary-container rounded-t-sm" style="height: 80%"></div>
                    <div class="w-full bg-secondary rounded-t-sm" style="height: 92%"></div>
                </div>
            </div>
        </div>
        <nav class="flex flex-col gap-sm mt-auto">
            <a class="flex items-center gap-md px-md py-sm bg-secondary-container text-on-secondary-container rounded-lg shadow-sm cursor-pointer hover:translate-x-1 transition-all duration-300" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-label-caps text-label-caps">Overview</span>
            </a>
            <a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg cursor-pointer hover:translate-x-1 transition-all duration-300" href="history.php">
                <span class="material-symbols-outlined">history</span>
                <span class="font-label-caps text-label-caps">History</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-lg md:p-xl bg-surface">
        <div class="max-w-container-max mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
                <!-- Welcome Card -->
                <div class="col-span-1 md:col-span-2 bg-surface rounded-xl border border-outline-variant soft-medical-shadow p-lg flex flex-col justify-between relative overflow-hidden">
                    <h1 class="font-h2 text-h2 text-on-surface mb-xs">Welcome back, Dr. Julian.</h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-lg">You are currently on a 5-day diagnostic streak.</p>
                    <div class="flex gap-lg relative z-10 mt-auto">
                        <div class="bg-surface-container-low rounded-lg p-md border border-outline-variant flex-1 flex flex-col gap-sm">
                            <span class="font-label-caps text-label-caps text-on-surface-variant">Diagnostic Accuracy</span>
                            <div class="flex items-end gap-sm">
                                <span class="font-display text-display text-secondary">92%</span>
                            </div>
                        </div>
                        <div class="bg-surface-container-low rounded-lg p-md border border-outline-variant flex-1 flex flex-col gap-sm">
                            <span class="font-label-caps text-label-caps text-on-surface-variant">Cases Completed</span>
                            <div class="flex items-end gap-sm">
                                <span class="font-display text-display text-on-surface">148</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Level Card -->
                <div class="col-span-1 bg-secondary text-on-secondary rounded-xl border border-secondary-fixed shadow-md p-lg flex flex-col items-center justify-center text-center relative overflow-hidden">
                    <span class="material-symbols-outlined text-[48px] mb-sm" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
                    <h2 class="font-display text-display text-on-secondary mb-md">Lvl 24</h2>
                    <div class="w-full bg-white/20 rounded-full h-1.5 mb-sm">
                        <div class="bg-white h-1.5 rounded-full" style="width: 75%"></div>
                    </div>
                    <span class="font-status text-status text-secondary-fixed">2,450 / 3,000 XP to Senior Attending</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
                <!-- Active Session -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-sm mb-md">
                        <span class="material-symbols-outlined">play_circle</span>
                        <h3 class="font-h3 text-h3 text-on-surface">Active Session</h3>
                    </div>
                    <div class="bg-surface rounded-xl border border-outline-variant soft-medical-shadow overflow-hidden flex flex-col">
                        <div class="bg-surface-container-low p-md border-b border-outline-variant flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary">local_hospital</span>
                            <span class="font-label-caps text-label-caps text-on-surface-variant">Trauma Bay 4</span>
                        </div>
                        <div class="p-md flex flex-col gap-md">
                            <h4 class="font-h3 text-h3 text-on-surface mb-xs">42-M Multiple Trauma</h4>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Motor vehicle collision. Hypotensive, tachycardic on arrival.</p>
                            <a href="simulation.php" class="mt-md w-full bg-secondary text-on-secondary font-body-md font-semibold py-sm px-md rounded-lg shadow-sm border border-secondary hover:bg-secondary/90 transition-colors flex items-center justify-center gap-sm">
                                Resume Case
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recommended Cases -->
                <div class="lg:col-span-2">
                    <div class="flex items-center justify-between mb-md">
                        <div class="flex items-center gap-sm">
                            <span class="material-symbols-outlined">auto_awesome</span>
                            <h3 class="font-h3 text-h3 text-on-surface">Recommended for You</h3>
                        </div>
                        <a class="font-body-sm text-body-sm text-secondary font-semibold hover:underline" href="patients.php">View Library</a>
                    </div>
                    <div id="caseList" class="grid grid-cols-1 md:grid-cols-2 gap-md">
                        <!-- Loaded via API -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
async function loadCases() {
    try {
        const response = await fetch('api/cases/list.php');
        const result = await response.json();
        if (result.success) {
            const container = document.getElementById('caseList');
            container.innerHTML = result.cases.map(c => `
                <div class="bg-surface rounded-xl border border-outline-variant soft-medical-shadow p-md flex flex-col gap-sm hover:border-secondary transition-colors cursor-pointer group" onclick="location.href='simulation.php?id=${c.id}'">
                    <div class="flex justify-between items-start mb-sm">
                        <div class="bg-surface-container-high text-on-surface font-status text-status px-sm py-[2px] rounded-full border border-outline-variant">${c.specialty}</div>
                        <span class="bg-surface-variant text-on-surface font-status text-status px-sm py-[2px] rounded-full">${c.difficulty}</span>
                    </div>
                    <h4 class="font-h3 text-h3 text-on-surface group-hover:text-secondary transition-colors">${c.title}</h4>
                    <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mb-md">${c.description}</p>
                    <div class="mt-auto flex items-center justify-between border-t border-surface-variant pt-sm">
                        <div class="flex items-center gap-xs text-on-surface-variant">
                            <span class="material-symbols-outlined text-[16px]">timer</span>
                            <span class="font-status text-status">Est. ${c.est_time}m</span>
                        </div>
                        <span class="font-status text-status text-secondary font-semibold group-hover:translate-x-1 transition-transform">Start →</span>
                    </div>
                </div>
            `).join('');
        }
    } catch (err) {
        console.error('Failed to load cases');
    }
}
loadCases();
</script>
</body></html>
