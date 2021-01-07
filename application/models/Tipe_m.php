<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('tb_tipe');
		if($id != null) {
			$this->db->where('id_tipe', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			
			'tipe_mobil' => $post['tipe_mobil'],
		];
		$this->db->insert('tb_tipe', $params);
	}

	public function edit($post)
	{
		$params = [
			'tipe_mobil' => $post['tipe_mobil'],
		];
		$this->db->where('id_tipe', $post['id']);
		$this->db->update('tb_tipe', $params);
	}

	public function del($id)
	{
		$this->db->where('id_tipe', $id);
		$this->db->delete('tb_tipe');
	}
}