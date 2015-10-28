<?php

namespace Alquran\Resource\Ayat;


interface AyatInterface
{
	public function getAyat($surrahNumber, $ayyatNumber);
}