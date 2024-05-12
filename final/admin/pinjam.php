<?php
$host   = "localhost";
$user   = "phpmyadmin";
$pass   = "T1m0thy_";
$dbname = "stocktrack";

$koneksi = new mysqli($host, $user, $pass, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_barang      = "";
$tanggal_pinjam = "";
$tanggal_kembali = "";
$jumlah_pinjam  = "";
$status         = "";
$error          = "";
$success        = "";
$search         = "";

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
    $sql1 = "DELETE FROM db_pinjaman WHERE id_barang = '$id_barang'";
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

if($op == 'edit')
{
    $id_barang = $_GET['id_barang'];
    $sql1 = "SELECT * FROM db_pinjaman WHERE id_barang = '$id_barang'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $id_barang      = $r1['id_barang'];
    $tanggal_pinjam = $r1['tanggal_pinjam'];
    $tanggal_kembali = $r1['tanggal_kembali'];
    $jumlah_pinjam  = $r1['jumlah_pinjam'];
    $status         = $r1['status'];
    
    if($id_barang == "" || $tanggal_pinjam == "" || $tanggal_kembali == "" || $jumlah_pinjam == "" || $status == "")
    {
        $error = "Silakan input data...";
    }
}

// Pencarian
// Pencarian
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    if(empty($search)) {
        // Jika pencarian kosong, ambil semua data
        $sql2 = "SELECT db_pinjaman.*, db_barang.nama_barang 
                 FROM db_pinjaman 
                 INNER JOIN db_barang ON db_pinjaman.id_barang = db_barang.id_barang 
                 ORDER BY db_pinjaman.id_barang DESC";
    } else {
        // Jika ada kata kunci pencarian, ambil data sesuai dengan kata kunci
        $sql2 = "SELECT db_pinjaman.*, db_barang.nama_barang 
                 FROM db_pinjaman 
                 INNER JOIN db_barang ON db_pinjaman.id_barang = db_barang.id_barang 
                 WHERE db_pinjaman.id_barang LIKE '%$search%' OR db_barang.nama_barang LIKE '%$search%' OR db_pinjaman.tanggal_pinjam LIKE '%$search%' OR db_pinjaman.tanggal_kembali LIKE '%$search%' OR db_pinjaman.jumlah_pinjam LIKE '%$search%' OR db_pinjaman.status LIKE '%$search%' 
                 ORDER BY db_pinjaman.id_barang DESC";
    }
} else {
    // Jika tidak ada pencarian, ambil semua data
    $sql2 = "SELECT db_pinjaman.*, db_barang.nama_barang 
             FROM db_pinjaman 
             INNER JOIN db_barang ON db_pinjaman.id_barang = db_barang.id_barang 
             ORDER BY db_pinjaman.id_barang DESC";
}

$q2 = mysqli_query($koneksi, $sql2);

// Proses penyimpanan perubahan edit
if(isset($_POST['save_edit'])) {
    $id_barang      = $_GET['id_barang'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $jumlah_pinjam  = $_POST['jumlah_pinjam'];
    $status         = $_POST['status'];

    $sql_edit = "UPDATE db_pinjaman 
                 SET tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali', jumlah_pinjam='$jumlah_pinjam', status='$status' 
                 WHERE id_barang='$id_barang'";
    $query_edit = mysqli_query($koneksi, $sql_edit);
    if($query_edit) {
        $success = "Data updated successfully";
        header("Location: pinjam.php"); // Ganti 'nama_file.php' dengan nama file ini
        exit();
    } else {
        $error = "Failed to update data";
    }
}
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
        <!-- Output data -->
        <div class="card">
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

                <!-- Form edit -->
                <?php if($op == 'edit'): ?>
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        Edit Data
                    </div>
                    <div class="card-body">
                        <?php if($error): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="mb-3 row">
                                <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                                        value="<?php echo $tanggal_pinjam ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
                                        value="<?php echo $tanggal_kembali ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jumlah_pinjam" class="col-sm-2 col-form-label">Jumlah Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam"
                                        value="<?php echo $jumlah_pinjam ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="status" name="status">
                                        <option value="Pending" <?php if($status == "Pending") echo "selected" ?>>
                                            Pending</option>
                                        <option value="Sedang Dipinjam"
                                            <?php if($status == "Sedang Dipinjam") echo "selected" ?>>
                                            Sedang Dipinjam</option>
                                        <option value="Sudah Dikembalikan"
                                            <?php if($status == "Sudah Dikembalikan") echo "selected" ?>>
                                            Sudah Dikembalikan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="submit" name="save_edit" value="Save Edit" class="btn btn-dark">
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Button untuk kembali ke halaman welcome.php -->
                <a href="welcome.php" class="btn btn-dark mb-3">Kembali ke Dashboard</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID_BARANG</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Jumlah Pinjam</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $urut = 1;
                        while($r2 = mysqli_fetch_array($q2))
                        {
                            $id_barang      = $r2['id_barang'];
                            $tanggal_pinjam = $r2['tanggal_pinjam'];
                            $tanggal_kembali = $r2['tanggal_kembali'];
                            $jumlah_pinjam  = $r2['jumlah_pinjam'];
                            $status         = $r2['status'];
                            ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $id_barang?></td>
                            <td scope="row"><?php echo $r2['nama_barang']; ?></td>
                            <td scope="row"><?php echo $tanggal_pinjam?></td>
                            <td scope="row"><?php echo $tanggal_kembali?></td>
                            <td scope="row"><?php echo $jumlah_pinjam?></td>
                            <td scope="row">
                                <?php
                                // Tentukan kelas berdasarkan status untuk memberikan warna yang berbeda
                                $badge_class = "";
                                switch ($status) {
                                    case 'Pending':
                                        $badge_class = "bg-warning";
                                        break;
                                    case 'Sedang Dipinjam':
                                        $badge_class = "bg-primary";
                                        break;
                                    case 'Sudah Dikembalikan':
                                        $badge_class = "bg-success";
                                        break;
                                    default:
                                        $badge_class = "bg-secondary";
                                        break;
                                }
                                ?>
                                <span class="badge <?php echo $badge_class; ?>"><?php echo $status; ?></span>
                            </td>
                            <td scope="row">
                                <a href="?op=edit&id_barang=<?php echo $id_barang?>"><button type="button"
                                        class="btn btn-warning">Edit</button></a>
                                <a href="?op=delete&id_barang=<?php echo $id_barang?>"
                                    onClick="return confirm('Sure, for delete data...?')"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
