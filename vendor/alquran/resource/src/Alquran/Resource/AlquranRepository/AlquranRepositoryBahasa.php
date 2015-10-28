<?php 

namespace Alquran\Resource\AlquranRepository;

use Alquran\Resource\AlquranRepository\AlquranRepositoryInterface;

class AlquranRepositoryBahasa implements AlquranRepositoryInterface
{
	protected $alquran;

	protected $alquranSurrahAyat;

	public function __construct()
	{
		$fileName = 'indonesian-ministry.txt';
		$locationSourceBahasa = __DIR__ . '/../../../data/' . $fileName;
		$contentBahasa = file_get_contents($locationSourceBahasa);

		$this->alquran = $contentBahasa;

		return self::getDataAlquran();
	}

	public function getDataAlquran()
	{
		$alquranArray = explode(PHP_EOL, $this->alquran);

		foreach ($alquranArray as $surrahAyats) {
			$explode = explode('|', $surrahAyats);

			if (count($explode) === 3) {
				$surrahNumber = integer $explode[0];
				$ayatNumber = integer $explode[1];
				$content = string $explode[3];

				$this->alquranSurrahAyat[$surrahNumber . ':' . $ayatNumber] = $content;
			}
		}

		return $this->alquranSurrahAyat;
	}
}