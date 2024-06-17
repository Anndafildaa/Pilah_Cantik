<html>
<head>
    <title>Homepage</title>
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

        input[type=button], input[type=submit] {
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
    <h2 style="font-size: 30px; color: #262626;">Data Nasabah</h2>

    <form action="update-nasabah.php" method="post">
        <div class="form-group">
            <label class="text-left">Nomor ID Nasabah</label>
            <input type="text" disabled="disabled" value="<?php echo @$_SESSION['id']; ?>" />
        </div>
        <div class="form-group">
            <label class="">Nama Nasabah</label>
            <input type="text" name="nama" value="<?php echo @$_SESSION['nama']; ?>"/>
        </div>
        <div class="form-group">
            <label class="">Password</label>
            <input type="password" name="password" value="<?php echo @$_SESSION['pass']; ?>"/>
        </div>
        <div class="form-group">
            <label class="">Alamat</label>
            <input type="text" disabled="disabled" value="<?php echo @$_SESSION['alamat']; ?>"/>
        </div>
        <div class="form-group">
            <label class="">Nomor Telepon</label>
            <input type="text" name="no_telepon" value="<?php echo @$_SESSION['telepon']; ?>"/>
        </div>
        <div class="form-group">
            <label class="">E-mail</label>
            <input type="text" name="email" value="<?php echo @$_SESSION['email']; ?>"/>
        </div>
        <div class="form-group">
            <label class="">Saldo Total (Rp)</label>
            <?php
                $saldonya = mysqli_query($conn, "SELECT SUM(total) AS totalsaldo FROM setor WHERE id_nasabah='".$_SESSION['id']."'");
                $tariknya = mysqli_query($conn, "SELECT SUM(jumlah_tarik) AS totaltarik FROM tarik WHERE id_nasabah='".$_SESSION['id']."'");
                $var_saldo = mysqli_fetch_array($saldonya);
                $var_tarik = mysqli_fetch_array($tariknya);
                $tot_saldo_total = ($var_saldo['totalsaldo']) - ($var_tarik['totaltarik']);
            ?>      
            <input type="text" disabled="disabled" value="<?php echo $tot_saldo_total; ?>"/>
        </div>
        <div class="form-group">
            <label class="">Berat Sampah (Kg)</label>
            <input type="text" disabled="disabled" value="<?php 
                $query = mysqli_query($conn, "SELECT SUM(berat) AS totalberat FROM setor WHERE id_nasabah='".$_SESSION['id']."'");
                while($row = mysqli_fetch_array($query)) {
                    echo $row['totalberat'];
                }
            ?>"/>
        </div>
        
        <input type="submit" name="update" value="Simpan Data" />
    </form>
</body>
</html>
