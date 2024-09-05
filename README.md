# JSON

[![Awesome9](https://img.shields.io/badge/Awesome-9-brightgreen)](https://awesome9.co)
[![Latest Stable Version](https://poser.pugx.org/awesome9/json/v/stable)](https://packagist.org/packages/awesome9/json)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/awesome9/json.svg)](https://packagist.org/packages/awesome9/json)
[![Total Downloads](https://poser.pugx.org/awesome9/json/downloads)](https://packagist.org/packages/awesome9/json)
[![License](https://poser.pugx.org/awesome9/json/license)](https://packagist.org/packages/awesome9/json)

<p align="center">
	<img src="https://img.icons8.com/nolan/256/json.png"/>
</p>

## 📃 About JSON

This package provides ease of managing data localization within WordPress. It enables developers to add, remove, and manipulate JSON objects that can be output in the footer of WordPress pages.


## 💾 Installation

``` bash
composer require awesome9/json
```

## 🕹 Usage

First, you need to spin out configuration for your json.

```php
use Awesome9\JSON\JSON;

// Initialize JSON manager with a default object name
$json_manager = new JSON('awesome9');
$json_manager->hooks();
```

Now, let's add and remove some data to be output in admin.

```php
$json_manager
	->add( 'company', 'great' )
	->add( 'remove', 'me' )
	->add( 'array', array(
		'a' => 'test',
		'b' => 'test',
	) );

$json_manager
	->remove( 'remove' );

// Clear all data stored in the JSON object:
$json_manager->clear_all();
```

And you can use it in your JavaScript files as
```js
console.log( awesome9.company );
console.log( awesome9.array.a );
```

## 📖 Changelog

[See the changelog file](./CHANGELOG.md)
