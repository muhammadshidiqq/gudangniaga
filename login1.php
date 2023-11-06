<?php
    require 'function.php';
    session_start();
    // Cek Login
    if(isset($_POST['login'])) {
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;
        //eksekusi login
        $cekdata = mysqli_query($conn, "SELECT * FROM  login WHERE email ='$email' and  password ='$password'");
        // hitung user
        $hitung = mysqli_num_rows($cekdata);

        if($hitung>0) {
            $_SESSION['log'] = 'True';
            header('location:index.php');
        } else {
            echo 
                '<script>
                    alert("Maaf Email atau Password anda salah..");
                    window.location.href="login1.php";
                 </script>';

        };
    };

    if(!isset($_SESSION['log'])) {
        
    } else {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
      ></script>
      <link rel="stylesheet" href="css/stylelogin.css" />
      <title>MASUK || GUDANG NIAGA</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" class="sign-in-form">
            <h2 class="title">LOGIN</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <button class="btn solid" name="login" href="index.php">Login</button>
            </div>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>GUDANG NIAGA</h3>
            <p>
              Aplikasi Gudang Niaga adalah sebuah aplikasi yang berguna untuk pengelolaan stock barang yang ada dalam gudang.
            </p>
            <img src="images/logo.png" class="image" alt="" />
          </div>
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
