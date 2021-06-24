<?php
class MasterJemaatController
{
    private $masterJemaatDaoImplement;
    function __construct()
    {
        $this->masterJemaatDaoImplement = new MasterJemaatDaoImpl();
    }
    
	public function MasterPage()
    {
        $result = $this->masterJemaatDaoImplement->fetchMaster();
        require_once 'data_pribadi.php';
    }
}