<!DOCTYPE html>
<html lang="en">
  <?php 
  require "../views/includes/head.php"?>
  <body>
    <?php include '../src/config/database.php';?>
    <div id="preloader"></div> 
    <navbar>
      <?php include '../views/includes/header.php';?> 
    </navbar>

    <main>

      <?php include '../views/home.php';?> 
     <?php include '../views/find.php'?>
     <?php include '../views/findContainer.php'?>
      <?php include '../views/about.php';?>
      <?php include '../views/register.php';?> 
     <?php include '../views/WhyDonateblood.php';?>
      <?php include '../views/login-popup.php';?>
     <?php include '../views/includes/footer.php';?>
    </main>




    
    <script src="../src/js/registre.js"></script>
    <script src="../src/js/find.js"></script>
    <script src="../src/js/findContent.js"></script>

    <script src="../src/js/dashboard.js"></script>
  
    <script src="../src/js/modules/jquery-3.7.1.js"></script>

  
    <script src="../src/js/animation.js"></script>
    <script src="../src/js/modules/all.js"></script>
 
    <script src="../src/js/auth/loginPopup.js"></script> 
    <script src="../src/js/selected.js"></script>

  
  </body>
  
</html>
