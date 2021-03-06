<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Gudang | Data Barang Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/gudang/web_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/gudang/web_admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/gudang/web_admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/gudang/web_admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/gudang/web_admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/gudang/datetimepicker/css/bootstrap-datetimepicker.css">
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

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('gudang')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>gudang</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php foreach($avatar as $a){?>
              <img src="<?php echo base_url('assets/gudang/upload/user/img/'.$a->nama_file)?>" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?=$this->session->userdata('name')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php foreach($avatar as $a){ ?>
                <img src="<?php echo base_url('assets/gudang/upload/user/img/'.$a->nama_file)?>" class="img-circle" alt="User Image">
                <?php } ?>

                <p>
                  <?=$this->session->userdata('name')?> - Web Developer
                  <small>Last Login: <?=$this->session->userdata('last_login')?></small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('gudang/profile')?>" class="btn btn-default btn-flat"><i class="fa fa-cogs" aria-hidden="true"></i> Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('gudang/sigout')?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php foreach($avatar as $a){ ?>
          <img src="<?php echo base_url('assets/gudang/upload/user/img/'.$a->nama_file)?>" class="img-circle" alt="User Image">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('name')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?= base_url('gudang')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
          <!-- <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>assets/gudang/web_admin/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="<?php echo base_url()?>assets/gudang/web_admin/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="active"><a href="<?= base_url('gudang/form_barangmasuk')?>"><i class="fa fa-circle-o"></i> Tambah Data Barang Masuk</a></li>-->
            <!-- <li><a href="<?= base_url('gudang/form_satuan')?>"><i class="fa fa-circle-o"></i> Tambah Stok Bahan</a></li>  -->
            <li><a href="<?php echo base_url('gudang/form_barangmasuk')?>"><i class="fa fa-circle-o"></i> Template Tas </a></li>
            <li><a href="<?php echo base_url('gudang/form_satuan')?>"><i class="fa fa-circle-o"></i> Tambah Stok Bahan</a></li>
          </ul>
        </li>
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('gudang/tabel_barangmasuk')?>"><i class="fa fa-circle-o"></i> Tabel Barang Masuk</a></li>
            <li><a href="<?= base_url('gudang/tabel_barangkeluar')?>"><i class="fa fa-circle-o"></i> Tabel Barang Keluar</a></li>
            <li><a href="<?= base_url('gudang/tabel_satuan')?>"><i class="fa fa-circle-o"></i> Tabel Stok Bahan</a></li>
          </ul>
        </li>
        <li>
        <li class="header">LABELS</li>
        <li>
          <a href="<?php echo base_url('gudang/profile')?>">
         <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
        </li>
        <li>
          <a href="<?php echo base_url('gudang/users')?>">
         <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Users</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Template Tas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Data Barang Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="container">
            <!-- general form elements -->
          <div class="box box-primary" style="width:94%;">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Template Tas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="container">
            <form action="<?=base_url('gudang/proses_template_masuk_insert')?>" method="post" enctype="multipart/form-data">

              <?php if($this->session->flashdata('msg_berhasil')){ ?>
                <div class="alert alert-success alert-dismissible" style="width:91%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
               </div>
              <?php } ?>

              <?php if(validation_errors()){ ?>
              <div class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
             </div>
            <?php } ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="id_transaksi" style="margin-left:220px;display:inline;">ID Template</label>
                  <input type="text" name="id_template_product" style="margin-left:37px;width:20%;display:inline;" class="form-control" readonly="readonly" value="TP-<?=random_string('numeric', 5);?>">
                </div>
                <!-- <div class="form-group">
                  <label for="tanggal" style="margin-left:220px;display:inline;">Tanggal</label>
                  <input type="text" name="tanggal" style="margin-left:66px;width:20%;display:inline;" class="form-control form_datetime" placeholder="Klik Disini">
                </div> -->
                <div class="form-group" style="display:inline-block;">
                  <label for="nama_Barang" style="margin-left:220px;display:inline;">Nama Barang</label>
                  <input type="text" name="nama_template" style="margin-left:220px;width:34%;display:inline;" class="form-control" id="nama_Barang" placeholder="Nama Barang">
              </div>
              <br>
              <br>
              <div class="form-group" style="display:inline-block;">
                  <label for="satuan" style="width:73%;">Jenis Tas</label>
                  <select class="form-control" name="jenis_tas" style="width:90%;margin-right: 67px;">
                    <option value="" selected="">-- Pilih --</option>
                    <?php foreach($list_tas as $t){ ?>
                    <option value="<?=$t->nama_tas?>"><?=$t->nama_tas?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group" style="display:inline-block;">
                   <label for="nama_Barang" style="width:73%;">Type Sleting</label>
                   <select class="form-control" name="bag_depan" style="width:90%;margin-right: 67px;" id="sleting">
                    <option value="" selected="">-- Pilih --</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
              </div>

              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:73%;">Harga</label>
                <input type="number" name="harga" style="" class="form-control" id="jumlah" id="harga_sleting">
              </div>
              <div>
              
              <div class="form-group" style="display:inline-block;">
                  <label for="satuan" style="width:73%;">Bagian Depan</label>
                  <select class="form-control" name="bag_depan" style="width:90%;margin-right: 67px;">
                    <option value="" selected="">-- Pilih --</option>
                    <?php foreach($list_bahan as $d){ ?>
                    <option value="<?=$d->nama_bahan?>"><?=$d->nama_bahan?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:73%;">Harga</label>
                <input type="text" name="harga" style="" class="form-control" id="txt1" onkeyup="sum();">
              </div>
              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:73%;margin-left:33px;">Unit Depan</label>
                <input type="text" name="unit_depan" style="width:41%;margin-left:34px;margin-right:18px;" class="form-control" id="txt2" onkeyup="sum();">
              </div>
              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:73%;">Harga Total</label>
                <input type="text" name="harga" style="" class="form-control" id="txt3" onkeyup="sum();">
              </div>

              <br>
              <div class="form-group" style="display:inline-block;">
                  <label for="satuan" style="width:73%;">Bagian Belakang</label>
                  <select class="form-control" name="bag_belakang" style="width:90%;margin-right: 67px;">
                    <option value="" selected="">-- Pilih --</option>
                    <?php foreach($list_bahan as $d){ ?>
                    <option value="<?=$d->nama_bahan?>"><?=$d->nama_bahan?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:73%;">Harga</label>
                <input type="text" name="harga" style="" class="form-control" id="txt4" onkeyup="sum();">
              </div>
              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:73%;margin-left:33px;">Unit Belakang</label>
                <input type="text" name="unit_belakang" style="width:41%;margin-left:34px;margin-right:18px;" class="form-control" id="txt5" onkeyup="sum();">
              </div>
              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:73%;">Harga Total</label>
                <input type="text" name="harga" style="" class="form-control" id="txt6" onkeyup="sum();">
              </div> <br>
              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:83%;">Harga Barang</label>
                <input type="text" name="harga" style="" class="form-control" id="txt8" onkeyup="sum();">
              </div>
               <div class="form-group" style="display:inline-block;">
                <label for="jumlah" style="width:73%;margin-left:47px;">Harga Jual</label>
                <input type="number" name="total_harga" style="width:90%;margin-left:47px;" class="form-control" id="total_harga">
              </div>
              <div class="form-group" style="display:inline-block;margin-left:47px;">
                  <label for="deskripsi" style="width:73%;">Deskripsi</label>
                  <input type="text" name="deskripsi" style="width:90%;margin-right:67px;" class="form-control" id="deskripsi" placeholder="Deskripsi">
              </div>
              <div>
                
                <!-- <div class="form-group" style="display:inline-block;">
                  <label for="photo" style="width:73%;">Insert Photo</label>
                  <input type="file" name="photo">
              </div> -->
              
             
             <div class="box-body">
            <div class="form-group" style="display:inline-block;">
              <button type="reset" class="btn btn-basic" name="btn_reset" style="width:90px;"><i class="fa fa-eraser" aria-hidden="true"></i> Reset</button>
            </div>
              <!-- /.box-body -->
              <div class="box-footer" style="width:93%;">
                <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                <a type="button" class="btn btn-info" style="width:14%;margin-right:29%" href="<?=base_url('gudang/tabel_barangmasuk')?>" name="btn_listbarang"><i class="fa fa-table" aria-hidden="true"></i> Lihat List Barang</a>
                <button type="submit" style="width:20%" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
              </div>
            </form>
          </div>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->

          <!-- /.box -->


          <!-- /.box -->

          <!-- Input addon -->

          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!-- <div class="col-md-6">
          <!-- Horizontal Form -->

          <!-- /.box -->
          <!-- general form elements disabled -->

          <!-- /.box -->

        </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <?=date('Y')?></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url()?>assets/gudang/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url()?>assets/gudang/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url()?>assets/gudang/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url()?>assets/gudang/web_admin/dist/js/adminlte.min.js"></script>
  <script src="<?php echo base_url()?>assets/gudang/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url()?>assets/gudang/web_admin/dist/js/demo.js"></script>

  <script type="text/javascript">
      $(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayBtn: true,
        pickTime: false,
        minView: 2,
        maxView: 4,
      });

      function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var txtSatuNumberValue = document.getElementById('txt4').value;
      var txtDuaNumberValue = document.getElementById('txt5').value;

      // if(document.getElementById('sleting').value == 'YES'){
      //   var jual = result + result1 + 5000;
      // document.getElementById('txt8').value = jual;
      // }

      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      var result1 = parseInt(txtSatuNumberValue) * parseInt(txtDuaNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
         }
      if (!isNaN(result1)) {
         document.getElementById('txt6').value = result1;
         }

         if(document.getElementById('sleting').value == 'YES'){
            var jual = result + result1 + 5000;
            document.getElementById('txt8').value = jual;
          }

          if(document.getElementById('sleting').value == 'NO'){
            var jual = result + result1 + 5000;
            document.getElementById('txt8').value = jual;
          }

      var total = jual + (jual * (20/100));
      document.getElementById('total_harga').value = total;
      }
      
  </script>
  </body>
  </html>
