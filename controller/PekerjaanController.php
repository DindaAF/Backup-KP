<?php
class PekerjaanController
{
    private $pekerjaanDaoImplement;
    function __construct()
    {
        $this->pekerjaanDaoImplement = new PekerjaanDaoImpl();
    }
    
	public function dataPribadiPage()
	{
		$result = $this->pekerjaanDaoImplement->fetchPekerjaan();
		require_once 'data_pribadi.php';
	}
}