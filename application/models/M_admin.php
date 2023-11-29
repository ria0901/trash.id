<?php

class M_admin extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function data_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->where('u.id_user', $id_user);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_profile($where, $data)
    {
        return $this->db->update('user', $data, $where);
    }

    function tampil_produk()
    {
        $this->db->select('*');
        $this->db->from('ketersediaansampah p');
        $this->db->join('statuspembuatansampah k', 'k.id_statusPembuatansampah = p.status_pembuatan');
        $query = $this->db->get();
        return $query->result_array();
    }

    function jumlah_produk()
    {
        $this->db->select('*');
        $this->db->from('ketersediaansampah p');
        $this->db->join('statuspembuatansampah k', 'k.id_statusPembuatansampah = p.status_pembuatan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function data_produk($number, $offset, $keyword = '')
    {
        $this->db->select('*');
        $this->db->from('ketersediaansampah p');
        $this->db->join('statuspembuatansampah k', 'k.id_statusPembuatansampah = p.status_pembuatan');
        if (!empty($keyword)) {
            $this->db->like('id_ketersediaansampah', $keyword);
            $this->db->or_like('nama_sampah', $keyword);
        }
        $this->db->limit($number, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function tambah_produk($data)
    {
        return $this->db->insert('ketersediaansampah', $data);
    }

    function getDataProduk($kode_produk)
    {
        $this->db->select('*');
        $this->db->from('ketersediaansampah');
        $this->db->join('user', 'user.id_user = ketersediaansampah.id_penjual');
        $this->db->join('statuspembuatansampah', 'statuspembuatansampah.id_statusPembuatansampah = ketersediaansampah.status_pembuatan');
        $this->db->where('kode_produk', $kode_produk);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getJumlahStok($kode_produk)
    {
        $this->db->select('jumlah_ketersediaan');
        $this->db->from('ketersediaansampah');
        $this->db->where('kode_produk', $kode_produk);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_stok($where, $data)
    {
        return $this->db->update('ketersediaansampah', $data, $where);
    }

    function hapus_produk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function data_pesanan()
    {
        $this->db->select('*');
        $this->db->from('detaildatapemesanan d');
        $this->db->join('informasistatuspemesanansampah i', 'd.id_informasiStatus = i.id_informasiStatus');
        $this->db->join('user u', 'u.id_user = d.id_pembeli');
        // $this->db->where("i.nama_status != 'selesai' ");
        $query = $this->db->get();
        return $query->result_array();
    }

    function getPesanan($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('detaildatapemesanan d');
        $this->db->join('informasistatuspemesanansampah i', 'd.id_informasiStatus = i.id_informasiStatus');
        $this->db->join('user u', 'u.id_user = d.id_pembeli');
        $this->db->where('kode_transaksi', $kode_transaksi);
        // $this->db->where("i.nama_status != 'selesai' ");
        $query = $this->db->get();
        return $query->row_array();
    }

    function getItem($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('informasipemesanansampah i');
        $this->db->join('ketersediaansampah k', 'i.kode_produk = k.kode_produk');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getPembayaran($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('pembayaranpembelisampah');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    function edit_pemesanan($where, $data)
    {
        return $this->db->update('detaildatapemesanan', $data, $where);
    }

    function update_keuangan($where, $data)
    {
        return $this->db->update('laporankeuangan', $data, $where);
    }

    function getStatus()
    {
        $this->db->select('*');
        $this->db->from('statuspembuatansampah');
        $query = $this->db->get();
        return $query->result_array();
    }

    function update_produk($where, $data)
    {
        return $this->db->update('ketersediaansampah', $data, $where);
    }

    function getKeuangan()
    {
        $this->db->select('*');
        $this->db->from('laporankeuangan');
        $this->db->order_by('id_laporanKeuangan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function saldo($id_keuangan)
    {
        $this->db->select('saldo_terakhir');
        $this->db->from('laporankeuangan');
        $this->db->where('id_laporanKeuangan', $id_keuangan);
        $query = $this->db->get();
        return $query->row_array();
    }

    function tambah_keuangan($data)
    {
        return $this->db->insert('laporankeuangan', $data);
    }

    function data_keuangan()
    {
        $this->db->select('*');
        $this->db->from('laporankeuangan');
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getPengeluaran($id_pengeluaran)
    {
        $this->db->select('*');
        $this->db->from('laporankeuangan');
        $this->db->where('id_laporanKeuangan', $id_pengeluaran);
        $query = $this->db->get();
        return $query->row_array();
    }

    function total_pesanan()
    {
        $this->db->select('*');
        $this->db->from('detaildatapemesanan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function total_pesanan_masuk()
    {
        $this->db->select('*');
        $this->db->from('detaildatapemesanan');
        $this->db->where('id_informasiStatus >=', 1);
        $this->db->where('id_informasiStatus <=', 3);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function total_pesanan_dikirim()
    {
        $this->db->select('*');
        $this->db->from('detaildatapemesanan');
        $this->db->where('id_informasiStatus', 5);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function total_pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('detaildatapemesanan');
        $this->db->where('id_informasiStatus', 6);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function pemasukan()
    {
        $this->db->select_sum('nominal');
        $this->db->from('laporankeuangan');
        $this->db->where('jenis', 'Pemasukan');
        $query = $this->db->get();
        return $query->row_array();
    }

    function pengeluaran()
    {
        $this->db->select_sum('nominal');
        $this->db->from('laporankeuangan');
        $this->db->where('jenis', 'Pengeluaran');
        $query = $this->db->get();
        return $query->row_array();
    }

    function total_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function total_admin()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level_user', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function total_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level_user', 2);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function pesanan_dashboard()
    {
        $this->db->select('*');
        $this->db->from('detaildatapemesanan d');
        $this->db->join('informasistatuspemesanansampah i', 'd.id_informasiStatus = i.id_informasiStatus');
        $this->db->join('user u', 'u.id_user = d.id_pembeli');
        $this->db->where('d.id_informasiStatus >=', 1);
        $this->db->where('d.id_informasiStatus <=', 2);
        $this->db->order_by('id_detaildataPemesanan', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    function produk_dashboard()
    {
        $this->db->select('*');
        $this->db->from('ketersediaansampah');
        $this->db->order_by('id_ketersediaansampah', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getDataAduan()
    {
        $this->db->select('*');
        $this->db->from('aduanpembeli d');
        $this->db->join('user u', 'u.id_user = d.id_pembeli');
        $query = $this->db->get();
        return $query->result_array();
    }

    function update_aduan($where, $data)
    {
        return $this->db->update('aduanpembeli', $data, $where);
    }

    function getAduan($kode_aduan)
    {
        $this->db->select('*');
        $this->db->from('aduanpembeli d');
        $this->db->join('user u', 'u.id_user = d.id_pembeli');
        $this->db->where('kode_aduan', $kode_aduan);
        $query = $this->db->get();
        return $query->row_array();
    }
}
