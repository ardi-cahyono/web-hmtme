<!-- Begin Page Content -->
<div class="container-fluid">


 <!-- DATA TABEL LULUSAN TIAP ANGKATAN END -->
 <!-- GRAFIK LULUSAN -->
 <div class="col-md-12">
  <!-- DATA TABEL LULUSAN TIAP ANGKATAN -->
  <div class="card shadow mb-4">
   <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Lulusan Setiap Angkatan</h6>
   </div>
   <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
       <tr>
        <th width="5%">No</th>
        <th width="20%">Angkatan</th>
        <th>Jumlah Lulusan</th>
        <th>Jumlah Lulusan Pria</th>
        <th>Jumlah Lulusan Wanita</th>
       </tr>
      </thead>
      <tbody>
       <?php $no = 0;
       foreach ($ang as $b) : $no++; ?>
        <tr>
         <td><?php echo $no; ?></td>
         <td><a href="<?php echo site_url('User/angkatan/' . $b->year_in); ?>"><?php echo $b->year_in; ?></a></td>
         <td><?php echo count_ang($b->year_in); ?></td>
         <td><?php echo count_by_gender($b->year_in, 'M'); ?></td>
         <td><?php echo count_by_gender($b->year_in, 'F'); ?></td>
        </tr>
       <?php endforeach; ?>
      </tbody>
     </table>
    </div>
   </div>
  </div>
  <canvas id="lineChart" style="height:0px"></canvas>

  <!-- /.box -->

  <!-- Bar Chart -->
  <div class="card shadow mb-4">
   <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Grafik Lulusan</h6>
   </div>
   <div class="card-body">
    <div class="chart-bar">
     <canvas id="chart-grafik-lulusan" height="100px"> </canvas>
    </div>
   </div>
  </div>
  <!-- EndBarChart -->
  <!-- Donut Chart -->
  <div class="card shadow mb-4">
   <!-- Card Header - Dropdown -->
   <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Pemetaan pekerjaan lulusan</h6>
   </div>
   <!-- Card Body -->
   <div class="card-body">
    <div class="chart-pie pt-4">
     <canvas id="pie-pemetaan-pekerjaan"></canvas>
    </div>
   </div>
  </div>


 </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->