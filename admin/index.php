<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

$pageTitle = 'MEDCASE | Admin Overview';
include '../includes/head.php';
?>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden">
<!-- AdminSideNav -->
<aside class="fixed left-0 top-0 h-full w-64 z-40 flex flex-col py-md bg-surface-container-lowest border-r border-outline-variant">
    <div class="px-md mb-xl">
        <h2 class="font-display text-h3 font-bold text-on-surface">MEDCASE Admin</h2>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Clinical Intelligence</p>
    </div>
    <nav class="flex-1 flex flex-col gap-unit px-sm">
        <a class="flex items-center gap-md px-md py-sm rounded-lg bg-surface-container-high text-secondary border-r-4 border-secondary font-bold" href="index.php">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="font-label-caps text-label-caps">Dashboard</span>
        </a>
        <a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant hover:bg-surface-container transition-all" href="users.php">
            <span class="material-symbols-outlined">group</span>
            <span class="font-label-caps text-label-caps">User Management</span>
        </a>
        <a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant hover:bg-surface-container transition-all" href="cases.php">
            <span class="material-symbols-outlined">edit_note</span>
            <span class="font-label-caps text-label-caps">Content</span>
        </a>
    </nav>
    <div class="mt-auto px-sm border-t border-outline-variant pt-md flex flex-col gap-unit">
        <a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant hover:bg-surface-container transition-all" href="../api/auth/logout.php">
            <span class="material-symbols-outlined">logout</span>
            <span class="font-label-caps text-label-caps">Logout</span>
        </a>
    </div>
</aside>

<!-- Main Content Area -->
<main class="ml-64 min-h-screen">
    <header class="sticky top-0 z-50 flex justify-between items-center w-full px-lg h-16 bg-surface-bright border-b border-outline-variant shadow-sm">
        <div class="flex items-center gap-xl flex-1">
            <span class="font-display text-h2 font-extrabold text-primary">MEDCASE</span>
            <div class="relative w-full max-w-md">
                <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-outline">search</span>
                <input class="w-full pl-xl pr-md py-xs bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-secondary text-body-sm font-body-sm" placeholder="Search..." type="text"/>
            </div>
        </div>
        <div class="flex items-center gap-md">
            <div class="h-8 w-8 rounded-full overflow-hidden border border-outline-variant">
                <img alt="Admin" class="h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida/ADBb0ui2fzoIDDlpjX2flxHO7KYmKpZykc64zX158TDg4wzkYH0wg4lsbZ1Le24X8N1wom2dAaIj366sDsVfIqL9ekznnnJ9SFr53SgnLrlLvXkJeMkXy9ZbgTfln4J59O3XC1gv6Wgcxw6iGrKfZfItEMsOcD5woukYFCuy23oJ1Y8gSnxPo7M4pAieI1TF-HeEic4Mob3tn4IGx8jJEE9xbpt3YOKVjGQdXrt9VPdr4Wad3vc0uSAMKZPRbg"/>
            </div>
        </div>
    </header>

    <div class="p-xl space-y-xl max-w-container-max mx-auto">
        <div>
            <h1 class="font-display text-h1 text-primary">System Overview</h1>
            <p class="font-body-md text-on-surface-variant">Real-time clinical intelligence and system performance metrics.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
            <div class="glass-card p-lg rounded-xl flex flex-col justify-between h-32 relative overflow-hidden">
                <span class="font-label-caps text-label-caps text-on-surface-variant">Total Users</span>
                <span class="font-display text-h1 text-primary">12,842</span>
            </div>
            <div class="glass-card p-lg rounded-xl flex flex-col justify-between h-32">
                <span class="font-label-caps text-label-caps text-on-surface-variant">Active Simulations</span>
                <span class="font-display text-h1 text-primary">458</span>
            </div>
            <div class="glass-card p-lg rounded-xl flex flex-col justify-between h-32">
                <span class="font-label-caps text-label-caps text-on-surface-variant">Completion Rate</span>
                <span class="font-display text-h1 text-primary">94.2%</span>
            </div>
            <div class="glass-card p-lg rounded-xl flex flex-col justify-between h-32">
                <span class="font-label-caps text-label-caps text-on-surface-variant">System Status</span>
                <span class="font-display text-h1 text-primary">99.9%</span>
            </div>
        </div>
    </div>
</main>
</body></html>
