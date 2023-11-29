<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lihat Pesanan</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pesanan</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive mb-3">
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nama Pemesan</th>
                                <th>Kode Transaksi</th>
                                <th>Total Bayar</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status Pemesanan</th>
                                <th>Action</th>
                            </tr>
                            <?php if (count($pesanan) > 0) { ?>
                                <?php $no = 1;
                                foreach ($pesanan as $p) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $p['nama_user']  ?></td>
                                        <td><?= $p['kode_transaksi']  ?></td>
                                        <td><?= "Rp " . number_format($p['total_hargaPemesanan'], 0, ',', '.'); ?></td>
                                        <td><?= date_indo($p['tgl_pemesanan']);  ?></td>
                                        <td><span class="badge bg-danger text-white"><?= $p['nama_status']  ?></span></td>
                                        <td>
                                            <?php if ($p['id_informasiStatus'] == 1) { ?>
                                                <span><a href="<?= base_url('landing/bayar/') . $p['kode_transaksi'] ?>" class="btn btn-warning">Bayar</a></span>
                                            <?php } ?>
                                            <span><a href="<?= base_url('landing/detail_pesanan/') . $p['kode_transaksi'] ?>" class="btn btn-warning">Detail</a></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                <tr>
                                    <td colspan="7" align="center">Tidak Ada Item</td>
                                </tr>
                                <tr>
                                    <td colspan="7" align="center">
                                        <a href="<?= base_url('landing') ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>&nbsp; Belanja Sekarang</a>
                                    </td>
                                </tr>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="text-center">
                        <div>
                            <a href="<?= base_url('landing') ?>" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Design By Tera-C</a>
    </div>
</footer>
</div>
</div>