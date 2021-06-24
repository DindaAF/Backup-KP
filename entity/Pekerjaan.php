<?php
class Pekerjaan
{
    private $idPekerjaan;
    private $nama;
    function getIdPekerjaan()
    {
        return $this->idPekerjaan;
    }
    function getNama()
    {
        return $this->nama;
    }
    
    function setIdPekerjaan($idPekerjaan)
    {
        $this->idPekerjaan = $idPekerjaan;
    }
    function setNama($nama)
    {
        $this->nama = $nama;
    }
}