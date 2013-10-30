<?php

namespace Gigablah\Silex\QrCode;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Endroid\QrCode\QrCode;

/**
 * QR code generation provider.
 *
 * @author Chris Heng <bigblah@gmail.com>
 */
class QrCodeServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['qrcode.options'] = array();

        $app['qrcode'] = $app->share(function ($app) {
            $qrCode = new QrCode();

            foreach ($app['qrcode.options'] as $key => $value) {
                $method = 'set'.implode('', array_map('ucwords', explode('_', $key)));

                if (method_exists($qrCode, $method)) {
                    $qrCode->$method($value);
                }
            }

            return $qrCode;
        });
    }

    public function boot(Application $app)
    {
    }
}
