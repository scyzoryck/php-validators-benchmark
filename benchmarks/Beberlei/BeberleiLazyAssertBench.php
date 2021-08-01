<?php
declare(strict_types=1);

namespace Scyzoryck\Benchmarks\Validators\Webmozart;

use Assert\Assert;
use Scyzoryck\Benchmarks\Abstract\AbstractValidatorBench;

require_once __DIR__  . '/vendor/autoload.php';

final class BeberleiLazyAssertBench extends AbstractValidatorBench
{
    public function benchConsume(): void
    {
        Assert::lazy()
            ->that(self::INPUT['customer']['firstname'], 'customer.firstname')->string()->notEmpty()
            ->that(self::INPUT['customer']['surname'], 'customer.surname')->string()->notEmpty()
            ->that(self::INPUT['email'], 'email')->email()->notEmpty()
            ->that(self::INPUT['age'], 'age')->range(18, 100)
            ->that(self::INPUT['null'], 'null')->null()
            ->that(self::INPUT['tags'], 'tags')->isArray()->count(3)
            ->verifyNow();
    }
}
