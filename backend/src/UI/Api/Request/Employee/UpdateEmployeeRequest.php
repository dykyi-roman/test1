<?php

declare(strict_types=1);

namespace UI\Api\Request\Employee;

use Component\Employee\Enum\Currency;
use Component\Employee\Model\Money;
use Symfony\Component\Validator\Constraints as Assert;

final readonly class UpdateEmployeeRequest
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(min: 3, max: 255)]
        public string $firstName,
        #[Assert\NotBlank]
        #[Assert\Length(min: 3, max: 255)]
        public string $lastName,
        #[Assert\NotBlank]
        public int $salary,
        #[Assert\NotBlank]
        public string $currency,
    ) {
    }

    public function money(): Money
    {
        return new Money($this->salary, Currency::from($this->currency));
    }
}
