<?php

namespace SpencerMortensen\Benchmarker\Example;

use SpencerMortensen\Benchmarker\Test;

class ArrayTest implements Test
{
	public function run()
	{
		$t0 = microtime(true);

		array(
			'first' => 'Ann',
			'last' => 'Baker'
		);

		$t1 = microtime(true);

		return $t1 - $t0;
	}
}
