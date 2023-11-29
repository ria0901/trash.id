
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lihat Keranjang</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Keranjang</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive mb-3">
                        <table class="table table-striped">
                            <tr>
                                <th>Gambar Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Sub-Total</th>
                                <th>Action</th>
                            </tr>
                            <?php if (count($keranjang) > 0) { ?>
                                <?php foreach ($keranjang as $k) { ?>
                                    <tr>
                                        <td>
                                            <img alt="image" src="<?= base_url('assets/images/foto_produk/') . $k['gambar'] ?>" class="rounded-circle" width="50" title="<?= $k['name'] ?>">
                                        </td>
                                        <td>
                                            <?= $k['name'] ?>
                                        </td>
                                        <td>
                                            <?= $k['qty'] ?> Pcs
                                        </td>
                                        <td><?= "Rp " . number_format($k['price'], 0, ',', '.'); ?></td>
                                        <td><?= "Rp " . number_format($k['subtotal'], 0, ',', '.'); ?></td>
                                        <td>
                                            <span><a href="<?= base_url('landing/hapus_item/') . $k['rowid'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5" align="center">Tidak Ada Item</td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="center">
                                        <a href="<?= base_url('landing') ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>&nbsp; Belanja Sekarang</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="float-right">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6>Total :</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-primary"><?= "Rp " . number_format($this->cart->total(), 0, ',', '.'); ?></h5>
                            </div>
                        </div>
                        <?php if (count($keranjang) > 0) { ?>
                            <div>
                                <a href="<?= base_url('landing/hapus_keranjang') ?>" class="btn btn-outline-danger">Kosongkan Keranjang</a>
                                <a href="<?= base_url('landing/checkout') ?>" class="btn btn-primary">Checkout</a>
                            </div>
                        <?php } ?>
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