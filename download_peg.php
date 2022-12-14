<?php
session_start();
include('koneksi.php');

if($_SESSION['level']==""){
  header("location:login.php?pesan=Kamu blm login bestie");
}
// if ($_SESSION['status-login'] != true) {
//     echo '<script>window.location="login.php"</script>';
//   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Download Asset | IT Asset Management</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="logo.png" alt="AdminLTELogo" height="50" width="100">
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard_peg.php" class="brand-link">
     <center> <img src="logo.png"></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dashboard_peg.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="asset_peg.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asset</p>
                </a>
</li>
              
              <li class="nav-item">
                <a href="logout.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    </aside>
    <div class="content-wrapper">
    <div class="card">
              <div class="card-body" >   
              <a href="asset_peg.php" class="btn btn-success" style="float:left;background-color:#dc3545">
                <i class="fas fa-reply" style="margin:5px;"></i> KEMBALI
             </a>    
             <br>
               <br> <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color:#28a745;">
                      <th>No</th>
                      <th>Hostname</th>  
                      <th>Whoami</th>
                      <th>Serial Number</th>
                      <th>OS Name</th>
                      <th>OS Version</th>
                      <th>System Manucfaturer</th>
                      <th>System Model</th>
                      <th>Type</th>
                      <th>Processor</th>
                      <th>Memmory</th>
                      <th>Bussiness Unit</th>
                      <th>Disk 1</th>
                      <th>Disk 2</th>
                      <th>Department</th>
                      <th>Lokasi</th>
                      <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php    
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM tb_asset";
                            $query = mysqli_query($db, $sql) or die("SQL Anda Salah");
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td ><?= $nomor ?></td>
                                    <td><?= $data['hostname'] ?> </td>                         
                                    <td><?= $data['Whoami'] ?> </td>
                                    <td><?= $data['serial_number'] ?> </td>
                                    <td><?= $data['OS_name'] ?> </td>
                                    <td><?= $data['OS_version'] ?> </td>
                                    <td><?= $data['system_manufacturer'] ?> </td>
                                    <td><?= $data['system_model'] ?> </td>
                                    <td><?= $data['type'] ?> </td>
                                    <td><?= $data['processor'] ?> </td>
                                    <td><?= $data['memory'] ?> </td>
                                    <td><?= $data['business_unit'] ?> </td>
                                    <td><?= $data['disk_size1'] ?> </td>
                                    <td><?= $data['disk_size2'] ?> </td>
                                    <td><?= $data['department'] ?> </td>
                                    <td><?= $data['lokasi'] ?> </td>
                                    <td><?= $data['email'] ?> </td>
                                </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                            <tbody>
    </table>
    
  </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
            <!-- /.card -->
   

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>
</html>
