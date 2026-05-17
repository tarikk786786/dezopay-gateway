<?php
// error_reporting(E_ALL);
// ini_set("display_errors", true);

require_once __DIR__ . '/../env_loader.php';

$conn = new mysqli(
    getenv('DB_HOST') ?: 'localhost',
    getenv('DB_USERNAME'),
    getenv('DB_PASSWORD'),
    getenv('DB_NAME')
);
$server = $_SERVER["SERVER_NAME"];

// Fetch site settings from the database
$query = "SELECT * FROM site_settings LIMIT 1";
$result = mysqli_query($conn, $query);


if ($result && mysqli_num_rows($result) > 0) {
    $site_settings = mysqli_fetch_assoc($result);
} else {
    // Default values in case settings are not found
    $site_settings = [
        'brand_name' => 'Default Brand Name',
        'logo_url' => 'default_logo.png',
        'site_link' => 'https://pay.dezo.in/',
        'whatsapp_number' => '9219565158',
        'copyright_text' => '© Default Copyright'
    ];
}
?>