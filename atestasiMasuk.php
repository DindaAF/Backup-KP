<?php include 'header.php'; ?>

<head>
	<link rel="stylesheet" type="text/css" href="assets/styles/atestasi.css">
	<script src="assets/js/main.js"></script>
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="./assets/js/atestasi.js"></script>
	<title>Atestasi Masuk</title>
</head>
<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="img/atestasi.jpg" data-speed="0.8"></div>
	<div class="home_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_title"><span>ATESTASI</span>MASUK</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section id="contact" class="wow fadeInUp">
	<div class="contact">
		<div class="container">
			<div class="section-header mb-3">
				<h3>FORM PENGAJUAN ATESTASI MASUK</h3>
			</div>
			<form action="" method="POST" enctype='multipart/form-data'>
				<label>Nama Lengkap</label>
				<input type="text" name="namaLengkap" placeholder="" id="nama" class="form-control" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"> </input>
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" rows="2" id="alamat" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"></textarea>
				<label>Email </label>
				<input type="email" class="form-control" name="email" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="email"> </input>
				<label>No Telp</label>
				<input type="number" name="noTelp" class="form-control" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"> </input>
				<label>No Whatsapp</label>
				<input type="number" name="noWA" class="form-control" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"> </input>
				<label>
					<font color="#696969">Agama</font>
				</label>
				<fieldset class="form-control">
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Kristen" required="required" name="agama" >
							<font color="#696969">Kristen</font>
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="NonKristen" name="agama">
							<font color="#696969">Non Kristen</font>
						</label>
					</div>
				</fieldset>
				<label>Pas Foto (jenis file jpeg/jpg/png besar file maksimum : 2Mb)</label>
				<input type="file" onchange="ValidateSize(this)" required name="pasFotoSingle" class="form-control"> </input>
				<label>Scan Akte Baptis/Sidi (jenis file jpeg/jpg/png besar file maksimum : 2Mb)</label>
				<input type="file" onchange="ValidateSize(this)" name="scanAkteBaptisSidi" class="form-control"> </input>
				<label>Gereja Asal</label>
				<input type="text" name="gerejaAsal" class="form-control"> </input>
				<label>Surat Keterangan/Atestasi Keluar dari Gereja Asal (jenis file jpeg/jpg/png besar file maksimum : 2Mb)</label>
				<input type="file" onchange="ValidateSize(this)" name="suratKeterangan" class="form-control"> </input>
				<label>Anggota Keluarga yang turut pindah (jika ada, masukkan nama, pas foto, dan scan Akte Baptis/Sidi)</label>
				<form name="add_name" id="add_name">
					<table class="table" id="dynamic_field">
						<tr class="form-group">
							<td>
								<input type="text" class="form-control" name="turutPindah[]" placeholder="Masukkan Nama">
							</td>
							<td>
								<input type="file" onchange="ValidateSize(this)" class="form-control" name="pasFoto[]">
							</td>
							<td>
								<input type="file" onchange="ValidateSize(this)" class="form-control" name="scanAkte[]">
							</td>
							<td>
								<button type="button" name="add" id="add" class="btn btn-success">+</button>
							</td>
						</tr>
					</table>
					<div class="modal-footer">
						<input type="submit" name="btnSaveAtestasi" class="btn btn-primary" value="Ajukan Atestasi">
					</div>
				</form>
			</form>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		var i = 1;
		$('#add').click(function() {
			i++;
			$('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="turutPindah[]" placeholder="Masukkan Nama" class="form-control " /></td><td><input type="file" onchange="ValidateSize(this)" name="pasFoto[]" placeholder="Masukkan Nama" class="form-control " /></td><td><input type="file" onchange="ValidateSize(this)" name="scanAkte[]" placeholder="Masukkan Nama" class="form-control " /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
		$('#btnSaveAtestasi').click(function() {
			$.ajax({
				url: "./controller/AtestasiController.php",
				method: "POST",
				data: $('#add_name').serialize(),
				success: function(data) {
					alert(data);
					$('#add_name')[0].reset();
				}
			});
		});
	});
	document.getElementById("nama").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
	});
	document.getElementById("alamat").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
	});
	document.getElementById("email").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
	});
	Filevalidation = () => {
        const fi = document.getElementById('file');
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                if (file >= 4096) {
                    alert(
                      "File terlalu besar");
                } else if (file < 2048) {
                    alert(
                      "File terlalu kecil");
                } else {
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';
                }
            }
        }
    }
	function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024;
        if (FileSize > 2) {
            alert('File Lebih Dari Batas Maksimum');
           $(file).val('');
        } else {

        }
    }
</script>
<?php include 'footer.php'; ?>