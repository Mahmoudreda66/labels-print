<?php

$pageTitle = 'طباعة الملصقات';

$noSidebar = true;
$noNavbar = true;

include_once base_path('resources/views/admin/layouts/head.php');
?>

<style>
    *:not(.card) {
        margin: 0px !important;
        padding: 0px !important;
    }
</style>

<div class="content mx-0">
    <?php echo $sticker->body; ?>
</div>

<script>
    window.print();
</script>

<?php
include_once base_path('resources/views/admin/layouts/footer.php');
?>