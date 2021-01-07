<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chemical extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model(['mrp_m', 'mpp_m', 'bom_m']);
    }

    // public function index()
    // {
    //     $data['title'] = 'MRP';
    //     $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
    //     $data['rows'] = $this->mrp_m->get();


    //     $this->load->view('templates/headerq' , $data);
    //     $this->load->view('mrp/mrp_data', $data);
    //     $this->load->view('templates/footer');

    // }
    
    public function index()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        $data['title'] = 'Chemical Waste';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['record'] = $this->mrp_m->get($tahun,$bulan)->result();



        $this->load->view('templates/headerq' , $data);
        $this->load->view('Chemical/chemical_data', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $mrp = new stdClass();
        $mrp->id_mrp = null;
        $mrp->id_bulan = null;
        $mrp->id_cm = null;
        $mrp->jumlah = null;

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
            'row' => $mrp,
            'mpp' => $mpp, 'selectedmpp' => null,
            'bom' => $bom, 'selectedbom' => null,
            
        );
        $data['title'] = 'MRP';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->mrp_m->get()->result();

         $this->load->view('templates/headerq' , $data);
         $this->load->view('Chemical/chemical_data', $data);
         $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $query = $this->mrp_m->get($id);
        if($query->num_rows() > 0) {
            $mrp = $query->row();

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
                'row' => $mrp,
                'mobil' => $mobil, 'selectedmobil' => $mrp->id_mobil,
                'cm' => $cm, 'selectedcm' => $mrp->id_cm
            );
            $data['title'] = 'MRP';
             $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
             $data['rows'] = $this->mrp_m->get()->result();

         $this->load->view('templates/headerppc' , $data);
         $this->load->view('Chemical/chemical_data', $data);
         $this->load->view('templates/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('mrp')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->mrp_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->mrp_m->edit($post);
        }

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='".site_url('mrp')."';</script>";
    }

    public function del($id)
    {
        $this->mrp_m->del($id);
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Dihapus');</script>"; 
        }
        echo "<script>window.location='".site_url('mrp')."';</script>";
    }

    public function print(){
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['record'] = $this->chemical_m->get($tahun,$bulan)->result();

        $this->load->view('chemical/print_b3', $data);

    }
}

