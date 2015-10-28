<?php

use Alquran\Resource\Component\RandomAlquran\RandomAyat;

interface RandomAyatInterface
{
	public function getTotalSurrah();

	public function setTotalSurrah($surrahNumber);

	public function randomSurrah();

	public function randomAyat($surrahNumber, $ayatNumber);
}