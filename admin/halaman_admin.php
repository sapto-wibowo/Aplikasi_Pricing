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
        <!-- Sidebar - Menu -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halaman_admin.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <div class="sidebar-brand-text mx-3">ADMIN</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
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

        <!-- Nav Item - Menu -->
        <li class="nav-item">
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

        <!-- Nav Item - Menu -->
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
                <a class="nav-link" style="color : black;"href="../tutorial.php">Tutorial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color : black;"href="../tentang.php">Tentang</a>
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
            <!-- isi-->
            <div> NAMA AKUN : <?php echo $_SESSION['status'];?></div>
            <div> KODE AKUN : <?php echo $_SESSION['kd_user'];?></div><br>
            <!-- hitung-hitung -->
            <?php
                    $data=mysqli_query($mysqli,"SELECT *FROM tb_cpp");
                    $count=mysqli_num_rows($data);
                    $x=0;
                    while($sum=mysqli_fetch_array($data)){
                        $x++;
                        $total[$x]=$sum['modal'];
                        $total_margin[$x]=$sum['margin_cpp'];
                    }  
                    $sum_modal = array_sum($total);
                    $sum_margin = array_sum($total_margin);

                    $rata =$sum_modal/$count;
                    $rata_margin =$sum_margin/$count;
                    
                    $user=mysqli_query($mysqli,"SELECT *FROM log_in");
                    $count_user=mysqli_num_rows($user);

                    // Hari
                    $data_hari=mysqli_query($mysqli,"SELECT *FROM tb_cpp WHERE dekade='Harian'");
                    $count_hari=mysqli_num_rows($data_hari);
                    if($count_hari!=0){
                    $a=0;
                    while($sum_hari=mysqli_fetch_array($data_hari)){
                        $a++;
                        $total_hari[$a]=$sum_hari['modal'];
                        $total_margin_hari[$a]=$sum_hari['margin_cpp'];
                    }  
                        $sum_modal_hari = array_sum($total_hari);
                        $sum_margin_hari = array_sum($total_margin_hari);

                        $rata_hari =$sum_modal_hari/$count_hari;
                        $rata_margin_hari =$sum_margin_hari/$count_hari;
                    }else{

                        $rata_hari =0;
                        $rata_margin_hari =0;
                    }

                    // data minggu
                    $data_minggu=mysqli_query($mysqli,"SELECT *FROM tb_cpp WHERE dekade='Mingguan'");
                    $count_minggu=mysqli_num_rows($data_minggu);
                    if($count_minggu!=0){
                        $b=0;
                        while($sum_minggu=mysqli_fetch_array($data_minggu)){
                            $b++;
                            $total_minggu[$b]=$sum_minggu['modal'];
                            $total_margin_minggu[$b]=$sum_minggu['margin_cpp'];
                        }  
                        $sum_modal_minggu = array_sum($total_minggu);
                        $sum_margin_minggu = array_sum($total_margin_minggu);

                        $rata_minggu =$sum_modal_minggu/$count_minggu;
                        $rata_margin_minggu =$sum_margin_minggu/$count_minggu;
                    }else{

                        $rata_minggu =0;
                        $rata_margin_minggu =0;
                    }
                    
                    // data Bulan
                    $data_bulan=mysqli_query($mysqli,"SELECT *FROM tb_cpp WHERE dekade='Bulanan'");
                    $count_bulan=mysqli_num_rows($data_bulan);
                    if($count_bulan!=0){
                    $c=0;
                    while($sum_bulan=mysqli_fetch_array($data_bulan)){
                        $c++;
                        $total_bulan[$c]=$sum_bulan['modal'];
                        $total_margin_bulan[$c]=$sum_bulan['margin_cpp'];
                    }  
                        $sum_modal_bulan = array_sum($total_bulan);
                        $sum_margin_bulan = array_sum($total_margin_bulan);

                        $rata_bulan =$sum_modal_bulan/$count_bulan;
                        $rata_margin_bulan =$sum_margin_bulan/$count_bulan;
                    }else{

                        $rata_bulan =0;
                        $rata_margin_bulan =0;
                    }

                    // data tahun
                    $data_tahun=mysqli_query($mysqli,"SELECT *FROM tb_cpp WHERE dekade='Tahunan'");
                    $count_tahun=mysqli_num_rows($data_tahun);
                    if($count_tahun !=0 ){
                        $d=0;
                        while($sum_tahun=mysqli_fetch_array($data_tahun)){
                            $d++;
                            $total_tahun[$d]=$sum_tahun['modal'];
                            $total_margin_tahun[$d]=$sum_tahun['margin_cpp'];
                        }  
                        $sum_modal_tahun = array_sum($total_tahun);
                        $sum_margin_tahun = array_sum($total_margin_tahun);

                        $rata_tahun =$sum_modal_tahun/$count_tahun;
                        $rata_margin_tahun =$sum_margin_tahun/$count_tahun;
                    }else{
                        $rata_tahun =0;
                        $rata_margin_tahun =0;
                    }
                ?>
                <!-- end hitung -->
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Data</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    MEAN MODAL</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($rata,0,',','.');?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    MEAN MARGIN</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="rata"><?php echo round($rata_margin,4)."%";?></span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                            <!-- <div class="col-auto">
                                <i class="fas fa-setting fa-2x text-gray-300"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    TOTAL USERS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_user;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                            <!-- <div class="col-auto">
                                <i class="fas fa-setting fa-2x text-gray-300"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rata-rata Margin Berdasarkan Waktu Produksi</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                            <a href='../grph.php' class='btn btn-outline-warning'>
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Detail</a>
                        <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="speedChart" style="display: block; width: 657px; height: 320px;" width="657" height="320" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- last row chart -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tutorial</h6>
                    </div>
                    <div class="card-body">
                    <p>Menampilkan cara penggunaan dari aplikasi pricing yang menggabungkan metode Cost Plus Pricing dalam menentukan harga jual produk dan
                        algoritma forward chaining dalam memberikan saran margin keuntungan dari produk</p>
                        <a href="../tutorial.php">Browse Tutorial</a>

                    </div>
                </div>

                

            </div>

            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="assets/sb_admin/img/undraw_posting_photo.svg" alt="...">
                        </div>
                        <p>Menampilkan list produk dari setiap user dan memanagement produk tersebut mulai dari menambahkan, mengedit dan menghapus data produk</p>
                        <a href="list_produk.php">Browse List Produk</a>
                    </div>
                </div>
                <!-- last illustration -->
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
            <!-- last isi-->
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
<script src="assets/sb_admin/vendor/chart.js/Chart.min.js"></script>
<!-- page level custom plugin -->
<script src="assets/sb_admin/js/demo/chart-area-demo.js"></script>
<script src="assets/sb_admin/js/demo/chart-pie-demo.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    </body>
</html>

<script>
    var speedCanvas = document.getElementById("speedChart");
    // var nilai = document.getElementById("rata").innerHTML;
    // document.write(nilai);
    var day = '<?php echo $rata_margin_hari;?>';
    var week = '<?php echo $rata_margin_minggu;?>';
    var month = '<?php echo $rata_margin_bulan;?>';
    var year = '<?php echo $rata_margin_tahun;?>';
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var speedData = {
  labels: ["","Harian", "Mingguan", "Bulanan", "Tahunan"],
  datasets: [{
    label: "MEAN MARGIN (%)",
    data: [0, day, week, month, year],
  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(speedCanvas, {
  type: 'line',
  data: speedData,
  options: chartOptions
});
</script>