<?php
// hubungkan dengan file koneksi.php
require_once('koneksi.php');

// sistem tambah data

if (isset($_GET['id'])) {

  // sanitize data
  $nim = mysqli_real_escape_string($mysqli, $_GET['id']);

  // query untuk ambil data
  $sql = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'";

  // eksekusi query
  $result = mysqli_query($mysqli, $sql);

  // cek apakah data ditemukan
  if (mysqli_num_rows($result) > 0) {
    // tampilkan data dalam bentuk tabel
    // echo "<table>";
    // while ($row = mysqli_fetch_assoc($result)) {
    //   echo "<tr><td>nim:</td><td>" . $row['nim'] . "</td></tr>";
    //   echo "<tr><td>nama:</td><td>" . $row['nama'] . "</td></tr>";
    //   echo "<tr><td>jurusan:</td><td>" . $row['jurusan'] . "</td></tr>";
    //   echo "<tr><td>prodi:</td><td>" . $row['prodi'] . "</td></tr>";
    //   echo "<tr><td>gender:</td><td>" . $row['gender'] . "</td></tr>";
    //   echo "<tr><td>tanggal_lahir:</td><td>" . $row['tanggal_lahir'] . "</td></tr>";
    //   echo "<tr><td>tanggal_bergabung:</td><td>" . $row['tanggal_bergabung'] . "</td></tr>";
    // }
    // echo "</table>";
    $data = mysqli_fetch_assoc($result);
  } else {
    // jika data tidak ditemukan
    echo "Data tidak ditemukan.";
    $data = [];
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
  <h5 class="text-center mt-5">DETAIL MAHASISWA</h5>
  <form class="shadow rounded py-4 px-3 my-4">
    <div class="mb-3">
      <label for="nim" class="form-label">nim</label>
      <input readonly type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">nama</label>
      <input readonly type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">jurusan</label>
      <input readonly type="text" class="form-control" id="nama" name="nama" value="<?= $data['jurusan'] ?>">
    </div>
    <div class="mb-3">
      <label for="prodi" class="form-label">prodi</label>
      <input readonly type="text" class="form-control" id="prodi" name="prodi" value="<?= $data['prodi'] ?>">
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">gender</label>
      <input readonly type="text" class="form-control" id="gender" name="gender" value="<?= $data['gender'] ?>">
    </div>
    <div class="mb-3">
      <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
      <input readonly type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">
    </div>
    <div class="mb-3">
      <label for="tanggal_bergabung" class="form-label">tanggal_bergabung</label>
      <input readonly type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="<?= $data['tanggal_bergabung'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
  // memanggil footer.php
  require_once('footer.php');
?>