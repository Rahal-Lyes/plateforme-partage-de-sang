<?php 
session_start();
require "../views/includes/head.php";?>

<?php
require ("../src/config/database.php");


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
					<span class="text">Home</span>

				</a>
			</li>
			<li>
				<a href="#needBlood">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Recent Publications</span>
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
					<i class=' bx bx-file-find'></i>
					<span class="text">Recent Donors</span>
				</a>
			</li>
			<li>
				<a href="#createUser">
					<i class='bx bx-folder-plus'></i>
					
					<span class="text">create user</span>
				</a>
			</li>
			<li>
				<a href="#addHospitals">
					<i class='bx bx-folder-plus'></i>
					
					<span class="text">create Hospitals</span>
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
					<?php echo $_SESSION['username']?>
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
					<h1> <i class='bx bx-chevron-right'></i>Dashboard Panel</h1>



				</div>

			</div>


			<?php
			function countBloodTypes() {
			
				$conn = new Connect();
			
			
				$bloodTypes = ['A-' => 0, 'A+' => 0, 'AB+' => 0, 'AB-' => 0, 'B+' => 0, 'B-' => 0, 'O-' => 0, 'O+' => 0];
			
				
				$sql = "SELECT bu.bloodtype, COUNT(*) AS count
				FROM bloodgiver bg
				JOIN blooduser bu ON bg.userId = bu.userId
				GROUP BY bu.bloodtype;";
				$stmt = $conn->query($sql);
			
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					if (array_key_exists($row['bloodtype'], $bloodTypes)) {
						$bloodTypes[$row['bloodtype']] = $row['count'];
					}
				}
			
				return $bloodTypes;
			}
			
			$bloodTypeCounts = countBloodTypes();
			?>
			<?php
		
			function countGivers() {
			
				$conn = new Connect();
		
				$numberGiver = 0;
			
				$sql = "SELECT COUNT(*) AS numberOfBloodGivers FROM bloodgiver WHERE isAvailable = 1;";
			
				$stmt = $conn->query($sql);
				
			
				if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$numberGiver = $row['numberOfBloodGivers'];
				}
				
				return $numberGiver;
			}
			function countPublication() {
			
				$conn = new Connect();
		
				$numberPub = 0;
			
				$sql = "SELECT COUNT(*) AS numberOfPub FROM Publication;";
			
				$stmt = $conn->query($sql);
				
			
				if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$numberPub = $row['numberOfPub'];
				}
				
				return $numberPub;
			}
			
		$countGivers = countGivers();
		$countPub=countPublication();
			?>



			<ul class="box-info">

				<li>

					<span class="bloodtype">

						<p>
							Total Donors </p>
						<h3>
							<?php echo $countGivers;?>
						</h3>

					</span>
					<i class="fa-solid fa-user-group" style="font-size: 50px;margin-left:3rem;"></i>
				</li>
				<li>

					<span class="bloodtype">

						<p>
							Total Publications </p>
						<h3>
							<?php echo $countPub;?>
						</h3>

					</span>
					<i class="fa-regular fa-newspaper" style="font-size: 50px;margin-left:3rem;"></i>
				</li>

			</ul>

			<ul class="box-info">
				<?php foreach ($bloodTypeCounts as $bloodType => $count): ?>
				<li>
					<i class='bx bxs-droplet'></i>
					<span class="bloodtype">

						<p>
							<?php echo $bloodType; ?>
						</p>
						<h3>
							<?php echo $count; ?>
						</h3>
					</span>
				</li>
				<?php endforeach; ?>
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
				<h3>Recent Publication </h3>
			</div>
			<div class="containerPub">
				<?php 
         	$publications=$publicationContent;
				if(isset($publications)) {
            foreach ($publications as $publication) {?>
				<div class="pub" value="<?php echo htmlspecialchars($publication['publicationId']); ?>">

					<h2> Need Blood </h2>

					<div class="info">
						<div>
							<h3 class="message">
								<?php echo $publication['message'];?>
							</h3>
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
						<button class="delete">Delete</button>

					</div>

				</div>
				<?php }}?>
		</main>

		<!-- MAIN   Publication -->


		<!-- MAIN   Publication -->

		<?php
try {
    $connect = new Connect();

    $query = "SELECT * from hospitals;
	";
    
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
				<form id="formHospitalAdmin">
					<div class="form-hospital">
						<span class="field-hospital">Select where blood donations are needed:</span>
						<select class="hospital-field" id="bloodNeed">
							<option disabled selected>Please select an option</option>
							<option value="Medical emergencies">Medical emergencies</option>
							<option value="Seasonal shortages">Seasonal shortages</option>
							<option value="Chronic illnesses">Chronic illnesses</option>
						</select>

						<div class="input-box">
							<span class="details">Blood Group</span>
							<select class="details" id="bloodTypeAdmin" name="blood_group" required>
								<option value="" disabled selected>Select Blood Group</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
							</select>
							<small class="small"> Error</small>
						</div>

						<span class="field-hospital">Select where you receive blood donors</span>
						<select class="hospital-field" id="hospitalSelect">
							<option disabled selected>Please select hospital</option>
							<?php if(isset($hospitals)) { 
                foreach($hospitals as $hospital ) { ?>
							<option value="<?php echo  $hospital['id'] ?>">
								<?php echo  $hospital['name'] ?>
							</option>
							<?php } } ?>
						</select>

						<div class="input-box">
							<span class="details">Phone</span>
							<input type="text" id='phoneAdmin' name="phone" placeholder="213799443322">
							<small class="small"> Error</small>
						</div>

						<div>
							<button id="publish-btn" type="submit">Publish</button>
							<div>
								<span class="msgPublish"> Publish successful</span>
							</div>
						</div>
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
								<tr value="<?php echo $user['bloodgiver_id'];?>">
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
									<td>
										<button class="status user-delete">Delete</button>
									</td>
								</tr>
								<?php }}?>

							</tbody>
						</table>
					</div>

				</div>

			</div>


					</main>


<main id="createUser" class="frame">
    <div class="post">
        <h1>Create a User</h1>
        <form id="addUser">
            <div class="form-hospital">
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" id="usernameAdmin" name="usernameAdmin" placeholder="username">
                    <small class="small">Error</small>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" id="passwordAdmin" name="passwordAdmin" placeholder="password">
                    <small class="small">Error</small>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" id="passwordAdminconfirme" name="passwordAdminconfirme" placeholder="confirm password">
                    <small class="small">Error</small>
                </div>
                <div>
                    <button id="publish-btn" type="submit">Add</button>
                    <div>
                        <span class="msgPublish" style="display: none;">Publish successful</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>


<!--create a hospitals -->

<!-- Find Donor -->
<main id="addHospitals" class="frame">
			<div class="head">
			
				<div class="post">
        <h1>Create a hospitals</h1>
        <form id="addHospital">
            <div class="form-hospital">
                <div class="input-box">
                    <span class="details">Hospitals Name</span>
                    <input type="text" id="hospitalName" name="hospitalName"  placeholder="Hospital Name">
            
                </div>
				<div class="input-box">
                    <span class="details">Hospitals Location</span>
                    <input type="text" id="hospitalLocation" name="hospitalLocation"  placeholder="Hospital Location">
            
                </div>
                
                <div>
                    <button id="publish-btn" type="submit">Add</button>
                    <div>
                        <span class="msgPublish" style="display: none;">Publish successful</span>
                    </div>
                </div>
            </div>
        </form>
    </div>

			</div>


</main>


	</section>







</section>


<script src="../src/js/admin.js"></script>
<script src="../src/js/dashboardUser.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', (event) => {
		const btnDeleteList = document.querySelectorAll('.containerPub .pub .delete');

		btnDeleteList.forEach(btnDelete => {
			btnDelete.addEventListener("click", () => {
				const pubDiv = btnDelete.closest('.pub');
				const publicationId = parseInt(pubDiv.getAttribute('value'));

				fetch('../src/config/adminPanel.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({ type: 'deletePublication', publicationId: publicationId })
				}).then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok ' + response.statusText);
					}
					return response.json();
				}).then(data => {
					if (data.success == 1) {
						alert('Delete Publication Successful!');
						location.reload();
					}
				}).catch(error => {
					console.error('There has been a problem with your fetch operation:', error);
				});
			});
		});

		let userDeleteButtons = document.querySelectorAll('.user-delete');

		userDeleteButtons.forEach(function (button) {
			button.addEventListener('click', function () {
				const tableRow = button.closest('tr');
				const userId = tableRow.getAttribute('value');

				fetch('../src/config/adminPanel.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({ type: 'deleteUser', userId: userId })
				}).then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok ' + response.statusText);
					}
					return response.json();
				}).then(data => {
					if (data.success == 1) {
						alert('Delete User Successful!');
						location.reload();
					}
				}).catch(error => {
					console.error('There has been a problem with your fetch operation:', error);
				});
			});
		});
	});




	/* publication*/
	document.getElementById('formHospitalAdmin').addEventListener('submit', function (event) {
		event.preventDefault();

		const bloodNeed = document.getElementById('bloodNeed').value;
		const bloodType = document.getElementById('bloodTypeAdmin').value;
		const hospitalSelect = document.getElementById('hospitalSelect').value;
		const phone = document.getElementById('phoneAdmin').value;

		const publicationData = {
			bloodNeed: bloodNeed,
			bloodType: bloodType,
			hospital: hospitalSelect,
			phone: phone
		};
		console.log(publicationData);

		fetch('../src/config/adminPanel.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({ type: 'addPublication', publicationData: publicationData })
		}).then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok ' + response.statusText);
			}
			return response.json();
		}).then(data => {
			if (data.success == 1) {
				alert('Publication added successfully!');
				location.reload();
			} else {
				alert('Failed to add publication.');
			}
		}).catch(error => {
			console.error('There has been a problem with your fetch operation:', error);
		});



	});


// create user 
document.getElementById('addUser').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const username = document.getElementById('usernameAdmin').value;
    const password = document.getElementById('passwordAdmin').value;
    const passwordConfirm = document.getElementById('passwordAdminconfirme').value;

   


    if (password !== passwordConfirm) {
       
     alert('Passwords do not match');
      
    }

   
    const userData = {
        username: username,
        password: password
    };
console.log(userData);
    
    fetch('../src/config/adminPanel.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ type: 'createUser', userData: userData })
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    }).then(data => {
        if (data.success == 1) {
        alert("user Added Succesfully");
        } else {
            alert('Failed to create user.');
        }
    }).catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
});



//Hospitals 

document.getElementById('addHospital').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const hospitalName = document.getElementById('hospitalName').value;
    const hospitalLocation = document.getElementById('hospitalLocation').value;

    const hospitalData = {
        hospitalName:hospitalName + " " + hospitalLocation
    };
	console.log(hospitalData);

    fetch('../src/config/adminPanel.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ type: 'addHospital', hospitalData: hospitalData })
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    }).then(data => {
        if (data.success == 1) {
            alert("Hospital added successfully");
        } else {
            alert('Failed to add hospital.');
        }
    }).catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
});


//toogle
	const menuBar = document.querySelector('#content nav .bx.bx-menu');
	const sidebar = document.getElementById('sidebar');

	menuBar.addEventListener('click', function () {
		sidebar.classList.toggle('hide');
	})



	if (window.innerWidth < 768) {
		sidebar.classList.add('hide');
	} else if (window.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}


	window.addEventListener('resize', function () {
		if (this.innerWidth > 576) {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
			searchForm.classList.remove('show');
		}
	})




</script>