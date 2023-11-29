<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pesanan</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Daftar Pesanan</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive mb-3">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Nama Pemesan</th>
                            <th>Kode Transaksi</th>
                            <th>Total Bayar</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Status Pemesanan</th>
                            <th>Action</th>
                        </tr>
                        <?php if (count($pesanan) > 0) { ?>
                            <?php $no = 1;
                            foreach ($pesanan as $p) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['nama_user']  ?></td>
                                    <td><?= $p['kode_transaksi']  ?></td>
                                    <td><?= "Rp " . number_format($p['total_hargaPemesanan'], 0, ',', '.'); ?></td>
                                    <td><?= date_indo($p['tgl_pemesanan']);  ?></td>
                                    <td><span class="badge bg-danger text-white"><?= $p['nama_status']  ?></span></td>
                                    <td>
                                        <span><a href="<?= base_url('admin/detail_pesanan/') . $p['kode_transaksi'] ?>" class="btn btn-warning">Detail</a></span>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                            <tr>
                                <td colspan="7" align="center">Tidak Ada Item</td>
                            </tr>
                            <tr>
                                <td colspan="7" align="center">
                                    <a href="<?= base_url('landing') ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>&nbsp; Belanja Sekarang</a>
                                </td>
                            </tr>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="text-center">
                    <div>
                        <a href="<?= base_url('admin') ?>" class="btn btn-primary">Kembali</a>
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

<div class="modal fade" tabindex="-1" role="dialog" id="tambahQty">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_stok') ?>" method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Nama Produk</label>
                        <div class="col-lg-12">
                            <input type="hidden" id="kode_produk" name="kode_produk">
                            <input type="text" class="form-control" id="nama_sampah" name="nama_sampah" placeholder="Tuliskan Nama" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Jumlah Produk</label>
                        <div class="col-lg-12">
                            <input type="number" min="1" class="form-control" id="jumlah_stok" name="jumlah_stok" placeholder="Masukkan Jumlah Stok" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Untuk sunting
        $('#tambahQty').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#kode_produk').attr("value", div.data('id'));
            modal.find('#nama_sampah').attr("value", div.data('nama'));
        });
    });
</script>