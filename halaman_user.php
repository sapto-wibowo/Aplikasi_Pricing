<?php
    include_once("connect.php");
    // $result = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC");
    session_start();
    if (!isset($_SESSION['status'])) {
        echo "<script>
        alert('Anda Belum Login');
        document.location='halaman_utama_AP.php'
        </script>";
    }
    unset($_SESSION['updt']);
    unset($_SESSION['new']);
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
    <link href="lainnya/css/styles.css" rel="stylesheet">
    
    <script type="text/javascript" src="js/jquery.js"></script>         
    <script type="text/javascript" src="js/styleku.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <title>Aplikasi_Pricing</title>
                    
</head>
<body>
<div id="wrapper">
    <header style="background-color : #5F9EA0;">
        <div class="container-fluid">
            <h1 id="logo"><img src="./logo metod.png" style="width:70px; height:80px;" href="">  Aplikasi Pricing</h1>
            <nav>
                <a href="" style="color : white;">Beranda</a>
                <a href="tutorial.php">Tutorial</a>
                <a href="tentang.php">Tentang</a>
                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginku">Login</button> -->
                <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalog">Login</button> -->
            </nav>
        </div>
    </header>
    <div id="main">
        <div id="content">     
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
            <!-- Modal logout end-->
        <section class="bg-info text-white mb-0">
            <div class="container">
                <!-- About Section Heading-->
                <h3 class="page-section-heading text-center text-uppercase text-white">Get Started</h3>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">Aplikasi ini digunakan untuk menghitung harga jual suatu produk dengan menggunakan metode Cost Plus Pricing</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">Masukkan beberapa nilai kedalam form untuk melihat hasil harga jual produk anda.</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="form_in.php">
                        <i class="fas fa-download me-2"></i>
                        Get Started!!
                    </a>
                </div>
            </div>
        </section>


        <section>
        <!-- section1 -->
            <div class="container">
            <div> NAMA AKUN : <?php echo $_SESSION['status'];?></div>
            <div> KODE AKUN : <?php echo $_SESSION['kd_user'];?></div>
            <!-- isi -->
            <h3 class="page-section-heading text-center text-uppercase text-secondary mb-0">Menu</h3>
            <div class="divider-custom divider-secondary">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
            </div>

            <div class="row justify-content-center">
                <!-- menu Item 1--> 
                <a type="button" href="" class="btn btn-outline-info col-md-5" style="margin-right:20px;margin-top:20px;margin-bottom:20px;">
                    <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div> -->
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">halaman user</div>
                </a>
                <a type="button" href="form_in.php" class="btn btn-outline-info col-md-5" style="margin-right:20px;margin-top:20px;margin-bottom:20px;">
                    <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div> -->
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">Form new produk</div>
                </a>
                <a type="button" href="list.php" class="btn btn-outline-info col-md-5" style="margin-right:20px;margin-top:20px;margin-bottom:20px;">
                    <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div> -->
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">List Produk</div>
                </a>
                <a type="button" href="grph.php" class="btn btn-outline-info col-md-5" style="margin-right:20px;margin-top:20px;margin-bottom:20px;">
                    <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div> -->
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">Data Margin</div>
                </a>
                <a type="button" href="set_profile.php" class="btn btn-outline-info col-md-5" style="margin-right:20px;margin-top:20px;margin-bottom:20px;">
                    <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rata-Rata Modal</div> -->
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">Setting</div>
                </a>

            <!-- <p>Cost Plus Pricing menjadi salah satu metode pendekatan dalam menetapkan harga jual suatu produk. 
            Menurut Hermanto, Subagyo dan Andoko (2018: 174) cost plus pricing adalah metode penentuan harga jual yang menambahkan seluruh biaya 
            dengan persentase mark-up tertentu dari biaya total sebagai nilai laba. 
            <br>C. Rolos et al., “Analisis Penentuan Harga Jual Listrik Pada Pt Pln (Persero) Unit Induk Wilayah Sulawesi Utara, Sulawesi Tengah Dan 
            Gorontalo vol. 9, no. 3, pp. 1703–1710, 2021.</p>
            <h2>Algoritma Forward Chaining</h2>
            <p>Algoritma forward  chaining adalah  teknik  pencarian yang  dimulai dengan fakta yang 
            diketahui, kemudian mencocokkan fakta-fakta   tersebut   dengan   bagian   IF dari   aturan  
            IF-THEN, sampai  didapatkan  sebuah kesimpulan  yang  sesuai. Sehingga algoritma akan 
            digunakan untuk mengestimasi margin keuntungan berdasarkan input dari user.
            <br>Rawansyah, Vista C.B., dan Nugroho D.A. 2020. Penentuan estimasi harga desain sablon percetakan menggunakan 
            metode forward chaining. Seminar Informatika Aplikatif Polinemia(SIAP). ISSN 2460-1160.
            </p>
            <p>Aplikasi ini menerapkan Metode Cost plus Pricing sebagai metode perhitungan dalam mencari harga jual berdasarkan
            beberapa inputan dari user, seperti biaya modal(<strong>modal Awal</strong>), Jumlah produksi dan penjualan (per minggu/bulan/tahun) serta nilai
            keuntungan (<strong>margin</strong>) yang diiinginkan oleh user kemudian didapatlah hasil harga jual dari suatu produk.
            Dalam penentuan suatu margin yang mungkin dapat menjadi referensi bagi user akan digunakan Algoritma Forward Chaining. 
            Dimana algoritma ini akan memproses semua inputan dari user dan mencocokan beberapa fakta-fakta terkait nilai harga jual. Misalnya
            , ketika modal awal rendah, jumlah penjualan produk lebih besar dari produksi dan nilai margin yang rendah maka margin keuntungan bisa ditingkatkan
            untuk menaikan modal awal dan meningkatkan jumlah produksi. Inputan dari user tersebut akan disimpan dalam database untuk mengetahui rata-rata margin
            yang ada dalam database.
            Sehingga dari penggabungan metode Cost Plus Pricing dan Algoritma Forward Chaining diharapkan dapat membantu dalam 
            proses perhitungan nilai harga jual yang telah terkomputerisasi dan pemberian saran terkait nilai margin yang dihasilkan oleh database dengan yang diinginkan.
            </p> -->
            </div>
        </section>
        <!-- end section1 -->

        <!-- section2 -->
        <section class="bg-info text-white mb-0">
            <div class="container">
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
                    <h3>
                        Ini adalah grafik rata-rata margin keuntungan yang didapat dari seluruh data produk user
                        berdasarkan waktu produksinya
                    </h3>
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="speedChart" style="display: block; width: 657px; height: 320px;" width="657" height="320" class="chartjs-render-monitor"></canvas>
                        </div>
                            <a href='grph.php' class='btn btn-outline-info'>
                            <!-- <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> -->
                            Detail</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section2 -->

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
    <script src="lainnya/js/scripts.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="admin/assets/sb_admin/vendor/chart.js/Chart.min.js"></script>
    <!-- page level custom plugin -->
    <script src="admin/assets/sb_admin/js/demo/chart-area-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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