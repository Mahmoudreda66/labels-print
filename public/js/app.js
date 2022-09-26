// alias of query selector
function _(selector, all = false) {
    return all ? document.querySelectorAll(selector) : document.querySelector(selector);
}

// function to prepare page for printing
function printPage() {
    let marginRightValue = '0px';

    window.onbeforeprint = function () {
        _('aside.main-aside').style.display = 'none';

        _('nav.main-navbar').style.display = 'none';

        marginRightValue = window.getComputedStyle(_('.content:first-of-type')).marginRight;

        _('.content:first-of-type').style.marginRight = '0px';
    }

    window.onafterprint = function () {
        _('aside.main-aside').style.display = 'block';

        _('nav.main-navbar').style.display = 'block';

        _('.content:first-of-type').style.marginRight = marginRightValue;
    }

    window.print();
}

// function to focus on element after 500ms
function forceFocus(element) {
    setTimeout(function () {
        element.focus();
    }, 500);
}

// add disable attribute to buttons after form submit
let modalsButtons = _('.modal-footer button.btn-success', true),
    formButtons = _('form button.btn-success', true);

for (let i = 0; i < modalsButtons.length; i++) {
    modalsButtons[i].onclick = function () {
        this.setAttribute('disabled', '');
    }
}

for (let i = 0; i < formButtons.length; i++) {
    formButtons[i].onclick = function () {
        this.setAttribute('disabled', '');
    }
}