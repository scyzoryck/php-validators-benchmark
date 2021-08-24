<?php
declare(strict_types=1);

namespace Scyzoryck\Benchmarks\Laminas;

use Laminas\Validator;
use Scyzoryck\Benchmarks\Abstract\AbstractValidatorBench;

require_once __DIR__ . '/vendor/autoload.php';

final class LaminasBench extends AbstractValidatorBench
{
    public function benchConsume(): void
    {
        (new Validator\StringLength(['min' => 0]))->isValid(self::INPUT['customer']['firstname']);
        (new Validator\StringLength(['min' => 0]))->isValid(self::INPUT['customer']['surname']);
        (new Validator\EmailAddress())->isValid(self::INPUT['email']);
        (new Validator\Between(['min' => 18, 'max' => 100]))->isValid(self::INPUT['age']);
        (new Validator\Identical(['token' => null]))->isValid(self::INPUT['null']);
        (new Validator\Callback(fn($value) => \is_array($value) && \count($value) === 3))->isValid(self::INPUT['tags']);
    }
}
