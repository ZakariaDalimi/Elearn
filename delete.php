<?php
include 'connect.php';
session_start();

if (isset($_POST['id'])) {
    $user = $_SESSION['id_user'];
    $id = $_POST['id'];
    $delete = "delete from favs where user = '$user' and lesson = '$id'";
    mysqli_query($conn, $delete);

    $Query = "select * from favs join p_lesson on p_lesson.lesson_id = favs.lesson join p_language on p_language.language_id = p_lesson.p_language join p_categorie on p_categorie.categorie_id = p_language.categorie where user = '$user'";
    $result = mysqli_query($conn, $Query);
    $r = '';
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
        $r .= '<div class="course">
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
    }
    echo $r;
}
