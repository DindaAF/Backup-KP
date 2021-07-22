<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<br><h3>Persetujuan Atestasi Keluar</h3><br>
			<table id="table_id" class="display" style="flex-shrink: 0; width:100%">
				<thead>
					<tr>
						<th>Tanggal Pengajuan</th>
						<th>Nama Lengkap</th>
						<th>Status</th>
						<?php if (isset($_SESSION['role']) && $_SESSION['role']!= "majelis" ){ ?>
							<th>Tanggal Persetujuan</th>
							<th>Disetujui Oleh</th>
						<?php } ?>
						<th>Action</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row AtestasiKeluar */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . date_format(date_create( $row->getTglPengajuan()), 'd-M-Y') . '</td>';
						echo '<td>' . $row->getJemaat()->getNama() . '</td>';
						if($row->getStatus() == "Disetujui"){
							echo '<td bgcolor="#ADFF2F">' . $row->getStatus() . '</td>';
						}
						else{
							echo '<td bgcolor="#FF4500">' . $row->getStatus() . '</td>';
						}
						if (isset($_SESSION['role']) && $_SESSION['role']!= "majelis" ){
							echo '<td>' . date_format(date_create($row->getTglPersetujuan()), 'd-M-Y') . '</td>';
							echo '<td>' . $row->getUser()->getNama() . '</td>';
						}
						if (isset($_SESSION['role']) && $_SESSION['role']!= "tata usaha" ){
							echo '<td>';
							echo "<form method='POST'>";
							echo "<input type='hidden' name='idAtestasiK' value='".$row->getIdAtestasiK()."'>";
							if (isset($_SESSION['role']) && $_SESSION['role']!= "tata usaha" ){
								echo '<input class="btn btn-outline-success btn-sm" name="btnSetuju" value="Setujui" type="submit">
								<input class="btn btn-outline-danger btn-sm" name="btnCancel" value="Batal" type="submit">';
							}
						}
						echo "</form>";
						echo '</td>';	
						if (isset($_SESSION['role']) && $_SESSION['role']!= "majelis" ){
							echo '<td>';
							echo '<button class="btn btn-outline-success btn-sm" onclick="UploadBuktiAK(\''.$row->getIdAtestasiK().'\')">Upload</a> ';
							echo '</td>';
						}
						echo '<td>';
						echo '<button class="detail_atestasiK btn btn-outline-info btn-sm" data-id="'. $idAtestasiK = $row->getIdAtestasiK() .'">Lihat</button>';
						echo '</td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
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
	$(".detail_atestasiK").click(function(){
       var atestasiK = $(this).attr("data-id");   
       $.ajax({
            url: "./util/ajax.php",
            type: "POST",
            data: {atestasiK: atestasiK},
            success: function(response) {
               $('.modal-body').html(response);
			   $('#myModal').modal('show'); 
           }
         }); 

     });
} );
</script>
<?php include 'footer-2.php'; ?>