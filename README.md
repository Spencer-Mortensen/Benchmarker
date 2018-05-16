# Benchmarker

Benchmark snippets of code, gathering the mean and standard deviation for each snippet

## Example

Here's an example test:

```php
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
```

And here's an example of the benchmarker:

```php
$benchmarker = new Benchmarker();

$tests = array(
	'array' => array(new ArrayTest(), 10000),
);

$results = $benchmarker->run($tests);

echo $results, "\n"; // array: 5.0E-7 +- 1.1E-6
```

See the "example" directory for a working example.


## Installation

This project is available as a [Composer](https://getcomposer.org/) package
([spencer-mortensen/benchmarker](https://packagist.org/packages/spencer-mortensen/benchmarker)):
```
composer require spencer-mortensen/benchmarker
```
