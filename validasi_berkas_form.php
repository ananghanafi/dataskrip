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
  <title>SKRIPSI | Validasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        Validasi Berkas Skripsi
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Validasi Berkas Skripsi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Validasi berkas skripsi</h3>

      <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <?php 
      $id = $_GET['id'];
      $query ="SELECT u.npm, u.status_berkas, u.berkas_skripsi
      FROM tb_ujian_skripsi as u
      
      WHERE npm='".$id."'";
       //$query ="SELECT u.npm, u.nama, u.prodi, u.judul, u.tanggal, u.jam, u.ruang, u.status, u.status_data, d1.nama as nama_ketua, d2.nama as nama_sekretaris
       // FROM tb_ujian_skripsi as u
       // INNER JOIN tb_dosen as d1 ON d1.nip = u.nip_ketua
       // INNER JOIN tb_dosen as d2 ON d2.nip = u.nip_sekretaris
       // WHERE npm='".$id."'";

      $result = mysqli_query($conn,$query);
      $nomor = 1;
      if (mysqli_num_rows($result) > 0 ) { 
        while($data = mysqli_fetch_array($result)){
          $berkas=str_replace("upload/".$id."/", "", $data['berkas_skripsi']);
          $berkas_skripsi=$data['berkas_skripsi'];
          $status_berkas=$data['status_berkas'];
        }
    ?>
    <form role="form" method="post" action="validasi_berkas_process.php?id=<?php echo $id;?>" autocomplete="off">
    <div class="box-body">
      <!-- <div class="row"> -->
      <div class="col-md-12">              
        <h3 class="box-title">Berkas Yang Diupload</h3>
        <div class="col-md-4" >
          <input type="text" class="form-control" name="nama" value="<?php echo $berkas;?>" readonly>
        </div>
        <div class="col-md-3" >
          <a href="<?php echo $berkas_skripsi;?>" class="btn btn-block btn-success"><i class="fa fa-download"></i> Download Berkas </a>
        </div>
      </div>
      <!-- </div> -->
      <div class="col-md-12">
        <h3 class="box-title">Kelengkapan</h3>          
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Kelengkapan</th>
              <th>Checklist</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Poster Cetak & Frame (Tanpa Kaca) ukuran A3</td>
              <td>
                <input type="hidden" name="hardcopy_poster" value="0">
                <input type="checkbox" name="hardcopy_poster" value="1" class="minimal">
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Manual Book Produk/Software (Jika Skripsi Menghasilkan Produk/Software)</td>
              <td>
                <input type="hidden" name="manual_book" value="0">
                <input type="checkbox" name="manual_book" value="1" class="minimal">
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Upload Soft Copy Skripsi</td>
              <td>
                <input type="hidden" name="softcopy_skripsi" value="0">
                <input type="checkbox" name="softcopy_skripsi" value="1" class="minimal">
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>Upload Soft Copy Artikel</td>
              <td>
                <input type="hidden" name="softcopy_artikel" value="0">
                <input type="checkbox" name="softcopy_artikel" value="1" class="minimal">
              </td>
            </tr>
            <tr>
              <td>5</td>
              <td>Upload Soft Copy Poster</td>
              <td>
                <input type="hidden" name="softcopy_poster" value="0">
                <input type="checkbox" name="softcopy_poster" value="1" class="minimal">
              </td>
            </tr>
            <tr>
              <td>6</td>
              <td>Sumbangan Buku IT 2 Judul (Terbitan 2012 ke atas dan Minimal 250 Halaman)</td>
              <td>
                <input type="hidden" name="sumbangan_buku" value="0">
                <input type="checkbox" name="sumbangan_buku" value="1" class="minimal">
              </td>
            </tr>
            <tr>
              <td>7</td>
              <td>Sertifikat Test TOEFL</td>
              <td>
                <input type="hidden" name="sertifikat_toefl" value="0"">
                <input type="checkbox" name="sertifikat_toefl" value="1" class="minimal">
              </td>
            </tr>
            <tr>
              <td>8</td>
              <td>CD Dengan Isi Skripsi(.pdf), Artikel(.pdf), Poster(.jpg) dan File Produk/ Software Aplikasi</td>
              <td>
                <input type="hidden" name="cd_skripsi" value="0">
                <input type="checkbox" name="cd_skripsi" value="1" class="minimal">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
      <div class="col-md-12">
        <h3 class="box-title">Status Berkas : <?php echo $status_berkas;?></h3>
      </div>
      <!-- /.box-body -->
    </div>
    <div class="box-footer">
      <div class="col-md-3" >
      </div>
      <?php 
        if ($status_berkas=="BELUM VALID") {
      ?>
      <div class="col-md-3" >
        <button type="submit" name="submit" class="btn btn-block btn-primary" value="valid">VALIDASI</button>
      </div>
      <div class="col-md-3" >
        <button type="submit" name="submit" class="btn btn-block btn-danger" value="cancel" disabled>BATALKAN VALIDASI</button>
      </div>
      <?php
        } else if ($status_berkas=="VALID") {
      ?>
      <div class="col-md-3" >
        <button type="submit" name="submit" class="btn btn-block btn-primary" value="valid" disabled>VALIDASI</button>
      </div>
      <div class="col-md-3" >
        <button type="submit" name="submit" class="btn btn-block btn-danger" value="cancel">BATALKAN VALIDASI</button>
      </div>
      <?php
        } else {
      ?>
      <div class="col-md-3" >
        <button type="submit" name="submit" class="btn btn-block btn-primary" value="valid">VALIDASI</button>
      </div>
      <div class="col-md-3" >
        <button type="submit" name="submit" class="btn btn-block btn-danger" value="cancel">BATALKAN VALIDASI</button>
      </div>
      <?php
        }
      ?>
      <div class="col-md-3" >
      </div>
    </div>
    </form> 
    <?php 
      } else {
        echo "<h3 class='box-title'>No Result Found</h3>";
      }
    ?>
  
    </div>
      <!-- /.box -->      

      <!-- /.box -->      
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
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap datepicker locale indonesian-->
<script src="bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.id.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      language: "id",
      format: "DD, dd MM yyyy",
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showMeridian: false,
      minuteStep: 1,
      showInputs: false
    })
  })
</script>
</body>
</html>
