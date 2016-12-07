
Alrabic - Alquran Multi Lang
============

Al-quran dengan multi bahasa, bahasa indonesia, arab dan dapat juga di terjemahkan ke bahasa lain

Author
-------
* Muhamad Ridwan
* ridwanskaterocks@gmail.com

Requirements
------------

	- PHP 5.5 or Higher


Instalasi
-----------
```bash
$ composer require ridwanskaterock/alrabic dev-master
```



Bagaimana cara menggunakannya?
-----------
untuk alquran general dengan bahasa indonesia dan arab
```php	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
require_once __DIR__ . '/../vendor/autoload.php';

$sourceQuranBahasa = new Alquran\Resource\AlquranRepository\AlquranRepositoryBahasa\AlquranRepositoryBahasa;
$sourceQuranArabic = new Alquran\Resource\Arabic\DataSource\DataArabic;

$alquranArabic = new \Alquran\Resource\Ayat\Ayat($sourceQuranArabic);
$alquranBahasa = new \Alquran\Resource\Ayat\Ayat($sourceQuranBahasa);

$surrah = new Alquran\Resource\Surrah\Surrah;

$surrahNumber = 11;
$alquranBahasa->setSurrahNumber($surrahNumber);
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

```

menampilkan ayat secara acak

```php	

$alquranArabic = new Alquran\Resource\Component\RandomAlquran\RandomAyat\RandomAyat($sourceQuranArabic);

$alquranArabic->setSurrahNumber(rand(1, $alquranArabic->getTotalSurrah()));
$content = $alquranArabic->randomAyat();

$html = "<i><span style='font-size:36'>\"</span><span style='font-size:20'>".$content->translate($alquranBahasa)."</span><span style='font-size:36'>\"</span>";
$html .= "<br>";
$html .= "- Surat " . $alquranArabic->getSurrahName(). " Ayat " . $alquranArabic->getSurrahNumber();

echo $html;
```
