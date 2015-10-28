<?php 

namespace Alquran\Resource\AlquranRepository\AlquranRepositoryBahasa;

use Alquran\Resource\AlquranRepository\AlquranRepositoryInterface;
use Alquran\Resource\Ayat\Collection\InitAyat\MakeAyat;

class AlquranRepositoryBahasa implements AlquranRepositoryInterface
{
	protected $alquran;

	protected $alquranSurrahAyat;

	public function __construct()
	{
		$fileName = 'indonesian-ministry.txt';
		$file = __DIR__ . '/../../../../../data/' . $fileName;

		$contentBahasa = file_get_contents($file);

		$this->alquran = $contentBahasa;
	}

	public function getDataAlquran()
	{
		$alquranArray = explode("\n", $this->alquran);

		foreach ($alquranArray as $surrahAyats) {
			$dataSegment = explode('|', $surrahAyats);

			if (count($dataSegment) === 3) {
				$surrahNumber = $dataSegment[0];
				$ayatNumber = $dataSegment[1];
				$content = $dataSegment[2];

				$makeAyat = new MakeAyat;

				$this->alquranSurrahAyat[$surrahNumber][$ayatNumber] = $makeAyat->init($surrahNumber, $ayatNumber, $content);
			}
		}

		return $this->alquranSurrahAyat;
	}
}