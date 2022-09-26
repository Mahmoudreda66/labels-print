let cardPreview = _('#card_preview'),
    paddingInput = _('#padding_input'),
    fontSizeInput = _('#font_size_input'),
    fontFamilySelect = _('#font_family_select'),
    borderSelect = _('#border_select'),
    verticalCenterCheckbox = _('#vertical_center'),
    horizontalCenterCheckbox = _('#horizontal_center'),
    iconSelect = _('#icon'),
    lineHeightInput = _('#line_height');

function paddingChange(paddingValue, element) {
    element.style.padding = paddingValue + 'px';
}

function fontSizeChange(fontSizeValue, element) {
    element.style.fontSize = fontSizeValue + 'px';
}


function fontFamilyChange(fontFamilyValue, element) {
    element.style.fontFamily = fontFamilyValue;
}

function borderChange(borderValue, element) {
    element.style.borderStyle = borderValue;
}

function verticalCenterChange(center, element) {
    let align;
    center ? (align = 'center') : (align = 'normal');

    element.style.alignItems = align;
}

function horizontalCenterChange(center, element) {
    let justify;
    center ? (justify = 'center') : (justify = 'normal');

    element.style.justifyContent = justify;
}

function submitForm() {
    let cardBody = cardPreview.parentElement.innerHTML;

    _('input#body').value = cardBody.replaceAll('\r', '').replaceAll('\n', '').replaceAll('contenteditable=""', '');

    _('#add_sticker_form').submit();
}

function iconChange(value, element) {
    let imgElement = element.querySelector('img');

    imgElement.style.display = 'none';

    if (value != "") {
        imgElement.style.display = 'block';

        imgElement.src = value;
    }
}

function lineHeightChange(value, element) {
    element.style.lineHeight = value;
}

_('button#addStickerButton').onclick = function () {
    submitForm();
};

window.onload = function () {
    paddingChange(paddingInput.value, cardPreview);
    fontSizeChange(fontSizeInput.value, cardPreview);
    fontFamilyChange(fontFamilySelect.value, cardPreview);
    borderChange(borderSelect.value, cardPreview);
    verticalCenterChange(verticalCenterCheckbox.checked, cardPreview);
    horizontalCenterChange(horizontalCenterCheckbox.checked, cardPreview);
    iconChange(iconSelect.value, cardPreview);
    lineHeightChange(lineHeightInput.value, cardPreview);
}

paddingInput.oninput = function () {
    paddingChange(this.value, cardPreview);
}

fontSizeInput.oninput = function () {
    fontSizeChange(this.value, cardPreview);
}

fontFamilySelect.onchange = function () {
    fontFamilyChange(this.value, cardPreview);
}

borderSelect.onchange = function () {
    borderChange(this.value, cardPreview);
}

verticalCenterCheckbox.onchange = function () {
    verticalCenterChange(this.checked, cardPreview);
}

horizontalCenterCheckbox.onchange = function () {
    horizontalCenterChange(this.checked, cardPreview);
}

iconSelect.onchange = function () {
    iconChange(this.value, cardPreview);
}

lineHeightInput.oninput = function () {
    lineHeightChange(this.value, cardPreview);
}