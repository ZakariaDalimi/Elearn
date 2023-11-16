<?php
include 'connect.php';
if (isset($_POST['saved'])) {
    $user = $_POST['user'];
    $lesson = $_POST['lesson'];
    if ($_POST['saved'] == 'no') {
        $sql = "insert into favs values('$user','$lesson')";
        $result = mysqli_query($conn, $sql);
        echo '<button id="join" class="ss bbtn saved"><i class="text-danger me-1 fa-solid fa-x"></i> unsave</button>
        <script src="js/read.js"></script>';
    } else if ($_POST['saved'] == 'yes') {
        $sql = "delete from favs where user = '$user' and lesson = '$lesson'";
        $result = mysqli_query($conn, $sql);
        echo '<button id="join" class="ss bbtn">
        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="align-middle stroke-current  hover:text-gray-500">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z">
            </path>
        </svg> Save course</button>
        <script src="js/read.js"></script>';
    }
}
