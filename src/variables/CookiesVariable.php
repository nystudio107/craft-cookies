<?php

/**
 * Cookies plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies\variables;

use nystudio107\cookies\Cookies;

/**
 * Cookies template variables
 *
 * @author    nystudio107
 * @package   Cookies
 * @since     1.1.0
 */
class CookiesVariable
{

    /**
     * Set a cookie
     */
    public function set(
        string $name = "",
        string $value = "",
        int    $expire = 0,
        string $path = "/",
        string $domain = "",
        bool   $secure = false,
        bool   $httpOnly = false,
        bool   $sameSite = false
    ): void
    {
        Cookies::$plugin->cookies->set(
            $name,
            $value,
            $expire,
            $path,
            $domain,
            $secure,
            $httpOnly,
            $sameSite
        );
    }

    /**
     * Get a cookie
     */
    public function get(string $name): string
    {
        return Cookies::$plugin->cookies->get($name);
    }

    /**
     * Set a secure cookie
     */
    public function setSecure(
        string $name = "",
        string $value = "",
        int    $expire = 0,
        string $path = "/",
        string $domain = "",
        bool   $secure = false,
        bool   $httpOnly = false,
        bool   $sameSite = false
    ): void
    {
        Cookies::$plugin->cookies->setSecure(
            $name,
            $value,
            $expire,
            $path,
            $domain,
            $secure,
            $httpOnly,
            $sameSite
        );
    }

    /**
     * Get a secure cookie
     */
    public function getSecure(string $name): string
    {
        return Cookies::$plugin->cookies->getSecure($name);
    }
}
