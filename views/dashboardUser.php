<?php 
require "../views/includes/head.php";?>

<?php
require ("../src/config/database.php");


?>
<?php
session_start();
if(!isset($_SESSION['firstname'])) {
    header("Location: ../public/index.php");
    exit();
}
try {
    $connect = new Connect();

		$query = "SELECT 
		bg.idGiver AS bloodgiver_id,
		bu.firstname,
		bu.lastname,
		bu.wilaya,
		bu.daira,
		bu.bloodtype,
		bu.registration_date
	FROM bloodgiver bg 
	JOIN blooduser bu ON bg.userId = bu.userId 
	WHERE bg.isAvailable = 1
	ORDER BY bu.registration_date DESC";
      
    $statement = $connect->prepare($query);
    $statement->execute();
    
  
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Gérer les erreurs de connexion à la base de données
    $msgEmail = "Identifiants invalides";
}


?>


<section class="dashboardUser" id="dashboardUser">



		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand">
				<i class='bx bxs-smile'></i>
				<span class="text"> Share Blood</span>
			</a>
			<ul class="side-menu top">
				<li class="active">
					<a href="#profil">
						<i class='bx bxs-dashboard'></i>
						<span class="text">Profil </span>

					</a>
				</li>
				<li>
					<a href="#needBlood">
						<i class='bx bxs-shopping-bag-alt'></i>
						<span class="text">Need for blood</span>
					</a>
				</li>
				<li>
					<a href="#addPublication">
						<i class='bx bxs-doughnut-chart'></i>
						<span class="text"></span>Create a posting
					</a>
				</li>
				<li>
					<a href="#findDonor">
						<i class='bx bxs-message-dots'></i>
						<span class="text">Find donor</span>
					</a>
				</li>

			</ul>
			<ul class="side-menu">
				
</div> 
			</ul>
		</section>
		<!-- SIDEBAR -->



		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<i class='bx bx-menu'></i>
				<a href="#" class="nav-link"></a>
		

				<div class="navbarUser">
					<span>
						<?php echo $_SESSION['firstname']?>
					</span>
					<span>
						<?php echo $_SESSION['lastname']?>
					</span>
					<span>
						<?php echo $_SESSION['email']?>
					</span>
					<div class="exit">
						<li>
							<a href="../src/config/logout.php" title="logout">
								<i class='bx bxs-log-out-circle'></i>
								<span class="text">Log out</span>
							</a>
						</li>
					</div>
				</div>

			</nav>
			<!-- NAVBAR -->

			<!-- MAIN   PROFIL -->
			<main id="profil">
				<div class="head-title">
					<div class="left">
						<h1> <i class='bx bx-chevron-right'></i>Profil</h1>
						<h4>Welcome!
							<?php echo $_SESSION['lastname']; ?> Nice to see you.
						</h4>

					</div>

				</div>

				<ul class="box-info">
					<li>


						<span class="text">
							<h3>Firstname: <span>
									<?php echo $_SESSION['firstname']; ?>
								</span></h3>
							<h3>Lastname: <span>
									<?php echo $_SESSION['lastname']; ?>
								</span></h3>
							<h3>Email: <span>
									<?php echo $_SESSION['email']; ?>
								</span></h3>
							<h3>Blood type:<span>
									<?php echo $_SESSION['bloodtype']; ?>
								</span></h3>
							<h3>Phone Number: <span>
									<?php echo $_SESSION['phone']; ?>
								</span></h3>
							<h3>Wilaya: <span>
									<?php echo $_SESSION['wilaya']; ?>
								</span></h3>
							<h3>Diara: <span>
									<?php echo $_SESSION['daira']; ?>
								</span></h3>
							<h3>Age: <span>
									<?php echo $_SESSION['age']; ?> Ans
								</span></h3>
						</span>
					</li>

				</ul>
			</main>

			<?php
try {
    $connect = new Connect();

    $query = "SELECT 
    p.publicationId,
    bu.bloodtype,
    bu.phone,
    h.name AS hospital_name,
    p.message
   FROM Publication p JOIN blooduser bu ON p.userId = bu.userId JOIN hospitals h ON p.hospitalId = h.id ORDER BY  p.date DESC;";
    
    $statement = $connect->prepare($query);

	if ($statement->execute()) {
        
        $publicationContent = $statement->fetchAll(PDO::FETCH_ASSOC);
      
    }

} catch (PDOException $e) {
    
}

?>

			<!-- MAIN   Publication -->
	
			<main id="needBlood">
				<div class="head">
					<h3>Recent Publication</h3>
				</div>
				<div class="containerPub">
					<?php 
         	$publications=$publicationContent;
				if(isset($publications)) {
            foreach ($publications as $publication) {?>
					<div class="pub">

						<h2> Need Blood </h2>

						<div class="info">
						<div>
						<h3 class="message"><?php echo $publication['message'];?></h3>
						</div>
							<div>

								<span>

									<svg xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
										<path
											d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
									</svg>

									Phone:
									<?php echo $publication['phone'];?>
								</span>
							</div>
							<div>

								<span>
									<svg xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
										<path
											d="M192 512C86 512 0 426 0 320C0 228.8 130.2 57.7 166.6 11.7C172.6 4.2 181.5 0 191.1 0h1.8c9.6 0 18.5 4.2 24.5 11.7C253.8 57.7 384 228.8 384 320c0 106-86 192-192 192zM96 336c0-8.8-7.2-16-16-16s-16 7.2-16 16c0 61.9 50.1 112 112 112c8.8 0 16-7.2 16-16s-7.2-16-16-16c-44.2 0-80-35.8-80-80z" />
									</svg>
									Blood type:
									<?php echo $publication['bloodtype'];?>
								</span>
							</div>
							
							<div>
								<span><svg xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
										<path
											d="M192 48c0-26.5 21.5-48 48-48H400c26.5 0 48 21.5 48 48V512H368V432c0-26.5-21.5-48-48-48s-48 21.5-48 48v80H192V48zM48 96H160V512H48c-26.5 0-48-21.5-48-48V320H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V224H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V144c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v48H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80v64H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80V464c0 26.5-21.5 48-48 48H480V96H592zM312 64c-8.8 0-16 7.2-16 16v24H272c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h24v24c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V152h24c8.8 0 16-7.2 16-16V120c0-8.8-7.2-16-16-16H344V80c0-8.8-7.2-16-16-16H312z" />
									</svg> hopital:
									<?php echo $publication['hospital_name'];?>
								</span>
							</div>
						</div>

					</div>
					<?php }}?>
			</main>

  <!-- MAIN   Publication -->

  
 <!-- MAIN   Publication -->

 <?php
try {
    $connect = new Connect();

    $query = "SELECT * from hospitals;";
    
    $statement = $connect->prepare($query);

	if ($statement->execute()) {
        
        $hospitals = $statement->fetchAll(PDO::FETCH_ASSOC);
      
    }

} catch (PDOException $e) {
    
}

?>
  <main id="addPublication" class="frame">
				<div class="post">

					<h1> Create a post</h1>
					<form id="formHospital">
						<div class="form-hospital">
							<span class="field-hospital">Select where you receive blood donors</span>
							<select class="hospital-field">

								<option disabled selected>Please select hospital</option>
								<?php
                       if(isset($publications)) { 
                       foreach($hospitals as $hospital ) { ?>
								<option value="<?php echo  $hospital['id'] ?>">
									<?php echo  $hospital['name'] ?>
								</option>
								<?php }
                       }?>

							</select>
							<div> <button id="publish-btn" type="submit">Publish</button>
								<div>
									<span class="msgPublish"> Publish succesful</span>
								</div>
					</form>
				</div>

			</main>

			


			
			
					   <!-- Find Donor -->
       <?php
try {
    $connect = new Connect();

		$query = "SELECT 
		bg.idGiver AS bloodgiver_id,
		bu.firstname,
		bu.lastname,
		bu.wilaya,
		bu.daira,
		bu.bloodtype,
		bu.registration_date,
		bu.phone
	FROM bloodgiver bg 
	JOIN blooduser bu ON bg.userId = bu.userId 
	WHERE bg.isAvailable = 1
	ORDER BY bu.registration_date DESC;";
      
    $statement = $connect->prepare($query);
    $statement->execute();
    
  
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $msgEmail = "Identifiants invalides";
}


?>
					   <!-- Find Donor -->
			<main id="findDonor" class="frame">
				<div class="head">
				<h1> find Donor</h1>
				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>Recent Donors</h3>
						</div>
						<table>
							<thead>
								<tr>
									<th>Clients</th>
									<th>Wilaya</th>
									<th>Daira</th>
									<th>Blood type</th>
									<th>Phone</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                   if(isset($users)) {
                    foreach ($users as $user) {?>
								<tr>
									<td>
										<img src="../src/images/donorFind.jpg">
										<p>
											<?php echo $user['firstname'].' '.$user['lastname'];?>
										</p>
									</td>
									<td>
										<?php echo $user['wilaya']; ?>
									</td>
									<td>
										<?php echo $user['daira']; ?>
									</td>
									<td>
										<span class="status pending">
											<?php echo $user['bloodtype']; ?>
										</span>
									</td>
									<td>
										<span class="status completed">
											<?php echo $user['phone']; ?>
										</span>
									</td>
								</tr>
								<?php }}?>

							</tbody>
						</table>
					</div>

				</div>

	  </div>


	  
	

					<!-- </div> -->
</section>







</section>


<script src="../src/js/dashboard.js"></script>
<script src="../src/js/dashboardUser.js"></script>
<script>
	

const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');
console.log(searchButtonIcon);
searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})


	</script>