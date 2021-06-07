<?php
session_start();
if(isset($_SESSION['username'])){
  header("Location: data.php");
}
require 'Koneksi.php';

if (isset($_POST["signup"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
              alert('Berhasil di tambahkan!'); 
          </script>";
  } else {
    echo mysqli_error($kon);
  }
 
}

?>

<?php
if (isset($_POST["signin"])) {
  $lusername = $_POST["lusername"];
  $lpassword = $_POST["lpassword"];

  $user = mysqli_query($kon, "SELECT * FROM login WHERE username = '$lusername' AND password = '$lpassword'");
  $row = mysqli_num_rows($user);

  if ($lusername == '' || $lpassword == '') {
    echo "<script>
                alert('Harap Isi Semua Field');
            </script>";
    exit;
  }

  if ($row === 1) {
    if (mysqli_num_rows($user) === 1) {
      $row_user = mysqli_fetch_assoc($user);
      $_SESSION['username'] = $row_user['username'];
      $_SESSION['akses'] = $row_user['akses'];
      if($row_user['akses'] != 'user'){
        header("Location: data.php");
      }else{
        header("Location: Beranda.php");
      }
      exit;
    } else {
      echo "<script>
                alert('Password Tidak Sesuai');
              </script>";
    }
  } else {
    echo "<script>
                alert('Username Tidak Sesuai');
              </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!-- SIGN UP FORM -->
        <form action="" class="sign-in-form" method="POST">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nama" name="lusername" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="lpassword" />
          </div>

          <input type="submit" value="Login" class="btn solid" name="signin" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>

        <!-- SIGN UP FORM -->
        <form action="" class="sign-up-form" method="POST">
          <h2 class="title">Sign up</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nama" name="username" />
          </div>

          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>

          <!--  -->
          <div class="input-field">
            <i class="far fa-id-card"></i>
            <input type="text" placeholder="NIK" name="nik" />
          </div>

          <input type="submit" class="btn" value="Sign up" name="signup" />

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/registr1.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/login.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>