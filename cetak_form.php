<!DOCTYPE html>
<?php
  // include "login.php";
  session_start();
  if($_SESSION['status'] !="login"){
    header("location:index.php");
  }
  include "connection.php";
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SKRIPSI | CETAK LAPORAN SKRIPSI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php'; ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cetak Laporan Skripsi
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cetak Laporan Skripsi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cetak Laporan Skripsi</h3>
            </div>
            <!-- /.box-header -->
            <?php 
              $id = $_GET['id'];
              $query = "SELECT * FROM tb_ujian_skripsi WHERE npm='".$id."'";
              $result = mysqli_query($conn, $query);
              $i = 1;
              while ($data = mysqli_fetch_array($result)) {
                $status_data=$data['status_data'];
                $status_berkas=$data['status_berkas'];
              }
              
            ?>
            <div class="box-body">
            <?php
              if ($status_data!='VALID' && $status_berkas!='VALID') {
                echo "<h3 class='box-title' style='color:red'>Data Dan Berkas Belum Divalidasi, Form 1-9 Tidak Dapat Dicetak!</h3>";
              }else if ($status_data!='VALID' && $status_berkas=='VALID') {
                echo "<h3 class='box-title' style='color:red'>Berkas Telah Divalidasi Tetapi Data Belum Divalidasi, Form 1-8 Tidak Dapat Dicetak!</h3>";
              }elseif ($status_data=='VALID' && $status_berkas!='VALID') {
                echo "<h3 class='box-title' style='color:red'>Data Telah Divalidasi Tetapi Berkas Belum Divalidasi, Form 9 Tidak Dapat Dicetak!</h3>";
              }else{
                echo "<h3 class='box-title' style='color:green'>Data Dan Berkas Telah Divalidasi, Form 1-9 Dapat Dicetak!</h3>";            
              }
            ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Laporan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    if ($status_data=='VALID') {
                  ?>
                  <tr>
                    <td>1</td>
                    <td>Form Penilaian Penguji 1</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formpenilaian1.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>                     
                  <tr>
                    <td>2</td>
                    <td>Form Penilaian Penguji 2</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formpenilaian2.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>                     
                  <tr>
                    <td>3</td>
                    <td>Form Penilaian Penguji 3</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formpenilaian3.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>                     
                  <tr>
                    <td>4</td>
                    <td>Form Revisi Penguji 1</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formrevisi1.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>          
                  <tr>
                    <td>5</td>
                    <td>Form Revisi Penguji 2</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formrevisi2.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>          
                  <tr>
                    <td>6</td>
                    <td>Form Revisi Penguji 3</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formrevisi3.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>   
                  <tr>
                    <td>7</td>
                    <td>Form Hasil Ujian</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formhasilujian.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr> 
                  <tr>
                    <td>8</td>
                    <td>Form Jadwal Pelaksanaan</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formjadwal.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>                   
                  <?php
                    } else {
                  ?>
                  <tr>
                    <td>1</td>
                    <td>Form Penilaian Penguji 1</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>                     
                  <tr>
                    <td>2</td>
                    <td>Form Penilaian Penguji 2</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>                     
                  <tr>
                    <td>3</td>
                    <td>Form Penilaian Penguji 3</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>                     
                  <tr>
                    <td>4</td>
                    <td>Form Revisi Penguji 1</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>          
                  <tr>
                    <td>5</td>
                    <td>Form Revisi Penguji 2</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>          
                  <tr>
                    <td>6</td>
                    <td>Form Revisi Penguji 3</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>   
                  <tr>
                    <td>7</td>
                    <td>Form Hasil Ujian</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr> 
                  <tr>
                    <td>8</td>
                    <td>Form Jadwal Pelaksanaan</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr> 
                  <?php
                    }
                    if ($status_berkas=='VALID') {
                  ?>
                  <tr>
                    <td>9</td>
                    <td>Form Kelengkapan Berkas</td>
                    <td>
                    <?php
                      echo "<a href='cetak/formkelengkapan.php?id=".$id."' class='btn btn-group btn-info' target='_blank'>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>
                  <?php
                     } else {
                  ?>
                  <tr>
                    <td>9</td>
                    <td>Form Kelengkapan Berkas</td>
                    <td>
                    <?php
                      echo "<a href='#' class='btn btn-group btn-info' disabled>Cetak PDF</a>";
                    ?>
                    </td>
                  </tr>
                  <?php
                     }
                  ?>                    
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <?php //include 'control_sidebar.php';?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      'columnDefs': [
        { 'type': 'num', "targets": 0 }
        ]
    })
    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false
    // })
  })
</script>
</body>
</html>
