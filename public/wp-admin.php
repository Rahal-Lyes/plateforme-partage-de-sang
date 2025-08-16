<style>
    @font-face {
    font-family: 'GD Sherpa';
  
}

@font-face {
    font-family: 'GD-Sage';
  
}

* {
    font-family: "GD Sherpa", "Helvetica", sans-serif;
}

*::selection {
    background: #a6fff8;
}

body {
    padding: 20px 50px
}

input {
    background-color: transparent;
    padding: 13px 14px;
    border: none;
    font-size: 16px;
    height: 100%;
    width: 100%;
}

input:focus {
    border: none;
    outline: none;
}

form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.btn {
    background-color: black;
    color: white;
    cursor: pointer;
    border: none;
    outline: none;
    margin-top: 30px;
    transition: 0.1s ease-in;
    text-shadow: 1px 0 0 white;
}

.btn:hover:enabled {
    opacity: 0.7;
    transition: 0.1s ease-in;
}

.input-container {
    background-color: white;
    border: 1px solid rgb(223, 223, 223);
    font-size: 16px;
    width: 360px;
    margin-bottom: 19px;
    transition: 0.2s ease-in;
}

.input-container:focus-within {
    border: 1px solid black;
    box-shadow: 0px 1px 0px black;
    outline: none;
    transition: 0.2s ease-in;
}

.password-hidden,
a {
    vertical-align: top;
    color: #00a4a6;
    text-shadow: none;
    text-decoration: underline;
    cursor: pointer;
}

label {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    font-style: bold;
    text-shadow: 1px 0 0 black;
    margin-bottom: 6px;
    width: 100%;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "GD-Sage", "Times New Roman", serif;
    font-size: bigger;
}

</style>
</style>
<body>
    <a href="../public/index.php" title="Home page">
        <img style="height: 60px; width: auto" src="../src/images/logoAdmin.jpg" />
    </a>
    <div class="admin">
        <form id="adminForm">
            <h1>Admin Panel</h1>
            <label style="width: 100%; text-align: left" ">Username</label>
            <div class="input-container">
                <input id="username" type="text" name="username"/>
            </div>
            <label style="width: 100%; text-align: left" for="password">Password
                <span class="password-hidden" onclick="hidePassword(event)">Show</span>
            </label>
            <div class="input-container">
                <input id="password" type="password" name="password"/>
            </div>
            <p> Remplir les champe</p>
            <input id="bn" type="submit" class="btn" value="Sign in" />
        </form>
    </div>
</body>


<script src="../src/js/admin.js"></script>
<script>
    
    const adminForm = document.getElementById('adminForm');

adminForm.addEventListener('submit', function(e){
    e.preventDefault();
   
    const admin=new FormData(this);
   

  let xhr=new XMLHttpRequest();
  xhr.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
        const res=this.response;
        console.log(res);
        if(res.success==1){
            window.location.href = "../views/adminPanel.php";
        }
    }else if(this.readyState==4){
        
    }
  };
  xhr.open("POST","../src/config/loginAdmin.php",true);
//   xhr.setRequestHeader("Content-Type", "application/json");
  xhr.responseType="json";
  xhr.send(admin);

  
});


    </script>
