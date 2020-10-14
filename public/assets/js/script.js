let firstname = new Object(document.getElementById('firstname'));
firstname.lengthMin = 2;
firstname.valid;

firstname.nextElementSibling.firstChild.style.display = "none";
firstname.nextElementSibling.lastChild.style.display = "none";

let lastname = new Object(document.getElementById('lastname'));
lastname.lengthMin = 2;
lastname.valid;
lastname.nextElementSibling.firstChild.style.display = "none";
lastname.nextElementSibling.lastChild.style.display = "none";

let emailOne = new Object(document.getElementById('email'));
emailOne.valid = false;
emailOne.nextElementSibling.firstChild.style.display = "none";
emailOne.nextElementSibling.lastChild.style.display = "none";

let emailConf = new Object(document.getElementById('email-confirmation'));
emailConf.valid = false;
emailConf.nextElementSibling.firstChild.style.display = "none";
emailConf.nextElementSibling.lastChild.style.display = "none";

let emailValid = false;

let password = new Object(document.getElementById('password'));
password.valid;
password.lengthMin = 6;
password.minLetterValid = false;
password.majusLetterValid = false;
password.minLengthValid = false;
password.numberValid = false;

let helpMessage = document.getElementById('help-message');
helpMessage.style.display = "none";

password.nextElementSibling.firstChild.style.display = "none";
password.nextElementSibling.lastChild.style.display = "none";

let dob = new Object(document.getElementById('dob'));
dob.valid;

dob.previousElementSibling.firstChild.style.display = "none";
dob.previousElementSibling.lastChild.style.display = "none";

let genderM = new Object(document.getElementById('genderMale'));
genderM.valid;

let genderF = new Object(document.getElementById('genderFemale'));
genderF.valid;

let gender = false;


function validationStats() {
    return (firstname.valid && lastname.valid && emailOne.valid && emailConf.valid && password.valid && dob.valid && gender === true) ? true : false;
}

function isValid(element) {
    if (element == emailConf) {
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(element.value)) {
            if (emailOne.value.length != 0) {
                if (emailConf.value != emailOne.value) {
                    element.classList.add('error');
                    element.nextElementSibling.firstChild.style.display = "none";
                    element.nextElementSibling.lastChild.style.display = "block";
                    element.valid = false;
                } else {
                    element.classList.remove('error');
                    element.nextElementSibling.firstChild.style.display = "block";
                    element.nextElementSibling.lastChild.style.display = "none";
                    element.valid = true;
                }
            }
            else {
                element.classList.remove('error');
                element.nextElementSibling.firstChild.style.display = "block";
                element.nextElementSibling.lastChild.style.display = "none";
                element.valid = true;
            }
        }
        else if (element.value.length == 0) {
            element.style.outline = 'unset';
            element.style.boxShadow = 'unset';
            element.valid = false;
        }
        //...or phone
        else if (/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/.test(element.value)) {
            if (emailOne.value.length != 0) {
                if (emailConf.value != emailOne.value) {
                    element.classList.add('error');
                    element.nextElementSibling.firstChild.style.display = "none";
                    element.nextElementSibling.lastChild.style.display = "block";
                    element.valid = false;
                } else {
                    element.classList.remove('error');
                    element.nextElementSibling.firstChild.style.display = "block";
                    element.nextElementSibling.lastChild.style.display = "none";
                    //---/
                    emailOne.nextElementSibling.firstChild.style.display = "block";
                    emailOne.nextElementSibling.lastChild.style.display = "none";
                    element.valid = true;
                }
            } else {
                element.classList.remove('error');
                element.nextElementSibling.firstChild.style.display = "block";
                element.nextElementSibling.lastChild.style.display = "none";
                element.valid = true;
            }

        } else {
            element.classList.remove('isValid');
            element.nextElementSibling.firstChild.style.display = "none";
            element.nextElementSibling.lastChild.style.display = "block";
            element.valid = false;
        }
    }
}

let eltForm = document.getElementById('form-register');
let childsForm = eltForm.querySelectorAll('input');
eltForm.addEventListener('submit', function (evt) {
    evt.preventDefault();
    console.log("submit");
    let eltsInputs = eltForm.querySelectorAll('input');

    for (let i = 0; i < eltsInputs.length; i++) {
        if (eltsInputs[i].value == "") {
            eltsInputs[i].setAttribute('data-valide', 'false');
            eltsInputs[i].classList.add("error");
            if (eltForm[i] == dob) {
                eltForm[i].previousElementSibling.lastChild.style.display = "block";
            } else {
                eltForm[i].nextElementSibling.lastChild.style.display = "block";
            }
        }
        //gender
        else if (eltsInputs[i] == genderF || eltsInputs[i] == genderM) {
            if (genderF.checked == false && genderM.checked == false) {
                genderF.classList.remove('isValid');
                genderF.classList.add('error');
                genderM.classList.remove('isValid');
                genderM.classList.add('error');
                gender = false;
            } else if (genderF.checked == true || genderM.checked == true) {
                //console.log("checked == true")
                genderF.classList.remove('error');
                genderM.classList.remove('error');
                gender = true;
            }
        } else {
            eltsInputs[i].classList.remove("error");
            gender = true;
        }
    }
    if (validationStats() === true){
        eltForm.submit();
    }
    
})



for (let i = 0; i < eltForm.length; i++) {
    eltForm[i].addEventListener('input', function () {

        //firstname or lastname
        if (eltForm[i] === firstname || eltForm[i] === lastname) {
            //for firstname and lastname, Min length is valid ?
            if (eltForm[i].value.length >= eltForm[i].lengthMin) {
                eltForm[i].nextElementSibling.firstChild.style.display = "block";
                eltForm[i].nextElementSibling.lastChild.style.display = "none";
                eltForm[i].classList.remove("error");
                eltForm[i].valid = true;
            } else if (eltForm[i].value.length == 0) {
                eltForm[i].classList.remove("error");
                eltForm[i].classList.remove('isValid');
                eltForm[i].style.outline = "unset";
                eltForm[i].style.boxShadow = "unset";
                eltForm[i].nextElementSibling.firstChild.style.display = "none";
                eltForm[i].nextElementSibling.lastChild.style.display = "none";
            }
            else {
                eltForm[i].nextElementSibling.firstChild.style.display = "none";
                eltForm[i].nextElementSibling.lastChild.style.display = "block";
                eltForm[i].classList.add('error');
                eltForm[i].valid = false;
            }
        }

        //email... 
        if (eltForm[i] == emailOne) {
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(eltForm[i].value)) {
                if (emailConf.value.length != 0) {
                    if (emailConf.value != emailOne.value) {
                        eltForm[i].classList.remove('isValid');
                        eltForm[i].classList.add('error');
                        eltForm[i].nextElementSibling.firstChild.style.display = "none";
                        eltForm[i].nextElementSibling.lastChild.style.display = "block";
                        emailOne.valid = false;
                    } else {
                        eltForm[i].classList.remove('error');
                        eltForm[i].nextElementSibling.firstChild.style.display = "block";
                        eltForm[i].nextElementSibling.lastChild.style.display = "none";
                        emailOne.valid = true;
                        isValid(emailConf);
                    }
                } else {
                    eltForm[i].classList.remove('error');
                    eltForm[i].nextElementSibling.firstChild.style.display = "block";
                    eltForm[i].nextElementSibling.lastChild.style.display = "none";
                    emailOne.valid = true;
                    isValid(emailConf);
                }
            } else if (eltForm[i].value.length == 0) {
                eltForm[i].classList.remove('error');
                eltForm[i].classList.remove('isValid');
                eltForm[i].style.outline = 'unset';
                eltForm[i].style.boxShadow = 'unset';
                emailOne.valid = false;
            }
            //...or phone
            else if (/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/.test(eltForm[i].value)) {
                if (emailConf.value.length != 0) {
                    if (emailConf.value != emailOne.value) {
                        eltForm[i].classList.remove('isValid');
                        eltForm[i].classList.add('error');
                        eltForm[i].nextElementSibling.firstChild.style.display = "none";
                        eltForm[i].nextElementSibling.lastChild.style.display = "block";
                        emailOne.valid = false;
                    } else {
                        eltForm[i].classList.remove('error');
                        eltForm[i].nextElementSibling.firstChild.style.display = "block";
                        eltForm[i].nextElementSibling.lastChild.style.display = "none";
                        emailOne.valid = true;
                        isValid(emailConf);
                    }
                } else {
                    //if emailConf is empty
                    eltForm[i].classList.remove('error');
                    eltForm[i].nextElementSibling.firstChild.style.display = "block";
                    eltForm[i].nextElementSibling.lastChild.style.display = "none";
                    emailOne.valid = true;
                }
            } else {
                eltForm[i].classList.remove('isValid');
                eltForm[i].classList.add('error');
                eltForm[i].nextElementSibling.firstChild.style.display = "none";
                eltForm[i].nextElementSibling.lastChild.style.display = "block";
                emailOne.valid = false;
            }
        }

        //email confirmation... 
        isValid(eltForm[i]);


        //password
        if (eltForm[i] == password) {
            let regMin = new RegExp(/([a-z])/);
            let regMaj = new RegExp(/([A-Z])/);
            let regNum = new RegExp(/([0-9])/);
            if (regMin.test(eltForm[i].value)) {
                password.minLetterValid = true;
            } else {
                password.minLetterValid = false;
                helpMessage.style.display = "block";
            }
            if (regMaj.test(eltForm[i].value)) {
                console.log("Majus : ok");
                password.majusLetterValid = true;
            } else {
                password.majusLetterValid = false;
                helpMessage.style.display = "block";
            }
            if (regNum.test(eltForm[i].value)) {
                console.log("Number : ok");
                password.numberValid = true;
            } else {
                password.numberValid = false;
                helpMessage.style.display = "block";
            }
            if (eltForm[i].value.length >= eltForm[i].lengthMin) {
                console.log("min lenght : ok");
                password.minLengthValid = true;
            } else {
                password.minLengthValid = false;
                helpMessage.style.display = "block";
            }
            if (password.minLetterValid === true && password.majusLetterValid === true && password.numberValid === true && password.minLengthValid === true) {
                eltForm[i].valid = true;
                eltForm[i].classList.remove('error');
                eltForm[i].nextElementSibling.firstChild.style.display = "block";
                eltForm[i].nextElementSibling.lastChild.style.display = "none";
                helpMessage.style.display = "none";
            } else {
                eltForm[i].valid = false;
                eltForm[i].classList.remove('isValid');
                eltForm[i].classList.add('error');
                eltForm[i].nextElementSibling.firstChild.style.display = "none";
                eltForm[i].nextElementSibling.lastChild.style.display = "block";
                helpMessage.style.display = "block";
            }
        }

        //date
        if (eltForm[i] == dob) {
            if (!moment(eltForm[i].value, 'YYYY-MM-DD', true).isValid()) {
                eltForm[i].classList.add('error');
                eltForm[i].previousElementSibling.firstChild.style.display = "none";
                eltForm[i].previousElementSibling.lastChild.style.display = "block";
                eltForm[i].valid = false;
            } else {

                eltForm[i].classList.remove('error');
                eltForm[i].previousElementSibling.firstChild.style.display = "block";
                eltForm[i].previousElementSibling.lastChild.style.display = "none";
                eltForm[i].valid = true;
            }
        }
        //gender
        else if (eltForm[i] == genderF || eltForm[i] == genderM) {
            genderF.classList.remove('error');
            genderM.classList.remove('error');
            gender = true;
        }

    });
}