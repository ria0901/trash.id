<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Produk Baru</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Form Tambah Produk</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="<?= base_url('admin/proses_tambah_produk') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="kode_produk" id="kode_produk">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $data_user['id_user'] ?>">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nama">Nama Produk</label>
                            <input id="nama" type="text" class="form-control" name="nama" required>
                        </div>
                        <!-- <div class="form-group col-6">
                            <label for="no_telp">Ukuran sampah</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="ukuran_sampah" aria-describedby="basic-addon2" required>
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div> -->
                    </div>

                    <div class="form-group">
                        <label for="jumlah_produk">Jumlah Produk</label>
                        <input id="jumlah_produk" type="number" class="form-control" name="jumlah_produk" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_produk">Harga Produk</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" class="form-control" name="harga_produk" aria-describedby="basic-addon2" required>
                            <span class="input-group-text" id="basic-addon2">/Kg</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto_produk">Foto Produk</label>
                        <div>
                            <img src="#" id="preview" style="max-width: 50%;">
                        </div>
                        <input id="foto_produk" type="file" class="form-control" name="foto_produk" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Submit
                        </button>
                        <a href="<?= base_url('admin/daftar_produk') ?>" class="btn btn-outline-primary btn-lg btn-block">
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>admin/getKodeProduk',
            beforeSend: function() {
                $('.loading').show();
            },
            success: function(data) {

                var html = JSON.parse(data);
                var kode = 'KP_' + html;
                var nodaf = kode;
                $('#kode_produk').val(nodaf);
            }
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#foto_produk").change(function() {
        readURL(this);
    });
</script>