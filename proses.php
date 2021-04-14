<?php 
    require_once('koneksi.php');

    $prov_id    = $_POST['prov_id']; 
    $sql        = "select * from kota where prov_id= $prov_id";
    $sql_result = $con->query($sql);

    echo '<option>Pilih Kota</option>';
    while($row = mysqli_fetch_array($sql_result)){
        echo'<option>'.$row['nama_kota'].'</option>';
    }
?>