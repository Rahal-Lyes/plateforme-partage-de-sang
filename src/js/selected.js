      

$(".wilaya").on("change", function () {
    const selectedWilayaCode = $(this).val();
  
    $.get("../src/js/algeria_cities.json", function (data) {
      const communesInWilaya = data.filter(
        (commune) => commune.wilaya_code === selectedWilayaCode
      );
  
      $(".daira").empty();
    
      communesInWilaya.forEach((commune) => {
        $(".daira").append(
          `<option value="${commune.commune_name_ascii}">${commune.commune_name_ascii}</option>`
        );
      });
    });
  });
  
  let dairaVal;
  $(".daira").on("change", function () {
    dairaVal = $(this).val();
  });
  
  //  FIN   HTTP REQUEST POUR LES WILAYA ALGERIE
  
  const bloodGroups = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];
  
  const bloodGroupRegister = document.querySelector('select[name="blood_group"]');
  
  bloodGroups.forEach((group) => {
    const option = document.createElement("option");
    option.textContent = group;
    option.value = group;
    bloodGroupRegister.appendChild(option);
  });
  
  function wilayaName(wilayaID, wilayaObj) {
    for (const e of wilayaObj) {
      if (e.id === wilayaID) {
        return e.name;
      }
    }
  }