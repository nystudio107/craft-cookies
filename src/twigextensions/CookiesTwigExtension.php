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
use nystudio107\cookies\services\CookiesService;

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
     * @return string [description]
     */
    public function getName()
    {
        return 'Cookies';
    }

    /**
     * Return our Twig filters
     * @return array [description]
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('setCookie', [$this, 'setCookie']),
            new \Twig_SimpleFilter('getCookie', [$this, 'getCookie']),
            new \Twig_SimpleFilter('setSecureCookie', [$this, 'setSecureCookie']),
            new \Twig_SimpleFilter('getSecureCookie', [$this, 'getSecureCookie']),
        );
    } /* -- getFilters */

    /**
     * Return our Twig functions
     * @return array [description]
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('setCookie', [$this, 'setCookie']),
            new \Twig_SimpleFunction('getCookie', [$this, 'getCookie']),
            new \Twig_SimpleFunction('setSecureCookie', [$this, 'setSecureCookie']),
            new \Twig_SimpleFunction('getSecureCookie', [$this, 'getSecureCookie']),
        );
    } /* -- getFunctions */

    /**
     * Set a cookie
     * @param string  $name     [description]
     * @param string  $value    [description]
     * @param integer $expire   [description]
     * @param string  $path     [description]
     * @param string  $domain   [description]
     * @param boolean $secure   [description]
     * @param boolean $httponly [description]
     */
    public function setCookie($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
    {
		Cookies::$plugin->cookies->set($name, $value, $expire, $path, $domain, $secure, $httponly);
    } /* -- setCookie */

    /**
     * Get a cookie
     * @param  string $name [description]
     * @return string       [description]
     */
    public function getCookie($name)
    {
		return Cookies::$plugin->cookies->get($name);
    } /* -- getCookie */

    /**
     * Set a secure cookie
     * @param string  $name     [description]
     * @param string  $value    [description]
     * @param integer $expire   [description]
     * @param string  $path     [description]
     * @param string  $domain   [description]
     * @param boolean $secure   [description]
     * @param boolean $httponly [description]
     */
    public function setSecureCookie($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
    {
		Cookies::$plugin->cookies->setSecure($name, $value, $expire, $path, $domain, $secure, $httponly);
    } /* -- setSecureCookie */

    /**
     * Get a secure cookie
     * @param  string $name [description]
     * @return string       [description]
     */
    public function getSecureCookie($name)
    {
		return Cookies::$plugin->cookies->getSecure($name);
    } /* -- getSecureCookie */

} /* -- CookiesTwigExtension */
