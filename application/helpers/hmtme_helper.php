<?php

function is_logged_in()
{
 $ci = get_instance();
 if (!$ci->session->userdata('email')) {
  redirect('auth');
 } else {
  $role_id = $ci->session->userdata('role_id');
  $menu = $ci->uri->segment(1);

  $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
  $menu_id = $queryMenu['id'];

  $userAccess = $ci->db->get_where('user_access_menu', [
   'role_id' => $role_id,
   'menu_id' => $menu_id
  ]);

  if ($userAccess->num_rows() < 1) {
   redirect('auth/blocked');
  }
 }
}


function check_access($role_id, $menu_id)
{
 $ci = get_instance();

 $ci->db->where('role_id', $role_id);
 $ci->db->where('menu_id', $menu_id);
 $result = $ci->db->get('user_access_menu');

 if ($result->num_rows() > 0) {
  return "checked='checked'";
 }
}

function get_yearIn($id)
{
 $ci = get_instance();

 // $q = $ci->db->query("SELECT year_in from user_profile p, user u where p.id=u.id and u.email='$id'")->row_array();
 $query = "SELECT year_in
           FROM user_profile p, user u
           WHERE p.id=u.id and u.email='$id'
          ";

 $q = $ci->db->query($query)->row_array();
 return $q['year_in'];
}

function count_ang($id)
{
 $ci = &get_instance();
 $q = $ci->db->query("SELECT * from user_profile p, user u where p.id=u.id and p.year_in='$id' and is_active='1'")->num_rows();

 return $q;
}

function count_by_gender($id, $j)
{
 $ci = &get_instance();
 $q = $ci->db->query("SELECT * from user_profile p, user u where p.id=u.id and p.year_in='$id' and is_active='1' and p.gender='$j'")->num_rows();

 return $q;
}

function count_job($id)
{
 $ci = &get_instance();
 $q = $ci->db->query("SELECT * from user_profile p, jobs j where p.job=j.id and p.job='$id'")->num_rows();
 return $q;
}
function jobs()
{
 $ci = &get_instance();
 $q = $ci->db->get('jobs')->result();
 return $q;
}
function color()
{
 $kar = 'abcdef0123456789';
 $karlength = strlen($kar);
 $random = '';
 for ($i = 0; $i < 6; $i++) {
  $random .= $kar[rand(0, $karlength - 1)];
 }
 return $random;
}

function user_test()
{
 $ci = &get_instance();
 $q = $ci->db->query("SELECT * from user_profile p, user u where p.id=u.id and u.is_active='1' group by p.year_in")->result();
 return $q;
}
