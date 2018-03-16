<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Auth;

use App\Handlers\Frontend\Auth\AuthHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\LoginRequest;
use App\Services\Auth\AccessMode;
use App\Services\Auth\Exceptions\BannedException;
use App\Services\Auth\Exceptions\NotActivatedException;
use App\Services\Infrastructure\Notification\Notifications\Error;
use App\Services\Infrastructure\Notification\Notifications\Success;
use App\Services\Infrastructure\Notification\Notificator;
use App\Services\Infrastructure\Response\JsonResponse;
use App\Services\Infrastructure\Response\Status;
use App\Services\Settings\DataType;
use App\Services\Settings\Settings;
use App\Services\Support\Lang\Ban\BanMessage;

class LoginController extends Controller
{
    public function render(Settings $settings)
    {
        return new JsonResponse(Status::SUCCESS, [
            'onlyForAdmins' => false,
            'accessModeAny' => $settings->get('auth.access_mode')->getValue() === AccessMode::ANY,
            'downForMaintenance' => $settings->get('system.maintenance.enabled')->getValue(DataType::BOOL),
            'enabledPasswordReset' => $settings->get('auth.reset_password.enabled')->getValue(DataType::BOOL),
            'enabledRegister' => $settings->get('auth.register.enabled')->getValue(DataType::BOOL)
        ]);
    }

    public function handle(LoginRequest $request, AuthHandler $handler, Notificator $notificator, BanMessage $banMessage)
    {
        try {
            $dto = $handler->handle(
                (string)$request->get('username'),
                (string)$request->get('password'),
                true
            );

            if ($dto->isSuccessfully()) {
                $notificator->notify(new Success(__('msg.frontend.auth.login.welcome', [
                    'username' => $dto->getUser()->getUsername()
                ])));

                return new JsonResponse(Status::SUCCESS);
            }

            return (new JsonResponse(Status::FAILURE))
                ->addNotification(new Error(__('msg.frontend.auth.login.invalid_credentials')));

        } catch (NotActivatedException $e) {
            return (new JsonResponse('not_activated'))
                ->addNotification(new Error(__('msg.frontend.auth.login.not_activated')));
        } catch (BannedException $e) {
            $banMessages = $banMessage->buildMessageAuto($e->getBans());
            if (count($banMessages->getMessages()) === 0) {
                return (new JsonResponse('banned'))
                    ->addNotification(new Error($banMessages->getTitle()));
            }

            $notification = $banMessages->getTitle();
            $i = 1;
            foreach ($banMessages->getMessages() as $message) {
                $notification .= "<br>{$i}) {$message}";
                $i++;
            }

            return (new JsonResponse('banned'))
                ->addNotification(new Error($notification));
        }
    }
}
