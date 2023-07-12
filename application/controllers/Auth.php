<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->database();
  }

  public function index()
  {
    $this->load->view('login_page');
  }

  public function authenticate()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->db->where('user_name', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('users');

    if ($query->num_rows() > 0) {
      $user = $query->row();

      $sessionData = array(
        'user_id' => $user->id,
        'username' => $user->username
      );
      $this->session->set_userdata($sessionData);

      redirect('quizController');
    } else {
      $data['error'] = 'Invalid username or password';
      $this->load->view('login_page', $data);
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/login_page');
  }
}
