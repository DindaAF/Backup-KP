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
    <section class="statistics">
        <div class="container-fluid">
            <h3>Form Data Kelahiran</h3><br>
			<div class="custom-alert custom-alert-danger <?php echo isset($_GET["message"]) ? '' : 'd-none'  ?>" > <?php echo $_GET["message"] ?></div>
            <div class="row d-flex">
                <div class="col-lg-12">
                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nomor Akte</label>
                        <div class="col-sm-10">
                            <input type="text" id="noAkte" name="noAkte" class="form-control is-valid" placeholder="Masukkan Nomor Akte">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Ayah</label>
                        <div class="col-sm-10">
                            <input type="text" id="nama" name="namaAyah" class="form-control is-valid" placeholder="Masukkan Nama Ayah">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Ibu</label>
                        <div class="col-sm-10">
                            <input type="text" id="nama" name="namaIbu" class="form-control is-valid" placeholder="Masukkan Nama Ibu">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Anak</label>
                        <div class="col-sm-10">
                            <input type="text" id="nama" name="namaAnak" class="form-control is-valid" placeholder="Masukkan Nama Anak">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="radio" name="jk" value="L" checked>&nbsp Laki-laki &nbsp
                            <input type="radio" name="jk" value="P">&nbsp Perempuan &nbsp
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Lahir</label>
						<div class="col-sm-10">
						   
						   <input type='date' class="form-control is-valid" name="tglLahir">
						   
						</div>
						
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Golongan Darah</label>
                        <div class="col-sm-10">
                            <input type="radio" name="goldar" value="A" checked>&nbsp A &nbsp
                            <input type="radio" name="goldar" value="B">&nbsp B &nbsp
                            <input type="radio" name="goldar" value="AB">&nbsp AB &nbsp
                            <input type="radio" name="goldar" value="O">&nbsp O &nbsp
                            <input type="radio" name="goldar" value="Tidak Diketahui">&nbsp Tidak Diketahui &nbsp
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Pelapor</label>
                        <div class="col-sm-10">
						<input type="hidden" id="nama" name="idPelapor" value ="<?php echo $_SESSION['userid']; ?>" >
							<?php 
								echo '<input type="text" name="namaPelapor" class="form-control is-valid"  readonly value =' . $_SESSION['nama'] . '>';
							?>
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Pelapor</label>
						<div class="col-sm-10">
						   <input type='date' class="form-control is-valid" name="tglPelapor"/>
						</div>
						
                    </div>
					<br>
                    <input type="submit" name="btnSaveKelahiran" class="btn btn-primary float-right" value="Simpan">
                </div>
            </div>
        </div>
        </form>
	</section>
	<div class="container-fluid">
		<br><h3>Data Kelahiran</h3><br>
			<table id="table_id" class="display" style="flex-shrink: 0; width:100%">
				<thead>
					<tr>
						<th>Nomor Akte</th>
						<th>Nama Anak</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Nama Pelapor</th>
						<th>Tanggal Pelapor</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row Kelahiran */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . $row->getNoAkte() . '</td>';
						echo '<td>' . $row->getNamaAnak() . '</td>';
						echo '<td>' . date_format(date_create($row->getTglLahir()), 'd-M-Y') . '</td>';
						echo '<td>' . $row->getJK() . '</td>';
						echo '<td>' . $row->getUser()->getNama() . '</td>';
						echo '<td>' . date_format(date_create($row->getTglPelapor()), 'd-M-Y') . '</td>';
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
	document.getElementById("noAkte").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
		else if(this.value.length === 0 && e.which === 188) e.preventDefault();
	});
} );
</script>
<?php include 'footer-2.php'; ?>