<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bulan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('tb_bulan');
		if($id != null) {
			$this->db->where('id_bulan', $id);
		}
		$query = $this->db->get();
		return $query;
	}
}