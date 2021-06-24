<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<style>
.custom-alert{
	width:100%;
	padding:4px 4px 4px 10px;
	border-radius: 10px;
}
.custom-alert-danger{
	background-color:#AFEEEE;
	color:#F0FFFF;
	border: 2px solid #F5F5DC;
}
</style>
</head>
<body>
<section class="statistics">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-12">
                    <form method="POST" enctype="multipart/form-data">
                </div>
    </section>
	<!--dimasukkin ke modal nnti-->
    <section class="statistics">
        <div class="container-fluid">
            <h3>Form Data Kematian</h3><br>
			<div class="custom-alert custom-alert-danger <?php echo isset($_GET["message"]) ? '' : 'd-none'  ?>" > <?php echo $_GET["message"] ?></div>
            <div class="row d-flex">
                <div class="col-lg-12">
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Jemaat</label>
                        <div class="col-sm-10">
                            <input type="text" id="nama" name="namaJemaat" class="form-control is-valid" placeholder="Masukkan Nama Jemaat">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Alamat Jemaat</label>
                        <div class="col-sm-10">
                         <textarea class="form-control is-valid" id="alamat" name="alamatJemaat" placeholder="Masukkan Alamat Jemaat"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Meninggal</label>
						<div class="col-sm-10">
						   <input type='date' class="form-control is-valid" name="tglMeninggal">
						</div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Penyebab Meninggal</label>
                        <div class="col-sm-10">
                            <input type="text" name="keterangan" id="keterangan" class="form-control is-valid" placeholder="Masukkan Keterangan">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Jenazah akan di </label>
                            <div class="col-sm-10">
                                <select name="roleKematian" class="form-control is-valid">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                  <?php
                                    /* @var $row RoleKematian */
                                    foreach($result2 as $row) {
                                        echo "<option value='".$row->getIdRolek()."'>".$row->getNama()."</option>";
                                    }
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal</label>
						<div class="col-sm-10">
						   <input type='date' class="form-control is-valid" name="tglPemakaman"/>						   
						</div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Lokasi</label>
                        <div class="col-sm-10">
                         <textarea class="form-control is-valid" id="lokasi" name="lokasiPemakaman" placeholder="Masukkan Alamat Lokasi"></textarea>
                      </div>
                    </div>
					
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Dilayani Oleh</label>
                        <div class="col-sm-10">
                            <input type="text" name="yangMelayani" id="melayani" class="form-control is-valid">
                        </div>
                    </div>
					<br>
                    <input type="submit" name="btnSaveKematian" class="btn btn-primary float-right" value="Simpan">
                </div>
            </div>
        </div>
        </form>
	</section>
	<hr>
	<div class="container-fluid">
		<br><h3>Data Kematian</h3><br>
			<table id="table_id" class="display" style="flex-shrink: 0; width:100%">
				<thead>
					<tr>
						<th>Nama Jemaat</th>
						<th>Tanggal Meninggal</th>
						<th>Lokasi Pemakaman</th>
						<th>Tanggal Pemakaman</th>
						<th>Dilayani Oleh</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row Kematian */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . $row->getNamaJemaat() . '</td>';
						echo '<td>' . date_format(date_create($row->getTglMeninggal()), 'd-M-Y') . '</td>';
						echo '<td>' . $row->getLokasiPemakaman() . '</td>';
						echo '<td>' . date_format(date_create($row->getTglPemakaman()), 'd-M-Y') . '</td>';
						echo '<td>' . $row->getYangMelayani() . '</td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
	document.getElementById("nama").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
		else if(this.value.length === 0 && e.which === 188) e.preventDefault();
	});
	document.getElementById("alamat").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
		else if(this.value.length === 0 && e.which === 188) e.preventDefault();
	});
	document.getElementById("keterangan").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
		else if(this.value.length === 0 && e.which === 188) e.preventDefault();
	});
	document.getElementById("lokasi").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
		else if(this.value.length === 0 && e.which === 188) e.preventDefault();
	});
	document.getElementById("melayani").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
		else if(this.value.length === 0 && e.which === 188) e.preventDefault();
	});
} );
</script>
<?php include 'footer-2.php'; ?>