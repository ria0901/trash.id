<!-- <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Aduan Pembeli</h1>
        </div>
        <?php if (count($aduan) > 0) { ?>
            <?php foreach ($aduan as $a) { ?>
                <?php if ($a['status_aduan'] == 1) { ?>
                    <div class="card bg-primary">
                        <div class="card-body">
                            <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                <li class="media">
                                    <div class="media-body mt-2">
                                        <div class="media-title text-white"><?= $a['nama_user'] ?> <span>| <?= date_indo($a['tgl_aduan']) ?></span></div>
                                        <?php if ($a['status_aduan'] == 1) { ?>
                                            <div class="text-job text-white"><?= $a['kode_aduan'] . ' | Belum Dibaca' ?></div>
                                        <?php } elseif ($a['status_aduan'] == 2) { ?>
                                            <div class="text-job text-white"><?= $a['kode_aduan'] . ' | Sudah Dibaca' ?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="media-items">
                                        <div class="media-item">
                                            <div class="media-value"><a href="<?= base_url('admin/baca_aduan/' . $a['kode_aduan']) ?>" class="stretched-link"></a><i class="fas fa-arrow-right"></i></div>
                                            <div class="media-label text-white"> Selengkapnya</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } elseif ($a['status_aduan'] == 2) { ?>
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                <li class="media">
                                    <div class="media-body mt-2">
                                        <div class="media-title"><?= $a['nama_user'] ?> <span>| <?= date_indo($a['tgl_aduan']) ?></span></div>
                                        <?php if ($a['status_aduan'] == 1) { ?>
                                            <div class="text-job text-muted"><?= $a['kode_aduan'] . ' | Belum Dibaca' ?></div>
                                        <?php } elseif ($a['status_aduan'] == 2) { ?>
                                            <div class="text-job text-muted"><?= $a['kode_aduan'] . ' | Sudah Dibaca' ?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="media-items">
                                        <div class="media-item">
                                            <div class="media-value"><a href="<?= base_url('admin/detail_aduan/' . $a['kode_aduan']) ?>" class="stretched-link"></a><i class="fas fa-arrow-right"></i></div>
                                            <div class="media-label"> Selengkapnya</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
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
        Copyright &copy; 2023 <div class="bullet"></div> Design By TRASH.ID</a>
    </div>
</footer>
</div>
</div> -->