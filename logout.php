<?php
session_start();
session_destroy();
echo "<script>
    alert('Logout Berhasil');
    document.location='halaman_utama_AP.php'
</script>"
?>