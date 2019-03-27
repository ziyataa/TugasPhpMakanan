<?php

header("Content-Type: application/json; charset=UTF-8");
// Memasukkan koneksi.php ke dalam file ini agar nanti bisa mengakses phpmyadmin
include './config/koneksi.php';

	// Membuat nama folder upload image
	$upload_path = 'uploads/';

	// Mengambil ip server
	$server_ip = gethostbyname(gethostname());

	// Membuat url upload
	$upload_url = 'http://'.$server_ip.'/makanan/'.$upload_path;


// Membuat penampung response array
$response = array();

// Pengecekan metode yang di request oleh user, harus method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Pengecekan parameter yang dibutuhkan
	if (isset($_POST["idmakanan"]) &&
		isset($_POST["idkategori"]) && 
		isset($_POST["namamakanan"]) &&
		isset($_POST["descmakanan"]) &&
		isset($_POST["fotomakanan"]) &&
		isset($_POST["inserttime"])){
		
		// Memasukkan data yang sudah dikirim oleh user di dalam parameter ke variable penampung baru
		$idmakanan = $_POST["idmakanan"];
		$idkategori = $_POST["idkategori"];
		$namamakanan = $_POST["namamakanan"];
		$descmakanan = $_POST["descmakanan"];
		$inserttime = $_POST["inserttime"];
		$fotomakanan = $_POST["fotomakanan"];
		$image = $_FILES["image"]['tmp_name'];

	if (isset($image)) {

			// Menghapus image sebelumnya
			unlink("./uploads/" . $fotomakanan);

			// Menghilangkan nama dan mengambil extension file
			$temp = explode(".", $_FILES["image"]["name"]);
			// Menggabungkan nama baru dengan extension
			$newfilename = round(microtime(true)) . '.' . end($temp); 

			// Memasukkan file ke dalam folder
			move_uploaded_file($image, $upload_path . $newfilename);

			// Memasukkan inputan user ke dalam database menggunakan operasi UPDATE
			$sql = "UPDATE tb_makanan SET
			id_kategori = '$idkategori',
			nama_makanan = '$namamakanan',
			desc_makanan = '$descmakanan',
			insert_time = '$inserttime',
			foto_makanan = '$newfilename'
			WHERE id_makanan = $idmakanan";
	}else{
		// Mengisi variable $newfilename dengan nama file yang sebelumnya
		$newfilename = $fotomakanan;

		// Membuat query update tanpa kolom foto_makanan
		$sql = "UPDATE tb_makanan SET
				id_kategori = '$idkategori',
				nama_makanan = '$namamakanan',
				desc_makanan = '$descmakanan',
				insert_time = '$inserttime'
				WHERE id_makanan = $idmakanan";
	}
			

		// Melakukan operasi update dengan perintah yang sudah kita buat di dalam variable $sql
		// Dan langsung cek apakah eksekusinya berhasil
		if (mysqli_query($connection, $sql)) {
					// Berhasil masukkan pesan berhasil ke response
			$response["result"] = 1;
			$response["message"] = "Update berhasil";
			$response['url'] = $upload_url . $newfilename;
			$response['name'] = $namamakanan;
		}else{
			// Menampilkan pesan gagal update
			$response["result"] = 0;
			$response["message"] = "Update gagal";
		}		
		// Menampilkan response dalam bentuk JSON
		
	}else{
			// Menampilkan pesan gagal update
			$response["result"] = 0;
			$response["message"] = "Update gagal, data kurang";
	}

	echo json_encode($response);
}
?>