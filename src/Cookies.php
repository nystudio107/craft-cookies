<?php

/**
 * Cookies plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies;

use Craft;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;
use nystudio107\cookies\services\CookiesService;
use nystudio107\cookies\twigextensions\CookiesTwigExtension;
use nystudio107\cookies\variables\CookiesVariable;
use yii\base\Event;

/**
 * Class Cookies
 *
 * @author    nystudio107
 * @package   Cookies
 * @since     1.1.0
 *
 * @property  CookiesService cookies
 */
class Cookies extends Plugin
{
    // Static Public Properties
    // =========================================================================

    /**
     * @var null|Cookies
     */
    public static ?Cookies $plugin = null;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSection = false;

    /**
     * @var bool
     */
    public bool $hasCpSettings = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        $config['components'] = [
            'cookies' => CookiesService::class,
        ];

        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;
        $this->name = $this->getName();

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            static function (Event $event): void {
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
     */
    public function getName(): string
    {
        return Craft::t('cookies', 'Cookies');
    }
}
