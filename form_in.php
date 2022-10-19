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
                <a href="halaman_user.php">Beranda</a>
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
            <div> NAMA AKUN : <?php echo $_SESSION['status'];?></div>
            <div> KODE AKUN : <?php echo $_SESSION['kd_user'];?></div>
            <a href="halaman_user.php" class="btn btn-secondary" style="float:center;">Kembali</a>
            <a href="grph.php" class="btn btn-primary" style="float:center;">Data Margin</a>
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
            
        </section>
        <!-- end section1 -->
        
        <!-- section2 -->
        <div class="container" style="max-width:800px; position:center;" >
            <!-- content -->
            <div class="card text-center">
                <div class= "card-header" style="background-color:Orange;"><h4 style="color : black;">Hitunglah Harga Jual Produk Anda !</h4></div>
                    <div class="card-body">
                    <!-- form start-->
                        <form action ="" method= "POST" class="container-fluid" autocomplete="off">
                            <div>
                                <label class="control-label col-md-6" for="nama_ush" style="color:black; font-family: Cambria; font-size:25px; margin-top:20px;margin-bottom:-10px;">Nama Produk Usaha</label>
                                <div>
                                    <input type="text" name="nama_ush" class="form-control" placeholder="Masukkan Nama produk" required="true">
                                </div>
                            </div>

                            <div>
                                <label class="control-label col-md-6 text-center" for="sub_ctry" style="color:black; font-family:Cambria; font-size:25px;margin-top:20px; margin-bottom:-10px;">Kategori</label>
                                <div class="form-group">
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
                                <label class="control-label col-md-6" for="ktg_lain" style="color:black; font-family: Cambria; font-size:25px; margin-top:20px;margin-bottom:-10px;">Keterangan lain</label>
                                <a data-toggle="popover" title="Informasi" class="btn btn-outline-secondary" tabindex="0" data-trigger="focus"
                                data-content="Keterangan lain adalah keterangan tambahan terkait dengan kategori produk dan untuk keterangan lebih dari satu dipisahkan dengan tanda koma. Contoh kategori : makanan&minuman, 
                                keterangan lain: per porsi/per gelas, merk A,B,C"></a>
                                <div>
                                    <input type="text" name="ktg_lain" class="form-control" placeholder="Keterangan tambahan" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-grup col-md-6">
                                <label class="control-label col-md-9" for="dekade" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Waktu Produksi</label>
                                <a data-toggle="popover" title="Informasi" class="btn btn-outline-secondary" tabindex="0" data-trigger="focus"
                                data-content="Waktu Produksi adalah lama waktu dalam memproduksi keseluruhan suatu produk. Contoh : dalam memproduksi 150 pack 
                                barang dibutuhkan waktu 1 bulan, maka waktu produksinya Bulanan"></a>
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
                                <div class="form-grup col-md-6">
                                <label class="control-label col-md-9" for="bhbk" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Biaya Bahan Baku</label>
                                <a data-toggle="popover" title="Informasi" class="btn btn-outline-secondary" tabindex="0" data-trigger="focus"
                                data-content="Biaya bahan baku merupakan total biaya alat dan bahan yang digunakan dalam proses produksi suatu produk. Contoh bahan baku kue: terigu, telor, mentega, dll, semua biaya tersebut dijumlahkan dan didapatlah nilai biaya bahan baku"></a>
                                    <input type="number" name="bhbk" class="form-control" placeholder="Masukkan total biaya bahan baku" required="true">
                                </div>
                                <div class="form-grup col-md-6">
                                <label class="control-label col-md-9" for="tngkj" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Biaya tenaga kerja</label>
                                    <input type="number" name="tngkj" class="form-control" placeholder="Masukkan total biaya tenaga kerja" required="true">
                                </div>
                                <div class="form-grup col-md-6">
                                <label class="control-label col-md-6" for="ovrhd" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Biaya overhead</label>
                                <a data-toggle="popover" title="Informasi" class="btn btn-outline-secondary" tabindex="0" data-trigger="focus"
                                data-content="Biaya overhead adalah biaya yang dikeluarkan diluar dari biaya bahan baku produksi. Contoh : biaya sewa, biaya listrik, biaya perawatan alat, dll.
                                Semua biaya tersebut dijumlahkan sehingga didapat nilai total biaya overhead"></a>
                                    <input type="number" name="ovrhd" class="form-control" placeholder="Masukkan total biaya overhead" required="true">
                                </div>
                                <div class="form-grup col-md-6">
                                <label class="control-label col-md-6" for="by_lain" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Biaya lainnya</label>
                                <a data-toggle="popover" title="Informasi" class="btn btn-outline-secondary" tabindex="0" data-trigger="focus"
                                data-content="Biaya lain adalah biaya yang dikeluarkan pada saat-saat tak terduga. Contoh : biaya admin bank, biaya kehilangan produk, dll.
                                Semua biaya tersebut dijumlahkan dan didapatlah nilai total dari biaya lainnya"></a>
                                    <input type="number" name="by_lain" class="form-control" placeholder="Masukkan total biaya lainnya" required="true">
                                </div>
                                <div class="form-grup col-md-6">
                                <label class="control-label col-md-6" for="jm_produk" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Jumlah Produksi</label>
                                <a data-toggle="popover" title="Informasi" class="btn btn-outline-secondary" tabindex="0" data-trigger="focus"
                                data-content="Jumlah produk yang diproduksi"></a>
                                    <input type="number" name="jm_produk" class="form-control" placeholder="Masukkan banyaknya produksi" required="true">
                                </div>
                                <div class="form-grup col-md-6">
                                <label class="control-label col-md-8" for="jm_jual" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Jumlah Permintaan</label>
                                <a data-toggle="popover" title="Informasi" class="btn btn-outline-secondary" tabindex="0" data-trigger="focus"
                                data-content="Jumlah produk yang terjual /dan akan dijual"></a>
                                    <input type="number" name="jm_jual" class="form-control" placeholder="Masukkan banyaknya permintaan" required="true">
                                </div>
                                <div class="form-grup col-md-6">
                                <label class="control-label col-md-6" for="margin_cpp" style="color:black; font-family:Cambria; font-size:18px;margin-top:20px; margin-bottom:-10px;">Margin</label>
                                <a data-toggle="popover" title="Informasi" class="btn btn-outline-secondary" tabindex="0" data-trigger="focus"
                                data-content="Margin keuntungan yang di inginkan"></a>
                                    <input type="number" name="margin_cpp" min="0" max="100" class="form-control" placeholder="0.00 %" step="0.01" required="true">
                                </div>

                            </div>

                            <div>
                                <!-- <div>
                                <label class="control-label col-md-6" style="color:black; font-family:Cambria; font-size:12px;margin-top:20px; margin-bottom:-10px;">Hasil</label>
                                
                                </div> -->
                            <br><input type="submit" class='btn btn-primary' name="proses" value="MULAI">
                            </div>
                                
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['proses'])){
                            $kd_user = $_SESSION['kd_user'];
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
                                echo "<script>document.location='tampil.php'</script>";
                                // echo "<div class='alert alert-success fade in'>
                                // <a href='tampil.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                // User Added Successfully
                                //     </div>";

                            }else{
                                echo "Error, tidak berhasil". mysqli_error($mysqli);
                            }
                        }
                        ?>
                    <!-- end form -->
                    </div>
                        <!-- <a type='button' class='btn btn-primary' style="float:left; margin-left:30%; margin-right:30%;">Mulai</a> -->
                        <p></p>
                </div>
            </div>
            <!-- end content -->
        </div>
        
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
<script>
    $(function (){
        $('[data-toggle="popover"]').popover();
    });

</script>