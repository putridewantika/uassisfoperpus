<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <div class="alert alert-info">
                <strong>Selamat Datang di Perpustakan Elektronik SMP Negeri 1 Mandoge</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <!--colomn kedua-->
        <div class="col-sm-9 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Buku</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th width="30%">Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Kategori</th>
                                    <th>Tahun Terbit</th>
                                    <th>Kota Terbit</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--ambil data dari database, dan tampilkan kedalam tabel-->
                                <?php
                                //buat sql untuk tampilan data, gunakan kata kunci select
                                $sql = "SELECT * FROM buku";
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
                                    </tr>
                                    <!--Tutup Perulangan data-->
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--akhir colomn kedua-->
        <div class="col-sm-3 col-xs-12">
            <!--Jika terjadi login error tampilkan pesan ini-->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger">Maaf! Login Gagal, Coba Lagi..</div>
            <?php } ?>

            <?php if (isset($_SESSION['username'])) { ?>
                <div class="alert alert-info">
                    <strong>Welcome <?= $_SESSION['nama'] ?></strong>
                </div>
            <?php
            } else { ?>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Masuk Ke Sistem</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="proses_login.php" method="post">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" name="user" class="form-control input-sm" placeholder="Username" required="" autocomplete="off" />
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="password" name="pwd" class="form-control input-sm" placeholder="Password" required="" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="login" value="login" class="btn btn-info btn-block"><span class="fa fa-unlock-alt"></span>
                                        Login Sistem
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
</div>