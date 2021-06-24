<?php
class RoleKematianDaoImpl {
	
	public function fetchRole(){
		$link = PDOUtil::openKoneksi();
		try {
			$query = "SELECT * FROM role_kematian";
			$stmt = $link->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RoleKematian');
            $stmt->execute();
        } catch (PDOException $er) {
            echo $er->getMessage();
            die();
		}
		PDOUtil::closeKoneksi($link);
		return $stmt;
	}
}