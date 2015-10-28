<?php 

namespace Alquran\Resource\Arabic\DataSource;

use Alquran\Resource\Arabic\DataSource\DataArabicInterface;
use Alquran\Resource\AlquranRepository\AlquranRepositoryInterface;
use Alquran\Resource\Ayat\Collection\InitAyat\MakeAyat;

class DataArabic implements DataArabicInterface, AlquranRepositoryInterface
{
	protected $dataSource;

	protected $alquranSurrahAyat;

	public function __construct()
	{
		$this->dataSource = require_once __DIR__ . '/../../../../../data/quran-uthmani/quran-uthmani.php';

		$this->parsingAlquran();
	}

	public function getDataAlquran()
	{
		return $this->alquranSurrahAyat;
	}

	public function parsingAlquran()
	{
		foreach ($this->dataSource as $surrahNumber => $ayat) {
			foreach($ayat as $ayatNumber => $content) {
				$makeAyat = new MakeAyat;

				$this->alquranSurrahAyat[$surrahNumber][$ayatNumber] = $makeAyat->init($surrahNumber, $ayatNumber, $content);
			}
		}
	}
}