<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cm_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('data_cm');
		if($id != null) {
			$this->db->where('id_cm', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			
			'part_number' => $post['part_number'],
			'part_name' => $post['part_name'],
			'komposisi' => $post['komposisi'],
			'satuan' => $post['satuan'],
			'harga' => $post['harga'],
			'leadtime' => $post['leadtime'],
			'ohi' => $post['ohi'],
			'keterangan' => $post['keterangan'],
		];
		$this->db->insert('data_cm', $params);
	}

	public function edit($post)
	{
		$params = [
			'part_number' => $post['part_number'],
			'part_name' => $post['part_name'],
			'komposisi' => $post['komposisi'],
			'satuan' => $post['satuan'],
			'harga' => $post['harga'],
			'leadtime' => $post['leadtime'],
			'ohi' => $post['ohi'],
			'keterangan' => $post['keterangan'],
		];
		$this->db->where('id_cm', $post['id']);
		$this->db->update('data_cm', $params);
	}

	public function del($id)
	{
		$this->db->where('id_cm', $id);
		$this->db->delete('data_cm');
	}
}