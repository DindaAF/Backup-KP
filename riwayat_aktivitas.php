<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/jquery.dataTables.css"/><link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/dataTables.semanticui.css"/>
</head>
<body>
	<div class="card-body">
		<h3>Riwayat Aktivitas Anda</h3>
			<div class="form-group row has-success">
				<label class="col-sm-2 form-control-label">Rentang Waktu : </label>
				<div class="col-sm-4">
					<select name="pekerjaan" class="form-control is-valid">
						<option>1 pekan terakhir</option>
						<option>1 bulan terakhir</option>
						<option>3 bulan terakhir</option>
						<option>Semua</option>
					</select>
				</div>
			</div>
			<table id="table_id" class="display">
				<thead>
					<tr>
						<th>Nama Kegiatan</th>
						<th>Tanggal mulai</th>
						<th>Tanggal berakhir</th>
						<th>Jabatan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row Aktivitas */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . $row->getNama_kegiatan() . '</td>';
						echo '<td>' . date_format(date_create($row->getTanggalMulai()), 'd M Y') . '</td>';
						echo '<td>' . date_format(date_create($row->getTanggalSelesai()), 'd M Y') . '</td>';
						echo '<td><button class="actinfo" data-id="'. $id = $row->getId_kegiatan() .'">Detail</button></td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>

 <script>
$(document).ready( function () {
    $('#table_id').DataTable({"dom": '<f<t>>'});
} );</script>
<?php include 'footer-2.php'; ?>