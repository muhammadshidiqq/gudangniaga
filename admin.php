<?php
    require 'function.php';
    session_start();
    require 'cek.php';
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
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #64CCC5;">
            <a class="navbar-brand" href="index.php" style="font-family: Comic Sans MS;">Gudang Niaga</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color:#419197;">
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
                        <h1 class="mt-4">Kelola Admin</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                  <!-- Button to Open the Modal -->
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Admin
                                  </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php
                                                $ambilsemuadataadmin = mysqli_query($conn, "SELECT * FROM login");
                                                $id = 1;
                                                while($data= mysqli_fetch_array($ambilsemuadataadmin)) {
                                                $em = $data['email'];
                                                $iduser = $data['iduser'];
                                                $pw = $data['password'];

                                            ?>

                                            <tr>
                                                <td><?=$id++;?></td>
                                                <td><?=$em;?></td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$iduser;?>">
                                                    Edit</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iduser;?>">
                                                    Delete</button>
                                                    
                                                <!-- Edit  Modal -->
                                                <div class="modal fade" id="edit<?=$iduser;?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                              <h4 class="modal-title">Edit Barang</h4>
                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                          <!-- Modal body -->

                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="email" name="emailadmin" value="<?=$em;?>" class="form-control" placeholder="Email"  required>
                                                                <br>
                                                                <input type="password" name="passwordbaru" class="form-control" value="<?=$pw;?>" placeholder="password ">
                                                                <br>
                                                                <input type="hidden" name="id" value="<?=$iduser;?>">
                                                                <button type="submit" class="btn btn-primary" name="updateadmin">Submit</button>
                                                            </div>
                                                        </form>

                                                            <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </td>


                                                <!-- Delete  Modal -->
                                                <div class="modal fade" id="delete<?=$iduser;?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                              <h4 class="modal-title">Hapus Barang</h4>
                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                          <!-- Modal body -->

                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin Menghapus <?=$em;?>
                                                                <input type="hidden" name="id" value="<?=$iduser;?>">
                                                                <br>
                                                                <br>
                                                                <button type="submit" class="btn btn-danger" name="hapusadmin">Hapus</button>
                                                            </div>
                                                        </form>

                                                            <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>

                                            <?php
                                                }
                                            ?>

                                        </tbody>
                                    </table>
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
                      <h4 class="modal-title">Tambah Akses</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    
                        <form method="post">
                            <div class="modal-body">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            <br>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <br>
                            <button type="submit" class="btn btn-primary" name="tambahadmin">Submit</button>
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
