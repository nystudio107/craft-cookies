[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nystudio107/craft-cookies/badges/quality-score.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-cookies/?branch=v1) [![Code Coverage](https://scrutinizer-ci.com/g/nystudio107/craft-cookies/badges/coverage.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-cookies/?branch=v1) [![Build Status](https://scrutinizer-ci.com/g/nystudio107/craft-cookies/badges/build.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-cookies/build-status/v1) [![Code Intelligence Status](https://scrutinizer-ci.com/g/nystudio107/craft-cookies/badges/code-intelligence.svg?b=v1)](https://scrutinizer-ci.com/code-intelligence)

# Cookies plugin for Craft CMS 3.x

A simple plugin for setting and getting cookies from within [Craft CMS](http://craftcms.com) templates.

![Screenshot](./resources/img/plugin-logo.png)

Related: [Cookies for Craft 2.x](https://github.com/nystudio107/cookies)

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

**Installation**

1. Install with Composer via `composer require nystudio107/craft-cookies` from your project directory
2. Install the plugin via `./craft install/plugin cookies` via the CLI -or- in the Craft Control Panel under Settings > Plugins

You can also install Cookies via the **Plugin Store** in the Craft Control Panel.

## Setting cookies

All three of these methods accomplish the same thing:

```twig
    {# Set the cookie using 'setCookie' function #}
    {% do setCookie( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY, SAMESITE) %}

    {# Set the cookie using 'setCookie' filter #}
    {% do NAME | setCookie( VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY, SAMESITE) %}

    {# Set the cookie using 'set' variable #}
    {% do craft.cookies.set( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY, SAMESITE) %}
```

They all act as a wrapper for the PHP `setcookie` function. [More info](http://php.net/manual/en/function.setcookie.php)

All of the parameters except for `NAME` are optional. The `PATH` defaults to `/` if not specified. The `SAMESITE` should be either 'None', 'Lax' or 'Strict'.

(Note: `SAMESITE` only works for environments with PHP 7.3 and up)

**Examples**

```twig
    {% do setCookie('marvin', 'martian', now | date_modify("+1 hour").timestamp) %}
    {# Sets a cookie to expire in an hour. #}

    {% do 'marvin' | setCookie('martian', now | date_modify("+30 days").timestamp) %}
    {# Sets a cookie to expire in 30 days. #}

    {% do craft.cookies.set('marvin', 'martian', '', '/foo/' ) %}
    {# Cookie available within /foo/ directory and sub-directories. #}
```

## Setting Secure cookies

All three of these methods accomplish the same thing:

```twig
    {# Set the cookie using 'setSecureCookie' function #}
    {% do setSecureCookie( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY, SAMESITE) %}

    {# Set the cookie using 'setSecureCookie' filter #}
    {% do NAME | setSecureCookie( VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY, SAMESITE) %}

    {# Set the cookie using 'setSecure' variable #}
    {% do craft.cookies.setSecure( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY, SAMESITE) %}
```

This function works the same as `setCookie` but instead of using the PHP `setcookie` function, it uses the `Craft::$app->getResponse()->getCookies()->add` to add the cookies via Craft. It also utilizes `craft->security` framework to encrypt and validate the cookie contents between requests.

All of the parameters except for `NAME` are optional. The `PATH` defaults to `/` if not specified. The `SAMESITE` should be either 'None', 'Lax' or 'Strict'.

(Note: `SAMESITE` only works for environments with PHP 7.3 and up)

**Examples**

```twig
    {% do setSecureCookie('marvin', 'martian', now | date_modify("+1 hour").timestamp) %}
    {# Sets a cookie to expire in an hour. #}

    {% do 'marvin' | setSecureCookie('martian', now | date_modify("+30 days").timestamp) %}
    {# Sets a cookie to expire in 30 days. #}

    {% do craft.cookies.setSecure('marvin', 'martian', '', '/foo/' ) %}
    {# Cookie available within /foo/ directory and sub-directories. #}
```

## Retrieving cookies

Both of these methods accomplish the same thing:

```twig
    {# Get the cookie using 'getCookie' function #}
    {% do getCookie( NAME ) %}

    {# Get the cookie using 'get' variable #}
    {% do craft.cookies.get( NAME ) %}
```

**Example**

```twig
    {% do getCookie('marvin') %}
    {# Get the cookie using 'getCookie' function #}

    {% do craft.cookies.get('marvin') %}
    {# Get the cookie using 'get' variable #}

    {% if getCookie('marvin') %}
        {% set myCookie = getCookie('marvin') %}
        {{ myCookie }}
    {% endif %}
```

## Retrieving Secure cookies

Both of these methods accomplish the same thing:

```twig
    {# Get the cookie using 'getSecureCookie' function #}
    {% do getSecureCookie( NAME ) %}

    {# Get the cookie using 'getSecure' variable #}
    {% do craft.cookies.getSecure( NAME ) %}
```

**Example**

```twig
    {% do getSecureCookie('marvin') %}
    {# Get the cookie using 'getSecureCookie' function #}

    {% do craft.cookies.getSecure('marvin') %}
    {# Get the cookie using 'getSecure' variable #}

    {% if getSecureCookie('marvin') %}
        {% set myCookie = getSecureCookie('marvin') %}
        {{ myCookie }}
    {% endif %}
```

This function works the same as `getCookie` but it uses `Craft::$app->getRequest()->getCookie()` to retrieve the cookies via Craft. It also utilizes `craft->security` framework to decrypt and validate the cookie contents between requests.

**Example**

```twig
    {% do getSecureCookie('marvin') %}
    {# Get the cookie using 'getSecureCookie' function #}

    {% do craft.cookies.getSecure('marvin') %}
    {# Get the cookie using 'getSecure' variable #}

    {% if getSecureCookie('marvin') %}
        {% set myCookie = getSecureCookie('marvin') %}
        {{ myCookie }}
    {% endif %}
```

## Deleting cookies

All three of these methods accomplish the same thing:

```twig
    {# Delete a cookie by passing no VALUE to 'setCookie' function #}
    {% do setCookie( NAME ) %}

    {# Delete a cookie by passing no VALUE to 'setCookie' filter #}
    {% do NAME | setCookie() %}

    {# Delete a cookie by passing no VALUE to 'set' variable #}
    {% do craft.cookies.set( NAME ) %}
```

## Deleting Secure cookies

All three of these methods accomplish the same thing:

```twig
    {# Delete a cookie by passing no VALUE to 'setSecureCookie' function #}
    {% do setSecureCookie( NAME ) %}

    {# Delete a cookie by passing no VALUE to 'setSecureCookie' filter #}
    {% do NAME | setSecureCookie() %}

    {# Delete a cookie by passing no VALUE to 'setSecure' variable #}
    {% do craft.cookies.setSecure( NAME ) %}
```

Brought to you by [nystudio107](http://nystudio107.com)
