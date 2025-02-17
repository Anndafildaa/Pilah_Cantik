<?php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    include_once("../system/config/koneksi.php");

    if(isset($_POST['simpan'])){
        $id = $_POST['id'];
        $tanggal_tarik = $_POST['tanggal_tarik'];
        $id_nasabah = $_POST['id_nasabah'];
        $saldo = $_POST['saldo'];
        $jumlah_tarik = $_POST['jumlah_tarik'];
        $id_admin = $_POST['id_admin'];

        // Update data
        $query = "UPDATE tarik 
                    SET tanggal_tarik = '$tanggal_tarik', id_nasabah = '$id_nasabah', saldo = '$saldo', jumlah_tarik = '$jumlah_tarik', id_admin = '$id_admin'
                    WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "<script>alert('Berhasil mengupdate data tarik!')</script>";
            echo "<meta http-equiv='refresh' content='0; url=admin.php?page=data-tarik'>";
        } else {
            echo "<script>alert('Gagal mengupdate data tarik!')</script>";
        }
    }
?>


<html>
<head>
  <title>Homepage</title>
  <script type="text/javascript" src="../asset/plugin/datepicker/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../asset/plugin/datepicker/css/jquery.datepick.css"> 
  <script type="text/javascript" src="../asset/plugin/datepicker/js/jquery.plugin.js"></script> 
  <script type="text/javascript" src="../asset/plugin/datepicker/js/jquery.datepick.js"></script>

  

  <!--link datatables-->
    <style>

        label{
        font-family: Montserrat;    
        font-size: 18px;
        display: block;
        color: #262626;
        }

        input[type=text], input[type=password]{
          border-radius: 5px;
          width: 40%;
          height: 35px;
          background: #eee;
          padding: 0 10px;
          box-shadow: 1px 2px 2px 1px #ccc;
          color: #262626;
        }
        
        select{
          border-radius: 5px;
          width: 42%;
          height: 39px;
          background: #eee;
          padding: 0 10px;
          box-shadow: 1px 2px 2px 1px #ccc;
          color: #262626;
        }

        input[type=submit]{
          height: 35px;
          width: 200px;
          background: #8cd91a;
          border-radius: 20px;
          color: #fff;
          margin-top: 20px;
          cursor: pointer;
        }

        input, select{
            font-family: Montserrat;
            font-size: 16px;
        }

        .form-group{
            padding: 5px 0;
        }

    </style>    

    <script type="text/javascript">

function cek_data() {
   var x=daftar_user.tanggal_tarik.value;
   
   if(x==""){
      alert("Maaf harap input tanggal tarik!");
      daftar_user.tanggal_tarik.focus(); 
      return false;
   }
    var p=daftar_user.nin.value;
    if (p =="p"){
      alert("Maaf harap input nomor induk nasabah!");
      return (false);
   }
   var x=daftar_user.saldo.value;

   if(x==""){
      alert("Maaf saldo Anda masih kosong!");
      daftar_user.saldo.focus(); 
      return false;
   }
   var x=daftar_user.jumlah_tarik.value;
   var angka = /^[0-9]+$/;

   if(x==""){
      alert("Maaf harap input jumlah penarikan!");
      daftar_user.jumlah_tarik.focus(); 
      return false;
   }
   if(!x.match(angka)){
      alert ("Maaf jumlah tarik harus di input angka!");
      daftar_user.jumlah_tarik.focus();
      return false;
   }else{
  confirm("Apakah Anda yakin sudah input data dengan benar?");
  }
   return true;
}
</script>

</head>

<body>
     <h2 style="font-size: 30px; color: #262626;">Tarik Tabungan</h2>

     <form id="daftar_user" name='autoSumForm' action="" method="post" onsubmit="return cek_data()">
          <div class="form-group">
          <label class="text-left">Tanggal Penarikan</label>
          <input type="text" placeholder="Masukan tanggal setor" id="date" name="tanggal_tarik" />
          <script type="text/javascript">
            $('#date').datepick({dateFormat: 'yyyy-mm-dd'});
          </script>
         </div>
         <div class="form-group">
  <label class="">Nomor ID Nasabah</label>
  <select class="nomornasabah" name="id_nasabah" id="id_nasabah" onchange="changeNasabah(this.value)">
    <option value="pnin">---Pilih ID Nasabah---</option>
    <?php 
      $query = mysqli_query($conn, "SELECT * FROM nasabah");
      $jsArrayNasabah = "var dtnasabah = new Array();\n";
      while ($row = mysqli_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';    
        $jsArrayNasabah .= "dtnasabah['" . $row['id'] . "'] = {saldo:'" . addslashes($row['saldo']) . "'};\n";
      }
    ?>
  </select>
</div>
<div class="form-group">
  <label class="">Saldo</label>
  <input type="text" placeholder="Otomatis terisi" style="cursor: not-allowed;" id="saldo" name="saldo" readonly />
</div>
         <div class="form-group">
          <label class="">Jumlah Penarikan</label>
          <input type="text" placeholder="Masukan jumlah tarik" name="jumlah_tarik" />
         </div>
         <div class="form-group">
          <label class="">Nomor Induk Admin</label>
          <input type="text" style="cursor: not-allowed;" name="id_admin" value="<?php echo $_SESSION["id"]; ?>" readonly />
         </div>
         
         <input type="submit" name="simpan" value="Simpan Data" />
         
         </form>
    <script type="text/javascript">    
  <?php echo $jsArrayNasabah; ?>  
  function changeNasabah(id_nasabah) {
    console.log(dtnasabah);  
    document.getElementById('saldo').value = dtnasabah[id_nasabah]['saldo'];
  }
</script>

      
    <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>      

	<link href="js/select2.min.css" rel="stylesheet" />
	<script src="js/select2.min.js"></script>
	<script>
$(document).ready(function() {
    $('.nomoradmin').select2();
	$('.nomornasabah').select2();
});
	</script>
</body>
</html>
