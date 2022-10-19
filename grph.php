<?php
    include_once("connect.php");
    // $result = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC");
    // session_start();
    session_start();
    $_SESSION['status'];
    if ($_SESSION['status']!=NULL) {
        $name = $_SESSION['status'];
    }else{
        $name=NULL;
    }
    if (!isset($_SESSION['status'])) {
        echo "<script>
        alert('Anda Belum Login');
        document.location='../halaman_utama_AP.php'
        </script>";
    }
?>
<!DOCTYPE html>
<html>
<script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
</script>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="admin/assets/sb_admin/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="admin/assets/sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    
    <script type="text/javascript" src="js/jquery.js"></script>         
    <script type="text/javascript" src="js/styleku.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <title>Aplikasi_Pricing</title>
                    
</head>
<body>
<div id="wrapper-content">
    <header style="background-color : #5F9EA0;">
        <div class="container-fluid">
            <h1 id="logo"><img src="./logo metod.png" style="width:70px; height:80px;" href="">  Aplikasi Pricing</h1>
            <nav>
                <?php 
                //untuk mengambil nilai variabel name=Session_status
                    // echo $name;
                    if($name != NULL){
                        if($name=='admin'){
                ?>

                    <a href="admin/halaman_admin.php">Beranda</a>
                    <a href="tutorial.php">Tutorial</a>
                    <a href="tentang.php">Tentang</a>
                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>
        
                    <?php 
                    }else{
                        ?>
                    <a href="form_in.php">Beranda</a>
                    <a href="tutorial.php">Tutorial</a>
                    <a href="tentang.php">Tentang</a>
                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>

                    <?php
                    }//penutup if else yang ke dua jika user sudah login
                }else{
                    ?>
                    <a href="halaman_utama_AP.php">Beranda</a>
                    <a href="tutorial.php">Tutorial</a>
                    <a href="tentang.php">Tentang</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginku">Login</button>
                <?php
                }                    //penutup if else yang pertama saat user belum login
                ?>


                <!-- <a href="" style="color : white;">Beranda</a>
                <a href="tutorial.php">Tutorial</a>
                <a href="tentang.php">Tentang</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginku">Login</button> -->
                <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalog">Login</button> -->
            </nav>
        </div>
    </header>
    <div id="main">
        <div id="content">    
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
                            <a type="button"  href="logout.php" class="btn btn-primary">Ya</a>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- end modal logout -->

            <center><h1 class="h3 mb-2 text-gray-800">Data Rata-Rata Modal dan Margin</h1></center>
            <center><h1 class="h3 mb-2 text-gray-800">Berdasarkan Waktu Produksi</h1></center>
            <?php 
                    $name = $_SESSION['status'];
                    // echo $name;
                    if($name=='admin'){
                        echo "<a href='admin/halaman_admin.php' class='btn btn-secondary'>Kembali</a>";        
                    }else{
                        echo "<a href='halaman_user.php' class='btn btn-secondary' >Kembali</a>";                        
                    }

                ?>


                <?php
                    // data keseluruhan
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
                    
                ?>
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total dan Rata-Rata Keseluruhan Data Produksi</h6>
                        </div>
                        </br>
                        <div class="form-group row ">

                    <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($rata,0,',','.');?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Margin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($rata_margin,3)."%";?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah data barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end shadow -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total dan Rata-Rata Data Produksi Harian</h6>

                            <?php
                                // data hari
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
                                
                            ?>
                        </div>
                        </br>
                        <div class="form-group row ">

                    <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($rata_hari,0,',','.');?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Margin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($rata_margin_hari,3)."%";?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah data barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_hari;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end shadow -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total dan Rata-Rata Data Produksi Mingguan</h6>
                            <?php
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
                                
                            ?>
                        </div>
                        </br>
                        <div class="form-group row ">

                    <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($rata_minggu,0,',','.');?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Margin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($rata_margin_minggu,3)."%";?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah data barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_minggu;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end shadow -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total dan Rata-Rata Data Produksi Bulanan</h6>
                            <?php
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
                                
                            ?>
                        </div>
                        </br>
                        <div class="form-group row ">

                    <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($rata_bulan,0,',','.');?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Margin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($rata_margin_bulan,3)."%";?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah data barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_bulan;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end shadow -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total dan Rata-Rata Data Produksi Tahunan</h6>
                            <?php
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
                        </div>
                        </br>
                        <div class="form-group row ">

                    <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($rata_tahun,0,',','.');?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Margin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($rata_margin_tahun,3)."%";?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah data barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_tahun;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end shadow -->
                </div>
                <!-- end col -->
            </div>
            <!-- last container -->
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
    <!-- last content
    window.$ = window.jQuery = require('jquery');
window.Tether = require('tether');
require('bootstrap'); -->
    </div>
    <!-- last main -->
</div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>