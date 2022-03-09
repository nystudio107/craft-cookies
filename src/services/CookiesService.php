<?php

/**
 * Cookies plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies\services;

use Craft;
use craft\base\Component;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\web\Cookie;

/**
 * Cookies service
 *
 * @author    nystudio107
 * @package   Cookies
 * @since     1.1.0
 */
class CookiesService extends Component
{
    /**
     * Set a cookie
     */
    public function set(
        string $name = '',
        string $value = '',
        int    $expire = 0,
        string $path = '/',
        string $domain = '',
        bool   $secure = false,
        bool   $httpOnly = false,
        bool   $sameSite = false
    ): void
    {
        if (empty($value)) {
            Craft::$app->response->cookies->remove($name);
        } else {
            $domain = empty($domain) ? Craft::$app->getConfig()->getGeneral()->defaultCookieDomain : $domain;
            if (PHP_VERSION_ID >= 70300) {
                setcookie($name, $value, [
                    'expires' => $expire,
                    'path' => $path,
                    'domain' => $domain,
                    'secure' => $secure,
                    'httponly' => $httpOnly,
                    'samesite' => $sameSite
                ]);
            } else {
                setcookie($name, $value, ['expires' => $expire, 'path' => $path, 'domain' => $domain, 'secure' => $secure, 'httponly' => $httpOnly]);
            }

            $_COOKIE[$name] = $value;
        }
    }

    /**
     * Get a cookie
     */
    public function get(string $name = ''): string
    {
        return $_COOKIE[$name] ?? '';
    }

    /**
     * Set a secure cookie
     */
    public function setSecure(
        string $name = '',
        string $value = '',
        int    $expire = 0,
        string $path = '/',
        string $domain = '',
        bool   $secure = false,
        bool   $httpOnly = false,
        bool   $sameSite = false
    ): void
    {
        if (empty($value)) {
            Craft::$app->response->cookies->remove($name);
        } else {
            $domain = empty($domain) ? Craft::$app->getConfig()->getGeneral()->defaultCookieDomain : $domain;
            $cookie = new Cookie(['name' => $name, 'value' => '']);

            try {
                $cookie->value = Craft::$app->security->hashData(base64_encode(serialize($value)));
            } catch (InvalidConfigException|Exception $e) {
                Craft::error(
                    'Error setting secure cookie: ' . $e->getMessage(),
                    __METHOD__
                );

                return;
            }

            $cookie->expire = $expire;
            $cookie->path = $path;
            $cookie->domain = $domain;
            $cookie->secure = $secure;
            $cookie->httpOnly = $httpOnly;
            if (PHP_VERSION_ID >= 70300) {
                $cookie->sameSite = $sameSite;
            }

            Craft::$app->response->cookies->add($cookie);
        }
    }

    /**
     * Get a secure cookie
     */
    public function getSecure(string $name = ''): string
    {
        $result = '';
        $cookie = Craft::$app->request->cookies->get($name);
        if ($cookie !== null) {
            try {
                $data = Craft::$app->security->validateData($cookie->value);
            } catch (InvalidConfigException|Exception $e) {
                Craft::error(
                    'Error getting secure cookie: ' . $e->getMessage(),
                    __METHOD__
                );
                $data = false;
            }

            if (
                $cookie
                && !empty($cookie->value)
                && $data !== false
            ) {
                $result = unserialize(base64_decode($data), ['allowed_classes' => false]);
            }
        }

        return $result;
    }
}
