<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Produk <span>/ <?= $data_produk['kode_produk'] ?></span></h1>
        </div>
        <article class="article article-style-c">
            <div class="article-header">
                <div class="article-image" data-background="<?= base_url('assets/images/foto_produk/') . $data_produk['foto_sampah'] ?>">
                </div>
            </div>
            <div class="article-details">
                <div class="article-category"><a href="#">Produk Dibuat</a>
                    <div class="bullet"></div> <a href="#"><?= $data_produk['tgl_produksi'] ?></a>
                </div>
                <div class="article-title">
                    <h3 class="text-primary"><?= $data_produk['nama_sampah'] ?></h3>
                </div>
                <?php $rupiah = "Rp " . number_format($data_produk['harga_sampah'], 0, ',', '.'); ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Stok Barang : <?= $data_produk['jumlah_ketersediaan'] ?> Pcs</li>
                    <!-- <li class="list-group-item">Ukuran Barang : <?= $data_produk['ukuran_sampah'] ?> Cm</li> -->
                    <li class="list-group-item">Harga : <?= $rupiah ?></li>
                    <!-- <li class="list-group-item">Terakhir Restock : <?= $data_produk['tgl_restock'] ?></li> -->
                </ul>
                <h5 class="mt-3">Dibuat Oleh :</h5>
                <div class="article-user">
                    <img alt="image" src="<?= base_url('assets/images/img_profil/') . $data_produk['foto_profil'] ?>">
                    <div class="article-user-details">
                        <div class="user-detail-name">
                            <a href="#"><?= $data_produk['nama_user'] ?></a>
                        </div>
                        <div class="text-job"><?php if ($data_produk['level_user'] == 1) {
                                                    echo 'Admin';
                                                } ?></div>
                    </div>
                </div>
                <div class="article-cta">
                    <a href="<?= base_url('admin/daftar_produk') ?>" class="btn btn-outline-primary text-primary">Kembali</a>
                </div>
            </div>
        </article>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> Design By </a>
    </div>
</footer>
</div>
</div>