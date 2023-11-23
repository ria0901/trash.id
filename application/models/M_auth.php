<?php

class M_auth extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function cekUser($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    function data_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->where('u.id_user', $id_user);
        $query = $this->db->get();
        return $query->row_array();
    }

    function cek_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    function tambah_user($data)
    {
        return $this->db->insert('user', $data);
    }

    function update_profile($where, $data)
    {
        return $this->db->update('user', $data, $where);
    }

    function data_produk()
    {
        $this->db->select('*');
        $this->db->from('ketersediaansampah');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getDataProduk($kode_produk)
    {
        $this->db->select('*');
        $this->db->from('ketersediaansampah');
        $this->db->join('user', 'user.id_user = ketersediaansampah.id_penjual');
        $this->db->where('kode_produk', $kode_produk);
        $query = $this->db->get();
        return $query->row_array();
    }

    function tambah_keranjang($data)
    {
        return $this->db->insert('informasipemesanansampah', $data);
    }

    function tambah_pesanan($data)
    {
        return $this->db->insert('detaildatapemesanan', $data);
    }

    function data_pesanan($id_user)
    {
        $this->db->select('*');
        $this->db->from('detaildatapemesanan d');
        $this->db->join('informasistatuspemesanansampah i', 'd.id_informasiStatus = i.id_informasiStatus');
        $this->db->join('user u', 'u.id_user = d.id_pembeli');
        $this->db->where('id_user', $id_user);
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

    function tambah_bayar($data)
    {
        return $this->db->insert('pembayaranpembelisampah', $data);
    }

    function edit_pemesanan($where, $data)
    {
        return $this->db->update('detaildatapemesanan', $data, $where);
    }

    function edit_pembayaran($where, $data)
    {
        return $this->db->update('pembayaranpembelisampah', $data, $where);
    }

    function getPembayaran($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('pembayaranpembelisampah');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getProses()
    {
        $this->db->select('*');
        // $this->db->from('statuspembuatansampah');
        $query = $this->db->get();
        return $query->result_array();
    }

    function tambah_aduan($data)
    {
        $this->db->insert('aduanpembeli', $data);
    }

    function getDataAduan($id_user)
    {
        $this->db->select('*');
        $this->db->from('aduanpembeli d');
        $this->db->join('user u', 'u.id_user = d.id_pembeli');
        $this->db->where('id_pembeli', $id_user);
        $query = $this->db->get();
        return $query->result_array();
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
