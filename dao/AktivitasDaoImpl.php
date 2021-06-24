<?php
class AktivitasDaoImpl {
	//Data Aktivitas
	//!Insert/Add
	public function addDaftar(Aktivitas $aktivitas) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
            $query = 'INSERT INTO tbl_aktivitas (No_Atestasi_Masuk,tgl_Pengajuan,jemaatNama_lengkap,alamat,email,noTelp,noWA,agama,gerejaAsal,status,pasFoto,scanAkteBaptisSidi,suratKeterangan,TurutPindah) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $atestasi->getNoAtestasi(), PDO::PARAM_STR);
            $stmt->bindValue(2, $atestasi->getTanggalPengajuan(), PDO::PARAM_STR);
            $stmt->bindValue(3, $atestasi->getNamaLengkap(), PDO::PARAM_STR);
            $stmt->bindValue(4, $atestasi->getAlamat(), PDO::PARAM_STR);
            $stmt->bindValue(5, $atestasi->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(6, $atestasi->getTelepon(), PDO::PARAM_STR);
            $stmt->bindValue(7, $atestasi->getWA(), PDO::PARAM_STR);
            $stmt->bindValue(8, $atestasi->getAgama(), PDO::PARAM_STR);
            $stmt->bindValue(9, $atestasi->getGerejaAsal(), PDO::PARAM_STR);
            $stmt->bindValue(10, $atestasi->getStatus(), PDO::PARAM_STR);
            $stmt->bindValue(11, $atestasi->getPasFoto(), PDO::PARAM_STR);
            $stmt->bindValue(12, $atestasi->getScanAkteBaptisSidi(), PDO::PARAM_STR);
            $stmt->bindValue(13, $atestasi->getSuratKeterangan(), PDO::PARAM_STR);
            $stmt->bindValue(14, $atestasi->getTurutPindah(), PDO::PARAM_STR);
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
	
	public function fetchAktivitas(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_aktivitas";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Aktivitas');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}


	public function fetchDataAktivitas($actid){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_aktivitas WHERE id_kegiatan = ? order by tanggal_mulai desc";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$actid);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('Aktivitas');
	}
}