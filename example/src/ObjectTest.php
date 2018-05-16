<?php

namespace SpencerMortensen\Benchmarker\Example;

use SpencerMortensen\Benchmarker\Test;

class ObjectTest implements Test
{
	public function run()
	{
		$t0 = microtime(true);

		new Name('Ann', 'Baker');

		$t1 = microtime(true);

		return $t1 - $t0;
	}
}
