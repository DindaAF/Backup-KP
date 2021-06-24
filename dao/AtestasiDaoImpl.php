<?php
class AtestasiDaoImpl {
	public function insertAtestasi(AtestasiMasuk $atestasi) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
            $query = 'INSERT INTO tbl_atestasimasuk (noAtestasi,tglPengajuan,namaLengkap,alamat,email,noTelp,noWA,agama,gerejaAsal,status,pasFoto,scanAkteBaptisSidi,suratKeterangan) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $atestasi->getNoAtestasi(), PDO::PARAM_STR);
            $stmt->bindValue(2, $atestasi->getTglPengajuan(), PDO::PARAM_STR);
            $stmt->bindValue(3, $atestasi->getNamaLengkap(), PDO::PARAM_STR);
            $stmt->bindValue(4, $atestasi->getAlamat(), PDO::PARAM_STR);
            $stmt->bindValue(5, $atestasi->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(6, $atestasi->getNoTelp(), PDO::PARAM_STR);
            $stmt->bindValue(7, $atestasi->getNoWA(), PDO::PARAM_STR);
            $stmt->bindValue(8, $atestasi->getAgama(), PDO::PARAM_STR);
            $stmt->bindValue(9, $atestasi->getGerejaAsal(), PDO::PARAM_STR);
            $stmt->bindValue(10, $atestasi->getStatus(), PDO::PARAM_STR);
            $stmt->bindValue(11, $atestasi->getPasFoto(), PDO::PARAM_STR);
            $stmt->bindValue(12, $atestasi->getScanAkteBaptisSidi(), PDO::PARAM_STR);
            $stmt->bindValue(13, $atestasi->getSuratKeterangan(), PDO::PARAM_STR);
            $stmt->execute();
            $msg = 'sukses';
            $link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
    }
	
	public function insertBuktiAM(AtestasiMasuk $atestasiM) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
			$query = "UPDATE tbl_atestasimasuk SET buktiAM=? WHERE idAtestasiM = ?";
            $stmt = $link->prepare($query);
			$stmt->bindValue(1,$atestasiM->getBuktiAM());
			$stmt->bindValue(2,$atestasiM->getIdAtestasiM());
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
    }
	
	public function insertBuktiAK(AtestasiKeluar $atestasiK) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
			$query = "UPDATE tbl_atestasikeluar SET buktiAK=? WHERE idAtestasiK = ?";
            $stmt = $link->prepare($query);
			$stmt->bindValue(1,$atestasiK->getBuktiAK());
			$stmt->bindValue(2,$atestasiK->getIdAtestasiK());
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
    }
	
	public function insertAtestasiKeluar(AtestasiKeluar $atestasi) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
            $query = 'INSERT INTO tbl_atestasikeluar (noAtestasi,tglPengajuan,id_jemaat,jemaatAlamatBaru,id_gereja,namaGereja,alamatGereja,alasan,status) VALUES (?,?,?,?,?,?,?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $atestasi->getNoAtestasi(), PDO::PARAM_STR);
            $stmt->bindValue(2, $atestasi->getTglPengajuan(), PDO::PARAM_STR);
            $stmt->bindValue(3, $atestasi->getId_jemaat(), PDO::PARAM_STR);
            $stmt->bindValue(4, $atestasi->getJemaatAlamatBaru(), PDO::PARAM_STR);
            $stmt->bindValue(5, $atestasi->getId_gereja(), PDO::PARAM_STR);
            $stmt->bindValue(6, $atestasi->getNamaGereja(), PDO::PARAM_STR);
            $stmt->bindValue(7, $atestasi->getAlamatGereja(), PDO::PARAM_STR);
            $stmt->bindValue(8, $atestasi->getAlasan(), PDO::PARAM_STR);
            $stmt->bindValue(9, $atestasi->getStatus(), PDO::PARAM_STR);
            $stmt->execute();
            $msg = 'sukses';
            $link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
    }
	
	public function fetchAtestasiKeluar(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT tbl_atestasikeluar.*, user.*, tbl_masterjemaat.*, tbl_gereja.id_gereja, tbl_gereja.nama AS nama_gereja, jemaat.id_user AS id_user_jemaat, jemaat.nama AS nama_jemaat, jemaat.username AS username_jemaat, jemaat.id_role AS id_role_jemaat FROM tbl_atestasikeluar LEFT JOIN user ON tbl_atestasikeluar.id_user = user.id_user LEFT JOIN tbl_gereja ON tbl_atestasikeluar.id_gereja = tbl_gereja.id_gereja LEFT JOIN tbl_masterjemaat ON tbl_atestasikeluar.id_jemaat = tbl_masterjemaat.id_jemaat LEFT JOIN user jemaat ON tbl_masterjemaat.iduser = jemaat.id_user";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiKeluar');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	public function fetchDataAtestasiKeluar($atestasi){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_atestasikeluar WHERE idAtestasiK = ? order by tglPengajuan DESC";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$atestasi);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('AtestasiKeluar');
	}
	
	public function fetchAtestasi(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT tbl_atestasimasuk.*, user.*, pengaju.id_user as id_user_pengaju, pengaju.nama as nama_pengaju, pengaju.username as username_pengaju, pengaju.id_role as id_role_pengaju FROM tbl_atestasimasuk LEFT JOIN user ON tbl_atestasimasuk.id_user = user.id_user LEFT JOIN user pengaju ON tbl_atestasimasuk.noAtestasi = pengaju.username";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiMasuk');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	public function listTurutPindah($username){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT tbl_atestasimasuk.*, user.*, pengaju.id_user as id_user_pengaju, pengaju.nama as nama_pengaju, pengaju.username as username_pengaju, pengaju.id_role as id_role_pengaju FROM tbl_atestasimasuk JOIN user ON tbl_atestasimasuk.id_user = user.id_user JOIN user pengaju ON tbl_atestasimasuk.noAtestasi = pengaju.username WHERE noAtestasi != ?";
			$stmt = $link->prepare($query);
		$stmt->bindParam(1,$username);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiMasuk');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	public function getPengajuanKeluarByIdJemaat($id_jemaat){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_atestasikeluar JOIN user ON tbl_atestasikeluar.id_user = user.id_user JOIN tbl_masterjemaat ON tbl_atestasikeluar.id_jemaat = tbl_masterjemaat.id_jemaat WHERE tbl_atestasikeluar.id_jemaat = ?";
			$stmt = $link->prepare($query);
		$stmt->bindParam(1,$id_jemaat);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiKeluar');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	
	public function fetchDataAtestasi($atestasi){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_atestasimasuk WHERE idAtestasiM = ? order by tglPengajuan DESC";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$atestasi);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('AtestasiMasuk');
	}
    
    public function SetujuiAtestasiMasuk($idMasuk,$idUser,$tanggal,$status,$statusJemaat){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "UPDATE tbl_atestasimasuk SET status=?, statusJemaat=?, tgl_Persetujuan=?, id_user=? WHERE idAtestasiM = ?";
			$stmt = $link->prepare($query);
			$stmt->bindValue(1,$status, PDO::PARAM_STR);
			$stmt->bindValue(2,$statusJemaat, PDO::PARAM_STR);
			$stmt->bindValue(3,$tanggal, PDO::PARAM_STR);
			$stmt->bindValue(4,$idUser, PDO::PARAM_STR);
			$stmt->bindValue(5,$idMasuk, PDO::PARAM_STR);
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function CancelAtestasiMasuk($idMasuk,$idUser,$tanggal,$status, $statusJemaat){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "UPDATE tbl_atestasimasuk SET status=?, statusJemaat=? tgl_Persetujuan=?, id_user=? WHERE idAtestasiM = ?";
			$stmt = $link->prepare($query);
			$stmt->bindValue(1,$status, PDO::PARAM_STR);
			$stmt->bindValue(2,$statusJemaat, PDO::PARAM_STR);
			$stmt->bindValue(3,$tanggal, PDO::PARAM_STR);
			$stmt->bindValue(4,$idUser, PDO::PARAM_STR);
			$stmt->bindValue(5,$idMasuk, PDO::PARAM_STR);
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function SetujuiAtestasiKeluar($idMasuk,$idUser,$tanggal,$status, $statusJemaat){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "UPDATE tbl_atestasikeluar SET status=?, statusJemaat=?, tgl_Persetujuan=?, id_user=? WHERE idAtestasiK = ?";
			$stmt = $link->prepare($query);
			$stmt->bindValue(1,$status, PDO::PARAM_STR);
			$stmt->bindValue(2,$statusJemaat, PDO::PARAM_STR);
			$stmt->bindValue(3,$tanggal, PDO::PARAM_STR);
			$stmt->bindValue(4,$idUser, PDO::PARAM_STR);
			$stmt->bindValue(5,$idMasuk, PDO::PARAM_STR);
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function CancelAtestasiKeluar($idMasuk,$idUser,$tanggal,$status,$statusJemaat){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "UPDATE tbl_atestasikeluar SET status=?, statusJemaat=?, tgl_Persetujuan=?, id_user=? WHERE idAtestasiK = ?";
			$stmt = $link->prepare($query);
			$stmt->bindValue(1,$status, PDO::PARAM_STR);
			$stmt->bindValue(2,$statusJemaat, PDO::PARAM_STR);
			$stmt->bindValue(3,$tanggal, PDO::PARAM_STR);
			$stmt->bindValue(4,$idUser, PDO::PARAM_STR);
			$stmt->bindValue(5,$idMasuk, PDO::PARAM_STR);
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function StatusJemaatAM($idMasuk,$statusJemaat){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "UPDATE tbl_atestasimasuk SET statusJemaat=? WHERE idAtestasiM = ?";
			$stmt = $link->prepare($query);
			$stmt->bindValue(1,$statusJemaat, PDO::PARAM_STR);
			$stmt->bindValue(2,$idMasuk, PDO::PARAM_STR);
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function StatusJemaatAK($idKeluar,$statusJemaat){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "UPDATE tbl_atestasikeluar SET statusJemaat=? WHERE idAtestasiK = ?";
			$stmt = $link->prepare($query);
			$stmt->bindValue(1,$statusJemaat, PDO::PARAM_STR);
			$stmt->bindValue(2,$idKeluar, PDO::PARAM_STR);
			$stmt->execute();
			$msg = 'sukses';
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function getOneAM($noAtestasi){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "SELECT * FROM tbl_atestasimasuk WHERE substring(noAtestasi,1,6) = ? ORDER BY idAtestasiM DESC LIMIT 1 ";
			$stmt = $link->prepare($query);
			$stmt->bindParam(1,$noAtestasi);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiMasuk');
			$stmt->execute();
			$msg = $stmt;
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function getOneAK($noAtestasi){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "SELECT * FROM tbl_atestasikeluar WHERE substring(noAtestasi,1,6) = ? ORDER BY idAtestasiK DESC LIMIT 1 ";
			$stmt = $link->prepare($query);
			$stmt->bindParam(1,$noAtestasi);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiKeluar');
			$stmt->execute();
			$msg = $stmt;
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function fetchUser(){
		$user = $_SESSION['uname'];
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "SELECT * FROM tbl_atestasimasuk WHERE noAtestasi = ?";
			$stmt = $link->prepare($query);
			$stmt->bindParam(1,$user);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiMasuk');
			$stmt->execute();
			$msg = $stmt;
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function fetchUserKeluar(){
		$user = $_SESSION['uname'];
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "SELECT * FROM tbl_atestasikeluar WHERE noAtestasi = ?";
			$stmt = $link->prepare($query);
			$stmt->bindParam(1,$user);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiKeluar');
			$stmt->execute();
			$msg = $stmt;
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function fetchSelectUser($idAtestasiM){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "SELECT * FROM tbl_atestasimasuk WHERE idAtestasiM = ?";
			$stmt = $link->prepare($query);
			$stmt->bindParam(1,$idAtestasiM);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiMasuk');
			$stmt->execute();
			$msg = $stmt;
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
	
	public function fetchSelectUserKeluar($idAtestasiK){
		$link = PDOUtil::openKoneksi();
		try {
			$link->beginTransaction();
			$query = "SELECT * FROM tbl_atestasikeluar WHERE idAtestasiK = ?";
			$stmt = $link->prepare($query);
			$stmt->bindParam(1,$idAtestasiK);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'AtestasiKeluar');
			$stmt->execute();
			$msg = $stmt;
			$link->commit();
        } catch (PDOException $er) {
            $link->rollBack();
            echo $er->getMessage();
            die();
        }
        PDOUtil::closeKoneksi($link);
        return $msg;
	}
}