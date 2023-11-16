<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="css/contact.css" />
	<link rel="stylesheet" href="css/index.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<link rel="stylesheet" href="src/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<script src="src/bootstrap.bundle.min.js"></script>
	<script src="src/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Contact us</title>
</head>

<body>
	<?php include 'navbar.php' ?>
	<div class="row text-center">
		<p class="contact bold">Contact Us <img src="assets/contact.svg" alt=""></p>
	</div>
	<div class="main">
		<div class="container">
			<div class="content">
				<div class="left-side">
					<div class="address details">
						<i class="fas fa-map-marker-alt"></i>
						<div class="topic">Address</div>
						<div class="text-one">Sidi Moumen CASA</div>
					</div>
					<div class="phone details">
						<i class="fas fa-phone-alt"></i>
						<div class="topic">Phone</div>
						<div class="text-one">+212 614 254 251</div>
					</div>
					<div class="email details">
						<i class="fas fa-envelope"></i>
						<div class="topic">Email</div>
						<div class="text-one">Etreasure@gmail.com</div>
					</div>
				</div>
				<div class="right-side">
					<form id="contact-form" action="#">
						<div class="input-box">
							<input type="text" name="fullname" id="fullname" placeholder="Enter your full name" />
						</div>
						<div class="input-box">
							<input type="text" name="email" id="email" placeholder="Enter your email" />
						</div>
						<div class="input-box message-box">
							<textarea name="msg" id="msg" placeholder="Enter your message"></textarea>
						</div>
						<div id="error" class="text-danger mb-2"></div>
						<div class="button">
							<input type="submit" id="submit" value="Send Now" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer/index.html' ?>


	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$('#submit').click(function(e) {
			e.preventDefault();
			var fullname = $('#fullname').val();
			var email = $('input[name="email"]').val();
			var msg = $('#msg').val();
			if ((fullname != "" && (/^[a-z]+(\s)[a-z]+$/i).test(fullname)) && (email != "" && (/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/i).test(email)) && (msg != "")) {
				$.ajax({
					url: 'mailing.php',
					type: 'POST',
					data: {
						fullname: fullname,
						email: email,
						msg: msg
					},
					success: function(res) {
						if (res == "yes") {
							$('#error').html("");
							$('#contact-form')[0].reset();
							Swal.fire(
								'Message sent !',
								'We will respond as soon as possible',
								'success'
							)
						} else {
							Swal.fire(
								'Message not sent !',
								'Please try again later',
								'error'
							)
						}

					}
				});
			} else {
				$('#error').html('<i class="fa-solid fa-circle-exclamation px-2"></i>Error ! please enter valid informations ');
			}
		});
	</script>
</body>

</html>