<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

 public function __construct()
 {
  parent::__construct();
  is_logged_in();
 }

 public function index()
 {
  $data['title'] = 'Dashboard';

  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();

  $this->load->view('templates/header', $data);
  $this->load->view('templates/sidebar', $data);
  $this->load->view('templates/topbar', $data);
  $this->load->view('admin/index', $data);
  $this->load->view('templates/footer');
 }
 public function role()
 {
  $data['title'] = 'Role';

  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();

  $data['roles'] = $this->db->get('user_role')->result_array();

  $this->form_validation->set_rules('role', 'Role', 'required');

  if ($this->form_validation->run() == false) {
   $this->load->view('templates/header', $data);
   $this->load->view('templates/sidebar', $data);
   $this->load->view('templates/topbar', $data);
   $this->load->view('admin/role', $data);
   $this->load->view('templates/footer');
  } else {
   $this->db->insert('user_role', ['role' => $this->input->post('role')]);
   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
   New role added</div>');
   redirect('admin/role');
  }
 }

 public function roleAccess($role_id)
 {
  $data['title'] = 'Role Access';

  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();

  $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

  $this->db->where('id !=', 1);
  $data['menu'] = $this->db->get('user_menu')->result_array();

  $this->load->view('templates/header', $data);
  $this->load->view('templates/sidebar', $data);
  $this->load->view('templates/topbar', $data);
  $this->load->view('admin/role-access', $data);
  $this->load->view('templates/footer');
 }

 public function deleteRole($id)
 {
  $this->db->where('id', $id);
  $this->db->delete('user_role');
  $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Role has been deleted</div>');
  redirect('admin/role');
 }

 public function changeAccess()
 {
  $menu_id = $this->input->post('menuId');
  $role_id = $this->input->post('roleId');

  $data = [
   'role_id' => $role_id,
   'menu_id' => $menu_id
  ];

  $result = $this->db->get_where('user_access_menu', $data);

  if ($result->num_rows() < 1) {
   $this->db->insert('user_access_menu', $data);
  } else {
   $this->db->delete('user_access_menu', $data);
  }

  $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
 }
 public function statistic()
 {
  $data['title'] = 'Statistic';

  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();

  $data['ang'] = $this->db->query("SELECT * from user_profile group by year_in")->result_object();
  // var_dump($data);
  // die;

  $this->load->view('templates/header', $data);
  $this->load->view('templates/sidebar', $data);
  $this->load->view('templates/topbar', $data);
  $this->load->view('admin/statistic', $data);
  $this->load->view('templates/stats_footer');
 }
}
