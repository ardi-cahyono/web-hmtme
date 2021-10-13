<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <div class="row">
  <div class="col-lg-6">

   <?= $this->session->flashdata('message'); ?>
   <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

   <a href="" data-toggle="modal" data-target="#newMenuModal" class="btn btn-primary mb-3">Add New Menu</a>
   <a class="btn btn-success mb-3" href="<?= base_url('menu/editMenu'); ?>">Edit Menu</a>
   <div class="card shadow border-left-info">
    <table class="table table-hover">
     <thead>
      <tr>
       <th scope="col">No.</th>
       <th scope="col">Menu</th>
       <th scope="col">Action</th>
      </tr>
     </thead>
     <tbody>
      <?php $i = 1; ?>
      <?php foreach ($menus as $menu) : ?>
       <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $menu['menu']; ?></td>
        <td>
         <a class="badge badge-danger" href="<?= base_url('menu/deleteMenu/') . $menu['id']; ?>" onclick="return confirm('Are you sure?');">delete</a>
        </td>
       </tr>
       <?php $i++; ?>
      <?php endforeach; ?>
     </tbody>
    </table>
   </div>
  </div>
 </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <form method="post" action="<?= base_url('menu'); ?>">
    <div class="modal-body">
     <div class="form-group">
      <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
     </div>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
     <button type="submit" class="btn btn-primary">Add</button>
    </div>
   </form>
  </div>
 </div>
</div>