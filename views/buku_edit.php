<?php
$id = $_GET['id'];
$ambil =  mysqli_query($koneksi, "SELECT * FROM buku WHERE id ='$id'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Buku</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="judul_buku" class="col-sm-3 control-label">Judul Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul_buku" class="form-control" id="inputEmail3" placeholder="Inputkan Judul Buku" required value="<?= $data['judul_buku']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengarang" class="col-sm-3 control-label">Pengarang Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="pengarang" class="form-control" id="inputEmail3" placeholder="Inputkan Pengarang Buku" required value="<?= $data['pengarang']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penerbit" class="col-sm-3 control-label">Penerbit</label>
                            <div class="col-sm-9">
                                <input type="text" name="penerbit" class="form-control" id="inputEmail3" placeholder="Inputkan Penerbit" required value="<?= $data['penerbit']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategori" class="col-sm-3 control-label">Kategori Buku</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="kategori" class="form-control">
                                    <option <?php if ($data['kategori'] == "Ensiklopedia") {
                                                echo 'selected';
                                            } ?>>Ensiklopedia</option>
                                    <option <?php if ($data['kategori'] == "Antologi") {
                                                echo 'selected';
                                            } ?>>Antologi</option>
                                    <option <?php if ($data['kategori'] == "Dongeng") {
                                                echo 'selected';
                                            } ?>>Dongeng</option>
                                    <option <?php if ($data['kategori'] == "Biografi") {
                                                echo 'selected';
                                            } ?>>Biografi</option>
                                    <option <?php if ($data['kategori'] == "Karya Ilmiah") {
                                                echo 'selected';
                                            } ?>>Karya Ilmiah</option>
                                    <option <?php if ($data['kategori'] == "Kamus") {
                                                echo 'selected';
                                            } ?>>Kamus</option>
                                    <option <?php if ($data['kategori'] == "Majalah") {
                                                echo 'selected';
                                            } ?>>Majalah</option>
                                    <option <?php if ($data['kategori'] == "Fiksi") {
                                                echo 'selected';
                                            } ?>>Fiksi</option>
                                    <option <?php if ($data['kategori'] == "Antropologi") {
                                                echo 'selected';
                                            } ?>>Antropologi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit" class="col-sm-3 control-label">Tahun Terbit</label>
                            <div class="col-sm-9">
                                <select name="tahun_terbit" class="form-control">
                                    <?php for ($i = date("Y"); $i > 1980; $i--) { ?>
                                        <option value="<?= $i ?>" <?php if ($data['tahun_terbit'] == $i) {
                                                                        echo 'selected';
                                                                    } ?>> <?= $i ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kota_terbit" class="col-sm-3 control-label">Kota Terbit</label>
                            <div class="col-sm-9">
                                <input type="text" name="kota_terbit" class="form-control" id="inputEmail3" placeholder="Inputkan Kota Terbit Buku" required value="<?= $data['kota_terbit']; ?>">
                            </div>
                        </div>

                        <!--Status-->

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="status" class="form-control" required>
                                    <option <?php if ($data['status'] == "Ada") {
                                                echo 'selected';
                                            } ?>>Ada</option>
                                    <option <?php if ($data['status'] == "Dipinjam") {
                                                echo 'selected';
                                            } ?>>Dipinjam</option>
                                </select>
                            </div>
                        </div>

                        <!--Akhir Status-->

                        <div class="form-group">
                            <label for="deskripsi" class="col-sm-3 control-label">Deskripsi Buku</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" rows="5" required class="form-control"><?= $data['deskripsi']; ?>"</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Buku</button>
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
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $kategori = $_POST['kategori'];
    $tahun = $_POST['tahun_terbit'];
    $kota = $_POST['kota_terbit'];
    $status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];
    //buat sql
    $sql = "UPDATE buku SET judul_buku='$judul',pengarang='$pengarang',penerbit='$penerbit',kategori='$kategori',tahun_terbit='$tahun',
	kota_terbit='$kota',status='$status',deskripsi='$deskripsi' WHERE id ='$id'";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Edit MHS Error");
    if ($query) {
        echo "<script>window.location.assign('?page=buku&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');<script>";
    }
}

?>