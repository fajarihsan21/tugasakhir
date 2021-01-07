<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mpp extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model(['mpp_m', 'bulan_m', 'mobil_m']);
    }

    public function index()
    {
        $data['title'] = '12 MPP';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->mpp_m->get();


        $this->load->view('templates/header' , $data);
        $this->load->view('12mpp/mpp_data', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $mpp = new stdClass();
        $mpp->id_mpp = null;
        $mpp->tahun = null;
        $mpp->id_bulan = null;
        $mpp->id_mobil = null;
        $mpp->jumlah = null;
        $mpp->keterangan = null;

        $query_bulan = $this->bulan_m->get();
        $bulan[null] = '-Pilih-';
        foreach ($query_bulan->result() as $unt) {
            $bulan[$unt->id_bulan] = $unt->nama_bulan;
        }

        $query_mobil = $this->mobil_m->get();
        $mobil[null] = '-Pilih-';
        foreach ($query_mobil->result() as $unt) {
            $mobil[$unt->id_mobil] = $unt->nama_mobil;
        }

        $data = array(
            'page' => 'add',
            'row' => $mpp,
            'bulan' => $bulan, 'selectedbulan' => null,
            'mobil' => $mobil, 'selectedmobil' => null,
            
        );
        $data['title'] = '12 MPP';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->mpp_m->get()->result();

         $this->load->view('templates/header' , $data);
         $this->load->view('12mpp/mpp_form', $data);
         $this->load->view('templates/footer');
    }

    public function edit($id)
    {

        $query = $this->mpp_m->get($id);
        if($query->num_rows() > 0) {
            $mpp = $query->row();

        $query_bulan = $this->bulan_m->get();
        $bulan[null] = '-Pilih-';
        foreach ($query_bulan->result() as $unt) {
            $bulan[$unt->id_bulan] = $unt->nama_bulan;
        }

        $query_mobil = $this->mobil_m->get();
        $mobil[null] = '-Pilih-';
        foreach ($query_mobil->result() as $unt) {
            $mobil[$unt->id_mobil] = $unt->nama_mobil;
        }

        $data = array(
            'page' => 'edit',
            'row' => $mpp,
            'bulan' => $bulan, 'selectedbulan' => $mpp->id_bulan,
            'mobil' => $mobil, 'selectedmobil' => $mpp->id_mobil,
            
        );
            $data['title'] = '12 MPP';
            $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
            $data['rows'] = $this->mpp_m->get()->result();

         $this->load->view('templates/header' , $data);
         $this->load->view('12mpp/mpp_form', $data);
         $this->load->view('templates/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('mpp')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->mpp_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->mpp_m->edit($post);
        }

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='".site_url('mpp')."';</script>";
    }

    public function del($id)
    {
        $this->mpp_m->del($id);
        if($this->db->affected_rows() > 0) {
             $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert"> Data berhasil dihapus </div>');
        }
       redirect('mpp');
    }
}