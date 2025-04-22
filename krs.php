<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <!-- Navigasi -->
    <nav class="mb-4">
        <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
    </nav>

    <h2 class="mb-4">Input KRS</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="npm">Mahasiswa</label>
            <select name="npm" class="form-select" required>
                <option value="">Pilih Mahasiswa</option>
                <?php
                $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa");
                while ($m = mysqli_fetch_array($mhs)) {
                    echo "<option value='$m[npm]'>$m[nama]</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="kodemk">Mata Kuliah</label>
            <select name="kodemk" class="form-select" required>
                <option value="">Pilih Mata Kuliah</option>
                <?php
                $mk = mysqli_query($conn, "SELECT * FROM matakuliah");
                while ($m = mysqli_fetch_array($mk)) {
                    echo "<option value='$m[kodemk]'>$m[nama]</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        mysqli_query($conn, "INSERT INTO krs(mahasiswa_npm, matakuliah_kodemk) VALUES('$_POST[npm]', '$_POST[kodemk]')");
        echo "<div class='alert alert-success mt-3'>KRS berhasil disimpan!</div>";
    }
    ?>

    <h3 class="mt-5">Data KRS</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th><th>Nama Lengkap</th><th>Mata Kuliah</th><th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "
                SELECT m.nama AS nama_mhs, mk.nama AS nama_mk, mk.jumlah_sks
                FROM krs 
                JOIN mahasiswa m ON m.npm = krs.mahasiswa_npm 
                JOIN matakuliah mk ON mk.kodemk = krs.matakuliah_kodemk
            ");
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                    <td>$no</td>
                    <td>$data[nama_mhs]</td>
                    <td>$data[nama_mk]</td>
                    <td><span class='highlight'>$data[nama_mhs]</span> Mengambil Mata Kuliah <span class='highlight'>$data[nama_mk]</span> (<strong>{$data['jumlah_sks']} SKS</strong>)</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
