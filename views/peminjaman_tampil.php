<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Riwayat Peminjaman buku</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Lama Pinjaman</th>
                                <th>Denda Jk Terlambat</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            if (isset($_SESSION['level']) && $_SESSION['level'] == 1) {
                                $sql = "SELECT * FROM pinjam
                                    JOIN buku ON pinjam.id_buku = buku.id
                                    JOIN user ON pinjam.username_peminjam = user.username";
                                $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            } else {
                                $sql = "SELECT * FROM pinjam
                                    JOIN buku ON pinjam.id_buku = buku.id
                                    JOIN user ON pinjam.username_peminjam = user.username
                                    WHERE pinjam.username_peminjam = '" . $_SESSION['username'] . "'";
                                $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            }
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
                                    <td class="text-center">
                                        <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
                                            <a href="?page=peminjaman&actions=detail&id=<?= $data['id_pinjam'] ?>" class="btn btn-info btn-xs">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                            <a href="?page=peminjaman&actions=edit&id=<?= $data['id_pinjam'] ?>" class="btn btn-warning btn-xs">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <a href="?page=peminjaman&actions=delete&id=<?= $data['id_pinjam'] ?>" class="btn btn-danger btn-xs">
                                                <span class="fa fa-remove"></span>
                                            </a>
                                        <?php } else { ?>
                                            <a href="?page=peminjaman&actions=detail&id=<?= $data['id_pinjam'] ?>" class="btn btn-info btn-xs">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                            <a href="report/peminjaman_satu.php?id=<?= $data['id_pinjam'] ?>" target="_blank" class="btn btn-success btn-xs">
                                                <span class="fa fa-print"></span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>