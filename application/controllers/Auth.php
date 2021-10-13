<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'password', 'required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'HMTME Database Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      // Validation Succes
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // $queryUser = "SELECT `user`.`id`,`email`,`image`,`password`,`role_id`,`is_active`,`date_created`,`fullname`,`year_in`,`gender`,`contact`,`address`,`job`,`agency`,`position`,`instagram`
    //         FROM `user` JOIN `user_profile` 
    //       ON `user`.`id` = `user_profile`.`id`
    //     ";


    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    // User availability
    if ($user) {
      // User active
      if ($user['is_active'] == 1) {
        // Checking the password
        if (password_verify($password, $user['password'])) {
          $data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            redirect('user');
          }
        } else
          // Password doesnt match
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
   Whoops! Your password is wrong</div>');
        redirect('auth');
      } else
        // User didnt active
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
   Whoops! Your account didnt activated. Check email inbox to activate</div>');
      redirect('auth');
    } else
      // User not available
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
   Whoops! Your account doesnt found. Please Register</div>');
    redirect('auth');
  }

  public function registration()
  {
    $this->form_validation->set_rules('fullname', 'fullname', 'required');
    $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered'
    ]);
    $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[4]|matches[re-password]', [
      'matches' => 'Password does not match',
      'min_length' => 'Password too short'
    ]);
    $this->form_validation->set_rules('re-password', 're-password', 'required|trim|matches[password]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'HMTME Database Registration';
      $job = array(
        'jobs' => $this->db->get('jobs')->result(),
      );
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration', $job);
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email', true);
      $user = [
        'email' => htmlspecialchars($email),
        'image' => 'default.png',
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role_id' => '2',
        'is_active' => '0',
        'date_created' => time()
      ];
      $profile = [
        'fullname' => htmlspecialchars($this->input->post('fullname'), true),
        'id_number' => $this->input->post('id_number'),
        'year_in' => $this->input->post('year_in'),
        'gender' => $this->input->post('gender'),
        'internship' => htmlspecialchars($this->input->post('internship'), true),
        'final_assignment_title' => htmlspecialchars($this->input->post('final_assignment_title'), true),
        'contact' => htmlspecialchars($this->input->post('contact'), true),
        'address' => htmlspecialchars($this->input->post('address'),  true),
        'job' => $this->input->post('job'),
        'company' => htmlspecialchars($this->input->post('company'), true),
        'position' => htmlspecialchars($this->input->post('position'), true),
        'social_media' => htmlspecialchars($this->input->post('social_media'), true),
      ];
      // Provdie token

      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];

      $this->db->insert('user_token', $user_token);

      $this->_sendEmail($token, 'verify');

      $this->db->insert('user', $user);
      $this->db->insert('user_profile', $profile);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
   Congratulations! Your account has been created. Please activate your account</div>');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.hostinger.com',
      'smtp_user' => 'support@hmtmeupnvy.com',
      'smtp_pass' => '^Y7yI17V[xg',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    $this->email->initialize($config);

    $this->email->from('support@hmtmeupnvy.com', 'HMTME UPNYK');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Account Verification');
      $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
    } else if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
          redirect('auth');
        } else {
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
      redirect('auth');
    }
  }


  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
   You have been logged out!</div>');
    redirect('auth');
  }

  public function blocked()
  {
    $this->load->view('auth/blocked');
  }

  public function forgotPassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Forgot Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/forgot-password');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
        redirect('auth/forgotpassword');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
        redirect('auth/forgotpassword');
      }
    }
  }


  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
      redirect('auth');
    }
  }


  public function changePassword()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('auth');
    }

    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Change Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/change-password');
      $this->load->view('templates/auth_footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->unset_userdata('reset_email');

      $this->db->delete('user_token', ['email' => $email]);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
      redirect('auth');
    }
  }
}
