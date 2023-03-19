# Undraw.co Laravel Blade components

[![PHP Tests](https://github.com/maartenpaauw/undraw/workflows/PHP%20Tests/badge.svg?branch=master)](https://github.com/maartenpaauw/undraw)
[![Total Downloads](https://img.shields.io/packagist/dt/maartenpaauw/undraw.svg)](https://packagist.org/packages/maartenpaauw/undraw)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/maartenpaauw/undraw.svg)](https://packagist.org/packages/maartenpaauw/undraw)

This package will let you render [Undraw.co](https://undraw.co/illustrations) illustrations without a hassle!

## Installation

You can install the package via composer:

```bash
composer require maartenpaauw/undraw
```

## Usage

The following code will render the [Undraw.co](https://undraw.co/illustrations) "Cooking" illustration as SVG.

``` html
<x-undraw illustration="cooking" />
```

This component can also be rendered with;

``` html
<x-cooking />
```

The primary color can be changed as well;

``` html
<x-cooking color="#F9A826" />
```

### Testing

``` bash
composer test
```

### Development

Generate the illustration components with:

```bash
composer download
```

```bash
composer generate-classes
```

```bash
composer generate-service-provider
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Undraw.co](https://undraw.co/illustrations) - for the amazing illustrations.
- [Maarten Paauw](https://github.com/maartenpaauw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
