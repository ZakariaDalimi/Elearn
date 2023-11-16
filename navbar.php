<?php
if (!isset($_SESSION)) {
    session_start();
}
$logged = false;
if (isset($_SESSION["loggedIn"]))
    $logged = true;
?>
<div class="container-fluid border">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid py-2 py-md-0">
            <a class="navbar-brand me-4" href="index.php"><img class="mb-1" id="logo" src="assets/logo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav leftnav">
                    <li class="nav-item">
                        <a class="nav-link navLinks a pt-3 fw-bold" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navLinks a pt-3 fw-bold" href="#aboutus">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navLinks a pt-3 fw-bold" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navLinks a pt-3 fw-bold" href="#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navLinks a pt-3 fw-bold" href="contactus.php">Contact us</a>
                    </li>
                </ul>
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        <?php
                        if ($logged == true) {
                        ?>
                            <li class="nav-item dropdown float-right">
                                <a class="nav-link dropdown-toggle navLinks a pt-3 fw-bold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-circle-user me-2"></i><?= $_SESSION["fname"] . " " . $_SESSION["lname"] ?>
                                </a>
                                <ul class="dropdown-menu fade-down profile" style="width: 280px !important" aria-labelledby="navbarDropdownMenuLink">
                                    <li id="greeting">
                                        <p class="dropdown-item px-4 py-3 fw-bold">Hi, <?= $_SESSION["fname"] ?> !</p>
                                    </li>
                                    <div class="mx-3 mb-2" id="smallline"></div>
                                    <li><a class="dropdown-item py-2" href="account.php"><i class="fa-solid fa-gear me-3"></i>Account settings</a></li>
                                    <li><a class="dropdown-item py-2" href="myfav.php"><i class="fa-solid fa-bars-progress me-3"></i>My courses</a></li>
                                    <li><a class="dropdown-item py-2 mb-1 text-danger" href="login-register/logout.php"><i class="fa-solid fa-arrow-right-from-bracket me-3"></i>Logout</a></li>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="login-register/logreg.php" class="nav-link navLinks btns"><button id="log" class="bbtn">Log in </button></a>
                            </li>
                            <li class="nav-item">
                                    <a href="login-register/logreg.php" class="nav-link navLinks btns"><button id="join" class="bbtn">Join for free <img src="assets/arrow.svg" alt=""></button></a>
                            </li>
                        <?php } ?>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
</div>