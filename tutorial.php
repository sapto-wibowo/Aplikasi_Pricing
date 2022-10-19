<?php
    include_once("connect.php");
    // $result = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC");
    session_start();
    $_SESSION['status'];
    if ($_SESSION['status']!=NULL) {
        $name = $_SESSION['status'];
    }else{
        $name=NULL;
    }
    unset($_SESSION['updt']);
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
            <h1 id="logo"><img src="./logo metod.png" style="width:70px; height:80px;">  Aplikasi Pricing</h1>
            <nav>
            <?php 
                //untuk mengambil nilai variabel name=Session_status
                    // echo $name;
                if($name != NULL){
                    if($name=='admin'){
            ?>

                    <a href="admin/halaman_admin.php">Beranda</a>
                    <a href="tutorial.php" style="color : white;">Tutorial</a>
                    <a href="tentang.php">Tentang</a>
                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>
        
                    <?php 
                    }else{
                        ?>
                    <a href="halaman_user.php">Beranda</a>
                    <a href="tutorial.php" style="color : white;">Tutorial</a>
                    <a href="tentang.php">Tentang</a>
                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>

                    <?php
                    }//penutup if else yang ke dua
                }else{
                    ?>
                    <a href="halaman_utama_AP.php">Beranda</a>
                    <a href="tutorial.php" style="color : white;">Tutorial</a>
                    <a href="tentang.php">Tentang</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginku">Login</button>
                <?php
                }                    //penutup if else yang pertama
                ?>
                <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalog">Login</button> -->
            </nav>
        </div>
    </header>
    <div id="main">
        <div id="content">     
        <section>
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
                            <form method="POST" action="halaman_utama_AP.php">
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
                                <div>
                                    Anda Belum memiliki akun ?   <a type="button" class="btn-outline-warning" href="regis.php">Registrasi akun Disini</a>
                                </div>   
                            </form>
                            <?php
                            if(isset($_POST['log'])){
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);
                            $in="SELECT *FROM log_in where username='$username' AND pass='$password'";
                            
                            $result=mysqli_query($mysqli, $in);
                            if ($result->num_rows > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $_SESSION['status'] = $row['username'];
                                $_SESSION['kd_user'] = $row['id_user'];
                                $nama = $_SESSION['status'];
                                echo "";
                                echo "<script>
                                    alert('Selamat datang $nama');
                                    document.location='form_in.php'
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
                <!-- end modal -->

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

            <h1>Ketentuan Penggunaan</h1>
                <p>
                    <div class="d-flex justify-content-start mb-3">
                        <img src="./tick.png"alt="tick" class="mr-3 tick-icon">
                        Masukkan data berupa nama usaha anda, Modal yang anda tentukan (per hari/minggu/bulan/tahun), banyaknya barang yang diproduksi, banyaknya permintaan atas barang tersebut
                        kemudian nilai margin yang anda inginkan. Setelah itu klik tombol "Mulai".
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <img src="./tick.png"alt="tick" class="mr-3 tick-icon">
                        Penentuan jumlah barang yang diproduksi dan permintaan harus mengikuti jumlah modal yang ditentukan. Misal modal yang diinput merupakan
                        modal perbulan maka jumlah produksi dan permintaannya juga per bulan.
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <img src="./tick.png"alt="tick" class="mr-3 tick-icon">
                        Semua inputan tersebut akan dikalkulasi dengan metode Cost Plus Pricing dan Pencocokan fakta oleh forward chaining untuk mendapatkan saran margin 
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <img src="./tick.png"alt="tick" class="mr-3 tick-icon">
                        Hasil yang diperoleh berupa nilai Harga jual Pada satu unit produk dan juga besaran margin yang 
                        disarankan menurut fakta-fakta atau aturan hasil dari algoritma Forward chaining.
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <img src="./tick.png"alt="tick" class="mr-3 tick-icon">
                        Hasil tersebut dapat dijadikan evaluasi maupun perbandingan terkait keuntungan yang diinginkan.
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <img src="./tick.png"alt="tick" class="mr-3 tick-icon">
                        Adapun Tabel dari Skala Modal dan Margin yang telah ditentukan berdasarkan sumber-sumber jurnal
                        dan rata-rata dari data Kaggle "Total sale Product yearly data of grocery shop 2018 dan Global Superstore".
                    </div>
                    <div class="row">
                        <div class="form-grup col-md-6">
                        <table class="table table-bordered table-striped"  cellspacing="2" cellpadding="4">
                            <tr style="text-align:center;background-color:#1abc9c;">
                            <th>Skala Margin<th>Nilai Margin</th>
                            </tr>
                            <tr style="text-align:center;">
                                <td>Kecil</td>
                                <td><= 15%</td>
                            </tr>    
                            </tr>
                            <tr style="text-align:center;">
                                <td>Sedang</td>
                                <td>16% - 38%</td>
                            </tr>
                            <tr style="text-align:center;">
                                <td>Besar</td>
                                <td>>= 39%</td>
                            </tr>
                        </table>
                        </div>
                        <div class="form-grup col-md-6">
                        <table class="table table-bordered table-striped"  cellspacing="2" cellpadding="4">
                            <tr style="text-align:center;background-color:#1abc9c;">
                            <th >Skala Modal<th>Nilai Modal</th>
                            </tr>
                            <tr style="text-align:center;">
                                <td>Kecil</td>
                                <td><= 16.000.000</td>
                            </tr>    
                            </tr>
                            <tr style="text-align:center;">
                                <td>Sedang</td>
                                <td>17.000.000 - 53.000.000</td>
                            </tr>
                            <tr style="text-align:center;">
                                <td>Besar</td>
                                <td>>= 54.000.000</td>
                            </tr>
                        </table>
                        </div>
                    <div>
                    
                </p>
            </div>
        </section>
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
                <!-- end form -->
                </div>
            </div>
        </div>
        <!-- end section1 -->
        <p></p>
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