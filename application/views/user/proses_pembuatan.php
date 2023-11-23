<!-- Main Content -->
<!-- <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Proses Pembuatan</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card">
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
                            <a href="<?= base_url('landing/detail_produk/' . $produk['kode_produk']) ?>" class="btn btn-primary">Kembali</a>
                        </center>
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
</div> -->