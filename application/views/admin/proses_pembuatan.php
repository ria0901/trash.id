
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Proses Pembuatan <span>/ <?= $produk['kode_produk'] ?></span></h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Alur Pembuatan</h4>
                    </div>
                    <div class="card-body">
                        <?php $no = 1;
                        foreach ($status as $s) { ?>
                            <?php if ($produk['status_pembuatan'] == $s['id_statusPembuatansampah']) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $no++ ?>. <?= $s['nama_statusPembuatansampah'] ?>.
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-light" role="alert">
                                    <?= $no++ ?>. <?= $s['nama_statusPembuatansampah'] ?>.
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <center class="mt-5">
                            <?php if ($produk['status_pembuatan'] != 7 && $produk['status_pembuatan'] != 8) { ?>
                                <form action="<?= base_url('admin/update_produk') ?>" method="POST">
                                    <input type="hidden" name="kode_produk" value="<?= $produk['kode_produk'] ?>">
                                    <input type="hidden" name="status_pembuatan" value="<?= $produk['status_pembuatan'] ?>">
                                    <button type="submit" class="btn btn-primary text-light">Step Selanjutnya</button>
                                </form>
                            <?php } elseif ($produk['status_pembuatan'] == 8) { ?>
                                <a href="<?= base_url('admin/restock_produk/') ?>" class="btn btn-primary">Kembali</a>
                            <?php } ?>
                        </center>
                    </div>
                </div>
                <?php if ($produk['status_pembuatan'] == 7) { ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Penambahan Stok Produk</h4>
                        </div>
                        <div class="card-body">
                            <center>Masukkan Jumah sampah Yang Dihasilkan Dari Proses Pembuatan Saat Ini, Beserta Nominal Pengeluaran Untuk Membuat sampah.</center>
                            <form action="<?= base_url('admin/update_produk') ?>" method="POST">
                                <center>
                                    <div class="row mt-3">
                                        <div class="form-group col-6">
                                            <label for="pengeluaran">Nominal Pengeluaran</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                <input type="number" min="0" class="form-control" placeholder="Masukkan Nominal Pengeluaran" name="pengeluaran" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="jumlah_stok">Jumlah Stok</label>
                                            <div class="input-group">
                                                <input type="number" min="1" class="form-control" placeholder="Masukkan Jumlah Stok" name="jumlah_stok" required>
                                                <span class="input-group-text" id="basic-addon2">Pcs</span>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                                <center class="mt-3">
                                    <input type="hidden" name="kode_produk" value="<?= $produk['kode_produk'] ?>">
                                    <input type="hidden" name="status_pembuatan" value="<?= $produk['status_pembuatan'] ?>">
                                    <input type="hidden" name="stok_produk" value="<?= $produk['jumlah_ketersediaan'] ?>">
                                    <button type="submit" class="btn btn-primary text-light">Submit</button>
                                </center>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> Design By TRASH.ID</a>
    </div>
</footer>
</div>
</div>