<?php
class PekerjaanDaoImpl {
	
	public function fetchPekerjaan(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM tbl_pekerjaan";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pekerjaan');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
}