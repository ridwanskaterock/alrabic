<?php

namespace Alquran\Resource\Ayat;

use Alquran\Resource\Alquran\CommonAlquran;

class Ayat extends CommonAlquran implements AyatInterface
{
	public function __construct($alquranRepository)
	{
		$this->alquranRepository = $alquranRepository->getDataAlquran();
	}
}
