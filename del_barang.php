
<!-- <div id="myModaldelete" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Delete Barang <php echo $del['nama_ush']; ?></h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <label>Do you want to delete this data?</label><br><br>
        </div>
        <div class="modal-footer">
            <a href="list.php?id=<php echo $del['id_cpp'];?>" class=" btn btn-danger btn-xs"> Delete </a>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
            list.php?act=deleteuser&id=? $view['id_cpp'];?>
            <php echo base_url('administrator/responden/delete?id=') . $view['id_cpp']; ?>
        </div>
        </div>
    </div>
</div> -->
        <!-- <php };?> -->
        <!-- https://www.ketutrare.com/2019/04/membuat-crud-pada-modal-dengan-bootstrap-dan-php.html -->
        <?php
            include_once("connect.php");

    //    proses delete modal
        if(isset($_GET['id_del'])){
            $id_cpp = $_GET['id_del'];
        
            //query hapus
            $querydelete = mysqli_query($mysqli, "DELETE FROM tb_cpp WHERE id_cpp = '$id_cpp'");
        
            if ($querydelete) {
                # redirect ke index.php
                echo "<script>document.location='list.php'</script>";
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