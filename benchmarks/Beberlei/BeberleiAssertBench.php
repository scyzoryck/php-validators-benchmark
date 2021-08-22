<?php
declare(strict_types=1);

namespace Scyzoryck\Benchmarks\Validators\Beberlei;

use Assert\Assertion;
use Scyzoryck\Benchmarks\Abstract\AbstractValidatorBench;

require_once __DIR__  . '/vendor/autoload.php';

final class BeberleiAssertBench extends AbstractValidatorBench
{
    public function benchConsume(): void
    {
        Assertion::string(self::INPUT['customer']['firstname']);
        Assertion::notEmpty(self::INPUT['customer']['firstname']);

        Assertion::string(self::INPUT['customer']['surname']);
        Assertion::notEmpty(self::INPUT['customer']['surname']);

        Assertion::notEmpty(self::INPUT['email']);
        Assertion::email(self::INPUT['email']);

        Assertion::integer(self::INPUT['age']);
        Assertion::range(self::INPUT['age'], 18, 100);

        Assertion::null(self::INPUT['null']);

        Assertion::isArray(self::INPUT['tags']);
        Assertion::count(self::INPUT['tags'], 3);
    }
}
