<?php

header("Content-Type: application/json; charset=UTF-8");
// Memasukkan koneksi.php ke dalam file ini agar nanti bisa mengakses phpmyadmin
include './config/koneksi.php';

// Membuat penampung response array
$response = array();

// Pengecekan metode yang di request oleh user, harus method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Pengecekan parameter yang dibutuhkan
	if (isset($_POST["idmakanan"]) &&
		isset($_POST["fotomakanan"])){

		// Memasukkan data yang sudah dikirim oleh user di dalam parameter ke variable penampung baru
		$idmakanan = $_POST["idmakanan"];
		$fotomakanan = $_POST["fotomakanan"];

		// Membuat query untuk delete data
		$query = "DELETE FROM tb_makanan WHERE id_makanan = '$idmakanan'";
		// Mengeksekusi query delete dan langsung mengecek apakah berhasil atau tidak
		if (mysqli_query($connection, $query)) {
			// Apabila berhasil menghapus data
			// Menghapus image sebelumnya
			unlink("./uploads/" . $fotomakanan);

			// Mengisi respon dengan pesan berhasil delete
			$response['result'] = 1;
			$response['message'] = "Data makanan berhasil dihapus!";
		}else{
			// Apabila gagal melakukan query tampilkan pesan gagal
			$response['result'] = 0;
			$response['message'] = "Maaf! menghapus data gagal!";
		}

	} else {
			// Apabila data parameter kurang tampilkan pesan gagal
			$response['result'] = 0;
			$response['message'] = "Maaf! Data kurang!";
	}

	// Merubah response menjadi JSON
	echo json_encode($response);

	// Mematikan koneksi
	mysqli_close($connection);
}


?>