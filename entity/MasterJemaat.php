<?php
class MasterJemaat
{
    private $id_jemaat;
    private $jemaatNomor;
    private $idAtestasiM;
    private $jemaatTglLahir;
    private $jemaatAyahID;
    private $jemaatAyahNama;
    private $jemaatIbuID;
    private $jemaatIbuNama;
    private $jemaatStatusNikah;
    private $jemaatGender;
	private $jemaatGoldar;
	private $atestasi;
	private $iduser;
	private $user;
	
    function getId_jemaat()
    {
        return $this->id_jemaat;
    }
	function getJemaatNomor()
    {
        return $this->jemaatNomor;
    }
	function getIdAtestasiM()
    {
        return $this->idAtestasiM;
    }
	function getJemaatTglLahir()
    {
        return $this->jemaatTglLahir;
    }
	function getJemaatAyahID()
    {
        return $this->jemaatAyahID;
    }
	function getJemaatAyahNama()
    {
        return $this->jemaatAyahNama;
    }
	function getJemaatIbuID()
    {
        return $this->jemaatIbuID;
    }
	function getJemaatIbuNama()
    {
        return $this->jemaatIbuNama;
    }
	function getJemaatStatusNikah()
    {
        return $this->jemaatStatusNikah;
    }
	function getJemaatGender()
    {
        return $this->jemaatGender;
    }
	function getJemaatGoldar()
    {
        return $this->jemaatGoldar;
    }
	
	function getAtestasi()
    {
        return $this->atestasi;
    }
	function getIdUser()
    {
        return $this->iduser;
    }
	function getUser()
    {
        return $this->user;
    }
    

    function setId_jemaat($id_jemaat)
    {
        $this->id_jemaat = $id_jemaat;
    }
	function setJemaatNomor($jemaatNomor)
    {
        $this->jemaatNomor = $jemaatNomor;
    }
	function setIdAtestasiM($idAtestasiM)
    {
        $this->idAtestasiM = $idAtestasiM;
    }
    function setJemaatTglLahir($jemaatTglLahir)
    {
        $this->jemaatTglLahir = $jemaatTglLahir;
    }
	function setJemaatAyahID($jemaatAyahID)
    {
        $this->jemaatAyahID = $jemaatAyahID;
    }
	function setJemaatAyahNama($jemaatAyahNama)
    {
        $this->jemaatAyahNama = $jemaatAyahNama;
    }
	function setJemaatIbuID($jemaatIbuID)
    {
        $this->jemaatIbuID = $jemaatIbuID;
    }
	function setJemaatIbuNama($jemaatIbuNama)
    {
        $this->jemaatIbuNama = $jemaatIbuNama;
    }
	function setJemaatStatusNikah($jemaatStatusNikah)
    {
        $this->jemaatStatusNikah = $jemaatStatusNikah;
    }
	function setJemaatGender($jemaatGender)
    {
        $this->jemaatGender = $jemaatGender;
    }
	function setJemaatGoldar($jemaatGoldar)
    {
        $this->jemaatGoldar = $jemaatGoldar;
    }
	
	function setAtestasi($atestasi)
    {
        $this->atestasi = $atestasi;
    }
	function setIdUser($iduser)
    {
        $this->iduser = $iduser;
    }
	function setUser($user)
    {
        $this->user = $user;
    }
	
	public function __set($name, $value) {
        if (!isset($this->atestasi)) {
            $this->atestasi = new AtestasiMasuk();
        }
		if (!isset($this->user)) {
            $this->user = new User();
        }
        if (isset($value)) {
            switch ($name) {
                case 'idAtestasiM':
                    $this->atestasi->setIdAtestasiM($value);
                    break;
				case 'alamat':
                    $this->atestasi->setAlamat($value);
                    break;
				case 'namaLengkap':
                    $this->atestasi->setNamaLengkap($value);
                    break;
                default :
                    break;
            }
        }
		if (isset($value)) {
            switch ($name) {
                case 'iduser':
                    $this->user->setIdUser($value);
					$this->setIdUser($value);
                    break;
                case 'nama':
                    $this->user->setNama($value);
                    break;
                default :
                    break;
            }
        }
    }
}