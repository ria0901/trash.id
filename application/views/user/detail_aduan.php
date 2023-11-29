<!-- <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                                <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
                            </ul>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav> -->

<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">
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
                    <a href="<?= base_url('landing/aduan_pembeli') ?>" class="btn btn-danger btn-icon icon-left">Kembali</a>
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