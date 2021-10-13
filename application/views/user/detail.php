<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <!-- Detailed Profile -->
 <div class="row">
  <div class="col-lg-4">
   <div class="card shadow border-left-success">
    <h5 class="profile-title d-flex justify-content-center">Profile</h5>
    <div class="px-2 py-2">
     <img class="rounded-circle mx-auto d-block" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="150px" height="150px">
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
     <div class="card-body">
      <div class="row">
       <div class="col-sm-3">
        <h6 class="mb-0 font-weight-bold">Full Name</h6>
       </div>
       <h6 class="col-sm-9 text-secondary">
        <?= $user_profile['fullname']; ?>
       </h6>
      </div>
      <hr>
      <div class="row">
       <div class="col-sm-3">
        <h6 class="mb-0 font-weight-bold">ID Number</h6>
       </div>
       <h6 class="col-sm-9 text-secondary">
        <?= $user_profile['id_number']; ?>
       </h6>
      </div>
      <hr>
      <div class="row">
       <div class="col-sm-3">
        <h6 class="mb-0 font-weight-bold">Email</h6>
       </div>
       <h6 class="col-sm-9 text-secondary">
        <?= $user['email']; ?>
       </h6>
      </div>
      <hr>
      <div class="row">
       <div class="col-sm-3">
        <h6 class="mb-0 font-weight-bold">Contact</h6>
       </div>
       <h6 class="col-sm-9 text-secondary">
        <?= $user_profile['contact']; ?>
       </h6>
      </div>
      <hr>
      <div class="row">
       <div class="col-sm-3">
        <h6 class="mb-0 font-weight-bold">Address</h6>
       </div>
       <h6 class="col-sm-9 text-secondary">
        <?= $user_profile['address']; ?>
       </h6>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->