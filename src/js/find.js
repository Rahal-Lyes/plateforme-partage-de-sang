
// Define blood groups
const bloodGroupFind = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];
const bloodGroupSelect = document.getElementById('bloodTypeInput');

// Populate blood group options
bloodGroupFind.forEach((group) => {
    const option = document.createElement("option");
    option.textContent = group;
    option.value = group;
    bloodGroupSelect.appendChild(option);
});
// Fetch data and populate wilaya select

fetch("../src/js/algeria_cities.json")
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');

        }
        return response.json();
    })
    .then(data => {
        const wilayaSelect = document.getElementById("wilaya_select");

        wilayaSelect.innerHTML = "<option disabled selected>Please select your location</option>";

        const wilayaMap = new Map();

        data.forEach((item) => {
            if (!wilayaMap.has(item.wilaya_code)) {
                wilayaMap.set(item.wilaya_code, item.wilaya_name_ascii);
            }
        });

        wilayaMap.forEach((name, id) => {
            let option = document.createElement("option");
            option.textContent = name;
            option.value = id;
            wilayaSelect.appendChild(option);
        });

        // Event listener for wilaya select change
        wilayaSelect.addEventListener("change", function () {
            const selectedWilayaCode = this.value;
            const dairaSelect = document.getElementById("daira_select");
            dairaSelect.innerHTML = "";

            const communesInWilaya = data.filter(
                (commune) => commune.wilaya_code === selectedWilayaCode
            );

            communesInWilaya.forEach((commune) => {
                let option = document.createElement("option");
                option.textContent = commune.commune_name_ascii;
                option.value = commune.commune_name_ascii;
                dairaSelect.appendChild(option);
            });
        });
    })
    .catch(error => {
        console.error("Failed to load data:", error);
    });





let findDonorResponse;

// RECUPERER LES DONNEES VIA JAVASCRIPT

const dairaSel = document.getElementById("daira_select");

document.getElementById("form-input").addEventListener("submit", function(event) {
    event.preventDefault(); 

    const bloodGroupFindEl = document.getElementById("bloodTypeInput").value;
    const wilayaSelect = document.getElementById("wilaya_select");
    const wilaya = wilayaSelect.options[wilayaSelect.selectedIndex].innerText;

    const dairaSel = document.getElementById("daira_select");
    const daira = dairaSel.options[dairaSel.selectedIndex].innerText;
  
var requestData = {
    bloodGroup:  bloodGroupFindEl,
    wilaya: wilaya,   
    daira: daira
};

let findDonorResponse; 

fetch('../src/config/auth/find.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(requestData),
})
.then(response => {
    if (!response.ok) {
        throw new Error('La requête a échoué.');
    }
    return response.json();
})
.then(data => {
    if (data.success === 1) {
        let findDonorResponse = data.data;
        let heightLengh=findDonorResponse.lenght;
        let length=0;
        findDonorResponse.forEach(element =>{
            length++;

        })
       
        let containerResult = document.querySelector('.containerResult');
        let btnSearch=document.getElementById('find-btn');
            btnSearch.addEventListener('click',()=>{
                document.querySelector('.containerResult').innerHTML = '';
            })
       
        findDonorResponse.forEach(donor => {
            let donorFind = document.createElement('div');
            donorFind.className = 'donorFind';
        
            let donorImg = document.createElement('div');
            donorImg.className = 'img-find';
        
            let firstNameLastName = document.createElement('div');
            firstNameLastName.className = 'fistlastname';
        
            let locationFind = document.createElement('div');
            locationFind.className = 'locationFind';
            locationFind.innerHTML =
                `<label>Wilaya : </label>
                <span class="wilayaFind">${donor.wilaya}</span> <br>
                <label>Daira: </label>
                <span class="dairaFind">${donor.daira}</span>`;
        
            let bloodType = document.createElement('div');
            bloodType.className = 'bloodType';
            bloodType.innerHTML =
                `<label>Blood type: </label>
                <span class="bloodtypeFind">${donor.bloodtype}</span>`;
        
            containerResult.appendChild(donorFind);
            donorFind.appendChild(donorImg);
            donorFind.appendChild(firstNameLastName);
            donorFind.appendChild(locationFind);
            donorFind.appendChild(bloodType);
        
            firstNameLastName.innerHTML =
                `<label>Firstname: </label>
                <span class="firstNameFind">${donor.firstname}</span><br>
                <label>Lastname: </label>
                <span class="lastNameFind">${donor.lastname}</span>`;
                
        });
        
    } else {
        console.error('La requête a échoué.');
    }
})
.catch(error => {
    console.error('Erreur lors de la requête AJAX:', error);
});

});

function resetContainerResult() {
    document.querySelector('.containerResult').innerHTML = '';
}








