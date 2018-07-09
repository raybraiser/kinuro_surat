<?php
    $status_session = $this->session->status;
    $nama = $this->session->admin_nama_lengkap;
    if (!$status_session == 'login') {
        header('Location: '.base_url('index.php/login'));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("asset/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url("asset/metisMenu/metisMenu.min.css"); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("asset/css/dashboard.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("asset/css/img_with_button.css"); ?>" rel="stylesheet">

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url("asset/jquery/jquery-3.2.1.min.js"); ?>"></script>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("asset/jquery-ui/jquery-ui.min.css"); ?>" rel="stylesheet">

    <!-- jQuery UI -->
    <script type="text/javascript" src="<?php echo base_url("asset/jquery-ui/jquery-ui.min.js"); ?>"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("asset/DataTables/jquery.dataTables.min.js"); ?>"></script>

    <!-- DataTables Bootstrap JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("asset/DataTables/dataTables.bootstrap.min.js"); ?>"></script>

    <!-- Datatables CSS -->
    <link href="<?php echo base_url("asset/DataTables/dataTables.bootstrap.min.css"); ?>" rel="stylesheet">   

    <!-- Sweetalert -->
    <script type="text/javascript" src="<?php echo base_url("asset/sweetalert/sweetalert.min.js"); ?>"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('index.php/dashboard'); ?>">Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <strong><?php echo $nama; ?></strong> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fas fa-user"></i> User Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-cogs"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                            <li><a href="<?php echo base_url('index.php/login/logout'); ?>"><i class="fas fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fas fa-desktop"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/surat_masuk'); ?>"><i class="fas fa-folder"></i> Surat Masuk</a>
                        </li>
                        <li>
                            <a href="#"><i class="far fa-folder"></i> Surat Keluar</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('index.php/surat_nikah'); ?>"><i class="fas fa-file"></i> Surat Nikah</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/surat_baptis'); ?>"><i class="fas fa-file"></i> Surat Baptis</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/surat_sidi'); ?>"><i class="fas fa-file"></i> Surat Sidi</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/surat_keputusan'); ?>"><i class="fas fa-file"></i> Surat Keputusan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/surat_keterangan'); ?>"><i class="fas fa-file"></i> Surat Keterangan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/pengaturan') ?>"><i class="fas fa-cog"></i> Pengaturan</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/login/logout'); ?>"><i class="fas fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?=$contents; ?>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

    </div>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("asset/bootstrap/js/bootstrap.min.js"); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("asset/metisMenu/metisMenu.min.js"); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("asset/js/dashboard.js"); ?>"></script>

    <!-- Custom Fonts -->
    <script type="text/javascript" src="<?php echo base_url("asset/fontawesome/svg-with-js/js/fontawesome-all.min.js"); ?>"></script>

</body>

</html>
