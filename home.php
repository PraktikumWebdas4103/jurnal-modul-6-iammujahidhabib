<?php
    $error_nim = "";
    $error_nama = "";
    $error_email = "";

if(isset($_POST['submit'])){
    $nim =$_POST['nim'];
    $nama =$_POST['nama'];
    $kelas =$_POST['kelas'];
    $jk=$_POST['jk'];
    $hobi=$_POST['hobi'];
    $fk=$_POST['fk'];
    $alamat=$_POST['alamat'];



    //validasi nim
    if($nim == ""){
        $error_nim= "NIM tidak boleh kosong";
    }else{
        if(strlen($nim)<>10){
        $error_nim= "NIM harus 10 karakter";
        };
        if(!is_numeric($nim)){
          $error_nim= " Harus berupa angka";
        } 
    }

    //validasi nama
    if ($nama == "") {
      $error_nama= "Nama tidak boleh kosong";
    }else{
      if(strlen($nama)>35){
        $error_nama= "Nama maksimal 35 karakter";
      }if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
        $error_nama = "Hanya huruf dan spasi yang diizinkan";
      }
    }
  }
?>

<form method="post">
    <p>NIM : 
    <input type="text" name="nim" placeholder="harus angka max 10 digit" /><span style="color:red"><?php echo $error_nim; ?></span><br></p>
    <p>NAMA : 
    <input type="text" name="nama" placeholder="max 35 huruf"><span style="color:red"><?php echo $error_nama; ?></span><br></p>
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
    <input type="submit" name="submit" value="simpan" />&nbsp&nbsp<button><a href="edit.php">Edit</a></button>
</form>
<?php 
if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $data = "INSERT INTO `data`(`nim`, `nama`, `kelas`, `jk`, `hobi`, `fk`, `alamat`) 
    VALUES ('$nim','$nama','$kelas','$jk','$hobi','$fk','$alamat')";
    $simpan = $db->query($data);
    if ($simpan) {
      echo "<p>Data telah tersimpan di database!</p>";
    }else{
      echo "Proses penyimpanan error";
    }
}
 ?>