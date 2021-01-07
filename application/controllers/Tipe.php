<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('tipe_m');
    }

    public function index()
    {
        $data['title'] = 'Tipe Mobil';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['row'] = $this->tipe_m->get();


        $this->load->view('templates/headeren' , $data);
        $this->load->view('data_master/tipe/tipe_data', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $tipe = new stdClass();
        $tipe->id_tipe = null;
        $tipe->tipe_mobil = null;
        $data = array(
            'page' => 'add',
            'row' => $tipe
        );
        $data['title'] = 'Tipe Mobil';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->tipe_m->get()->result();

         $this->load->view('templates/headeren' , $data);
         $this->load->view('data_master/tipe/tipe_form', $data);
         $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $query = $this->tipe_m->get($id);
        if($query->num_rows() > 0) {
            $tipe = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $tipe
            );
            $data['title'] = 'Tipe Mobil';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->tipe_m->get()->result();

         $this->load->view('templates/headeren' , $data);
         $this->load->view('data_master/tipe/tipe_form', $data);
         $this->load->view('templates/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('tipe')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->tipe_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->tipe_m->edit($post);
        }

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='".site_url('tipe')."';</script>";
    }

    public function del($id)
    {
        $this->tipe_m->del($id);
        if($this->db->affected_rows() > 0) {
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil dihapus </div>');
        }
       redirect('bom');
    }
}