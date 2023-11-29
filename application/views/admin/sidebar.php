<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">TRASH.ID</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= base_url('admin') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Produk</li>
            <li><a class="nav-link" href="<?= base_url('admin/daftar_produk') ?>"><i class="fas fa-box"></i> <span>Daftar Produk</span></a></li>
            <li><a class="nav-link" href="<?= base_url('admin/restock_produk') ?>"><i class="fas fa-box-open"></i> <span>Restock Produk</span></a></li>
            <li><a class="nav-link" href="<?= base_url('admin/tambah_produk') ?>"><i class="fas fa-plus"></i> <span>Tambah Produk Baru</span></a></li>
            <li class="menu-header">Menu Utama</li>
            <li><a class="nav-link" href="<?= base_url('admin/daftar_pesanan') ?>"><i class="fas fa-table"></i> <span>Daftar Pesanan</span></a></li>
            <li><a class="nav-link" href="<?= base_url('admin/laporan_keuangan') ?>"><i class="fas fa-money-bill"></i> <span>Laporan Keuangan</span></a></li>
            <li><a class="nav-link" href="<?= base_url('admin/aduan_pembeli') ?>"><i class="fas fa-question"></i> <span>Aduan Pembeli</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= base_url('admin/logout') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>