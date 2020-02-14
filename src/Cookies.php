<?php

/**
 * Cookies plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies;

use nystudio107\cookies\services\CookiesService;
use nystudio107\cookies\twigextensions\CookiesTwigExtension;
use nystudio107\cookies\variables\CookiesVariable;

use Craft;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class Cookies
 *
 * @author    nystudio107
 * @package   Cookies
 * @since     1.1.0
 *
 * @property  CookiesService    cookies
 */
class Cookies extends Plugin
{
    /**
     * @var Cookies
     */
    public static $plugin;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        $this->name = $this->getName();

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('cookies', CookiesVariable::class);
            }
        );

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new CookiesTwigExtension());

        Craft::info(
            Craft::t(
                'cookies',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    /**
     * Returns the user-facing name of the plugin, which can override the name
     * in composer.json
     *
     * @return string
     */
    public function getName()
    {
        return Craft::t('cookies', 'Cookies');
    }
}
