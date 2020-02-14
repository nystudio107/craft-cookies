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

use Craft;

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
     *
     * @param string $name
     * @param string $value
     * @param int    $expire
     * @param string $path
     * @param string $domain
     * @param bool   $secure
     * @param bool   $httpOnly
     * @param string $sameSite
     */
    public function set(
        $name = "",
        $value = "",
        $expire = 0,
        $path = "/",
        $domain = "",
        $secure = false,
        $httpOnly = false,
        $sameSite = null
    ) {
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
     *
     * @param $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return Cookies::$plugin->cookies->get($name);
    }

    /**
     * Set a secure cookie
     *
     * @param string $name
     * @param string $value
     * @param int    $expire
     * @param string $path
     * @param string $domain
     * @param bool   $secure
     * @param bool   $httpOnly
     * @param string $sameSite
     */
    public function setSecure(
        $name = "",
        $value = "",
        $expire = 0,
        $path = "/",
        $domain = "",
        $secure = false,
        $httpOnly = false,
        $sameSite = null
    ) {
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
     *
     * @param $name
     *
     * @return mixed
     */
    public function getSecure($name)
    {
        return Cookies::$plugin->cookies->getSecure($name);
    }
}
