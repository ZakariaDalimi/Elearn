<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: login-register/logreg.php");
    exit();
}
?>
<?php
require('connect.php');
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/final.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="src/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700&family=Poppins:wght@100;400;500;700&family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,500;8..144,700&display=swap" rel="stylesheet">

    <title>Score</title>
</head>

<body>
    <?php include 'navbar.php';
    $lesson = $_SESSION['currentCourse'];
    $sql = "select * from p_question where lesson_id = '$lesson'";
    $result = mysqli_query($conn, $sql);
    $total = $result->num_rows;

    $currentScore = $_SESSION['score'];
    $user = $_SESSION['id_user'];
    $req = "select * from p_score where p_user = '$user' and lesson = '$lesson'";
    $r = mysqli_query($conn, $req);
    if ($r->num_rows > 0) {
        $scores = mysqli_fetch_array($r);
        if ($currentScore > $scores['score']) {
            $insert = "update p_score set score = '$currentScore'";
            mysqli_query($conn, $insert);
        }
    } else {
        $insert = "insert into p_score values ('$user','$lesson','$currentScore')";
        mysqli_query($conn, $insert);
    }
    ?>
    <div class="main-container">
        <div class="check-container">
            <div class="check-background">
                <svg viewBox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 25L27.3077 44L58.5 7" stroke="white" stroke-width="13" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="check-shadow"></div>
        </div>
        <h1 class="pt-2 header">Quizz completed !</h1>
        <p class="minicards px-3 py-2"><img src="assets/language.svg" class="me-2" alt=""> score : <?= $_SESSION['score'] ?> / <?= $total ?></p>
        <p class="mb-4">You can pass this quizz again if you want to get a better score !</p>
        <a href="courses.php" class="back">
            <button id="learn" class="bbtn m-0"><svg xmlns="http://www.w3.org/2000/svg" class="me-2 mb-1" width="22" height="22" viewBox="0 0 24 24" fill="#5553ff" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>Back to courses
            </button>
        </a>
    </div>
    <?php include 'footer/index.html' ?>
</body>

</html>