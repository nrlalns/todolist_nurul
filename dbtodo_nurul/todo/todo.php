<?php
include "config.php";
if (isset($_POST['cari'])) {
  $cari=$_POST['cari'];
  $sql=" SELECT * FROM tbtodo WHERE tugas LIKE '%$cari%'";
}else{
  $sql="SELECT * FROM tbtodo LIMIT 0,5;";
}

if (isset($_GET['star'])) {
  $star= $_GET['star'];
  $sql="SELECT * FROM tbtodo LIMIT $star,5;";
}

$hasil= mysqli_query($mysqli,$sql);
$sql2= "SELECT * FROM tbtodo";
$hasil2= mysqli_query($mysqli,$sql2);
$jlhdata=mysqli_num_rows($hasil2);
$perulangan=$jlhdata/5;
?>
<!-- Alert -->
<?php 
  if (isset($_GET['pesan_tambah'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert"style="background-color:#ffb6c1; color:white;">
    <strong>Berhasil ditambah!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
  }

  if (isset($_GET['pesan_edit'])) {
    ?>
    <div class="alert alert-<?php echo $_GET['pesan_edit']=='berhasil'?'success':'danger' ;?> alert-dismissible fade show" role="alert"style="background-color:#ffb6c1;color:white;">
    <strong><?php echo $_GET['pesan_edit']=='berhasil'?'Berhasil':'Gagal' ;?> diedit!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
  }

  if (isset($_GET['pesan_hapus'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert"style="background-color:#ffb6c1;color:white;">
    <strong>Berhasil dihapus!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
  }
 ?>
 <!-- Font Link w3school -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Checkbox -->
    <script>
    function updatestatus(id, checkbox) {
      var status = checkbox.checked ? "Selesai" : "Belum Selesai";

      $.ajax({
        url: 'update_status.php',
        type: 'POST',
        data: {id: id, keterangan: status},
        success: function(response){
          if (response.trim() === "success"){
            document.getElementById('status-' + id).innerText = status;
          }else{
            alert('Gagal memperbarui status!');
            checkbox.checked = !checkbox.checked;
          }
        },
        error: function(){
          alert('Terjadi kesalahan, coba lagi!');
          checkbox.checked = !checkbox.checked;
        }
      });
    }
   // Validasi dan ubah warna tombol
   $(document).ready(function() {
  const formTambah = $("#exampleModal form");
  const tugasInput = formTambah.find("input[name='tugas']");
  const deadlineInput = formTambah.find("input[name='jangkawaktu']");
  const tombolSimpan = formTambah.find("button[type='submit']");
  const errorTugas = formTambah.find("#error-tugas");
  const errorDeadline = formTambah.find("#error-deadline");

  function cekForm() {
    if (tugasInput.val().length < 5 || !deadlineInput.val()) {
      tombolSimpan.prop("disabled", true).css("background-color", "#ffe4e1"); // Warna saat belum valid
      if (tugasInput.val().length < 5) {
        errorTugas.text("Tugas minimal harus terdiri dari 5 huruf.");
      } else {
        errorTugas.text("");
      }
      if (!deadlineInput.val()) {
        errorDeadline.text("Jangka Waktu wajib diisi.");
      } else {
        errorDeadline.text("");
      }
    } else {
      tombolSimpan.prop("disabled", false).css("background-color", "#ffb6c1"); // Warna saat valid
      errorTugas.text("");
      errorDeadline.text("");
    }
  }
  tugasInput.on("input", cekForm);
  deadlineInput.on("input", cekForm);
  cekForm(); // Panggil saat dokumen ready

  formTambah.on("submit", function(event) {
    if (tugasInput.val().length < 5 || !deadlineInput.val()) {
      event.preventDefault();
      cekForm();
    }
  });
});
    </script>
    <style>
        /* Style untuk pesan error */
        #error-tugas {
            color: red;
            font-size: small;
        }
        #error-deadline {
            color: red;
            font-size: small; 
        }
    </style>
<h2 style="font-weight: bold">Tabel To-Do List</h2>

<!-- Button trigger modal -->
<button style="float: right; border: 2px solid white; background-color:#ffb6c1; color:white;" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
   <i class="fa fa-plus"></i> Tambah
</button>
<br>
<br>
<form action="index.php?halaman=todo" method="POST">
<div class="row d-flex justify-content-end mb-2">
  <div class="col-2" >
    <input type="text" name="cari" placeholder="Cari" class="col-12 form-control"style="background-color:#ffb6c1;">
  </div>
  <div class="col-1" >
    <button type="submit" class="10 form-control" title="cari" style="float: right; border: 2px solid white; background-color:#ffb6c1; color:white;">
      <i class="fa fa-search"></i>  Cari
    </button>
  </div>
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-body" id="exampleModalLabel">Tambah Tugas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="todo/aksi_tambah_todo.php">
      <div class="modal-body">
        <div class="mb-3">
	  <label class="form-label text-body">Tugas</label>
	  <input type="text" class="form-control" placeholder="Tugas" name="tugas">
    <span id="error-tugas"></span>
	</div>
	<div class="mb-3">
	  <label class="form-label text-body">Jangka Waktu</label>
	  <input type="date" class="form-control" name="jangkawaktu">
    <span id="error-deadline"></span>
	</div>
	<div class="mb-3">
	  <label class="form-label text-body">Keterangan</label>
	  <select class="form-control" name="keterangan">
	  	<option>Belum Selesai</option>
	  	<option>Selesai</option>
	  </select>
	</div>
      </div>
      <div class="modal-footer">
        <button style="background-color:#ffe4e1" type="button" class="btn" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<table border="1" class="table table-bordered text-center">
        <tr class=" fw-bolder text-center">
        <td>No</td>
        <td>List Tugas</td>
        <td>Jangka Waktu</td>
        <td>Keterangan</td>
        <td>Aksi</td>
        </tr></div>
        
        <?php
        $no=1;
        if(mysqli_num_rows(result: $hasil)> 0)
        while ($row= mysqli_fetch_array(result: $hasil)) {
        echo "<tr>
          <td>$no</td>
          <td>$row[tugas]</td>
          <td>$row[jangkawaktu]</td>
          <td>
        <input type='checkbox' onclick='updateStatus($row[id], this)'" . ($row['keterangan'] == 'Selesai' ? 'checked' : '') . ">
        <span id='status-$row[id]'>$row[keterangan]</span>
        </td>
          <td>
            <a class='btn btn-warning fa fa-pencil' href='index.php?halaman=edit_todo&id=$row[id]'> Edit</a>"?>
            <a class='btn btn-danger fa fa-trash'  href='todo/aksi_hapus_todo.php?id=<?=$row['id']?>' 
            onclick='return confirm("are you sure?")'> Hapus</a>
          </td>
          <?php
        echo
        "</tr>";
        $no++;
        }else{
          echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan.</td></tr>";
        }
        ?>
</table>
      
<?php if (isset($_POST['cari']) && !empty(trim($_POST['cari']))) { ?>
  <div class="d-flex justify-content-right mb-2">
    <a href="index.php?halaman=todo" class="btn btn-primary border-light px-3" style="background-color:#ffb6c1;" >
      <i class="fa fa-arrow-left"></i> Kembali ke List Tugas
    </a>
  </div>
  <?php } ?>

<!-- Previous -->
<div class="d-flex justify-content-end">
<nav aria-label="Page navigation example">
  <ul class="pagination" >
    <li class="page-item"><a class="page-link" href="#"style="background-color:#ffb6c1; color:white;">Previous</a></li>
    <?php 
    $page=0;
      for ($i=0; $i < $perulangan; $i++) { 
        ?>
         <li class="page-item"><a class="page-link" href="index.php?halaman=todo&star=<?= $page ?>"
         style="background-color:#ffb6c1; color:white;"><?=$i+1?></a></li>
        <?php 
        $page+=5;
      }
     ?>
     <li class="page-item <?php if ($star + 5 >= $jlhdata) echo 'disabled'; ?>">
     <a class="page-link" href="<?php if ($star + 5 < $jlhdata) echo "index.php?halaman=todo&star=" . 
     ($star + 5); ?>" style="background-color:#ffb6c1; color:white;">Next</a></li>
  </ul>
</nav>
</div>