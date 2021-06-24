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

  $dari = $_GET['dari']; 
  $ke = $_GET['ke'];
  if(empty($dari) or empty($ke)){ 
    $query = "SELECT * FROM tbl_atestasimasuk";
  }else{ 
    $query = mysqli_query($conn, "SELECT * FROM tbl_atestasimasuk WHERE tglPengajuan BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
  }
  ?>
  <h4 style="margin-bottom: 5px;">LAPORAN REKAPITULASI</h4>
  <table class="table" border="1" width="100%" style="margin-top: 10px;">
    <tr>
		<th>Nomor Atestasi</th>
		<th>Tanggal Pengajuan</th>
		<th>Nama Lengkap</th>
		<th>Status</th>
		<th>Alamat</th>
    </tr>
    <?php
		if(isset($_GET['dari']) && isset($_GET['ke'])){
			$data = mysqli_query($conn, "SELECT * FROM tbl_atestasimasuk WHERE tglPengajuan BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
		}else{
			$data = mysqli_query($conn, "SELECT * from tbl_atestasimasuk");		
		}
		while($d = mysqli_fetch_array($data)){
    ?>
        <tr>
            <td><?php echo $d['noAtestasi']; ?></td>
            <td><?php echo $d['tglPengajuan']; ?></td>
            <td><?php echo $d['namaLengkap']; ?></td>
            <td><?php echo $d['status']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
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
$pdf->Output('Laporan Rekapitulasi.pdf', 'I');
?>