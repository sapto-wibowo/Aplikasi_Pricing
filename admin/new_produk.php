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

    <!-- <header style="background-color : #5F9EA0;">
        <div class="container-fluid">
            <h1 id="logo"><img src="./logo metod.png" style="width:70px; height:80px;" href="">  ADMIN</h1>
            <nav>
                <a href="" style="color : white;">Beranda</a>
                <a href="tutorial.php">Tutorial</a>
                <a href="tentang.php">Tentang</a>
                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalog">Login</button>
            </nav>
        </div>
    </header> -->

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
                    <!-- <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a> -->
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
            <h1 class="h3 mb-0 text-gray-800">New Produk</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
        <!-- <h2>HALAMAN ADMIN</h2> -->
            <!-- isi-->
            <div> NAMA AKUN : <?php echo $_SESSION['status'];?></div>
            <div> KODE AKUN : <?php echo $_SESSION['kd_user'];?></div><br>
        <div class="card shadow mb-4">
            <!-- isi disini -->
            <form action ="" method= "POST" autocomplete="off">
                <div>
                    <label class="control-label col-md text-center" for="id_user" style="color:black; font-family: Cambria; font-size:25px; margin-top:20px;margin-bottom:-10px;">Nama user</label>
                    <div class="form-group col-md">
                        <select type="text" name="id_user" class="form-control"required="true">
                            <option value="-">-</option>
                        <?php 
                            $pil=mysqli_query($mysqli, "SELECT *FROM log_in WHERE id_user");
                            while($pil_id=mysqli_fetch_array($pil)){
                        ?>
                            <option value="<?php echo $pil_id['id_user'];?>"><?php echo $pil_id['nama'];?></option>
                            
                            <?php }?>
                        </select>                    
                    </div>
                </div>
                <div>
                    <label class="control-label col-md text-center" for="nama_ush" style="color:black; font-family: Cambria; font-size:25px; margin-top:20px;margin-bottom:-10px;">Nama Produk Usaha</label>
                    <div class="form-group col-md">
                        <input type="text" name="nama_ush" class="form-control" placeholder="Masukkan Nama produk" required="true">
                    </div>
                </div>

                <div>
                    <label class="control-label col-md text-center" for="sub_ctry" style="color:black; font-family:Cambria; font-size:25px;margin-top:20px; margin-bottom:-10px;">Kategori</label>
                    <div class="form-group col-md">
                    <select type="text" name="sub_ctry" class="form-control"required="true">
                            <option value="-">-</option>
                        <?php 
                            $pil_ctg=mysqli_query($mysqli, "SELECT *FROM kategori_produk WHERE id_ctg");
                            while($il_ctg=mysqli_fetch_array($pil_ctg)){
                        ?>
                            <option value="<?php echo $il_ctg['kategori'];?>"><?php echo $il_ctg['nama_kategori'];?></option>
                            
                        <?php }?>
                    </select>                    
                    </div>                                
                </div>
                <div>
                    <label class="control-label col-md text-center" for="ktg_lain" style="color:black; font-family: Cambria; font-size:25px; margin-top:20px;margin-bottom:-10px;">Keterangan lain</label>
                    <div class="form-group col-md">
                        <input type="text" name="ktg_lain" class="form-control" placeholder="Keterangan tambahan" required="true">
                    </div>
                </div>
                <div class="row col-md text-center">
                    <div class="form-group col-md-6">
                    <label class="control-label" for="dekade" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Waktu Produksi</label>
                        <div>
                            <select type="text" name="dekade" class="form-control" placeholder="Masukkan total biaya bahan baku" required="true">
                                <option value="-">-</option>
                                <option value="Harian">Harian</option>
                                <option value="Mingguan">Mingguan</option>
                                <option value="Bulanan">Bulanan</option>
                                <option value="Tahunan">Tahunan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label col-md-6" for="bhbk" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Biaya Bahan Baku
                    </label>
                        <input type="number" name="bhbk" class="form-control" placeholder="Masukkan total biaya bahan baku" required="true">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label col-md-9" for="tngkj" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Biaya tenaga kerja</label>
                        <input type="number" name="tngkj" class="form-control" placeholder="Masukkan total biaya tenaga kerja" required="true">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label col-md-6" for="ovrhd" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Biaya overhead</label>
                        <input type="number" name="ovrhd" class="form-control" placeholder="Masukkan total biaya overhead" required="true">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label col-md-6" for="by_lain" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Biaya lainnya</label>
                        <input type="number" name="by_lain" class="form-control" placeholder="Masukkan total biaya lainnya" required="true">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label col-md-6" for="jm_produk" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Jumlah Produksi</label>
                        <input type="number" name="jm_produk" class="form-control" placeholder="Masukkan banyaknya produksi" required="true">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label col-md-8" for="jm_jual" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Jumlah Permintaan</label>
                        <input type="number" name="jm_jual" class="form-control" placeholder="Masukkan banyaknya permintaan" required="true">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label col-md-6" for="margin_cpp" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Margin</label>
                        <input type="number" name="margin_cpp" min="0" max="100" class="form-control" placeholder="0.00 %" step="0.01" required="true">
                    </div>

                </div>

                <div>
                    <!-- <div>
                    <label class="control-label col-md-6" style="color:black; font-family:Cambria; font-size:12px;margin-top:20px; margin-bottom:-10px;">Hasil</label>
                    
                    </div> -->
                <center>
                    <a href='list_produk.php' class='btn btn-secondary'>Kembali</a>
                    <input type="submit" class='btn btn-outline-primary' name="proses" value="SIMPAN">
                </center><br>
                </div>
            </form>
                <?php
                    if(isset($_POST['proses'])){
                    $kd_user = $_POST['id_user'];
                    $nama_ush = $_POST['nama_ush'];
                    $sub_ctry = $_POST['sub_ctry'];
                    $ktg_lain = $_POST['ktg_lain'];
                    $dekade = $_POST['dekade'];
                    $bhbk = $_POST['bhbk'];
                    $tngkj = $_POST['tngkj'];
                    $ovrhd = $_POST['ovrhd'];
                    $by_lain = $_POST['by_lain'];
                    $jm_produk =$_POST['jm_produk'];
                    $jm_jual = $_POST['jm_jual'];
                    $margin_cpp = $_POST['margin_cpp'];
                    $creat = gmdate("Y-m-d H:i:s", time()+60*60*7);
                    $modal = $bhbk + $tngkj+$ovrhd+$by_lain;
                    $_SESSION['new']='aktif';

                    // $_SESSION['status']='aktif';
                    // $hasil = ($modal+($modal * ($margin_cpp/100)))/$jm_produk;
                    // <input type='text' class='form-control' value='$hasil'>
                    $result=mysqli_query($mysqli, "INSERT INTO tb_cpp(id_user,nama_ush,sub_ctg,ktg_lain,dekade,bhbk,tngkj,ovrhd,by_lain,modal,jm_produk,jm_jual,margin_cpp,saran_margin,created_at)  
                    VALUES('$kd_user','$nama_ush','$sub_ctry','$ktg_lain','$dekade','$bhbk','$tngkj','$ovrhd','$by_lain','$modal','$jm_produk','$jm_jual','$margin_cpp','kosong','$creat')");
                    if($result){
                        // echo " Disimpan";
                        echo "<script>document.location='../tampil.php'</script>";
                        // echo "<div class='alert alert-success fade in'>
                        // <a href='tampil.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        // User Added Successfully
                        //     </div>";

                    }else{
                        echo "Error, tidak berhasil". mysqli_error($mysqli);
                    }
                }
                ?>
            <!-- last isi disini -->
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
            <!-- <h2>HALAMAN ADMIN</h2> -->
            <!-- isi-->
            <!-- <div> NAMA AKUN : ?php echo $_SESSION['status'];?></div>
            <div> KODE AKUN : ?php echo $_SESSION['kd_user'];?></div> -->
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
                        <form action ="../margin.php" method= "POST" class="container-fluid">
                            <div>
                                <div>
                                    <input type="hidden" name="user" class="form-control" value="<?php echo $_SESSION['status'];?>">
                                </div>
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
    <!-- last main
    window.$ = window.jQuery = require('jquery');
window.Tether = require('tether');
require('bootstrap'); -->
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
