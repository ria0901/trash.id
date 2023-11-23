<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Order Statistics</div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?= $pesanan_masuk ?></div>
                                <div class="card-stats-item-label">Masuk</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?= $pesanan_dikirim ?></div>
                                <div class="card-stats-item-label">Dikirim</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?= $pesanan_selesai ?></div>
                                <div class="card-stats-item-label">Selesai</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_pesanan ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Income</div>
                        <div class="card-stats-items justify-content-center">
                            <!-- <div class="card-stats-item">
                                <div class="card-stats-item-count">24</div>
                                <div class="card-stats-item-label">Pending</div>
                            </div> -->
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?= number_format($pemasukan['nominal'], 0, ',', '.'); ?></div>
                                <div class="card-stats-item-label">Income</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?= number_format($pengeluaran['nominal'], 0, ',', '.'); ?></div>
                                <div class="card-stats-item-label">Outcome</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saldo</h4>
                        </div>
                        <div class="card-body">
                            <?= "Rp." . number_format($saldo, 0, ',', '.'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">User</div>
                        <div class="card-stats-items justify-content-center">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?= $total_admin ?></div>
                                <div class="card-stats-item-label">Admin</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?= $total_pelanggan ?></div>
                                <div class="card-stats-item-label">Pelanggan</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_user ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>List Order</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('admin/daftar_pesanan') ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                                <?php if (count($pesanan) > 0) { ?>
                                    <?php foreach ($pesanan as $p) { ?>
                                        <tr>
                                            <td><?= $p['kode_transaksi'] ?></td>
                                            <td class="font-weight-600"><?= $p['nama_user'] ?></td>
                                            <td>
                                                <div class="badge badge-warning"><?= $p['nama_status'] ?></div>
                                            </td>
                                            <td><?= date_indo($p['tgl_pemesanan']); ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5" align="center">Belum Ada Pesanan Masuk</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="center"><a href="<?= base_url('admin/daftar_pesanan') ?>" class="badge badge-primary">Lihat Daftar Pesanan</a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card gradient-bottom">
                    <div class="card-header">
                        <h4>Products</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('admin/daftar_produk') ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body" id="top-3-scroll">
                        <ul class="list-unstyled list-unstyled-border">
                            <?php if (count($produk) > 0) { ?>
                                <?php foreach ($produk as $p) { ?>
                                    <li class="media">
                                        <img class="mr-3 rounded" width="55" src="<?= base_url('assets/images/foto_produk/') . $p['foto_sampah']; ?>" alt="product">
                                        <div class="media-body">
                                            <!-- <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">86 Sales</div>
                                            </div> -->
                                            <div class="media-title"><?= $p['nama_sampah'] ?></div>
                                            <div class="mt-1">
                                                <div class="budget-price">
                                                    <div class="budget-price-square bg-danger" data-width="10%"></div>
                                                    <div class="budget-price-label"><?= "Rp." . number_format($p['harga_sampah'], 0, ',', '.'); ?></div>
                                                </div>
                                                <div class="budget-price">
                                                    <div class="budget-price-square bg-danger" data-width="10%"></div>
                                                    <div class="budget-price-label"><?= $p['jumlah_ketersediaan'] ?> Pcs.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-primary" data-width="20"></div>
                            <div class="budget-price-label">Harga</div>
                        </div>
                        <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-danger" data-width="20"></div>
                            <div class="budget-price-label">Jumlah Stok</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Design By </a>
    </div>
</footer>
</div>
</div>