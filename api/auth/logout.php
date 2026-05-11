<?php
declare(strict_types=1);

$_GET['redirect'] = '../../login.php';

require_once __DIR__ . '/../index.php';

medcase_handle_api('GET', '/auth/logout');
