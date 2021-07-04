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
                    </div>
                </div>
			</div>
		</div>
        </form>
		<?php
        $servername     = "localhost";
		$database       = "gereja";
		$username       = "root";
		$password       = "";
		$conn = mysqli_connect($servername, $username, $password, $database);

        if(empty($_GET['dari']) or empty($_GET['ke'])){ 
            $query = "SELECT tbl_atestasikeluar.*, user.*, tbl_masterjemaat.*, tbl_gereja.id_gereja, tbl_gereja.nama AS nama_gereja, jemaat.id_user AS id_user_jemaat, jemaat.nama AS nama_jemaat, jemaat.username AS username_jemaat, jemaat.id_role AS id_role_jemaat FROM tbl_atestasikeluar LEFT JOIN user ON tbl_atestasikeluar.id_user = user.id_user LEFT JOIN tbl_gereja ON tbl_atestasikeluar.id_gereja = tbl_gereja.id_gereja LEFT JOIN tbl_masterjemaat ON tbl_atestasikeluar.id_jemaat = tbl_masterjemaat.id_jemaat LEFT JOIN user jemaat ON tbl_masterjemaat.iduser = jemaat.id_user";
            $url_cetak = "printKeluar.php";
        }else{
            $query = "SELECT tbl_atestasikeluar.*, user.*, tbl_masterjemaat.*, tbl_gereja.id_gereja, tbl_gereja.nama AS nama_gereja, jemaat.id_user AS id_user_jemaat, jemaat.nama AS nama_jemaat, jemaat.username AS username_jemaat, jemaat.id_role AS id_role_jemaat FROM tbl_atestasikeluar LEFT JOIN user ON tbl_atestasikeluar.id_user = user.id_user LEFT JOIN tbl_gereja ON tbl_atestasikeluar.id_gereja = tbl_gereja.id_gereja LEFT JOIN tbl_masterjemaat ON tbl_atestasikeluar.id_jemaat = tbl_masterjemaat.id_jemaat LEFT JOIN user jemaat ON tbl_masterjemaat.iduser = jemaat.id_user WHERE (tglPengajuan BETWEEN '".$_GET['dari']."' AND '".$_GET['ke']."')";
            $url_cetak = "printKeluar.php?dari=".$_GET['dari']."&ke=".$_GET['ke']."&cari=true";
        }
        ?>
		<?php if (isset($_SESSION['role']) && $_SESSION['role']!= "majelis" ){ ?>
			<div style="margin-top: 5px;">
				<a class="btn btn-primary" name="print" href="<?php echo $url_cetak ?>">Print</a>
			</div>
		<?php } ?>
		<div class="row mt-3">
            <div class="col-md-12">
			<table id="table_id" class="table table-striped">
				<thead>
					<tr>
						<th>Nomor Atestasi</th>
						<th>Tanggal Pengajuan</th>
						<th>Status</th>
						<th>Alamat Baru</th>
					</tr>
				</thead>
				<tbody>
				<?php
                    $sql = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($sql);
                    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        while($d = mysqli_fetch_array($sql)){
                            echo "<tr>";
                            echo "<td>".$d['noAtestasi']."</td>";
							echo "<td>".date_format(date_create($d['tglPengajuan']), 'd-M-Y')."</td>";
                            echo "<td>".$d['status']."</td>";
                            echo "<td>".$d['jemaatAlamatBaru']."</td>";
                            echo "</tr>";
                        }
                    }else{ // Jika data tidak ada
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    }
                ?>
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