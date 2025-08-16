<!-- START SESSION -->
<?php session_start();?>

<header>
  <navbar>
    <div class="container">
      <div class="con-logo">
        <h2 class="logo">
          <span id="S">S</span>hare
          <span id="B"><i class="fa-solid fa-droplet"></i>B</span>lood
          <a href="#home"></a>
        </h2>
      </div>
      <ul>
        <li class="hideOnMobile">
          <a href="#home">
            <i class="fa fa-home" aria-hidden="true"></i>
            Home
          </a>
        </li>

        <li class="hideOnMobile">
              <a href="#find">
                  <i class="fa fa-search" ></i>
                  Find donor</a
              >
          </li>

          <li class="hideOnMobile">
          <a href="#about">
            <i class="fa fa-exclamation" aria-hidden="true"></i>
            About Us</a
          >
        </li>

        <li class="hideOnMobile">
          <a href="#register">
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            Register</a
          >
        </li>


    <li class="hideOnMobile">
          <a href="#whyDonateBlood">
          <i class="fa-regular fa-comment-dots"></i>
            Donor experiences</a
        
        </li> 
       
        <li class="hideOnMobile">
          <a href="#">
            <i class="fa fa-phone" aria-hidden="true"></i>
            Contact</a
          >
        </li>

        
          <!-- START SESSION -->

        
        
          <button class="btn-cnx btn-cnxPop hideOnMobile" id="btnSignIn">
          <i class="fa-solid fa-user-tie"></i>

        </button>
       
        <li class="sandwitch" onclick="showSideBar()">
          <a href="#"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              height="28"
              viewBox="0 -960 960 960"
              width="28"
            >
              <path
                d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"
              />
            </svg>
          </a>
        </li>

      </ul>
    </div>
  </navbar>
  <navbar>
    <ul class="sidebar">
      <li onclick="hideSideBar()">
        <a href="#"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            height="28"
            viewBox="0 -960 960 960"
            width="28"
          >
            <path
              d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"
            />
          </svg>
        </a>
      </li>

      <li><a href="#">Home</a></li>
      <li><a href="#">Why donate blood?</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">Register</a></li>
      <button class="btn-cnx"><i class="fa-solid fa-user-tie"></i></button>
    </ul>
  </navbar>
</header>
