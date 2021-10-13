<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <div class="row">
  <div class="col-lg-6">

   <?= $this->session->flashdata('message'); ?>
   <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

   <a class="btn btn-primary mb-3" href="<?= base_url('menu'); ?>">Back To Menu</a>
   <div class="card shadow mb-50">
    <form method="post" action="<?= base_url('menu/editmenu'); ?>">
     <table class="table table-hover">
      <thead>
       <tr>
        <th scope="col">No.</th>
        <th scope="col">Menu</th>
       </tr>
      </thead>
      <tbody>
       <?php $i = 1; ?>
       <?php foreach ($menus as $menu) : ?>
        <tr>
         <th scope="row"><?= $i; ?></th>
         <td>
          <input type="hidden" class="form-control" id="id" name="id" value="<?= $menu['id']; ?>">
          <div class="form-group">
           <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']; ?>">
          </div>
         </td>
        </tr>
        <?php $i++; ?>
       <?php endforeach; ?>
      </tbody>
     </table>
     <button type="submit" class="btn btn-success mb-10 float-right">Save Changes</button>
    </form>
   </div>
  </div>
 </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->