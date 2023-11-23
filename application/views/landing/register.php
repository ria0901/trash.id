<body>
    <?php
    $pesan = $this->session->flashdata('pesan');
    if (!empty($pesan)) {
        if ($pesan['status_pesan'] == true && !empty($pesan)) {
            echo '
                    <script>
                        Swal.fire({
                            title: "Berhasil",
                            text: "' . $pesan['isi_pesan'] . '",
                            type: "success",
                            confirmButtonText: "Close"
                        });
                    </script>';
        } else if ($pesan['status_pesan'] == false && !empty($pesan)) {
            echo '
                    <script>
                        Swal.fire({
                            title: "Gagal",
                            text: "' . $pesan['isi_pesan'] . '",
                            type: "error",
                            confirmButtonText: "Close"
                        });
                    </script>';
        }
    }
    ?>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <h3 style="color: #93D283;">TRASH.ID</h3>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?= base_url('landing/proses_register') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama">Nama Lengkap</label>
                                            <input id="nama" type="text" class="form-control" name="nama" autofocus required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="no_telp">No. Telepon</label>
                                            <input id="no_telp" type="number" class="form-control" name="no_telp" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email">
                                        <span id="email_result"></span>
                                        <input type="hidden" name="status_email" id="status_email" value="" required>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                                            <span id="pass_conf1"></span>
                                            <span id="pass_conf"></span>
                                            <!-- <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div> -->
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Password Confirmation</label>
                                            <input id="password2" type="password" class="form-control" name="password2" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="show_pass" class="custom-control-input" tabindex="3" id="show_pass">
                                            <label class="custom-control-label" for="show_pass">Show Password</label>
                                        </div>
                                    </div>

                                    <div class="form-divider">
                                        Alamat
                                    </div>
                                    <div class="form-group">
                                        <textarea id="alamat" class="form-control" name="alamat" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                        <a href="<?= base_url('landing/login') ?>" class="btn btn-outline-primary btn-lg btn-block">
                                            Batal
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Sudah Memiliki Akun? <a href="<?= base_url('landing/login') ?>">Masuk</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; TRASH.ID 2022
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#show_pass').click(function() {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                    $('#password2').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                    $('#password2').attr('type', 'password');
                }
            });
        });

        $(document).ready(function() {
            $('#email').blur(function() {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('landing/check_email'); ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == "ok") {
                            $('#email_result').html('<font color="red">*Email Tidak Tersedia</font>');
                            $('#status_email').val('tidak tersedia');
                        } else {
                            $('#email_result').html('<font color="green" class="ml-2">*email Tersedia</font>');
                            $('#status_email').val('tersedia');
                        }
                    }
                });
            });
        });

        $('#password').on('input', function() {
            var pass = $(this).val();
            if (pass.length < 5) {
                $('#pass_conf1').html('*Password Terlalu Pendek').css('color', 'red');
            } else {
                $('#pass_conf1').html('');
            }
        });

        $('#password, #password2').on('keyup', function() {
            if ($('#password').val() == $('#password2').val()) {
                $('#pass_conf').html('*Password Cocok').css('color', 'green');
            } else {
                $('#pass_conf').html('*Password Tidak Cocok').css('color', 'red');
            }
        });
    </script>