<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bom extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model(['bom_m', 'mobil_m', 'cm_m']);
    }

    public function index()
    {
        $data['title'] = 'Bill of Material';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->bom_m->get();


        $this->load->view('templates/headeren' , $data);
        $this->load->view('bom/bom_data', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $bom = new stdClass();
        $bom->id_bom = null;
        $bom->id_mobil = null;
        $bom->id_cm = null;
        $bom->kebutuhan = null;
        $bom->satuan = null;
        $bom->keterangan = null;



        $query_mobil = $this->mobil_m->get();

        $query_cm = $this->cm_m->get();
        $cm[null] = '-Pilih-';
        foreach ($query_cm->result() as $unt) {
            $cm[$unt->id_cm] = $unt->part_name;
        }

        $data = array(
            'page' => 'add',
            'row' => $bom,
            'mobil' => $query_mobil,
            'cm' => $cm, 'selectedcm' => null,
            
        );
        $data['title'] = 'Bill of Material';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        $data['rows'] = $this->bom_m->get()->result();

         $this->load->view('templates/headeren' , $data);
         $this->load->view('bom/bom_form', $data);
         $this->load->view('templates/footer');
    }

    // public function add()
    // {
    //     $bom = new stdClass();
    //     $bom->id_bom = null;
    //     $bom->id_mobil = null;
    //     $bom->keterangan = null;



    //     $query_mobil = $this->mobil_m->get();


    //     $data = array(
    //         'page' => 'add',
    //         'row' => $bom,
    //         'mobil' => $query_mobil,
            
    //     );
    //     $data['title'] = 'Bill of Material';
    //     $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
    //     $data['rows'] = $this->bom_m->get()->result();

    //      $this->load->view('templates/headeren' , $data);
    //      $this->load->view('bom/bom_form', $data);
    //      $this->load->view('templates/footer');
    // }

    public function edit($id)
    {
        $query = $this->bom_m->get($id);
        if($query->num_rows() > 0) {
            $bom = $query->row();

        $query_mobil = $this->mobil_m->get();
    
        $query_cm = $this->cm_m->get();
        $cm[null] = '-Pilih-';
        foreach ($query_cm->result() as $unt) {
            $cm[$unt->id_cm] = $unt->part_name;
        }

            $data = array(
                'page' => 'edit',
                'row' => $bom,
                'mobil' => $query_mobil,
                'cm' => $cm, 'selectedcm' => $bom->id_cm
            );
            $data['title'] = 'Bill of Material';
            $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
            $data['rows'] = $this->bom_m->get()->result();
            


         $this->load->view('templates/headeren' , $data);
         $this->load->view('bom/bom_form', $data);
         $this->load->view('templates/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('bom')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->bom_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->bom_m->edit($post);
        }

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='".site_url('bom')."';</script>";
    }

    public function del($id)
    {
        $this->bom_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert"> Data berhasil dihapus </div>');
        }
       redirect('bom');
    }

    // public function detail($id)
    // {
    //     $a = $this->uri->segment(3);

    //     $query = $this->bom_m->get($id);
    //     if($query->num_rows() > 0) {
    //         $bom = $query->row();

    //     $query_mobil = $this->mobil_m->get();
    
    //     $query_cm = $this->cm_m->get();
    //     $cm[null] = '-Pilih-';
    //     foreach ($query_cm->result() as $unt) {
    //         $cm[$unt->id_cm] = $unt->part_name;
    //     }

    //         $data = array(
    //             'page' => 'edit',
    //             'row' => $bom,
    //             'mobil' => $query_mobil,
    //             'cm' => $cm, 'selectedcm' => $bom->id_cm
    //         );
    //         $data['title'] = 'Bill of Material';
    //         $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
    //         $data['rows'] = $this->bom_m->get()->result();
            


    //      $this->load->view('templates/headeren' , $data);
    //      $this->load->view('bom/bom_detail', $data);
    //      $this->load->view('templates/footer');
    //     } else {
    //         echo "<script>alert('Data tidak ditemukan');";
    //         echo "window.location='".site_url('bom')."';</script>";
    //     }
    // }

    // public function simpan_detail()
    // {

    //     $id        = $this->input->post('id_po');
    //     $id_produk = $this->input->post('id_produk');
    //     $jumlah    = $this->input->post('jumlah');
        
    //     $data = array('id_po' => $id, 'id_produk' => $id_produk, 'jumlah' => $jumlah);
    //     $simpan = $this->M_po_detail->simpan($data);
    //     // redirect('po_detail');
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //             Data Purchase Order Detail Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //             </button>
    //             </div>');
    //     redirect($_SERVER['HTTP_REFERER']);
    // }
}