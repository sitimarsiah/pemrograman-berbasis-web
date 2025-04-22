<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
       <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
    <h2 class="mb-4">Input Mahasiswa</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <input type="text" name="npm" class="form-control" placeholder="NPM" required>
        </div>
        <div class="mb-3">
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>
        <div class="mb-3">
            <select name="jurusan" class="form-select">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Operasi">Sistem Operasi</option>
            </select>
        </div>
        <div class="mb-3">
            <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        mysqli_query($conn, "INSERT INTO mahasiswa VALUES (
            '$_POST[npm]', '$_POST[nama]', '$_POST[jurusan]', '$_POST[alamat]')");
        echo "<div class='alert alert-success mt-3'>Data berhasil ditambahkan!</div>";
    }
    ?>
    <h3 class="mt-5">Data Mahasiswa</h3>
    <table class="table table-bordered">
        <tr><th>NPM</th><th>Nama</th><th>Jurusan</th><th>Alamat</th></tr>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
        while ($d = mysqli_fetch_array($data)) {
            echo "<tr>
                <td>$d[npm]</td><td>$d[nama]</td><td>$d[jurusan]</td><td>$d[alamat]</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>