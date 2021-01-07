<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model(['mobil_m', 'tipe_m']);
    }

    public function index()
    {
        $data['title'] = 'Mobil';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('email')])->row_array();
        $data['rows'] = $this->mobil_m->get();


        $this->load->view('templates/headeren' , $data);
        $this->load->view('data_master/mobil/mobil_data', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $mobil = new stdClass();
        $mobil->id_mobil = null;
        $mobil->kode_mobil = null;
        $mobil->nama_mobil = null;
        $mobil->id_tipe = null;
        $mobil->jenis_mobil = null;

        $query_tipe = $this->tipe_m->get();
        $tipe[null] = '-Pilih-';
        foreach ($query_tipe->result() as $unt) {
            $tipe[$unt->id_tipe] = $unt->tipe_mobil;
        }
        $data = array(
            'page' => 'add',
            'row' => $mobil,
            'tipe' => $tipe, 'selectedtipe' => null
        );

        $data['title'] = 'Mobil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['rows'] = $this->mobil_m->get()->result();

         $this->load->view('templates/headeren' , $data);
         $this->load->view('data_master/mobil/mobil_form', $data);
         $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $query = $this->mobil_m->get($id);
        if($query->num_rows() > 0) {
            $mobil = $query->row();

        $query_tipe = $this->tipe_m->get();
        $tipe[null] = '-Pilih-';
        foreach ($query_tipe->result() as $unt) {
            $tipe[$unt->id_tipe] = $unt->tipe_mobil;
        }
            $data = array(
                'page' => 'edit',
                'row' => $mobil,
                'tipe' => $tipe, 'selectedtipe' => $mobil->id_tipe
            );
            
        $data['title'] = 'Mobil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['rows'] = $this->mobil_m->get();
        $this->load->view('templates/headeren' , $data);
        $this->load->view('data_master/mobil/mobil_form', $data);
        $this->load->view('templates/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('mobil')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->mobil_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->mobil_m->edit($post);
        }


        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='".site_url('mobil')."';</script>";
    }

    public function del($id)
    {
        $this->mobil_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert"> Data berhasil dihapus </div>');
        }
       redirect('mobil');
    }
}