<?php

require 'connect.php';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 9;
$start = ($page - 1) * $limit;
if (isset($_POST['action'])) {
    $sql = "select * from p_lesson join p_language on p_lesson.p_language = p_language.language_id where introduction != ''";
    if (isset($_POST['search'])) {
        $search = $_POST['search'][0];
        $sql .= "AND titre LIKE '%$search%'";
    } 
    if (isset($_POST['categorie'])) {
        $categorie = $_POST['categorie'][0];
        $sql .= "AND categorie = '$categorie'";
    }
    if (isset($_POST['language'])) {
        $language = implode("','", $_POST['language']);
        $sql .= "AND nom IN('" . $language . "')";
    }

    $sql .= "LIMIT $start, $limit";
    // echo 'sql : ' . $sql;
    $result = mysqli_query($conn, $sql);
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
                        ' .  $svg . '
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
    }
}
