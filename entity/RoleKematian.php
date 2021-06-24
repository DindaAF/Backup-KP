<?php
class RoleKematian
{
    private $idRoleK;
    private $nama;
    function getIdRolek()
    {
        return $this->idRoleK;
    }
    function getNama()
    {
        return $this->nama;
    }
    
    function setIdRolek($idRoleK)
    {
        $this->idRoleK = $idRoleK;
    }
    function setNama($nama)
    {
        $this->nama = $nama;
    }
	
    public function __set($name, $value) {
        if (isset($value)) {
            switch ($name) {
                case 'id_roleK' :
                    $this->setIdRolek($value);
                    break;
                default :
                    break;
            }
        }
    }
}