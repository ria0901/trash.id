<!-- Main Content -->
<div class="main-content">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Form Aduan</h4>
        </div>

        <div class="card-body">
            <form action="<?= base_url('landing/proses_aduan') ?>" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id_pembeli" value="<?= $data_user['id_user'] ?>">
                <?php $kode = 'ADUAN' .  date('dmY') . strtoupper(random_string('alnum', 3)); ?>
                <input type="hidden" name="kode_aduan" value="<?= $kode ?>">
                <div class="form-group">
                    <label for="kode_aduan">Kode Aduan</label>
                    <input id="kode_aduan" type="text" class="form-control" value="<?= $kode ?>" disabled required>
                </div>

                <div class="form-group">
                    <label for="aduan">Aduan</label>
                    <textarea id="aduan" class="form-control" name="aduan" required></textarea>
                </div>

                <div class="form-group">
                    <label for="bukti_aduan">Bukti Aduan</label>
                    <input type="file" id="bukti_aduan" class="form-control" name="bukti_aduan">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Ajukan
                    </button>
                    <a href="<?= base_url('landing/aduan_pembeli') ?>" class="btn btn-outline-primary btn-lg btn-block">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Design By TRASH.ID</a>
    </div>
</footer>
</div>
</div>