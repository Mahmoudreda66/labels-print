<?php

$pageTitle = 'ملصقات العلب';

$pageLinks = [
    'إضافة ملصق جديد' => ['javascript:void(0)', 'createNewSticker']
];

include_once base_path('resources/views/admin/layouts/head.php');
?>

<div class="content">
    <?php
    $mainModalPath = base_path('resources/views/admin/models_stickers/modals/add_sticker.php');

    includeFile($mainModalPath, [
        'modalTitle' => 'إضافة ملصق جديد',
        'modalId' => 'addModal',
        'saveButtonText' => 'حفظ',
        'saveButtonId' => 'addStickerButton',
    ]);
    ?>

    <?php
    if (isset($flashes['success'])) {
    ?>
        <div class="alert alert-success">
            <?php echo $flashes['success']; ?>
        </div>
    <?php
    }

    if (isset($flashes['error'])) {
        ?>
            <div class="alert alert-danger">
                <?php echo $flashes['error']; ?>
            </div>
        <?php
        }
    ?>

    <!-- Delete Sticker Form -->
    <form method="post" id="deleteForm">
    </form>

    <table class="table table-hover text-center mb-0 table-printable">
        <thead>
            <tr>
                <th>#</th>
                <th>الإسم</th>
                <th>الملصق</th>
                <th>خيارات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($stickers)) {
                foreach ($stickers as $key => $value) {
            ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo !empty($value->name) ? $value->name : 'لا يوجد'; ?></td>
                        <td style="text-align: initial;"><?php echo $value->body; ?></td>
                        <td>
                            <a href="/models-stickers/print-sticker?id=<?php echo $value->id; ?>"><i class="fas fa-print"></i></a>
                            <i class="fas fa-trash text-danger cursor-pointer delete-stickers-btns" data-id="<?php echo $value->id; ?>"></i>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">
                        <div class="alert alert-info text-center mb-0">
                            لا يوجد ملصقات حتى الآن
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script src="<?php echo asset('js/models_stickers/index.js'); ?>"></script>

<?php
include_once base_path('resources/views/admin/layouts/footer.php');
?>