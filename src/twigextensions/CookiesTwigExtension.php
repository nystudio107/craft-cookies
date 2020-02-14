<?php

/**
 * Cookies plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies\twigextensions;

use nystudio107\cookies\Cookies;

use Craft;

/**
 * Cookies twig extension
 *
 * @author    nystudio107
 * @package   Cookies
 * @since     1.1.0
 */
class CookiesTwigExtension extends \Twig_Extension
{

    /**
     * Return our Twig Extension name
     *
     * @return string
     */
    public function getName()
    {
        return 'Cookies';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('setCookie', [$this, 'setCookie']),
            new \Twig_SimpleFilter('getCookie', [$this, 'getCookie']),
            new \Twig_SimpleFilter('setSecureCookie', [$this, 'setSecureCookie']),
            new \Twig_SimpleFilter('getSecureCookie', [$this, 'getSecureCookie']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('setCookie', [$this, 'setCookie']),
            new \Twig_SimpleFunction('getCookie', [$this, 'getCookie']),
            new \Twig_SimpleFunction('setSecureCookie', [$this, 'setSecureCookie']),
            new \Twig_SimpleFunction('getSecureCookie', [$this, 'getSecureCookie']),
        ];
    }

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
    public function setCookie(
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
    public function getCookie($name)
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
    public function setSecureCookie(
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
    public function getSecureCookie($name)
    {
        return Cookies::$plugin->cookies->getSecure($name);
    }
}
