<?php

/**
 * Copyright (C) 2017 Spencer Mortensen
 *
 * This file is part of Benchmarker.
 *
 * Benchmarker is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Benchmarker is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Benchmarker. If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Spencer Mortensen <spencer@lens.guide>
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL-3.0
 * @copyright 2017 Spencer Mortensen
 */

namespace SpencerMortensen\Benchmarker;

class Benchmarker
{
	/** @var Math */
	private $math;

	public function __construct()
	{
		$this->math = new Math();
	}

	public function run(array $tests)
	{
		$output = [];

		foreach ($tests as $name => $properties) {
			list($test, $trials) = $properties;
			list($mean, $std) = $this->runTest($test, $trials);

			$results = self::getResultsText($mean, $std);
			$output[] = "{$name}: {$results}";
		}

		return implode("\n", $output);
	}

	private function runTest(Test $test, $trials)
	{
		$times = [];

		for ($trial = 0; $trial < $trials; ++$trial) {
			$times[] = $test->run();
		}

		$mean = $this->math->getMean($times);
		$std = $this->math->getSampleStandardDeviation($times, $mean);

		return [$mean, $std];
	}

	private static function getResultsText($mean, $std)
	{
		if ($std <= 0) {
			return (string)$mean;
		}

		for ($n = $std, $precision = 1; $n < 1; $n *= 10, ++$precision);

		return round($mean, $precision) . ' +- ' . round($std, $precision);
	}
}
