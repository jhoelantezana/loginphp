var Ajax = (function () {
    function Ajax(method, url, send, pro) {
        if (send === void 0) { send = null; }
        this.petition = new XMLHttpRequest();
        this.petition.open('POST', 'http://localhost/session/login');
        this.petition.onreadystatechange = pro;
        this.petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        this.petition.send(send);
    }
    Ajax.prototype.process = function (pro) {
    };
    return Ajax;
}());
//  funcion para remover el error del dom ====================================+
var rmErrorClass = function (element) {
    setTimeout(function () {
        element.classList.remove('errorM__show');
    }, 10000);
};
// control de errores al registrar usuarios
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var respuesta = getParameterByName('wr');
if (respuesta) {
    var registerUser = document.getElementById('registerUser').classList.add('showWindowsS');
    var errorContent = document.getElementById('errorMessage');
    errorContent.classList.add('errorM__show');
    rmErrorClass(errorContent);
}
(function () {
    var showLogin = document.getElementById('showLogin'), showRegister = document.getElementById('showRegister'), registerUser = document.getElementById('registerUser'), loginUser = document.getElementById('loginUser'), closeLogin = document.getElementById('closeLogin'), closeRegister = document.getElementById('closeRegister');
    function toogleForm(e, showElement, close, element) {
        e.preventDefault();
        e.target.style.opacity = 0;
        element.style.opacity = 0;
        showElement.classList.add('showWindowsS');
        close.addEventListener('click', function () {
            element.style.opacity = 1;
            e.target.style.opacity = 1;
            showElement.classList.remove('showWindowsS');
        });
    }
    showLogin.addEventListener('click', function (e) {
        toogleForm(e, loginUser, closeLogin, showRegister);
    });
    showRegister.addEventListener('click', function (e) {
        toogleForm(e, registerUser, closeRegister, showLogin);
    });
    closeRegister.addEventListener('click', function (e) {
        registerUser.classList.remove('showWindowsS');
    });
})();
/*
=================================================================================
=============================Enviando datos por ajax=============================
=================================================================================
*/
var sendLogin = document.getElementById('sendLogin');
var sendData = function (e) {
    e.preventDefault();
    // opteniendo los valores del formulario login ================================+
    var userName = document.getElementById('usnLogin'), password = document.getElementById('passLogin'), data = "userName=" + userName.value + "&password=" + password.value;
    // efecto loading =============================================================+
    var efectLoading = function (statusLoading) {
        var loadingContainer = document.getElementById('loading'), loaginElemenst = "<div class='cs-loader'>" +
            "<div class='cs-loader-inner'>" +
            "<label>	●</label>" +
            "<label>	●</label>" +
            "<label>	●</label>" +
            "<label>	●</label>" +
            "<label>	●</label>" +
            "<label>	●</label>" +
            "</div>" +
            "</div>";
        if (statusLoading == 'loaging') {
            loadingContainer.innerHTML = loaginElemenst;
        }
        else if (statusLoading == 'complete') {
            loadingContainer.innerHTML = '';
        }
    };
    efectLoading('loaging');
    // procesando la respuesta de ajax ============================================+
    var reqProcess = function () {
        if (valD.petition.status == 200 && valD.petition.readyState == 4) {
            var res = valD.petition.responseText;
            var errorContent = document.getElementById('errorMessage');
            efectLoading('complete'); // canselando efecto loading
            if (res == 'continue') {
                location.reload(); // refrescado el navegador
            }
            else if (res == 'errorPass') {
                errorContent.classList.add('errorM__show');
                errorContent.textContent = 'Error: Contraseña incorrecta intentelo nuevamente';
                rmErrorClass(errorContent);
            }
            else if (res == 'errorUser') {
                errorContent.classList.add('errorM__show');
                errorContent.textContent = userName.value + " Error: el nombre de usuario que ha ingresado no existe intentelo nuevamente";
                rmErrorClass(errorContent);
            }
        }
    };
    // connectando conajax =========================================================+
    var valD = new Ajax('POST', 'http://localhost/session/login', data, reqProcess);
};
sendLogin.addEventListener('click', sendData);
