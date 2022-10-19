<?php
    include_once("connect.php");
    // $result = mysqli_query($mysqli, "SELECT *FROM tb_cpp ORDER BY id_cpp DESC");
    session_start();
    // cek status login
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
            <h2 class="m-0 font-weight-bold text-primary bg-light" style="text-align:center;">TABEL DAFTAR PRODUK USER</h2>
            
            </div>
        <!-- </section> -->
        <!-- end section1 -->
        
        <!-- section2 -->
        <div class="container" style=" position:center;" >
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
            <!-- content -->
            
            <br>
            <a href='halaman_user.php' type='button' class='btn btn-secondary btn-xs'>Halaman Utama</a>
                    <?php
                    // menampilkan data by id
                        $kd_user = $_SESSION['kd_user'];
                        // $no = 1;
                    // fungsi search
                    // if(isset($_POST['search'])){
                    //     $cari=$_POST['input_search'];
                    //     $tampil=mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp AND id_user=$kd_user AND nama_ush OR id_cpp LIKE '%$cari%'");
                    // }else{
                    //     $tampil= mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp AND id_user=$kd_user");
                    // }
                    // end fungsi search
                    ?>
                    
                    <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <!-- row tabel -->
                        <div class="row">
                            <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 150%;">
                                <thead>
                                    <tr role="row" style="background-color : #1abc9c;; color:black;">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 18.312px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="id_cpp: activate to sort column ascending" style="width: 50.312px;">Kode_barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama Usaha: activate to sort column ascending" style="width: 109.312px;">Nama Usaha</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="dekade: activate to sort column ascending" style="width: 50.312px;">dekade</th>
                                        <!-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending" style="width: 50.312px;">Keterangan</th> -->
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Modal: activate to sort column ascending" style="width: 100.312px;">Modal</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="jml Produk:jual: activate to sort column ascending" style="width: 50.312px;">jml Produk:jual</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Harga Jual: activate to sort column ascending" style="width: 50.312px;">Harga Jual</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Keuntungan: activate to sort column ascending" style="width: 50.312px;">Keuntungan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Margin: activate to sort column ascending" style="width: 50.312px;">Margin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Saran_margin: activate to sort column ascending" style="width: 50.312px;">Saran_margin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Hasil: activate to sort column ascending" style="width: 129.312px;">Hasil</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Hasil: activate to sort column ascending" style="width: 129.312px;">Created at</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Hasil: activate to sort column ascending" style="width: 129.312px;">Updated at</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 50.312px;">Action</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                <!-- menampilkan data -->
                                <?php
                                    $no=1;
                                        $tampil= mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp AND id_user=$kd_user");

                                    while($view = mysqli_fetch_array($tampil)){
                                        echo "<tr>";
                                        echo "<td>".$no++."";
                                        echo "<td>".$view['id_cpp']."</td>";
                                        echo "<td>".$view['nama_ush']." <a href='#' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modal_usaha$view[id_cpp]'>i</a>
                                        </td>";
                                        echo "<td>".$view['dekade']."</td>";
                                        // echo "<td>".$view['sub_ctg']."-".$view['ktg_lain']."</td>";
                                        echo "<td> Rp".number_format($view['modal'],0,',','.').
                                        " <a href='#' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal_info$view[id_cpp]'>i</a>
                                        </td>";
                                        echo "<td>".$view['jm_produk'].":".$view['jm_jual']."</td>";    
                                        echo "<td>Rp".number_format($view['nilai_jual'],0,',','.')."</td>";     
                                        echo "<td>Rp".number_format($view['keuntungan'],0,',','.')."</td>";     
                                        echo "<td>".$view['margin_cpp']."%</td>";     
                                        echo "<td>".$view['saran_margin']."</td>";     
                                        echo "<td>".$view['nilai_margin']."</td>";
                                        echo "<td>".$view['created_at']."</td>";    
                                        echo "<td>".$view['updated_at']."</td>";      
                                        echo "<td><h4><a href='form_et.php?id_cpp=$view[id_cpp]' type='button' class='badge badge-info' style='position:right;'>Edit</a></h4>

                                            <h4><a href='del_barang.php?id_del=$view[id_cpp]' class='badge badge-danger' onclick='return confirm(\"Data akan dihapus secara Permanen !!?\")'>Delete</a></h4></td>";

                                            // type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModaldelete'
                                ?>

                                <!-- modal info -->
                                <div id="modal_info<?=$view['id_cpp'];?>" class="modal fade" role="dialog" style="display:none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal_infoLabel">Info Modal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                            $cek_modal = $view['id_cpp'];
                                            $row_mo= mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp=$cek_modal");
                                            while($r_mo = mysqli_fetch_array($row_mo)){ ?>
                                        <div class="modal-body">
                                            <form autocomplete="off">
                                                <div class="form-group row">
                                                        <input type="hidden" class="form-control" name="id_cpp" hidden="true" value="<?= $cek_modal;?>">
                                                    <label class="col-sm-4 col-form-label">Biaya Bahan Baku</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="Rp <?= number_format($r_mo['bhbk'],0,',','.');?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Biaya Tenaga Kerja</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="Rp <?= number_format($r_mo['tngkj'],0,',','.');?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Biaya Overhead</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="Rp <?= number_format($r_mo['ovrhd'],0,',','.');?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Biaya Lain-Lain</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="Rp <?= number_format($r_mo['by_lain'],0,',','.');?>" readonly="true">
                                                    </div>
                                                </div>
                                            <?php
                                                }//end while info modal
                                                ?>
                                            </form>
                                            <!-- end modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <a type="button"  href="../logout.php" class="btn btn-primary">Ya</a> -->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End modal info -->

                                <!-- modal info nama usaha -->
                                <div id="modal_usaha<?=$view['id_cpp'];?>" class="modal fade" role="dialog" style="display:none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal_usahaLabel">Info Nama Usaha</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                            $cek_usaha = $view['id_cpp'];
                                            $row_ush= mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp=$cek_modal");
                                            while($r_ush = mysqli_fetch_array($row_ush)){ ?>
                                        <div class="modal-body">
                                            <form autocomplete="off">
                                                <div class="form-group row">
                                                        <input type="hidden" class="form-control" name="id_cpp" hidden="true" value="<?= $cek_modal;?>">
                                                    <label class="col-sm-4 col-form-label">Kategori</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?= $r_ush['sub_ctg'];?>" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Keterangan Lain</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?= $r_ush['ktg_lain'];?>" readonly="true">
                                                    </div>
                                                </div>
                                            <?php
                                                }//end while info usaha
                                                ?>
                                            </form>
                                            <!-- end modal body -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <a type="button"  href="../logout.php" class="btn btn-primary">Ya</a> -->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end info nama usaha -->

                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- end row tabel -->
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
                    <div class="card-header"><h3>Berikan Ulasan Anda</h3></div>
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
    <script src="admin/assets/sb_admin/vendor/datatables/jquery.dataTables.min.js"></script>
<!-- page level custom plugin -->
<script src="admin/assets/sb_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="admin/assets/sb_admin/js/demo/datatables-demo.js"></script>
    </body>
</html>