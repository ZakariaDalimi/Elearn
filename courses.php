<?php
include('connect.php');
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 9;
$start = ($page - 1) * $limit;

$res = $conn->query("select count(*) as id from p_lesson");
$count = $res->fetch_all(MYSQLI_ASSOC);
$totalCount = $count[0]['id'];
$numPages = ceil($totalCount / $limit);

$next = $page + 1;
$prev = $page - 1;
$Query = "select * from p_lesson join p_language where p_lesson.p_language = p_language.language_id LIMIT $start, $limit";



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
    <link rel="stylesheet" href="css/courses.css">
    <title>Projet</title>
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="mainContent">
        <div class="title-row">
            <div class="title-area">
                <p class="text-center mb-1"><i class="fa-solid fa-bars me-2"></i> Courses</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-4 px-0 text-center">
                        <p id="all" class="categories text-secondary active"><i class="fa-solid fa-globe me-3"></i>Browse all</p>
                    </div>
                    <div class="col-4 px-0 text-center">
                        <p id="2" class="categories categorie item text-secondary"><i class="fa-solid fa-code me-3"></i>Front end development</p>
                    </div>
                    <div class="col-4 px-0 text-center">
                        <p id="1" class="categories categorie item text-secondary"><i class="fa-solid fa-gear me-3"></i>Back end development</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="smallerContent">
            <div class="container srchbar w-100 d-flex">
                <input type="search" name="search" class="text-dark border w-100" id="search" placeholder="Search courses...">
                <button id="start" style="white-space: nowrap; padding: 14px 19.2px !important;" class="bbtn normalButtons"><img src="assets/search.svg" alt="" class="me-2">Search</button>
            </div>
            <div class="d-flex p-0 container">
                <div id="HTML" class="lang me-4 language item bg-lang border border-2 text-center"><b class="me-3 x d-none text-danger">X</b>HTML</div>
                <div id="CSS" class="lang me-4 language item bg-lang border border-2 text-center"><b class="me-3 x d-none text-danger">X</b>CSS</div>
                <div id="JavaScript" class="lang me-4 language item bg-lang border border-2 text-center"><b class="me-3 x d-none text-danger">X</b>JavaScript</div>
                <div id="PHP" class="lang me-4 language item bg-lang border border-2 text-center"><b class="me-3 x d-none text-danger">X</b>PHP</div>
                <div id="SQL" class="lang me-4 language item bg-lang border border-2 text-center"><b class="me-3 x d-none text-danger">X</b>MySQL</div>
                <div id="clear" class="clear lang bg-lang border border-2 text-center px-3 ms-auto">X</div>
            </div>

            <div style="padding-top: 2.2rem;" class="pb-2 px-0 container">
                <h2 class="bold secondary" style="font-size: 1.25rem; letter-spacing: .025em;">
                    <span class="cr me-2">
                        <svg class="bg-light" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1486 13.7612H31.6977C32.7581 13.7612 33.6177 14.6208 33.6177 15.6812C33.6177 15.8546 33.5942 16.0273 33.5478 16.1944L28.9117 32.907C28.6282 33.9288 27.5701 34.5273 26.5483 34.2439C26.4608 34.2196 26.3752 34.1892 26.292 34.1528L14.5611 29.0205C13.6535 28.6234 13.197 27.6011 13.5072 26.6603L17.3252 15.08C17.5847 14.2929 18.3199 13.7612 19.1486 13.7612Z" stroke="current" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M18.24 22.08L28.8 24" stroke="current" stroke-width="1.6" stroke-linecap="square"></path>
                            <path d="M17.28 24.0001L27.84 25.9201" stroke="current" stroke-width="1.6" stroke-linecap="square">
                            </path>
                            <path d="M16.3199 25.92L26.8799 27.84" stroke="current" stroke-width="1.6" stroke-linecap="square">
                            </path>
                            <path d="M20.6399 18.7201C21.1701 18.7201 21.5999 18.2903 21.5999 17.7601C21.5999 17.2299 21.1701 16.8001 20.6399 16.8001C20.1097 16.8001 19.6799 17.2299 19.6799 17.7601C19.6799 18.2903 20.1097 18.7201 20.6399 18.7201Z" stroke="current" stroke-width="1.6">
                            </path>
                        </svg>
                    </span>All courses
                </h2>
            </div>
            <div class="container courses">
                <div class="row" id="result">
                    <?php
                    $result = mysqli_query($conn, $Query);
                    while ($row = mysqli_fetch_array($result)) {
                        $svg = '<svg width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#E5E5E5" d="M9 4h6v2H9zM23 4h6v2h-6z"></path><circle cx="5" cy="5" r="5" fill="#8887FF"></circle><circle fill="#E5E5E5" cx="19" cy="5" r="5"></circle><circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle></svg>';
                        if ($row['level'] == 'Intermediate') {
                            $svg = '<svg class="me-2" width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 4h6v2H9z" fill="#8887FF"></path>
                            <path d="M23 4h6v2h-6z" fill="#E5E5E5"></path>
                            <circle cx="5" cy="5" r="5" fill="#8887FF"></circle>
                            <circle cx="19" cy="5" r="5" fill="#8887FF"></circle>
                            <circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle>
                        </svg>';
                        } else if ($row['level'] == 'Advanced') {
                            $svg = '<svg width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#8887FF" d="M9 4h6v2H9zM23 4h6v2h-6z"></path><circle cx="5" cy="5" r="5" fill="#8887FF"></circle><circle cx="19" cy="5" r="5" fill="#8887FF"></circle><circle cx="33" cy="5" r="5" fill="#8887FF"></circle></svg>';
                        }
                        echo  '<div class="col-md-4 mb-3">
                        <div class="card">
                            <img class="courseImage" src="data:image;base64,' . base64_encode($row['pic']) . '">
                            <div class=" card-body">
                                <p class="cardLang my-1"><img src="assets/quizz.png" width="30px" height="30px" class="me-2" alt=""> ' . $row['nom'] . ' fundementals</p>
                                <h4 class=" card-title my-1">' . $row['titre'] . '</h4>
                                <div class="d-flex justify-content-between last align-items-center">
                                    <div class="lvl">
                                        ' . $svg . '
                                        <p class="mb-0 mt-1 level">
                                        ' . $row['level'] . '
                                        </p>
                                    </div>
                                    <form method="post" action="read.php"> 
                                    <input type="text" value= "' . $row['lesson_id'] . '"name="lesson_id" style="display: none;">
                                    <a href="" class=""><button id="learn" class="bbtn m-0">Start now <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right dark:text-primary-lightP1 text-primary h-6">
                                                <g color="#5553ff">
                                                    <line x1="5" y1="12" x2="19" y2="12" />
                                                    <polyline points="12 5 19 12 12 19" />
                                                </g>
                                            </svg></button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>';
                    } ?>
                </div>
                <nav class="pb-4" aria-label="Page navigation example">
                    <ul class="pagination mt-5 justify-content-between">
                        <li class="page-item   <?php echo $page == 1 ? 'disabled' : ''; ?>">
                            <a class="page-link prev" href="courses.php?page=<?= $prev ?>" tabindex="-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg></a>
                        </li>
                        <li class="page-item d-flex">
                            <?php for ($i = 1; $i <= $numPages; $i++) : if ($i == $page) { ?>
                                    <a class="page-link mx-1 num active" href="courses.php?page=<?= $i; ?>"><?= $i; ?></a>
                                <?php } else { ?>
                                    <a class="page-link mx-1 num " href="courses.php?page=<?= $i; ?>"><?= $i; ?></a>
                            <?php }
                            endfor ?>
                        </li>
                        <li class="page-item <?php echo $page == $numPages ? 'disabled' : ''; ?>">
                            <a class="page-link next" href="courses.php?page=<?= $next ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg></a>
                        </li>
                    </ul>
                </nav>
                <!-- <div class="course">
                <div class="course-preview bg-light">
                    <h6>Course</h6>
                    <h2>Javascript Fundamentals</h2>
                </div>
                <div class="course-info">
                    <div class="progress-container">
                        <span class="progress-text">
                            6 fun Quizzes
                        </span>
                    </div>
                    <h6>Front end</h6>
                    <h2>Images & videos in HTML5</h2>
                    <div class="level">
                        <span>
                            <svg class="me-2" width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 4h6v2H9z" fill="#8887FF"></path>
                                <path d="M23 4h6v2h-6z" fill="#E5E5E5"></path>
                                <circle cx="5" cy="5" r="5" fill="#8887FF"></circle>
                                <circle cx="19" cy="5" r="5" fill="#8887FF"></circle>
                                <circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle>
                            </svg>
                            beginner
                        </span>
                    </div>
                    <a href="" class=""><button id="learn" class="bbtn mt-2 mx-2">Read More <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right dark:text-primary-lightP1 text-primary h-6">
                                <g color="#5553ff">
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                    <polyline points="12 5 19 12 12 19" />
                                </g>
                            </svg></button></a>
                </div>
            </div>
            <div class="course">
                <div class="course-preview bg-light">
                    <h6>Course</h6>
                    <h2>Javascript Fundamentals</h2>
                </div>
                <div class="course-info">
                    <div class="progress-container">
                        <span class="progress-text">
                            6 fun Quizzes
                        </span>
                    </div>
                    <h6>Front end</h6>
                    <h2>Images & videos in HTML5</h2>
                    <div class="level">
                        <span>
                            <svg class="me-2" width="38" height="10" viewBox="0 0 38 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 4h6v2H9z" fill="#8887FF"></path>
                                <path d="M23 4h6v2h-6z" fill="#E5E5E5"></path>
                                <circle cx="5" cy="5" r="5" fill="#8887FF"></circle>
                                <circle cx="19" cy="5" r="5" fill="#8887FF"></circle>
                                <circle fill="#E5E5E5" cx="33" cy="5" r="5"></circle>
                            </svg>
                            beginner
                        </span>
                    </div>
                    <a href="" class=""><button id="learn" class="bbtn mt-2 mx-2">Read More <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right dark:text-primary-lightP1 text-primary h-6">
                                <g color="#5553ff">
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                    <polyline points="12 5 19 12 12 19" />
                                </g>
                            </svg></button></a>
                </div> -->
            </div>
        </div>
    </div>

    </div>
    </div>
    <!--  ======================== End About Me Area ==============================  -->
    <?php include "footer/index.html"; ?>

    <script src="js/courses.js"></script>
</body>

</html>