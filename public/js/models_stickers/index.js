let addStickerModal = new bootstrap.Modal(_('#addModal')),
    deletStickersBtns = _('.delete-stickers-btns', true),
    deleteForm = _('#deleteForm');

_('#createNewSticker').onclick = () => {
    addStickerModal.show();

    forceFocus(_('#add_sticker_form input[type="text"]:first-of-type'));
};

for (let i = 0; i < deletStickersBtns.length; i++) {
    deletStickersBtns[i].onclick = function () {
        let confirmation = confirm('هل أنت متأكد من حذف الملصق؟ '),
            formActionPath = '/models-stickers/delete';

        if (confirmation) {
            deleteForm.setAttribute('action', (formActionPath + '?id=' + this.dataset.id));
            deleteForm.submit();
        }
    }
}