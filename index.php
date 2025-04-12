<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Rute Penerbangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container py-5">
    <div class="bg-light p-5 rounded shadow custom-box">
        <h1 class="mb-4 text-center title">Formulir Rute Penerbangan</h1>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Maskapai</label>
                <input type="text" name="maskapai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Bandara Asal</label>
                <select name="asal" class="form-select" required>
                    <option value="Soekarno-Hatta">Soekarno-Hatta</option>
                    <option value="Husein Sastranegara">Husein Sastranegara</option>
                    <option value="Abdul Rachman Saleh">Abdul Rachman Saleh</option>
                    <option value="Juanda">Juanda</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Bandara Tujuan</label>
                <select name="tujuan" class="form-select" required>
                    <option value="Ngurah Rai">Ngurah Rai</option>
                    <option value="Hasanuddin">Hasanuddin</option>
                    <option value="Inanwatan">Inanwatan</option>
                    <option value="Sultan Iskandar Muda">Sultan Iskandar Muda</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Tiket</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-success">Proses Tiket</button>
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $maskapai = $_POST['maskapai'];
            $asal = $_POST['asal'];
            $tujuan = $_POST['tujuan'];
            $harga = $_POST['harga'];

            // Pajak berdasarkan asal
            $pajak_asal = 0;
            switch ($asal) {
                case 'Soekarno-Hatta': $pajak_asal = 65000; break;
                case 'Husein Sastranegara': $pajak_asal = 50000; break;
                case 'Abdul Rachman Saleh': $pajak_asal = 40000; break;
                case 'Juanda': $pajak_asal = 30000; break;
            }

            // Pajak berdasarkan tujuan
            $pajak_tujuan = 0;
            switch ($tujuan) {
                case 'Ngurah Rai': $pajak_tujuan = 85000; break;
                case 'Hasanuddin': $pajak_tujuan = 70000; break;
                case 'Inanwatan': $pajak_tujuan = 90000; break;
                case 'Sultan Iskandar Muda': $pajak_tujuan = 60000; break;
            }

            $total = $harga + $pajak_asal + $pajak_tujuan;

            echo "<div class='result-box mt-5 p-4 border rounded'>";
            echo "<h4 class='text-primary mb-3'>Hasil Perhitungan</h4>";
            echo "<p><strong>Maskapai:</strong> $maskapai</p>";
            echo "<p><strong>Asal:</strong> $asal</p>";
            echo "<p><strong>Tujuan:</strong> $tujuan</p>";
            echo "<p><strong>Harga Tiket:</strong> Rp " . number_format($harga) . "</p>";
            echo "<p><strong>Pajak Asal:</strong> Rp " . number_format($pajak_asal) . "</p>";
            echo "<p><strong>Pajak Tujuan:</strong> Rp " . number_format($pajak_tujuan) . "</p>";
            echo "<p><strong>Total Bayar:</strong> Rp " . number_format($total) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>
