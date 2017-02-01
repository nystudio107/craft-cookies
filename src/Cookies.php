<?php
/**
 * Cookies plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies;

use nystudio107\cookies\twigextensions\CookiesTwigExtension;
use nystudio107\cookies\variables\CookiesVariable;

use Craft;

/**
 * Cookies plugin base class
 *
 * @author    nystudio107
 * @package   Cookies
 * @since     1.1.0
 */
class Cookies extends \craft\base\Plugin
{
    /**
     * Static property that is an instance of this plugin class so that it can be accessed via Cookies::$plugin
     * @var craft\plugins\cookies\Cookies
     */
    public static $plugin;

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * Cookies::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        $this->name = $this->getName();

        // Add in our Twig extensions
        Craft::$app->view->twig->addExtension(new CookiesTwigExtension());
    }

    /**
     * Returns the user-facing name of the plugin, which can override the name in
     * plugin.json
     *
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('cookies', 'Cookies');
    }

    /**
     * Returns the component definition that should be registered on the [[\craft\app\web\twig\variables\CraftVariable]] instance for this plugin’s handle.
     *
     * @return mixed|null The component definition to be registered.
     * It can be any of the formats supported by [[\yii\di\ServiceLocator::set()]].
     */
    public function defineTemplateComponent()
    {
        return CookiesVariable::class;
    }

}
