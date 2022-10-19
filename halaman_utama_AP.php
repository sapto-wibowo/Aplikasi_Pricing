<?php
    include_once("connect.php");
    $result = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC");
    session_start();
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
                <a href="" style="color : white;">Beranda</a>
                <a href="tutorial.php">Tutorial</a>
                <a href="tentang.php">Tentang</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginku">Login</button>
                <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalog">Login</button> -->
            </nav>
        </div>
    </header>
    <div id="main">
        <div id="content">     
        <section>
        <!-- section1 -->
            <div class="container">
            <!-- Modal login -->
                <div class="modal fade" id="loginku" tabindex="-1" role="dialog" aria-labelledbt="loginku" aria-hidden="true" width="100%">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-tittle" id="loginku"> LOGIN </h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div>    
                        <div class="modal-body">
                            <form method="POST" action="halaman_utama_AP.php" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="username">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="password">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
                                    <input type="submit" name="log" class="btn btn-primary pull-right" value="Login">
                                </div>
                                <!-- regis -->
                                <div>
                                    Anda Belum memiliki akun ?   <a type="button" class="btn-outline-warning" href="regis.php">Registrasi akun Disini</a>
                                </div>   
                                <!-- regist end -->
                            </form>
                            <?php
                            if(isset($_POST['log'])){
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);
                            $in="SELECT *FROM log_in where username='$username' AND pass='$password'";
                            
                            $result=mysqli_query($mysqli, $in);
                                if ($result->num_rows > 0) {
                                    //cek user
                                    $row = mysqli_fetch_assoc($result);
                                    $_SESSION['status'] = $row['nama'];
                                    $_SESSION['kd_user'] = $row['id_user'];
                                    $nama = $_SESSION['status'];
                                    echo "";
                                    echo "<script>
                                        alert('Selamat datang $nama');
                                        document.location='halaman_user.php'
                                        </script>";
                                } elseif($_POST['username']=='admin' && $_POST['password']=='admin123'){
                                    //masuk admin
                                    $_SESSION['status'] = $_POST['username'];
                                    $_SESSION['kd_user'] = 0;
                                    $nama = $_SESSION['status'];
                                    echo "<script>
                                    alert('Selamat datang $nama');
                                    document.location='admin/halaman_admin.php'
                                    </script>";
                                } else {
                                    echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
                                }
                            }
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- end modal login -->
            <!-- isi -->
            <h2>Cost Plus Pricing</h2>
            <p>Cost Plus Pricing menjadi salah satu metode pendekatan dalam menetapkan harga jual suatu produk. 
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
            </p>
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
                                    <input type="text" name="nama" class="form-control" placeholder="masukkan nama anda" required="true">
                                </div>
                            </div>

                            <div>
                                <label class="control-label col-md-6" for="email_ku" style="color:black; font-family: Cambria; font-size:20px; margin-top:20px;margin-bottom:-10px;">Email</label>
                                <div class="form-group col-md-8">
                                    <input type="email" name="email_ku" class="form-control" placeholder="contoh@gmail.com" required="true">
                                </div>
                            </div>
                                <div class="form-group col-md-8">
                                <label class="control-label col-md-6" for="komen" style="color:black; font-family: Cambria; font-size:20px;margin-top:20px; margin-bottom:-10px;">Komentar</label>
                                    <textarea type="text" name="komen" class="form-control" rows="3" required="true" placeholder="Masukkan komentar"></textarea>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>