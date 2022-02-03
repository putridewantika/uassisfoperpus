<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Peminjaman Buku</title>
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body onload="print()">
    <!--Menampilkan data detail pinjam-->
    <?php
    include '../config/koneksi.php';
    $sql = "SELECT * FROM pinjam
                JOIN buku ON pinjam.id_buku = buku.id
                JOIN user ON pinjam.username_peminjam = user.username 
                WHERE pinjam.id_pinjam='" . $_GET['id'] . "'";
    //proses query ke database
    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
    //Merubaha data hasil query kedalam bentuk array
    $data = mysqli_fetch_array($query);
    ?>

    <div class="container">
        <div class='row'>
            <div class="col-sm-12">
                <!--dalam tabel--->
                <div class="text-center">
                    <h2> Perpustakan Elektronik SMP Negeri 1 Mandoge </h2>
                    <h4>Jalan Besar Bandar Pasir Mandoge,, Suka Makmur, Bandar Pasir Mandoge, Kabupaten Asahan, Sumatera Utara 21262</h4>
                    <hr>
                    <h3>DATA PEMINJAMAN BUKU</h3>
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td><?= $data['id_pinjam'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Peminjam</td>
                                <td><?= $data['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pinjam</td>
                                <td><?= $data['tgl_pinjam'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengembalian</td>
                                <td><?= $data['tgl_pengembalian'] ?></td>
                            </tr>
                            <tr>
                                <td>Denda Terlambat</td>
                                <td><?= "Rp. " . number_format($data['denda_terlambat'], 2, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Kembali</td>
                                <td><?= $data['tgl_kembali'] ?></td>
                            </tr>
                            <tr>
                                <td>Lama Pinjam</td>
                                <td> <?php
                                        $tgl1   = new DateTime('now');
                                        $tgl2   = new DateTime($data['tgl_pinjam']);
                                        $tgl3   = new DateTime($data['tgl_pengembalian']);
                                        $d      = $tgl2->diff($tgl1)->days + 1;
                                        $e      = $tgl1->diff($tgl3)->days + 1;

                                        echo $d . ' Hari';
                                        if ($d > 3) {
                                            echo ' ( Terlambat ' . $e . ' Hari !!!  )';
                                        } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Denda Total</td>
                                <td>
                                    <?php
                                    $denda = $data['denda_total'];
                                    if (is_numeric($denda) == '') {
                                        echo $data['denda_total'];
                                    } else {
                                        echo "Rp. " . number_format($data['denda_total'], 2, ',', '.');
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Status Pinjaman</td>
                                <td><?= $data['status_pinjaman'] ?></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-right">
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