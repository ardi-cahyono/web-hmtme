<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <div class="col-md-6 card shadow mb-3 border-left-success">
  <div class="row no-gutters">
   <div class="col-md-4 px-2 mt-2">
    <img height="160px" width="160px" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="rounded-circle">
   </div>
   <div class="col-md-8">
    <div class="card-body">
     <h5 class="card-title"><?= $user_profile['fullname']; ?></h5>
     <p class="card-text"><?= $user['email']; ?></p>
     <p class="card-text">Your ID Number: <?= $user_profile['id_number']; ?></p>
     <a class="badge badge-primary" href="<?= base_url('user/detail'); ?>">See Detail</a>
    </div>
   </div>
  </div>
 </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->