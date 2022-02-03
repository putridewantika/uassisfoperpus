<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Peminjaman Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT * FROM pinjam
                                    JOIN buku ON pinjam.id_buku = buku.id
                                    JOIN user ON pinjam.username_peminjam = user.username WHERE pinjam.id_pinjam='" . $_GET['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td width="200">Username Peminjam</td>
                            <td><?= $data['username'] ?></td>
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
                            <td>Denda Terlambat</td>
                            <td><?= "Rp. " . number_format($data['denda_terlambat'], 2, ',', '.') ?></td>
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
                    </table>

                </div>
                <!--end panel-body-->
                <!--panel footer-->
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Peminjaman </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>