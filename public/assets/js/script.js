
function validateEmail(email) {
    const re = /^[\w\.\-_]{1,}@[\w\.\-]{6,}/
    return re.test(email);
}


function checkString(chaine) {
    if (chaine.value != null && chaine.value.length > 3) {
        chaine.dataset.valide = "true";
        return true;
    }
    chaine.dataset.valide = "false";
    return false;
}

function checkPassword(pass) {
    if (pass.value != null && pass.value.length >= 6) {
        pass.dataset.valide = "true";
        return true;
    }
    pass.dataset.valide = "false";
    return false;

}


function checkEmail(email) {
    if (validateEmail(email.value)) {
        email.dataset.valide = "true";
        return true;
    }
    email.dataset.valide = "false";
    return false;
}

function checkEmailConf(emailconf, email) {
    if (validateEmail(emailconf.value)) {
        if (emailconf.value === email.value) {
            emailconf.dataset.valide = "true";
            return true;
        } else {
            emailconf.dataset.valide = "false";
            return false//, "Les mots de passe ne sont pas identiques";
        }

    } else {
        emailconf.dataset.valide = "false";
        return false//, "Le format n'est pas valide";
    }
}

function checkDate(date) {
    if (date.value != "") {
        date.dataset.valide = "true";
        return true;
    }
    date.dataset.valide = "false";
    return false;
}

function checkGender(m, f) {
    if (m.checked || f.checked) {
        m.dataset.valide = "true";
        f.dataset.valide = "true";
        return true;
    }
    m.dataset.valide = "false";
    f.dataset.valide = "false";
    return false;
}

let eltForm = document.getElementById('form-register');
let childsForm = eltForm.querySelectorAll('input');
eltForm.addEventListener('submit', function (evt) {
    evt.preventDefault();
    console.log("submit");

    if (checkString(document.getElementById('lastname')) &&
        checkString(document.getElementById('firstname')) &&
        checkEmail(document.getElementById('email')) &&
        checkEmailConf(document.getElementById('email-confirmation'), document.getElementById('email')) &&
        checkPassword(document.getElementById('password')) &&
        checkDate(document.getElementById('dob')) &&
        checkGender(document.getElementById('genderMale'), document.getElementById('genderFemale'))
    ) {
        eltForm.submit();
    }
})


let email = document.getElementById('email');

for (let i = 0; i < eltForm.length; i++) {
    eltForm[i].addEventListener('focus', function () {


        console.log("Je suis sur " + eltForm[i].getAttribute('name'))


    });
}
