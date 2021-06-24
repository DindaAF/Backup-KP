<?php
class RoleKematianController
{
    private $roleKematianDaoImplement;
    function __construct()
    {
        $this->roleKematianDaoImplement = new RoleKematianDaoImpl();
    }
    
	public function kematianMasukPage()
	{
		$result = $this->roleKematianDaoImplement->fetchRole();
		require_once 'data_kematian.php';
	}
}