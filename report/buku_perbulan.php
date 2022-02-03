<!DOCTYPE html>
<html>

<head>
  <title>Cetak Data Buku Perbulan</title>
  <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body onload="print()">
  <!--Menampilkan data detail buku-->
  <?php
  include '../config/koneksi.php';
  $ambilbln = $_POST['bulan'];
  $ambilthn = $_POST['tahun'];
  $bulanNama;
  if ($ambilbln == 12) {
    $bulanNama = "DESEMBER";
  } elseif ($ambilbln == 11) {
    $bulanNama = "NOVEMBER";
  } elseif ($ambilbln == 10) {
    $bulanNama = "OKTOBER";
  } elseif ($ambilbln == 9) {
    $bulanNama = "SEPTEMBER";
  } elseif ($ambilbln == 8) {
    $bulanNama = "AGUSTUS";
  } elseif ($ambilbln == 7) {
    $bulanNama = "JULI";
  } elseif ($ambilbln == 6) {
    $bulanNama = "JUNI";
  } elseif ($ambilbln == 5) {
    $bulanNama = "MEI";
  } elseif ($ambilbln == 4) {
    $bulanNama = "APRIL";
  } elseif ($ambilbln == 3) {
    $bulanNama = "MARET";
  } elseif ($ambilbln == 2) {
    $bulanNama = "FEBRUARI";
  } elseif ($ambilbln == 1) {
    $bulanNama = "JANUARI";
  }

  ?>

  <div class="container">
    <div class='row'>
      <div class="col-sm-12">
        <!--dalam tabel--->
        <div class="text-center">
          <h2> Perpustakan Elektronik SMP Negeri 1 Mandoge </h2>
          <h4>Jalan Besar Bandar Pasir Mandoge,, Suka Makmur, Bandar Pasir Mandoge, Kabupaten Asahan, Sumatera Utara 21262</h4>
          <hr>
          <h3>DATA BUKU BULAN <? echo "$bulanNama $ambilthn"; ?></h3>
          <table class="table table-bordered table-striped table-hover">
            <tbody>
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Kategori</th>
                  <th>Tahun Terbit</th>
                  <th>Kota Terbit</th>
                  <th>Status</th>
                  <th>Tanggal Masuk</th>
                </tr>
              </thead>
            <tbody>
              <!--ambil data dari database, dan tampilkan kedalam tabel-->
              <?php
              //buat sql untuk tampilan data, gunakan kata kunci select
              $sql = "SELECT * FROM buku WHERE substr(tgl_masuk,1,7)='$ambilthn-$ambilbln'";
              $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
              //Baca hasil query dari databse, gunakan perulangan untuk
              //Menampilkan data lebh dari satu. disini akan digunakan
              //while dan fungdi mysqli_fecth_array
              //Membuat variabel untuk menampilkan nomor urut
              $nomor = 0;
              //Melakukan perulangan u/menampilkan data
              while ($data = mysqli_fetch_array($query)) {
                $nomor++; //Penambahan satu untuk nilai var nomor
              ?>
                <tr>
                  <td><?= $nomor ?></td>
                  <td><?= $data['judul_buku'] ?></td>
                  <td><?= $data['pengarang'] ?></td>
                  <td><?= $data['penerbit'] ?></td>
                  <td><?= $data['kategori'] ?></td>
                  <td><?= $data['tahun_terbit'] ?></td>
                  <td><?= $data['kota_terbit'] ?></td>
                  <td><?= $data['status'] ?></td>
                  <td><?= $data['tgl_masuk'] ?></td>
                </tr>
                <!--Tutup Perulangan data-->
              <?php } ?>
            </tbody>
            </tbody>

            <tfoot>
              <tr>
                <td colspan="9" class="text-right">
                  <br>
                  <br>
                  Bandar Pasir Mandoge, <?= date("d-m-Y") ?>
                  <br><br><br><br>
                  <u>Kepala Perpustakaan<strong></u><br>
                  NIK. 812399823112
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
</body>

</html>