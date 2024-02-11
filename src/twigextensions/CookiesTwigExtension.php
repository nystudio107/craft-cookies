<?php

/**
 * Cookies plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies\twigextensions;

use nystudio107\cookies\Cookies;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Cookies twig extension
 *
 * @author    nystudio107
 * @package   Cookies
 * @since     1.1.0
 */
class CookiesTwigExtension extends AbstractExtension
{

    /**
     * Return our Twig Extension name
     */
    public function getName(): string
    {
        return 'Cookies';
    }

    /**
     * @inheritdoc
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('setCookie', fn(string $name = "", string $value = "", int $expire = 0, string $path = "/", string $domain = "", bool $secure = false, bool $httpOnly = false, bool $sameSite = false) => $this->setCookie($name, $value, $expire, $path, $domain, $secure, $httpOnly, $sameSite)),
            new TwigFilter('getCookie', fn($name) => $this->getCookie($name)),
            new TwigFilter('setSecureCookie', fn(string $name = "", string $value = "", int $expire = 0, string $path = "/", string $domain = "", bool $secure = false, bool $httpOnly = false, bool $sameSite = false) => $this->setSecureCookie($name, $value, $expire, $path, $domain, $secure, $httpOnly, $sameSite)),
            new TwigFilter('getSecureCookie', fn($name) => $this->getSecureCookie($name)),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('setCookie', fn(string $name = "", string $value = "", int $expire = 0, string $path = "/", string $domain = "", bool $secure = false, bool $httpOnly = false, bool $sameSite = false) => $this->setCookie($name, $value, $expire, $path, $domain, $secure, $httpOnly, $sameSite)),
            new TwigFunction('getCookie', fn($name) => $this->getCookie($name)),
            new TwigFunction('setSecureCookie', fn(string $name = "", string $value = "", int $expire = 0, string $path = "/", string $domain = "", bool $secure = false, bool $httpOnly = false, bool $sameSite = false) => $this->setSecureCookie($name, $value, $expire, $path, $domain, $secure, $httpOnly, $sameSite)),
            new TwigFunction('getSecureCookie', fn($name) => $this->getSecureCookie($name)),
        ];
    }

    /**
     * Set a cookie
     */
    public function setCookie(
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
    public function getCookie(string $name): string
    {
        return Cookies::$plugin->cookies->get($name);
    }

    /**
     * Set a secure cookie
     */
    public function setSecureCookie(
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
    public function getSecureCookie(string $name): string
    {
        return Cookies::$plugin->cookies->getSecure($name);
    }
}
