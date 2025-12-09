<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config.php";
include "class/Database.php";
include "class/Form.php";
session_start();

// ROUTING TANPA .htaccess - Menggunakan Query String
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
$page = isset($_GET['page']) ? $_GET['page'] : 'index';
$file = "module/{$mod}/{$page}.php";

include "template/header.php";

if (file_exists($file)) {
    include $file;
} else {
    echo '<div class="alert alert-danger">Modul tidak ditemukan: ' . $mod . '/' . $page . '</div>';
}

include "template/footer.php";
?>