<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['loggedIn'])) {
	header("Location: login-register/logreg.php");
	exit();
}

$id = $_SESSION['id_user'];
$sql = "select * from p_user where user_id = '$id'";
$r = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($r);

$tel = '';
$birthday = '';
$female = '';

if ($row['tel'] !== NULL) {
	$tel = $row['tel'];
}
if ($row['birthday'] !== NULL) {
	$birthday = $row['birthday'];
}
if ($row['sexe'] == 'f') {
	$female = 'selected';
}

if ($_POST) {
	$gender = $_POST['gender'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$birth = $_POST['birth'];
	$mdp = $_POST['mdp'];

	if ($email != $_SESSION['email']) {
		$find = "select * from p_user where user_email = '$email'";
		$result = mysqli_query($conn, $find);
		if ($result->num_rows == 1)
			exit('Email already used');
	}
	$sql = "update p_user set sexe = '$gender', user_FirstName = '$fname', user_LastName = '$lname', user_email = '$email', tel = '$tel', birthday = '$birth', user_motDePasse = '$mdp' where user_id = '$id'";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['password'] = $mdp;
		exit('changed');
	} else
		exit("not changed");
}

?>
<!DOCTYPE html>

<head>
	<link rel="stylesheet" href="css/account.css" />
	<link rel="stylesheet" href="css/index.css" />
	<script src="src/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700&family=Poppins:wght@100;400;500;700&family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,500;8..144,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="src/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<script src="src/bootstrap.bundle.min.js"></script>
	<title>Account settings</title>
</head>

<body>
	<?php include 'navbar.php' ?>
	<div class="container text-center titleacc">
		<p class="bold">Account details</p>
		<p class="card-title text-center">Here you can edit all your personnal informations and also add extra ones.</p>
	</div>
	<div class="infos">
		<div class="container">
			<form method="post" action="#">
				<div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group a">
								<label for="gender">Gender <span class="text-danger"> *</span></label>
								<select name="gender" id="gender">
									<option value="m">Mr.</option>
									<option <?= $female ?> value="f">Mme</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group a">
								<label for="name">First name <span class="text-danger"> *</span></label>
								<input value="<?= $row['user_FirstName'] ?>" name="fname" id="fname" type="text">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group b">
								<label for="first-name">Last name <span class="text-danger"> *</span></label>
								<input value="<?= $row['user_LastName'] ?>" name="lname" id="lname" type="text">
							</div>
						</div>
					</div>

					<div class="form-group email-group">
						<label for="email">Email</label>
						<input value="<?= $row['user_email'] ?>" name="email" id="email" type="text">
						<p id="erroremail" style="font-size: 14px !important;" class="mt-1 text-danger ms-2"></p>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group phone-group">
								<label for="phone">Téléphone (optional)</label>
								<input value="<?= $tel ?>" name="tel" id="tel" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group phone-group">
								<label for="date">Birthday (optional)</label>
								<input value="<?= $birthday ?>" name="birth" id="birth" type="date">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="Oldmdp">Old password <span class="text-danger"> *</span></label>
						<input id="oldmdp" name="oldmdp" type="password">
						<p id="errorold" style="font-size: 14px !important;" class="mt-1 text-danger ms-2"></p>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="mdp">New password <span class="text-danger"> *</span></label>
								<input id="mdp" name="mdp" type="password">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="mdpC">Confirm password <span class="text-danger"> *</span></label>
								<input id="mdpC" name="mdpC" type="password">
								<p id="errorconfirm" class="mt-1 text-danger ms-2" style="font-size: 14px !important;"></p>
							</div>
						</div>
						<input type="text" name="oldpass" id="oldpass" value="<?= $_SESSION['password'] ?>" style="display: none;" />
					</div>
					<p id="errorform" style="font-size: 14px !important;" class="mt-1 text-danger ms-2"></p>


					<a href="" class="float-end mt-2 nav-link navLinks btns"><button type="submit" name="submit" id="join" class="bbtn">Save changes <img src="assets/arrow.svg" alt=""></button></a>
			</form>
		</div>
	</div>
	</div>
	<?php include 'footer/index.html' ?>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$(document).ready(function() {
			$('#join').click(function(e) {
				e.preventDefault();
				var gender = $('#gender').val();
				var fname = $('#fname').val();
				var lname = $('#lname').val();
				var email = $('#email').val();
				var tel = $('#tel').val();
				var birth = $('#birth').val();
				var oldmdp = $('#oldmdp').val();
				var mdp = $('#mdp').val();
				var mdpC = $('#mdpC').val();
				var currentpass = $('#oldpass').val();

				if (gender != "" && fname != "" && lname != "" && email != "" && oldmdp != "" && mdp != "" && mdpC != "") {
					if (oldmdp != currentpass) {
						$('#errorold').html('<i class="fa-solid fa-circle-exclamation me-2"></i>Password incorrect !');
					} else {
						$('#errorold').html('');
						if (mdp != mdpC)
							$('#errorconfirm').html('<i class="fa-solid fa-circle-exclamation me-2"></i>Passwords are not matching !');
						else {
							$('#errorconfirm').html('');
							$.ajax({
								type: "POST",
								url: "account.php",
								data: {
									gender: gender,
									fname: fname,
									lname: lname,
									email: email,
									tel: tel,
									birth: birth,
									mdp: mdp
								},
								success: function(response) {
									if (response == 'changed') {
										Swal.fire({
											icon: 'success',
											title: 'Profile updated successfully !',
											showConfirmButton: false,
											timer: 1500
										}).then(function() {
											window.location.reload();
										})
										$('input').each(function() {
											$(this).val('');
										});
									} else if (response == 'Email already used') {
										$('#erroremail').html('<i class="fa-solid fa-circle-exclamation me-2"></i>Email already used ! !')
									} else {
										Swal.fire({
											icon: 'error',
											title: 'Failed !',
											html: 'Error occurred while updating your please try again !',
											showConfirmButton: false
										})
									}
								}
							});
						}
					}
				} else {
					$('#errorform').html('<i class="fa-solid fa-circle-exclamation me-2"></i>Please fill all fields !')
				}
			});
		});
	</script>
</body>