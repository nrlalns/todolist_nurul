<?php
include('../config.php');

if(isset($_POST['id']) && isset($_POST['keterangan'])){
    $id = intval(value: $_POST['id']); 
    $keterangan = $_POST['keterangan']=== "Selesai" ? "Selesai" : "Belum Selesai";

    $query = "UPDATE tbtodo SET keterangan ='$keterangan' WHERE id =$id";
    if (mysqli_query($mysqli,$query)){
        echo "success";
    }else{
        echo "error";
    }
}
?>