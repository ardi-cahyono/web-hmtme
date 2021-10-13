<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <div class="row">
  <div class="col-lg">

   <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
     <?= validation_errors(); ?>
    </div>
   <?php endif; ?>

   <?= $this->session->flashdata('message'); ?>

   <a href="" data-toggle="modal" data-target="#newSubmenuModal" class="btn btn-primary mb-3">Add New Submenu</a>
   <a class="btn btn-success mb-3" href="<?= base_url('menu/editMenu'); ?>">Edit Submenu</a>
   <div class="card shadow border-left-info">
    <table class="table table-hover">
     <thead>
      <tr>
       <th scope="col">No.</th>
       <th scope="col">Title</th>
       <th scope="col">Menu</th>
       <th scope="col">Url</th>
       <th scope="col">Icon</th>
       <th scope="col">Active</th>
       <th scope="col">Action</th>
      </tr>
     </thead>
     <tbody>
      <?php $i = 1; ?>
      <?php foreach ($subMenus as $subMenu) : ?>
       <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $subMenu['title']; ?></td>
        <td><?= $subMenu['menu']; ?></td>
        <td><?= $subMenu['url']; ?></td>
        <td><?= $subMenu['icon']; ?></td>
        <td><?= $subMenu['is_active']; ?></td>
        <td>
         <a class="badge badge-success" href="<?= base_url('menu/editSubmenu/') . $subMenu['menu_id']; ?>" onclick="return confirm('Are you sure?');">edit</a>
         <a class="badge badge-danger" href="<?= base_url('menu/deleteSubmenu/') . $subMenu['id']; ?>" onclick="return confirm('Are you sure?');">delete</a>
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
<div class="modal fade" id="newSubmenuModal" tabindex="-1" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="newSubmenuModalLabel">Add New Submenu</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <form method="post" action="<?= base_url('menu/submenu'); ?>">
    <div class="modal-body">
     <div class="form-group">
      <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
     </div>
     <div class="form-group">
      <select name="menu_id" id="menu_id" class="form-control">
       <option value="">Select menu</option>
       <?php foreach ($menu as $m) : ?>
        <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
       <?php endforeach; ?>
      </select>
     </div>
     <div class="form-group">
      <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
     </div>
     <div class="form-group">
      <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
     </div>
     <div class="form-group">
      <div class="form-check">
       <input class="form-check-input" type="checkbox" value="1" name='is_active' id='is_active' checked>
       <label class="form-check-label" for="is_active">Active?</label>
      </div>
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