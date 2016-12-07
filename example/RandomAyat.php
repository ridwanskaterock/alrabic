<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
require_once __DIR__ . '/../vendor/autoload.php';

$sourceQuranBahasa = new Alquran\Resource\AlquranRepository\AlquranRepositoryBahasa\AlquranRepositoryBahasa;
$sourceQuranArabic = new Alquran\Resource\Arabic\DataSource\DataArabic;

$alquranArabic = new \Alquran\Resource\Ayat\Ayat($sourceQuranArabic);
$alquranBahasa = new \Alquran\Resource\Ayat\Ayat($sourceQuranBahasa);

$surrah = new Alquran\Resource\Surrah\Surrah;

$alquranArabic = new Alquran\Resource\Component\RandomAlquran\RandomAyat\RandomAyat($sourceQuranArabic);

$alquranArabic->setSurrahNumber(rand(1, $alquranArabic->getTotalSurrah()));
$content = $alquranArabic->randomAyat();

$html = "<i><span style='font-size:36'>\"</span><span style='font-size:20'>".$content->translate($alquranBahasa)."</span><span style='font-size:36'>\"</span>";
$html .= "<br>";
$html .= "- Surat " . $alquranArabic->getSurrahName(). " Ayat " . $alquranArabic->getSurrahNumber();;

echo $html;
