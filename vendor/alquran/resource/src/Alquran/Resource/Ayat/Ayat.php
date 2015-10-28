<?php

namespace Alquran\Resource\Ayat;

use Alquran\Resource\AlquranRepository\AlquranRepositoryBahasa;

class Ayat implements AyatInterface
{
	protected $surrahNumber;

	protected $surrahNumber;

	protected $response;

	protected $alquranRepository;

	public function __construct()
	{
		$this->alquranRepository = new AlquranRepositoryBahasa;
	}

	public function getAyat($surrahNumber, $ayatNumber)
	{
		return $this->alquranRepository[$surrahNumber . ':' . $ayatNumber];
	}
}