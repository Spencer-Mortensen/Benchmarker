<?php

namespace SpencerMortensen\Benchmarker\Example;

class Name
{
	/** @var string */
	private $first;

	/** @var string */
	private $last;

	public function __construct($first, $last)
	{
		$this->first = $first;
		$this->last = $last;
	}

	public function getFirst()
	{
		return $this->first;
	}

	public function getLast()
	{
		return $this->last;
	}
}
