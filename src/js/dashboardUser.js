const form = document.getElementById('formHospital');
const msgPublish=document.querySelector('.msgPublish');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const selectedHospital = document.querySelector('.hospital-field').value;
   


    const jsonData = JSON.stringify(selectedHospital);

    fetch('../src/config/fetch.php', {
        method: 'POST',
        body: jsonData,
        headers: {
            'Content-Type': 'application/json' 
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .then(data => {
        if(data==1){
            msgPublish.style.visibility="visible";
            msgPublish.style.color="green";
        }else{
            msgPublish.style.visibility="visible";
            msgPublish.style.color="red";
        }
    })
    .catch(error => {
        console,log('erreur');
    });
});




