<?php
declare(strict_types=1);

use App\Core\Database;
use App\Repositories\CaseRepository;

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

require_once __DIR__ . '/../app/bootstrap.php';

try {
    $pdo = Database::connection();
} catch (Throwable $exception) {
    error_log($exception->getMessage());
    $pdo = null;
}

$cases = (new CaseRepository($pdo))->all();

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$pageTitle = 'MEDCASE Admin - Case Content';
include '../includes/head.php';
?>
<body class="bg-background text-on-surface font-body-md min-h-screen">
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
        <a class="flex items-center px-lg py-sm text-on-surface-variant hover:bg-surface-container transition-all" href="users.php">
            <span class="material-symbols-outlined mr-md">group</span>
            <span class="font-label-caps text-label-caps">User Management</span>
        </a>
        <a class="flex items-center px-lg py-sm bg-surface-container-high text-secondary border-r-4 border-secondary font-bold transition-all translate-x-1" href="cases.php">
            <span class="material-symbols-outlined mr-md">edit_note</span>
            <span class="font-label-caps text-label-caps">Case Content</span>
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
    <header class="sticky top-0 z-50 flex justify-between items-center w-full px-lg h-16 bg-surface-bright border-b border-outline-variant shadow-sm">
        <div>
            <h2 class="font-display text-h2 text-primary">Case Content</h2>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Manage simulation library records.</p>
        </div>
    </header>

    <main class="flex-1 p-xl">
        <div class="max-w-container-max mx-auto space-y-lg">
            <div class="bg-white border border-outline-variant rounded-xl clinical-shadow overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-outline-variant bg-surface-container-low">
                            <th class="px-lg py-md font-label-caps text-label-caps text-on-surface-variant">Case</th>
                            <th class="px-lg py-md font-label-caps text-label-caps text-on-surface-variant">Specialty</th>
                            <th class="px-lg py-md font-label-caps text-label-caps text-on-surface-variant">Difficulty</th>
                            <th class="px-lg py-md font-label-caps text-label-caps text-on-surface-variant">Est. Time</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <?php foreach ($cases as $case): ?>
                        <tr class="hover:bg-surface-container-lowest transition-colors">
                            <td class="px-lg py-md">
                                <p class="font-body-md font-semibold text-primary"><?php echo e((string) $case['title']); ?></p>
                                <p class="text-body-sm text-on-surface-variant"><?php echo e((string) $case['description']); ?></p>
                            </td>
                            <td class="px-lg py-md text-body-sm text-on-surface-variant"><?php echo e((string) $case['specialty']); ?></td>
                            <td class="px-lg py-md">
                                <span class="px-2 py-1 bg-slate-100 text-secondary rounded text-[11px] font-bold uppercase tracking-wider">
                                    <?php echo e((string) $case['difficulty']); ?>
                                </span>
                            </td>
                            <td class="px-lg py-md text-body-sm text-on-surface-variant"><?php echo e((string) $case['est_time']); ?> min</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body></html>

