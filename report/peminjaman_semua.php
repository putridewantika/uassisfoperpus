<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Semua Peminjaman Buku</title>
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body onload="print()">
    <!--Menampilkan data detail pinjam-->
    <?php
    include '../config/koneksi.php';
    ?>

    <div class="container">
        <div class='row'>
            <div class="col-sm-12">
                <!--dalam tabel--->
                <div class="text-center">
                    <h2> Perpustakan Elektronik SMP Negeri 1 Mandoge </h2>
                    <h4>Jalan Besar Bandar Pasir Mandoge,, Suka Makmur, Bandar Pasir Mandoge, Kabupaten Asahan, Sumatera Utara 21262</h4>
                    <hr>
                    <h3>DATA SELURUH PEMINJAMAN BUKU</h3>
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Lama Pinjaman</th>
                                    <th>Denda Terlambat</th>
                                </tr>
                            </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM pinjam
                                    JOIN buku ON pinjam.id_buku = buku.id
                                    JOIN user ON pinjam.username_peminjam = user.username";
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
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['judul_buku'] ?></td>
                                    <td><?= $data['tgl_pinjam'] ?></td>
                                    <td><?= $data['tgl_kembali'] ?>
                                        &nbsp
                                        <?php
                                        if ($data['status_pinjaman'] == 'Belum Kembali') { ?>
                                            <a href="?page=peminjaman&actions=kembaliBuku&id=<?= $data['id_pinjam'] ?>" class="btn btn-info btn-xs">
                                                <span class="fa fa-forward"></span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php
                                        $tgl1   = new DateTime('now');
                                        $tgl2   = new DateTime($data['tgl_pinjam']);
                                        $d      = $tgl2->diff($tgl1)->days + 1;

                                        echo $d . ' Hari';
                                        if ($d > 3) {
                                            echo ' ( Terlambat!)';
                                        }

                                        ?>
                                    </td>
                                    <td><?= "Rp. " . number_format($data['denda_terlambat'], 2, ',', '.') ?></td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-right">
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