<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
    <h2 class="mb-4">Input Mata Kuliah</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <input type="text" name="kodemk" class="form-control" placeholder="Kode MK" required>
        </div>
        <div class="mb-3">
            <input type="text" name="nama" class="form-control" placeholder="Nama MK" required>
        </div>
        <div class="mb-3">
            <input type="number" name="jumlah_sks" class="form-control" placeholder="Jumlah SKS" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        mysqli_query($conn, "INSERT INTO matakuliah VALUES (
            '$_POST[kodemk]', '$_POST[nama]', '$_POST[jumlah_sks]')");
        echo "<div class='alert alert-success mt-3'>Data berhasil ditambahkan!</div>";
    }
    ?>
    <h3 class="mt-5">Data Mata Kuliah</h3>
    <table class="table table-bordered">
        <tr><th>Kode MK</th><th>Nama MK</th><th>Jumlah SKS</th></tr>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM matakuliah");
        while ($d = mysqli_fetch_array($data)) {
            echo "<tr>
                <td>$d[kodemk]</td><td>$d[nama]</td><td>$d[jumlah_sks]</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>