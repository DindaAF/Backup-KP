<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<?php 
    $servername     = "localhost";
    $database       = "gereja";
    $username       = "root";
    $password       = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
	if(isset($_GET['dari']) && isset($_GET['ke'])){
		$data = mysqli_query($conn, "SELECT * FROM tbl_atestasimasuk WHERE tglPengajuan BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
		$url_cetak = "print.php?dari=".$_GET['dari']."&ke=".$_GET['ke']."&cari=true";
	}else{
		$data = mysqli_query($conn, "SELECT * from tbl_atestasimasuk");		
	}
?>
<?php
 if(isset($_GET['print'])){
    if(empty($_GET['dari']) || empty($_GET['ke'])){
        ?>
        <script language="JavaScript">
            alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
            document.location='index.php?menu=laporanmasuk';
        </script>
        <?php
        }
    }
?>
	<div class="container-fluid">
		<br>
		<div class="row">
        <form method="GET">
		<input type="hidden" class="form-control" name="menu" value="<?php echo $_GET["menu"]; ?>">
			<div class="col-md-12">
				<div class="row">
                    <div class="col-auto">
                        <label class="col-form-label">Tanggal</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" value="<?php echo $_GET["dari"] ?>" required>
                    </div>
                    <div class="col-auto">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" value="<?php echo $_GET["ke"] ?>" required>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" name="cari" value="true" type="submit">Cari</button>
						<?php if (isset($_SESSION['role']) && $_SESSION['role']!= "majelis" ){ ?>
							<a class="btn btn-primary" type="submit" name="print" value="<?php echo $_GET["print"] ?>" href="<?php echo $url_cetak ?>">Print</a>
						<?php } ?>
                    </div>
                </div>
			</div>
		</div>
        </form>
		<div class="row mt-3">
            <div class="col-md-12">
			<table id="table_id" class="table table-striped">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Tanggal Pengajuan</th>
						<th>Nama Lengkap</th>
						<th>Status</th>
						<th>Asal Gereja</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					while($d = mysqli_fetch_array($data)){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date_format(date_create($d['tglPengajuan']), 'd-M-Y'); ?></td>
                        <td><?php echo $d['namaLengkap']; ?></td>
                        <td><?php echo $d['status']; ?></td>
                        <td><?php echo $d['gerejaAsal']; ?></td>
                    </tr>
                <?php } ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</body>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 <script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<?php include 'footer-2.php'; ?>