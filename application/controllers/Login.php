<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function index()
    {
        $this->load->view('login');
    }

    function cek()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $cek = $this->db->get_where('tb_user', ['username' => $user, 'password' => $pass])->row();
        if ($cek) {
            $log = [
                'id' => $cek->id_user,
                'username' => $cek->username,
            ];
            $this->session->set_userdata($log);
            redirect('instansi');
        } else {
            $this->session->set_flashdata('pesan', 'Login Gagal');
            redirect('login');
        }
    }

    public function logout()
    {
        $log = ['id', 'username'];
        $this->session->unset_userdata($log);
        $this->session->sess_destroy();
        redirect('login');
    }
}
