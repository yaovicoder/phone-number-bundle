# Yz PhoneNumberBundle

Symfony 6.4+ bundle for robust phone number validation and formatting, powered by [libphonenumber](https://github.com/giggsey/libphonenumber-for-php).

## Features
- Phone number validation for Symfony forms and Doctrine entities
- Region-aware validation (optional)
- Inspired by misd/phone-number-bundle, but fully compatible with Symfony 6.4+

## Installation

```
composer require yz/phone-number-bundle giggsey/libphonenumber-for-php
```

## Usage

### 1. Enable the bundle (if not using Symfony Flex)

```php
// config/bundles.php
return [
    // ...
    Yz\PhoneNumberBundle\PhoneNumberBundle::class => ['all' => true],
];
```

### 2. Add the constraint to your entity or form

```php
use Yz\PhoneNumberBundle\Validator\Constraints\PhoneNumber;

class User
{
    #[PhoneNumber(region: 'FR', message: 'Please enter a valid French phone number.')]
    private ?string $phone = null;
}
```

### 3. Customizing
- The `region` option is optional. If omitted, parsing will be international.
- The default error message is: `This value is not a valid phone number.`

## License

MIT 