<?php
$total_bayar = 0;
$no_parkir = "";
$no_kendaraan = "";
$jenis = "";
$lama_parkir = 0;
$nama_petugas = "";

if(isset($_POST['submit'])){
    $no_parkir = $_POST['no_parkir'];
    $no_kendaraan = $_POST['no_kendaraan'];
    $jenis = $_POST['jenis_kendaraan'] ?? '';
    $lama_parkir = $_POST['lama_parkir'];
    $nama_petugas = $_POST['nama_petugas'];

    $tarif_pertama = 0;
    $tarif_lanjut = 0;

    if($jenis == "motor"){
        $tarif_pertama = 3000;
        $tarif_lanjut = 2000;
    }else if($jenis == "mobil"){
        $tarif_pertama = 5000;
        $tarif_lanjut = 3000;
    }else if ($jenis == "truk"){
        $tarif_pertama = 7000;
        $tarif_lanjut = 3000;
    }

    if($lama_parkir <= 1){
        $total_bayar = $tarif_pertama;
    }else{
        $sisa_jam = $lama_parkir - 1;
        $total_bayar = $tarif_pertama + ($sisa_jam * $tarif_lanjut);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>STRUK PARKIR</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #eef2f3; 
                margin: 0;
                padding: 40px 0;
            }
            .container {
                max-width: 450px;
                background: #ffffff;
                padding: 30px;
                margin: auto; 
                border-radius: 12px;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            }
            h2 {
                text-align: center;
                color: #333;
                margin-top: 0;
            }
            label {
                font-weight: bold;
                color: #444;
                display: block;
                margin-top: 12px;
            }
            input[type="text"], input[type="number"], select {
                width: 100%;
                padding: 10px;
                margin-top: 6px;
                border: 1px solid #ccc;
                border-radius: 6px;
                box-sizing: border-box;
                font-size: 14px;
            }
            button {
                width: 100%;
                background-color: rgb(63, 127, 196);
                color: white;
                padding: 12px;
                border: none;
                border-radius: 6px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                margin-top: 20px;
            }
            button:hover {
                background-color: #0056b3;
            }
           
            .struk {
                margin-top: 25px;
                background: rgb(81, 146, 206); 
                border: 2px dashed rgb(0, 0, 0); 
                padding: 20px;
                border-radius: 8px;
            }
            .struk h3 {
                text-align: center;
                color: #333;
                margin-top: 0;
            }
            .total {
                text-align: center;
                color: rgb(255, 13, 4);
                font-size: 18px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <h2>FORM PARKIR</h2>
            
            <form method="post">
                <label>No Parkir:</label>
                <input type="text" name="no_parkir" required>

                <label>No Kendaraan:</label>
                <input type="text" name="no_kendaraan" required>

                <label>Jenis Kendaraan:</label>
                <select name="jenis_kendaraan" required>
                    <option value="">--- JENIS KENDARAAN ---</option>
                    <option value="motor">MOTOR</option>
                    <option value="mobil">MOBIL</option>
                    <option value="truk">TRUK</option>
                </select>

                <label>Lama Parkir (Jam):</label>
                <input type="number" name="lama_parkir" required>

                <label>Nama Petugas:</label>
                <input type="text" name="nama_petugas" required>

                <button type="submit" name="submit">SUBMIT</button>
            </form>

            <!-- Bagian Struk Hasil Perhitungan -->
            <?php if(isset($_POST['submit'])){ ?>
                <div class="struk">
                    <h3>STRUK PARKIR</h3>
                    <p><b>No Parkir :</b> <?php echo $no_parkir; ?></p>
                    <p><b>No Kendaraan :</b> <?php echo $no_kendaraan; ?></p>
                    <p><b>Jenis Kendaraan :</b> <?php echo ucfirst($jenis); ?></p>
                    <p><b>Lama Parkir :</b> <?php echo $lama_parkir; ?> Jam</p>
                    <p><b>Nama Petugas :</b> <?php echo $nama_petugas; ?></p>
                    <hr>
                    <p class="total">JUMLAH TOTAL BAYAR:<br>Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></p>
                </div>
            <?php } ?>
        </div>

    </body>
</html>