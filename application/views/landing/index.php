
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Produk</h1>
        </div>

        <div class="section-body">
            <?php if (count($data_produk) > 0) { ?>
                <div class="row">
                    <?php foreach ($data_produk as $dp) { ?>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="<?= base_url('assets/images/foto_produk/') . $dp['foto_sampah'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $dp['nama_sampah'] ?></h5>
                                    <!-- <p class="card-text">sampah ini memiliki ukuran <?= $dp['ukuran_sampah'] ?> Cm.</p> -->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php $rupiah = "Rp " . number_format($dp['harga_sampah'], 0, ',', '.'); ?>
                                    <li class="list-group-item">Harga : <?= $rupiah ?></li>
                                    <li class="list-group-item">Stok : <?= $dp['jumlah_ketersediaan'] ?> Pcs.</li>
                                    <li class="list-group-item">Tanggal Produksi : <?= date_indo($dp['tgl_produksi']); ?></li>
                                </ul>
                                <div class="card-body">
                                    <a href="<?= base_url('landing/detail_produk/') . $dp['kode_produk'] ?>" class="btn btn-primary stretched-link">Beli Sekarang</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <h5 align="center">Tidak Ada Produk.</h5>
            <?php } ?>
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