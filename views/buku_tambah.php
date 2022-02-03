<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Buku</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="judul_buku" class="col-sm-3 control-label">Judul Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul_buku" class="form-control" id="inputEmail3" placeholder="Inputkan Judul Buku" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengarang" class="col-sm-3 control-label">Pengarang Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="pengarang" class="form-control" id="inputEmail3" placeholder="Inputkan Pengarang Buku" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penerbit" class="col-sm-3 control-label">Penerbit</label>
                            <div class="col-sm-9">
                                <input type="text" name="penerbit" class="form-control" id="inputEmail3" placeholder="Inputkan Penerbit" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategori" class="col-sm-3 control-label">Kategori Buku</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="kategori" class="form-control">
                                    <option>Ensiklopedia</option>
                                    <option>Antologi</option>
                                    <option>Dongeng</option>
                                    <option>Biografi</option>
                                    <option>Karya Ilmiah</option>
                                    <option>Kamus</option>
                                    <option>Majalah</option>
                                    <option>Fiksi</option>
                                    <option>Antropologi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit" class="col-sm-3 control-label">Tahun Terbit</label>
                            <div class="col-sm-9">
                                <input type="number" name="tahun_terbit" class="form-control" id="inputEmail3" placeholder="Inputkan Tahun Terbit Buku" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kota_terbit" class="col-sm-3 control-label">Kota Terbit</label>
                            <div class="col-sm-9">
                                <input type="text" name="kota_terbit" class="form-control" id="inputEmail3" placeholder="Inputkan Kota Terbit Buku" required>
                            </div>
                        </div>

                        <!--Status-->

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="status" class="form-control" required>
                                    <option value="Ada">Ada</option>
                                    <option value="Dipinjam">Dipinjam</option>
                                </select>
                            </div>
                        </div>

                        <!--Akhir Status-->

                        <div class="form-group">
                            <label for="deskripsi" class="col-sm-3 control-label">Deskripsi Buku</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" rows="5" required class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Buku</button>
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
    $tgl_masuk = date('Y-m-d');
    //buat sql
    $sql = "INSERT INTO buku VALUES ('','$judul','$pengarang','$penerbit','$kategori','$tahun','$kota','$status','$deskripsi', '$tgl_masuk')";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Simpan Arsip Error");
    if ($query) {
        echo "<script>window.location.assign('?page=buku&actions=tampil');</script>";
    } else {
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}

?>