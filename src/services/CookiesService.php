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
        $expire = (int) $expire;
/* -- Make sure the cookie expiry is in the past if we're deleting the cookie */
        if ($value=="")
            $expire = (int)(time() - 3600);
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
        $_COOKIE[$name] = $value;
     } /* -- set */

    /**
     * Get a cookie
     * @param  string $name [description]
     * @return string       [description]
     */
    public function get($name = "")
    {
        if(isset($_COOKIE[$name]))
            return $_COOKIE[$name];
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
        if ($name == "")
        {
            Craft::$app->request->cookies->delete($name);
        }
        else
        {
            $expire = (int) $expire;
/* -- Make sure the cookie expiry is in the past if we're deleting the cookie */
            if ($value=="")
                $expire = (int)(time() - 3600);
            $cookie = new HttpCookie($name, '');

            $cookie->value = Craft::$app->security->hashData(base64_encode(serialize($value)));
            $cookie->expire = $expire;
            $cookie->path = $path;
            $cookie->domain = $domain;
            $cookie->secure = $secure;
            $cookie->httpOnly = $httponly;

            Craft::$app->request->cookies->add($cookie->name, $cookie);
        }
    } /* -- setSecure */

    /**
     * Get a secure cookie
     * @param  string $name [description]
     * @return string       [description]
     */
    public function getSecure($name = "")
    {
        $cookie = Craft::$app->request->cookies->get($name);
        if ($cookie && !empty($cookie->value) && ($data = Craft::$app->security->validateData($cookie->value)) !== false)
        {
            return @unserialize(base64_decode($data));
        }
    } /* -- getSecure */

} /* -- CookiesService */