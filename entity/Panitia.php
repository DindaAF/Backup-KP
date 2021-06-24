<?php

class Panitia {

	private $p_a_id_kegiatan;
	private $p_u_id_user;
	private $jabatan;
	private $masa_berakhir;
	private $status_jabatan;
	
	/**
	* @return mixed
	*/
	public function getP_A_Id_kegiatan(){
		return $this->p_a_id_kegiatan;
	}
	/**
	* @param mixed $id
	*/
	public function setP_A_Id_kegiatan($id){
		$this->p_a_id_kegiatan = $id;
	}
	
	/**
	* @return mixed
	*/
	public function getP_U_Id_user(){
		return $this->p_u_id_user;
	}
	/**
	* @param mixed $idp
	*/
	public function setP_U_Id_user($idp){
		$this->p_u_id_user = $idp;
	}
	
	/**
	* @return mixed
	*/
	public function getJabatan(){
		return $this->jabatan;
	}
	/**
	* @param mixed $j
	*/
	public function setJabatan($j){
		$this->jabatan = $j;
	}
	
	/**
	* @return mixed
	*/
	public function getMasa_berakhir(){
		return $this->masa_berakhir;
	}
	/**
	* @param mixed $mb
	*/
	public function setMasa_berakhir($mb){
		$this->masa_berakhir = $mb;
	}
	
	/**
	* @return mixed
	*/
	public function getStatus_jabatan(){
		return $this->status_jabatan;
	}
	/**
	* @param mixed $sj
	*/
	public function setStatus_jabatan($sj){
		$this->status_jabatan = $sj;
	}
}