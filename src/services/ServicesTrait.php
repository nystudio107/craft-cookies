<?php
/**
 * Cookies plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies\services;

use craft\helpers\ArrayHelper;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Cookies
 * @since     1.1.16
 *
 * @property CookiesService $cookies
 */
trait ServicesTrait
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        // Merge in the passed config, so it our config can be overridden by Plugins::pluginConfigs['vite']
        // ref: https://github.com/craftcms/cms/issues/1989
        $config = ArrayHelper::merge([
            'components' => [
                'cookies' => CookiesService::class,
            ],
        ], $config);

        parent::__construct($id, $parent, $config);
    }

    /**
     * Returns the cookies service
     *
     * @return CookiesService The cookies service
     * @throws InvalidConfigException
     */
    public function getCookies(): CookiesService
    {
        return $this->get('cookies');
    }
}
