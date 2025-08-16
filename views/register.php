<section class="register" id="register">
    <div class="container-bg">
        <div class="register-image">
        <div class="registre-img">
        </div>
            <div class="registre-p">
            <h3>Join Us: Be a Lifesaver Today!</h3>
                <p>   Join our blood donation platform to save lives together. Your simple act of generosity can
                    bring hope and solidarity to those in need. Be part of something bigger by signing up today.</p>


            </div>
        </div>
        <div class="container-register">
        <span class="registre-signin">Signin</span>
            
            <form method="POST" id="contactForm">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details error">First Name<span style="color:red;"> *</span></span>
                        <input type="text" id="firstName" name="firstName" placeholder="Enter your first Name" />

                        <small class="small">Error</small>
                    </div>

                    <div class="input-box">
                        <span class="details">Last Name<span style="color:red;"> *</span> </span>
                        <input type="text" id="lastName" name="lastName" placeholder="Enter your last Name" />

                        <small class="small"> Error</small>
                    </div>

                    <div class="input-box">
                        <span class="details">Email<span style="color:red;"> *</span></span>
                        <input type="email" id="email" name="email" placeholder="lyes@mail.com" />

                        <small class="small"> Message D'erreur</small>
                    </div>

                    <div class="input-box">
                        <span class="details">Age<span style="color:red;"> *</span></span>
                        <input type="number" id='age' name="age" placeholder="Ex:25">

                        <small class="small"> Error</small>
                    </div>


                    <div class="input-box">
                        <span class="details">Blood Group<span style="color:red;"> *</span></span>
                        <select class="details"  id=" bloodType" name="blood_group" require>
                        <option value="" disabled selected>Select Blood Group</option>
                    </select>
                    <small class="small"> Error</small>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone<span style="color:red;"> *</span></span>
                        <input type="text" id='phone' name="phone" placeholder="213799443322">
                        <small class="small"> Error</small>
                    </div>
                   
                    <div class="location input-box"> 
                        <span class="details">Wilaya<span style="color:red;"> *</span></span>
                         <select name="wilaya" class="wilaya">
                            <option disabled="" selected=""> please select your location</option>
                          </select>
                        <small class="small"> Error</small>
                    </div>
                    <div class="input-box location">
                        <span class="details">Daira<span style="color:red;"> *</span></span>
                         <select name="daira" class="daira">
                          </select>
                        <small class="small"> Error</small>
                    </div>
                   
                   

                    <div class="input-box">
                        <span class="details">Password<span style="color:red;"> *</span></span>
                        <input type="password" id="password" name="password" placeholder="">
                         <small class="small"> Error</small>
                    </div>
                    <div class="input-box">
                        <span class="details"> Confirme Password<span style="color:red;"> *</span></span>
                        <input type="password" id="confirmePassword" name="confirmePassword" placeholder="" />

                        <small class="small"> Error</small>
                    </div>
                    
                </div class="btn-register">
                    <button id="submit-btn" type="submit">
                    <span><i class="fas fa-user-plus"></i></span>
                    Register
                    </button>

                <div class="already-reg btn-cnxPop">
                    <a href="#" >Already Registered?</a>

                </div>
                <div id="response">
                   
                  
                </div>
            </form>
         
        </div>
    </div>
   
</section>