<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ro extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model(['ro_m', 'cm_m', 'bom_m']);
    }

    // public function index()
    // {
    //     $data['title'] = 'ro';
    //     $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
    //     $data['rows'] = $this->ro_m->get();


    //     $this->load->view('templates/headerppc' , $data);
    //     $this->load->view('ro/ro_data', $data);
    //     $this->load->view('templates/footer');

    // }
    
    public function index()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        $data['title'] = 'Release Order';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['record'] = $this->ro_m->get($tahun,$bulan)->result();



        $this->load->view('templates/headerppc' , $data);
        $this->load->view('ro/ro_data', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $ro = new stdClass();
        $ro->id_ro = null;
        $ro->id_bulan = null;
        $ro->id_cm = null;
        $ro->jumlah = null;

        $query_mpp = $this->mpp_m->get();
        $mpp[null] = '-Pilih-';
        foreach ($query_mpp->result() as $unt) {
            $mpp[$unt->id_mpp] = $unt->nama_bulan;
        }

        $query_bom = $this->bom_m->get();
        $bom[null] = '-Pilih-';
        foreach ($query_bom->result() as $unt) {
            $bom[$unt->id_bom] = $unt->part_name;
        }

        $data = array(
            'page' => 'add',
            'row' => $ro,
            'mpp' => $mpp, 'selectedmpp' => null,
            'bom' => $bom, 'selectedbom' => null,
            
        );
        $data['title'] = 'ro';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->ro_m->get()->result();

         $this->load->view('templates/headerppc' , $data);
         $this->load->view('ro/ro_form', $data);
         $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $query = $this->ro_m->get($id);
        if($query->num_rows() > 0) {
            $ro = $query->row();

        $query_mpp = $this->mpp_m->get();
        $mpp[null] = '-Pilih-';
        foreach ($query_mpp->result() as $unt) {
            $mpp[$unt->id_mpp] = $unt->nama_bulan;
        }

        $query_bom = $this->mobil_m->get();
        $bom[null] = '-Pilih-';
        foreach ($query_bom->result() as $unt) {
            $bom[$unt->id_bom] = $unt->part_name;
        }

            $data = array(
                'page' => 'edit',
                'row' => $ro,
                'mobil' => $mobil, 'selectedmobil' => $ro->id_mobil,
                'cm' => $cm, 'selectedcm' => $ro->id_cm
            );
            $data['title'] = 'ro';
             $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
             $data['rows'] = $this->ro_m->get()->result();

         $this->load->view('templates/headerppc' , $data);
         $this->load->view('ro/ro_form', $data);
         $this->load->view('templates/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('ro')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->ro_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->ro_m->edit($post);
        }

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='".site_url('ro')."';</script>";
    }

    public function del($id)
    {
        $this->ro_m->del($id);
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Dihapus');</script>"; 
        }
        echo "<script>window.location='".site_url('ro')."';</script>";
    }

    public function print(){
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['record'] = $this->ro_m->get($tahun,$bulan)->result();
        
        $this->load->view('ro/printRo', $data);

    }
}


// Create/locate a new mysql database to install ro into
// Execute the file database/database.sql to create the tables needed
// unzip and upload ro files to web server
// Modify application/config/database.php to connect to your database
// Modify application/config/config.php encryption key with your own
// Go to your point of sale install via the browser
// LOGIN using
// username: admin
// password: ro12345
// Enjoy
