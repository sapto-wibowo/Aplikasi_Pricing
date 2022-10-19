<?php
    include_once("../connect.php");

//    proses delete modal
    if(isset($_GET['id_usdel'])){
        $id_user = $_GET['id_usdel'];
    
        //query hapus
        $querydelete = mysqli_query($mysqli, "DELETE FROM log_in WHERE id_user = '$id_user'");
    
        if ($querydelete) {
            # redirect ke index.php
            echo "<script>document.location='list_user.php'</script>";
        }
        else{
            echo "ERROR, data gagal dihapus". mysqli_error($mysqli);
        }
    }

//    if(isset($_POST['delete'])){
//        $id = $_GET['id_cpp'];
//        $del=mysqli_query($mysqli, "DELETE FROM tb_cpp WHERE id_cpp=$id");

//        header("location:list.php");
//    }
    ?>