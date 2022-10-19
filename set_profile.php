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
        <section>
            <center><h2 class="bg-info text-white mb-0">Setting Profile</h2></center>
            <div class="container">
            <div class="card shadow mb-4"><br>
            <?php 
                $set_id=$_SESSION['kd_user'];

                // echo $set_id;
                $result=mysqli_query($mysqli, "SELECT *FROM log_in WHERE id_user=$set_id");

                while($row=mysqli_fetch_array($result)){
            ?>
            <!-- isi disini -->
            <form action="" method="POST" class="container" autocomplete="off">
                <!-- <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create New Account!</h1>
                </div> -->
                <div>
                    <input type="hidden" name="id_user" class="form-control" value="<?php echo $row['id_user'];?>">
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="username" value="<?php echo $row['username'];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_pf" class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="nama_pf" value="<?php echo $row['nama'];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">email</label>
                    <div class="col-md-6">
                        <input class="form-control" type="email" name="email" value="<?php echo $row['email'];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_telp" class="col-sm-4 col-form-label">Nomor Telepon</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="no_telp" value="<?php echo $row['nomor_hp'];?>">
                    </div>
                </div>
                <div class="text-center">
                    <a href='halaman_user.php' type='button' class='btn btn-secondary btn-xs'>Kembali</a>
                    <input type="submit" name="atur" class="btn btn-outline-primary" value="UBAH">                            
                </div>
                <?php }?>
            </form>
            <!-- action -->
            <?php
                if(isset($_POST['atur'])){
                    $id_u = $_POST['id_user'];
                        
                    $username = $_POST['username'];
                    $nama_pf = $_POST['nama_pf'];
                    $email = $_POST['email'];
                    $no_telp = $_POST['no_telp'];
    
                    $edit_u=mysqli_query($mysqli, "UPDATE log_in SET username='$username',nama='$nama_pf',email='$email',nomor_hp='$no_telp' 
                    WHERE id_user='$id_u'");
                    if($edit_u){
                        // echo " Disimpan";
                        echo "<script>
                        alert ('Profile Berhasil Diubah, Silahkan logout terlebih dahulu !');
                        document.location='halaman_user.php'</script>";
                        // echo "<div class='alert alert-success fade in'>
                        // <a href='tampil.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        // User Added Successfully
                        //     </div>";
    
                    }else{
                        echo "Error, tidak berhasil". mysqli_error($mysqli);
                    }
                }
            ?>
                <!-- end action -->
            <!-- last isi disini -->
        </div>                    

                <!-- End Container -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>