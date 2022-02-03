<?php
$nope = $_GET['id'];
$ambil =  mysqli_query($koneksi, "SELECT * FROM pinjam
                                    JOIN buku ON pinjam.id_buku = buku.id
                                    JOIN user ON pinjam.username_peminjam = user.username WHERE pinjam.id_pinjam ='" . $_GET['id'] . "'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Tanggal Kembali Pinjaman Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="judul_buku" class="col-sm-3 control-label">Judul Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul_buku" value="<?= $data['judul_buku'] ?>" class="form-control" id="inputEmail3" placeholder="Nomor Perkara" readonly="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama Peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control" id="inputEmail3" placeholder="Nama Peminjam" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tglPinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-3">
                                <input type="date" name="tglPinjam" class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam" value="<?= $data['tgl_pinjam']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tglPengembalian" class="col-sm-3 control-label">Tanggal Pengembalian</label>
                            <div class="col-sm-3">
                                <input type="date" name="tglPengembalian" class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam" value="<?= $data['tgl_pengembalian']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="denda" class="col-sm-3 control-label">Denda Keterlambatan (Jika Terlambat) </label>
                            <div class="col-sm-3">
                                <input type="text" name="denda" class="form-control" id="inputEmail3" placeholder="Denda" readonly value="<?= $data['denda_terlambat']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tglKembali" class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-3">
                                <input type="date" name="tglKembali" class="form-control" id="inputEmail3" placeholder="Tanggal Kembali">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Tanggal</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Pinjaman
                    </a>
                </div>

            </div>
        </div>
    </div>

    <?php
    if ($_POST) {
        //Ambil data dari form
        $buku           = $_POST['judul_buku'];
        $tgl_kembali    = $_POST['tglKembali'];
        $d              = $_POST['denda'];
        $tgk = new DateTime($tgl_kembali);
        $tgp = new DateTime($_POST['tglPengembalian']);

        $e      = $tgp->diff($tgk)->days + 1;

        if ($tgk <= $tgp) {
            $denda_total = 0;
        } else {
            $denda_total = $e  * $d;
        }

        //buat sql
        $sql = "UPDATE pinjam SET tgl_kembali='$tgl_kembali', denda_total='$denda_total', status_pinjaman = 'Sudah Dikembalikan' WHERE id_pinjam='$nope'";
        $sqlbuku = "UPDATE buku SET status='Ada' WHERE judul_buku='$buku'";
        $query =  mysqli_query($koneksi, $sql) or die("SQL Simpan buku Error");
        $querybuku =  mysqli_query($koneksi, $sqlbuku) or die("SQL Simpan buku Error");
        if ($query) {
            echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
        } else {
            echo "<script>alert('Simpan Data Gagal');<script>";
        }
    }

    ?>