# Dashboard Setup for Laravel

A PHP library for setting up an admin dashboard in Laravel with language settings. This package includes middleware and routes for switching languages (`language switch`).

## Features

- Easily set up an admin dashboard for Laravel projects.
- Create middleware for language switching.
- Generate routes for language switching.
- Automatically create language files.

## Installation

Install the package using Composer:

```bash
composer require mohammad_sulaiman/dashboard_setup
php vendor/mohammad_sulaiman/dashboard_setup/src/install.php
```

During installation, you will be prompted to provide two inputs:

1. **Source Directory (Optional):** If you want to include a custom dashboard provided by the user.
2. **Laravel Project Path (Required):** The path to your Laravel project.

Ensure that the Laravel project path is correct, as it is mandatory for the setup process.

## Visit on Packagist

You can find the package on Packagist at the following link:  
[Dashboard Setup for Laravel on Packagist](https://packagist.org/packages/mohammad_sulaiman/dashboard_setup)

## Usage

1. After installation, the package will automatically configure the following:

   - **Middleware**: For handling language switching logic.
   - **Routes**: Adds routes for managing language switches.
   - **Language Files**: Initializes the language files in the `resources/lang` directory.

2. To customize or update the settings, modify the configuration in the `src` directory.

## License

This package is licensed under the [MIT License](LICENSE).
