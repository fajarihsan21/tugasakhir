<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('data_mobil');
		$this->db->join('tb_tipe', 'tb_tipe.id_tipe = data_mobil.id_tipe');
		if($id != null) {
			$this->db->where('id_mobil', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			
			'kode_mobil' => $post['kode_mobil'],
			'nama_mobil' => $post['nama_mobil'],
			'id_tipe' => $post['id_tipe'],
			'jenis_mobil' => $post['jenis_mobil'],

			
		];
		$this->db->insert('data_mobil', $params);
	}

	public function edit($post)
	{
		$params = [
			'kode_mobil' => $post['kode_mobil'],
			'nama_mobil' => $post['nama_mobil'],
			'id_tipe' => $post['id_tipe'],
			'jenis_mobil' => $post['jenis_mobil'],
		];
		$this->db->where('id_mobil', $post['id']);
		$this->db->update('data_mobil', $params);
	}

	public function del($id)
	{
		$this->db->where('id_mobil', $id);
		$this->db->delete('data_mobil');
	}
}