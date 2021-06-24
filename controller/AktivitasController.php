<?php
class AktivitasController
{
    private $aktDaoImplement;
	private $uDaoImplement;
    function __construct()
    {
        $this->aktDaoImplement = new AktivitasDaoImpl();
		$this->uDaoImplement = new UserDaoImpl();
    }
    public function riwayat_kegiatan()
    {
        $btnSubmit = FILTER_INPUT(INPUT_POST, 'btnSubmit');
		$result2 = $this->uDaoImplement->getAllUser();
		$result = $this->aktDaoImplement->fetchAktivitas();
		require_once 'riwayat_kegiatan.php';
    }
	
	public function riwayat_aktivitas()
	{
		$result = $this->aktDaoImplement->fetchAktivitas();
		require_once 'riwayat_aktivitas.php';
	}
}