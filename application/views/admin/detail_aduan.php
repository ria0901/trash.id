<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pesanan</h1>
        </div>
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>Detail Aduan </h2>
                            <!-- <span class="badge bg-warning text-white"><?= $data_pesanan['nama_status'] ?></span> -->
                            <div class="invoice-number">Aduan #<?= $aduan['kode_aduan']; ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Data Diri Pelanggan:</strong><br>
                                    <?= $aduan['nama_user']; ?><br>
                                    <?= $aduan['no_telp']; ?><br>
                                    <?= $aduan['email']; ?><br>
                                    <?= $aduan['alamat']; ?>
                                </address>
                                <address>
                                    <strong>Tanggal Aduan:</strong><br>
                                    <?= date_indo($aduan['tgl_aduan']) ?><br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title">Aduan</div>
                        <p class="section-lead mt-3"><?= $aduan['desk_aduan'] ?></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-center">
                <!-- <div class="float-lg-left mb-lg-0 mb-3">
                            <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                        </div> -->
                <a href="<?= base_url('admin/aduan_pembeli') ?>" class="btn btn-danger btn-icon icon-left">Kembali</a>
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