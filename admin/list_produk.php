<?php
    include_once("../connect.php");
    // $result = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC");
    session_start();
    if (!isset($_SESSION['status'])) {
        echo "<script>
        alert('Anda Belum Login');
        document.location='../halaman_utama_AP.php'
        </script>";
    }
    unset($_SESSION['updt'])
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="assets/sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/sb_admin/css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">/* Chart.js */
    @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 
    1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}
    .chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}
    .chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>

    <!-- <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <script type="text/javascript" src="js/jquery.js"></script>         
    <script type="text/javascript" src="js/styleku.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> -->
    <title>Aplikasi_Pricing</title>
                    
</head>
<body>
<div id="wrapper">
<!-- sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color : #5F9EA0;">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <div class="sidebar-brand-text mx-3">ADMIN</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="halaman_admin.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item  active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
                <span>Data Produk</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage Produk:</h6>
                    <a class="collapse-item" href="list_produk.php">Data tabel</a>
                    <a class="collapse-item" href="new_produk.php">New Produk</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Data user</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage user:</h6>
                    <a class="collapse-item" href="list_user.php">Data user</a>
                    <a class="collapse-item" href="new_user.php">New User</a>
                    <!-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a> -->
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <!-- <div class="sidebar-heading">
            Addons
        </div> -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Margin</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Show Data:</h6>
                    <a class="collapse-item" href="../grph.php">All Data</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="list_ctg.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Kategori Produk</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="keluhan_saran.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Ulasan Pengguna</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- end of sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
        <!-- top nav -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <!-- <h6> Empty</h6> -->
            </form>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color : black;"href="tutorial.php">Tutorial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color : black;"href="tentang.php">Tentang</a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                    <img class="img-profile rounded-circle" src="../Foto Diri.JPEG">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modallogout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

            </ul>
        </nav>
    <!-- end of nav -->

    <!-- Content begin -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
        <!-- <h2>HALAMAN ADMIN</h2> -->
            <!-- isi-->
            <div> NAMA AKUN : <?php echo $_SESSION['status'];?></div>
            <div> KODE AKUN : <?php echo $_SESSION['kd_user'];?></div><br>
        <div class="card shadow mb-4">
            <div class="card-body">
            <a type="button"  href="export.php" class="btn btn-outline-primary">Export Data</a>
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <!-- row tabel -->
                        <div class="row">
                            <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 150%;">
                                <thead>
                                    <tr role="row" style="background-color : #5F9EA0; color:black;">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending" style="width: 15.859px;">No. </th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Kode barang: activate to sort column ascending" style="width: 109.312px;">Kode barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama produk: activate to sort column ascending" style="width: 160.859px;">Nama Produk</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Waktu Produksi: activate to sort column ascending" style="width: 135.312px;">Waktu Produksi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Modal: activate to sort column ascending" style="width: 135.312px;">Modal</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jmlh Produk: activate to sort column ascending" style="width: 48.8281px;">Jmlh Produk</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jmlh Terjual: activate to sort column ascending" style="width: 48.8281px;">Jmlh Terjual</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Harga Jual: activate to sort column ascending" style="width: 129.312px;">Harga Jual</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Keuntungan: activate to sort column ascending" style="width: 129.312px;">Keuntungan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Margin: activate to sort column ascending" style="width: 48.8281px;">Margin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Saran Margin: activate to sort column ascending" style="width: 129.312px;">Saran Margin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Saran Margin: activate to sort column ascending" style="width: 129.312px;">Created at</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Saran Margin: activate to sort column ascending" style="width: 129.312px;">Update at</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 48.8281px;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">No.</th>
                                        <th rowspan="1" colspan="1">Kode barang</th>
                                        <th rowspan="1" colspan="1">Nama Produk</th>
                                        <th rowspan="1" colspan="1">Waktu Produksi</th>
                                        <th rowspan="1" colspan="1">Modal</th>
                                        <th rowspan="1" colspan="1">Jmlh Produk</th>
                                        <th rowspan="1" colspan="1">Jmlh Terjual</th>
                                        <th rowspan="1" colspan="1">Harga Jual</th>
                                        <th rowspan="1" colspan="1">Keuntungan</th>
                                        <th rowspan="1" colspan="1">Margin</th>
                                        <th rowspan="1" colspan="1">Saran Margin</th>
                                        <th rowspan="1" colspan="1">Created at</th>
                                        <th rowspan="1" colspan="1">Update at</th>
                                        <th rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <!-- menampilkan data -->
                                <?php
                                $no=1;
                                $kd_user = $_SESSION['kd_user'];
                                $row_data= mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp");
                                while($view = mysqli_fetch_array($row_data)){
                                    echo "<tr>";
                                        echo "<td>".$no."</td>";
                                        echo "<td>".$view['id_user']."-".$view['id_cpp']."</td>";
                                        echo "<td>".$view['nama_ush']." <a href='#' class='btn btn-info btn-circle btn-sm' data-toggle='modal' data-target='#modal_usaha$view[id_cpp]'>
                                        <i class='fas fa-info-circle'></i>
                                        </a> </td>";
                                        echo "<td>".$view['dekade']."</td>";
                                        echo "<td>Rp ".number_format($view['modal'],0,',','.').
                                        " <a href='#' class='btn btn-primary btn-circle btn-sm' data-toggle='modal' data-target='#modal_info$view[id_cpp]'>
                                            <i class='fas fa-info-circle'></i>
                                            </a>
                                        </td>";
                                        echo "<td>".$view['jm_produk']."</td>";    
                                        echo "<td>".$view['jm_jual']."</td>";    
                                        echo "<td>Rp ".number_format($view['nilai_jual'],0,',','.')."</td>";    
                                        echo "<td>Rp ".number_format($view['keuntungan'],0,',','.')."</td>";    
                                        echo "<td>".$view['margin_cpp']."%</td>";    
                                        echo "<td>".$view['nilai_margin']."</td>";    
                                        echo "<td>".$view['created_at']."</td>";    
                                        echo "<td>".$view['updated_at']."</td>";    
                                        echo "<td>
                                        <a href='edit_produk.php?id_cpp=$view[id_cpp]' type='button' class='btn btn-warning btn-xs' style='position:right;'> <i class='fas fa-exclamation-triangle'></i> Edit</a>

                                        <h4><a href='del_produk.php?id_del=$view[id_cpp]' class='badge badge-danger' onclick='return confirm(\"Data akan dihapus secara Permanen !!?\")'> <i class='fas fa-trash'></i> Delete</a></h4>
                                        </td>";    
                                    echo "</tr>";
                                    ?>
                                    
                                    <!-- modal info -->
                                <div id="modal_info<?=$view['id_cpp'];?>" class="modal fade" role="dialog" style="display:none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal_infoLabel">Info Modal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                            $cek_modal = $view['id_cpp'];
                                            $row_mo= mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp=$cek_modal");
                                            while($r_mo = mysqli_fetch_array($row_mo)){ ?>
                                        <div class="modal-body">
                                            <form autocomplete="off">
                                                <div class="form-group row">
                                                        <input type="hidden" class="form-control" name="id_cpp" hidden="true" value="<?= $cek_modal;?>">
                                                    <label class="col-sm-4 col-form-label">Biaya Bahan Baku</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="Rp <?= number_format($r_mo['bhbk'],0,',','.');?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Biaya Tenaga Kerja</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="Rp <?= number_format($r_mo['tngkj'],0,',','.');?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Biaya Overhead</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="Rp <?= number_format($r_mo['ovrhd'],0,',','.');?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Biaya Lain-Lain</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="Rp <?= number_format($r_mo['by_lain'],0,',','.');?>" readonly="true">
                                                    </div>
                                                </div>
                                            <?php
                                                }//end while info modal
                                                ?>
                                            </form>
                                            <!-- end modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <a type="button"  href="../logout.php" class="btn btn-primary">Ya</a> -->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End modal info -->

                                <!-- modal info nama usaha -->
                                <div id="modal_usaha<?=$view['id_cpp'];?>" class="modal fade" role="dialog" style="display:none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal_usahaLabel">Info Nama Usaha</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                            $cek_usaha = $view['id_cpp'];
                                            $row_ush= mysqli_query($mysqli, "SELECT *FROM tb_cpp INNER JOIN kategori_produk ON kategori_produk.kategori=tb_cpp.sub_ctg WHERE id_cpp=$cek_usaha");
                                            while($r_ush = mysqli_fetch_array($row_ush)){ ?>
                                        <div class="modal-body">
                                            <form autocomplete="off">
                                                <div class="form-group row">
                                                        <input type="hidden" class="form-control" name="id_cpp" hidden="true" value="<?= $cek_modal;?>">
                                                    <label class="col-sm-4 col-form-label">Kategori</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?= $r_ush['nama_kategori'];?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Keterangan Lain</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?= $r_ush['ktg_lain'];?>" readonly="true">
                                                    </div>
                                                </div>
                                            <?php
                                                }//end while info usaha
                                                ?>
                                            </form>
                                            <!-- end modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <a type="button"  href="../logout.php" class="btn btn-primary">Ya</a> -->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end info nama usaha -->
                                    <?php
                                    $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- end row tabel -->
                    </div>
                </div>
            </div>
        </div>                    
    </div>
    <!-- end container fluid -->

    <!-- <div id="main">
        <div id="content">      -->
        <section>
        <!-- section1 -->
            <div class="container">
                <!-- modal logout -->
                <div class="modal fade" id="modallogout" tabindex="-1" role="dialog" aria-labelledby="modallogoutLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSayaLabel">Logout Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin logout ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
                            <a type="button"  href="../logout.php" class="btn btn-primary">Ya</a>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Modal logout end-->
            <!-- last container -->
            </div>



        </section>
        <!-- end section1 -->
        
        <section>
            <!-- penutup -->
        <div class="container" style="max-width:1300px;">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3>Berikan Ulasan Anda</h3>
                    </div>
                        <!-- form start-->
                        <form action ="margin.php" method= "POST" class="container-fluid">
                            <div>
                                <label class="control-label col-md-6" for="nama" style="color:black; font-family:Cambria; font-size:20px;margin-top:20px; margin-bottom:-10px;">Nama</label>
                                <div class="form-group col-md-6">
                                    <input type="text" name="nama" class="form-control" placeholder="" required="true">
                                </div>
                            </div>

                            <div>
                                <label class="control-label col-md-6" for="email_ku" style="color:black; font-family: Cambria; font-size:20px; margin-top:20px;margin-bottom:-10px;">Email</label>
                                <div class="form-group col-md-8">
                                    <input type="email" name="email_ku" class="form-control" placeholder="aga@gmail.com" required="true">
                                </div>
                            </div>
                                <div class="form-group col-md-8">
                                <label class="control-label col-md-6" for="komen" style="color:black; font-family: Cambria; font-size:20px;margin-top:20px; margin-bottom:-10px;">Komentar</label>
                                    <textarea type="text" name="komen" class="form-control" rows="3" required="true"></textarea>
                                </div>
                            </div>
                            <div>
                            <input type='submit' class='btn btn-success' style="float:left; margin-left:3%;" name="kirim" value="KIRIM">
                            </div>
                        </form>
                        <!-- end form -->
                </div>
            </div>
        </div>        <!-- last -->
        </section>
            <!-- last content -->
        <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
            <div class="container">
                <h3>Contact</h3>
                <li>No Telp : 08766523xxxx</li>
                <li>email : akau@gmail.com</li>
                <li>facebook : www.facebook.com/Aliza.***</li>
                <li>alamat : jl. kemenangan, No.15</li>
            </div>
            <div class="container text-center">
                <small>Copyright &copy;Sapto Wibowo - 2022</small>
            </div>
        </footer>
    </div>
    <!-- last main-->
    </div>
</div>
<!-- core jss -->
<script src="assets/sb_admin/vendor/jquery/jquery.min.js"></script>
<script src="assets/sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- core plugin -->
<script src="assets/sb_admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- core script all pages -->
<script src="assets/sb_admin/js/sb-admin-2.min.js"></script>
<!-- page level plugin -->
<script src="assets/sb_admin/vendor/datatables/jquery.dataTables.min.js"></script>
<!-- page level custom plugin -->
<script src="assets/sb_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="assets/sb_admin/js/demo/datatables-demo.js"></script>
<!-- <script src="assets/sb_admin/js/demo/chart-area-demo.js"></script>
<script src="assets/sb_admin/js/demo/chart-pie-demo.js"></script> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    </body>
</html>
