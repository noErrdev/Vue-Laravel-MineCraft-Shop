<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Shop;

use App\Composers\Constructors\AdminBlockConstructor;
use App\Http\Controllers\Controller;
use App\Services\Infrastructure\Response\JsonResponse;
use App\Services\Infrastructure\Response\Status;
use App\Services\Settings\DataType;
use App\Services\Settings\Settings;

class ShopController extends Controller
{
    public function render(AdminBlockConstructor $adminBlockConstructor, Settings $settings)
    {
        return new JsonResponse(Status::SUCCESS, [
            'character' => $this->characterAvailable($settings),
            'sidebar' => [
                'admin' => $adminBlockConstructor->construct()
            ]
        ]);
    }

    private function characterAvailable(Settings $settings): bool
    {
        return $settings->get('system.profile.character.skin.enabled')->getValue(DataType::BOOL)
            || $settings->get('system.profile.character.cloak.enabled')->getValue(DataType::BOOL);
    }
}
