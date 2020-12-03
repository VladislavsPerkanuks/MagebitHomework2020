let childs = document.getElementById("error-block").childNodes;

function isValid(email) {
    document.getElementById('submit').disabled =
        !(notEmpty(email) && isEmail(email) &&  checkDomain(email) && checkboxCheck());
}

function showError(number) {
    hideAllErrors();
    childs[number].classList.remove('hidden');
}

function hideAllErrors() {
    for (let i = 1; i <= childs.length - 2; i += 2) {
        if (!childs[i].classList.contains('hidden')) {
            childs[i].classList.add('hidden');
            break;
        }
    }
}

function isEmail(email) {
    if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
        showError(1);
        return false;
    }
    hideAllErrors();
    return true;
}

function notEmpty(email) {
    if (!email) {
        showError(3);
        return false;
    }
    hideAllErrors();
    return true;
}

function checkDomain(email) {
    let dom = email.toLowerCase();
    let pos = email.lastIndexOf(".");
    let tld = dom.substring(pos);

    if (tld === ".co") {
        showError(5);
        return false;
    }
    hideAllErrors();
    return true;
}

function checkboxCheck() {
    if (!document.getElementById("terms").checked) {
        showError(7);
        return false;
    }
    hideAllErrors();
    return true;
}