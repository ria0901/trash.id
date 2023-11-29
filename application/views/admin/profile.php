<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>

        <div class="row mt-sm-4 justify-content-center">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="<?= base_url('assets/images/img_profil/') . $data_user['foto_profil'] ?>" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">
                                    <h3><?= $data_user['nama_user'] ?></h3>
                                </div>
                                <div class="profile-widget-item-value"><?= $data_user['email'] ?></div>
                            </div>
                            <!-- <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Followers</div>
                                <div class="profile-widget-item-value">6,8K</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Following</div>
                                <div class="profile-widget-item-value">2,1K</div>
                            </div> -->
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">
                            <h4>
                                <?php if ($data_user['level_user'] == 2) {
                                    echo 'Member';
                                } else if ($data_user['level_user'] == 1) {
                                    echo 'Admin';
                                } ?>
                            </h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">No. Telepon : <?= $data_user['no_telp'] ?></li>
                            <li class="list-group-item">Jenis Kelamin : <?php if ($data_user['jenis_kelamin'] != null) {
                                                                            echo $data_user['jenis_kelamin'];
                                                                        } else {
                                                                            echo '-';
                                                                        } ?></li>
                            <li class="list-group-item">Alamat : <?= $data_user['alamat'] ?></li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <div class="font-weight-bold mb-2">Tanggal Daftar </div>
                        <div class="font-weight-bold mb-2"><?= date_indo($data_user['tgl_daftar']); ?></div>
                        <a href="<?= base_url('admin/edit_profile') ?>" class="btn btn-primary">
                            Edit Profile
                        </a>
                    </div>
                </div>
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