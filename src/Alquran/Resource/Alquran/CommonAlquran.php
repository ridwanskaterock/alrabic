<?php 

namespace Alquran\Resource\Alquran;

use Alquran\Resource\Ayat\AyatInterface;
use Alquran\Resource\Ayat\Collection\InitAyat\MakeAyat;
use Alquran\Resource\Surrah\Surrah;

class CommonAlquran implements AyatInterface
{
	protected $surrahNumber;

	protected $ayatNumber;

	protected $response;

	protected $alquranRepository;

	protected $surrah;

	public function setAyatNumber($ayatNumber)
	{
		if (isset($ayatNumber)) {
			$this->ayatNumber = $ayatNumber;
		}
	}

	public function getAyatNumber()
	{
		return $this->ayatNumber;
	}

	public function setSurrahNumber($surrahNumber)
	{
		if (isset($surrahNumber)) {
			$this->surrahNumber = $surrahNumber;
		}
	}

	public function getSurrahNumber()
	{
		return $this->surrahNumber;
	}

	public function getAyat($surrahNumber = NULL, $ayatNumber = NULL)
	{
		$this->setSurrahNumber($surrahNumber);
		$this->setAyatNumber($ayatNumber);

		$ayat = isset($this->alquranRepository[$this->surrahNumber][$this->ayatNumber]) ?
					$this->alquranRepository[$this->surrahNumber][$this->ayatNumber] : '';

		return $ayat;
	}

	public function getSurrah($surrahNumber = NULL)
	{
		$this->setSurrahNumber($surrahNumber);

		$surrah = isset($this->alquranRepository[$this->surrahNumber]) ?
					$this->alquranRepository[$this->surrahNumber] : '';

		return $surrah;
	}

	public function getSurrahName()
	{
		$surrahRepository = new Surrah;
		$surrah = $surrahRepository->findOneSurrah($this->surrahNumber);

		return $surrah['arabic_name'];
	}

	public function translate(MakeAyat $ayat)
	{
		$surrahNumber = $ayat->getSurrahNumber();
		$ayatNumber = $ayat->getAyatNumber();
		$translated = $this->getAyat($surrahNumber, $ayatNumber);

		return $translated->getContent();
	}
}