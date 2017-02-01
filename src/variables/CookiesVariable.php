<?php
/**
 * Cookies plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies\variables;

use Craft;
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
     * @param string  $name     [description]
     * @param string  $value    [description]
     * @param integer $expire   [description]
     * @param string  $path     [description]
     * @param string  $domain   [description]
     * @param boolean $secure   [description]
     * @param boolean $httponly [description]
     */
    public function set($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
    {
		Cookies::$plugin->cookies->set($name, $value, $expire, $path, $domain, $secure, $httponly);
    } /* -- set */

    /**
     * Get a cookie
     * @param  string $name [description]
     * @return string       [description]
     */
    public function get($name)
    {
		return Cookies::$plugin->cookies->get($name);
    } /* -- get */

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
    public function setSecure($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
    {
		Cookies::$plugin->cookies->setSecure($name, $value, $expire, $path, $domain, $secure, $httponly);
    } /* -- setSecure */

    /**
     * Get a secure cookie
     * @param  string $name [description]
     * @return string       [description]
     */
    public function getSecure($name)
    {
		return Cookies::$plugin->cookies->getSecure($name);
    } /* -- getSecure */

}