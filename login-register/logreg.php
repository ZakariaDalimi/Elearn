<?php
session_start();
if (isset($_SESSION['loggedIn'])) {
  header("Location: ../index.php");
  exit();
}
include '../connect.php';
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "select * from p_user where user_email = '$email' AND user_motDePasse = '$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows == 1) {
    $row = mysqli_fetch_row($result);
    $_SESSION['loggedIn'] = 'yes';
    $_SESSION['email'] = $email;
    $_SESSION['fname'] = $row[1];
    $_SESSION['lname'] = $row[2];
    $_SESSION['id_user'] = $row[0];
    $_SESSION['password'] = $password;
    exit('user Logged in');
  } else {
    exit("Email or password invalid !");
  }
}

if (isset($_POST['fname'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['signup_email'];
  $password = $_POST['password'];

  $find = "select * from p_user where user_email = '$email'";
  $result = mysqli_query($conn, $find);
  if ($result->num_rows == 1)
    exit('Email already used');
  else {
    $sql = "insert into p_user (user_FirstName, user_LastName, user_email, user_motDePasse) values ('$fname', '$lname', '$email','$password')";
    if (mysqli_query($conn, $sql)) {
      exit('user signed up');
    } else
      exit("Error creating your new account !");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700&family=Poppins:wght@100;400;500;700&family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,500;8..144,700&display=swap" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Register</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email Address" id="signin_email" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="signin_password" name="password" />
          </div>
          <p style="padding-top: 3px; color: red; width: 100%; max-width: 370px;" id="signin_error"></p>
          <button type="submit" id="login" class="btn logbtns solid">
            Log in <img src="img/arrow.png" alt="" />
          </button>
          <a style="text-decoration: none; padding-top: 4px;" href="../">
            <p><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back to homepage</p>
          </a>
        </form>
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="First name" id="signup_fname" name="signup_fname" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Last name" id="signup_lname" name="signup_lname" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" id="signup_email" name="signup_email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="signup_mdp" name="signup_password" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" id="signup_mdpC" name="signup_cpassword" v />
          </div>
          <p style="padding-top: 3px; color: red; width: 100%; max-width: 370px;" id="signup_error"></p>
          <button type="submit" id="signup" class="btn logbtns">
            Sign up <img src="img/arrow.png" alt="" />
          </button>
          <a style="text-decoration: none; padding-top: 4px;" href="../">
            <p><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back to homepage</p>
          </a>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>Create an account and start a fresh learning journey !</p>
          <button class="btn transparent" id="sign-up-btn">Sign up</button>
        </div>
        <img src="img/loginpic.png" class="image" alt="" />
      </div>
      <div class="panel text-start right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>Go sign in to your account and start learning !</p>
          <button class="btn transparent" id="sign-in-btn">Sign in</button>
        </div>
        <img src="img/registerpic.png" class="image" alt="" />
      </div>
    </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../src/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</body>

</html>