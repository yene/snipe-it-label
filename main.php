<?php
require __DIR__ . '/vendor/autoload.php';

use chillerlan\QRCode\{QRCode, QROptions};

$columnCount = 3;
$rowCount = 8;
$companyName = 'ACME corp'

$perPage = $columnCount*$rowCount;

$inputFilename = 'all.csv';
$outputFilename = 'all.html';

$options = new QROptions([
		'addQuietzone'      => false,
	]);

$exclude = file('exclude.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$csvFile = file($inputFilename);
$data = [];
$isHead = true;
foreach ($csvFile as $line) {
	if ($isHead) {
		$isHead = false;
		continue;
	}
	$line = str_getcsv($line);
  $tag = trim($line[0]);
  if (in_array($tag, $exclude)) {
    continue;
  }
  $serial = trim($line[1]);
	$data[] = array(
		'tag' => $tag,
		'serial' => $serial,
		'svg' => (new QRCode($options))->render(trim($line[0])),
	);
}

$pages = array_chunk($data, $perPage);

ob_start();
include('template.php');
$renderedHTML = ob_get_clean();
file_put_contents($outputFilename, $renderedHTML);
?>
