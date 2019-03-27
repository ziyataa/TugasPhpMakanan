<?php
// Memasukkan koneksi.php ke dalam file ini agar nanti bisa mengakses phpmyadmin
include './config/koneksi.php';

// Membuat penampung response array
$response = array();

// Pengecekan metode yang di request oleh user, harus method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Pengecekan parameter yang dibutuhkan
	if (isset($_POST["iduser"]) &&
		isset($_POST["namauser"]) && 
		isset($_POST["alamat"]) && 
		isset($_POST["jenkel"]) &&
		isset($_POST["notelp"])){
		
		// Memasukkan data yang sudah dikirim oleh user di dalam parameter ke variable penampung baru
		$iduser = $_POST["iduser"];
		$namauser = $_POST["namauser"];
		$alamat = $_POST["alamat"];
		$jenkel = $_POST["jenkel"];
		$notelp = $_POST["notelp"];

			// Memasukkan inputan user ke dalam database menggunakan operasi INSERT
			$sql = "UPDATE tb_user SET 
			nama_user = '$namauser', 
			alamat = '$alamat',
			jenkel = '$jenkel',
			no_telp = '$notelp'
			WHERE id_user = $iduser";

		// Melakukan operasi insert dengan perintah yang sudah kita buat di dalam variable $sql
		// Dan langsung cek apakah eksekusinya berhasil
		if (mysqli_query($connection, $sql)) {
					// Berhasil masukkan pesan berhasil ke response
			$response["result"] = 1;
			$response["message"] = "Update berhasil";
		}else{
			// Menampilkan pesan gagal register
			$response["result"] = 0;
			$response["message"] = "Update gagal";
		}		
		// Menampilkan response dalam bentuk JSON
		echo json_encode($response);
	}
}
?>