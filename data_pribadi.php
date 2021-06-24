<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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
            <h3>Form Data Pribadi</h3><br>
            <div class="row d-flex">
                <div class="col-lg-12">
                    <div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nomor Jemaat</label>
                        <div class="col-sm-10">
                            <input type="text" name="jemaatNomor" class="form-control is-valid" placeholder="Masukkan Nomor Jemaat">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" name="idAtestasiM" class="form-control is-valid" disabled>
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Tanggal Lahir</label>
						<div class="col-sm-10">
						   
						   <input type='date' class="form-control is-valid" name="jemaatTglLahir">
						   
						</div>
						
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">ID Ayah</label>
                        <div class="col-sm-10">
                            <input type="text" name="jemaatAyahID" class="form-control is-valid">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Ayah</label>
                        <div class="col-sm-10">
                            <input type="text" name="jemaatAyahNama" class="form-control is-valid" placeholder="Masukkan Nama Ayah">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">ID Ibu</label>
                        <div class="col-sm-10">
                            <input type="text" name="jemaatIbuID" class="form-control is-valid">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Nama Ibu</label>
                        <div class="col-sm-10">
                            <input type="text" name="jemaatIbuNama" class="form-control is-valid" placeholder="Masukkan Nama Ibu">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Status Nikah</label>
                        <div class="col-sm-10">
                            <input type="text" name="jemaatStatusNikah" class="form-control is-valid">
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="radio" name="jemaatGender" value="L" checked>&nbsp Laki-laki &nbsp
                            <input type="radio" name="jemaatGender" value="P">&nbsp Perempuan &nbsp
                        </div>
                    </div>
					
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Golongan Darah</label>
                        <div class="col-sm-10">
                            <input type="radio" name="jemaatGoldar" value="A" checked>&nbsp A &nbsp
                            <input type="radio" name="jemaatGoldar" value="B">&nbsp B &nbsp
                            <input type="radio" name="jemaatGoldar" value="AB">&nbsp AB &nbsp
                            <input type="radio" name="jemaatGoldar" value="O">&nbsp O &nbsp
                            <input type="radio" name="jemaatGoldar" value="Tidak Diketahui">&nbsp Tidak Diketahui &nbsp
                        </div>
                    </div>
					<br>
                    <input type="submit" name="btnSaveKelahiran" class="btn btn-primary float-right" value="Simpan">
                </div>
            </div>
        </div>
        </form>
	</section>
</body>
<?php include 'footer-2.php'; ?>