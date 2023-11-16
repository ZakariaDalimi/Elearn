<?php
include('connect.php');
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: login-register/logreg.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="css/read.css">
    <title>Read</title>
</head>

<body>
    <?php
    include 'navbar.php';
    if (isset($_POST['lesson_id'])) {
        $_SESSION['score'] = 0;
        $currentCourse = $_POST['lesson_id'];
        $_SESSION['currentCourse'] =  $currentCourse;
        $sql = "select * from p_lesson join p_language on p_lesson.p_language = p_language.language_id join p_admin on p_lesson.admin = p_admin.admin_id where lesson_id = '$currentCourse'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $pic = $row['pic'];
        $date = strtotime($row["date_ajout"]);
        $svg = '<svg class="me-2" width="20" height="20" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#E5E5E5" d="M9 4h6v2H9zM23 4h6v2h-6z"></path><circle cx="5" cy="5" r="5" fill="#8887FF"></circle><circle fill="#E5E5E5" cx="19" cy="5" r="5"></circle><circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle></svg>';
        if ($row['level'] == 'Intermediate') {
            $svg = '<svg class="me-2" width="20" height="20" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 4h6v2H9z" fill="#8887FF"></path>
                                <path d="M23 4h6v2h-6z" fill="#E5E5E5"></path>
                                <circle cx="5" cy="5" r="5" fill="#8887FF"></circle>
                                <circle cx="19" cy="5" r="5" fill="#8887FF"></circle>
                                <circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle>
                            </svg>';
        } else if ($row['level'] == 'Advanced') {
            $svg = '<svg class="me-2" width="20" height="20" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#8887FF" d="M9 4h6v2H9zM23 4h6v2h-6z"></path><circle cx="5" cy="5" r="5" fill="#8887FF"></circle><circle cx="19" cy="5" r="5" fill="#8887FF"></circle><circle cx="33" cy="5" r="5" fill="#8887FF"></circle></svg>';
        }
    }
    $id = $_SESSION['id_user'];
    $fav = "select * from favs where user = $id and lesson = '$currentCourse'";
    $r = mysqli_query($conn, $fav);
    $saved = false;
    if ($r->num_rows > 0)
        $saved = true;
    ?>
    <div class="container">
        <div class="row heading">
            <p class="minicards fw-bold px-3 py-2"><img src="assets/language.svg" class="me-2" alt=""> <?= $row['nom'] ?></p>
            <div style="border-right: 1px solid lightgray;" class="d-flex justify-content-between py-1">
                <p class="bold courseTitle">Getting started with <?= $row['titre'] ?></p>
            </div>
            <p class="author">By <b><?= $row['admin_firstname'] ?></b> on <b><?= date('d/M/Y', $date); ?></b></p>
        </div>
    </div>
    <div class="bg-secondary mx-5" style="height: 1px;">
    </div>
    <div class="py-5 contentContainer">
        <div class="row">
            <div class="col-md-8 content">
                <div class="pb-3 introduction">
                    <p class="pTitle bold">Introduction</p>
                    <p class="p"><?= $row['introduction'] ?></p>
                </div>
                <?php
                $Query = "select * from image where lesson = '$currentCourse'";
                $result = mysqli_query($conn, $Query);
                while ($r = mysqli_fetch_array($result)) {
                    $content = "";
                    if ($r['content_img'] != null) {
                        $content = $r['content_img'];
                    }
                    echo '<div class="para py-3">
                    <p class="pTitle bold">' . $r['titre_img'] . '</p>
                    <img class="mb-4 mt-2 img-fluid" src="data:image;base64,' . base64_encode($r['img']) . '" alt="">
                    <p class="p">' . $content . '</p>
                </div>';
                } ?>
                <div class="para py-5">
                    <p class="pTitle v bold">Learn by watching</p>
                    <p class="desc">Understand more about this topic by watching a video of our recommendation.</p>
                    <?= $row['iframe'] ?>
                </div>
            </div>
            <div class="col-md-4 sticky-top ps-5">
                <div class="vid sticky-top  py-5">
                    <div class="card">
                        <img class="courseImage" src="data:image;base64,<?= base64_encode($pic) ?>">
                        <div class="card-body">
                            <div class="text-center">
                                <a id="res" class="nav-link navLinks btns mt-1">
                                    <?php if (!$saved) { ?>
                                        <button id="join" class="ss bbtn">
                                            <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="align-middle stroke-current  hover:text-gray-500">
                                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z">
                                                </path>
                                            </svg> Save course</button>
                                    <?php } else { ?>
                                        <button id="join" class="ss btn saved"><i class="text-danger me-1 fa-solid fa-x"></i> unsave</button>
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="cc py-3 px-2">
                                <p class="infos">
                                    <svg class="me-2" width=" 20" height="20" viewBox="0 0 24 24" fill="#5553ff" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.82 4H19C20.1 4 21 4.9 21 6V20C21 21.1 20.1 22 19 22H5C4.86 22 4.73 21.99 4.6 21.97C4.21 21.89 3.86 21.69 3.59 21.42C3.41 21.23 3.26 21.02 3.16 20.78C3.06 20.54 3 20.27 3 20V6C3 5.72 3.06 5.46 3.16 5.23C3.26 4.99 3.41 4.77 3.59 4.59C3.86 4.32 4.21 4.12 4.6 4.04C4.73 4.01 4.86 4 5 4H9.18C9.6 2.84 10.7 2 12 2C13.3 2 14.4 2.84 14.82 4ZM7 10V8H17V10H7ZM17 14V12H7V14H17ZM14 16H7V18H14V16ZM12 3.75C12.41 3.75 12.75 4.09 12.75 4.5C12.75 4.91 12.41 5.25 12 5.25C11.59 5.25 11.25 4.91 11.25 4.5C11.25 4.09 11.59 3.75 12 3.75ZM5 20H19V6H5V20Z" fill="current"></path>
                                    </svg>
                                    <?php
                                    $Q = "select * from p_question where lesson_id = '$currentCourse'";
                                    $res = mysqli_query($conn, $Q);
                                    if ($res->num_rows > 0) {
                                    ?>has
                                <?php } else { ?>
                                    No
                                <?php } ?>
                                Quizzes
                                </p>
                                <p class="infos">
                                    <?= $svg ?>
                                    <?= $row['level'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="courses.php" class="back">
                        <button id="learn" class="bbtn m-0"><svg xmlns="http://www.w3.org/2000/svg" class="me-2 mb-1" width="22" height="22" viewBox="0 0 24 24" fill="#5553ff" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-left">
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>Back to courses
                        </button>
                    </a>
                    <?php
                    if ($res->num_rows > 0) {
                    ?>
                        <a class="back" href="quizz.php?page=1"> <button id="join" class="bbtn">Pass a quizz <img src="assets/arrow.svg" alt=""></button></a>
                    <?php } else { ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <input type="text" value="<?= $id ?>" id="user" style="display: none;">
    <input type="text" value="<?= $currentCourse ?>" id="lesson" style="display: none">
    <?php include 'footer/index.html' ?>

    <script src="js/read.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>