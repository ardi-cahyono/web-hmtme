<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <!-- Flash Message -->
 <?= $this->session->flashdata('message'); ?>

 <!-- Detailed Profile -->
 <?= form_open_multipart('user/editProfile'); ?>
 <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
 <div class="row">
  <div class="col-lg-4">
   <div class="card shadow border-left-success">
    <h5 class="profile-title d-flex justify-content-center">Profile</h5>
    <div class="px-2 py-2">
     <img class="rounded-circle mx-auto d-block" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="150px" height="150px">
     <div class="form-group d-flex">
      <div class="col-sm mt-3">
       <div class="custom-file">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image">Choose file</label>
       </div>
      </div>
     </div>
     <!-- <label for="file"><i class="fas fa-file-upload fa-3x d-flex"></i></label> -->
    </div>
    <div class="text-user">
     <h5 class="text-info-900 d-flex justify-content-center"><?= $user_profile['fullname']; ?></h5>
     <p class="d-flex justify-content-center"><?= $user_profile['position']; ?></p>
     <p class="font-weight-bold agency d-flex justify-content-center ">of <?= $user_profile['company']; ?></p>
     <div class="ig">
      <i class="d-flex justify-content-center fas fa-users"></i>
      <p class="d-flex justify-content-center"><?= $user_profile['social_media']; ?></p>
     </div>
    </div>

   </div>
  </div>
  <div class="col-lg-7">
   <div class="card shadow border-left-success">
    <h5 class="profile-title">Basic Info</h5>
    <div class="px-2 py-2">
     <div class="form-group">
      <div class="card-body">
       <div class="row">
        <div class="col-sm-3">
         <label for="email" class="mb-0 font-weight-bold">Email</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="email" class="form-control" name="email" id="email" readonly value="<?= $user['email']; ?>">
        </h6>
        <?= form_error('email', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="fullname" class="mb-0 font-weight-bold">Full Name</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $user_profile['fullname']; ?>">
        </h6>
        <?= form_error('fullname', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="id_number" class="mb-0 font-weight-bold">ID Number</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="text" class="form-control" name="id_number" id="id_number" value="<?= $user_profile['id_number']; ?>">
        </h6>
        <?= form_error('id_number', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="year_in" class="mb-0 font-weight-bold">Year In</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <select value="<?= set_value('year_in'); ?>" class="form-control" id="year_in" name="year_in">
          <option selected="selected" value="<?= $user_profile['year_in']; ?>"><?= $user_profile['year_in']; ?></option>
          <?php for ($i = date('Y'); $i >= date('2017'); $i -= 1) {
           echo "<option value='$i'> $i </option>";
          }
          ?>
         </select>
        </h6>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="gender" class="mb-0 font-weight-bold">Gender</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <select value="<?= set_value('gender'); ?>" class="form-control" id="gender" name="gender">
          <option disabled="disabled">Select your gender....</option>
          <?php if ($user_profile['gender'] === "M") { ?>

           <option selected value="M">Male</option>
           <option value="F">Female</option>

          <?php } else { ?>

           <option value="M">Male</option>
           <option selected value="F">Female</option>

          <?php }; ?>
         </select>
        </h6>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="internship" class="mb-0 font-weight-bold">Internship</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="internship" class="form-control" name="internship" id="internship" value="<?= $user_profile['internship']; ?>">
        </h6>
        <?= form_error('email', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="final_assignment_title" class="mb-0 font-weight-bold">FA Title</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="final_assignment_title" class="form-control" name="final_assignment_title" id="final_assignment_title" value="<?= $user_profile['final_assignment_title']; ?>">
        </h6>
        <?= form_error('final_assignment_title', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>

       <div class="row">
        <div class="col-sm-3">
         <label for="contact" class="mb-0 font-weight-bold">Contact</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="text" class="form-control" name="contact" id="contact" value="<?= $user_profile['contact']; ?>">
        </h6>
        <?= form_error('contact', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="address" class="mb-0 font-weight-bold">Address</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="text" class="form-control" name="address" id="address" value="<?= $user_profile['address']; ?>">
        </h6>
        <?= form_error('address', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="job" class="mb-0 font-weight-bold">Job</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <select class="form-control" id="job" value="<?= set_value('job'); ?>" name="job">
          <?php foreach ($jobs as $job) { ?>

           <?php if ($user_profile['job'] === $job->job_id) { ?>

            <option selected value="<?php echo $job->job_id; ?>"><?php echo $job->job_name; ?></option>

           <?php } else { ?>

            <option value="<?php echo $job->job_id; ?>"><?php echo $job->job_name; ?></option>

           <?php }; ?>

          <?php }; ?>

         </select>
        </h6>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="agency" class="mb-0 font-weight-bold">Company</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="text" class="form-control" name="company" id="company" value="<?= $user_profile['company']; ?>">
        </h6>
        <?= form_error('company', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="position" class="mb-0 font-weight-bold">Position</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="text" class="form-control" name="position" id="position" value="<?= $user_profile['position']; ?>">
        </h6>
        <?= form_error('position', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-3">
         <label for="social_media" class="mb-0 font-weight-bold">Social Media</label>
        </div>
        <h6 class="col-sm-9 text-secondary">
         <input type="text" class="form-control" name="social_media" id="social_media" value="<?= $user_profile['social_media']; ?>">
        </h6>
        <?= form_error('social_media', '<small class="text-danger pl-2 mt-1">', '</small>'); ?>
       </div>
       <hr>
       <div class="row">
        <div class="col-sm-8">
        </div>
        <h6 class="col-sm-4 text-secondary">
         <button class="btn btn-primary float-right " type="submit">Save Changes</button>
        </h6>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 </form>
 <!-- End of Prodile -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->