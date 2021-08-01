<?php
declare(strict_types=1);

namespace Scyzoryck\Benchmarks\Validators\Webmozart;

use Scyzoryck\Benchmarks\Abstract\AbstractValidatorBench;
use Webmozart\Assert\Assert;

require_once __DIR__  . '/vendor/autoload.php';

final class WebmozartValidatorBench extends AbstractValidatorBench
{
    public function benchConsume(): void
    {
        Assert::string(self::INPUT['customer']['firstname']);
        Assert::notEmpty(self::INPUT['customer']['firstname']);

        Assert::string(self::INPUT['customer']['surname']);
        Assert::notEmpty(self::INPUT['customer']['surname']);

        Assert::notEmpty(self::INPUT['email']);
        Assert::email(self::INPUT['email']);

        Assert::integer(self::INPUT['age']);
        Assert::range(self::INPUT['age'], 18, 100);

        Assert::null(self::INPUT['null']);

        Assert::isArray(self::INPUT['tags']);
        Assert::count(self::INPUT['tags'], 3);
    }
}
