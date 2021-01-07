<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mpp_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('tb_mpp.*, tb_bulan.nama_bulan as nama_bulan, data_mobil.nama_mobil as nama_mobil');
		$this->db->from('tb_mpp');
		$this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_mpp.id_bulan');
		$this->db->join('data_mobil', 'data_mobil.id_mobil = tb_mpp.id_mobil');
		if($id != null) {
		$this->db->where('id_mpp', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'tahun' => $post['tahun'],
			'id_bulan' => $post['id_bulan'],
			'id_mobil' => $post['id_mobil'],
			'jumlah' => $post['jumlah'],
			'keterangan' => $post['keterangan'],
		];
		$this->db->insert('tb_mpp', $params);
	}

	public function edit($post)
	{
		$params = [
			'id_mpp' => $post['id_mpp'],
			'tahun' => $post['tahun'],
			'id_bulan' => $post['id_bulan'],
			'id_mobil' => $post['id_mobil'],
			'jumlah' => $post['jumlah'],
			'keterangan' => $post['keterangan'],
		];
		$this->db->where('id_mpp', $post['id_mpp']);
		$this->db->update('tb_mpp', $params);
	}

	public function del($id)
	{
		$this->db->where('id_mpp', $id);
		$this->db->delete('tb_mpp');
	}
}