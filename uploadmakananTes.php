<?php 
 include './config/koneksi.php';

	//this is our upload folder 
	$upload_path = 'uploads/';
	
	//Getting the server ip 
	$server_ip = gethostbyname(gethostname());
	
	//creating the upload url 
	$upload_url = 'http://'.$server_ip.'/makanan/'.$upload_path; 
	

	// Membuat folder apabila folder tidak ada
	if(!is_dir($upload_url)){
	    mkdir("uploads", 0777,true);
	}

	//response array 
	$response = array(); 
	
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$namamakanan = $_POST['namamakanan'];
		$descmakanan = $_POST['descmakanan'];		
		$timeinsert = $_POST['timeinsert'];	
		$idkategori = $_POST['idkategori'];
		
		$iduser = $_POST['iduser'];
		
			//getting file info from the request 
			// $fileinfo = pathinfo($_FILES['image']['name']);
			//getting the file extension 
			// $extension = $fileinfo['extension'];
			//file url to store in the database 
			// $file_url = $_FILES['image']['name'];
			 
			// $file_path = $upload_path . $_FILES['image']['name']; 
			
			//trying to save the file in the directory 
			try{
				$temp = explode(".", $_FILES["image"]["name"]);
				$newfilename = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES['image']['tmp_name'],$upload_path . $newfilename);
				$sql = "INSERT INTO tb_makanan (id_user,id_kategori,nama_makanan,desc_makanan,foto_makanan,insert_time) VALUES ( '$iduser','$idkategori','$namamakanan','$descmakanan','$newfilename',NOW())";
				
				//adding the path and name to database 
				if(mysqli_query($connection,$sql)){
					$response['result'] = 1; 
					$response['url'] = $newfilename; 
					$response['name'] = $namamakanan;
				}else{
				// filling response array with values 
					$response['result'] = 0; 
				}
			//if some error occurred 
			}catch(Exception $e){
				$response['result']= 0;
				$response['message']=$e->getMessage();
			}		
			//displaying the response 
			echo json_encode($response);
			
			//closing the connection 
			mysqli_close($connection);
	}