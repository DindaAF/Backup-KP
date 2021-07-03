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
            <h3>Upload Bukti Atestasi Masuk</h3><br>
            <div class="row d-flex">
                <div class="col-lg-12">
					<div class="form-group row has-success">
                        <label class="col-sm-2 form-control-label">Bukti Atestasi</label>
                        <div class="col-sm-10">
                            <input type="file" name="buktiAM" onchange="ValidateSize(this)" class="form-control is-valid" name="buktiAM" accept="image/png, image/jpeg, file/pdf"/>
                        </div>
                    </div>
					<br>
                    <input type="submit" name="btnSaveBukti" class="btn btn-primary float-right" value="Simpan">
                </div>
            </div>
        </div>
        </form>
	</section>
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