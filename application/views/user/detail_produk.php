
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Produk / <?= $data_produk['kode_produk'] ?></h1>
        </div>

        <?php $rupiah = "Rp " . number_format($data_produk['harga_sampah'], 0, ',', '.'); ?>
        <div class="section-body">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/images/foto_produk/') . $data_produk['foto_sampah'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <form action="<?= base_url('landing/tambah_keranjang') ?>" method="POST">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data_produk['nama_sampah'] ?></h5>
                                <h4 class="card-text text-primary mb-3"><?= $rupiah ?></h4>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <!-- <p class="card-text mb-3">Ukuran sampah</p> -->
                                        <p class="card-text mb-3">Tanggal Produksi</p>
                                        <p class="card-text mb-3">Terakhir Restock</p>
                                        <p class="card-text mb-3">Kuantitas</p>

                                    </div>
                                    <div class="col-md-9">
                                        <!-- <p class="card-text text-dark mb-3"><?= $data_produk['ukuran_sampah'] ?> Cm.</p> -->
                                        <p class="card-text text-dark mb-3"><?= date_indo($data_produk['tgl_produksi']); ?></p>
                                        <p class="card-text text-dark mb-3"><?= date_indo($data_produk['tgl_restock']); ?></p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="number" name="qty" class="form-control" min="1">
                                                <input type="hidden" name="kode_produk" value="<?= $data_produk['kode_produk'] ?>">
                                                <input type="hidden" name="nama" value="<?= $data_produk['nama_sampah'] ?>">
                                                <input type="hidden" name="harga" value="<?= $data_produk['harga_sampah'] ?>">
                                                <input type="hidden" name="gambar" value="<?= $data_produk['foto_sampah'] ?>">
                                            </div>
                                            <div class="col-md-9">
                                                <p class="card-text text-dark mb-3">tersisa <?= $data_produk['jumlah_ketersediaan'] ?> Pcs. <?php if ($data_produk['jumlah_ketersediaan'] <= 5) { ?><i class="fas fa-info-circle text-danger" title="Stok Terbatas"></i> <?php } ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Masukkan Keranjang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Design By TRASH.ID</a>
    </div>
</footer>
</div>
</div>