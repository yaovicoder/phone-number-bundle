# Publishing to Packagist

To make your bundle available via `composer require ydee/phone-number-bundle`, follow these steps:

## 1. Create Packagist Account
- Go to https://packagist.org
- Sign up with your GitHub account
- Verify your email

## 2. Submit Your Repository
- Click "Submit Package" on Packagist
- Enter your repository URL: `https://github.com/ydeecoder/phone-number-bundle`
- Packagist will automatically detect the package name from `composer.json`
- Click "Check" to validate
- Click "Submit" to publish

## 3. Auto-Update Setup (Optional)
- In your GitHub repository, go to Settings > Webhooks
- Add webhook URL: `https://packagist.org/api/github`
- Set content type to `application/json`
- Select "Just the push event"
- Save the webhook

## 4. Usage After Publishing
Once published, users can install with:
```bash
composer require ydee/phone-number-bundle
```

## 5. Version Management
- Create git tags for releases: `git tag v1.0.0`
- Push tags: `git push --tags`
- Packagist will automatically detect new versions

## Current Installation (Before Packagist)
Until published, use:
```bash
composer require ydeecoder/phone-number-bundle:dev-main
``` 