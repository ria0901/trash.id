<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Produk</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Tabel Daftar Produk</h4>
                <!-- <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                </div> -->
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Produk</th>
                                <th>Foto Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $start + 1; ?>
                            <?php if (count($page_produk) > 0) : ?>
                                <?php foreach ($page_produk as $p) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>

                                        <td><?= $p['kode_produk']; ?></td>

                                        <td><img src="<?= base_url('assets/images/foto_produk/') . $p['foto_sampah']; ?>" width="50"></td>

                                        <td><?= $p['nama_sampah']; ?></td>

                                        <td><?= "Rp " . number_format($p['harga_sampah'], 0, ',', '.'); ?></td>

                                        <td><?= $p['jumlah_ketersediaan']; ?></td>

                                        <td><span class="btn btn-info" title="Detail Produk"><a href="<?= base_url('admin/detail_produk/') . $p['kode_produk'] ?>"><i class="fas fa-search text-light"></i></a></span>&nbsp;<span class="btn btn-success" title="Edit Produk"><a href="<?= base_url('admin/edit_produk/') . $p['kode_produk'] ?>"><i class="fas fa-pen text-light"></i></a></span>&nbsp;<span class="btn btn-danger" title="Hapus Produk"><a href="<?= base_url('admin/hapus_produk/') . $p['kode_produk'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash text-light"></i></a></span></td>
                                    </tr>
                                <?php } ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" align="center">
                                        Belum Ada Data
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" align="center">
                                        <a href="<?= base_url('admin/tambah_produk') ?>" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Tambah Produk Baru</a>
                                    </td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <?= $Pagination ?>
                </div>
                <div class="text-center mb-3">
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
        Copyright &copy; 2022 <div class="bullet"></div> Design By TRASH.ID</a>
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