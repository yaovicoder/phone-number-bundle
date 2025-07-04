<?php

namespace Ydee\PhoneNumberBundle\Tests\Validator\Constraints;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;
use Ydee\PhoneNumberBundle\Validator\Constraints\PhoneNumber;
use Ydee\PhoneNumberBundle\Validator\Constraints\PhoneNumberValidator;

class PhoneNumberValidatorTest extends ConstraintValidatorTestCase
{
    protected function createValidator(): PhoneNumberValidator
    {
        return new PhoneNumberValidator();
    }

    public function testValidPhoneNumber(): void
    {
        $constraint = new PhoneNumber(['region' => 'FR']);
        $this->validator->validate('+33612345678', $constraint);
        $this->assertNoViolation();
    }

    public function testInvalidPhoneNumber(): void
    {
        $constraint = new PhoneNumber(['region' => 'FR']);
        $this->validator->validate('12345', $constraint);
        $this->buildViolation($constraint->message)->assertRaised();
    }

    public function testEmptyValue(): void
    {
        $constraint = new PhoneNumber(['region' => 'FR']);
        $this->validator->validate('', $constraint);
        $this->assertNoViolation();
    }

    public function testNullValue(): void
    {
        $constraint = new PhoneNumber(['region' => 'FR']);
        $this->validator->validate(null, $constraint);
        $this->assertNoViolation();
    }

    public function testNonStringValue(): void
    {
        $constraint = new PhoneNumber(['region' => 'FR']);
        $this->expectException(\Symfony\Component\Validator\Exception\UnexpectedValueException::class);
        $this->validator->validate(123456, $constraint);
    }

    public function testInternationalPhoneNumber(): void
    {
        $constraint = new PhoneNumber();
        $this->validator->validate('+33612345678', $constraint);
        $this->assertNoViolation();
    }

    public function testInvalidUSPhoneNumber(): void
    {
        $constraint = new PhoneNumber(['region' => 'US']);
        $this->validator->validate('12345', $constraint);
        $this->buildViolation($constraint->message)->assertRaised();
    }

    public function testCustomErrorMessage(): void
    {
        $customMessage = 'Please enter a valid phone number.';
        $constraint = new PhoneNumber(['message' => $customMessage]);
        $this->validator->validate('invalid', $constraint);
        $this->buildViolation($customMessage)->assertRaised();
    }
} 