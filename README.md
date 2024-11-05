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

### Initialize the JSON Manager

To start using the JSON manager, initialize the `JSON` class with a default object name. This object name will be used as the JavaScript variable where the JSON data will be accessible.

```php
use Awesome9\JSON\JSON;

// Initialize JSON manager with a default object name
$json_manager = new JSON('awesome9');
$json_manager->hooks();
```
The `hooks()` method binds the necessary WordPress hooks to output the JSON data automatically in the footer.

### Adding Data

Use the `add()` method to add key-value pairs to the JSON object. You can add data in two ways:
- As individual key-value pairs.
- As an array of key-value pairs.

```php
// Adding individual data
$json_manager->add('company', 'awesome');
$json_manager->add('product', 'json_manager');

// Adding multiple key-value pairs using an array
$json_manager->add([
    'feature1' => 'easy to use',
    'feature2' => 'robust',
]);
```

### Removing Data
To remove a specific key from the JSON object, use the `remove()` method:

```php
$json_manager->remove('product'); // Removes the 'product' key
```

### Clearing All Data
If you need to remove all data stored in the JSON object, use `clear_all()`:

```php
$json_manager->clear_all();
```

### Accessing Data in JavaScript
After setting up data with the JSON manager, you can access it on the frontend in JavaScript. The default object name (in this case, `awesome9`) will hold the data.

```js
console.log(awesome9.company);     // Outputs: 'awesome'
console.log(awesome9.feature1);    // Outputs: 'easy to use'
```

## 📖 Changelog

[See the changelog file](./CHANGELOG.md)
