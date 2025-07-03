# Yz PhoneNumberBundle

Symfony 6.4+ bundle for robust phone number validation and formatting, powered by [libphonenumber](https://github.com/giggsey/libphonenumber-for-php).

## Features
- Phone number validation for Symfony forms and Doctrine entities
- Region-aware validation (optional)
- Inspired by misd/phone-number-bundle, but fully compatible with Symfony 6.4+

## Installation

```composer require yz/phone-number-bundle giggsey/libphonenumber-for-php
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

## Translation

The default error message can be translated using Symfony's translation component. Add the following to your translation files (e.g., `validators.en.yaml`):

```yaml
Yz\PhoneNumberBundle\Validator\Constraints\PhoneNumber:
    This value is not a valid phone number.: 'Your custom message here.'
```

## Future Extensions

You may add a phone number formatting service to provide consistent output formatting using libphonenumber. If you need this, open an issue or contribute!

## Symfony Flex Recipe

For easier installation, consider contributing a Symfony Flex recipe to enable auto-registration of the bundle.

## Contributing

Contributions are welcome! Please submit pull requests or open issues for bugs, features, or improvements.

## License

MIT 
+Copyright (c) 2025 Yaovi
+
+## Support
+
+For support, please open an issue on the repository or contact the author at your@email.com.

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for version history and updates.

## Running Tests

To run the test suite:

```
composer install
vendor/bin/phpunit
``` 