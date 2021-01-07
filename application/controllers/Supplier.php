<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_m');
    }

    public function index()
    {
        $data['title'] = 'Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['row'] = $this->supplier_m->get();


        $this->load->view('templates/headerppc' , $data);
        $this->load->view('data_master/supplier/supplier_data', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $supplier = new stdClass();
        $supplier->id_supplier = null;
        $supplier->kode_supplier = null;
        $supplier->nama_supplier = null;
        $supplier->address = null;
        $supplier->phone = null;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );
        $data['title'] = 'supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['rows'] = $this->supplier_m->get()->result();

         $this->load->view('templates/headerppc' , $data);
         $this->load->view('data_master/supplier/supplier_form', $data);
         $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $query = $this->supplier_m->get($id);
        if($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $supplier
            );
            $data['title'] = 'supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['rows'] = $this->supplier_m->get();
        $this->load->view('templates/headerppc' , $data);
        $this->load->view('data_master/supplier/supplier_form', $data);
        $this->load->view('templates/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('supplier')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->supplier_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->supplier_m->edit($post);
        }

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='".site_url('supplier')."';</script>";
    }

    public function del($id)
    {
        $this->supplier_m->del($id);
        if($this->db->affected_rows() > 0) {
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil dihapus </div>');
        }
       redirect('bom');
    }
}