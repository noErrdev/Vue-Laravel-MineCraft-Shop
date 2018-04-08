<?php
declare(strict_types = 1);

namespace App\Handlers\Admin\Control\Basic;

use App\DataTransferObjects\Admin\Control\Basic\VisitResult;
use App\Services\Settings\DataType;
use App\Services\Settings\Settings;

class VisitHandler
{
    /**
     * @var Settings
     */
    private $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function handle(): VisitResult
    {
        $dto = (new VisitResult())
            ->setName($this->settings->get('shop.name')->getValue())
            ->setDescription($this->settings->get('shop.description')->getValue())
            ->setKeywords($this->settings->get('shop.keywords')->getValue(DataType::JSON))
            ->setAccessMode($this->settings->get('auth.access_mode')->getValue())
            ->setRegisterEnabled($this->settings->get('auth.register.enabled')->getValue(DataType::BOOL))
            ->setSendActivationEnabled($this->settings->get('auth.register.send_activation')->getValue(DataType::BOOL))
            ->setCustomRedirectAfterRegistrationEnabled($this->settings->get('auth.register.custom_redirect.enabled')->getValue(DataType::BOOL))
            ->setCustomRedirectAfterRegistrationUrl($this->settings->get('auth.register.custom_redirect.url')->getValue())

            ->setMaxSkinFileSize($this->settings->get('system.profile.character.skin.max_file_size')->getValue(DataType::INT))
            ->setMaxCloakFileSize($this->settings->get('system.profile.character.cloak.max_file_size')->getValue(DataType::INT))
            ->setSkinSizes($this->settings->get('system.profile.character.skin.list')->getValue(DataType::JSON))
            ->setSkinSizesHd($this->settings->get('system.profile.character.skin.hd.list')->getValue(DataType::JSON))
            ->setCloakSizes($this->settings->get('system.profile.character.cloak.list')->getValue(DataType::JSON))
            ->setCloakSizesHd($this->settings->get('system.profile.character.cloak.hd.list')->getValue(DataType::JSON))

            ->setSkinEnabled($this->settings->get('system.profile.character.skin.enabled')->getValue(DataType::BOOL))
            ->setHdSkinEnabled($this->settings->get('system.profile.character.skin.hd.enabled')->getValue(DataType::BOOL))
            ->setCloakEnabled($this->settings->get('system.profile.character.cloak.enabled')->getValue(DataType::BOOL))
            ->setHdCloakEnabled($this->settings->get('system.profile.character.cloak.hd.enabled')->getValue(DataType::BOOL))

            ->setSortProductsBy($this->settings->get('system.catalog.pagination.order_by')->getValue())
            ->setSortProductsDescending($this->settings->get('system.catalog.pagination.descending')->getValue(DataType::BOOL));

        return $dto;
    }
}
