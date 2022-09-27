<?php

$noNavbar = true;
$noSidebar = true;

include_once base_path('resources/views/admin/layouts/head.php');

$items = db()->prepare('SELECT * FROM models_stickers');
$items->execute();

$items = $items->fetchAll();

?>

<div class="content mx-0">
    <div class="row">
        <?php
        foreach ($items as $item) {
        ?>
            <div class="col-2 border">
                <?php echo $item->body; ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>