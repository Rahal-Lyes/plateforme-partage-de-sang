/*************************** LOGIN POPUP  ************************************/

let formRegister = document.querySelector('.formRegister');
let msgPop=document.querySelector('.msg-pop');

let loginEmail, loginPassword;

formRegister.addEventListener('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(formRegister);
  for (const entry of formData.entries()) {
    if (entry[0] === "email") {
      loginEmail = entry[1];
    } else if (entry[0] === "password") {
      loginPassword = entry[1];
    }
  }
  
  fetch("../src/config/auth/login.php", {
    method: 'POST',
    body: formData,
  })
  .then(res => res.json())
  .then(function(res){
   
     if(res.success==1){
    
      window.location.href = "../views/dashboardUser.php";
     }else{
      msgPop.innerText=res.message;
     }
  } )

});
