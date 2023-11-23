<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Laporan Pengeluaran</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Form Laporan Pengeluaran</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="<?= base_url('admin/proses_tambah_pengeluaran') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="pengeluaran">Nominal Pengeluaran</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                            <input type="number" min="0" class="form-control" placeholder="Masukkan Nominal Pengeluaran" name="pengeluaran" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pengeluaran">Keterangan</label>
                        <div class="input-group">
                            <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="Masukkan Keterangan" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Submit
                        </button>
                        <a href="<?= base_url('admin/laporan_keuangan') ?>" class="btn btn-outline-primary btn-lg btn-block">
                            Batal
                        </a>
                    </div>
                </form>
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