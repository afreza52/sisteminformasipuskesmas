<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <title>PUSKESMAS SEJAHTERA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('/asset'); ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet"
        href="<?= base_url('asset'); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/dist/css/skins/_all-skins.min.css">

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

<body
    class="hold-transition skin-blue sidebar-mini <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
    <div class="wrapper">


        <header class="main-header">

            <!-- Logo -->
            <a href="<?= base_url('dashboard'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>P</b>KS</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>P</b>USKESMAS</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%"
                                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%"
                                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('asset/dist/img/user2-160x160.jpg'); ?>" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs">

                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('asset/dist/img/user2-160x160.jpg'); ?>" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        <?= ucfirst($this->fungsi->user_login()->nama); ?>
                                        <small>
                                            <?php $role = $this->fungsi->user_login()->role;

                                            if ($role == 1) {
                                                $hasil = "admin";
                                            } elseif ($role == 2) {
                                                $hasil = "petugas";
                                            } elseif ($role == 3) {
                                                $hasil = "dokter";
                                            } else {
                                                $hasil = "Tidak Dikenal"; // Jika nilai tidak sesuai dengan 1, 2, atau 3
                                            }

                                            echo ucwords($hasil);
                                            ?>
                                        </small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('auth/logout');
                                        ?>" class="btn btn-danger btn-flat">Sign
                                            out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
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
                        <img src="<?= base_url('asset/dist/img/user2-160x160.jpg'); ?>" class="img-circle"
                            alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?= ucfirst($this->fungsi->user_login()->nama); ?>
                        </p>
                        <a href="#"><i class="fa fa-circle text-info"></i>
                            <?php $role = $this->fungsi->user_login()->role;

                            if ($role == 1) {
                                $hasil = "admin";
                            } elseif ($role == 2) {
                                $hasil = "petugas";
                            } elseif ($role == 3) {
                                $hasil = "dokter";
                            } else {
                                $hasil = "Tidak Dikenal"; // Jika nilai tidak sesuai dengan 1, 2, atau 3
                            }

                            echo ucwords($hasil);
                            ?>
                        </a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                    <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                        <a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <?php
                    $role = $this->fungsi->user_login()->role;
                    if ($role == 1 || $role == 3) { ?>
                        <li
                            class="treeview <?= $this->uri->segment(1) == 'umum' || $this->uri->segment(1) == 'gigi' || $this->uri->segment(1) == 'mata' || $this->uri->segment(1) == 'anak' || $this->uri->segment(1) == 'lansia' || $this->uri->segment(1) == 'KIA_MTBS_KB' || $this->uri->segment(1) == 'gizi' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-list"></i>
                                <span>Pemeriksaan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'umum' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('umum'); ?>"><i class="fa fa-stethoscope"></i>Poli
                                        Umum</a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'gigi' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('gigi'); ?>"><i class="fa fa-stethoscope"></i>Poli
                                        Gigi</a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'mata' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('mata'); ?>"><i class="fa fa-stethoscope"></i>Poli
                                        Mata</a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'anak' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('anak'); ?>"><i class="fa fa-stethoscope"></i>Poli
                                        Anak</a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'lansia' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('lansia'); ?>"><i class="fa fa-stethoscope"></i>Poli Lansia</a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'KIA_MTBS_KB' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('KIA_MTBS_KB'); ?>"><i class="fa fa-stethoscope"></i>Poli
                                        KIA_MTBS_KB</a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'gizi' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('gizi'); ?>"><i class="fa fa-stethoscope"></i>Poli Gizi</a>
                                </li>
                            </ul>
                        </li>
                    <?php }
                    ; ?>
                    <?php $role = $this->fungsi->user_login()->role;
                    if ($role == 1 || $role == 2) { ?>
                        <li class="treeview <?= $this->uri->segment(1) == 'pendaftaran' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-list"></i>
                                <span>Pendaftaran</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(2) == 'daftarbaru' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('pendaftaran/daftarbaru'); ?>"><i
                                            class="fa fa-registered"></i>Daftar</a>
                                </li>
                                <li <?= $this->uri->segment(2) == 'terdaftar' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('pendaftaran/terdaftar'); ?>"><i
                                            class="fa fa-registered"></i>Terdaftar</a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="treeview <?= $this->uri->segment(1) == 'pembayaranlunas' || $this->uri->segment(1) == 'pembayaranbelumlunas' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-list"></i>
                                <span>Transaksi</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'pembayaranlunas' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('pembayaranlunas'); ?>"><i class="fa fa-users"></i>Data
                                        Pembayaran Lunas</a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'pembayaranbelumlunas' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('pembayaranbelumlunas'); ?>"><i class="fa fa-heartbeat"></i>Data
                                        Pembayaran Belum Lunas
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php }
                    ; ?>
                    <li
                        class="treeview <?= $this->uri->segment(1) == 'pasien' || $this->uri->segment(1) == 'dokter' || $this->uri->segment(1) == 'poliklinik' || $this->uri->segment(1) == 'diagnosa' || $this->uri->segment(1) == 'pemeriksaan' || $this->uri->segment(1) == 'obat' || $this->uri->segment(1) == 'obat' || $this->uri->segment(1) == 'tindakan' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-list"></i>
                            <span>Master Data</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'pasien' ? 'class="active"' : '' ?>><a
                                    href="<?= base_url('pasien'); ?>"><i class="fa fa-users"></i>Data
                                    Pasien</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'dokter' ? 'class="active"' : '' ?>><a
                                    href="<?= base_url('dokter'); ?>"><i class="fa fa-user-md"></i>Data
                                    Dokter</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'poliklinik' ? 'class="active"' : '' ?>><a
                                    href="<?= base_url('poliklinik'); ?>"><i class="fa fa-heartbeat"></i>Data
                                    Poliklinik</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'diagnosa' ? 'class="active"' : '' ?>><a
                                    href="<?= base_url('diagnosa'); ?>"><i class="fa fa-heartbeat"></i>Data
                                    Diagnosa</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'tindakan' ? 'class="active"' : '' ?>><a
                                    href="<?= base_url('tindakan'); ?>"><i class="fa fa-heartbeat"></i>Data
                                    Tindakan</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'pemeriksaan' ? 'class="active"' : '' ?>><a
                                    href="<?= base_url('pemeriksaan'); ?>"><i class="fa fa-stethoscope"></i>Data
                                    Pemeriksaan</a>
                            </li>
                            <li <?= $this->uri->segment(1) == 'obat' ? 'class="active"' : '' ?>><a
                                    href="<?= base_url('obat'); ?>"><i class="fa fa-adjust"></i>Data
                                    Obat</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview <?= $this->uri->segment(2) == 'pendaftaran' ?>">
                        <a href="#">
                            <i class="fa fa-list"></i>
                            <span>Laporan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php $role = $this->fungsi->user_login()->role;
                            if ($role == 1 || $role == 3) { ?>
                                <li <?= $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url(''); ?>"><i class="fa fa-file-text"></i>
                                        Pemeriksaan</a>
                                </li>
                            <?php }
                            ; ?>
                            <?php $role = $this->fungsi->user_login()->role;
                            if ($role == 1 || $role == 2) { ?>
                                <li <?= $this->uri->segment(2) == 'pendaftaran' ? 'class="active"' : '' ?>><a
                                        href="<?= base_url('laporan/pendaftaran'); ?>"><i class="fa fa-file-text"></i>Pendaftaran</a>
                                </li>
                            <?php }
                            ; ?>
                        </ul>
                    </li>
                    <?php ?>
                    <?php if ($this->fungsi->user_login()->role == 1) { ?>
                        <li class="header">SETTINGS</li>
                        <li><a href="<?= base_url('user'); ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
                    <?php }
                    ; ?>


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <script src="<?= base_url('asset'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Content Wrapper. Contains page content -->


        <!-- Content Header (Page header) -->
        <?= $contents; ?>
        <!-- /.content -->

        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy;2023 Afreza Dwi Z.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <!-- /.control-sidebar-menu -->
                </div>
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
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                        class="fa fa-trash-o"></i></a>
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


    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('asset'); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url('asset'); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('asset'); ?>/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('asset'); ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('asset'); ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('asset'); ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('asset'); ?>/dist/js/demo.js"></script>
    <script src="<?= base_url('asset'); ?>/pemeriksaan.js"></script>

    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable()
        })
        $(document).ready(function () {

            $('#simpan').click(function () {
                var id_pemeriksaan = $('#id_pemeriksaan').val();
                var id_diagnosa = $('#id_diagnosa').val();
                var id_tindakan = $('#id_tindakan').val();
                var catatan = $('#catatan').val();

                var perobat = [];
                $('#resepobat .perobat').each(function () {
                    var obat = $(this).find('.obat').text();
                    var qty = parseInt($(this).find('.qty').text());
                    var satuan = $(this).find('.satuan').text();
                    var aturan = $(this).find('.aturan').text();

                    perobat.push({
                        obat: obat,
                        qty: qty,
                        satuan: satuan,
                        aturan: aturan,
                    });
                });
                var datakirim = {
                    id_pemeriksaan: id_pemeriksaan,
                    id_diagnosa: id_diagnosa,
                    id_tindakan: id_tindakan,
                    catatan: catatan,
                    perobat: perobat
                };
                $.ajax({
                    url: "<?= base_url('pemeriksaan/periksa') ?>",
                    type: 'POST',
                    data: datakirim,
                    dataType: 'json',
                    success: function (response) {
                        alert('Data berhasil disimpan ke database.');
                    },
                    error: function () {
                        alert('Terjadi kesalahan saat menyimpan data.');
                    }
                });
            });
        });
    </script>