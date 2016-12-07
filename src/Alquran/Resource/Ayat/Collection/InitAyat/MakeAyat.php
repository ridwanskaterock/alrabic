<?php 

namespace Alquran\Resource\Ayat\Collection\InitAyat;

class MakeAyat implements MakeAyatInterface
{
	public $alquranSurrahAyat;

	public $surrahNumber;

	public $ayatNumber;

	public $content;

	public function init($surrahNumber, $ayatNumber, $content)
	{
		$this->setSurrahNumber($surrahNumber);
		$this->setAyatNumber($ayatNumber);
		$this->setContent($content);

		return $this;
	}

	public function setSurrahNumber($surrahNumber)
	{
		if ($surrahNumber) {
			$this->surrahNumber = $surrahNumber;
		}
	}

	public function getSurrahNumber()
	{
		return $this->surrahNumber;
	}

	public function setAyatNumber($ayatNumber)
	{
		$this->ayatNumber = $ayatNumber;
	}

	public function getAyatNumber()
	{
		return $this->ayatNumber;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function translate($dataSource)
	{
		$surrahNumber = $this->getSurrahNumber();
		$ayatNumber = $this->getAyatNumber();
		$translated = $dataSource->getAyat($surrahNumber, $ayatNumber);

		return $translated->getContent();
	}
}