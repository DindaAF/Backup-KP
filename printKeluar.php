<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
  <style>
    .table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    .table th {
      padding: 5px;
    }
    .table td {
      word-wrap:break-word;
      width: 20%;
      padding: 5px;
    }
  </style>
</head>
<body>
  <?php
  $servername     = "localhost";
  $database       = "gereja";
  $username       = "root";
  $password       = "";
  $conn = mysqli_connect($servername, $username, $password, $database);

  if(empty($_GET['dari']) or empty($_GET['ke'])){ 
    $query = "SELECT tbl_atestasikeluar.*, user.*, tbl_masterjemaat.*, tbl_gereja.id_gereja, tbl_gereja.nama AS nama_gereja, jemaat.id_user AS id_user_jemaat, jemaat.nama AS nama_jemaat, jemaat.username AS username_jemaat, jemaat.id_role AS id_role_jemaat FROM tbl_atestasikeluar LEFT JOIN user ON tbl_atestasikeluar.id_user = user.id_user LEFT JOIN tbl_gereja ON tbl_atestasikeluar.id_gereja = tbl_gereja.id_gereja LEFT JOIN tbl_masterjemaat ON tbl_atestasikeluar.id_jemaat = tbl_masterjemaat.id_jemaat LEFT JOIN user jemaat ON tbl_masterjemaat.iduser = jemaat.id_user";
  }else{ 
	$query = mysqli_query($conn,"SELECT tbl_atestasikeluar.*, user.*, tbl_masterjemaat.*, tbl_gereja.id_gereja, tbl_gereja.nama AS nama_gereja, jemaat.id_user AS id_user_jemaat, jemaat.nama AS nama_jemaat, jemaat.username AS username_jemaat, jemaat.id_role AS id_role_jemaat FROM tbl_atestasikeluar LEFT JOIN user ON tbl_atestasikeluar.id_user = user.id_user LEFT JOIN tbl_gereja ON tbl_atestasikeluar.id_gereja = tbl_gereja.id_gereja LEFT JOIN tbl_masterjemaat ON tbl_atestasikeluar.id_jemaat = tbl_masterjemaat.id_jemaat LEFT JOIN user jemaat ON tbl_masterjemaat.iduser = jemaat.id_user WHERE tglPengajuan BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
	}
  ?>
  <h4 style="margin-bottom: 5px;">LAPORAN REKAPITULASI ATESTASI KELUAR</h4>
  <table class="table" border="1" width="100%" style="margin-top: 10px;">
    <tr>
		<th>Nomor Atestasi</th>
		<th>Tanggal Pengajuan</th>
		<th>Status</th>
		<th>Alamat</th>
    </tr>
    <?php
		if(isset($_GET['dari']) && isset($_GET['ke'])){
			$data = mysqli_query($conn,"SELECT tbl_atestasikeluar.*, user.*, tbl_masterjemaat.*, tbl_gereja.id_gereja, tbl_gereja.nama AS nama_gereja, jemaat.id_user AS id_user_jemaat, jemaat.nama AS nama_jemaat, jemaat.username AS username_jemaat, jemaat.id_role AS id_role_jemaat FROM tbl_atestasikeluar LEFT JOIN user ON tbl_atestasikeluar.id_user = user.id_user LEFT JOIN tbl_gereja ON tbl_atestasikeluar.id_gereja = tbl_gereja.id_gereja LEFT JOIN tbl_masterjemaat ON tbl_atestasikeluar.id_jemaat = tbl_masterjemaat.id_jemaat LEFT JOIN user jemaat ON tbl_masterjemaat.iduser = jemaat.id_user WHERE tglPengajuan BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
		}else{
			$data = mysqli_query($conn, "SELECT tbl_atestasikeluar.*, user.*, tbl_masterjemaat.*, tbl_gereja.id_gereja, tbl_gereja.nama AS nama_gereja, jemaat.id_user AS id_user_jemaat, jemaat.nama AS nama_jemaat, jemaat.username AS username_jemaat, jemaat.id_role AS id_role_jemaat FROM tbl_atestasikeluar LEFT JOIN user ON tbl_atestasikeluar.id_user = user.id_user LEFT JOIN tbl_gereja ON tbl_atestasikeluar.id_gereja = tbl_gereja.id_gereja LEFT JOIN tbl_masterjemaat ON tbl_atestasikeluar.id_jemaat = tbl_masterjemaat.id_jemaat LEFT JOIN user jemaat ON tbl_masterjemaat.iduser = jemaat.id_user");		
		}
		while($d = mysqli_fetch_array($data)){
    ?>
        <tr>
            <td><?php echo $d['noAtestasi']; ?></td>
            <td><?php echo date_format(date_create($d['tglPengajuan']), 'd-M-Y'); ?></td>
            <td><?php echo $d['status']; ?></td>
            <td><?php echo $d['jemaatAlamatBaru']; ?></td>
        </tr>
    <?php } ?>
  </table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require 'libraries/html2pdf/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Rekapitulasi Atestasi Keluar.pdf', 'I');
?>