<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->helper('tgl_indo');
    }

    public function index()
    {
        $data['title'] = 'TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['data_produk'] = $this->M_auth->data_produk();
        $data['keranjang'] = $this->cart->contents();

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('landing/index', $data);
        $this->load->view('landing/footer');
    }

    public function login()
    {
        $data['title'] = 'Masuk | TRASH.ID';
        $this->load->view('landing/meta', $data);
        $this->load->view('landing/login');
        $this->load->view('landing/footer');
    }

    public function proses_login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars($this->input->post('password'));

        $user = $this->M_auth->cekUser($email);
        $hash = password_hash($user['password'], PASSWORD_DEFAULT);

        if (password_verify(md5($password), $hash)) {
            $data = [
                'id_user' => $user['id_user'],
                'nama_user' => $user['nama_user'],
                'email' => $user['email'],
                'level_user' => $user['level_user']
            ];
            $this->session->set_userdata($data);

            if ($user['level_user'] == 2) {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => true,
                    'isi_pesan' => 'Berhasil Login, Selamat Datang!'
                ));
                redirect('landing');
            } else if ($user['level_user'] == 1) {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => true,
                    'isi_pesan' => 'Berhasil Login, Selamat Datang!'
                ));
                redirect('admin');
            } else {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => false,
                    'isi_pesan' => 'Username Atau Password Salah, Silahkan Coba Lagi!'
                ));
                redirect('landing/login');
            }
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Username Atau Password Salah, Silahkan Coba Lagi!'
            ));
            redirect('landing/login');
        }
    }

    public function register()
    {
        $data['title'] = 'Daftar | TRASH.ID';
        $this->load->view('landing/meta', $data);
        $this->load->view('landing/register');
        $this->load->view('landing/footer');
    }

    public function proses_register()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|matches[password]');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }

        $data = [
            'nama_user' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => md5(htmlspecialchars($this->input->post('password', true))),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'level_user' => 2,
            'foto_profil' => "default.jpg",
            'tgl_daftar' => date('Y-m-d')
        ];

        if (empty($pesan)) {
            $result = $this->M_auth->tambah_user($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid'
            ));
            redirect('landing/register');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Akun Berhasil Didaftarkan'
            ));
            redirect('landing/login');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Akun Gagal Didaftarkan'
            ));
            redirect('landing/register');
        }
    }

    public function check_email()
    {
        $email = $this->input->post("email");
        $cekUser = $this->M_auth->cek_email($email);
        if ($cekUser > 0) {
            echo "ok";
        }
    }

    public function profile()
    {
        $data['title'] = 'Profil | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('landing/footer');
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profil | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/edit_profile', $data);
        $this->load->view('landing/footer');
    }

    public function update_profile()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }

        $config['upload_path']          = 'assets/images/img_profil';  // folder upload 
        $config['allowed_types']        = 'gif|jpg|png|jpeg'; // jenis file
        $config['max_size']             = 8000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $image = $_FILES['image']['size'] != 0 ? $file['file_name'] : $this->input->post('image1');

        $update = [
            'nama_user' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jk', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'tgl_daftar' => date('d-M-Y'),
            'foto_profil' => $image,
        ];

        $where = array(
            'id_user' => htmlspecialchars($this->input->post('id_user', true))
        );

        if (empty($pesan)) {
            $result = $this->M_auth->update_profile($where, $update);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid'
            ));
            redirect('landing/edit_profile');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Update Profile Berhasil'
            ));
            redirect('landing/profile');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Update Profile Gagal'
            ));
            redirect('landing/edit_profile');
        }
    }

    public function detail_produk($kode_produk)
    {
        $data['title'] = 'Detail Produk | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['data_produk'] = $this->M_auth->getDataProduk($kode_produk);
        $data['keranjang'] = $this->cart->contents();

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/detail_produk', $data);
        $this->load->view('landing/footer');
    }

    public function tambah_keranjang()
    {
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        if (!empty($data['data_user'])) {
            $kode_produk = htmlspecialchars($this->input->post('kode_produk'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $qty = htmlspecialchars($this->input->post('qty'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $gambar = htmlspecialchars($this->input->post('gambar'));

            $data_produk = $this->M_auth->getDataProduk($kode_produk);

            if ($qty > $data_produk['jumlah_ketersediaan']) {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => false,
                    'isi_pesan' => 'Jumlah Stok Tidak Mencukupi'
                ));
                redirect('landing/detail_produk/' . $kode_produk);
            }

            $data = array(
                'id' => $kode_produk,
                'name' => $nama,
                'qty' => $qty,
                'price' => $harga,
                'gambar' => $gambar
            );
            $result = $this->cart->insert($data);
            if ($result == true) {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => true,
                    'isi_pesan' => 'Berhasil Memasukkan Ke Keranjang'
                ));
                redirect('landing/detail_produk/' . $kode_produk);
            } else {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => false,
                    'isi_pesan' => 'Gagal Memasukkan Ke Keranjang'
                ));
                redirect('landing/detail_produk/' . $kode_produk);
            }
        } else {
            redirect('landing/login');
        }
    }

    public function lihat_keranjang()
    {
        $data['title'] = 'Lihat Keranjang | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/lihat_keranjang', $data);
        $this->load->view('landing/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('landing/lihat_keranjang');
    }

    public function hapus_item($rowid)
    {
        $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
        redirect('landing/lihat_keranjang');
    }

    public function checkout()
    {
        $data['title'] = 'Checkout | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/checkout', $data);
        $this->load->view('landing/footer');
    }

    public function proses_checkout()
    {
        $keranjang = $this->cart->contents();

        $pesan = array();

        $pesanan = array();
        foreach ($keranjang as $k) {
            $data = array(
                'kode_produk' => $k['id'],
                'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true)),
                'jumlah_sampah' => $k['qty'],
                'total_harga' => $k['subtotal'],
            );
            $pesanan[] = $data;
        }


        $data = array(
            'id_pembeli' => htmlspecialchars($this->input->post('id_user', true)),
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true)),
            'total_hargaPemesanan' => $this->cart->total(),
            'tgl_pemesanan' => date('Y-m-d'),
            'bulan_pemesanan' => date('F'),
            'id_informasiStatus' => 1
        );

        foreach ($pesanan as $p) {
            $this->M_auth->tambah_keranjang($p);
        }

        $result = $this->M_auth->tambah_pesanan($data);
        if ($result == true) {
            $this->cart->destroy();
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Checkout Berhasil Dilakukan'
            ));
            redirect('landing/lihat_keranjang');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Checkout Gagal Dilakukan'
            ));
            redirect('landing/checkout');
        }
    }

    public function lihat_pesanan()
    {
        $data['title'] = 'Pesanan | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();
        $data['pesanan'] = $this->M_auth->data_pesanan($this->session->userdata('id_user'));

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/lihat_pesanan', $data);
        $this->load->view('landing/footer');
    }

    public function bayar($kode_transaksi)
    {
        $data['title'] = 'Bayar | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();
        $data['data_pesanan'] = $this->M_auth->getPesanan($kode_transaksi);
        $data['produk'] = $this->M_auth->getItem($kode_transaksi);

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/bayar', $data);
        $this->load->view('landing/footer');
    }

    public function proses_bayar()
    {
        $pesan = array();

        $config['upload_path']          = 'assets/images/bukti_pembayaran/';  // folder upload 
        $config['allowed_types']        = 'pdf|jpg|png|jpeg'; // jenis file
        $config['max_size']             = 8000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti_pembayaran')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $bukti = $file['file_name'];

        $data = [
            'id_detailDataPemesanan' => htmlspecialchars($this->input->post('id_pemesanan', true)),
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true)),
            'tgl_pembayaran' => date('Y-m-d'),
            'metode_pembayaran' => 'Transfer',
            'bukti_pembayaran' => $bukti
        ];

        $this->M_auth->tambah_bayar($data);

        $update = [
            'id_informasiStatus' => 2
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi', true))
        );

        if (empty($pesan)) {
            $result = $this->M_auth->edit_pemesanan($where, $update);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid'
            ));
            redirect('landing/bayar/' . $this->input->post('kode_transaksi'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Pembayaran Berhasil'
            ));
            redirect('landing/lihat_pesanan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Pembayaran Gagal'
            ));
            redirect('landing/bayar/' . $this->input->post('kode_transaksi'));
        }
    }

    public function detail_pesanan($kode_transaksi)
    {
        $data['title'] = 'Detail Pesanan | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();
        $data['data_pesanan'] = $this->M_auth->getPesanan($kode_transaksi);
        $data['produk'] = $this->M_auth->getItem($kode_transaksi);
        $data['pembayaran'] = $this->M_auth->getPembayaran($kode_transaksi);

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/detail_pesanan', $data);
        $this->load->view('landing/footer');
    }

    public function pesanan_diterima($kode_transaksi)
    {
        $update = [
            'id_informasiStatus' => 6,
        ];
        $where = array(
            'kode_transaksi' => $kode_transaksi
        );
        $result = $this->M_auth->edit_pemesanan($where, $update);
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Berhasil Merubah Status'
            ));
            redirect('landing/lihat_pesanan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Gagal Merubah Status'
            ));
            redirect('landing/lihat_pesanan');
        }
    }

    public function bayar_ulang()
    {
        $pesan = array();

        $config['upload_path']          = 'assets/images/bukti_pembayaran';  // folder upload 
        $config['allowed_types']        = 'pdf|jpg|png|jpeg'; // jenis file
        $config['max_size']             = 8000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $image = $_FILES['image']['size'] != 0 ? $file['file_name'] : $this->input->post('image1');

        $update = [
            'bukti_pembayaran' => $image
        ];

        $where = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi'))
        );

        $this->M_auth->edit_pembayaran($where, $update);


        $data = [
            'id_informasiStatus' => 2
        ];

        $kode = array(
            'kode_transaksi' => htmlspecialchars($this->input->post('kode_transaksi'))
        );

        $result = $this->M_auth->edit_pemesanan($kode, $data);
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Berhasil Merubah Status'
            ));
            redirect('landing/lihat_pesanan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Gagal Merubah Status'
            ));
            redirect('landing/lihat_pesanan');
        }
    }

    public function proses_pembuatan($kode_produk)
    {
        $data['title'] = 'Proses Pembuatan | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();
        $data['produk'] = $this->M_auth->getDataProduk($kode_produk);
        $data['status'] = $this->M_auth->getProses();

        if (!empty($data['data_user'])) {
            $this->load->view('landing/meta', $data);
            $this->load->view('landing/header', $data);
            $this->load->view('user/proses_pembuatan', $data);
            $this->load->view('landing/footer');
        } else {
            redirect('landing/login');
        }
    }

    public function aduan_pembeli()
    {
        $data['title'] = 'Aduan Pembeli | TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();
        $data['aduan'] = $this->M_auth->getDataAduan($this->session->userdata('id_user'));

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/aduan_pembeli', $data);
        $this->load->view('landing/footer');
    }

    public function form_aduan()
    {
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        if (!empty($data['data_user'])) {
            $data['title'] = 'Form Aduan | TRASH.ID';
            $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
            $data['keranjang'] = $this->cart->contents();

            $this->load->view('landing/meta', $data);
            $this->load->view('landing/header', $data);
            $this->load->view('user/form_aduan', $data);
            $this->load->view('landing/footer');
        } else {
            redirect('landing/login');
        }
    }

    public function proses_aduan()
    {

        $pesan = array();

        $kode = $this->input->post('kode_aduan');
        // $bukti = '';

        // if (!empty($gambar)) {
        $config['upload_path']          = 'assets/images/bukti_aduan/';  // folder upload 
        $config['allowed_types']        = 'gif|png|jpg|jpeg'; // jenis file
        $config['max_size']             = 8000;
        $config['file_name']            = $this->input->post('kode_aduan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti_aduan') && $_FILES['bukti_aduan']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $bukti = $file['file_name'];
        // }

        // var_dump($pesan);
        // die;

        $data = [
            'kode_aduan' => $kode,
            'id_pembeli' => htmlspecialchars($this->input->post('id_pembeli', true)),
            'desk_aduan' => htmlspecialchars($this->input->post('aduan', true)),
            'bukti_aduan' => $bukti,
            'status_aduan' => 1,
            'tgl_aduan' => date('Y-m-d')
        ];


        if (empty($pesan)) {
            $result = $this->M_auth->tambah_aduan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid'
            ));
            redirect('landing/form_aduan');
        }
        if ($result == null) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Aduan Berhasil Diajukan'
            ));
            redirect('landing/aduan_pembeli');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Aduan Gagal Diajukan'
            ));
            redirect('landing/form_aduan');
        }
    }

    public function detail_aduan($kode_aduan)
    {
        $data['title'] = 'Detail Aduan| TRASH.ID';
        $data['data_user'] = $this->M_auth->data_user($this->session->userdata('id_user'));
        $data['keranjang'] = $this->cart->contents();
        $data['aduan'] = $this->M_auth->getAduan($kode_aduan);

        $this->load->view('landing/meta', $data);
        $this->load->view('landing/header', $data);
        $this->load->view('user/detail_aduan', $data);
        $this->load->view('landing/footer');
    }

    public function logout()
    {
        session_destroy();
        redirect('landing');
    }
}
