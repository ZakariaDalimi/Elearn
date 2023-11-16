<?php
include 'connect.php'; 
session_start();
if ($_POST['submit']) {


    $lesson = $_SESSION['currentCourse'];
    $question = $_POST['question'];
    $choice = $_POST['choice'];
    $page = $_POST['page'];
    $next = $page + 1;

    // TOTAL QUESTIONS
    $sql = "select * from p_question where lesson_id = '$lesson'";
    $result = mysqli_query($conn, $sql);
    $total = $result->num_rows;

    // CORRECT CHOICE
    $qr = "select * from p_reponse where question = '$question' and IsCorrect = 1";
    $r = mysqli_query($conn, $qr);
    $row = mysqli_fetch_array($r);
    $correct =  $row['id_reponse'];

    // echo $correct . " ea " . $choice;
    // exit();
 
    // COMPARE
    if ($correct == $choice) {
        $_SESSION['score']++;
    }

    if ($page == $total) {
        header("Location: final.php");
        exit();
    } else {
        header("Location: quizz.php?page=" . $next);
    }
} else {
    header("Location: courses.php");
}
