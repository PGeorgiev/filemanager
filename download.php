<?php

include 'includes/config.php';
include 'includes/session.php';
include 'includes/functions.php';

$username = session_get_user();

if (!isset($_GET['file'])) {
    header('Location: files.php');
}

$filename = (string) urldecode($_GET['file']);

$filepath = DATA_PATH . DIRECTORY_SEPARATOR . $username . DIRECTORY_SEPARATOR . $filename;

if (!is_file($filepath)) {
    $_SESSION[SESSION_ERROR_KEY] = "File '{$filename}' not found.";
    header('Location: files.php');
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($filepath)) . '"';
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filepath));
ob_clean();
flush();
readfile($filepath);
exit;
