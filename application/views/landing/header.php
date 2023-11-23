<body class="layout-3">
    <?php
    $pesan = $this->session->flashdata('pesan');
    if (!empty($pesan)) {
        if ($pesan['status_pesan'] == true && !empty($pesan)) {
            echo '
                    <script>
                        Swal.fire({
                            title: "Berhasil",
                            text: "' . $pesan['isi_pesan'] . '",
                            type: "success",
                            confirmButtonText: "Close"
                        });
                    </script>';
        } else if ($pesan['status_pesan'] == false && !empty($pesan)) {
            echo '
                    <script>
                        Swal.fire({
                            title: "Gagal",
                            text: "' . $pesan['isi_pesan'] . '",
                            type: "error",
                            confirmButtonText: "Close"
                        });
                    </script>';
        }
    }
    ?>
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="<?= base_url('landing') ?>" class="navbar-brand sidebar-gone-hide">TRASH.ID</a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                </div>
                <form class="form-inline ml-auto">
                </form>
                <ul class="navbar-nav navbar-right">
                    <?php if (count($keranjang) > 0) { ?>
                        <li class="nav-link"><a href="<?= base_url('landing/lihat_keranjang') ?>" class="nav-link nav-link-lg beep"><i class="fas fa-shopping-cart"></i></a></li>
                    <?php } else { ?>
                        <li class="nav-link"><a href="<?= base_url('landing/lihat_keranjang') ?>" class="nav-link nav-link-lg"><i class="fas fa-shopping-cart"></i></a></li>
                    <?php } ?>
                    <?php if ($data_user == null) { ?>
                        <li>
                            <a href="<?= base_url('landing/login') ?>" class="nav-link">Masuk</a>
                        </li>
                        <li>
                            <a href="<?= base_url('Landing/register') ?>" class="nav-link">Daftar</a>
                        </li>
                    <?php } else { ?>
                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <img alt="image" src="<?= base_url('assets/images/img_profil/') . $data_user['foto_profil'] ?>" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">Hi, <?= $data_user['nama_user'] ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Logged in 5 min ago</div>
                                <a href="<?= base_url('landing/profile') ?>" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Activities
                                </a> -->
                                <!-- <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('landing/logout') ?>" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url('landing') ?>" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?= base_url('landing/lihat_pesanan') ?>" class="nav-link"><i class="fas fa-file-invoice"></i><span>Pesanan</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('landing/aduan_pembeli') ?>" class="nav-link"><i class="fas fa-question"></i><span>Aduan</span></a>
                        </li> -->
                        <!-- <li class="nav-item dropdown">
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
                        </li> -->
                    </ul>
                </div>
            </nav>