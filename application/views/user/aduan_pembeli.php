<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Aduan Yang Diajukan</h4>
                <a href="<?= base_url('landing/form_aduan') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Aduan</a>
            </div>
        </div>
        <?php if (count($aduan) > 0) { ?>
            <?php foreach ($aduan as $a) { ?>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-title"><?= $a['nama_user'] ?> <span>| <?= date_indo($a['tgl_aduan']) ?></span></div>
                                    <?php if ($a['status_aduan'] == 1) { ?>
                                        <div class="text-job text-muted"><?= $a['kode_aduan'] . ' | Belum Dibaca' ?></div>
                                    <?php } elseif ($a['status_aduan'] == 2) { ?>
                                        <div class="text-job text-muted"><?= $a['kode_aduan'] . ' | Sudah Dibaca' ?></div>
                                    <?php } ?>
                                </div>
                                <div class="media-items">
                                    <div class="media-item">
                                        <div class="media-value"><a href="<?= base_url('landing/detail_aduan/' . $a['kode_aduan']) ?>" class="stretched-link"></a><i class="fas fa-arrow-right"></i></div>
                                        <div class="media-label"> Selengkapnya</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <center>
                <h5>Belum Ada Aduan Yang Diajukan.</h5>
            </center>
            <center>
                <a href="<?= base_url('landing/form_aduan') ?>" class="btn btn-primary">Buat Aduan</a>
            </center>
        <?php } ?>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Design By Tera-C</a>
    </div>
</footer>
</div>
</div>