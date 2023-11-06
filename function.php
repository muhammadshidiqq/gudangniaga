<?php
	// Koneksi Database
	$conn = mysqli_connect("localhost", "root", "", "stockbarang");


	// Fitur Tambah Stock Barang
	if(isset($_POST['addstockbarang'])) {
		$namabarang = $_POST['namabarang'];
		$deskripsi = $_POST['deskripsi'];
		$stock = $_POST['stock'];

		// soal gambar
		$formatfoto = array('png', 'jpg');// ektensi foto yg diperbolehkan
		$nama = $_FILES['file']['name'];// ngambil gambar
		$dot = explode('.',$nama); 
		$ekstensi = strtolower(end($dot)); // ambil ektensi foto
		$ukuran = $_FILES['file']['size']; // size foto
		$file_tmp = $_FILES['file']['tmp_name'];// directory lokasi foto

		// penamaan file -> enkripsi
		$image = md5(uniqid($nama,true) . time()).'.'.$ekstensi;// menggabungkan hasil file enkripsi dgn ektensi

		// validasi udah ada tau belum
		$cek = mysqli_query($conn,"SELECT * FROM stock where namabarang='$namabarang'");
		$hitung = mysqli_num_rows($cek);

		if($hitung<1) {
			// jika belum ada
			
			// proses upload gambar
			if(in_array($ekstensi, $formatfoto) === true){
				// validasi ukuran file
				if($ukuran < 15000000) {
					move_uploaded_file($file_tmp, 'images/'.$image);
					$addtotable = mysqli_query($conn, "INSERT INTO stock (namabarang, deskripsi, stock, image) values('$namabarang', '$deskripsi', '$stock','$image')");
						if($addtotable) {
							header('location:index.php');
						} else {
							echo "Gagal";
							header('location:index.php');
						}
				} else {
					// kalau file lebih dari 1,5mb
					echo 
						'<script>
							alert("Ukuran file terlalu besar");
							window.location.href="index.php";
						 </script>';
				}
			} else {
				//kalau filenya tidak png/jpg
				echo 
					'<script>
						alert("File Harus PNG/JPG");
						window.location.href="index.php";
					 </script>';
			}

		} else {
			// jika sudah ada
			echo 
			'<script>
				alert("Nama barang sudah terdaftar");
				window.location.href="index.php";
			 </script>';
		}
};


		

	// Fitur Tambah Barang Masuk
	if(isset($_POST['addbarangmasuk'])) {
		$barangnya = $_POST['barangnya'];
		$qty = $_POST['qty'];
		$penerima = $_POST['penerima'];

		$cekstockbarang = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang = '$barangnya'");
		$ambildata = mysqli_fetch_array($cekstockbarang);

		$stockbarang = $ambildata['stock'];
		$tambahstockbarangqty = $stockbarang+$qty; 

		$addtomasuk = mysqli_query($conn, "INSERT INTO masuk (idbarang, keterangan, qty) values('$barangnya', '$penerima','$qty')");
		$updatestockmasuk = mysqli_query($conn, "UPDATE stock set stock='$tambahstockbarangqty' WHERE idbarang = '$barangnya'");
		if($addtomasuk&&$updatestockmasuk) {
			header('location:barangmasuk.php');
		} else {
			echo "Gagal";
			header('location:barangmasuk.php');
		}
	}
		//nambah barang keluar
		if (isset($_POST['addbarangkeluar'])) {
			$barangnya = $_POST['barangnya'];
			$penerima = $_POST['penerima'];
			$qty = $_POST['qty'];

			$cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
			$ambildatanya = mysqli_fetch_array($cekstocksekarang);

			$stocksekarang = $ambildatanya['stock'];

			if($stocksekarang >= $qty) {
				// Eksekusi Jika Stock Barang Ada
				$tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;

				$addtokeluar = mysqli_query($conn,"insert into keluar (idbarang,penerima,qty) values('$barangnya','$penerima','$qty')");
				$updatestockmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
				if ($addtokeluar&&$updatestockmasuk) {
					header('location:barangkeluar.php');
				} else {
					echo "Gagal";
					header('location:barangkeluar.php');
				}
			} else {
				// Eksekusi Jika Stock Barang Tidak Mencukupi
				echo '
				<script>
					alert("Stock Barang Saat Ini Tidak Menuckupi");
					window.location.href="barangkeluar.php";
				</script>
				';
			}

	}

		// Fitur Edit Stock Barang
		if(isset($_POST['editstockbarang'])) {
			$idb = $_POST['idb'];
			$namabarang = $_POST['namabarang'];
			$deskripsi = $_POST['deskripsi'];

			// soal gambar
			$formatfoto = array('png', 'jpg');// ektensi foto yg diperbolehkan
			$nama = $_FILES['file']['name'];// ngambil gambar
			$dot = explode('.',$nama); 
			$ekstensi = strtolower(end($dot)); // ambil ektensi foto
			$ukuran = $_FILES['file']['size']; // size foto
			$file_tmp = $_FILES['file']['tmp_name'];// directory lokasi foto

			// penamaan file -> enkripsi
			$image = md5(uniqid($nama,true) . time()).'.'.$ekstensi;// menggabungkan hasil file enkripsi dgn ektensi

			if($ukuran==0){
				// jika tidak ingin upload foto
				$edit = mysqli_query($conn, "UPDATE  stock set namabarang='$namabarang', deskripsi='$deskripsi' WHERE idbarang='$idb'");
				if($edit) {
					header('location:index.php');
				} else {
					echo "Gagal";
					header('location:index.php');
				}
			} else {
				// jika ingin
				move_uploaded_file($file_tmp, 'images/'.$image);
				$edit = mysqli_query($conn, "UPDATE  stock set namabarang='$namabarang', deskripsi='$deskripsi', image='$image' WHERE idbarang='$idb'");
				if($edit) {
					header('location:index.php');
				} else {
					echo "Gagal";
					header('location:index.php');
				}
			}
		}

		// Fitur Delete Stock Barang
		if(isset($_POST['hapusbarang'])) {
			$idb = $_POST['idb'];

			$gambar = mysqli_query($conn,"SELECT * FROM stock where idbarang='$idb'");
			$get = mysqli_fetch_array($gambar);
			$img = 'images/'.$get['image'];
			unlink($img);

			$hapus = mysqli_query($conn, "DELETE from stock where idbarang='$idb'");
			if($hapus) {
				header('location:index.php');
			} else {
				echo "Gagal";
				header('location:index.php');
			}
		}

		// Fitur Edit  Barang Masuk
		if(isset($_POST['editbarangmasuk'])) {
			$idb = $_POST['idb'];
			$idm = $_POST['idm'];
			$keterangan = $_POST['keterangan'];
			$qty = $_POST['kty'];

			$lihatstock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$idb'");
			$stocknya = mysqli_fetch_array($lihatstock);
			$stocksekarang= $stocknya['stock'];

			$qtysekarang = mysqli_query($conn, "SELECT * FROM masuk WHERE idmasuk='idm'");
			$qtynya = mysqli_fetch_array($qtysekarang);
			$qtysekarang = $qtynya['qty'];


			if($qty>$qtysekarang) {
				$selisih = $qty-$qtysekarang;
				$kurangi = $stocksekarang-$selisih;
				$kurangistocknya = mysqli_query($conn,"UPDATE stock set stock='$kurangi' WHERE idbarang='idb'");
				$updatenya = mysqli_query($conn, "UPDATE masuk  set qty='$qty', keterangan='$keterangan'  WHERE idmasuk='$idm'");
				if($kurangistocknya&&$updatenya) {
				header('location:barangmasuk.php');
				} else {
					echo "Gagal";
					header('location:barangmasuk.php');
				}
			} else {
				$selisih = $qtysekarang-$qty;
				$kurangi = $stocksekarang + $selisih;
				$kurangistocknya = mysqli_query($conn,"UPDATE stock set stock='$kurangi' WHERE idbarang='idb'");
				$updatenya = mysqli_query($conn, "UPDATE masuk  set qty='$qty', keterangan='$keterangan' WHERE idmasuk='$idm'");
				if($kurangistocknya&&$updatenya) {
				header('location:index.php');
				} else {
					echo "Gagal";
					header('location:index.php');
				}
			}




			// $editmasuk = mysqli_query($conn, "UPDATE  masuk set keterangan='$keterangan' WHERE idbarang='$idb'");
			// if($editmasuk) {
			// 	header('location:barangmasuk.php');
			// } else {
			// 	echo "Gagal";
			// 	header('location:barangmasuk.php');
			// }
		}

		// Fitur Delete Barang Masuk
		if(isset($_POST['hapusbarangmasuk'])) {
			$idb = $_POST['idb'];
			$idm = $_POST['idm'];
			$qty = $_POST['kty'];

			$getdatastock = mysqli_query($conn, "SELECT * FROM stock where idbarang='$idb'");
			$data = mysqli_fetch_array($getdatastock);
			$stock = $data['stock'];

			
			$hapusdata = mysqli_query($conn, "DELETE from masuk where idmasuk='$idm'");
			if($hapusdata) {
				header('location:barangmasuk.php');
			} else {
				echo "Gagal";
				header('location:barangmasuk.php');
			}

		}

		// Fitur Edit  Barang Keluar
		if(isset($_POST['editbarangkeluar'])) {
			$idb = $_POST['idb'];
			$idk = $_POST['idk'];
			$keterangan = $_POST['keterangan'];
			$qty = $_POST['kty'];

			$lihatstock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$idb'");
			$stocknya = mysqli_fetch_array($lihatstock);
			$stocksekarang= $stocknya['stock'];

			$qtysekarang = mysqli_query($conn, "SELECT * FROM masuk WHERE idmasuk='idk'");
			$qtynya = mysqli_fetch_array($qtysekarang);
			$qtysekarang = $qtynya['qty'];


			if($qty>$qtysekarang) {
				$selisih = $qty-$qtysekarang;
				$kurangi = $stocksekarang-$selisih;
				$kurangistocknya = mysqli_query($conn,"UPDATE stock set stock='$kurangi' WHERE idbarang='idb'");
				$updatenya = mysqli_query($conn, "UPDATE keluar  set qty='$qty', penerima='$keterangan'  WHERE idkeluar='$idk'");
				if($kurangistocknya&&$updatenya) {
				header('location:barangkeluar.php');
				} else {
					echo "Gagal";
					header('location:barangkeluar.php');
				}
			} else {
				$selisih = $qtysekarang-$qty;
				$kurangi = $stocksekarang + $selisih;
				$kurangistocknya = mysqli_query($conn,"UPDATE stock set stock='$kurangi' WHERE idbarang='idb'");
				$updatenya = mysqli_query($conn, "UPDATE keluar  set qty='$qty', penerima='$keterangan' WHERE idmasuk='$idk'");
				if($kurangistocknya&&$updatenya) {
				header('location:index.php');
				} else {
					echo "Gagal";
					header('location:index.php');
				}
			}

		}

		// Fitur Delete Barang keluar
		if(isset($_POST['hapusbarangkeluar'])) {
			$idb = $_POST['idb'];
			$idk = $_POST['idk'];
			$qty = $_POST['kty'];

			$getdatastock = mysqli_query($conn, "SELECT * FROM stock where idbarang='$idb'");
			$data = mysqli_fetch_array($getdatastock);
			$stock = $data['stock'];

			$hapusdata = mysqli_query($conn, "DELETE from keluar where idkeluar='$idk'");
			if($hapusdata) {
				header('location:barangkeluar.php');
			} else {
				echo "Gagal";
				header('location:barangkeluar.php');
			}

		}

		//Menambah Admin Baru
		if(isset($_POST['tambahadmin'])){
			$email = $_POST['email'];
			$password = $_POST['password'];

			$queryinsert = mysqli_query($conn,"insert into login (email, password) values ('$email', '$password')");

			if($queryinsert){
				// if berhasil
				header('location:admin.php');

			} else {
				//kalau gagal insert ke db
				header('location:admin.php');

			}
		}

		//Edit data admin
		if(isset($_POST['updateadmin'])){
			$emailbaru = $_POST['emailadmin'];
			$passwordbaru = $_POST['passwordbaru'];
			$idnya = $_POST['id'];

			$queryupdate = mysqli_query($conn,"update login set email='$emailbaru', password='$passwordbaru' where iduser='$idnya'");

			if($queryupdate){
				header('location:admin.php');

			} else {
				header('location:admin.php');

			}

		}

		//hapus admin
		if(isset($_POST['hapusadmin'])){
			$id = $_POST['id'];

			$querydelete = mysqli_query($conn,"delete from login where iduser='$id'");

			if($querydelete){
				header('location:admin.php');

			} else {
				header('location:admin.php');

			}
		}

		// tambah admin
		if(isset($_POST['tambahadmin'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$queryinsert = mysqli_query($conn,"INSERT INTO login (email,password) values ('$email', '$password')");
			
			if($queryinsert){
				header('location:admin.php');

			} else {
				header('location:admin.php');

			}
		
		}
?>