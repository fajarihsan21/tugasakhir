<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('data_supplier');
		if($id != null) {
			$this->db->where('id_supplier', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			
			'kode_supplier' => $post['kode_supplier'],
			'nama_supplier' => $post['nama_supplier'],
			'address' => $post['address'],
			'phone' => $post['phone'],
		];
		$this->db->insert('data_supplier', $params);
	}

	public function edit($post)
	{
		$params = [
			'kode_supplier' => $post['kode_supplier'],
			'nama_supplier' => $post['nama_supplier'],
			'address' => $post['address'],
			'phone' => $post['phone'],
		];
		$this->db->where('id_supplier', $post['id']);
		$this->db->update('data_supplier', $params);
	}

	public function del($id)
	{
		$this->db->where('id_supplier', $id);
		$this->db->delete('data_supplier');
	}
}