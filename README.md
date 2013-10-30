QrCodeServiceProvider
=====================

The QrCodeServiceProvider integrates the [endroid/qrcode][1] library with your [Silex][2] application.

Installation
------------

Use [Composer][3] to install the gigablah/silex-qrcode library by adding it to your `composer.json`.

```json
{
    "require": {
        "silex/silex": "~1.0",
        "gigablah/silex-qrcode": "~0.1"
    }
}
```

Usage
-----

Just register the service provider and optionally pass in some defaults.

```php
$app->register(new Gigablah\Silex\QrCode\QrCodeServiceProvider(), array(
    'qrcode.options' => array(
        'size' => 300,
        'padding' => 10
    )
));
```

You may now generate QR code images as follows:

```php
$app['qrcode']->setText('http://example.org');

return new Symfony\Component\HttpFoundation\Response(
    $app['qrcode']->get('png'),
    200,
    array('Content-Type' => 'image/png')
);
```

Todo
----

* Wrap the `QrCode` class to provide a fluent interface

License
-------

Released under the MIT license. See the LICENSE file for details.

[1]: https://github.com/Lusitanian/PHPoAuthLib
[2]: http://silex.sensiolabs.org
[3]: http://getcomposer.org
