                                    <?php
                                    $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stock");
                                    $id = 1;
                                    while($data= mysqli_fetch_array($ambilsemuadatastock)) {
                                        $namabarang = $data['namabarang'];
                                        $deskripsi = $data['deskripsi'];
                                        $stock = $data['stock'];
                                        $idbg = $data['idbarang'];

                                        ?>

                                        <tr>
                                            <td><?=$id++;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$deskripsi;?></td>
                                            <td><?=$stock;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idbg;?>">
                                                Edit</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idbg;?>">
                                                Delete</button>
                                                
                                            </td>
                                        </tr>  
                                        <tr>
                                        <!-- Edit  Modal -->
                                        <div class="modal fade" id="edit<?=$idbg;?>">
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
                                                        <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" placeholder="Nama Barang" required>
                                                        <br>
                                                        <input type="text" name="deskripsi" value="<?=$deskripsi;?>" class="form-control" placeholder="Deskirpsi Barang" required>
                                                        <br>
                                                        <button type="submit" class="btn btn-primary" name="updatebarang">Edit</button>
                                                    </div>
                                                </form>

                                                    <!-- Modal footer -->
                                                <div class="modal-footer">
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                        </tr>
                                        <tr>
                                            <!-- Delete  Modal -->
                                            <div class="modal fade" id="delete<?=$idbg;?>">
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
                                                            Apakah Anda yakin ingin Menghapus <?=$namabarang;?>
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-primary" name="hapusbarang">Hapus</button>
                                                        </div>
                                                    </form>

                                                        <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                  <?php
                                }
                              ?>







<!-- The Modal -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Barang</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->

          <form method="post">
            <div class="modal-body">
                <input type="text" name="namabarang" class="form-control" placeholder="Nama Barang" required>
                <br>
                <input type="text" name="deskripsi" class="form-control" placeholder="Deskirpsi Barang" required>
                <br>
                <input type="text" name="stock" class="form-control" placeholder="Stock" required>
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