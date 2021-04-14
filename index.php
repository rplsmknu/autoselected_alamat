<?php 
    require_once('koneksi.php');

    //data provinsi
    $prov         = "select * from provinsi";
    $prov_result  = $con->query($prov);

    //data kota
    $kota         = "select * from kota";
    $kota_result  = $con->query($kota);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Autoselected Alamat</title>
    
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
	$(document).ready(function() {
        $('#provinsi').change(function(){
                var provinsi_id = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'proses.php',
                    data : 'prov_id='+provinsi_id,
                    success: function(response){
                        $('#kota').html(response);
                    }
                });
        });
	});
    </script>

</head>
<body>
<h4>Autoselected PHP MYSQLI</h4>
	<form action="#" method="POST">
		<table width="20%">
			<tr>
				<td>Provinsi</td>
				<td>:</td>
				<td>
					<select name="provinsi" id="provinsi">
                        <option value="">Pilih Provinsi</option>
                        <?php 
                            while($row= mysqli_fetch_array($prov_result)):
                        ?>
						<option value="<?= $row['id'] ?>"><?= $row['nama_prov'] ?></option>
                        <?php 
                            endwhile;
                        ?>
					</select>
				</td>
			</tr>
            
			<tr>
				<td>Kota</td>
				<td>:</td>
				<td>
					<select name="kota" id="kota">
                            <option value="">Pilih Kota</option>
                            <option></option>
					</select>
				</td>
			</tr>
		</table>
	</form>
</body>

</html>