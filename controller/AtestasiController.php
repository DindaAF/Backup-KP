<?php
class AtestasiController
{
    private $atestasiDaoImplement;
	private $gerejaDaoImplement;
	private $masterJemaatDaoImplement;
	private $UserDaoImplement;
	
    function __construct()
    {
        $this->atestasiDaoImplement = new AtestasiDaoImpl();
		$this->gerejaDaoImplement = new GerejaDaoImpl();
		$this->masterJemaatDaoImplement = new MasterJemaatDaoImpl();
		$this->UserDaoImplement = new UserDaoImpl();
    }
    public function atestasiMasukPage()
    {
        $btnSaveAtestasi = FILTER_INPUT(INPUT_POST, 'btnSaveAtestasi');
        if ($btnSaveAtestasi) {
            $msg = 'gagal';
            $tglPengajuan = date("Y-m-d H:i:s");
            $txtnama = FILTER_INPUT(INPUT_POST, 'namaLengkap');
            $txtalamat = FILTER_INPUT(INPUT_POST, 'alamat');
            $txtemail = FILTER_INPUT(INPUT_POST, 'email');
            $txtnoTelp = FILTER_INPUT(INPUT_POST, 'noTelp');
            $txtnoWA = FILTER_INPUT(INPUT_POST, 'noWA');
            $txtagama = FILTER_INPUT(INPUT_POST, 'agama');
            $txtgerejaAsal = FILTER_INPUT(INPUT_POST, 'gerejaAsal');
            $noAtestasi = date("y") . date("m") . date('d');
			
			$getOneAM = $this->atestasiDaoImplement->getOneAM($noAtestasi)->fetch();
			$number = "00";
			if($getOneAM == false){
				$number = "01";
			}else{
				$XX = substr($getOneAM->getNoAtestasi(),6,2);
				$XX = intval($XX) + 1;
				if($XX < 10){
					$number = "0".$XX;
				}else{
					$number = $XX;
				}
			}
			
            $addAtestasiMasuk = new AtestasiMasuk();
            $addAtestasiMasuk->setNoAtestasi($noAtestasi.$number."00");
            $addAtestasiMasuk->setTglPengajuan($tglPengajuan);
            $addAtestasiMasuk->setNamaLengkap($txtnama);
            $addAtestasiMasuk->setAlamat($txtalamat);
            $addAtestasiMasuk->setEmail($txtemail);
            $addAtestasiMasuk->setNoTelp($txtnoTelp);
            $addAtestasiMasuk->setNoWA($txtnoWA);
            $addAtestasiMasuk->setAgama($txtagama);
            $addAtestasiMasuk->setGerejaAsal($txtgerejaAsal);
            $addAtestasiMasuk->setStatus("Belum Disetujui");

            $fileFoto = $_FILES["pasFotoSingle"];
            $namafileFoto = $fileFoto['name'];
            if ($namafileFoto != NULL) {
                $alamatFoto = $this->uploadImage($fileFoto);
                $addAtestasiMasuk->setPasFoto($alamatFoto);
            }

            $fileScan = $_FILES["scanAkteBaptisSidi"];
            $namafileScanAkte = $fileScan['name'];
            if ($namafileScanAkte != NULL) {
                $alamatScan = $this->uploadImage($fileScan);
                $addAtestasiMasuk->setScanAkteBaptisSidi($alamatScan);
            }

            $fileSurat = $_FILES["suratKeterangan"];
            $namafileSuratKeterangan = $fileSurat['name'];
            if ($namafileSuratKeterangan != NULL) {
                $alamatSurat = $this->uploadImage($fileSurat);
                $addAtestasiMasuk->setSuratKeterangan($alamatSurat);
            }
            $msg = $this->atestasiDaoImplement->insertAtestasi($addAtestasiMasuk);

            $turutPindah = $_POST['turutPindah'];
            $pasFoto = $_FILES['pasFoto'];
            $scanAkte = $_FILES['scanAkte'];
			// Untuk masukan data YY (jika orang ikut turut pindah)
            for ($i = 0; $i < sizeof($turutPindah); $i++) {
				$alamatPasFoto = NULL;
				$namaPasFoto = $pasFoto["name"][$i];
				if ($namaPasFoto != NULL) {
					$alamatPasFoto = $this->uploadManyImage($pasFoto, $i);
				}
				$alamatScanAkte = NULL;
				$namaScanAkte = $scanAkte["name"][$i];
				if ($namaScanAkte != NULL) {
					$alamatScanAkte = $this->uploadManyImage($scanAkte, $i);
				}
				$indexTurutPindah = $i + 1;
				if($indexTurutPindah < 10){
				  $indexTurutPindah = "0".$indexTurutPindah;
				}
				$this->insertAtestasiMasuk($noAtestasi . $number . $indexTurutPindah, $turutPindah[$i], $txtalamat, $txtemail, $txtnoTelp, $txtnoWA, $txtagama, $txtgerejaAsal, $alamatPasFoto, $alamatScanAkte, $alamatSurat);
			}
        }
        require_once 'atestasiMasuk.php';
    }
	
	public function atestasiKeluarPage()
    {
        $btnSaveAtestasi = FILTER_INPUT(INPUT_POST, 'btnSaveAtestasi');
        if ($btnSaveAtestasi) {
            $msg = 'gagal';
            $tglPengajuan = date("Y-m-d H:i:s");
            $txtnama = FILTER_INPUT(INPUT_POST, 'id_jemaat');
            $txtalamatbaru = FILTER_INPUT(INPUT_POST, 'jemaatAlamatBaru');
            $txtidGereja = FILTER_INPUT(INPUT_POST, 'id_gereja');
            $txtnamaGereja = FILTER_INPUT(INPUT_POST, 'namaGereja');
            $txtalamatGereja = FILTER_INPUT(INPUT_POST, 'alamatGereja');
            $txtalasan = FILTER_INPUT(INPUT_POST, 'alasan');
            $noAtestasi = $_SESSION['uname'];
			
            $addAtestasiKeluar = new AtestasiKeluar();
            $addAtestasiKeluar->setNoAtestasi($noAtestasi);
            $addAtestasiKeluar->setTglPengajuan($tglPengajuan);
            $addAtestasiKeluar->setId_jemaat($txtnama);
            $addAtestasiKeluar->setJemaatAlamatBaru($txtalamatbaru);
            $addAtestasiKeluar->setId_gereja($txtidGereja);
            $addAtestasiKeluar->setNamaGereja($txtnamaGereja);
            $addAtestasiKeluar->setAlamatGereja($txtalamatGereja);
            $addAtestasiKeluar->setAlasan($txtalasan);
            $addAtestasiKeluar->setStatus("Belum Disetujui");
            $msg = $this->atestasiDaoImplement->insertAtestasiKeluar($addAtestasiKeluar);
            $idJemaat = $_POST['idJemaat'];
			var_dump($idJemaat);
			// Untuk masukan data YY (jika orang ikut turut pindah)
            for ($i = 0; $i < sizeof($idJemaat); $i++) {
				$indexTurutPindah = $i + 1;
				if($indexTurutPindah < 10){
				  $indexTurutPindah = "0".$indexTurutPindah;
				}
				$this->insertAtestasiKeluar($noAtestasi , $idJemaat[$i], $txtalamatbaru, $txtidGereja, $txtnamaGereja, $txtalamatGereja, $txtalasan);
			}
        }
		$pengguna = $this->masterJemaatDaoImplement->getJemaatByIdUser($_SESSION["userid"]);
		$pengguna = $pengguna->fetch();
		$listGereja = $this->gerejaDaoImplement->fetchGereja();
		$listAM = $this->atestasiDaoImplement->listTurutPindah($_SESSION['uname']);
		$pernahMengajukan = $this->atestasiDaoImplement->getPengajuanKeluarByIdJemaat($pengguna->getId_jemaat())->fetch();
        require_once 'pengajuan_AK.php';
    }
	
	private function insertAtestasiKeluar($noAtestasi, $id_jemaat, $jemaatAlamatBaru, $id_gereja, $namaGereja, $alamatGereja, $alasan)
    {
        if ($id_jemaat != "" && $id_jemaat != NULL) {
            $addAtestasiKeluar = new AtestasiKeluar();
            $addAtestasiKeluar->setNoAtestasi($noAtestasi);
            $addAtestasiKeluar->setTglPengajuan(date("Y-m-d H:i:s"));
            $addAtestasiKeluar->setId_jemaat($id_jemaat);
            $addAtestasiKeluar->setJemaatAlamatBaru($jemaatAlamatBaru);
            $addAtestasiKeluar->setId_gereja($id_gereja);
            $addAtestasiKeluar->setnamaGereja($namaGereja);
            $addAtestasiKeluar->setAlamatGereja($alamatGereja);
            $addAtestasiKeluar->setAlasan($alasan);
            $addAtestasiKeluar->setStatus("Belum Disetujui");
            $msg = $this->atestasiDaoImplement->insertAtestasiKeluar($addAtestasiKeluar);
            return $msg;
        }
    }

    private function insertAtestasiMasuk($noAtestasi, $namaLengkap, $alamat, $email, $noTelepon, $noWa, $agama, $gerejaAsal, $pasFoto, $scanAkteBaptisSidi, $suratKeterangan)
    {
        if ($namaLengkap != "" && $namaLengkap != NULL) {
            $addAtestasiMasuk = new AtestasiMasuk();
            $addAtestasiMasuk->setNoAtestasi($noAtestasi);
            $addAtestasiMasuk->setTglPengajuan(date("Y-m-d H:i:s"));
            $addAtestasiMasuk->setNamaLengkap($namaLengkap);
            $addAtestasiMasuk->setAlamat($alamat);
            $addAtestasiMasuk->setEmail($email);
            $addAtestasiMasuk->setNoTelp($noTelepon);
            $addAtestasiMasuk->setNoWA($noWa);
            $addAtestasiMasuk->setAgama($agama);
            $addAtestasiMasuk->setGerejaAsal($gerejaAsal);
            $addAtestasiMasuk->setStatus("Belum Disetujui");
            $addAtestasiMasuk->setPasFoto($pasFoto);
            $addAtestasiMasuk->setScanAkteBaptisSidi($scanAkteBaptisSidi);
            $addAtestasiMasuk->setSuratKeterangan($suratKeterangan);
            $msg = $this->atestasiDaoImplement->insertAtestasi($addAtestasiMasuk);
            return $msg;
        }
    }

    private function uploadImage($file)
    {
        $namafile = $file['name'];
        $lokasi = $file['tmp_name'];
        $ukuran = $file['size'];
        $tipe = pathinfo($namafile, PATHINFO_EXTENSION);
        if ($namafile != NULL) {
            if ($tipe == 'png' || $tipe == 'PNG' || $tipe == 'jpg' || $tipe == 'jpeg' || $tipe == 'pdf') {
                $alamat = 'picture/' . $namafile;
                move_uploaded_file($lokasi, $alamat);
                return $alamat;
            }
        }
        return NULL;
    }

    private function uploadManyImage($file, $index)
    {
        $namafile = $file['name'][$index];
        $lokasi = $file['tmp_name'][$index];
        $ukuran = $file['size'][$index];
        $tipe = pathinfo($namafile, PATHINFO_EXTENSION);
        if ($namafile != NULL) {
            if ($tipe == 'png' || $tipe == 'PNG' || $tipe == 'jpg' || $tipe == 'jpeg' || $tipe == 'pdf') {
                $alamat = 'picture/' . $namafile;
                move_uploaded_file($lokasi, $alamat);
                return $alamat;
            }
        }
        return NULL;
    }

    public function persetujuanMasukPage()
    {
        $result = $this->atestasiDaoImplement->fetchAtestasi();
        $btnSetuju = filter_input(INPUT_POST, "btnSetuju");
        $btnStatus = filter_input(INPUT_POST, "btnStatus");
        $btnAdd = filter_input(INPUT_POST, "btnAdd");
        $btnCancel = filter_input(INPUT_POST, "btnCancel");
        if(isset($btnSetuju)){
            $idAtestasiM = filter_input(INPUT_POST, "idAtestasiM");
            $noAtestasi = filter_input(INPUT_POST, "noAtestasi");
            $namaLengkap = filter_input(INPUT_POST, "namaLengkap");
            $idPenyetuju = $_SESSION['userid'];
            $tanggal = date("Y-m-d H:i:s");
            $status = "Disetujui";
            $statusJemaat = "Aktif";
            $this->atestasiDaoImplement->SetujuiAtestasiMasuk($idAtestasiM,$idPenyetuju,$tanggal, $status,$statusJemaat);
			
			// Buat Akun
			$this->UserDaoImplement->insertJemaat($namaLengkap, $noAtestasi);
			$account = $this->UserDaoImplement->getJemaatByUsername($noAtestasi);
			$account = $account->fetch();
			// Buat Master Jemaat
			$this->masterJemaatDaoImplement->insertMasterDefault($idAtestasiM,$account->getIdUser());
            header('location:index.php?menu=persetujuan_atestasimasuk');
		}
		if(isset($btnCancel)){
			$idAtestasiM = filter_input(INPUT_POST, "idAtestasiM");
            $noAtestasi = filter_input(INPUT_POST, "noAtestasi");
            $namaLengkap = filter_input(INPUT_POST, "namaLengkap");
            $idPenyetuju = $_SESSION['userid'];
            $tanggal = date("Y-m-d H:i:s");
            $status = "Belum Disetujui";
            $statusJemaat = "Non";
            $this->atestasiDaoImplement->CancelAtestasiMasuk($idAtestasiM,$idPenyetuju,$tanggal, $status,$statusJemaat);
		}
		if(isset($btnStatus)){
            $idAtestasiM = filter_input(INPUT_POST, "idAtestasiM");
            $statusJemaat = "Aktif";
            $this->atestasiDaoImplement->StatusJemaatAM($idAtestasiM,$statusJemaat);
        }
        require_once 'persetujuan_AM.php';
    }
	
	public function persetujuanKeluarPage()
    {
        $result = $this->atestasiDaoImplement->fetchAtestasiKeluar();
        $btnSetuju = filter_input(INPUT_POST, "btnSetuju");
        $btnAktif = filter_input(INPUT_POST, "btnAktif");
        $btnNon = filter_input(INPUT_POST, "btnNon");
        $btnCancel = filter_input(INPUT_POST, "btnCancel");
        if(isset($btnSetuju)){
            $idAtestasiK = filter_input(INPUT_POST, "idAtestasiK");
            $idPenyetuju = $_SESSION['userid'];
            $tanggal = date("Y-m-d H:i:s");
            $status = "Disetujui";
            $statusJemaat = "Non";
            $this->atestasiDaoImplement->SetujuiAtestasiKeluar($idAtestasiK,$idPenyetuju,$tanggal,$status,$statusJemaat);
        }
		if(isset($btnCancel)){
			$idAtestasiK = filter_input(INPUT_POST, "idAtestasiK");
            $idPenyetuju = $_SESSION['userid'];
            $tanggal = date("Y-m-d H:i:s");
            $status = "Belum Disetujui";
			$statusJemaat = "-";
            $this->atestasiDaoImplement->CancelAtestasiKeluar($idAtestasiK,$idPenyetuju,$tanggal,$status, $statusJemaat);
		}
		if(isset($btnAktif)){
            $idAtestasiK = filter_input(INPUT_POST, "idAtestasiK");
            $statusJemaat = "Aktif";
            $this->atestasiDaoImplement->StatusJemaatAK($idAtestasiK,$statusJemaat);
        }
		if(isset($btnNon)){
            $idAtestasiK = filter_input(INPUT_POST, "idAtestasiK");
            $statusJemaat = "Non";
            $this->atestasiDaoImplement->StatusJemaatAK($idAtestasiK,$statusJemaat);
        }
        require_once 'persetujuan_AK.php';
    }
	
	public function LaporanMasuk()
    {
        $result = $this->atestasiDaoImplement->fetchAtestasi();
        require_once 'laporanMasuk.php';
    }
	
	public function LaporanKeluar()
    {
        $result = $this->atestasiDaoImplement->fetchAtestasiKeluar();
        require_once 'laporanKeluar.php';
    }
	
	public function RiwayatMasuk()
    {
		$atestasi = $this->atestasiDaoImplement->fetchUser()->fetch();
		$idAtestasiM = $atestasi->getIdAtestasiM();
		$btnSaveBukti = FILTER_INPUT(INPUT_POST, 'btnSaveBukti');
		if ($btnSaveBukti) {
			$msg = 'gagal';
			$addAtestasiMasuk = new AtestasiMasuk();
			$addAtestasiMasuk->setIdAtestasiM($idAtestasiM);
			$filebukti = $_FILES["buktiAM"];
            $namafileFoto = $filebukti['name'];
            if ($namafileFoto != NULL) {
                $alamatFoto = $this->uploadImage($filebukti);
                $addAtestasiMasuk->setBuktiAM($alamatFoto);
            }
			$msg = $this->atestasiDaoImplement->insertBuktiAM($addAtestasiMasuk);
		}
		$result = $this->atestasiDaoImplement->fetchUser();
        require_once 'riwayat_atestasiMasuk.php';
    }
	
	public function BuktiMasuk()
    {
		$bukti = filter_input(INPUT_GET, "bukti");
        if (isset($bukti)) {
            $idAtestasiM = $this->atestasiDaoImplement->fetchSelectUser($bukti);
        }
		$btnSaveBukti = FILTER_INPUT(INPUT_POST, 'btnSaveBukti');
		if ($btnSaveBukti) {
			$msg = 'gagal';
			$addAtestasiMasuk = new AtestasiMasuk();
			$addAtestasiMasuk->setIdAtestasiM($bukti);
			$filebukti = $_FILES["buktiAM"];
            $namafileFoto = $filebukti['name'];
            if ($namafileFoto != NULL) {
                $alamatFoto = $this->uploadImage($filebukti);
                $addAtestasiMasuk->setBuktiAM($alamatFoto);
            }
			$msg = $this->atestasiDaoImplement->insertBuktiAM($addAtestasiMasuk);
			header("location:index.php?menu=persetujuan_atestasimasuk");
		}
		$result = $this->atestasiDaoImplement->fetchUser();
        require_once 'buktiMasuk.php';
    }
	
	public function BuktiKeluar()
    {
        $buktiKeluar = filter_input(INPUT_GET, "buktiKeluar");
        if (isset($buktiKeluar)) {
            $idAtestasiK = $this->atestasiDaoImplement->fetchSelectUserKeluar($buktiKeluar);
        }
		$btnSaveBukti = FILTER_INPUT(INPUT_POST, 'btnSaveBukti');
		if ($btnSaveBukti) {
			$msg = 'gagal';
			$addAtestasiKeluar = new AtestasiKeluar();
			$addAtestasiKeluar->setIdAtestasiK($buktiKeluar);
			$filebukti = $_FILES["buktiAK"];
            $namafileFoto = $filebukti['name'];
            if ($namafileFoto != NULL) {
                $alamatFoto = $this->uploadImage($filebukti);
                $addAtestasiKeluar->setBuktiAK($alamatFoto);
            }
			$msg = $this->atestasiDaoImplement->insertBuktiAK($addAtestasiKeluar);
			header("location:index.php?menu=persetujuan_atestasikeluar");
		}
		$result = $this->atestasiDaoImplement->fetchUserKeluar();
        require_once 'buktiKeluar.php';
    }
	
	public function RiwayatKeluar()
    {
        $atestasi = $this->atestasiDaoImplement->fetchUserKeluar()->fetch();
		$idAtestasiK = $atestasi->getIdAtestasiK();
		$btnSaveBukti = FILTER_INPUT(INPUT_POST, 'btnSaveBukti');
		if ($btnSaveBukti) {
			$msg = 'gagal';
			$addAtestasiKeluar = new AtestasiKeluar();
			$addAtestasiKeluar->setIdAtestasiK($idAtestasiK);
			$filebukti = $_FILES["buktiAK"];
            $namafileFoto = $filebukti['name'];
            if ($namafileFoto != NULL) {
                $alamatFoto = $this->uploadImage($filebukti);
                $addAtestasiKeluar->setBuktiAK($alamatFoto);
            }
			$msg = $this->atestasiDaoImplement->insertBuktiAK($addAtestasiKeluar);
		}
		$result = $this->atestasiDaoImplement->fetchUserKeluar();
        require_once 'riwayat_atestasiKeluar.php';
    }
}