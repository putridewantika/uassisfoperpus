<?php
$nope = $_GET['id'];
$ambil =  mysqli_query($koneksi, "SELECT * FROM buku WHERE id ='$nope'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pinjaman Arsip</h3>
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
                            <label for="username" class="col-sm-3 control-label">Username Peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username Peminjam">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tglPinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-3">
                                <input type="date" name="tglPinjam" class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="denda" class="col-sm-3 control-label">Denda Keterlambatan</label>
                            <div class="col-sm-9">
                                <input type="number" min="0" name="denda" class="form-control" id="inputEmail3" placeholder="Cth : 2000">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Peminjaman</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=buku&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Buku
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if ($_POST) {
    //Ambil data dari form
    $username           = $_POST['username'];
    $buku               = $nope;
    $tgl_pinjam         = $_POST['tglPinjam'];
    $tgl_pengembalian   = date('Y-m-d', strtotime('+3 days', strtotime($tgl_pinjam)));
    $denda              = $_POST['denda'];
    //buat sql
    $sql = "INSERT INTO pinjam VALUES ('','$username','$buku','$tgl_pinjam','$tgl_pengembalian','Belum Kembali','$denda', 'Belum Kembali', 'Belum Kembali')";

    $sqlbuku = "UPDATE buku SET status='Dipinjam' WHERE id='$nope'";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Simpan Peminjaman Error");
    $querybuku =  mysqli_query($koneksi, $sqlbuku) or die("SQL Simpan buku Error");
    if ($query) {
        echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
    } else {
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}

?>