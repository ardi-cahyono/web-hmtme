<div class="container">
 <div class="row justify-content-center">
  <div class="col-lg">
   <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body">
     <div class="p-5">
      <div class="text-center">
       <h1 class="h4 text-gray-900 mb-4">Registration Form</h1>
      </div>
      <form class="user" method="post" action="<?= base_url('Auth/registration'); ?>">
       <div class="form-group">
        <input type="text" id="fullname" class="form-control form-control-user" name="fullname" placeholder="<?= ('Fullname') ?>" value="<?= set_value('fullname'); ?>">
        <?= form_error('fullname', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <div class="form-group row">
        <div class="col-sm-6 select2">
         <select value="<?= set_value('year_in'); ?>" class="form-control" id="year_in" name="year_in">
          <option selected="selected" disabled="disabled">Choose Year In</option>
          <?php for ($i = date('Y'); $i >= date('2017'); $i -= 1) {
           echo "<option value='$i'> $i </option>";
          }
          ?>
         </select>
        </div>
        <div class="col-sm-6 select2">
         <select value="<?= set_value('gender'); ?>" class="form-control" id="gender" name="gender">
          <option selected="selected" disabled="disabled">Select your gender</option>
          <option value="M">Male</option>
          <option value="F">Female</option>
         </select>
        </div>
       </div>
       <div class="form-group">
        <input type="int" id="id_number" name="id_number" placeholder="Student ID Card Number" class="form-control form-control-user" value="<?= set_value('id_number'); ?>">
        <?= form_error('id_number', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <div class="form-group">
        <input type="int" id="internship" name="internship" placeholder="Where do you do your internship?" class="form-control form-control-user" value="<?= set_value('internship'); ?>">
        <?= form_error('internship', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <div class="form-group">
        <input type="int" id="final_assignment_title" name="final_assignment_title" placeholder="Final Assignment Title?" class="form-control form-control-user" value="<?= set_value('final_assignment_title'); ?>">
        <?= form_error('final_assignment_title', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <div class="form-group">
        <input type="text" id="email" name="email" placeholder="Valid E-mail Address" class="form-control form-control-user" value="<?= set_value('email'); ?>">
        <?= form_error('email', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <div class="form-group">
        <input type="text" id="contact" name="contact" class="form-control form-control-user" placeholder="Contact number" value="<?= set_value('contact'); ?>">
       </div>
       <div class="form-group">
        <textarea id="address" name="address" value="<?= set_value('address'); ?>" class="form-control form-control-user" colspan="3" placeholder="Address"></textarea>
       </div>
       <div class="form-group select2">
        <select class="form-control" id="job" value="<?= set_value('job'); ?>" name="job">
         <option selected="selected" disabled="disabled">Choose your current job</option>
         <?php foreach ($jobs as $job) { ?>
          <option value="<?php echo $job->job_id; ?>"><?php echo $job->job_name; ?></option>
         <?php }; ?>
        </select>
       </div>
       <div class="form-group">
        <input type="text" id="company" name="company" class="form-control form-control-user" placeholder="Your company" value="<?= set_value('company'); ?>">
       </div>
       <div class="form-group">
        <input type="text" name="position" id="position" class="form-control form-control-user" placeholder="Your position in your current company?" value="<?= set_value('position'); ?>">
       </div>
       <div class="form-group">
        <input type="text" id="social_media" name="social_media" class="form-control form-control-user" placeholder="Social Media. Ex. Instagram, LinkedIn" value="<?= set_value('social_media'); ?>">
       </div>
       <div class="form-group row">
        <div class="col-lg">
         <input type="password" name="password" class="form-control form-control-user" placeholder="Password (min. 4 characters)" autocomplete="off">
         <?= form_error('password', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
        </div>
        <div class="col-lg">
         <input type="password" name="re-password" class="form-control form-control-user" placeholder="Type Your Password Again">
        </div>
       </div>
       <button class="btn btn-primary form-control mybtn" type="submit">REGISTER</button>
      </form>
      <hr>
      <div class="text-center">
       <a class="small" href="<?php echo site_url('auth'); ?>">Already have an account? Login!</a>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>