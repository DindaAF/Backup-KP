<?php
class MasterJemaatDaoImpl {
	
	public function fetchMaster(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_masterjemaat";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'MasterJemaat');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
	public function fetchDataMaster($master_ID){
		$link = PDOUtil::openKoneksi();
		$query = "SELECT * FROM tbl_masterjemaat WHERE JemaatID = ?";
		$stmt = $link->prepare($query);
		$stmt->bindParam(1,$master_ID);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt->execute();
		PDOUtil::closeKoneksi($link);
		return $stmt->fetchObject('MasterJemaat');
	}
	
	public function insertMaster(MasterJemaat $master) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
            $query = 'INSERT INTO tbl_masterjemaat(jemaatNomor,idAtestasiM,jemaatTglLahir,jemaatAyahID,jemaatAyahNama,jemaatIbuID,jemaatIbuNama,jemaatStatusNikah,jemaatGender,jemaatGoldar,jemaatKeanggotaan) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $atestasi->getJemaatNomor(), PDO::PARAM_STR);
            $stmt->bindValue(2, $atestasi->getIdAtestasiM(), PDO::PARAM_STR);
            $stmt->bindValue(3, $atestasi->getJemaatTglLahir(), PDO::PARAM_STR);
            $stmt->bindValue(4, $atestasi->getJemaatAyahID(), PDO::PARAM_STR);
            $stmt->bindValue(5, $atestasi->getJemaatAyahNama(), PDO::PARAM_STR);
            $stmt->bindValue(6, $atestasi->getJemaatIbuID(), PDO::PARAM_STR);
            $stmt->bindValue(7, $atestasi->getJemaatIbuNama(), PDO::PARAM_STR);
            $stmt->bindValue(8, $atestasi->getJemaatStatusNikah(), PDO::PARAM_STR);
            $stmt->bindValue(9, $atestasi->getJemaatGender(), PDO::PARAM_STR);
            $stmt->bindValue(10, $atestasi->getJemaatGoldar(), PDO::PARAM_STR);
            $stmt->bindValue(11, $atestasi->getJemaatKeanggotaan(), PDO::PARAM_STR);
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
	
	
	public function insertMasterDefault($idAtestasiM, $idUser) {
        $link = PDOUtil::openKoneksi();
        try {
            $link->beginTransaction();
            $query = 'INSERT INTO tbl_masterjemaat(jemaatNomor,idAtestasiM,iduser) VALUES (?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, "", PDO::PARAM_STR);
            $stmt->bindValue(2, $idAtestasiM, PDO::PARAM_STR);
            $stmt->bindValue(3, $idUser, PDO::PARAM_STR);
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
	
	
	public function getJemaatByIdUser($idUser){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_masterjemaat JOIN tbl_atestasimasuk ON tbl_masterjemaat.idAtestasiM = tbl_atestasimasuk.idAtestasiM WHERE tbl_masterjemaat.iduser = ?";
			$stmt = $link->prepare($query);
			$stmt->bindParam(1,$idUser);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'MasterJemaat');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
}