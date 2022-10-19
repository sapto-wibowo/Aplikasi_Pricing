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
    <title>Aplikasi_SAW</title>
                    
</head>
<body>
<div id="wrapper">
    <header style="background-color : #5F9EA0;">
        <div class="container-fluid">
            <h1 id="logo"><img src="./logo metod.png" style="width:70px; height:80px;">  Aplikasi Pricing</h1>
            <nav>
            <?php 
                    // echo $name;
                if($name != NULL){
                    if($name=='admin'){?>

                    <a href="admin/halaman_admin.php">Beranda</a>
                    <a href="tutorial.php">Tutorial</a>
                    <a href="tentang.php" style="color : white;">Tentang</a>
                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>
        
                    <?php 
                    }else{
                        ?>
                    <a href="halaman_user.php">Beranda</a>
                    <a href="tutorial.php">Tutorial</a>
                    <a href="tentang.php" style="color : white;">Tentang</a>
                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modallogout">Logout</a>

                    <?php
                    }
                }else{
                    ?>
                    <a href="halaman_utama_AP.php">Beranda</a>
                    <a href="tutorial.php" >Tutorial</a>
                    <a href="tentang.php" style="color : white;">Tentang</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginku">Login</button>
                <?php
                }
                ?>
                <!-- <a href="halaman_utama_AP.php">Beranda</a>
                <a href="tutorial.php">Tutorial</a>
                <a href="tentang.php" style="color : white;">Tentang</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginku">Login</button> -->

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
            
            <!-- Modal -->
                <!-- <div class="modal fade" id="modalog" tabindex="-1" role="dialog" aria-labelledbt="loginku" aria-hidden="true" width="100%">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-tittle" id="loginku"> Login </h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div>    
                        <div class="modal-body">
                            <form mehtod="post" action="">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary pull-right">Save</a></button>
                                </div>   
                            </form>
                        </div>
                    </div>
                </div> -->
                <!-- end modal -->
            <!-- </div> -->
            <div class="container" style="max-width:800px; position:center;" >
            <!-- content -->
            <div class="card text-center">
                <div class= "card-header"><h4 style="color : black;">Tentang Saya</h4></div>
                <div class="card-body">
                <!-- form start-->
                    <a class="card-text">
                        <ul style="list-style-type:none;">
                            <li><img src="./Foto Diri.jpeg" style="width:70px; height:80px;position:center;"></li>
                            <li>Nama : Sapto Wibowo</li>
                            <li>Semester : 8</li>
                            <li>Instansi : Universitas Nasional</li>
                            <li><p>Saya membuat sistem aplikasi ini dengan pemrograman PHP Native untuk mengkomputerisasi perhitungan
                            Cost Plus Pricing dan kolaborasi dalam memberikan saran terkait margin yang diinginkan dengan Algoritma Forward Chaining 
                            .Saya menyadari bahwa sistem aplikasi ini masih perlu dilakukan pengembangan. Untuk itu diperlukan sosialisasi lebih lanjut dengan
                            beberapa instansi mengenai sistem aplikasi ini. Sehingga sistem dapat digunakan secara umum oleh penggunanya.</p></li>
                        </ul>
                    </a>
                <!-- end form -->
                </div>
            </div>
            <!-- end content -->
            <p></p>
            <h2>Catatan Sistem Aplikasi</h2>
            <li>Aplikasi ini hanya bisa digunakan untuk Menghitung sebuah inputan tertentu ke dalam rumus <strong>Cost Plus Pricing</strong></li>
            <li>Aplikasi ini hanya menggunakan nilai skala margin, skala modal dan beberapa aturan dari <strong>Forward Chaining</strong> serta hasil riset jurnal penelitian.
                Dimana, hasil yang diperoleh hanya menampilkan hasil dan saran dari prosesnya selebihnya dapat ditentukan oleh user/pribadi
            </li>
            <li>
            Metode ini hanya digunakan sebagai bentuk gambaran atau evaluasi terhadap harga jual suatu produk dan hanya menentukan harga jual pada produk yang berupa barang bukan berbentuk jasa.
            Penelitian ini ditujukan bagi para pelaku ekonomi yang memiliki pengetahuan tentang metode ekonomi dan cara menentukan harga jual barang.

            </li>
            <li>
                Hasil tersebut dapat dijadikan referensi pendukung dan evaluasi dalam menentukan keputusan harga jual suatu produk berdasarkan
                margin keuntungan yang diinginkan.
            </li>
            <li>
                Aplikasi ini hanya mengkolaborasikan metode cost plus pricing dengan algoritma forward chaining.
                Dimana forward chaining hanya mendukung persenan margin keuntungan yang di inginkan user. Dengan skala tertentu
                yang diperoleh dari pengolahan data Kaggle yang digunakan.
            </li>
        </div>
        </section>
        <!-- end section1 -->
        
        <!-- section2 -->
        
        
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
                <li>No Telp : 0876652327677</li>
                <li>email : akau@gmail.com</li>
                <li>facebook : aliza@yahoo.co.id</li>
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