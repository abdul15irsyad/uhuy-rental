<?php
	include 'koneksi.php';

	$act = $_POST['act'];
	date_default_timezone_set('Asia/Jakarta');

	if($act=='tampil_user'){
		$sql_user=mysqli_query($koneksi,"SELECT * FROM user_table ORDER BY nama_depan ASC");
		
		$response_user=array();

		while($res_user=mysqli_fetch_array($sql_user)){
			array_push($response_user,array($res_user['id_user'],
				$res_user['nama_depan']." ".$res_user['nama_belakang'],
				$res_user['username'],
				$res_user['password'],
				$res_user['email'],
				$res_user['no_telp']
			));
		}
		echo json_encode($response_user);
	// }else if($act=='check_user'){
	// 	$username = $_POST['username'];
	// 	$password = $_POST['password'];
	// 	$sql_check_user=mysqli_query($koneksi,"SELECT * FROM user_table WHERE username='$username' AND password='$password' ");
		
	// 	$response_check_user = boolean();
	// 	if (mysqli_num_rows($sql_check_user)>0) {
	// 		$response_check_user = true;
	// 	}else{
	// 		$response_check_user = false;
	// 	}
	// 	echo json_encode($response_check_user);
	}else if($act=='tampil_mobil'){
		$sql_mobil=mysqli_query($koneksi,"SELECT * FROM mobil_table ORDER BY merk ASC,model ASC");

		$response_mobil=array();

		while($res_mobil=mysqli_fetch_array($sql_mobil)){
			array_push($response_mobil,array($res_mobil['id_mobil'],
				$res_mobil['merk'],
				$res_mobil['jenis'],
				$res_mobil['transmisi'],
				$res_mobil['tahun'],
				$res_mobil['harga'],
				$res_mobil['foto'],
				$res_mobil['status'],
				$res_mobil['model']
			));
		}
		echo json_encode($response_mobil);
	}else if($act=='tampil_mobil_available'){
		$sql_mobil=mysqli_query($koneksi,"SELECT * FROM mobil_table WHERE status = 'available' OR status = 'Available' ORDER BY merk ASC,model ASC");

		$response_mobil=array();

		while($res_mobil=mysqli_fetch_array($sql_mobil)){
			array_push($response_mobil,array($res_mobil['id_mobil'],
				$res_mobil['merk'],
				$res_mobil['jenis'],
				$res_mobil['transmisi'],
				$res_mobil['tahun'],
				$res_mobil['harga'],
				$res_mobil['foto'],
				$res_mobil['status'],
				$res_mobil['model']
			));
		}
		echo json_encode($response_mobil);
	}else if($act=='tampil_detail_mobil'){
		$id = $_POST['id'];
		$sql_detail=mysqli_query($koneksi,"SELECT * FROM mobil_table WHERE id_mobil = '$id' ");

		$response_detail=array();

		while($res_detail=mysqli_fetch_array($sql_detail)){
			array_push($response_detail,array($res_detail['id_mobil'],
				$res_detail['merk'],
				$res_detail['jenis'],
				$res_detail['transmisi'],
				$res_detail['tahun'],
				$res_detail['harga'],
				$res_detail['foto'],
				$res_detail['status'],
				$res_detail['model']
			));
		}
		echo json_encode($response_detail);
	}else if($act=='tampil_peminjaman'){
		$sql_peminjaman=mysqli_query($koneksi,"SELECT * FROM ((peminjaman_table INNER JOIN user_table ON peminjaman_table.id_user=user_table.id_user) INNER JOIN mobil_table ON peminjaman_table.id_mobil=mobil_table.id_mobil)");
		
		$response_peminjaman=array();

		while($res_peminjaman=mysqli_fetch_array($sql_peminjaman)){
			$tgl_sewa=strtotime($res_peminjaman['tgl_sewa']);
			$tgl_selesai=strtotime($res_peminjaman['tgl_selesai']);
			$sewa=date("d M Y",$tgl_sewa);
			$selesai=date("d M Y",$tgl_selesai);
			array_push($response_peminjaman,array($res_peminjaman['id_peminjaman'],
				$res_peminjaman['id_mobil'],
				$res_peminjaman['merk'],
				$res_peminjaman['model'],
				$res_peminjaman['id_user'],
				$res_peminjaman['nama_depan'],
				$res_peminjaman['nama_belakang'],
				$sewa,
				$selesai,
				$res_peminjaman['status_bayar']
			));
		}
		echo json_encode($response_peminjaman);
	}else if($act=='tampil_detail_peminjaman'){
		$id_user = $_POST['id_user'];
		$id_mobil = $_POST['id_mobil'];

		$sql_detail_peminjaman=mysqli_query($koneksi,"SELECT * FROM ((peminjaman_table INNER JOIN user_table ON peminjaman_table.id_user=user_table.id_user) INNER JOIN mobil_table ON peminjaman_table.id_mobil=mobil_table.id_mobil) WHERE peminjaman_table.id_user='$id_user' AND peminjaman_table.id_mobil='$id_mobil' ");
		
		$response_detail_peminjaman=array();

		while($res_detail_peminjaman=mysqli_fetch_array($sql_detail_peminjaman)){
			$tgl_sewa=strtotime($res_detail_peminjaman['tgl_sewa']);
			$tgl_selesai=strtotime($res_detail_peminjaman['tgl_selesai']);
			$sewa=date("d-M-Y",$tgl_sewa);
			$selesai=date("d-M-Y",$tgl_selesai);
			array_push($response_detail_peminjaman,array($res_detail_peminjaman['id_peminjaman'],
				$res_detail_peminjaman['id_mobil'],
				$res_detail_peminjaman['merk'],
				$res_detail_peminjaman['model'],
				$res_detail_peminjaman['jenis'],
				$res_detail_peminjaman['transmisi'],
				$res_detail_peminjaman['tahun'],
				$res_detail_peminjaman['harga'],
				$res_detail_peminjaman['foto'],
				$res_detail_peminjaman['id_user'],
				$res_detail_peminjaman['nama_depan'],
				$res_detail_peminjaman['nama_belakang'],
				$sewa,
				$selesai,
				$res_detail_peminjaman['status_bayar']
			));
		}
		echo json_encode($response_detail_peminjaman);
	}else if($act=='tampil_user_peminjaman'){
		$id_user = $_POST['id'];

		$sql_user_peminjaman=mysqli_query($koneksi,"SELECT * FROM ((peminjaman_table INNER JOIN user_table ON peminjaman_table.id_user=user_table.id_user) INNER JOIN mobil_table ON peminjaman_table.id_mobil=mobil_table.id_mobil) WHERE peminjaman_table.id_user='$id_user' ");
		$response_user_peminjaman=array();

		while($res_user_peminjaman=mysqli_fetch_array($sql_user_peminjaman)){
			array_push($response_user_peminjaman,array($res_user_peminjaman['id_peminjaman'],
				$res_user_peminjaman['id_mobil'],
				$res_user_peminjaman['merk'],
				$res_user_peminjaman['model'],
				$res_user_peminjaman['jenis'],
				$res_user_peminjaman['transmisi'],
				$res_user_peminjaman['tahun'],
				$res_user_peminjaman['harga'],
				$res_user_peminjaman['foto'],
				$res_user_peminjaman['id_user'],
				$res_user_peminjaman['status_bayar']
			));
		}

		echo json_encode($response_user_peminjaman);
	}else if($act=='search_user'){
		$search_text=$_POST['search_text'];
		$sql_search_user=mysqli_query($koneksi,"SELECT * FROM user_table WHERE nama_depan LIKE '%$search_text%' OR nama_belakang LIKE '%$search_text%' OR username LIKE '%$search_text%' OR email LIKE '%$search_text%' ORDER BY nama_depan ASC");

		$response_search_user=array();

		while($res_search_user=mysqli_fetch_array($sql_search_user)){
			array_push($response_search_user,array($res_search_user['id_user'],
				$res_search_user['nama_depan']." ".$res_search_user['nama_belakang'],
				$res_search_user['username'],
				$res_search_user['password'],
				$res_search_user['email'],
				$res_search_user['no_telp']
			));
		}
		echo json_encode($response_search_user);
	}else if($act=='search_mobil'){
		$search_text=$_POST['search_text'];
		$sql_search_mobil=mysqli_query($koneksi,"SELECT * FROM mobil_table WHERE merk LIKE '%$search_text%' OR model LIKE '%$search_text%' OR jenis LIKE '%$search_text%' OR transmisi LIKE '%$search_text%' OR tahun LIKE '%$search_text%' OR status LIKE '%$search_text%' ORDER BY merk ASC,model ASC");

		$response_search_mobil=array();

		while($res_search_mobil=mysqli_fetch_array($sql_search_mobil)){
			array_push($response_search_mobil,array($res_search_mobil['id_mobil'],
				$res_search_mobil['merk'],
				$res_search_mobil['jenis'],
				$res_search_mobil['transmisi'],
				$res_search_mobil['tahun'],
				$res_search_mobil['harga'],
				$res_search_mobil['foto'],
				$res_search_mobil['status'],
				$res_search_mobil['model']
			));
		}
		echo json_encode($response_search_mobil);
	}else if($act=='search_mobil_available'){
		$search_text=$_POST['search_text'];
		$sql_search_mobil=mysqli_query($koneksi,"SELECT * FROM mobil_table WHERE (merk LIKE '%$search_text%' OR model LIKE '%$search_text%' OR jenis LIKE '%$search_text%' OR transmisi LIKE '%$search_text%' OR tahun LIKE '%$search_text%') AND (status='available' OR status='Available' ) ORDER BY merk ASC,model ASC");

		$response_search_mobil=array();

		while($res_search_mobil=mysqli_fetch_array($sql_search_mobil)){
			array_push($response_search_mobil,array($res_search_mobil['id_mobil'],
				$res_search_mobil['merk'],
				$res_search_mobil['jenis'],
				$res_search_mobil['transmisi'],
				$res_search_mobil['tahun'],
				$res_search_mobil['harga'],
				$res_search_mobil['foto'],
				$res_search_mobil['status'],
				$res_search_mobil['model']
			));
		}
		echo json_encode($response_search_mobil);
	}else if($act=='search_peminjaman'){
		$search_text=$_POST['search_text'];
		$sql_search_peminjaman=mysqli_query($koneksi,"SELECT * FROM ((peminjaman_table INNER JOIN user_table ON peminjaman_table.id_user=user_table.id_user) INNER JOIN mobil_table ON peminjaman_table.id_mobil=mobil_table.id_mobil) WHERE merk LIKE '%$search_text%' OR model LIKE '%$search_text%' OR nama_depan LIKE '%$search_text%' OR nama_belakang LIKE '%$search_text%' ");

		$response_search_peminjaman=array();

		while($res_search_peminjaman=mysqli_fetch_array($sql_search_peminjaman)){
			$tgl_sewa=strtotime($res_search_peminjaman['tgl_sewa']);
			$tgl_selesai=strtotime($res_search_peminjaman['tgl_selesai']);
			$sewa=date("d M Y",$tgl_sewa);
			$selesai=date("d M Y",$tgl_selesai);
			array_push($response_search_peminjaman,array($res_search_peminjaman['id_peminjaman'],
				$res_search_peminjaman['id_mobil'],
				$res_search_peminjaman['merk'],
				$res_search_peminjaman['model'],
				$res_search_peminjaman['id_user'],
				$res_search_peminjaman['nama_depan'],
				$res_search_peminjaman['nama_belakang'],
				$sewa,
				$selesai,
				$res_search_peminjaman['status_bayar']
			));
		}
		echo json_encode($response_search_peminjaman);
	}else if($act=='tambah_mobil'){
		$merk = $_POST['merk'];
		$model = $_POST['model'];
		$jenis = $_POST['jenis'];
		$transmisi = $_POST['transmisi'];
		$tahun = $_POST['tahun'];
		$harga = $_POST['harga'];
		
		$response_tambah_mobil=array();

		if(is_array($_FILES)){
			if(is_uploaded_file($_FILES['file']['tmp_name'])){
				$file_name = $_FILES['file']['name'];
				$file_source = $_FILES['file']['tmp_name'];
				$target_path = "../img/gambar_mobil/".$file_name;
				if(move_uploaded_file($file_source,$target_path)) {
					$sql_tambah_mobil=mysqli_query($koneksi,"INSERT INTO mobil_table (merk,model,jenis,transmisi,tahun,harga,foto,status) VALUES ('$merk','$model','$jenis','$transmisi','$tahun','$harga','img/gambar_mobil/".$file_name."','available')");
					if ($sql_tambah_mobil){
						$sql_mobil=mysqli_query($koneksi,"SELECT * FROM mobil_table ORDER BY id_mobil DESC LIMIT 1");
						while($res_tambah_mobil=mysqli_fetch_array($sql_mobil)){
							array_push($response_tambah_mobil,array($res_tambah_mobil['id_mobil'],
								$res_tambah_mobil['merk'],
								$res_tambah_mobil['model'],
								$res_tambah_mobil['jenis'],
								$res_tambah_mobil['transmisi'],
								$res_tambah_mobil['tahun'],
								$res_tambah_mobil['harga'],
								$res_tambah_mobil['foto'],
								$res_tambah_mobil['status']
							));
						}
					}
				}
			}
		}
		echo json_encode($response_tambah_mobil);
	}else if($act=='edit_mobil'){

		$id = $_POST['id_mobil'];
		$merk = $_POST['merk'];
		$model = $_POST['model'];
		$jenis = $_POST['jenis'];
		$transmisi = $_POST['transmisi'];
		$tahun = $_POST['tahun'];
		$harga = $_POST['harga'];
		$status = $_POST['status'];
		
		//Mengambil data mobil yang hendak diedit
		$sql_select=mysqli_query($koneksi,"SELECT * FROM mobil_table WHERE id_mobil='".$id."' ");
		while($foto=mysqli_fetch_array($sql_select)){
			$pathDeleteFoto=$foto['foto'];
		}

		$response_edit_mobil=array();

		//Mengedit data di database
		$sql_edit_mobil=mysqli_query($koneksi,"UPDATE mobil_table SET merk='".$merk."',model='".$model."', jenis='".$jenis."', transmisi='".$transmisi."', tahun='".$tahun."', harga='".$harga."', status='".$status."' WHERE id_mobil='".$id."' ");

		if(is_array($_FILES)){
			if(is_uploaded_file($_FILES['file']['tmp_name'])){
				$file_name = $_FILES['file']['name'];
				$file_source = $_FILES['file']['tmp_name'];
				$target_path = "../img/gambar_mobil/".$file_name;
				if(move_uploaded_file($file_source,$target_path)) {
					unlink("../".$pathDeleteFoto);
					$sql_update_foto=mysqli_query($koneksi,"UPDATE mobil_table SET foto='img/gambar_mobil/".$file_name."' WHERE id_mobil='".$id."' ");
				}
			}
		}
		if ($sql_edit_mobil){
			$sql_mobil=mysqli_query($koneksi,"SELECT * FROM mobil_table WHERE id_mobil='".$id."'");
			while($res_edit_mobil=mysqli_fetch_array($sql_mobil)){
				array_push($response_edit_mobil,array($res_edit_mobil['id_mobil'],
					$res_edit_mobil['merk'],
					$res_edit_mobil['model'],
					$res_edit_mobil['jenis'],
					$res_edit_mobil['transmisi'],
					$res_edit_mobil['tahun'],
					$res_edit_mobil['harga'],
					$res_edit_mobil['foto'],
					$res_edit_mobil['status']
				));
			}
		}else{
			echo json_encode("Error");
		}
		echo json_encode($response_edit_mobil);
	}else if($act=='sudah'){
		$id = $_POST['id'];

		$sql_sudah=mysqli_query($koneksi,"UPDATE peminjaman_table SET status_bayar='sudah' WHERE id_peminjaman='".$id."' ");
	}else if($act=='belum'){
		$id = $_POST['id'];

		$sql_belum=mysqli_query($koneksi,"UPDATE peminjaman_table SET status_bayar='belum' WHERE id_peminjaman='".$id."' ");
	}else if($act=='sewa_mobil'){
		$id_mobil = $_POST['id_mobil'];
		$id_user = $_POST['id_user'];

		$tgl_sewa = date("Y-m-d");
		$tgl_selesai = "2019-1-29";

		if(!empty($id_mobil)&&!empty($id_user)){
		$sql_rented=mysqli_query($koneksi,"UPDATE mobil_table SET status='rented' WHERE id_mobil='$id_mobil' ");
		$sql_sewa_mobil=mysqli_query($koneksi,"INSERT INTO peminjaman_table(id_user,id_mobil,tgl_sewa,tgl_selesai,status_bayar) VALUES('$id_user','$id_mobil','$tgl_sewa','$tgl_selesai','belum') ");
		}
	}
?>