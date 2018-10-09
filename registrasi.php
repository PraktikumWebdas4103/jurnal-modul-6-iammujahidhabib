<form method="POST">
	<p>ID : <input type="text" name="id"></p>
	<p>Nama : <input type="text" name="nama"></p>
	<p>Pass : <input type="text" name="pass"></p>
	<p>re-Pass : <input type="text" name="re-pass"></p>
	<p>Alamat : <textarea name="alamat"></textarea></p>
	<input type="submit" name="submit">
</form>

 <?php 

include 'koneksi.php'; 
if(isset($_POST['submit'])){
	$id=$_POST['id']; 
	$nama=$_POST['nama']; 
	$pass=$_POST['pass'];
	$md5=md5($pass); 
	$alamat=$_POST['alamat']; 

	$data = "INSERT INTO user(id,nama,pass,alamat) VALUES ('$id','$nama','$md5','$alamat')";
    $simpan = $db->query($data);

	if($simpan) {
         echo "<div align='center'>Pendaftaran Sukses, Silahkan <a href='login.php'>Login</a></div>";
       } else {
         echo "<div align='center'>Proses Gagal!</div>";
       } 
}
?>