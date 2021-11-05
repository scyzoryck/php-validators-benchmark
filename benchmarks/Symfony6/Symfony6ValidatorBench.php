<?php
declare(strict_types=1);

namespace Scyzoryck\Benchmarks\Validators\Symfony6;


use Scyzoryck\Benchmarks\Abstract\AbstractValidatorBench;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

require_once __DIR__  . '/vendor/autoload.php';

final class Symfony6ValidatorBench extends AbstractValidatorBench
{
    private ValidatorInterface $validator;

    private Assert\Collection $constraints;

    public function __construct()
    {
        $this->validator = Validation::createValidator();
        $this->constraints = new Assert\Collection([
            'customer' => new Assert\Collection([
                'firstname' => new Assert\Type('string'),
                'surname' => new Assert\Type('string'),
            ]),
            'email' => new Assert\Email(),
            'age' => new Assert\Range(min: 18, max: 100),
            'null' => new Assert\IsNull(),
            'tags' => new Assert\Count(3)
        ]);
    }

    public function benchConsume():void
    {
        $this->validator->validate(self::INPUT, $this->constraints);
    }
}
