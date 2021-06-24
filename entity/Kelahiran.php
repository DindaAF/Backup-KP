<?php
class Kelahiran
{
    private $idKelahiran;
    private $noAkte;
    private $namaAyah;
    private $namaIbu;
    private $namaAnak;
    private $jk;
    private $tglLahir;
    private $goldar;
    private $idUser;
    private $tglPelapor;
	private $user;
	
    function getIdKelahiran()
    {
        return $this->idKelahiran;
    }
    function getNoAkte()
    {
        return $this->noAkte;
    }
    function getNamaAyah()
    {
        return $this->namaAyah;
    }
    function getNamaIbu()
    {
        return $this->namaIbu;
    }
    function getNamaAnak()
    {
        return $this->namaAnak;
    }
    function getJk()
    {
        return $this->jk;
    }
    function getTglLahir()
    {
        return $this->tglLahir;
    }
    function getGoldar()
    {
        return $this->goldar;
    }
    function getIdUser()
    {
        return $this->idUser;
    }
    function getUser()
    {
        return $this->user;
    }
    function getTglPelapor()
    {
        return $this->tglPelapor;
    }

    function setIdKelahiran($idKelahiran)
    {
        $this->idKelahiran = $idKelahiran;
    }
    function setNoAkte($noAkte)
    {
        $this->noAkte = $noAkte;
    }
    function setNamaAyah($namaAyah)
    {
        $this->namaAyah = $namaAyah;
    }
    function setNamaIbu($namaIbu)
    {
        $this->namaIbu = $namaIbu;
    }
    function setNamaAnak($namaAnak)
    {
        $this->namaAnak = $namaAnak;
    }
    function setJk($jk)
    {
        $this->jk = $jk;
    }
    function setTglLahir($tglLahir)
    {
        $this->tglLahir = $tglLahir;
    }
    function setGoldar($goldar)
    {
        $this->goldar = $goldar;
    }
    function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
	
    function setUser($user)
    {
        $this->user = $user;
    }
    function setTglPelapor($tglPelapor)
    {
        $this->tglPelapor = $tglPelapor;
    }
    public function __set($name, $value) {
        if (!isset($this->user)) {
            $this->user = new User();
        }
        if (isset($value)) {
            switch ($name) {
                case 'id_user':
                    $this->user->setIdUser($value);
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