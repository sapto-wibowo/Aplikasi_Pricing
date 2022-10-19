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
    <title>Export_List_Produk</title>
                    
</head>
<body>
<div class="container-fluid">
    <h2>List Produk</h2>
    <h4>(Inventory)</h4>
        <div class="data-tables datatable-dark">
        <a type="button"  href="halaman_admin.php" class="btn btn-secondary">Kembali</a>
            <table class="table table-bordered dataTable" id="export" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr role="row" style="background-color : #5F9EA0; color:black;">
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Kode barang: activate to sort column descending" style="width: 109.312px;">Kode barang</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama produk: activate to sort column ascending" style="width: 240.859px;">Nama Produk</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Kategori: activate to sort column ascending" style="width: 240.859px;">Kategori</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Detail Tambahan: activate to sort column ascending" style="width: 240.859px;">Detail tambahan</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Waktu Produksi: activate to sort column ascending" style="width: 100.312px;">Waktu Produksi</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Bahan Baku: activate to sort column ascending" style="width: 135.312px;">Bahan Baku</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tenaga Kerja: activate to sort column ascending" style="width: 135.312px;">Tenaga Kerja</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Biaya Overhead: activate to sort column ascending" style="width: 135.312px;">Biaya Overhead</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Biaya lainnya: activate to sort column ascending" style="width: 135.312px;">Biaya Lainnya</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Modal: activate to sort column ascending" style="width: 135.312px;">Total Modal</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jmlh Produk: activate to sort column ascending" style="width: 48.8281px;">Jumlah Produk</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Jmlh Terjual: activate to sort column ascending" style="width: 48.8281px;">Jumlah Terjual</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Harga Jual: activate to sort column ascending" style="width: 129.312px;">Harga Jual</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Keuntungan: activate to sort column ascending" style="width: 129.312px;">Keuntungan</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Margin: activate to sort column ascending" style="width: 48.8281px;">Margin</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Saran Margin: activate to sort column ascending" style="width: 129.312px;">Saran Margin</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Created_at: activate to sort column ascending" style="width: 129.312px;">Created_at/updated_at</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">Kode barang</th>
                    <th rowspan="1" colspan="1">Nama Produk</th>
                    <th rowspan="1" colspan="1">Kategori</th>
                    <th rowspan="1" colspan="1">Detail tambahan</th>
                    <th rowspan="1" colspan="1">Dekade</th>
                    <th rowspan="1" colspan="1">Bahan Baku</th>
                    <th rowspan="1" colspan="1">Tenaga Kerja</th>
                    <th rowspan="1" colspan="1">Biaya Overhead</th>
                    <th rowspan="1" colspan="1">Biaya Lainnya</th>
                    <th rowspan="1" colspan="1">Modal</th>
                    <th rowspan="1" colspan="1">Jumlah Produk</th>
                    <th rowspan="1" colspan="1">Jumlah Terjual</th>
                    <th rowspan="1" colspan="1">Harga Jual</th>
                    <th rowspan="1" colspan="1">Keuntungan</th>
                    <th rowspan="1" colspan="1">Margin</th>
                    <th rowspan="1" colspan="1">Saran Margin</th>
                    <th rowspan="1" colspan="1">Created_at/Updated_at</th>
                    
                </tr>
            </tfoot>
            <tbody>
            <!-- menampilkan data -->
            <?php
            $row_data= mysqli_query($mysqli, "SELECT *FROM tb_cpp WHERE id_cpp");
            while($view = mysqli_fetch_array($row_data)){
                echo "<tr>";
                //echo "<td>.$no++"
                    echo "<td class='sorting_1'>".$view['id_user']."-".$view['id_cpp']."</td>";
                    echo "<td>".$view['nama_ush']."</td>";
                    echo "<td>".$view['sub_ctg']."</td>";
                    echo "<td>".$view['ktg_lain']."</td>";
                    echo "<td>".$view['dekade']."</td>";
                    echo "<td>".$view['bhbk']."</td>";
                    echo "<td>".$view['tngkj']."</td>";
                    echo "<td>".$view['ovrhd']."</td>";
                    echo "<td>".$view['by_lain']."</td>";
                    echo "<td>".$view['modal']."</td>";
                    echo "<td>".$view['jm_produk']."</td>";    
                    echo "<td>".$view['jm_jual']."</td>";    
                    echo "<td>".$view['keuntungan']."</td>";    
                    echo "<td>".$view['nilai_jual']."</td>";    
                    echo "<td>".$view['margin_cpp']."%</td>";    
                    echo "<td>".$view['nilai_margin']."</td>";    
                    echo "<td>".$view['created_at']."/".$view['updated_at']."</td>";    
                    
                echo "</tr>";
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
        $("#export").DataTable(
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