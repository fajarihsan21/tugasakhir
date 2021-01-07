<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mrp_m extends CI_Model {

    // public function get($id = null)
    // {
    //     $this->db->distinct();
    //     $this->db->select('mrp.*, tb_mpp.id_bulan as id_bulan, bom.id_cm as id_cm');
    //     $this->db->from('mrp');
    //     $this->db->join('tb_mpp', 'tb_mpp.id_bulan = mrp.id_bulan');
    //     $this->db->join('bom', 'bom.id_cm = mrp.id_cm');
    //     if($id != null) {
    //         $this->db->where('id_mrp', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function get($tahun, $bulan)
    // {
    //     $query = "SELECT distinct tb_mpp.id_bulan as bulan, bom.id_cm as part_name, bom.kebutuhan/data_cm.komposisi*tb_mpp.jumlah as total FROM bom,data_cm,tb_mpp where tb_mpp.tahun = '$tahun' and tb_mpp.id_bulan = '$bulan'";
    //     return $this->db->query($query);
    // }

    public function get($tahun, $bulan)
    {
        // $querys = "SELECT DISTINCT (select part_name from data_cm where data_cm.id_cm=bom.id_cm) as part_name, (select nama_bulan from tb_bulan where tb_bulan.id_bulan=tb_mpp.id_bulan) as nama_bulan, (select (FLOOR(bom.kebutuhan/data_cm.komposisi*tb_mpp.jumlah)) where data_cm.id_cm=bom.id_cm and tb_bulan.id_bulan=tb_mpp.id_bulan and tb_mpp.tahun = '$tahun' and tb_mpp.id_bulan = '$bulan') as total FROM bom,data_cm,tb_mpp join tb_bulan on tb_mpp.id_bulan = tb_bulan.id_bulan where tb_mpp.tahun = '$tahun' and tb_mpp.id_bulan = '$bulan'";

        $query = "SELECT part_name, nama_bulan,sum(FLOOR(bom.kebutuhan/data_cm.komposisi*tb_mpp.jumlah)) as total FROM bom, data_cm, tb_mpp, tb_bulan where data_cm.id_cm = bom.id_cm and tb_bulan.id_bulan = tb_mpp.id_bulan and tb_mpp.tahun = '$tahun' and tb_mpp.id_bulan = '$bulan' and tb_mpp.id_mobil = bom.id_mobil GROUP BY part_name, nama_bulan ";
        return $this->db->query($query);
        // bom.kebutuhan/data_cm.komposisi*tb_mpp.jumlah
    }

    // public function get($tahun, $bulan)
    // {
    //     $query = "SELECT DISTINCT (select part_name from data_cm where data_cm.id_cm=bom.id_cm) as part_name, tb_mpp.id_bulan as bulan, FLOOR(bom.kebutuhan/data_cm.komposisi*tb_mpp.jumlah) as total FROM bom,data_cm,tb_mpp join tb_bulan on tb_mpp.id_bulan = tb_bulan.id_bulan where tb_mpp.tahun = '$tahun' and tb_mpp.id_bulan = '$bulan'";
    //     return $this->db->query($query);
    // }

    public function add($post)
    {
        $params = [
            'id_bulan' => $post['id_bulan'],
            'id_cm' => $post['id_cm'],
            'jumlah' => $post['jumlah'],
        ];
        $this->db->insert('mrp', $params);
    }

    public function edit($post)
    {
        $params = [
            'id_bulan' => $post['id_bulan'],
            'id_cm' => $post['id_cm'],
            'jumlah' => $post['jumlah'],
        ];
        $this->db->where('id_mrp', $post['id']);
        $this->db->update('mrp', $params);
    }

    public function del($id)
    {
        $this->db->where('id_mrp', $id);
        $this->db->delete('mrp');
    }
}