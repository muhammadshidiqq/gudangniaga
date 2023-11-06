<?php
    require 'function.php';
    session_start();
    require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Aplikasi Gudang</title>
        <link href="css/styles.css" rel="stylesheet" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/all.min.css" />
        <style type="text/css">
            .zoom {
                width: 80px;
            }
            .zoom:hover{
                transform: scale(1.5);
                transition: 0.3s ease;
            }
            .background1 {
                background-image: url("images/about.jpg");
                width: 10000px;
            }
            .banner-about{
            height: 40vh;
            width: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0,0,0,0.4) ), url('images/about.jpg');
            font-style: Cursive;
            }
            .imgg {
                border-radius: 50%;
                width: 80%;
                margin-top: 30px;
                margin-left: 30px;
            }
            .bgcolour{
                background-color: #419197;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #64CCC5;">
            <a class="navbar-brand" href="index.php" style="font-family: Comic Sans MS;">Gudang Niaga</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion" style="background-color:#419197;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="barangmasuk.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="barangkeluar.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-minus-square" aria-hidden="true"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                Kelola Admin
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-sign-out-alt" aria-hidden="true"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid banner-about">
                        <div class="py-5">
                            <h1 style="text-align: center;" class="mt-4 text-light">Tentang Kami</h1>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <h4 style="text-align: center;">TIM PROJECT</h4>

                    <div class="row">
                            <div class="col-sm-6 mt-4 col-lg-6 mb-3">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <div class="row no-gutters">
                                    <div class="col-md-4">
                                      <img src="images/fotoku.jpg" class="imgg card-img-top" alt="foto shidiq">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        ||--Leader--||
                                        <h5 class="card-title">Muhammad Shidiq</h5>
                                        <p class="card-text">Jangan sekali-kali kamu mengatakan: " Sesungguhnya aku akan mengerjakan ini besok pagi. kecuali (dengan menyebut): " Insya Allah". - (Q.S Al-Kahfi: 23-24).</p>
                                        Hubungi di
                                        <a href="https://wa.me/6285767316127">
                                            <button type="button" style="border-radius: 10px;" class="btn-success">Whatsapp</button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4 col-lg-6 mb-3">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <div class="row no-gutters">
                                    <div class="col-md-4">
                                      <img src="images/ridhos.PNG" class="imgg card-img-top" alt="fotoppridho">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        ||--Back End--||
                                        <h5 class="card-title">Muhammad Ridho Fadillah</h5>
                                        <p class="card-text">Jika kau tidak sibukkan jiwamu dalam kebenaran, maka ia akan menyibukkanmu dalam kebathilan. - Imam Syafi'i.</p>
                                        Hubungi di
                                        <a href="https://wa.me/6283164330498">
                                            <button type="button" style="border-radius: 10px;" class="btn-success">Whatsapp</button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>


                            <div class="col-sm-6 mt-4 col-lg-6 mb-3">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <div class="row no-gutters">
                                    <div class="col-md-4">
                                      <img src="images/Sumarni.PNG" class="imgg card-img-top" alt="foto sumarni">

                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        ||--Front End--||
                                        <h5 class="card-title">Sumarni</h5>
                                        <p class="card-text">Janganlah kamu bersikap lemah, dan janganlah (pula) kamu bersedih hati, padahal kamulah orang-orang yang paling tinggi (derajatnya), jika kamu orang-orang yang beriman. (QS.Ali 'Imran: 139).</p>
                                        Hubungi di
                                        <a href="https://wa.me/6283839407180">
                                            <button type="button" style="border-radius: 10px;" class="btn-success">Whatsapp</button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm-6 mt-4 col-lg-6 mb-3">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <div class="row no-gutters">
                                    <div class="col-md-4">
                                      <img src="images/Putri.PNG" class="imgg card-img-top" alt="foto  Putri">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        ||--Desainer Web--||
                                        <h5 class="card-title">Amelia Putri</h5>
                                        <p class="card-text">Sesungguhnya sesudah kesulitan itu ada kemudahan, sesungguhnya sesudah kesulitan itu ada kemudahan. (QS. Al-insyirah 94:5).</p>
                                        Hubungi di
                                        <a href="https://wa.me/6283101293546">
                                            <button type="button" style="border-radius: 10px;" class="btn-success">Whatsapp</button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                    </div>
                </main>
            </div>
                    </div>
                        
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

      <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Barang</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    
                        <form method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                            <input type="text" name="namabarang" class="form-control" placeholder="Nama Barang" required>
                            <br>
                            <input type="text" name="deskripsi" class="form-control" placeholder="Deskirpsi Barang" required>
                            <br>
                            <input type="number" name="stock" class="form-control" placeholder="Stock" required>
                            <br>
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-primary" name="addstockbarang">Submit</button>
                            </div>
                        </form>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</html>
