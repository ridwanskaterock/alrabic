<?php

namespace Alquran\Resource\Component\RandomAlquran\RandomAyat;

use Alquran\Resource\Component\RandomAlquran\RandomAyat\RandomAyatInterface;
use Alquran\Resource\Ayat\Ayat;

class RandomAyat extends Ayat
{
	protected $alquranRespository;

	protected $totalSurrah;

	public function __construct($alquranRespository)
	{
		parent::__construct($alquranRespository);

		$this->alquranRespository = $alquranRespository->getDataAlquran();
		$this->setTotalSurrah(count($this->alquranRespository));
	}

	public function getTotalSurrah()
	{
		return $this->totalSurrah;
	}

	public function setTotalSurrah($totalSurrah)
	{
		if (isset($totalSurrah) AND !empty($totalSurrah)) {
			$this->totalSurrah = $totalSurrah;
		}
	}

	public function randomSurrah()
	{
		$totalSurrah = $this->getTotalSurrah();
		$idxRandomSurrah = rand(0, $totalSurrah);
		$randomSurrah = $this->getSurrah($idxRandomSurrah);

		return $randomSurrah;
	}

	public function randomAyat($surrahNumber = NULL)
	{
		$this->setSurrahNumber($surrahNumber);
		$surrah = $this->getSurrah($surrahNumber);
		$totalAyat = count($surrah);
		$idxRandomAyat = rand(1, $totalAyat);
		$randomAyat = $surrah[$idxRandomAyat];
		
		return $randomAyat;
	}
}