<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->helper('tgl_indo');
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        if (empty($data['data_user'])) {
            redirect('landing/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['total_pesanan'] = $this->M_admin->total_pesanan();
        $data['pesanan_masuk'] = $this->M_admin->total_pesanan_masuk();
        $data['pesanan_dikirim'] = $this->M_admin->total_pesanan_dikirim();
        $data['pesanan_selesai'] = $this->M_admin->total_pesanan_selesai();
        $data['pemasukan'] = $this->M_admin->pemasukan();
        $data['pengeluaran'] = $this->M_admin->pengeluaran();
        $keuangan = $this->M_admin->getKeuangan();
        $data['saldo'] = $keuangan['saldo_terakhir'];
        $data['total_user'] = $this->M_admin->total_user();
        $data['total_admin'] = $this->M_admin->total_admin();
        $data['total_pelanggan'] = $this->M_admin->total_pelanggan();
        $data['pesanan'] = $this->M_admin->pesanan_dashboard();
        $data['produk'] = $this->M_admin->produk_dashboard();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer', $data);
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/edit_profile', $data);
        $this->load->view('admin/footer', $data);
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
            'foto_profil' => $image,
        ];

        $where = array(
            'id_user' => htmlspecialchars($this->input->post('id_user', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_profile($where, $update);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid'
            ));
            redirect('admin/edit_profile/' . $this->input->post('id_user'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Update Profile Berhasil'
            ));
            redirect('admin/profile');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Update Profile Gagal'
            ));
            redirect('admin/edit_profile/' . $this->input->post('id_user'));
        }
    }

    public function daftar_produk($start = 0)
    {
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['title'] = 'Daftar Produk';

        $q = isset($_GET['search']) ? $_GET['search'] : '';
        $data['daftar_produk'] = $this->M_admin->tampil_produk();

        // $this->load->database();
        $jumlah_data = $this->M_admin->jumlah_produk($q);

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/daftar_produk');
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 20;
        $config['full_tag_open']   = '<ul class="pagination justify-content-end">';
        $config['full_tag_close']  = '</ul>';

        $config['first_link']      = 'First';
        $config['first_tag_open']  = '<li class="page-link tabindex="-1" aria-disabled="true"">';
        $config['first_tag_close'] = '</li>';

        $config['last_link']       = 'Last';
        $config['last_tag_open']   = '<li class="page-link">';
        $config['last_tag_close']  = '</li>';

        $config['next_tag_open']   = '<li class="page-link">';
        $config['next_tag_close']  = '</li>';

        $config['prev_tag_open']   = '<li class="page-link">';
        $config['prev_tag_close']  = '</li>';

        $config['cur_tag_open']    = '<li class="active page-item"><a class="page-link" href="#">';
        $config['cur_tag_close']   = '</a></li>';

        $config['num_tag_open']    = '<li class="page-link">';
        $config['num_tag_close']   = '</li>';
        $this->pagination->initialize($config);
        $data['page_produk'] = $this->M_admin->data_produk($config['per_page'], $start, $q);
        $data['start'] = $start;
        $data['keyword'] = $q;
        $data['Pagination'] = $this->pagination->create_links();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/daftar_produk', $data);
        $this->load->view('admin/footer');
    }

    public function restock_produk($start = 0)
    {
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['title'] = 'Restock Produk';

        $q = isset($_GET['search']) ? $_GET['search'] : '';
        $data['daftar_produk'] = $this->M_admin->tampil_produk();

        // $this->load->database();
        $jumlah_data = $this->M_admin->jumlah_produk($q);

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/daftar_produk');
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 20;
        $config['full_tag_open']   = '<ul class="pagination justify-content-end">';
        $config['full_tag_close']  = '</ul>';

        $config['first_link']      = 'First';
        $config['first_tag_open']  = '<li class="page-link tabindex="-1" aria-disabled="true"">';
        $config['first_tag_close'] = '</li>';

        $config['last_link']       = 'Last';
        $config['last_tag_open']   = '<li class="page-link">';
        $config['last_tag_close']  = '</li>';

        $config['next_tag_open']   = '<li class="page-link">';
        $config['next_tag_close']  = '</li>';

        $config['prev_tag_open']   = '<li class="page-link">';
        $config['prev_tag_close']  = '</li>';

        $config['cur_tag_open']    = '<li class="active page-item"><a class="page-link" href="#">';
        $config['cur_tag_close']   = '</a></li>';

        $config['num_tag_open']    = '<li class="page-link">';
        $config['num_tag_close']   = '</li>';
        $this->pagination->initialize($config);
        $data['page_produk'] = $this->M_admin->data_produk($config['per_page'], $start, $q);
        $data['start'] = $start;
        $data['keyword'] = $q;
        $data['Pagination'] = $this->pagination->create_links();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/restock_produk', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_produk()
    {
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['title'] = 'Tambah Produk';

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tambah_produk', $data);
        $this->load->view('admin/footer');
    }

    public function proses_tambah_produk()
    {
        $pesan = array();

        $config['upload_path']          = 'assets/images/foto_produk/';  // folder upload 
        $config['allowed_types']        = 'gif|jpg|png|jpeg'; // jenis file
        $config['max_size']             = 8000;
        $config['file_name']            = $this->input->post('kode_produk');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto_produk')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $produk = $file['file_name'];

        $data = [
            'kode_produk' => htmlspecialchars($this->input->post('kode_produk')),
            'nama_sampah' => htmlspecialchars($this->input->post('nama')),
            'id_penjual' => htmlspecialchars($this->input->post('id_user')),
            // 'ukuran_sampah' => htmlspecialchars($this->input->post('ukuran_sampah')),
            'jumlah_ketersediaan' => htmlspecialchars($this->input->post('jumlah_produk')),
            'harga_sampah' => htmlspecialchars($this->input->post('harga_produk')),
            'foto_sampah' => $produk,
            'status_pembuatan' => 8,
            'tgl_produksi' => date('Y-m-d'),
            'tgl_restock' => date('Y-m-d')
        ];
        if (empty($pesan)) {
            $result = $this->M_admin->tambah_produk($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid'
            ));
            redirect('admin/tambah_produk');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Tambah Produk Baru Berhasil'
            ));
            redirect('admin/daftar_produk');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Tambah Produk Baru Gagal'
            ));
            redirect('admin/tambah_produk');
        }
    }

    public function getKodeProduk()
    {
        $hasil = $this->db->query("select id_ketersediaansampah, kode_produk from ketersediaansampah");
        $acak = random_string('alnum', 3);

        if ($hasil->num_rows() > 0) {
            $nmr = explode('_', $hasil->row()->kode_produk);
            $slice = substr($nmr[1], 3);
            $merge = sprintf("%1d", (int)$slice + 1);
            $data = $acak . $merge;
        } else {
            $data = $acak . '1';
        }
        echo json_encode($data);
    }

    public function detail_produk($kode_produk)
    {
        $data['title'] = 'Detail Produk';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['data_produk'] = $this->M_admin->getDataProduk($kode_produk);

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/detail_produk', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_stok()
    {
        $kode_produk = htmlspecialchars($this->input->post('kode_produk'));
        $stok_baru = htmlspecialchars($this->input->post('jumlah_stok'));
        $jumlah_produk = $this->M_admin->getJumlahStok($kode_produk);
        $jumlah = intval($jumlah_produk['jumlah_ketersediaan']) + intval($stok_baru);
        $update = [
            'jumlah_ketersediaan' => strval($jumlah),
            'tgl_restock' => date('Y-m-d')
        ];
        $where = [
            'kode_produk' => $kode_produk
        ];
        $result = $this->M_admin->update_stok($where, $update);
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Tambah Stok Berhasil'
            ));
            redirect('admin/daftar_produk');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Tambah Stok Gagal'
            ));
            redirect('admin/daftar_produk');
        }
    }

    public function edit_produk($kode_produk)
    {
        $data['title'] = 'Edit Produk';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['data_produk'] = $this->M_admin->getDataProduk($kode_produk);

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/edit_produk', $data);
        $this->load->view('admin/footer');
    }

    public function proses_edit_produk()
    {
        $pesan = array();

        $config['upload_path']          = 'assets/images/foto_produk';  // folder upload 
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
            'nama_sampah' => htmlspecialchars($this->input->post('nama', true)),
            // 'ukuran_sampah' => htmlspecialchars($this->input->post('ukuran_sampah', true)),
            'harga_sampah' => htmlspecialchars($this->input->post('harga_produk', true)),
            'foto_sampah' => $image
        ];

        $where = array(
            'kode_produk' => htmlspecialchars($this->input->post('kode_produk', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_stok($where, $update);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid'
            ));
            redirect('admin/edit_produk/' . $this->input->post('kode_produk'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Update Produk Berhasil'
            ));
            redirect('admin/daftar_produk');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Update Produk Gagal'
            ));
            redirect('admin/edit_produk/' . $this->input->post('kode_produk'));
        }
    }

    public function hapus_produk($kode_produk)
    {
        $where = array('kode_produk' => $kode_produk);
        $result = $this->M_admin->hapus_produk($where, 'ketersediaansampah');
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Hapus Produk Berhasil'
            ));
            redirect('admin/daftar_produk');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Hapus Produk Berhasil'
            ));
            redirect('admin/daftar_produk');
        }
    }

    public function daftar_pesanan()
    {
        $data['title'] = 'Daftar Pesanan | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['pesanan'] = $this->M_admin->data_pesanan();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/daftar_pesanan', $data);
        $this->load->view('admin/footer');
    }

    public function detail_pesanan($kode_transaksi)
    {
        $data['title'] = 'Detail Pesanan | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['data_pesanan'] = $this->M_admin->getPesanan($kode_transaksi);
        $data['produk'] = $this->M_admin->getItem($kode_transaksi);
        $data['pembayaran'] = $this->M_admin->getPembayaran($kode_transaksi);

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/detail_pesanan', $data);
        $this->load->view('admin/footer');
    }

    public function konfirmasi_pembayaran($kode_transaksi)
    {
        $data['data_pesanan'] = $this->M_admin->getPesanan($kode_transaksi);
        $nominal = $data['data_pesanan']['total_hargaPemesanan'];
        $data['produk'] = $this->M_admin->getItem($kode_transaksi);
        $dataKeuangan = $this->M_admin->getKeuangan();
        foreach ($data['produk'] as $p) {
            $total = $p['jumlah_ketersediaan'] - $p['jumlah_sampah'];
            $data = array(
                'jumlah_ketersediaan' => $total
            );
            $this->db->where('kode_produk', $p['kode_produk']);
            $this->db->update('ketersediaansampah', $data);
        }

        if ($dataKeuangan == null) {
            $saldo = $nominal;
        } else {
            $saldo = $dataKeuangan['saldo_terakhir'] + $nominal;
        }

        $keuangan = [
            'nominal' => $nominal,
            'jenis' => 'Pemasukan',
            'saldo_terakhir' => $saldo,
            'tanggal' => date('Y-m-d'),
            'bulan' => date('F'),
            'keterangan' => 'Pemasukan Dari Pemesanan Dengan Kode ' . $kode_transaksi
        ];

        $this->M_admin->tambah_keuangan($keuangan);

        $update = [
            'id_informasiStatus' => 3,
        ];
        $where = array(
            'kode_transaksi' => $kode_transaksi
        );
        $result = $this->M_admin->edit_pemesanan($where, $update);
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Konfirmasi Pembayaran Berhasil'
            ));
            redirect('admin/daftar_pesanan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Konfirmasi Pembayaran Gagal'
            ));
            redirect('admin/daftar_pesanan');
        }
    }

    public function tolak_pembayaran($kode_transaksi)
    {
        $update = [
            'id_informasiStatus' => 4,
        ];
        $where = array(
            'kode_transaksi' => $kode_transaksi
        );
        $result = $this->M_admin->edit_pemesanan($where, $update);
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Tolak Pembayaran Berhasil'
            ));
            redirect('admin/daftar_pesanan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Tolak Pembayaran Gagal'
            ));
            redirect('admin/daftar_pesanan');
        }
    }

    public function kirim_pesanan($kode_transaksi)
    {
        $update = [
            'id_informasiStatus' => 5,
        ];
        $where = array(
            'kode_transaksi' => $kode_transaksi
        );
        $result = $this->M_admin->edit_pemesanan($where, $update);
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Berhasil Merubah Status'
            ));
            redirect('admin/daftar_pesanan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Gagal Merubah Status'
            ));
            redirect('admin/daftar_pesanan');
        }
    }

    public function proses_pembuatan($kode_produk)
    {
        $data['title'] = 'Proses Pembuatan | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['produk'] = $this->M_admin->getDataProduk($kode_produk);
        $data['status'] = $this->M_admin->getStatus();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/proses_pembuatan', $data);
        $this->load->view('admin/footer');
    }

    public function update_produk()
    {
        $dataKeuangan = $this->M_admin->getKeuangan();
        $nominal = htmlspecialchars($this->input->post('pengeluaran', true));
        $kode_produk = htmlspecialchars($this->input->post('kode_produk', true));
        $status = htmlspecialchars($this->input->post('status_pembuatan', true));
        $stok = htmlspecialchars($this->input->post('stok_produk', true));
        $stok_hasil = htmlspecialchars($this->input->post('jumlah_stok', true));
        $pembuatan = 0;

        if ($status == 8) {
            $pembuatan = 1;
        } elseif ($status == 1) {
            $pembuatan = 2;
        } elseif ($status == 2) {
            $pembuatan = 3;
        } elseif ($status == 3) {
            $pembuatan = 4;
        } elseif ($status == 4) {
            $pembuatan = 5;
        } elseif ($status == 5) {
            $pembuatan = 6;
        } elseif ($status == 6) {
            $pembuatan = 7;
        } elseif ($status == 7) {
            $pembuatan = 8;
        }

        if ($status == 7) {
            $stok_baru = (int)$stok + (int)$stok_hasil;
            $update = [
                'jumlah_ketersediaan' => $stok_baru,
                'status_pembuatan' => $pembuatan,
                'tgl_restock' => date('Y-m-d')
            ];
        } else {
            $update = [
                'status_pembuatan' => $pembuatan
            ];
        }

        $where = array(
            'kode_produk' => $kode_produk
        );


        $this->M_admin->update_produk($where, $update);

        $saldo = $dataKeuangan['saldo_terakhir'] - (int)$nominal;

        $keuangan = [
            'nominal' => $nominal,
            'jenis' => 'Pengeluaran',
            'saldo_terakhir' => $saldo,
            'tanggal' => date('Y-m-d'),
            'bulan' => date('F'),
            'keterangan' => 'Pengeluaran Pembuatan sampah Dengan Kode Produk ' . $kode_produk
        ];

        $this->M_admin->tambah_keuangan($keuangan);

        redirect('admin/proses_pembuatan/' . $kode_produk);
    }

    public function laporan_keuangan()
    {
        $data['title'] = 'Laporan Keuangan | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['keuangan'] = $this->M_admin->data_keuangan();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/laporan_keuangan', $data);
        $this->load->view('admin/footer');
    }

    public function aduan_pembeli()
    {
        $data['title'] = 'Daftar Aduan Pembeli | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['aduan'] = $this->M_admin->getDataAduan();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/aduan_pembeli', $data);
        $this->load->view('admin/footer');
    }

    public function baca_aduan($kode_aduan)
    {
        $update = [
            'status_aduan' => 2
        ];

        $where = array(
            'kode_aduan' => $kode_aduan
        );

        $this->M_admin->update_aduan($where, $update);
        redirect('admin/detail_aduan/' . $kode_aduan);
    }

    public function detail_aduan($kode_produk)
    {
        $data['title'] = 'Detail Aduan | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['aduan'] = $this->M_admin->getAduan($kode_produk);

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/detail_aduan', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_pengeluaran()
    {
        $data['title'] = 'Tambah Pengeluaran | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tambah_pengeluaran', $data);
        $this->load->view('admin/footer');
    }

    public function proses_tambah_pengeluaran()
    {
        $dataKeuangan = $this->M_admin->getKeuangan();
        $nominal = htmlspecialchars($this->input->post('pengeluaran', true));

        $saldo = $dataKeuangan['saldo_terakhir'] - (int)$nominal;

        $keuangan = [
            'nominal' => $nominal,
            'jenis' => 'Pengeluaran',
            'saldo_terakhir' => $saldo,
            'tanggal' => date('Y-m-d'),
            'bulan' => date('F'),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
        ];

        $result = $this->M_admin->tambah_keuangan($keuangan);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Berhasil Menambah Pengeluaran'
            ));
            redirect('admin/laporan_keuangan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Gagal Menambah Pengeluaran'
            ));
            redirect('admin/tambah_pengeluaran');
        }
    }

    public function edit_pengeluaran($id_pengeluaran)
    {
        $data['title'] = 'Edit Pengeluaran | TRASH.ID';
        $data['data_user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['pengeluaran'] = $this->M_admin->getPengeluaran($id_pengeluaran);

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/edit_pengeluaran', $data);
        $this->load->view('admin/footer');
    }

    public function proses_edit_pengeluaran()
    {
        $id_keuangan = htmlspecialchars($this->input->post('id_keuangan', true));
        $saldo_terakhir = $this->M_admin->saldo((int)$id_keuangan - 1);
        $nominal = htmlspecialchars($this->input->post('pengeluaran', true));

        $saldo = $saldo_terakhir['saldo_terakhir'] - (int)$nominal;

        $update = [
            'nominal' => $nominal,
            'saldo_terakhir' => $saldo,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
        ];

        $where = array('id_laporanKeuangan' => $id_keuangan);

        $result = $this->M_admin->update_keuangan($where, $update);

        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Berhasil Merubah Pengeluaran'
            ));
            redirect('admin/laporan_keuangan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Gagal Merubah Pengeluaran'
            ));
            redirect('admin/edit_pengeluaran/' . $id_keuangan);
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('landing');
    }
}
