<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

require_once __DIR__ . '/vendor/autoload.php';


$sourceQuranBahasa = new Alquran\Resource\AlquranRepository\AlquranRepositoryBahasa\AlquranRepositoryBahasa;
$sourceQuranArabic = new Alquran\Resource\Arabic\DataSource\DataArabic;

$alquranArabic = new Alquran\Resource\Arabic\Ayat\Ayat($sourceQuranArabic);
$alquranBahasa = new Alquran\Resource\Ayat\Ayat($sourceQuranBahasa);

$surrah = new Alquran\Resource\Surrah\Surrah;

$surrahNumber = 30;
$alquranArabic->setSurrahNumber($surrahNumber);

$html = "<h3>Menampilkan surat ".$alquranArabic->getSurrahName()." ke ".$alquranArabic->getSurrahNumber()." </h3><br>";

foreach ($alquranArabic->getSurrah() as $ayat) {
	$html .= $ayat->getAyatNumber() . ') ' . $ayat->getContent();
	$html .= "<br>";
	$html .= $ayat->translate($alquranBahasa);
	$html .= "<br>";
	$html .= "<br>";
}

echo $html;