<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$pageTitle = 'MEDCASE - Progress and History';
include 'includes/head.php';
include 'includes/header.php';
?>
<main class="flex-grow container mx-auto max-w-container-max px-lg py-xl flex flex-col gap-xl">
    <div class="flex flex-col gap-sm">
        <h1 class="font-display text-display text-on-surface">Progress & History</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant">Review your clinical performance and analyze historical case data.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
        <!-- Status -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm p-lg flex flex-col justify-between">
            <div>
                <h2 class="font-h3 text-h3 text-on-surface mb-sm flex items-center gap-sm">
                    <span class="material-symbols-outlined text-secondary">emoji_events</span>
                    Current Status
                </h2>
                <div class="flex items-end gap-md mb-lg">
                    <span class="font-display text-display text-secondary">Lvl 14</span>
                    <span class="font-body-md text-body-md text-on-surface-variant mb-2">Attending</span>
                </div>
                <div class="space-y-sm">
                    <div class="flex justify-between font-label-caps text-label-caps text-on-surface-variant">
                        <span>XP Progress</span>
                        <span>4,250 / 5,000</span>
                    </div>
                    <div class="w-full bg-surface-variant rounded-full h-2">
                        <div class="bg-tertiary-container h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
            </div>
            <div class="mt-lg pt-lg border-t border-outline-variant flex justify-between items-center">
                <div class="flex items-center gap-sm">
                    <div class="bg-error-container text-error p-2 rounded-lg">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">local_fire_department</span>
                    </div>
                    <div>
                        <div class="font-label-caps text-label-caps text-on-surface-variant">Current Streak</div>
                        <div class="font-h2 text-h2 text-on-surface">12 Days</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Specialties -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm flex flex-col">
            <div class="bg-surface-container-low px-lg py-sm border-b border-outline-variant rounded-t-xl flex items-center gap-sm">
                <span class="material-symbols-outlined">trending_up</span>
                <h3 class="font-status text-status text-on-surface-variant uppercase tracking-wider">Top Specialties</h3>
            </div>
            <div class="p-lg flex-grow flex flex-col gap-md">
                <div class="flex items-center justify-between">
                    <span class="font-body-md text-on-surface">Cardiology</span>
                    <span class="font-status text-status text-on-tertiary-container bg-tertiary-fixed px-2 py-1 rounded">94%</span>
                </div>
                <div class="w-full bg-surface-variant rounded-full h-1.5">
                    <div class="bg-tertiary-container h-1.5 rounded-full" style="width: 94%"></div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-body-md text-on-surface">Neurology</span>
                    <span class="font-status text-status text-on-secondary-container bg-secondary-fixed px-2 py-1 rounded">82%</span>
                </div>
                <div class="w-full bg-surface-variant rounded-full h-1.5">
                    <div class="bg-secondary h-1.5 rounded-full" style="width: 82%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- History Table -->
    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm overflow-hidden flex flex-col">
        <div class="bg-surface-container-low px-lg py-md border-b border-outline-variant flex justify-between items-center">
            <h3 class="font-h3 text-h3 text-on-surface">Case History</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface border-b border-outline-variant font-label-caps text-label-caps text-on-surface-variant">
                        <th class="py-md px-lg font-semibold">Case Title</th>
                        <th class="py-md px-lg font-semibold">Specialty</th>
                        <th class="py-md px-lg font-semibold">Date</th>
                        <th class="py-md px-lg font-semibold">Score</th>
                        <th class="py-md px-lg text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="font-body-sm text-body-sm text-on-surface divide-y divide-outline-variant">
                    <tr>
                        <td class="py-md px-lg font-medium">54-M Acute Chest Pain</td>
                        <td class="py-md px-lg">Cardiology</td>
                        <td class="py-md px-lg text-on-surface-variant">Oct 24, 2023</td>
                        <td class="py-md px-lg font-semibold text-tertiary-container">98%</td>
                        <td class="py-md px-lg text-right">
                            <button class="text-secondary hover:underline">Review</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
