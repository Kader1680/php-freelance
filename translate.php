<?php 

$lang = $_SESSION['lang'] ?? 'fr'; // default to french

$translations = include "lang/$lang.php";

function __($key) {
    global $translations;
    return $translations[$key] ?? $key;
}

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
}

