





function showSideBar() {
    let sidebar = document.querySelector(".sidebar");
    sidebar.style.display = "flex";
  }
  // Function to hide the sidebar
  function hideSideBar() {
    let sidebar = document.querySelector(".sidebar");
    sidebar.style.display = "none";
  }

// let btnSigIn=document.getElementById("btnSignIn");
let btnSignInList = document.querySelectorAll('.btn-cnxPop');
let btnClose = document.querySelector(".close-btn");

btnSignInList.forEach(function(btnSignIn) {
    btnSignIn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

        setTimeout(function() {
            document.querySelector(".popup").classList.add("active");
        }, 500);
    });
});



btnClose.addEventListener('click',function(){
  document.querySelector(".popup").classList.remove("active");
})

//SCROLL IN WEB PAGE 
const scroll=document.querySelector('.scroll');
window.onscroll= function(){

 this.scrollY>=600  ? scroll.classList.add('scrollShow'):scroll.classList.remove('scrollShow');
}

scroll.onclick=function(){
  window.scrollTo({
    top:0,
    behavior: "smooth",
  });
}


//ANIMATION TO H2 HOME BLOOD DONATION 
let containerEl = document.querySelector('.blood-donation');

const bloodDonationBenefits = ["Another way to help","Saves Lives", "Is Good for Health", "Builds Community"];

let benefitIndex = 0;
let characterIndex = 0;

updateText();

function updateText() {
  characterIndex++;
  containerEl.innerHTML = `
    <h1> Blood donation: ${bloodDonationBenefits[benefitIndex].slice(0, 1).toUpperCase() + bloodDonationBenefits[benefitIndex].slice(1, characterIndex)}</h1>
  `;

  if (characterIndex === bloodDonationBenefits[benefitIndex].length) {
    benefitIndex++;
    characterIndex = 0;
  }

  if (benefitIndex === bloodDonationBenefits.length) {
    benefitIndex = 0;
  }
  setTimeout(updateText, 200);
}


/*********************************PRELOADER ****************************/
let loader = document.getElementById("preloader");


function masquerPreloader() {
    loader.style.transition = "opacity 2s"; 
    loader.style.opacity = "0"; 
    setTimeout(() => {
        loader.style.display = "none"; 
    }, 2000); 
}


window.addEventListener("load", () => {
    
    setTimeout(masquerPreloader, 3000); 
});



