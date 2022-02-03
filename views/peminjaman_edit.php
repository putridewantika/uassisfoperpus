<?php
$id = $_GET['id'];
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
                    <h3 class="panel-title">Update Data Peminjaman Buku</h3>
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
                            <label for="username" class="col-sm-3 control-label">Nama Peminjam</label>
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
                            <label for="tglkembali" class="col-sm-3 control-label">Tanggal Pengembalian</label>
                            <div class="col-sm-3">
                                <input type="date" name="tglkembali" class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam" value="<?= $data['tgl_pengembalian']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="denda" class="col-sm-3 control-label">Denda Keterlambatan</label>
                            <div class="col-sm-9">
                                <input type="number" min="0" name="denda" class="form-control" id="inputEmail3" placeholder="Cth : 2000" value="<?= $data['denda_terlambat']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Pinjaman</button>
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
</div>

<?php
if ($_POST) {
    //Ambil data dari form
    $tgl_pengembalian   = $_POST['tglkembali'];
    $denda              = $_POST['denda'];
    //buat sql
    $sql = "UPDATE pinjam SET tgl_pengembalian = '$tgl_pengembalian', denda_terlambat = '$denda' WHERE id_pinjam='$id'";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Edit MHS Error");
    if ($query) {
        echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');<script>";
    }
}

?>