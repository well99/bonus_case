<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instansi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect('login');
        }
    }

    function cari()
    {
        $nama = $_POST['cari'];
        $data = $this->db->like('nama_instansi', $nama, 'both')->get('tb_instansi')->result();

        header("Content-type:application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function index()
    {
        $data['instansi'] = $this->db->order_by('id_instansi', 'DESC')->get('tb_instansi')->result();
        $this->load->view('instansi', $data);
    }

    function tambah()
    {
        $data = [
            'nama_instansi' => $this->input->post('nama_intansi'),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        $this->db->insert('tb_instansi', $data);
        redirect('instansi');
    }

    function edit($id)
    {
        $data = $this->db->get_where('tb_instansi', ['id_instansi' => $id])->row();

        header("Content-type:application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function update()
    {
        $data = [
            'nama_instansi' => $this->input->post('nama_intansi'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->db->update('tb_instansi', $data, ['id_instansi' => $this->input->post('id_ins')]);
        redirect('instansi');
    }

    function hapus($id)
    {
        $this->db->delete('tb_instansi', ['id_instansi' => $id]);
        redirect('instansi');
    }
}
