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
        <div class="section-header">
            <h1>Bayar</h1>
        </div>

        <div class="section-body">
            <form action="<?= base_url('landing/proses_bayar') ?>" enctype="multipart/form-data" method="POST">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Pembayaran</h2>
                                    <div class="invoice-number">Order #<?= $data_pesanan['kode_transaksi']; ?></div>
                                    <input type="hidden" name="kode_transaksi" value="<?= $data_pesanan['kode_transaksi']; ?>">
                                    <input type="hidden" name="id_user" value="<?= $data_user['id_user'] ?>">
                                    <input type="hidden" name="id_pemesanan" value="<?= $data_pesanan['id_detaildataPemesanan'] ?>">
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Tujuan Pengiriman:</strong><br>
                                            <?= $data_user['nama_user']; ?><br>
                                            <?= $data_user['no_telp']; ?><br>
                                            <?= $data_user['email']; ?><br>
                                            <?= $data_user['alamat']; ?>
                                        </address>
                                        <address>
                                            <strong>Tanggal Pemesanan:</strong><br>
                                            <?= date('d-m-Y') ?><br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Produk Yang Dipesan</div>
                                <p class="section-lead">Produk yang telah dipesan tidak bisa dihapus.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Nama Produk</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                        foreach ($produk as $k) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $k['nama_sampah'] ?></td>
                                                <td class="text-center"><?= "Rp " . number_format($k['harga_sampah'], 0, ',', '.'); ?></td>
                                                <td class="text-center"><?= $k['jumlah_sampah'] ?></td>
                                                <td class="text-right"><?= "Rp " . number_format($k['total_harga'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="row mt-4 mb-3">
                                    <div class="col-lg-8">
                                        <div class="section-title">Metode Pembayaran</div>
                                        <p class="section-lead">Pembayaran hanya dapat dilakukan dengan metode transfer bank.</p>
                                        <!-- <div class="d-flex">
                                            <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                                            <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                                            <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                                            <div class="bg-paypal" data-width="61" data-height="38"></div>
                                        </div> -->
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <!-- <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Subtotal</div>
                                            <div class="invoice-detail-value">$670.99</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Shipping</div>
                                            <div class="invoice-detail-value">$15</div>
                                        </div> -->
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg"><?= "Rp " . number_format($data_pesanan['total_hargaPemesanan'], 0, ',', '.'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h5 class="mb-5">Nomer Rekening Tujuan :</h5>
                                    <h4 class="mb-3">034101000743xxx</h4>
                                    <img src="<?= base_url('assets/images/bri.png') ?>" style="max-width: 15%;" alt="">
                                    <div class="mt-5">
                                        <label for="bukti_pembayaran">Upload Bukti Pembayaran :</label>
                                        <input type="file" name="bukti_pembayaran" class="form-control" id="bukti_pembayaran" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-center">
                        <!-- <div class="float-lg-left mb-lg-0 mb-3">
                            <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                        </div> -->
                        <a href="<?= base_url('landing/lihat_pesanan') ?>" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Batal</a>
                        <button type="submit" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Bayar</button>
                    </div>
                </div>
            </form>
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