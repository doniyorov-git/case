<?php
declare(strict_types=1);

require_once __DIR__ . '/../index.php';

$caseId = isset($_GET['id']) ? (int) $_GET['id'] : 1;

medcase_handle_api('GET', '/cases/' . $caseId);
