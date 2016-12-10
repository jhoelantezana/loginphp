var modalView = function (idActiveModal, idModal, idCloseModal) {
    var active = document.querySelectorAll(idActiveModal), modal = document.getElementById(idModal), close = document.getElementById(idCloseModal);
    for (var _i = 0, active_1 = active; _i < active_1.length; _i++) {
        var ac = active_1[_i];
        ac.addEventListener('click', function (e) {
            e.preventDefault();
            modal.style.top = '0';
        });
    }
    close.addEventListener('click', function () {
        modal.style.top = '-150%';
    });
};
modalView('#ampaddPost', 'vmpaddPost', 'cmpaddPost');
