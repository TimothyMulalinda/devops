<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'operator') {
    header('Location: index.php');
    exit;
}

// Koneksi ke database
$koneksi = new mysqli('localhost', 'phpmyadmin', 'T1m0thy_', 'stocktrack');
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Fungsi untuk melakukan pencarian barang
function cariBarang($koneksi, $keyword)
{
    $sql = "SELECT * FROM db_barang WHERE nama_barang LIKE '%$keyword%'";
    $result = $koneksi->query($sql);
    return $result;
}

// Fungsi untuk menambahkan data peminjaman
function tambahPeminjaman($koneksi, $id_barang, $tanggal_pinjam, $tanggal_kembali, $jumlah_pinjam, $status)
{

    $sql = "INSERT INTO db_pinjaman (id_barang, tanggal_pinjam, tanggal_kembali, jumlah_pinjam, status) VALUES ('$id_barang', '$tanggal_pinjam', '$tanggal_kembali', '$jumlah_pinjam', '$status')";
    $result = $koneksi->query($sql);
    return $result;
}

// Fungsi untuk menampilkan riwayat peminjaman dengan status
function tampilRiwayat($koneksi)
{
    $sql = "SELECT db_pinjaman.*, db_barang.nama_barang FROM db_pinjaman JOIN db_barang ON db_pinjaman.id_barang = db_barang.id_barang";
    $result = $koneksi->query($sql);
    return $result;
}

// Proses form peminjaman
if (isset($_POST['submit'])) {
    $id_barang = $_POST['nama_barang'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $jumlah_pinjam = $_POST['jumlah_pinjam'];
    $status = "Pending"; // Set status default menjadi Pending
	

// Panggil fungsi tambahPeminjaman
    if (tambahPeminjaman($koneksi, $id_barang, $tanggal_pinjam, $tanggal_kembali, $jumlah_pinjam, $status)) {
        echo "<script>alert('Peminjaman berhasil ditambahkan');</script>";
    } else {
        echo "<script>alert('Peminjaman gagal ditambahkan');</script>";
    }
}

// Proses pencarian barang
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $result = cariBarang($koneksi, $keyword);
} else {
    // Jika tidak ada kata kunci pencarian, ambil semua data barang
    $sql = "SELECT * FROM db_barang";
    $result = $koneksi->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventaris - Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="bg-gradient">
    <br> <br>
    <div class="container mx-auto">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Sistem Inventaris</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <!-- Tautan Logout -->
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Formulir Peminjaman Barang -->
        <div class="card">
            <div class="card-header text-white bg-dark">
                Formulir Peminjaman Barang
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="nama_barang" name="nama_barang">
                                <?php
                                $sql = "SELECT id_barang, nama_barang FROM db_barang";
                                $result_barang = $koneksi->query($sql);
                                if ($result_barang->num_rows > 0) {
                                    while ($row = $result_barang->fetch_assoc()) {
                                        echo "<option value='" . $row["id_barang"] . "'>" . $row["nama_barang"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jumlah_pinjam" class="col-sm-2 col-form-label">Jumlah Pinjam</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-gradient">Submit</button>
                </form>
            </div>
        </div>

        <!-- Daftar Barang Tersedia -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Daftar Barang Tersedia
            </div>
            <div class="card-body">
                <div class="search-bar">
                    <form action="#" method="GET">
                        <input type="text" class="form-control" placeholder="Cari Barang..." name="search">
                        <button type="submit" class="btn btn-secondary">Cari</button>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter++ . "</td>";
                                echo "<td>" . $row["nama_barang"] . "</td>";
                                echo "<td>" . $row["kategori"] . "</td>";
                                echo "<td>" . $row["jumlah"] . "</td>";
                                echo "<td>" . $row["lokasi"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Riwayat Peminjaman -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Riwayat Peminjaman
            </div>
            <div class="card-body">
                <!-- Tampilkan riwayat peminjaman -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Jumlah Pinjam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $riwayat = tampilRiwayat($koneksi);
                        if ($riwayat && $riwayat->num_rows > 0) {
                            $counter = 1;
                            while ($row = $riwayat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter++ . "</td>";
                                echo "<td>" . $row["nama_barang"] . "</td>";
                                echo "<td>" . $row["tanggal_pinjam"] . "</td>";
                                echo "<td>" . $row["tanggal_kembali"] . "</td>";
                                echo "<td>" . $row["jumlah_pinjam"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Tidak ada riwayat peminjaman</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
