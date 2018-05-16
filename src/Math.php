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

class Math
{
	public function getMean($values)
	{
		$sum = 0;
		$count = 0;

		foreach ($values as $value) {
			$sum += $value;
			++$count;
		}

		if ($count === 0) {
			return null;
		}

		return $sum / $count;
	}

	public function getSampleStandardDeviation($values, $mean)
	{
		$sum = 0;
		$count = 0;

		foreach ($values as $value) {
			$delta = $value - $mean;

			$sum += $delta * $delta;
			++$count;
		}

		if ($count < 2) {
			return null;
		}

		return sqrt($sum / ($count - 1));
	}
}
