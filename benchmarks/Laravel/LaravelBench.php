<?php
declare(strict_types=1);

namespace Scyzoryck\Benchmarks\Laravel;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use Scyzoryck\Benchmarks\Abstract\AbstractValidatorBench;

require_once __DIR__  . '/vendor/autoload.php';

final class LaravelBench extends AbstractValidatorBench
{
    private Factory $factory;

    public function __construct()
    {
        $loader = new ArrayLoader();
        $translator = new Translator($loader, 'en_US');
        $this->factory = new Factory($translator);
    }

    public function benchConsume(): void
    {
        $this->factory->make(self::INPUT, [
            'customer.firstname' => 'required|string',
            'customer.surname' => 'required|string',
            'email' => 'required|email',
            'age'=> 'required|min:18|max:100',
            'null'=> 'nullable',
            'tags' => 'array|size:3',
        ]);
    }
}
