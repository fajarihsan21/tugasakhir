<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bom_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('bom.*, data_mobil.nama_mobil as nama_mobil, data_cm.part_name as part_name');
		$this->db->from('bom');
		$this->db->join('data_mobil', 'data_mobil.id_mobil = bom.id_mobil');
		$this->db->join('data_cm', 'data_cm.id_cm = bom.id_cm');
		if($id != null) {
			$this->db->where('id_bom', $id);
		}
		$query = $this->db->get();
		return $query;
		
		// $query = "SELECT bom*, GROUP_CONCAT(SELECT keterangan from bom_detail) FROM bom JOIN data_mobil ON bom.id_mobil=data_mobil.id_mobil ";
		// $this->db->select('*');
		// $this->db->from('bom');
		// $this->db->join('data_mobil', 'data_mobil.id_mobil = bom.id_mobil');
		// $query = $this->db->get();

		// return $query;
	}

	public function add($post)
	{
		$params = [
			'id_mobil' => $post['mobil'],
			'id_cm' => $post['id_cm'],
			'kebutuhan' => $post['kebutuhan'],
			'keterangan' => $post['keterangan'],
		];
		$this->db->insert('bom', $params);
	}

	// public function add($post)
	// {
	// 	$params = [
	// 		'id_mobil' => $post['mobil'],
	// 		'keterangan' => $post['keterangan'],
	// 	];
	// 	$this->db->insert('bom', $params);
	// }

	public function edit($post)
	{
		$params = [
			'id_bom' => $post['id_bom'],
			'id_mobil' => $post['mobil'],
			'id_cm' => $post['id_cm'],
			'kebutuhan' => $post['kebutuhan'],
			'keterangan' => $post['keterangan'],
		];
		$this->db->where('id_bom', $post['id_bom']);
		$this->db->update('bom', $params);
		
	}

	public function del($id)
	{
		$this->db->where('id_bom', $id);
		$this->db->delete('bom');
	}
}