<?php
class KematianController
{
    private $kematianDaoImplement;
	private $roleKematianDaoImplement;
    function __construct()
    {
        $this->kematianDaoImplement = new KematianDaoImpl();
		$this->roleKematianDaoImplement = new RoleKematianDaoImpl();
    }
    public function kematianMasukPage()
    {
        $btnSaveKematian = FILTER_INPUT(INPUT_POST, 'btnSaveKematian');
        if ($btnSaveKematian) {
            $msg = 'gagal';
            $txtnamaJemaat = FILTER_INPUT(INPUT_POST, 'namaJemaat');
            $txtalamatJemaat = FILTER_INPUT(INPUT_POST, 'alamatJemaat');
            $txttglMeninggal = FILTER_INPUT(INPUT_POST, 'tglMeninggal');
			$tglMeninggal = new DateTime($txttglMeninggal);
            $txtketerangan = FILTER_INPUT(INPUT_POST, 'keterangan');
            $txtroleKematian = FILTER_INPUT(INPUT_POST, 'roleKematian');
            $txtlokasiPemakaman = FILTER_INPUT(INPUT_POST, 'lokasiPemakaman');
            $txttglPemakaman = FILTER_INPUT(INPUT_POST, 'tglPemakaman');
			$tglPemakaman = new DateTime($txttglPemakaman);
			$txtyangMelayani = FILTER_INPUT(INPUT_POST, 'yangMelayani');

            $addKematian = new Kematian();
            $addKematian->setNamaJemaat($txtnamaJemaat);
            $addKematian->setAlamatJemaat($txtnamaJemaat);
            $addKematian->setTglMeninggal($txttglMeninggal);
            $addKematian->setKeterangan($txtketerangan);
            $addKematian->setRoleKematian($txtroleKematian);
            $addKematian->setLokasiPemakaman($txtlokasiPemakaman);
            $addKematian->setTglPemakaman($txttglPemakaman);
            $addKematian->setYangMelayani($txtyangMelayani);
            $msg = $this->kematianDaoImplement->insertKematian($addKematian);
			header("location:/CobaKP/index.php?menu=kematian&message=".$msg);
        }
		$result2 = $this->roleKematianDaoImplement->fetchRole();
		$result = $this->kematianDaoImplement->fetchKematian();
		
        require_once 'data_kematian.php';
    }
}