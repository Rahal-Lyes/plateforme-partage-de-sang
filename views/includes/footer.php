  <!-- FOOTER -->
  <footer class="footer">
            <div class="wrap">
                <div class="footer-container">
                <div class="con-logo">
                <h2 class="logo">
                 <span id="S">S</span>hare
                 <span id="B"><i class="fa-solid fa-droplet"></i>B</span>lood
                
                 <a href="#home"></a>
                   </h2>
                   <p class="passionate">
                   Passionate about bridging healthcare gaps, we connect donors with recipients. Our community fosters empathy and solidarity, uniting those dedicated to impactful change.
                   </p>
            </div>
                </div>
                <!-- <div class="footer-container">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">our stores</a></li>
                        <li><a href="#">Phone</a></li>
                        <li><a href="#">E-mail</a></li>
                        <li></li>
                    </ul>
                </div> -->
                <div class="footer-container">
                    <h3>Get Help</h3>
                    <ul>
                        <li><a href="#">Shopping</a></li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Payment</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li></li>
                    </ul>
                </div>
                <div class="footer-container">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Promotion</a></li>
                        <li><a href="#">Pre-order</a></li>
                        <li></li>
                    </ul>
                </div>
                <div class="footer-container">
                    <h3>Account</h3>
                    <ul>
                        <li><a href="#">Account</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">credit note</a></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </footer>

        <style>

:root {

--rouge: rgb(255, 0, 0);
--blanch: hsl(0, 0%, 100%);
--bleu1: hsl(201, 92%, 47%);
--bleu2: hsl(218, 70%, 18%);
--bleu3: hsl(225, 68%, 53%);

--gris: hsl(0, 0%, 47%);

}
.footer{
    position: relative;
    width: 100%;
    height: auto;
    color: var(--bleu2);
    /* background-color: var(--background-color); */
}
.wrap{
    display: flex;
    flex-wrap: wrap;
}
.footer-container{
    position: relative; 
    width: 20%;
    padding: 50px 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    color: var(--blue2);
}
.logos{
    font-size: 1.7em;
    color: var(--rouge);
    text-shadow:  4px 4px var(--shadow-white);
}
.footer-container h3{
    margin-bottom: 15px;
    font-size: 1.2em;
    font-weight: 600;
    letter-spacing: 2px;
    color: var(--blue1);
}
.footer-container ul li{
    margin: 5px;
}
.footer-container ul li a{
    font-size: 1em;
    color: var(--white);
}
.footer-container ul li a:hover{
    border-bottom: 2px solid var(--white);
    transition: all .3s;
}

.passionate{
    
   width:300px;
height:auto;
}

/* RESPONSIVE */
@media screen and (max-width:950px) {
    .footer-container{
        width: 50%; 
        padding: 30px 10px;
        margin-right:2.5rem;
    }
}
@media screen and (max-width:500px) {
    .footer-container{
        width: 100%; 
        padding: 25px 10px;
    }
}
            </style>