<?php
// hubungkan dengan file koneksi.php
require_once('koneksi.php');

// sistem update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //mendapatkan data dari form update
  $id = $_POST['nim'];
  $judul = $_POST['nama'];
  $prodi = $_POST['prodi'];
  $gender = $_POST['gender'];
  $kategori = $_POST['jurusan'];
  $tanggal_bergabung = $_POST['tanggal_bergabung'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  
  //update data MAHASISWA ke database
  $query = "UPDATE tb_mahasiswa SET 
      nama='$judul', 
      jurusan='$kategori', 
      prodi='$prodi', 
      gender='$gender', 
      tanggal_lahir='$tanggal_lahir', 
      tanggal_bergabung='$tanggal_bergabung'
    WHERE nim='$id'";

  $result = mysqli_query($mysqli, $query);

  //cek apakah update berhasil
  if($result) {
    // life hack untuk memunculkan alert
    echo "<div></div>";
    // alert
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'>
    <script>Swal.fire('Berhasil!','Data Berhasil Di Perbaharui!','success')</script>
    ";
  } else {
    echo "Update data MAHASISWA gagal";
  }
}

// sistem read data
// if (isset($_GET['id'])) {

// sanitize data
$nim = mysqli_real_escape_string($mysqli, $_GET['id']);

// query untuk ambil data
$sql = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'";

// eksekusi query
$result = mysqli_query($mysqli, $sql);

// cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
  // tampilkan data dalam bentuk tabel
  $data = mysqli_fetch_assoc($result);
} else {
  // jika data tidak ditemukan
  echo "Data tidak ditemukan.";
  $data = [];
}

// berhenti mysqli
mysqli_close($mysqli);
// }

?>

<?php 
  // memanggil header.php
  require_once('header.php');
?>

 <!-- konten -->
 <div class="container">
  <h5 class="text-center mt-5">TAMBAH MAHASISWA</h5>
  <form class="shadow rounded py-4 px-3 my-4" action="update.php?id=<?= $data['nim']; ?>" method="POST">
    <div class="mb-3">
      <label for="nim" class="form-label">nim</label>
      <input required readonly type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">nama</label>
      <input required type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
    </div>
    <div class="mb-3">
      <label for="jurusan" class="form-label">jurusan</label>
      <select class="form-select" id="jurusan" name="jurusan">
        <option selected disabled>Choose...</option>
        <option value="TI-MTI" <?php if ($data['jurusan'] == 'TI-MTI') { echo 'selected'; } ?>>TI-MTI</option>
        <option value="TI-KAB" <?php if ($data['jurusan'] == 'TI-KAB') { echo 'selected'; } ?>>TI-KAB</option>
        <option value="DKV" <?php if ($data['jurusan'] == 'DKV') { echo 'selected'; } ?>>DKV</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="prodi" class="form-label">prodi</label>
      <select class="form-select" id="prodi" name="prodi">
        <option selected disabled>Choose...</option>
        <option value="TI-MTI" <?php if ($data['prodi'] == 'TI') { echo 'selected'; } ?>>TI</option>
        <option value="DKV" <?php if ($data['prodi'] == 'DKV') { echo 'selected'; } ?>>DKV</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">gender</label>
      <select class="form-select" id="gender" name="gender">
        <option selected disabled>Choose...</option>
        <option value="laki-laki" <?php if ($data['gender'] == 'laki-laki') { echo 'selected'; } ?>>laki-laki</option>
        <option value="perempuan" <?php if ($data['gender'] == 'perempuan') { echo 'selected'; } ?>>perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
      <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">
    </div>
    <div class="mb-3">
      <label for="tanggal_bergabung" class="form-label">tanggal_bergabung</label>
      <input required type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="<?= $data['tanggal_bergabung'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
  // memanggil footer.php
  require_once('footer.php');
?>