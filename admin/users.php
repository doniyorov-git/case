<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

require_once '../config/db.php';

try {
    $stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    $users = [];
}

$pageTitle = 'MEDCASE Admin - User Management';
include '../includes/head.php';
?>
<body class="bg-background text-on-surface font-body-md min-h-screen">
<!-- AdminSideNav Shell -->
<aside class="fixed left-0 top-0 h-full w-64 z-40 flex flex-col py-md bg-surface-container-lowest border-r border-outline-variant">
    <div class="px-lg mb-xl">
        <h1 class="font-display text-h3 font-bold text-on-surface">MEDCASE Admin</h1>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Clinical Intelligence</p>
    </div>
    <nav class="flex-1 space-y-1">
        <a class="flex items-center px-lg py-sm text-on-surface-variant hover:bg-surface-container transition-all" href="index.php">
            <span class="material-symbols-outlined mr-md">dashboard</span>
            <span class="font-label-caps text-label-caps">Dashboard</span>
        </a>
        <a class="flex items-center px-lg py-sm bg-surface-container-high text-secondary border-r-4 border-secondary font-bold transition-all translate-x-1" href="users.php">
            <span class="material-symbols-outlined mr-md">group</span>
            <span class="font-label-caps text-label-caps">User Management</span>
        </a>
        <a class="flex items-center px-lg py-sm text-on-surface-variant hover:bg-surface-container transition-all" href="cases.php">
            <span class="material-symbols-outlined mr-md">edit_note</span>
            <span class="font-label-caps text-label-caps">Content</span>
        </a>
    </nav>
    <div class="mt-auto border-t border-outline-variant pt-md">
        <a class="flex items-center px-lg py-sm text-on-surface-variant hover:bg-surface-container transition-all" href="../api/auth/logout.php">
            <span class="material-symbols-outlined mr-md">logout</span>
            <span class="font-label-caps text-label-caps">Logout</span>
        </a>
    </div>
</aside>

<div class="ml-64 flex flex-col min-h-screen">
    <!-- AdminHeader Shell -->
    <header class="sticky top-0 z-50 flex justify-between items-center w-full px-lg h-16 bg-surface-bright border-b border-outline-variant shadow-sm">
        <div class="flex items-center gap-md flex-1">
            <div class="relative w-full max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                <input class="w-full bg-surface-container-low border-none rounded-lg pl-10 pr-4 py-2 text-body-sm focus:ring-2 focus:ring-secondary/20 transition-all" placeholder="Search users..." type="text"/>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 p-xl">
        <div class="max-w-container-max mx-auto space-y-lg">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-8">
                <div>
                    <h2 class="font-display text-h1 text-primary">User Management</h2>
                    <p class="text-on-surface-variant font-body-md mt-1">Manage clinical access and permissions.</p>
                </div>
            </div>

            <div class="bg-white border border-outline-variant rounded-xl clinical-shadow overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-outline-variant bg-surface-container-low">
                            <th class="px-lg py-md font-label-caps text-label-caps text-on-surface-variant">User</th>
                            <th class="px-lg py-md font-label-caps text-label-caps text-on-surface-variant">Email</th>
                            <th class="px-lg py-md font-label-caps text-label-caps text-on-surface-variant">Role</th>
                            <th class="px-lg py-md font-label-caps text-label-caps text-on-surface-variant">Status</th>
                            <th class="px-lg py-md"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-surface-container-lowest transition-colors cursor-pointer group">
                            <td class="px-lg py-md">
                                <div class="flex items-center gap-md">
                                    <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center font-bold text-on-primary-fixed">
                                        <?php echo strtoupper(substr($user['email'], 0, 2)); ?>
                                    </div>
                                    <div>
                                        <p class="font-body-md font-semibold text-primary">User #<?php echo $user['id']; ?></p>
                                        <p class="text-[11px] font-label-caps text-on-surface-variant">UID: <?php echo $user['id']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-lg py-md text-body-sm text-on-surface-variant"><?php echo $user['email']; ?></td>
                            <td class="px-lg py-md">
                                <span class="px-2 py-1 bg-slate-100 text-secondary rounded text-[11px] font-bold uppercase tracking-wider"><?php echo $user['role']; ?></span>
                            </td>
                            <td class="px-lg py-md">
                                <span class="flex items-center gap-1 text-[13px] font-semibold text-teal-700 bg-teal-50 px-2 py-1 rounded-full w-fit">
                                    <span class="w-2 h-2 rounded-full bg-teal-600"></span> Active
                                </span>
                            </td>
                            <td class="px-lg py-md text-right">
                                <button class="p-2 text-secondary hover:bg-surface-container rounded-lg">
                                    <span class="material-symbols-outlined">edit</span>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="5" class="px-lg py-md text-center text-on-surface-variant">No users found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body></html>
