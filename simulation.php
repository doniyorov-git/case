<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$caseId = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$pageTitle = 'MEDCASE - Clinical Simulation';
include 'includes/head.php';
?>
<body class="bg-background text-on-surface font-body-md antialiased min-h-screen flex flex-col overflow-hidden">
<!-- TopAppBar -->
<header class="bg-surface/80 flex justify-between items-center w-full px-lg py-sm sticky top-0 z-50 backdrop-blur-xl border-b border-outline-variant shadow-sm">
    <div class="flex items-center gap-md">
        <a href="dashboard.php" class="flex items-center gap-2">
            <span class="material-symbols-outlined text-secondary text-3xl">medical_services</span>
            <span class="font-h1 text-h1 font-bold tracking-tight text-secondary">MEDCASE</span>
        </a>
        <nav class="hidden md:flex gap-lg ml-xl">
            <a class="text-on-surface-variant font-body-md hover:text-secondary" href="dashboard.php">Dashboard</a>
            <a class="text-secondary border-b-2 border-secondary pb-1" href="patients.php">Cases</a>
        </nav>
    </div>
    <div class="flex items-center gap-md">
        <div class="w-10 h-10 rounded-full bg-surface-container-high border border-outline-variant overflow-hidden flex items-center justify-center">
            <img alt="Doctor" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJKzj-K-pN_LUPZwXEaRSwng9cMo0HD7fBLjdfHZXm6Gj05HqhfSmLr9t7UjIbllPXKCdm-VWY1l4s_E0tOd_xSrAktx_nqzNEPfItRRrdKXNMevjM2SyzwITanQp51MFBVwAc2hOstfuMwijhdFwV2m0C3GtQ86chArr1DZD1pDW--lT5JlYFHqmKTXykuZ8_G5t9FkjEbY5OO8qXt_cRLDesgio0PRSVHXJawD0-ngEyKFjkFzMD3nQAnrK1QF5yW3t3ll7qTP0"/>
        </div>
    </div>
</header>

<div class="flex flex-1 overflow-hidden h-[calc(100vh-64px)]">
    <!-- SideNavBar -->
    <aside class="flex flex-col p-md bg-surface-container-low/90 border-r border-outline-variant backdrop-blur-2xl shadow-md w-64">
        <div class="mb-lg px-xs">
            <div class="flex items-center gap-sm mb-sm">
                <span class="material-symbols-outlined text-secondary">hub</span>
                <span class="font-h3 text-h3 font-bold text-on-surface">Case Room</span>
            </div>
            <div id="caseStatus" class="font-body-sm text-body-sm text-on-surface-variant bg-surface-container-high px-sm py-xs rounded-md border border-outline-variant/50">
                Loading case...
            </div>
        </div>
        <nav class="flex flex-col gap-sm flex-1">
            <a class="flex items-center gap-md px-md py-sm bg-secondary-container text-on-secondary-container rounded-lg shadow-sm" href="#">
                <span class="material-symbols-outlined">chat</span>
                <span class="font-label-caps text-label-caps">Patient Chat</span>
            </a>
            <a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg" href="#">
                <span class="material-symbols-outlined">biotech</span>
                <span class="font-label-caps text-label-caps">Investigations</span>
            </a>
        </nav>
        <div class="mt-auto pt-md">
            <button class="w-full bg-secondary text-on-secondary font-label-caps text-label-caps py-sm px-md rounded-lg shadow-sm hover:bg-secondary/90 transition-colors uppercase border border-secondary">
                Submit Diagnosis
            </button>
        </div>
    </aside>

    <!-- Main Content Canvas -->
    <main class="flex-1 flex bg-surface-bright relative">
        <!-- Chat Interface Area -->
        <section class="flex-1 flex flex-col border-r border-outline-variant bg-surface relative">
            <!-- Chat Header -->
            <div class="h-16 flex items-center px-xl border-b border-outline-variant bg-surface-container-lowest shadow-sm z-10 shrink-0">
                <div class="flex items-center gap-md">
                    <div id="patientInitials" class="w-10 h-10 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-h3 text-h3 border border-primary-fixed-dim">
                        ..
                    </div>
                    <div>
                        <h2 id="patientName" class="font-h3 text-h3 text-on-surface">Loading...</h2>
                        <p id="caseMeta" class="font-body-sm text-body-sm text-on-surface-variant"></p>
                    </div>
                </div>
            </div>
            
            <!-- Chat History -->
            <div id="chatHistory" class="flex-1 overflow-y-auto chat-scroll p-xl flex flex-col gap-lg bg-surface-bright pb-32">
                <!-- Messages will appear here -->
            </div>

            <!-- Chat Input Area -->
            <div class="absolute bottom-0 left-0 right-0 bg-surface/95 backdrop-blur-md border-t border-outline-variant p-md">
                <form id="chatForm" class="max-w-4xl mx-auto flex items-end gap-md">
                    <div class="flex-1 relative">
                        <textarea id="userInput" class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl pl-md pr-xl py-sm font-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-secondary/50 focus:border-secondary resize-none overflow-hidden min-h-[44px]" placeholder="Ask the patient something..." rows="1"></textarea>
                    </div>
                    <button type="submit" class="w-10 h-10 rounded-full bg-secondary text-on-secondary flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </form>
            </div>
        </section>

        <!-- Vitals Side Panel -->
        <aside class="w-80 bg-surface border-l border-outline-variant flex flex-col overflow-hidden shrink-0">
            <div class="h-16 flex items-center px-md border-b border-outline-variant bg-surface-container-lowest">
                <span class="material-symbols-outlined text-secondary mr-sm">vital_signs</span>
                <h3 class="font-h3 text-h3 text-on-surface font-semibold">Active Vitals</h3>
            </div>
            <div class="flex-1 overflow-y-auto p-md flex flex-col gap-md bg-surface-bright">
                <!-- HR Card -->
                <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md flex flex-col">
                    <span class="font-label-caps text-label-caps text-on-surface-variant mb-1 uppercase text-xs">Heart Rate</span>
                    <div class="flex items-baseline gap-xs">
                        <span id="vital-hr" class="font-display text-display text-on-surface text-4xl font-bold">--</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">bpm</span>
                    </div>
                </div>
                <!-- BP Card -->
                <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md flex flex-col">
                    <span class="font-label-caps text-label-caps text-on-surface-variant mb-1 uppercase text-xs">Blood Pressure</span>
                    <div class="flex items-baseline gap-xs">
                        <span id="vital-bp" class="font-display text-display text-on-surface text-3xl font-bold">-- / --</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">mmHg</span>
                    </div>
                </div>
            </div>
        </aside>
    </main>
</div>

<script>
const caseId = <?php echo $caseId; ?>;
const demographic = sessionStorage.getItem('selected_demographic') || 'adult';

async function initCase() {
    try {
        const response = await fetch(`api/cases/get.php?id=${caseId}`);
        const result = await response.json();
        if (result.success) {
            const c = result.case;
            document.getElementById('patientName').textContent = c.patient_name || 'Patient ' + c.id;
            document.getElementById('patientInitials').textContent = (c.patient_name || 'P').substring(0, 2).toUpperCase();
            document.getElementById('caseMeta').textContent = `${c.age}yo ${c.gender} • Chief Complaint: ${c.complaint}`;
            document.getElementById('caseStatus').textContent = `Active Session: ${c.title}`;
            
            // Mock Vitals
            document.getElementById('vital-hr').textContent = c.vitals.hr;
            document.getElementById('vital-bp').textContent = `${c.vitals.sbp}/${c.vitals.dbp}`;
            
            addMessage('system', 'Patient admitted to bay. Vitals stable but concerning for acute presentation.');
            addMessage('patient', c.initial_statement);
        }
    } catch (err) {
        console.error('Failed to load case');
    }
}

function addMessage(sender, text) {
    const chat = document.getElementById('chatHistory');
    const div = document.createElement('div');
    div.className = sender === 'doctor' ? 'flex flex-col items-end gap-xs w-full max-w-3xl ml-auto' : 'flex flex-col items-start gap-xs w-full max-w-3xl mr-auto';
    
    const inner = sender === 'doctor' ? 
        `<div class="flex items-end gap-sm flex-row-reverse">
            <div class="bg-secondary text-on-secondary px-md py-sm rounded-2xl rounded-br-sm shadow-sm max-w-md">
                <p class="font-body-md">${text}</p>
            </div>
        </div>` :
        `<div class="flex items-end gap-sm">
            <div class="bg-surface-container text-on-surface px-md py-sm rounded-2xl rounded-bl-sm shadow-sm border border-outline-variant/30 max-w-md">
                <p class="font-body-md">${text}</p>
            </div>
        </div>`;
    
    if (sender === 'system') {
        div.className = 'flex justify-center my-md';
        div.innerHTML = `<div class="bg-surface-container-highest border border-outline-variant/50 rounded-lg px-md py-sm font-body-sm font-semibold">${text}</div>`;
    } else {
        div.innerHTML = inner;
    }
    
    chat.appendChild(div);
    chat.scrollTop = chat.scrollHeight;
}

document.getElementById('chatForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const text = document.getElementById('userInput').value;
    if (!text) return;
    
    addMessage('doctor', text);
    document.getElementById('userInput').value = '';
    
    // Mock response
    setTimeout(() => {
        addMessage('patient', "I'm not sure, doctor. It just feels very tight in my chest.");
    }, 1000);
});

initCase();
</script>
</body></html>
