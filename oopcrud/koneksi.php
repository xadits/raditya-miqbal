<?php 
class Dbh{
 
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "dbrads";
	var $koneksi = "";
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
 
	function tampil_data()
	{
		$data = mysqli_query($this->koneksi,"select * from siswa");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
 
	function tambah_data($id,$nisn,$nama,$kelas,$jurusan)
	{
		mysqli_query($this->koneksi,"insert into siswa values ('$id','$nisn','$nama','$kelas','$jurusan')");
	}
	
	function get_by_id($id)
	{
		$query = mysqli_query($this->koneksi,"select * from siswa where id='$id'");
		return $query->fetch_array();
	}
	function update_data($id,$nisn,$nama,$kelas,$jurusan)
	{
		$query = mysqli_query($this->koneksi,"update siswa set nisn='$nisn',nama='$nama',kelas='$kelas',jurusan='$jurusan' where id='$id'");

	}
	function delete_data($id)
	{
		$query = mysqli_query($this->koneksi,"delete from siswa where id='$id'");
	}
}

?>