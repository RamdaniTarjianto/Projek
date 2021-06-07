<?php
session_start();
if($_SESSION['akses'] !== 'admin'){
  header("Location: data.php");
}
require 'Koneksi.php';
?>

<?php
if (isset($_POST["signup"])) {
    
    $username = strtolower(stripslashes($_POST["username"]));
    $password = mysqli_real_escape_string($kon, $_POST["password"]);
    $email = $_POST["email"];
    $akses = $_POST["akses"];

    $result = mysqli_query($kon, "SELECT username from login WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
                    alert('Username Sudah Pernah Terdaftar');
              </script>";
              header("Location: tambah-admin.php");
    }
    
    mysqli_query($kon, "INSERT INTO login VALUES (NULL,'$username','$email','$password', '$akses')");
    echo "<script>
        alert('Berhasil di tambahkan!'); 
    </script>";
    header("Location: data.php");

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

          <select class="akses" name="akses">
            <option value="">Pilih Hak Akses</option>
            <option value="admin">Admin EDU-COVID</option>
            <option value="manage">Covid Ranger</option>
          </select>


          <input type="submit" class="btn" value="Sign up" name="signup" />

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3></h3>
          <p>
            Tambah Admin Baru ?
          </p>
          <button class="btn transparent" id="sign-up-btn">
          Tambah Admin Baru
          </button>
        </div>
        <img src="img/registr1.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          
        </div>
        <img src="img/login.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>