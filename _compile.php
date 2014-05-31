<?php

$out = fopen(__DIR__ . '/apiary.apib', 'w');

$files = array();

$dir = new DirectoryIterator(__DIR__ . '/parts/');
foreach ($dir as $file)
{
	if ($file->isDot()) continue;
	if ($file->getFilename() === '_compile.php') continue;

	$files[$file->getFilename()] = $file->getPathname();
}

ksort($files);

foreach ($files as $filename => $filePath)
{
	echo $filename . "\n";
	fwrite($out, file_get_contents($filePath));
}
