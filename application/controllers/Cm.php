<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cm extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('cm_m');
    }

    public function index()
    {
        $data['title'] = 'Consumable Material';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['row'] = $this->cm_m->get();


        $this->load->view('templates/headerppc' , $data);
        $this->load->view('data_master/cm/cm_data', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $cm = new stdClass();
        $cm->id_cm = null;
        $cm->part_number = null;
        $cm->part_name = null;
        $cm->komposisi = null;
        $cm->satuan = null;
        $cm->harga = null;
        $cm->leadtime = null;
        $cm->ohi = null;
        $cm->keterangan = null;
        $data = array(
            'page' => 'add',
            'row' => $cm
        );
        $data['title'] = 'Consumable Material';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->cm_m->get()->result();

         $this->load->view('templates/headerppc' , $data);
         $this->load->view('data_master/cm/cm_form', $data);
         $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $query = $this->cm_m->get($id);
        if($query->num_rows() > 0) {
            $cm = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $cm
            );
        $data['title'] = 'Consumable Material';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->cm_m->get()->result();

         $this->load->view('templates/headerppc' , $data);
         $this->load->view('data_master/cm/cm_form', $data);
         $this->load->view('templates/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('cm')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->cm_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->cm_m->edit($post);
        }

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='".site_url('cm')."';</script>";
    }

    public function del($id)
    {
        $this->cm_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert"> Data berhasil dihapus </div>');
        }
       redirect('cm');
    }
}
