  <form method="post">
  <h1>Login Terlebih Dahulu !</h1>
  <table>
  <tbody>
  <tr><td>ID</td><td> : <input name="id" type="text"></td></tr>
  <tr><td>Password</td><td> : <input name="pass" type="password"></td></tr>
  <tr><td colspan="2" align="right"><input value="Login" type="submit"> <input value="Batal" type="reset" ></td></tr>
  <tr><td colspan="2" align="center">Belum punya akun ? <a href="registrasi.php"><b>Daftar</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>
<?php  
	if (isset($_POST['submit'])) {
		$id=$_POST['id'];
		$pass=($_POST['pass']);
		
		require_once("koneksi.php");
		$sql = "SELECT * FROM user WHERE id = '$id' AND pass='$pass'";
		$result =mysqli_query($db,$sql);
		$cek = mysqli_num_rows($result);
	 //	$row = mysql_fetch_array($result);
		if ($cek>0){
			session_start();
			header('Location:home.php');
		}else{
			header('Location:login.php');
		}
	}
?>