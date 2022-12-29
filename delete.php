<?php
include 'database.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM data_karyawan WHERE id = '" . $_GET['id'] . "' ");
    echo '<script>window.location="index.php"</script>';
}
