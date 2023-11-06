<?php
    require 'function.php';
    session_start();
    require 'cek.php';

    // dapatin id barang masuk yang dipasing dihalaman sebelumnya
    $idbarang = $_GET['id'];// get id barang
    // get informasi barang berdasarkan database
    $get = mysqli_query($conn, "SELECT * from stock where idbarang='$idbarang'");
    $fetch = mysqli_fetch_assoc($get);
    //set variable
    $namabarang = $fetch['namabarang'];
    $deskripsi = $fetch['deskripsi'];
    $stock = $fetch['stock'];
    // cek ada gambar atau tidak
    $gambar = $fetch['image'];
    if($gambar==null){
        // jika tidak ada gambar
        $img = 'Tidak Ada Gambar';
    } else {
        // jika ada gambar
        $img = '<img src="images/'.$gambar.'" class="zoom">';
    }

    // // generate Qrcode
    // $urlview = 'http://localhost/projecttim/detail.php?id='.$idbarang;
    // $qrcode = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$urlview.'&choe=UTF-8';


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aplikasi Gudang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://kit.fontawesome.com/92db931961.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
            .zoom {
                width: 150px;
                border-radius: 10px;
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
                    <div class="container-fluid">
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                  <strong>
                                      <h4>Detail Produk</h4>
                                  </strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!--image-->
                                    <!-- <div class=" col-lg-2">
                                           <img src="<?=$qrcode;?>">
                                    </div>
 -->                                    <div class=" col-lg-2">
                                           <?=$img;?> 
                                    </div>
                                    <!--image-->

                                    <!--produk detail-->
                                    <div class="col-lg-8">
                                        <h2><?=$namabarang;?></h2>
                                        <p><?=$deskripsi;?></p>
                                        <p>Stock : <?=$stock;?> Pcs</p>
                                        
                                        <button class="btn btn-info"><a href="barangmasuk.php" class="text-white" style="text-decoration:none;">Kembali</a></button>
                                    </div>
                                    <!--image-->
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </main>
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
