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
	<div class="container-fluid">
		<br><h3>Riwayat Atestasi Masuk</h3><br>
			<table id="table_id" class="display" style="flex-shrink: 0; width:100%">
				<thead>
					<tr>
						<th>Tanggal Pengajuan</th>
						<th>Tanggal Persetujuan</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row AtestasiMasuk */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . date_format(date_create( $row->getTglPengajuan()), 'd-M-Y') . '</td>';
						echo '<td>' . date_format(date_create($row->getTglPersetujuan()), 'd-M-Y') . '</td>';
						echo '<td>' . $row->getStatus() . '</td>';
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
	Filevalidation = () => {
        const fi = document.getElementById('file');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 4096) {
                    alert(
                      "File too Big, please select a file less than 4mb");
                } else if (file < 2048) {
                    alert(
                      "File too small, please select a file greater than 2mb");
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
            alert('File Lebih Dari 2 MB');
           $(file).val('');
        } else {

        }
    }
} );
</script>
<?php include 'footer-2.php'; ?>