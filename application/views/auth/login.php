<div class="container">
 <!-- Outer Row -->
 <div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

   <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
     <!-- Nested Row within Card Body -->
     <div class="row">
      <div class="col-lg">
       <div class="p-5">
        <div class="text-center">
         <h1 class="h4 text-gray-900 mb-4">Welome Back<br></h1>
         <?= $this->session->flashdata('message'); ?>
        </div>
        <form class="user" method="post" action="<?= base_url('Auth'); ?>">
         <div class=" form-group">
          <input type="text" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
          <?= form_error('email', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
         </div>
         <div class="form-group">
          <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
          <?= form_error('password', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
         </div>
         <button type="submit" name="submit" class="btn btn-primary form-control mybtn">Login</button>
        </form>
        <hr>
        <div class="text-center">
         <a class="small" href="<?php echo site_url('Auth/forgotpassword'); ?>">Forgot Password?</a>
        </div>
        <div class="text-center">
         <a class="small" href="<?php echo site_url('Auth/registration'); ?>">Create an Account!</a>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>

  </div>

 </div>
</div>