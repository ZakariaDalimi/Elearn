<?php
include('connect.php');
session_start();
$user = $_SESSION['id_user'];
$Query = "select * from favs join p_lesson on p_lesson.lesson_id = favs.lesson join p_language on p_language.language_id = p_lesson.p_language join p_categorie on p_categorie.categorie_id = p_language.categorie where user = '$user'";



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="src/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<script src="src/bootstrap.bundle.min.js"></script>
	<!-- Jquery -->
	<script src="src/jquery-3.6.0.min.js"></script>

	<!-- Text Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700&family=Poppins:wght@100;400;500;700&family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,500;8..144,700&display=swap" rel="stylesheet">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/myfav.css">
	<title>My courses</title>
</head>

<body>
	<?php include 'navbar.php' ?>

	<div class="mainContent">
		<div class="title-row bg-light">
			<div class="title-area">
				<p class="text-center bold">My courses</p>
				<p class="card-title text-center">Here you can see all your favourite courses.</p>
			</div>
		</div>
		<div class="smallerContent">
			<div style="padding-top: 2.2rem;" class="pb-2 px-0 container">
				<h2 class="bold secondary d-flex align-items-center " style="font-size: 1.25rem; letter-spacing: .025em;">
					<span class="cr d-flex justify-content-center align-items-center p-2 bg-light text-center me-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark">
							<path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
						</svg>
					</span>Saved courses
				</h2>
			</div>
			<div class="container pb-5 courses">
				<?php
				$result = mysqli_query($conn, $Query);
				while ($row = mysqli_fetch_array($result)) {
					$svg = '<svg class="me-2" width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#E5E5E5" d="M9 4h6v2H9zM23 4h6v2h-6z"></path><circle cx="5" cy="5" r="5" fill="#8887FF"></circle><circle fill="#E5E5E5" cx="19" cy="5" r="5"></circle><circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle></svg>';
					if ($row['level'] == 'Intermediate') {
						$svg = '<svg class="me-2" width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 4h6v2H9z" fill="#8887FF"></path>
                            <path d="M23 4h6v2h-6z" fill="#E5E5E5"></path>
                            <circle cx="5" cy="5" r="5" fill="#8887FF"></circle>
                            <circle cx="19" cy="5" r="5" fill="#8887FF"></circle>
                            <circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle>
                        </svg>';
					} else if ($row['level'] == 'Advanced') {
						$svg = '<svg class="me-2" width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#8887FF" d="M9 4h6v2H9zM23 4h6v2h-6z"></path><circle cx="5" cy="5" r="5" fill="#8887FF"></circle><circle cx="19" cy="5" r="5" fill="#8887FF"></circle><circle cx="33" cy="5" r="5" fill="#8887FF"></circle></svg>';
					}
					echo '				<div class="course">
					<div class="course-preview bg-light">
						<h6>Course</h6>
						<h2>' . $row['nom'] . ' Fundamentals</h2>
					</div>
					<div class="course-info">
						<div class="progress-container">
							<span class="progress-text">
								_______
							</span>
						</div>
						<h6>' . $row['Cnom'] . '</h6>
						<h2>' . $row['titre'] . '</h2>
						<div class="level">
							<span>
								<svg class="me-2" width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9 4h6v2H9z" fill="#8887FF"></path>
									<path d="M23 4h6v2h-6z" fill="#E5E5E5"></path>
									<circle cx="5" cy="5" r="5" fill="#8887FF"></circle>
									<circle cx="19" cy="5" r="5" fill="#8887FF"></circle>
									<circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle>
								</svg>
								' . $row['level'] . '
							</span>
						</div>
						<div class="buttons d-flex justify-content-between align-items-end">
						<a href="javascript:deleteB(' . $row['lesson_id'] . ');">
						<button  class="noselect ">
						<span class="text">Remove</span
						><span class="icon"
							><svg
								xmlns="http://www.w3.org/2000/svg"
								width="24"
								height="24"
								viewBox="0 0 24 24"
							>
								<path
									d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"
								/>
							</svg>
						</span>
					</button>
					</a>
					<form method="post" action="read.php"> 
					<input type="text" value= "' . $row['lesson_id'] . '"name="lesson_id" style="display: none;">
						<a href="" class=""><button id="learn" class="bbtn mt-2 mx-2">Continue <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right dark:text-primary-lightP1 text-primary h-6">
									<g color="#5553ff">
										<line x1="5" y1="12" x2="19" y2="12" />
										<polyline points="12 5 19 12 12 19" />
									</g>
								</svg>
							</button>
						</a>
						</form>
					</div>
					</div>
				</div>';
				} ?>

			</div>
		</div>

	</div>
	</div>
	<?php include 'footer/index.html' ?>
	<!--  ======================== End About Me Area ==============================  -->
	<script>
		function deleteB(id) {
			$.ajax({
				type: "POST",
				url: "delete.php",
				data: {
					id: id
				},
				success: function(res) {
					$('.courses').html(res);
				}
			});
		};
	</script>
</body>

</html>