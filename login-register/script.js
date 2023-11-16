$(document).ready(function () {

  const sign_in_btn = document.querySelector("#sign-in-btn");
  const sign_up_btn = document.querySelector("#sign-up-btn");
  const container = document.querySelector(".container");

  sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
  });
 
  sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
  });

  $('#login').click(function (e) {
    e.preventDefault();
    var email = $('#signin_email').val();
    var password = $('#signin_password').val();

    if (email != "" && password != "") {
      $('#signin_error').html('');
      $.ajax({
        url: "logreg.php",
        type: "POST",
        data: {
          email: email,
          password: password
        },
        success: function (response) {
          if (response.indexOf('user Logged in') >= 0) {
            window.location = "../";
          } else {
            $('#signin_error').html('<i class="fa-solid fa-circle-exclamation px-1"></i>&nbsp;&nbsp;' + response);
          }
        }
      });
    } else {
      $('#signin_error').html('<i style:"margin-right: 3px:" class="fa-solid fa-circle-exclamation px-1"></i>&nbsp;&nbsp;Please fill all the input fields !');
    }
  })

  $('#signup').click(function (e) {
    e.preventDefault();
    var fname = $('#signup_fname').val();
    var lname = $('#signup_lname').val();
    var email = $('#signup_email').val();
    var password = $('#signup_mdp').val();
    var passwordC = $('#signup_mdpC').val();

    if (email != "" && password != "" && passwordC != "" && fname != "" && lname != "" && isEmail(email)) {
      if (password == passwordC) {
        $.ajax({
          url: "logreg.php",
          type: "POST",
          data: {
            fname: fname,
            lname: lname,
            signup_email: email,
            password: password,
            passwordC: passwordC
          },
          success: function (response) {
            if (response.indexOf('Email already used') >= 0)
              $('#signup_error').html('<i class="fa-solid fa-circle-exclamation px-1"></i>&nbsp;&nbsp;' + response);
            else if (response.indexOf('user signed up') >= 0) {
              $('#signup_fname').val('');
              $('#signup_lname').val('');
              $('#signup_email').val('');
              $('#signup_mdp').val('');
              $('#signup_mdpC').val('');
              toast();
              container.classList.remove("sign-up-mode");
              $('#signup_error').html('');
            } else {
              $('#signup_error').html('<i class="fa-solid fa-circle-exclamation px-1"></i>' + response);
            }
          }
        });
      }
      else {
        $('#signup_error').html('<i class="fa-solid fa-circle-exclamation px-1"></i> &nbsp; &nbsp; Passwords don\'t match !');
      }
    } else {
      $('#signup_error').html('<i class="fa-solid fa-circle-exclamation px-1"></i> &nbsp; &nbsp; Please enter valid informations !');
    }
  })

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

  function toast() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-start',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: 'Signed in successfully'
    })
  }
});