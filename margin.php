<?php
 function p_margin($s1, $s2, $s3, $hasilku, $margin_cpp){
    if($s3 == 1){
        if($hasilku == "Margin dapat ditingkatkan"){
            $new_margin = "16% - 38%";
        }else{
            $new_margin = "dibawah 16% atau tetap $margin_cpp%";
        
        }
    }elseif($s3 == 2){
        if($hasilku == "Margin dapat ditingkatkan"){
            $new_margin = "lebih dari 38%";
        }elseif($hasilku == "Margin Tetap"){
            $new_margin = "16% - 38% atau tetap $margin_cpp%";
        }else{
            $new_margin = "dibawah 16%";
        }
    }elseif($s3 == 3){
        if($s1 == 1 && $s2 == 2 && $hasilku == "Margin perlu diturunkan" || $s1 == 3 && $s2 == 1 && $hasilku == "Margin perlu diturunkan"){
            $new_margin = "16% - 38%";
        }elseif($hasilku == "Margin perlu diturunkan"){
            $new_margin = "dibawah 16%";
        }else{
            $new_margin = "tetap $margin_cpp% atau lebih dari 38%";
        }
    }else{
        echo "nilai gagal";
    }

    return $new_margin;
}

        if(isset($_POST['kirim'])){
        $nama = $_POST['user'];
        $nama_srn = $_POST['nama'];
        $email = $_POST['email_ku'];
        $komen =$_POST['komen'];
            // $hasil = ($modal+($modal * ($margin_cpp/100)))/$jm_produk;
            // <input type='text' class='form-control' value='$hasil'>
        include_once("connect.php");
        $result=mysqli_query($mysqli, "INSERT INTO keluhan_saran(nama,email,saran) 
        VALUES('$nama_srn','$email','$komen')");
            if($result){
                // echo " Disimpan";
                if($nama == ''){
                    echo "<script>
                    alert('Terimakasih atas masukannya');
                    document.location='halaman_utama_AP.php'
                    </script>";
                    
                }elseif($nama == "admin"){
                    echo "<script>
                    alert('Terimakasih atas masukannya');
                    document.location='admin/halaman_admin.php'
                    </script>";
                    
                }else{
                    echo "<script>
                    alert('Terimakasih atas masukannya');
                    document.location='halaman_user.php'
                    </script>";
                    
                }
                // echo "<div class='alert alert-success fade in'>
                // <a href='tampil.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                // User Added Successfully
                //     </div>";

            }else{
                echo "Error, tidak berhasil". mysqli_error($mysqli);
            }
        }
    

?> 