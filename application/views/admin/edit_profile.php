<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <!-- <div class="section-header">
            <h1>Edit Profile</h1>
        </div> -->

        <div class="row mt-sm-4 justify-content-center">
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="post" action="<?= base_url('admin/update_profile') ?>" enctype="multipart/form-data">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="nama">Nama Lengkap</label>
                                    <input id="nama" type="text" class="form-control" name="nama" value="<?= $data_user['nama_user'] ?>" autofocus required>
                                    <input id="id_user" type="hidden" name="id_user" value="<?= $data_user['id_user'] ?>" autofocus required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="no_telp">No. Telepon</label>
                                    <input id="no_telp" type="number" class="form-control" name="no_telp" value="<?= $data_user['no_telp'] ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="<?= $data_user['email'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki - Laki" <?php if ($data_user['jenis_kelamin'] == "Laki - Laki") echo 'selected="selected"'; ?>>Laki - Laki</option>
                                    <option value="Perempuan" <?php if ($data_user['jenis_kelamin'] == "Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alamat" class="d-block">Alamat</label>
                                <textarea id="alamat" class="form-control" name="alamat" required><?= $data_user['alamat'] ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Foto Profil</label>
                                <div>
                                    <img src="#" id="preview" style="max-width: 50%;">
                                </div>
                                <input type="hidden" value="<?= $data_user['foto_profil'] ?>" name="image1">
                                <input id="image" type="file" class="form-control" name="image">
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= base_url('admin/profile') ?>" class="btn btn-outline-primary">Batal</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readURL(this);
    });
</script>