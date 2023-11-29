<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Produk</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Tabel Daftar Produk</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>Nama Produk</th>
                                <th>Foto Produk</th>
                                <th>Progres</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $start + 1; ?>
                            <?php if (count($page_produk) > 0) : ?>
                                <?php foreach ($page_produk as $p) { ?>
                                    <tr>
                                        <td align="center"><?= $no++; ?></td>

                                        <td align="center"><?= $p['nama_sampah']; ?></td>

                                        <td align="center"><img src="<?= base_url('assets/images/foto_produk/') . $p['foto_sampah']; ?>" width="50"></td>

                                        <td align="center">
                                            <div class="progress">
                                                <?php
                                                $progress = 0;
                                                if ($p['status_pembuatan'] == 1) {
                                                    $progress = 12.5;
                                                } elseif ($p['status_pembuatan'] == 2) {
                                                    $progress = 25;
                                                } elseif ($p['status_pembuatan'] == 3) {
                                                    $progress = 37.5;
                                                } elseif ($p['status_pembuatan'] == 4) {
                                                    $progress = 50;
                                                } elseif ($p['status_pembuatan'] == 5) {
                                                    $progress = 62.5;
                                                } elseif ($p['status_pembuatan'] == 6) {
                                                    $progress = 75;
                                                } elseif ($p['status_pembuatan'] == 7) {
                                                    $progress = 87.5;
                                                } elseif ($p['status_pembuatan'] == 8) {
                                                    $progress = 100;
                                                }
                                                ?>
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $progress; ?>%"></div>
                                            </div>
                                        </td>

                                        <td align="center"><?= $p['jumlah_ketersediaan']; ?></td>

                                        <td align="center">
                                            <?php if ($p['jumlah_ketersediaan'] <= 5 && $p['status_pembuatan'] == 8) { ?>
                                                <form action="<?= base_url('admin/update_produk') ?>" method="POST">
                                                    <input type="hidden" name="kode_produk" value="<?= $p['kode_produk'] ?>">
                                                    <input type="hidden" name="status_pembuatan" value="<?= $p['status_pembuatan'] ?>">
                                                    <span><button type="submit" class="btn btn-primary text-light">Cek Proses Pembuatan</button></span>
                                                </form>
                                            <?php } elseif ($p['status_pembuatan'] != 8) { ?>
                                                <span class="btn btn-primary" title="Detail Produk"><a href="<?= base_url('admin/proses_pembuatan/') . $p['kode_produk'] ?>" class="text-light">Cek Proses Pembuatan</a></span>
                                            <?php } else { ?>
                                                <p>Stok Masih Terpenuhi</p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" align="center">
                                        Belum Ada Data
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="center">
                                        <a href="<?= base_url('admin/tambah_produk') ?>" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Tambah Produk Baru</a>
                                    </td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <div class="text-center mb-3">
                        <div>
                            <a href="<?= base_url('admin') ?>" class="btn btn-primary">Kembali</a>
                        </div>
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