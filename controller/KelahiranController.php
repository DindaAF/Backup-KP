<?php
class KelahiranController
{
    private $kelahiranDaoImplement;
    function __construct()
    {
        $this->kelahiranDaoImplement = new KelahiranDaoImpl();
    }
    public function kelahiranMasukPage()
    {
        $btnSaveKelahiran = FILTER_INPUT(INPUT_POST, 'btnSaveKelahiran');
        if ($btnSaveKelahiran) {
            $msg = 'Gagal menambahkan data kelahiran';
            $txtnoAkte = FILTER_INPUT(INPUT_POST, 'noAkte');
            $txtnamaAyah = FILTER_INPUT(INPUT_POST, 'namaAyah');
            $txtnamaIbu = FILTER_INPUT(INPUT_POST, 'namaIbu');
            $txtnamaAnak = FILTER_INPUT(INPUT_POST, 'namaAnak');
            $txtJK = FILTER_INPUT(INPUT_POST, 'jk');
            $txttglLahir = FILTER_INPUT(INPUT_POST, 'tglLahir');
			$tglLahir = new DateTime($txttglLahir);
            $txtgoldar = FILTER_INPUT(INPUT_POST, 'goldar');
            $txtIdPelapor = FILTER_INPUT(INPUT_POST, 'idPelapor');
            $txttglPelapor = FILTER_INPUT(INPUT_POST, 'tglPelapor');
			$tglPelapor = new DateTime($txttglPelapor);
			
            $addKelahiran = new Kelahiran();
            $addKelahiran->setNoAkte($txtnoAkte);
            $addKelahiran->setNamaAyah($txtnamaAyah);
            $addKelahiran->setNamaIbu($txtnamaIbu);
            $addKelahiran->setNamaAnak($txtnamaAnak);
            $addKelahiran->setJK($txtJK);
            $addKelahiran->setTglLahir($txttglLahir);
            $addKelahiran->setGoldar($txtgoldar);
            $addKelahiran->setIdUser($txtIdPelapor);
            $addKelahiran->setTglPelapor($txttglPelapor);

            $msg = $this->kelahiranDaoImplement->insertKelahiran($addKelahiran);
			header("location:/CobaKP/index.php?menu=kelahiran&message=".$msg);
        }
		$result = $this->kelahiranDaoImplement->fetchKelahiran();
        require_once 'kelahiran.php';
    }
}