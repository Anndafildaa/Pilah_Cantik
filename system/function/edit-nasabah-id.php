<?php
  require_once("../system/config/koneksi.php");

  if (isset($_POST['simpan'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $password = $_POST['password'];
      $alamat = $_POST['alamat'];
      $no_telepon = $_POST['no_telepon'];
      $email = $_POST['email'];

      $query = "UPDATE nasabah SET nama = '$nama', password = '$password', alamat = '$alamat', no_telepon = '$no_telepon', email = '$email' WHERE id='".$id."' ";
      $queryact = mysqli_query($conn, $query);
      echo "<meta http-equiv='refresh' content='0; url=http://localhost/pilah_cantik/page/admin.php?page=data-nasabah-full'>";
  }
?>

<html>
<head>
  <title>Homepage</title>
  <!--link datatables-->
    <style>

        label {
            font-family: Montserrat;    
            font-size: 18px;
            display: block;
            color: #262626;
        }

        input[type=text], input[type=password] {
            border-radius: 5px;
            width: 40%;
            height: 35px;
            background: #eee;
            padding: 0 10px;
            box-shadow: 1px 2px 2px 1px #ccc;
            color: #262626;
        }

        input[type=submit] {
            height: 35px;
            width: 200px;
            background: #8cd91a;
            border-radius: 20px;
            color: #fff;
            margin-top: 20px;
            cursor: pointer;
        }

        input {
            font-family: Montserrat;
            font-size: 16px;
        }

        .form-group {
            padding: 5px 0;
        }

    </style>    
</head>

<body>
     <h2 style="font-size: 30px; color: #262626;">Edit Data Nasabah</h2>
     <?php if(isset($_GET['id'])) {$id=$_GET['id']; ?>
     <?php 
        $cek = mysqli_query($conn, "SELECT * FROM nasabah WHERE id='".$_GET['id']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form action="" method="post">
          <label class="text-left">Nomor ID Nasabah</label>
          <input type="text" name="id" disabled="disabled" value="<?php echo $_GET['id']; ?>" />

         <div class="form-group">
          <label class="">Nama Nasabah</label>
          <input type="text" name="nama" value="<?php echo $row['nama'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Password</label>
          <input type="password" name="password" value="<?php echo $row['password'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Alamat</label>
          <input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" required/>
         </div>
        <div class="form-group">
          <label class="">Nomor Telepon</label>
          <input type="text" name="no_telepon" value="<?php echo $row['no_telepon'] ?>" required/>
        </div>
        <div class="form-group">
          <label class="">E-mail</label>
          <input type="text" name="email" value="<?php echo $row['email'] ?>" required/>
        </div>
         <div class="form-group">
          <label class="">Saldo (Rp)</label>
          <input type="text" disabled="disabled" name="saldo" value="<?php echo $row['saldo'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Sampah (Kg)</label>
          <input type="text" disabled="disabled" name="saldo" value="<?php echo $row['sampah'] ?>"/>
         </div>

         <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>" />
         <input class="button" onclick="alert('Berhasil Mengubah data nasabah!')" type="submit" name="simpan" value="Simpan Data" />
         </form>     
     <?php } else {
        $cek = mysqli_query($conn, "SELECT * FROM nasabah WHERE id='".$_SESSION['id']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form action="" method="post">
          <label class="text-left">Nomor Induk Admin</label>
          <input type="text" name="nia" disabled="disabled" value="<?php echo @$_SESSION['id'] ?>" />
          <input name="id" type="hidden" value="<?php echo @$_SESSION['id'] ?>" />

         <div class="form-group">
          <label class="">Nama Nasabah</label>
          <input type="text" name="nama" value="<?php echo $row['nama'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Password</label>
          <input type="password" name="password" value="<?php echo $row['password'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Alamat</label>
          <input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Nomor Telepon</label>
          <input type="text" name="telepon" value="<?php echo $row['no_telepon'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">E-mail</label>
          <input type="text" name="username" value="<?php echo $row['email'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Saldo (Rp)</label>
          <input type="text" disabled="disabled" name="saldo" value="<?php echo $row['saldo'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Sampah (Kg)</label>
          <input type="text" disabled="disabled" name="saldo" value="<?php echo $row['sampah'] ?>"/>
         </div>
         
         <input class="button" type="submit" onclick="alert('Berhasil Mengubah data nasabah!')" name="simpan" value="Simpan Data" />
         </form>
     <?php } ?>
</body>
</html>
