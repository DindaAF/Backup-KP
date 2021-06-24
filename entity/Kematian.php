<?php
class Kematian
{
    private $idKematian;
    private $namaJemaat;
	private $alamatJemaat;
    private $tglMeninggal;
    private $keterangan;
    private $roleKematian;
    private $lokasiPemakaman;
    private $tglPemakaman;
    private $yangMelayani;
	
    function getIdKematian()
    {
        return $this->idKematian;
    }
    function getNamaJemaat()
    {
        return $this->namaJemaat;
    }
	function getAlamatJemaat()
    {
        return $this->alamatJemaat;
    }
    function getTglMeninggal()
    {
        return $this->tglMeninggal;
    }
    function getKeterangan()
    {
        return $this->keterangan;
    }
	function getRoleKematian()
    {
        return $this->roleKematian;
    }
    function getLokasiPemakaman()
    {
        return $this->lokasiPemakaman;
    }
    function getTglPemakaman()
    {
        return $this->tglPemakaman;
    }
    function getYangMelayani()
    {
        return $this->yangMelayani;
    }

    function setIdKematian($idKematian)
    {
        $this->idKematian = $idKematian;
    }
    function setNamaJemaat($namaJemaat)
    {
        $this->namaJemaat = $namaJemaat;
    }
	function setAlamatJemaat($alamatJemaat)
    {
        $this->alamatJemaat = $alamatJemaat;
    }
    function setTglMeninggal($tglMeninggal)
    {
        $this->tglMeninggal = $tglMeninggal;
    }
    function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
    }
	function setRoleKematian($roleKematian)
    {
        $this->roleKematian = $roleKematian;
    }
    function setLokasiPemakaman($lokasiPemakaman)
    {
        $this->lokasiPemakaman = $lokasiPemakaman;
    }
    function setTglPemakaman($tglPemakaman)
    {
        $this->tglPemakaman = $tglPemakaman;
    }
    function setYangMelayani($yangMelayani)
    {
        $this->yangMelayani = $yangMelayani;
    }
}