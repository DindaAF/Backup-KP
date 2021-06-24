<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/jquery.dataTables.css"/><link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/dataTables.bootstrap.css"/>
</head>
<body>
	<div class="card-body">
		<h3>PERSETUJUAN ATESTASI MASUK</h3>
			<table id="table_id" class="display" style="flex-shrink: 0; width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>No Atestasi Masuk</th>
						<th>Tanggal Pengajuan</th>
						<th>Nama</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row AtestasiMasuk */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . $row->getIdAtestasiM() . '</td>';
						echo '<td>' . $row->getNoAtestasi() . '</td>';
						echo '<td>' . $row->getTanggalPengajuan() . '</td>';
						echo '<td><button class="detail_atestasi" data-id="'. $idAtestasiM = $row->getIdAtestasiM().'">Detail</button></td>';
						echo '<td><button class="btn btn--radius-2 btn--blue" onclick="">Update</button>
						<button class="btn btn--radius-2 btn--blue" onclick="">Delete</button></td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>-->
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
    $('#table_id').DataTable({"dom": '<f<t>>'});
	$(".detail_atestasi").click(function(){
       var atestasi_ID = $(this).attr("data-id");   
       $.ajax({
            url: "./util/ajax.php",
            type: "POST",
            data: {atestasi_ID: atestasi_ID},
            success: function(response) {
               $('.modal-body').html(response);
			   $('#myModal').modal('show'); 
           }
         }); 

     });
} );</script>
<?php include 'footer-2.php'; ?>