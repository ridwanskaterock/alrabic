<?php

namespace Alquran\Resource\Ayat\Collection\InitAyat;

interface MakeAyatInterface
{
	public function setAyatNumber($setAyatNumber);

	public function getAyatNumber();

	public function setSurrahNumber($setSurrahNumber);

	public function getSurrahNumber();

	public function setContent($content);

	public function getContent();
}