<?php

namespace Ydee\PhoneNumberBundle\Validator\Constraints;

use Attribute;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class PhoneNumber extends Constraint
{
    public string $message = 'This value is not a valid phone number.';
    public ?string $region = null;

    public function __construct(
        ?array $options = null,
        ?string $region = null,
        ?string $message = null,
        ?array $groups = null,
        $payload = null
    ) {
        parent::__construct($options ?? [], $groups, $payload);
        if ($region !== null) {
            $this->region = $region;
        }
        if ($message !== null) {
            $this->message = $message;
        }
    }

    public function getDefaultOption(): ?string
    {
        return 'region';
    }

    public function validatedBy(): string
    {
        return static::class.'Validator';
    }
} 