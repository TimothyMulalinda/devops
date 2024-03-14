<?php 
	
	require_once('../app/init.php');

	// Create instance/object from class
	$app = new App(); 
?>

public function inputstudent()
{
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$status = $this->logic("Home_model")->input_data($_POST);

		if($status === "success")
		{
			echo "Data Berhasil Disimpan";
		}
		if($status === "failed")
		{
			echo "Data Gagal Disimpan";
		}
		if($status === "error")
		{
			echo "Terjadi Kesalahan";
		}
	}else{
		echo "MUST REQ POST";
	}
}