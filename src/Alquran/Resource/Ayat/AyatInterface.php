<?php

namespace Alquran\Resource\Ayat;


interface AyatInterface
{
	public function getAyat($surrahNumber, $ayyatNumber);

	public function getSurrah($surrahNumber);
}