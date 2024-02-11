<?php
/**
 * Cookies plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\cookies\services;

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
    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function config(): array
    {
        return [
            'components' => [
                'cookies' => CookiesService::class,
            ],
        ];
    }

    // Public Methods
    // =========================================================================

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
