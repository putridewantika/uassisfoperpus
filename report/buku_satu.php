<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Buku</title>
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body onload="print()">
    <!--Menampilkan data detail buku-->
    <?php
    include '../config/koneksi.php';
    $sql = "SELECT * FROM buku WHERE id='" . $_GET['id'] . "'";
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
                    <h3>DATA BUKU</h3>
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <td width="100">ID Buku</td>
                                <td width="200"><?= $data['id'] ?></td>
                            </tr>
                            <tr>
                                <td>Judul Buku</td>
                                <td><?= $data['judul_buku'] ?></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td><?= $data['pengarang'] ?></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td><?= $data['penerbit'] ?></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><?= $data['kategori'] ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit | Kota Terbit</td>
                                <td><?= $data['tahun_terbit'] ?> | <?= $data['kota_terbit'] ?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td class="text-justify"><?= $data['deskripsi'] ?></td>
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