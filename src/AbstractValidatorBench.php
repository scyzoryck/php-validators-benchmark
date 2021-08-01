<?php
declare(strict_types=1);

namespace Scyzoryck\Benchmarks\Abstract;


use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

abstract class AbstractValidatorBench
{
    protected const  INPUT = [
        'customer' => [
            'firstname' => 'Marcin', //string, not empty
            'surname' => 'Czarnecki', //string, not empty
        ],
        'email' => 'scyzoryck@gmail.com', // not empty, email
        'age' => 50, // int, min 18, max 100
        'null' => null, // null
        'tags' => ['array', 'contains', 'tags'], // not empty, length = 3
    ];

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    abstract public function benchConsume(): void;
}
