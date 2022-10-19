<?php
    include_once("connect.php");
    // $result = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC");
    session_start();
    //cek status login
    if (!isset($_SESSION['status'])) {
        echo "<script>
        alert('Anda Belum Login');
        document.location='halaman_utama_AP.php'
        </script>";
    }
    // session_start();
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
                <a href="halaman_utama_AP.php" style="color : white;">Beranda</a>
                <a href="tutorial.php">Tutorial</a>
                <a href="tentang.php">Tentang</a>
                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>

                <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalog">Login</button> -->
            </nav>
        </div>
    </header>
    <div id="main">
        <div id="content">     
        <section>
        <!-- section1 -->
            <div class="container">
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
            <h2>Hasil Penentuan Harga Jual</h2>
            
            </div>
        </section>
        <!-- end section1 -->
        
        <!-- section2 -->
        <div class="container" style="max-width:800px; position:center;" >
            <!-- content -->
            <?php
                $kd_user=$_SESSION['kd_user'];
                    // fungsi edit
                    if(!empty($_SESSION['updt'])){
                        $id_barang=$_SESSION['barang'];
                        // $coba = mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp=$id_barang AND id_user=$kd_user"); Sebelum
                        $coba = mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp=$id_barang");
                        while($a = mysqli_fetch_array($coba)){
                            $modal = $a['modal'];
                            $jm_produk =$a['jm_produk'];
                            $jm_jual = $a['jm_jual'];
                            $margin_cpp = $a['margin_cpp'];
                            $hasil = ($modal+($modal * ($margin_cpp/100)))/$jm_produk;//Metode CPP
                            }
                    }
                    //end fungsi edit
                    //fungsi new data
                    if(!empty($_SESSION['new'])){

                        $nilai = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC LIMIT 1");
                        // Ganti Order by pake Where terus masukin nilai id_cpp dan user yang telah di insert di awal
                        while($a = mysqli_fetch_array($nilai)){
                        $modal = $a['modal'];
                        $jm_produk =$a['jm_produk'];
                        $jm_jual = $a['jm_jual'];
                        $margin_cpp = $a['margin_cpp'];
                        $hasil = ($modal+($modal * ($margin_cpp/100)))/$jm_produk;//Metode CPP
                        }
                    }
                    //end fungsi new data

                    // penentuan skala modal
                    if($modal<= 16000000){
                        $s1 = 1;
                    }elseif($modal>16000000 && $modal<=53000000){
                        $s1 = 2;
                    }elseif($modal > 53000000){
                        $s1 = 3;
                    }else{
                        echo "Tidak ditemukan";
                    }
                    
                    //penentuan kondisi produksi:permintaan
                    if($jm_produk > $jm_jual){
                        $s2 = 1;
                    }elseif($jm_produk <= $jm_jual){
                        $s2 = 2;
                    }else{
                        echo "Tidak ditemukan";
                    }
                    
                    // penentuan skala margin
                    if($margin_cpp <= 15.00){
                        $s3 = 1;
                    }elseif($margin_cpp > 15.00 && $margin_cpp <= 38.00){
                        $s3 = 2;
                    }elseif($margin_cpp > 38.00){
                        $s3 = 3;
                    }else{
                        echo "Tidak ditemukan";
                    }
                    
                    //Forward Chaining (cek)
                    for($i=1; $i<=18;$i++){
                        $cek = mysqli_query($mysqli, "SELECT * FROM aturan_fc WHERE id_rule= $i ");
                        while($row = mysqli_fetch_array($cek)){
                            if($s1 == $row['atur_modal'] && $s2 == $row['atur_produk'] && $s3 == $row['atur_margin']){
                                $hasilku = $row['hasil_atur'];
                                // echo "$hasilku";
                                echo "<div class='col-md'>
                                        <div class='card bg-light'>
                                            <div class='card-body'>
                                                <div class='form-group row'>
                                                <h6 class='col-md col-form-label'>Total Modal</h6>
                                                    <div class='col-sm-6'>
                                                        <input class='form-control' value= Rp".number_format($modal,0,',','.')." disabled>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                <h6 class='col-md col-form-label'>Jumlah Produksi</h6>
                                                    <div class='col-sm-6'>
                                                        <input class='form-control' value= ".$jm_produk." disabled>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                <h6 class='col-md col-form-label'>Jumlah Permintaan/penjualan</h6>
                                                    <div class='col-sm-6'>
                                                        <input class='form-control' value= ".$jm_jual." disabled>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                <h6 class='col-md col-form-label'>Margin yang diinginkan</h6>
                                                    <div class='col-sm-6'>
                                                        <input class='form-control' value= ".$margin_cpp."% disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </br>";
                                
                                
                                $jual = "Rp ".number_format($hasil,0,',','.');
                                $untung = ($hasil*$jm_produk) - $modal;
                                $keuntungan = "Rp".number_format($untung,0,',','.');
                                require_once ("../testAp/margin.php"); //untuk mendapatkan saran margin
                                //menampilkan hasilnya ke halaman web
                                echo "
                                <div class='card bg-light'>
                                    <div class='card-body'>
                                        <p> Berdasarkan hasil perhitungan dalam menentukan harga jual menggunakan metode cost plus pricing
                                        mendapatkan nilai harga jual pada produk tersebut
                                        yaitu <strong> $jual </strong> dan keuntungan sementara dari margin tersebut, yaitu <strong>$keuntungan</strong></p> 
                                    </div>
                                </div>
                                <div class='card bg-light'>
                                    <div class='card-body'>
                                    <p>Menurut hasil penentuan margin keuntungan dengan algoritma
                                    forward chaining mendapatkan hasil bahwa, <strong>$hasilku</strong> 
                                    dengan saran persentase margin <strong>".p_margin($s1, $s2, $s3, $hasilku, $margin_cpp)." </strong>
                                    </p> 
                                    </div>
                                </div>
                                </br>";
                                    
                                //melakukan proses input ke mysql
                                $mrg=p_margin($s1, $s2, $s3, $hasilku, $margin_cpp);
                                if(!empty($_SESSION['updt'])){
                                    //ini if untuk menjalankan proses edit dimana mengambil nilai id_cpp dari html/php ke mysql
                                    // $re_nilai = mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp=$id_barang AND id_user=$kd_user"); Sebelum
                                    $re_nilai = mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp=$id_barang");
                                    // WHERE id_cpp AND id_user=$kd_user 
                                    while($b = mysqli_fetch_array($re_nilai)){
                                        $id_cpp = $b['id_cpp'];
                                    }
                                }
                                    
                                if(!empty($_SESSION['new'])){

                                    $re_nilai = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC LIMIT 1");
                                    // WHERE id_cpp AND id_user=$kd_user 
                                    while($b = mysqli_fetch_array($re_nilai)){
                                        $id_cpp = $b['id_cpp'];
                                    }
                                }
                                
                                //alasan ini karena agar ketika nilai seperti hasil hitung dengan forward chaining, saran margin, dan nilai jual
                                //tidak menduplikasi data, sehingga digunakan format sql sebagai UPDATE SET berdasarkan id_cpp
                                $test=mysqli_query($mysqli, "UPDATE tb_cpp SET saran_margin='$hasilku',nilai_margin='$mrg',nilai_jual='$hasil',keuntungan='$untung' WHERE id_cpp='$id_cpp'");
                            }//last if else yang atur modal
                            
                        }//last while row Cek
                    }//last fungsi for
                    

                ?>
                <?php 
                    $name = $_SESSION['status'];
                    // echo $name;
                    if($name=='admin'){
                        echo "<a href='admin/halaman_admin.php' class='btn btn-warning' style='float:right;'>Selesai</a>";
                        echo "<a href='admin/list_produk.php' class='btn btn-secondary' style='float:right;'>Tabel</a>";
        
                    }else{
                        echo "<a href='form_in.php' class='btn btn-warning' style='float:right;'>Selesai</a>";
                        echo "<a href='list.php' class='btn btn-secondary' style='float:right;'>Tabel</a>";

                    }

                ?>
                    
            <!-- end content -->
        </div>
        
        <!-- end section2 -->
        <section>
            <!-- penutup -->
        <div class="container" style="max-width:1300px;">
            <div class="card">
                <div class="card-body">
                    <div class="card-header"><h3>Berikan Ulasan Anda</h3></div>
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
    <!-- last main -->
    </div>
</div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>