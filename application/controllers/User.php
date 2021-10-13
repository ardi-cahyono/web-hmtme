<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

 public function index()
 {
  $data['title'] = 'My Profile';

  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();

  $this->load->view('templates/header', $data);
  $this->load->view('templates/sidebar', $data);
  $this->load->view('templates/topbar', $data);
  $this->load->view('user/index', $data);
  $this->load->view('templates/footer');
 }
 public function detail()
 {
  $data['title'] = 'User Detail';

  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();

  $this->load->view('templates/header', $data);
  $this->load->view('templates/sidebar', $data);
  $this->load->view('templates/topbar', $data);
  $this->load->view('user/detail', $data);
  $this->load->view('templates/footer');
 }
 public function editProfile()
 {
  $data['title'] = 'Edit Profile';

  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();

  $data['jobs'] = $this->db->get('jobs')->result_object();

  $this->form_validation->set_rules('fullname', 'fullname', 'required');

  $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
   'is_unique' => 'This email has already registered'
  ]);

  if ($this->form_validation->run() == false && $this->input->post() == false) {

   $this->load->view('templates/header', $data);
   $this->load->view('templates/sidebar', $data);
   $this->load->view('templates/topbar', $data);
   $this->load->view('user/editprofile', $data);
   $this->load->view('templates/footer');
  } else {
   $user = [
    'email' => htmlspecialchars($this->input->post('email', true)),
   ];
   $profile = [
    'fullname' => htmlspecialchars($this->input->post('fullname'), true),
    'id_number' => htmlspecialchars($this->input->post('id_number')),
    'year_in' => $this->input->post('year_in'),
    'gender' => $this->input->post('gender'),
    'internship' => $this->input->post('internship'),
    'final_assignment_title' => $this->input->post('final_assignment_title'),
    'contact' => htmlspecialchars($this->input->post('contact'), true),
    'address' => htmlspecialchars($this->input->post('address'),  true),
    'job' => $this->input->post('job'),
    'company' => htmlspecialchars($this->input->post('company'), true),
    'position' => htmlspecialchars($this->input->post('position'), true),
    'social_media' => htmlspecialchars($this->input->post('social_media'), true),
   ];
   // cek jika ada gambar yang akan diupload
   $upload_image = $_FILES['image']['name'];

   if ($upload_image) {
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '2048';
    $config['upload_path'] = './assets/img/profile/';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
     $old_image = $data['user']['image'];
     if ($old_image != 'default.png') {
      unlink(FCPATH . 'assets/img/profile/' . $old_image);
     }
     $new_image = $this->upload->data('file_name');
     $this->db->set('image', $new_image);
    } else {
     echo $this->upload->dispay_errors();
    }
   }
   $this->db->where('id', $this->input->post('id'));
   $this->db->update('user', $user);
   $this->db->where('id', $this->input->post('id'));
   $this->db->update('user_profile', $profile);
   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
   Your profile has been updated</div>');
   redirect('user/editprofile');
  }
 }
 public function changePassword()
 {
  $data['title'] = 'Change Password';

  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();


  $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
  $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
  $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

  if ($this->form_validation->run() == false) {
   $this->load->view('templates/header', $data);
   $this->load->view('templates/sidebar', $data);
   $this->load->view('templates/topbar', $data);
   $this->load->view('user/changepassword', $data);
   $this->load->view('templates/footer');
  } else {
   $current_password = $this->input->post('current_password');
   $new_password = $this->input->post('new_password1');
   if (!password_verify($current_password, $data['user']['password'])) {
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
    redirect('user/changepassword');
   } else {
    if ($current_password == $new_password) {
     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
     redirect('user/changepassword');
    } else {
     // password sudah ok
     $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

     $this->db->set('password', $password_hash);
     $this->db->where('email', $this->session->userdata('email'));
     $this->db->update('user');

     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
     redirect('user/changepassword');
    }
   }
  }
 }
 public function angkatan()
 {
  $data['title'] = 'Teman Seangkatan';
  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  $data['user_profile'] = $this->db->get_where('user_profile', ['id' => $data['user']['id']])->row_array();
  // $session_id = $this->session->userdata('id');
  $teman = get_yearIn($this->session->userdata('email'));

  $data['genMates'] = $this->db->query("SELECT * from user u, user_profile p where u.id=p.id and p.year_in='$teman'")->result_array();
  // var_dump($data);
  // die;
  $this->load->view('templates/header', $data);
  $this->load->view('templates/sidebar', $data);
  $this->load->view('templates/topbar', $data);
  $this->load->view('user/angkatan', $data);
  $this->load->view('templates/footer');
 }
}
