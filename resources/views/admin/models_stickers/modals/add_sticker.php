<!-- Add Sticker Modal -->
<div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel"><?php echo $modalTitle; ?></h5>
            </div>
            <div class="modal-body">
                <form action="/models-stickers" method="post" id="add_sticker_form" onsubmit="submitForm();">
                    <div class="mb-3">
                        <label for="name" class="form-label">إسم الملصق</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="إسم الملصق...">
                    </div>
                    <div class="mb-0">
                        <label for="sticker" class="form-label">الملصق</label>
                        <div class="bg-light p-3">
                            <div>
                                <div class="card mx-auto" id="card_preview" contenteditable>
                                    <div>
                                        <span>الصنف: </span>
                                        <span>ط هاف كول رجالي</span>
                                    </div>
                                    <div>
                                        <span>المقاس: </span>
                                        <span>2XL</span>
                                    </div>
                                    <div>
                                        <span>اللون: </span>
                                        <span>أبيض</span>
                                    </div>
                                </div>
                            </div>
                            <small class="form-text">
                                <i class="fas fa-lightbulb"></i>
                                <span>قم بالكتابة داخل المستطيل الأبيض</span>
                            </small>
                            <hr>
                            <div id="card_options">
                                <div class="row">
                                    <div class="col-4 border-start">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="radio" name="size" class="sizeRadio" id="size1" data-size="big">
                                                <label for="size1">ملصق كبير</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" name="size" class="sizeRadio" id="size2" data-size="small" checked>
                                                <label for="size2">ملصق صغير</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 border-start">
                                        <input type="checkbox" id="vertical_center">
                                        <label for="vertical_center">توسيط رأسي</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="checkbox" id="horizontal_center" checked>
                                        <label for="horizontal_center">توسيط أفقي</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" name="body" id="body">
                            <div id="options">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="padding_input" class="form-label">الحشوة الداخلية</label>
                                        <input type="number" id="padding_input" value="7" class="form-control">
                                    </div>
                                    <div class="col-3">
                                        <label for="font_size_input" class="form-label">حجم الخط</label>
                                        <input type="number" id="font_size_input" value="14" class="form-control">
                                    </div>
                                    <div class="col-3">
                                        <label for="font_family_select" class="form-label">نوع الخط</label>
                                        <select id="font_family_select" class="form-select">
                                            <option value="Arial" selected>Arial</option>
                                            <option value="cairo">Cairo</option>
                                            <option value="'sans-serif'">sans-serif</option>
                                            <option value="Tahoma">Tahoma</option>
                                            <option value="'Times New Roman'">Times New Roman</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="border_select" class="form-label">الإطار الخارجي</label>
                                        <select id="border_select" class="form-select">
                                            <option value="none">بدون</option>
                                            <option value="solid">مسمط</option>
                                            <option value="dashed">خطوط</option>
                                            <option value="dotted">نقاط</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success" id="<?php echo $saveButtonId; ?>">
                    <?php echo $saveButtonText; ?>
                </button>
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo asset('js/models_stickers/modals/add_sticker.js'); ?>"></script>