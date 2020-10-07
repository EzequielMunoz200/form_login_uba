console.log("Run JS")
function validateEmail(email) {
    const re = /^[\w\.\-_]{1,}@[\w\.\-]{6,}/
    return re.test(email);
}

function emailIsValid(element, isValid) {
    let elValue = element.value,
        isNotEmpty = (elValue != '' || elValue != null)

    if (isValid && isNotEmpty) {
        if (element.classList.contains('invalid')) {
            removeClass(element, 'invalid');
        } else {
            addClass(element, 'valid');
        }
    } else {
        if (element.classList.contains('valid')) {
            removeClass(element, 'valid');
        } else {
            addClass(element, 'invalid');
        }
    }
}

function addClass(element, elClass) {
    element.classList.add(elClass);
}

function removeClass(element, elClass) {
    element.classList.remove(elClass);
}

var emailInput = document.querySelector('.validateEmail');

emailInput.addEventListener('keyup', function (event) {
    let validatedEmail = validateEmail(this.value);
    emailIsValid(this, validatedEmail);
});

emailIsValid(emailInput, validateEmail(emailInput.value));