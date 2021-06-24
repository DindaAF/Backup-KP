<?php 
include'header-2.php'; ?>
      <section class="statistics">
        <div class="container-fluid">
          <div class="row d-flex">
            <div class="col-lg-12">
              <form method="POST" enctype="multipart/form-data">
        </div>
      </section>
       <section class="statistics">
        <div class="container-fluid">
		  <h3>PENGAJUAN ATESTASI KELUAR</h3>
          <div class="row d-flex">
            <div class="col-lg-12">
			
			<?php 
			if($pengguna != false){
				if($pernahMengajukan == false){
				?>
				<div class="form-group row has-success">
                      <?php 
                        echo '<label class="col-sm-2 form-control-label" hidden>Nomor Jemaat</label><div class="col-sm-10">
						<input type="text" name="jemaatNomor" hidden class="form-control is-valid" readonly value='.$pengguna->getJemaatNomor().'></div>';
                            	
					?>
                </div>
				
				<div class="form-group row has-success">
					<?php 
                        echo '<label class="col-sm-2 form-control-label">Nama Lengkap</label> <div class="col-sm-10">
						<input type="text" name="namaLengkap" class="form-control is-valid" readonly value='. $pengguna->getAtestasi()->getNamaLengkap() .'></div>';
							
					?>
                </div>
				<div class="form-group row has-success">
					<?php 
                        echo '<label class="col-sm-2 form-control-label" hidden>Id Jemaat</label> <div class="col-sm-10">
						<input type="text" name="id_jemaat" hidden class="form-control is-valid" readonly value='. $pengguna->getId_jemaat() .'></div>';
							
					?>
                </div>
				<div class="form-group row has-success">
					<?php
              echo '<label class="col-sm-2 form-control-label">Alamat Lama</label> <div class="col-sm-10">
						<textarea type="text" name="alamatLama" class="form-control is-valid" readonly>'.$pengguna->getAtestasi()->getAlamat().'</textarea></div>';	
					?>
                </div>
				  <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Alamat Baru</label>
                      <div class="col-sm-10">
                        <textarea class="form-control is-valid" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" id="alamat" name="jemaatAlamatBaru" placeholder="Masukkan Alamat Baru"></textarea>
                      </div>
                  </div>
					  <div class="form-group row has-success">
							<label class="col-sm-2 form-control-label">Gereja</label>
								<div class="col-sm-10">
									<select id="idGereja" name="id_gereja" class="form-control is-valid" onchange="tampilkan()">
										<option disabled="disabled" selected="selected" value="select">Choose option</option>
										<?php
										/* @var $row Gereja */
										foreach($listGereja as $gereja) {
											echo "<option value='".$gereja->getIdGereja()."'>".$gereja->getNama()."</option>";
										}
										?>
										<option value="Lainnya">Lainnya</option>
									</select>
									<div class="select-dropdown"></div>
								</div>
						</div>
					<div class="form-group row has-success" >
                      <label class="col-sm-2 form-control-label"></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control is-valid" name="namaGereja" id="namaGereja" placeholder="Masukkan Nama Gereja" hidden >
                        </div>
					</div>
					<div class="form-group row has-success" >
					<label class="col-sm-2 form-control-label"></label>
                      <div class="col-sm-10">
						<textarea class="form-control is-valid" name="alamatGereja" id="alamatGereja" placeholder="Masukkan Alamat Gereja" hidden></textarea>
                        </div>
					</div>
				   <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Dengan Alasan</label>
                      <div class="col-sm-10">
                         <textarea class="form-control is-valid" id="alasan" name="alasan" rows="3" placeholder="Masukkan Alasan"></textarea>
                      </div>
                  </div>
					<?php
					$optionGereja = "";
						/* @var $row AtestasiMasuk */
						foreach($listAM as $atestasi) {
							$optionGereja .='<option value="'.$atestasi->getIdAtestasiM().'">'.$atestasi->getNoAtestasi().' - '.$atestasi->getNamaLengkap().'</option>';
						}
					?>
				  
				   <div class="form-group row has-success">
                      <label class="col-sm-2 form-control-label">Anggota Keluarga yang Turut Pindah</label>
                      <div class="col-sm-10">
                       <div class="form-group">
                            <form name="add_name" id="add_name"> 
								<table class="table" id="dynamic_field">  
									<tr  class="form-group">
										<td width="50%">
											<select id="idJemaat" name="idJemaat[]" class="form-control is-valid" onchange="tampilkan()">
												<option disabled="disabled" selected="selected" value="select">Choose option</option>
												<?php echo $optionGereja; ?>
											</select>
										</td>
										<td>
											<button type="button" name="add" id="add" class="btn btn-success">+</button>
										</td>
									</tr>
								</table>
								<input type="submit" name="btnSaveAtestasi" class="btn btn-primary" style="float: right;" value="Ajukan Atestasi">
							</form>
                        </div>
					</div>
                  </div>
                
				<?php 
				} else {	
				echo "Sudah Pernah Mengajukan Atestasi Keluar";	
				}
			} else{
			echo "Belum Menjadi Jemaat";	
			}
			?>
                </div>
              </div>
          </div>
      </section> 
      </form>
<script>  
$(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){		  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'">'+
		   '<td><select id="idJemaatOther" name="idJemaat[]" class="form-control is-valid" onchange="tampilkan()">'+
		   '<option disabled="disabled" selected="selected" value="select">Choose option</option>'+
		   '<?php echo $optionGereja; ?>'+
		   '</select></td>'+
		   '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#btnSaveAtestasi').click(function(){            
           $.ajax({  
                url:"./controller/AtestasiController.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
	 $("#idGereja").change(function() {
		console.log($("#idGereja option:selected").val());
			if ($("#idGereja option:selected").val() == 'Lainnya') {
				$('#namaGereja').prop('hidden', false);
				$('#alamatGereja').prop('hidden', false);
				
			} else {
				$('#namaGereja').prop('hidden', 'true');
				$('#alamatGereja').prop('hidden', 'true');
			}
	});
	document.getElementById("alamat").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
	});
	document.getElementById("alasan").addEventListener('keydown', function(e) {
		if (this.value.length === 0 && e.which === 32) e.preventDefault();
	});
 });
 </script>
<?php include'footer-2.php'; ?>