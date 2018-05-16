<?php

namespace SpencerMortensen\Benchmarker\Example;

use SpencerMortensen\Benchmarker\Benchmarker;

require __DIR__ . '/autoload.php';

$tests = array(
	'array' => array(new ArrayTest(), 10000),
	'object' => array(new ObjectTest(), 10000)
);

$benchmarker = new Benchmarker();
$results = $benchmarker->run($tests);

echo $results, "\n";
