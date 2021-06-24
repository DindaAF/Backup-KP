<?php

class Aktivitas {

	private $id_kegiatan;
	private $nama_kegiatan;
	private $deskripsi;
	private $tanggal_mulai;
	private $tanggal_selesai;
	private $surat_keterangan;
	
	/**
	* @return mixed
	*/
	public function getId_kegiatan(){
		return $this->id_kegiatan;
	}
	/**
	* @param mixed $id
	*/
	public function setId_kegiatan($id){
		$this->id_kegiatan = $id;
	}
	
	/**
	* @return mixed
	*/
	public function getNama_kegiatan(){
		return $this->nama_kegiatan;
	}
	/**
	* @param mixed $namak
	*/
	public function setNama_kegiatan($namak){
		$this->nama_kegiatan = $namak;
	}
	
	/**
	* @return mixed
	*/
	public function getDeskripsi(){
		return $this->deskripsi;
	}
	/**
	* @param mixed $d
	*/
	public function setDeskripsi($d){
		$this->deskripsi = $d;
	}
	
	/**
	* @return mixed
	*/
	public function getTanggalMulai(){
		return $this->tanggal_mulai;
	}
	/**
	* @param mixed $tglm
	*/
	public function setTanggalMulai($tglm){
		$this->tanggal_mulai = $tglm;
	}
	
	/**
	* @return mixed
	*/
	public function getTanggalSelesai(){
		return $this->tanggal_selesai;
	}
	/**
	* @param mixed $tgls
	*/
	public function setTanggalSelesai($tgls){
		$this->tanggal_selesai = $tgls;
	}
	
	/**
	* @return mixed
	*/
	public function getSuratKeterangan(){
		return $this->surat_keterangan;
	}
	/**
	* @param mixed $sk
	*/
	public function setSuratKeterangan($sk){
		$this->surat_keterangan = $sk;
	}
}