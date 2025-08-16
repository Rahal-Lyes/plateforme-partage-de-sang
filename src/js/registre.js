"use strict";
// Defining a class for User


/********************************VERIFICATION INPUT REGISTER **********************************/

const form = document.getElementById("contactForm");
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("email");
const password = document.getElementById("password");
const confirmePassword = document.getElementById("confirmePassword");
const age = document.getElementById("age");
const phone = document.getElementById("phone");
const wilayaEl = document.querySelector(".location .wilaya");

const dairaEl = document.querySelector(".location .daira");
const selectElement = document.querySelector('select[name="blood_group"]');

let firstnameBool = false;
let lastnameBool = false;
let emailBool = false;
let passwordBool = false;
let ageBool = false;
let phoneBool = false;
let dairaBool = false;
let bloodType = false;
let firstnamVal;
let lastnameVal;
let emailVal;
let passwordVal;
let ageVal;
let phoneVal;

form.addEventListener("submit", (e) => {
  e.preventDefault();
  formVerify();
});

function formVerify(event) {
 
  const firstnameValue = firstName.value.trim();
  const lastnameValue = lastName.value.trim();
  const emailValue = email.value.trim();
  const loginPassword = password.value.trim();
  const confirmeloginPassword = confirmePassword.value.trim();
  const ageValue = parseInt(age.value.trim());
  const phoneValue = parseInt(phone.value.trim());
  const bloodgroup = selectElement.value;
  let wilayaVal = wilayaEl.value;
  let wilayaValue = wilayaName(wilayaVal, wilaya);

  /*************************** VERIFIER LE firstName  ************************************/
  const correctName = /^[A-Za-z][A-Za-z0-9]*$/;

  if (firstnameValue === "") {
    let msg = "You can't leave First name blank!!";
    setError(firstName, msg);
  } else if (firstnameValue.length <= 2) {
    let msg = "First name must be at least 2 characters long.";
    setError(firstName, msg);
  } else if (!correctName.test(firstnameValue)) {
    let msg = "Must start with a letter.";
    setError(firstName, msg);
  } else {
    setSuccess(firstName);

    firstnameBool = true;
    firstnamVal = capitalizeFirstCharacter(firstnameValue.toLowerCase());
  }

  /*************************** VERIFIER LE lastName  ************************************/
  if (lastnameValue === "") {
    let msg = "You can't leave Last name blank!!";
    setError(lastName, msg);
  } else if (lastnameValue.length <= 2) {
    let msg = "Last name must be at least 2 characters long.";
    setError(lastName, msg);
  } else if (!correctName.test(lastnameValue)) {
    let msg = "must start with a letter.";
    setError(lastName, msg);
  } else {
    setSuccess(lastName);

    lastnameBool = true;
    lastnameVal = capitalizeFirstCharacter(lastnameValue.toLowerCase());
  }

  /*************************** VERIVIER LE EMAIL  ************************************/

  if (emailValue === "") {
    let msg = "You can't leave the email field blank.";

    setError(email, msg);
  } else if (!isEmail(emailValue)) {
    let msg = "Invalid Email";
    setError(email, msg);
  } else {
    setSuccess(email);

    emailBool = true;
    emailVal = emailValue;
  }
  /*************************** VERIfIER PASSWORD  ************************************/
  if (loginPassword === "") {
    let msg = "You can't leave Password blank!!";
    setError(password, msg);
  } else if (loginPassword.length <= 7) {
    let msg = "Password must be at least 8 characters long";
    setError(password, msg);
  } else {
    if (loginPassword !== confirmeloginPassword) {
      let msg = "Passwords does not match";
      setError(password, msg);
    } else {
      setSuccess(password);

      passwordBool = true;
      passwordVal = loginPassword;
    }
  }

  /*************************** VERIfIER CONFIRME PASSWORD  ************************************/

  if (confirmeloginPassword === "") {
    let msg = "You can't leave Password blank!!";
    setError(confirmePassword, msg);
  } else if (confirmeloginPassword.length <= 7) {
    let msg = "Password must be at least 8 characters long";
    setError(confirmePassword, msg);
  } else {
    if (loginPassword !== confirmeloginPassword) {
      let msg = "Passwords does not match";
      setError(confirmePassword, msg);
    } else {
      setSuccess(confirmePassword);
    }
  }
  /*************************** VERIfIER AGE  ************************************/
  const isValidAge = ageValue < 10 || ageValue > 80 ? false : true;

  if (typeof ageValue !== "number" || isNaN(ageValue)) {
    let msg = "Should be a number";
    setError(age, msg);
  } else if (!isValidAge) {
    let msg = "Age must be between 10 and 80.";
    setError(age, msg);
  } else {
    setSuccess(age);
    ageBool = true;
    ageVal = ageValue;
  }
  /*************************** VERIfIER  Phone  ************************************/

  let regexPhone = /^213[5-7]\d{8}$/;

  if (typeof phoneValue !== "number" || isNaN(phoneValue)) {
    let msg = "You can't leave Phone blank!!";
    setError(phone, msg);
  } else if (!regexPhone.test(phoneValue)) {
    let msg = "Incorrect Number!";

    setError(phone, msg);
  } else if (regexPhone.test(phoneValue)) {
    setSuccess(phone);
    phoneBool = true;
    phoneVal = phoneValue;
  }
  /*************************** VERIfIER  blood wilaya daira  ************************************/
  function Empty(value) {
    if (value === null || value === undefined || value === "") {
      return false;
    } else {
      return true;
    }
  }
  if (!Empty(dairaVal)) {
    let msg = "Please select daira";
    setError(dairaEl, msg);
  } else {
    setSuccess(dairaEl);
    dairaBool = true;
  }
  /*************************** VERIfIER LES BLOODSANG ************************************/
  function bloodVerify(blood) {
    const bloodGroups = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];
    for (const element of bloodGroups) {
      if (blood === element) {
        return true;
      }
    }

    return false;
  }

  if (!bloodVerify(bloodgroup)) {
    let msg = "Please select your blood type.";
    setError(selectElement, msg);
   
  } else {
    setSuccess(selectElement);

  }

  /*************************** VERIfIER  LES CHAMPS DES VARIABLE BOOLEEN  ************************************/
  if (
    firstnameBool &&
    lastnameBool &&
    emailBool &&
    passwordBool &&
    ageBool &&
    phoneBool &&
    dairaBool
  ) {
    let user = {
      name: firstnamVal,
      prenom: lastnameVal,
      email: emailVal,
      password: passwordVal,
      age: ageVal,
      phone: phoneVal,
      bloodGroup: bloodgroup,
      wilaya: wilayaValue,
      daira: dairaVal,
    };

    // SEND DATA-REGISTER FROM FRONTEND WITH JAVASCRIPT TO BACKEND TO PHP
    
   
    const responseForm = document.getElementById('response');
    const para = document.createElement("p");
    responseForm.appendChild(para);
    const jsonData = JSON.stringify(user);
    responseForm.innerHTML = '';


    fetch("../src/config/auth/registre.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: jsonData
})
.then(response => {
    if (!response.ok) {
        throw new Error("Network response was not ok");
    }
    return response.json();
})
.then(data => {
    // Check if registration was successful
    if (data.success === 1) {
      console.log(data.message);
        para.innerText = "Your registration is successful, congratulations!";
        para.style.width="500";
        para.classList.add('successMsg');
    } else {
        para.innerText = "Please verify your data!";
        para.classList.add('fieldMsg');
    }
    // Make the paragraph visible after updating its content
    para.style.visibility = "visible";
})
.catch(error => {
    console.error("Fetch error:", error);
    para.innerText = "Error: " + error.message;
    para.classList.add('errorMsg');
    // Make the paragraph visible after updating its content
    para.style.visibility = "visible";
})
.finally(() => {
  
    responseForm.appendChild(para);
});








  }}

function setError(element, message) {
  const inputBox = element.parentElement;
  const small = inputBox.querySelector("small");
  small.innerText = message;

  inputBox.className = "input-box error";
}

function setSuccess(element) {
  const inputBox = element.parentElement;
  const small = inputBox.querySelector("small");
  small.innerText = "";
  inputBox.className = "input-box success";
}
function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}

function capitalizeFirstCharacter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}



  let wilaya = [];

var myRequest = new XMLHttpRequest();
myRequest.onreadystatechange = function () {
  if (this.readyState === 4 && this.status === 200) {
    const string = this.responseText;
    const myJsObject = JSON.parse(string);

    const processedCodes = [];

    myJsObject.forEach((e) => {
      if (!processedCodes.includes(e.wilaya_code)) {
        wilaya.push({ name: e.wilaya_name_ascii, id: e.wilaya_code });
        processedCodes.push(e.wilaya_code);
      }
    });

    const wilayaJson = JSON.stringify(wilaya);
    const wilayaObj = JSON.parse(wilayaJson);

    wilaya.forEach((e) => {
      let newOption = document.createElement("option");
      newOption.textContent = e.name;
      newOption.setAttribute("value", e.id);
      newOption.setAttribute("name", e.name);
      wilayaEl.appendChild(newOption);
    });
  }
};
myRequest.open("GET", "../src/js/algeria_cities.json", true);
myRequest.send();

//JGUERYY




