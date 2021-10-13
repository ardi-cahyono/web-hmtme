<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 <div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
   <thead>
    <th width="5%">No</th>
    <th>Foto</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Tempat Magang</th>
    <th>Judul Skripsi</th>
    <th>Kontak</th>
   </thead>
   <?php $no = 0;
   foreach ($genMates as $genMate) : $no++; ?>
    <tr>
     <td><?php echo $no; ?></td>
     <td><img class="mx-auto d-block" src="<?= base_url('assets/img/profile/') . $genMate['image']; ?>" width="50px" height="50px"></td>
     <td><?= $genMate['fullname']; ?></td>
     <td><?= $genMate['id_number']; ?></td>
     <td><?= $genMate['internship']; ?></td>
     <td><?= $genMate['final_assignment_title']; ?></td>
     <td><?= $genMate['contact']; ?></td>
    </tr>
   <?php endforeach; ?>
  </table>
 </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->