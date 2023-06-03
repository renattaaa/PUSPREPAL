<?php
include 'koneksi.php';
$kategori    = "";
$foto_prestasi   = "";
$caption  = "";
$tanggal          = "";
$sukses        = "";
$error         = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id_prestasi         = $_GET['id_prestasi'];
    $sql1       = "delete from prestasi where id_prestasi = '$id_prestasi'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id_prestasi           = $_GET['id_prestasi'];
    $sql1         = "select * from prestasi where id_prestasi = '$id_prestasi'";
    $q1           = mysqli_query($koneksi, $sql1);
    $r1           = mysqli_fetch_array($q1);
    $kategori   = $r1['kategori'];
    $foto_prestasi  = $r1['foto_prestasi'];
    $caption = $r1['caption'];
    $tanggal         = $r1['tanggal'];

    if ($kategori == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $kategori   = $_POST['kategori'];
    $foto_prestasi  = $_POST['foto_prestasi'];
    $caption = $_POST['caption'];
    $tanggal         = $_POST['tanggal'];

    if ($kategori && $foto_prestasi && $caption && $tanggal) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update prestasi set kategori = '$kategori',foto_prestasi='$foto_prestasi',caption = '$caption',tanggal='$tanggal' where id_prestasi = '$id_prestasi'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into prestasi(kategori,foto_prestasi,caption,tanggal) values ('$kategori','$foto_prestasi','$caption','$tanggal')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type=text/css href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Page</title>
</head>
<!-- NAVBAR -->
<div class="sidebar" style="left: 0px; top: 0px;">
    <div class="logo-details">
        <i class=''></i>
        <span class="logo_name">PUSPREPAL</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="admin.php" class="active">
                <i class=''></i>
                <span class="links_name">Back</span>
            </a>
        </li>
        <li class="log_out">
            <a href="index.php">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>
<div style="font-size: 40px; color: black; margin-top: 100px; margin-left: 252px; margin-bottom: 42px;">
    Create / Edit Data
</div>

<body class="body-create" style="margin-left: 518px; width: 50%;">
    <div class="card">

        <div class="card-body">
            <?php
            if ($error) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php
                header("refresh:5;url=create.php"); //5 : detik
            }
            ?>
            <?php
            if ($sukses) {
            ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
            <?php
                header("refresh:5;url=create.php");
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $kategori ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="foto_prestasi" class="col-sm-2 col-form-label">foto prestasi</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="foto_prestasi" name="foto_prestasi" value="<?php echo $foto_prestasi ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="caption" class="col-sm-2 col-form-label">caption</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $caption ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal" class="col-sm-2 col-form-label">tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>