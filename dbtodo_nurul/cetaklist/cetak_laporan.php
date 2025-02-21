<?php
include('../config.php');

if (isset($_POST['tanggal'])){
    $tanggal = $_POST['tanggal'];

    $query = "SELECT * FROM tbtodo WHERE jangkawaktu = '$tanggal' ORDER BY id ASC";
    $hasil = mysqli_query($mysqli, $query);
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity'sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH'crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' hre='https//fonts.googleapis.com/icon?family=Material+Icons'>
       <link href='../img/icon.png' rel='icon'><title>Aplikasi To-Do List</title>

        <style>
        @media print {
            button, a{
                display:none !important;
            }
        }
        </style>
    </head>
    <body>
        <div class='container mt-4'>
            <h2 class='text-center mb-4'>Laporan Harian To-Do List<br>$tanggal</h2>
            <table class='table table-boordered text-center table-striped'>
                <thead class='fw-bolder table-danger text-center'>
                    <tr>
                        <th>No</th>
                        <th>Tugas</th>
                        <th>Jangka Waktu</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>";

                $no = 1;
                while ($row =mysqli_fetch_array($hasil)){
                    echo "<tr>
                    <td class='text-center'>$no</td>
                    <td>{$row['tugas']}</td>
                    <td class='text center'>{$row['jangkawaktu']}</td>
                    <td class='text center'>{$row['keterangan']}</td>
                    </tr>";
                    $no++;
                }
                echo " </tbody>   
            </table>
            <div class='text-center mt-3'>
            <button onclick='window.print()' class='btn btn-primary'>
                <i class='fa fa-print'></i>   Cetak
            </button>
            <a href='../index.php?halaman=cetaklist' class='btn btn-secondary'>
                <i class='fa fa-arrow-left'></i>   Kembali
            </a>
            </div>
        </div>
         <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'</script>
    </body>
    </html>";
}
?>