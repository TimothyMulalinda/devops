<?php
$host   = "localhost";
$user   = "phpmyadmin";
$pass   = "T1m0thy_";
$dbname = "stocktrack";

$koneksi = new mysqli($host, $user, $pass, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
$id_barang   = "";
$nama_barang = "";
$kategori    = "";
$jumlah      = "";
$lokasi      = "";
$keterangan  = "";
$error       = "";
$success     = "";
$search      = "";

if(isset($_GET['op'])) // untuk edit
{
    $op = $_GET['op'];
}else
{
    $op = "";
}

if($op == 'delete')
{
    $id_barang = $_GET['id_barang'];
    $sql1 = "DELETE FROM db_barang WHERE id_barang = '$id_barang'";
    $q1 = mysqli_query($koneksi, $sql1);
    if($q1)
    {
        $success = "Delete success";
    }
    else
    {
        $error = "Delete Failed";
    }
}
{
    
}

if($op == 'edit')
{
    $id_barang = $_GET['id_barang'];
    $sql1 = "SELECT * FROM db_barang WHERE id_barang = '$id_barang'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $id_barang   = $r1['id_barang'];
    $nama_barang = $r1['nama_barang'];
    $kategori    = $r1['kategori'];
    $jumlah      = $r1['jumlah'];
    $lokasi      = $r1['lokasi'];
    $keterangan  = $r1['keterangan'];
    
    if($id_barang == "" || $nama_barang == "" || $kategori == "" || $jumlah == "" || $lokasi == "" || $keterangan == "")
    {
        $error = "Silakan input data...";
    }
}

if(isset($_POST['save'])) // untuk create
{
    $id_barang   = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori    = $_POST['kategori'];
    $jumlah      = $_POST['jumlah'];
    $lokasi      = $_POST['lokasi'];
    $keterangan  = $_POST['keterangan'];

    if($id_barang && $nama_barang && $kategori && $jumlah && $lokasi && $keterangan)
    {
        if($op == 'edit'){ //update
            $sql1 = "UPDATE db_barang SET nama_barang = '$nama_barang', kategori = '$kategori', jumlah = '$jumlah', lokasi = '$lokasi', keterangan = '$keterangan' WHERE id_barang = '$id_barang'";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1)
            {
                $success = "Update success";
            }
            else
            {
                $error  = "Update Failed";
            }
        }else //insert
        {
            $sql1 = "INSERT INTO db_barang (id_barang, nama_barang, kategori, jumlah, lokasi, keterangan) VALUES ('$id_barang', '$nama_barang', '$kategori', '$jumlah', '$lokasi', '$keterangan')";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1)
            {
                $success = "Input success";
            }
            else
            {
                $error  = "Input Failed";
            }
        }
    }else
    {
        $error = "Silakan Input data...";
    }
}

// Pencarian
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    if(empty($search)) {
        // Jika pencarian kosong, ambil semua data
        $sql2 = "SELECT * FROM db_barang ORDER BY id_barang DESC";
    } else {
        // Jika ada kata kunci pencarian, ambil data sesuai dengan kata kunci
        $sql2 = "SELECT * FROM db_barang WHERE nama_barang LIKE '%$search%' ORDER BY id_barang DESC";
    }
} else {
    // Jika tidak ada pencarian, ambil semua data
    $sql2 = "SELECT * FROM db_barang ORDER BY id_barang DESC";
}
$q2 = mysqli_query($koneksi, $sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .mx-auto {
        width: 800px;
    }

    .card {
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="mx-auto">
        <br>
        <a href="welcome.php" class="btn btn-dark mb-3">Kembali ke Dashboard</a>
        <!-- Input data -->
        <div class="card">
            <div class="card-header text-white bg-dark">
                Create / Edit
            </div>
            <div class="card-body">
                <?php 
                if($error)
                {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                    header("refresh:3;url=barang.php");//5 itu detik
                }
                ?>
                <?php 
                if($success)
                {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success ?>
                </div>
                <?php
                    header("refresh:3;url=barang.php");//5 itu detik
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="id_barang" class="col-sm-2 col-form-label">ID_Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_barang" name="id_barang"
                                value="<?php echo $id_barang ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama_Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                value="<?php echo $nama_barang ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kategori" name="kategori"
                                value="<?php echo $kategori ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah" name="jumlah"
                                value="<?php echo $jumlah ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="lokasi" id="lokasi">
                                <option value="">- Pilih Lokasi -</option>
                                <option value="Gudang Utama" <?php if($lokasi == "gudang utama") echo "selected" ?>>
                                    Gudang Utama</option>
                                <option value="Gudang - A" <?php if($lokasi == "gudang-a") echo "selected" ?>>Gudang - A
                                </option>
                                <option value="Gudang - B" <?php if($lokasi == "gudang-b") echo "selected" ?>>Gudang - B
                                </option>
                                <option value="Gudang - C" <?php if($lokasi == "gudang-c") echo "selected" ?>>Gudang - C
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="<?php echo $keterangan ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="save" value="Save Data" class="btn btn-dark">
                    </div>
                </form>
            </div>
        </div>

        <!-- Output data -->
        <div class=" card">
            <div class="card-header text-white bg-secondary">
                Data Inventaris
            </div>
            <div class="card-body">

                <!-- input pencarian -->
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="search"
                            value="<?php echo $search; ?>">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID_BARANG</th>
                            <th scope="col">NAMA_BARANG</th>
                            <th scope="col">KATEGORI</th>
                            <th scope="col">JUMLAH</th>
                            <th scope="col">LOKASI</th>
                            <th scope="col">KETERANGAN</th>
                            <th scope="col">Actions</th>
                        </tr>
                    <tbody>
                        <?php 
                        $urut = 1;
                        while($r2 = mysqli_fetch_array($q2))
                        {
                            $id_barang  = $r2['id_barang'];
                            $nama_barang = $r2['nama_barang'];
                            $kategori    = $r2['kategori'];
                            $jumlah      = $r2['jumlah'];
                            $lokasi      = $r2['lokasi'];
                            $keterangan  = $r2['keterangan'];
                            
                            ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $id_barang?></td>
                            <td scope="row"><?php echo $nama_barang?></td>
                            <td scope="row"><?php echo $kategori?></td>
                            <td scope="row"><?php echo $jumlah?></td>
                            <td scope="row"><?php echo $lokasi?></td>
                            <td scope="row"><?php echo $keterangan?></td>
                            <td scope="row">
                                <a href="barang.php?op=edit&id_barang=<?php echo $id_barang?>"><button type="button"
                                        class="btn btn-warning">Edit</button></a>
                                <a href="barang.php?op=delete&id_barang=<?php echo $id_barang?>"
                                    onClick="return confirm('Sure, for delete data...?')"><button type=" button"
                                        class="btn btn-danger">Delete</button></a>

                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
