<?php
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
    <link rel="stylesheet" href="css/quizz.css">
    <title>Quizz</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    include('connect.php');
    $currentCourse = $_SESSION['currentCourse'];
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 1;
    $start = ($page - 1) * $limit;
    $sql = "select * from p_question join p_lesson on p_lesson.lesson_id = p_question.lesson_id where p_question.lesson_id = '$currentCourse' LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);
    $question = mysqli_fetch_array($result);
    $currentQuestion = $question['qst_id'];

    $s = "select * from p_question where lesson_id = '$currentCourse'";
    $res = mysqli_query($conn, $s);
    $total = $res->num_rows;

    $user = $_SESSION['id_user'];
    $req = "select * from p_score where p_user = '$user' and lesson = '$currentCourse'";
    $bestscore = 'x';
    $re = mysqli_query($conn, $req);
    if ($re->num_rows > 0) {
        $scores = mysqli_fetch_array($re);
        $bestscore = $scores['score'];
    }

    // choices 
    $query = "select * from p_reponse join p_question on p_question.qst_id = p_reponse.question where question =  '$currentQuestion'";

    ?>
    <div class="bg-light">
        <div class="container text-center heading">
            <p class="bold">Quizz in <?= $question['titre'] ?></p>
            <p class="minicards fw-bold px-3 py-2"><img src="assets/language.svg" class="me-2" alt="">Best score : <?= $bestscore ?> / <?= $total ?></p>
        </div>
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="qst bold p-2 text-center mt-5 mb-4">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="#5553ff" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M32 16H16C14.89 16 14.01 16.89 14.01 18L14 30C14 31.11 14.89 32 16 32H32C33.11 32 34 31.11 34 30V18C34 16.89 33.11 16 32 16ZM32 30H16V24H32V30ZM16 20H32V18H16V20Z" fill="current"></path>
                <line x1="13.5928" y1="14.707" x2="32.6847" y2="33.7988" stroke="current" stroke-width="2"></line>
                <line x1="15.0069" y1="13.2929" x2="34.0988" y2="32.3848" stroke="#F1F1FF" stroke-width="2"></line>
            </svg>Question <?= $page ?> of <?= $total ?>
        </div>
        <div class="question bold"><i class="fa-solid fa-circle-nodes me-3"></i><?= $question['qst_content'] ?></div>
        <form action="process.php" class="mb-3" method="POST">
            <ul class="list-group my-4">
                <?php
                $r = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($r)) { ?>
                    <li class="list-group-item"><input type="radio" class="me-3" value="<?= $row['id_reponse'] ?>" name="choice" id="<?= $row['id_reponse'] ?>"><label for="<?= $row['id_reponse'] ?>"><?= htmlentities($row['reponse_content']) ?></label></li>
                <?php } ?>
            </ul>
            <div style="width: 100%;" class="d-flex buttons mb-5 justify-content-between">
                <a class="text-center" href="courses.php">
                    <button id="learn" class="bbtn m-0"><i class="fa-solid fa-arrow-left me-2"></i>Exit
                    </button>
                </a>
                <a class="text-center">
                    <button type="submit" name="submit" value="submit" id="learn" class="bbtn m-0">
                        Next<i class="fa-solid fa-arrow-right ms-2"></i>
                    </button>
                </a>
            </div>
            <input type="text" name="page" value="<?= $page ?>" style="display: none;" />
            <input type="text" name="question" value="<?= $currentQuestion ?>" style="display: none;" />
        </form>

    </div>
    <?php include 'footer/index.html'; ?>
</body>


</html>