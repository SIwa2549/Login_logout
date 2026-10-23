<?php
if (file_exists(__DIR__ . '/db.local.php')) require __DIR__ . '/db.local.php';
$host   = $DB_HOST ?? (getenv('DB_HOST') ?: 'localhost');
$user   = $DB_USER ?? (getenv('DB_USER') ?: 'root');
$pass   = $DB_PASS ?? (getenv('DB_PASS') ?: '');
$dbname = $DB_NAME ?? (getenv('DB_NAME') ?: 'resume_lab');
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) { error_log(mysqli_connect_error()); http_response_code(500); exit('Database unavailable'); }
mysqli_set_charset($conn, 'utf8mb4');