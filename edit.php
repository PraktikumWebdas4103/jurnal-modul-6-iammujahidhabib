<?php 
include 'koneksi.php';
$sele="SELECT * FROM `data`";
$edit = $db->query($sele);
//$query = mysqli_query($connection,"SELECT * FROM rsh_admin ORDER BY id DESC");
if(mysqli_num_rows($edit)>0){
            $no = 1;
            echo "<table border=1><tr><th>NIM</th><th>NAMA</th><th>KELAS</th><th>JENIS KELAMIN</th><th>HOBBI</th><th>FUKULTAS</th><th>ALAMAT</th></tr>";
            while($data = mysqli_fetch_array($edit)){

	
			echo "<tr>";
			echo "<td>";
			echo $data['nim'];
			echo "</td>";
			echo "<td>";
			echo $data['nama'];
			echo "</td>";
			echo "<td>";
			echo $data['kelas'];
			echo "</td>";
			echo "<td>";
			echo $data['jk'];
			echo "</td>";
			echo "<td>";
			echo $data['hobi'];
			echo "</td>";
			echo "<td>";
			echo $data['fk'];
			echo "</td>";
			echo "<td>";
			echo $data['alamat'];
			echo "</td></tr>";
 $no++; }
  }
?>


<form method="POST">
	<p>NIM : 
    <input type="text" name="nim" placeholder="pastikan nim benar dan berupa angka dan 10 digit" required><br></p>
    <p>NAMA : 
    <input type="text" name="nama" placeholder="max 35 huruf" required=><br></p>
    <p>Kelas : <br>
      <input type="radio" name="kelas" value="D3MI41-01"> D3MI41-01<br>
      <input type="radio" name="kelas" value="D3MI41-02"> D3MI41-02<br>
      <input type="radio" name="kelas" value="D3MI41-03"> D3MI41-03<br>
      <input type="radio" name="kelas" value="D3MI41-04"> D3MI41-04</p>
    <p>Jenis Kelamin :<br> 
      <input type="radio" name="jk" value="Laki-Laki"> Laki-Laki <br>
      <input type="radio" name="jk" value="Perempuan"> Perempuan <br></p>
    <p>Hobi : <br>
      <input type="checkbox" name="hobi[]" value="Futsal"> Futsal <br>
      <input type="checkbox" name="hobi[]" value="Basket"> Basket<br>
      <input type="checkbox" name="hobi[]" value="Mancing"> Mancing</p>
    <p>Fakultas : <select name="fk">
  		<option value="FIT">FIT</option>
 		<option value="FKB">FKB</option>
	</select></p>
    <p>Alamat : <textarea name="alamat"></textarea></p>
    <input type="submit" name="edit" value="EDIT" />
</form>
<?php
	if (isset($_POST['edit'])) {
		$nim =$_POST['nim'];
   		$nama =$_POST['nama'];
    	$kelas =$_POST['kelas'];
    	$jk=$_POST['jk'];
    	$hobi=$_POST['hobi'];
    	$fk=$_POST['fk'];
    	$alamat=$_POST['alamat'];


    	$sql ="UPDATE `data` SET `nama`='$nama',`kelas`='$kelas',
    		`jk`='$jk',`hobi`='$hobi',`fk`='$fk',`alamat`='$alamat' WHERE `nim`='$nim'";
		$edit = $db->query($sql);
    	if ($jalan) {
      		echo "<p>Edit Berhasil<p>";
    	}else{
     		echo "<p>Edit Gagal</p>";
   	 	}

	}

?>