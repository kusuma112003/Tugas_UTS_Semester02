<?php
// hubungkan dengan file koneksi.php
require('koneksi.php');

// sistem tambah data
// cara cek adalah bila method request = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // $_POST
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $jurusan = $_POST['jurusan'];
  $prodi = $_POST['prodi'];
  $gender = $_POST['gender'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $tanggal_bergabung = $_POST['tanggal_bergabung'];

  // var_dump($nim);
  // die();

  //menambah data baru
  $sql = "INSERT INTO tb_mahasiswa (
      nim, 
      nama, 
      jurusan, 
      prodi, 
      gender, 
      tanggal_lahir, 
      tanggal_bergabung
    ) VALUES (
      '$nim', 
      '$nama', 
      '$jurusan', 
      '$prodi', 
      '$gender', 
      '$tanggal_lahir', 
      '$tanggal_bergabung'
    )";

  if (mysqli_query($mysqli, $sql)) {
    // life hack : diisi untuk memunculkan alert
    echo "<div></div>";
    // alert
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'>
    <script>Swal.fire('Berhasil!','Data Berhasil Di Tambahkan!','success')</script>
    ";
  } 

  // berhenti mysqli
  mysqli_close($mysqli);
}

?>

<?php 
  // memanggil header.php
  require_once('header.php');
?>

 <!-- konten -->
 <div class="container">
  <h5 class="text-center mt-5">TAMBAH MAHASISWA</h5>
  <form class="shadow rounded py-4 px-3 my-4" action="create.php" method="POST">
    <div class="mb-3">
      <label for="nim" class="form-label">nim</label>
      <input required type="text" class="form-control" id="nim" name="nim">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">nama</label>
      <input required type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
      <label for="jurusan" class="form-label">jurusan</label>
      <select class="form-select" id="jurusan" name="jurusan">
        <option selected disabled>Choose...</option>
        <option value="TI-MTI">TI-MTI</option>
        <option value="TI-KAB">TI-KAB</option>
        <option value="DKV">DKV</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="prodi" class="form-label">prodi</label>
      <select class="form-select" id="prodi" name="prodi">
        <option selected disabled>Choose...</option>
        <option value="TI">TI</option>
        <option value="DKV">DKV</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">gender</label>
      <select class="form-select" id="gender" name="gender">
        <option selected disabled>Choose...</option>
        <option value="laki-laki">laki-laki</option>
        <option value="perempuan">perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
      <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
    </div>
    <div class="mb-3">
      <label for="tanggal_bergabung" class="form-label">tanggal_bergabung</label>
      <input required type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
  // memanggil footer.php
  require_once('footer.php');
?>