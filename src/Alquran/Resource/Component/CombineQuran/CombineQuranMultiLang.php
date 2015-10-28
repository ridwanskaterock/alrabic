<?php

namespace Alquran\Resource\Component\CombineQuran;

use Alquran\Resource\Component\CombineQuran\CombineQuranMultiLangInterface;

class CombineQuranMultiLang implements CombineQuranMultiLangInterface
{
	public function combine($arabicDataSource, $anyDataSource)
	{
		return [$arabicDataSource, $anyDataSource];
	}
}