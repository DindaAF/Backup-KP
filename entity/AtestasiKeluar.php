<?php
class AtestasiKeluar
{
    private $idAtestasiK;
    private $noAtestasi;
    private $tglPengajuan;
    private $id_jemaat;
    private $jemaat;
    private $jemaatAlamatBaru;
    private $id_gereja;
    private $namaGereja;
    private $alamatGereja;
    private $alasan;
    private $status;
	private $gereja;
	private $statusJemaat;
	private $tglPersetujuan;
	private $idUser;
	private $master;
	private $buktiAK;
	private $user;
	
    function getIdAtestasiK()
    {
        return $this->idAtestasiK;
    }
    function getNoAtestasi()
    {
        return $this->noAtestasi;
    }
    function getTglPengajuan()
    {
        return $this->tglPengajuan;
    }
    function getId_jemaat()
    {
        return $this->id_jemaat;
    }
    function getJemaat()
    {
        return $this->jemaat;
    }
    function getJemaatAlamatBaru()
    {
        return $this->jemaatAlamatBaru;
    }
    function getId_gereja()
    {
        return $this->id_gereja;
    }
	function getNamaGereja()
    {
        return $this->namaGereja;
    }
    function getAlamatGereja()
    {
        return $this->alamatGereja;
    }
    function getAlasan()
    {
        return $this->alasan;
    }
	function getStatus()
    {
        return $this->status;
    }
	function getGereja()
    {
        return $this->gereja;
    }
	function getStatusJemaat()
    {
        return $this->statusJemaat;
    }
	function getTglPersetujuan()
    {
        return $this->tglPersetujuan;
    }
	function getIdUser()
    {
        return $this->idUser;
    }
	function getMaster()
    {
        return $this->master;
    }
	function getBuktiAK()
    {
        return $this->buktiAK;
    }
	function getUser()
    {
        return $this->user;
    }

    function setIdAtestasiK($idAtestasiK)
    {
        $this->idAtestasiK = $idAtestasiK;
    }
    function setNoAtestasi($noAtestasi)
    {
        $this->noAtestasi = $noAtestasi;
    }
    function setTglPengajuan($tglPengajuan)
    {
        $this->tglPengajuan = $tglPengajuan;
    }
    function setId_jemaat($id_jemaat)
    {
        $this->id_jemaat = $id_jemaat;
    }
    function setJemaat($jemaat)
    {
        $this->jemaat = $jemaat;
    }
    function setJemaatAlamatBaru($jemaatAlamatBaru)
    {
        $this->jemaatAlamatBaru = $jemaatAlamatBaru;
    }
    function setId_gereja($id_gereja)
    {
        $this->id_gereja = $id_gereja;
    }
	function setNamaGereja($namaGereja)
    {
        $this->namaGereja = $namaGereja;
    }
    function setAlamatGereja($alamatGereja)
    {
        $this->alamatGereja = $alamatGereja;
    }
    function setAlasan($alasan)
    {
        $this->alasan = $alasan;
    }
	function setStatus($status)
    {
        $this->status = $status;
    }
	function setGereja($gereja)
    {
        $this->gereja = $gereja;
    }
	function setStatusJemaat($statusJemaat)
    {
        $this->statusJemaat = $statusJemaat;
    }
	function setTglPersetujuan($tglPersetujuan)
    {
        $this->tglPersetujuan = $tglPersetujuan;
    }
	function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
	function setMaster($master)
    {
        $this->master = $master;
    }
	function setBuktiAK($buktiAK)
    {
        $this->buktiAK = $buktiAK;
    }
	function setUser($user)
    {
        $this->user = $user;
    }
	public function __set($name, $value) {
        if (!isset($this->gereja)) {
            $this->gereja = new Gereja();
        }
		if (!isset($this->master)) {
            $this->master = new MasterJemaat();
        }
		if (!isset($this->user)) {
            $this->user = new User();
        }
		if (!isset($this->jemaat)) {
            $this->jemaat = new User();
        }
        if (isset($value)) {
            switch ($name) {
                case 'id_gereja':
                    $this->gereja->setId_gereja($value);
                    break;
                case 'nama_gereja':
                    $this->gereja->setNama($value);
                    break;
                default :
                    break;
            }
        }
		if (isset($value)) {
            switch ($name) {
                case 'id_jemaat':
                    $this->master->setJemaatID($value);
                    break;
                case 'nomor':
                    $this->master->setJemaatNomor($value);
                    break;
                default :
                    break;
            }
        }
		if (isset($value)) {
            switch ($name) {
                case 'id_user' :
					$this->setIdUser($value);
                    $this->user->setIdUser($value);
                    break;
                case 'username' :
                    $this->user->setUsername($value);
                    break;
                case 'nama' :
                    $this->user->setNama($value);
                    break;
                case 'id_role' :
                    $this->user->setIdRole($value);
                    break;
                case 'id_user_jemaat' :
                    $this->jemaat->setIdUser($value);
                    break;
                case 'username_jemaat' :
                    $this->jemaat->setUsername($value);
                    break;
                case 'nama_jemaat' :
                    $this->jemaat->setNama($value);
                    break;
                case 'id_role_jemaat' :
                    $this->jemaat->setIdRole($value);
                    break;
                default :
                    break;
            }
        }
    }
}