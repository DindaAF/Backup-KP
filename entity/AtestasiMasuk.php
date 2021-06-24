<?php
class AtestasiMasuk
{
    private $idAtestasiM;
    private $noAtestasi;
    private $tglPengajuan;
    private $namaLengkap;
    private $alamat;
    private $email;
    private $noTelp;
    private $noWA;
    private $agama;
    private $gerejaAsal;
    private $status;
    private $pasFoto;
    private $scanAkteBaptisSidi;
    private $suratKeterangan;
	private $tglPersetujuan;
	private $idUser;
	private $statusJemaat;
	private $user;
	private $pengaju;
	private $buktiAM;
	
    function getIdAtestasiM()
    {
        return $this->idAtestasiM;
    }
    function getNoAtestasi()
    {
        return $this->noAtestasi;
    }
    function getTglPengajuan()
    {
        return $this->tglPengajuan;
    }
    function getNamaLengkap()
    {
        return $this->namaLengkap;
    }
    function getAlamat()
    {
        return $this->alamat;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getNoTelp()
    {
        return $this->noTelp;
    }
    function getNoWA()
    {
        return $this->noWA;
    }
    function getAgama()
    {
        return $this->agama;
    }
    function getGerejaAsal()
    {
        return $this->gerejaAsal;
    }
	function getStatus()
    {
        return $this->status;
    }
	function getPasFoto()
    {
        return $this->pasFoto;
    }
	function getScanAkteBaptisSidi()
    {
        return $this->scanAkteBaptisSidi;
    }
	function getSuratKeterangan()
    {
        return $this->suratKeterangan;
    }
	function getTglPersetujuan()
    {
        return $this->tglPersetujuan;
    }
	function getIdUser()
    {
        return $this->idUser;
    }
	function getStatusJemaat()
    {
        return $this->statusJemaat;
    }
	function getUser()
    {
        return $this->user;
    }
	function getPengaju()
    {
        return $this->pengaju;
    }
	function getBuktiAM()
    {
        return $this->buktiAM;
    }

    function setIdAtestasiM($idAtestasiM)
    {
        $this->idAtestasiM = $idAtestasiM;
    }
    function setNoAtestasi($noAtestasi)
    {
        $this->noAtestasi = $noAtestasi;
    }
    function setTglPengajuan($tglPengajuan)
    {
        $this->tglPengajuan = $tglPengajuan;
    }
    function setNamaLengkap($namaLengkap)
    {
        $this->namaLengkap = $namaLengkap;
    }
    function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setNoTelp($noTelp)
    {
        $this->noTelp = $noTelp;
    }
    function setNoWA($noWA)
    {
        $this->noWA = $noWA;
    }
    function setAgama($agama)
    {
        $this->agama = $agama;
    }
    function setGerejaAsal($gerejaAsal)
    {
        $this->gerejaAsal = $gerejaAsal;
    }
	function setStatus($status)
    {
        $this->status = $status;
    }
	function setPasFoto($pasFoto)
    {
        $this->pasFoto = $pasFoto;
    }
	function setScanAkteBaptisSidi($scanAkteBaptisSidi)
    {
        $this->scanAkteBaptisSidi = $scanAkteBaptisSidi;
    }
	function setSuratKeterangan($suratKeterangan)
    {
        $this->suratKeterangan = $suratKeterangan;
    }
	function setTglPersetujuan($tglPersetujuan)
    {
        $this->tglPersetujuan = $tglPersetujuan;
    }
	function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
	function setStatusJemaat($statusJemaat)
    {
        $this->statusJemaat = $statusJemaat;
    }
	function setUser($user)
    {
        $this->user = $user;
    }
	function setPengaju($pengaju)
    {
        $this->pengaju = $pengaju;
    }
	function setBuktiAM($buktiAM)
    {
        $this->buktiAM = $buktiAM;
    }
	
	public function __set($name, $value) {
        if (!isset($this->user)) {
            $this->user = new User();
        }
		if (!isset($this->pengaju)) {
            $this->pengaju = new User();
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
                case 'id_user_pengaju' :
                    $this->pengaju->setIdUser($value);
                    break;
                case 'username_pengaju' :
                    $this->pengaju->setUsername($value);
                    break;
                case 'nama_pengaju' :
                    $this->pengaju->setNama($value);
                    break;
                case 'id_role_pengaju' :
                    $this->pengaju->setIdRole($value);
                    break;
                default :
                    break;
            }
        }
    }
}