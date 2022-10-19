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
    
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <title>Export_Akun</title>
                    
</head>
<body>
<div class="container">
    <h2>List Akun</h2>
    <h4>(Data User)</h4>
        <div class="data-tables datatable-dark">
        <a type="button"  href="list_user.php" class="btn btn-secondary">Kembali</a>
            
            <table class="table table-bordered dataTable" id="export_akun" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr role="row" style="background-color : #5F9EA0; color:black;">
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="No.: activate to sort column descending" style="width: 20.312px;">No.</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="id_user: activate to sort column descending" style="width: 20.312px;">id_user</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 109.312px;">Username</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 109.312px;">Password(MD5)</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 109.312px;">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 109.312px;">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nomor Hp: activate to sort column ascending" style="width: 109.312px;">Nomor Hp</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">No.</th>
                    <th rowspan="1" colspan="1">id_user</th>
                    <th rowspan="1" colspan="1">Username</th>
                    <th rowspan="1" colspan="1">Password(MD5)</th>
                    <th rowspan="1" colspan="1">Nama</th>
                    <th rowspan="1" colspan="1">email</th>
                    <th rowspan="1" colspan="1">nomor Hp</th>
                </tr>
            </tfoot>
            <tbody>
            <!-- menampilkan data -->
            <?php
            $no = 1;
            $kd_user = $_SESSION['kd_user'];
            $row_user= mysqli_query($mysqli, "SELECT *FROM log_in WHERE id_user");
            while($a = mysqli_fetch_array($row_user)){
                echo "<tr>";
                echo "<td>".$no."</td>";
                    echo "<td>".$a['id_user']."</td>";
                    echo "<td>".$a['username']."</td>";
                    echo "<td>".$a['pass']."</td>";
                    echo "<td>".$a['nama']."</td>";
                    echo "<td>".$a['email']."</td>";
                    echo "<td>".$a['nomor_hp']."</td>";           
                    echo "</tr>";
                    // <a href='#' type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModaldelete'".$a['id_user']." data-backdrop='static'>Delete</a>
                $no++;
                }
                
                ?>
            </tbody>
        </table>
            
        </div>
            <!-- last content -->
</div>
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
    
                        
                        
    <!-- last main
    window.$ = window.jQuery = require('jquery');
window.Tether = require('tether');
require('bootstrap'); -->
    <script>
    $(document).ready(function(){
        $("#export_akun").DataTable(
            {
                dom: 'Bfrtip',
                buttons:[
                    'excel','pdf','print'
                ]
            });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>    

    </body>
</html>