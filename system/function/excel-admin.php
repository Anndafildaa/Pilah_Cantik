<?php 
require_once ('../config/koneksi.php');

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");


 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$filename = "excel-admin (".date('d-m-Y').").xls";
header("Content-Disposition: attachment; filename=$filename");
 	 ?>

<h2 style="font-size: 30px; color: #262626;">Data Admin</h2>
	<br>
	<table id="example" class="display" cellspacing="0" width="100%" border="0" >
	<tr>
        <th>ID</th>
        <th>Nama Admin</th>
        <th>Nomor Telepon</th>
        <th>E-Mail</th>
        <th>Password</th>
    </tr>
    <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM admin ORDER BY id ASC");
            while($row = mysqli_fetch_assoc($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['no_telepon'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>

        </tr>
        <?php } ?>
</table>