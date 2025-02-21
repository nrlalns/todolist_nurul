<div class="d-flex justify-content-center">
<div class="card shadow-lg" style="width: 22rem; border-radius: 10px;
background-color: #ffb6c1;">
    <img src="img/icon.png" class="card-img-top p-3" alt="Logo" style="border-radius: 10px;">
    <div class="card-body text-center">
        <h5 class="card-title text-white">Cetak Laporan Harian</h5>
        <form action="cetaklist/cetak_laporan.php" method="POST" clas="mt-3">
            <div class="mb-3">
                <input type="date" name="tanggal"class="form-control text-center" required>
            </div>
            <button type="submit" class="btn btn-lg w-100"style="background-color: #ffe4e1;">
                <i class="fa fa-print"></i>  Cetak Laporan
            </button>
        </form>
    </div>
</div>
</div>