<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php
        $mainHeadTitle = 'مصنع اللورد كيمو';

        if (isset($pageTitle)) {
            $mainHeadTitle .= ' | ' . $pageTitle;
        }

        echo $mainHeadTitle;
        ?>
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>">

    <script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo asset('js/app.js'); ?>"></script>
</head>

<body>

    <?php
    if (!isset($noSidebar)) {
        require_once base_path('resources/views/admin/layouts/sidebar.php');
    }

    if (!isset($noNavbar)) {
        require_once base_path('resources/views/admin/layouts/navbar.php');
    }

    // configure session flash messages
    $flashes = [];

    foreach ($_SESSION as $key => $value) {
        if (str_contains($key, SESSION_FLASH_SEPARATE_TEXT)) {
            $newKey = explode(SESSION_FLASH_SEPARATE_TEXT, $key)[1];

            $flashes[$newKey] = $value;

            unset($_SESSION[$key]);
        }
    }
    ?>