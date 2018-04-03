<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Auth;

use App\Handlers\Frontend\Auth\RegisterHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Services\Auth\AccessMode;
use App\Services\Auth\Exceptions\EmailAlreadyExistsException;
use App\Services\Auth\Exceptions\UsernameAlreadyExistsException;
use App\Services\Infrastructure\Notification\Notifications\Error;
use App\Services\Infrastructure\Notification\Notifications\Success;
use App\Services\Infrastructure\Response\JsonResponse;
use App\Services\Infrastructure\Response\Status;
use App\Services\Infrastructure\Security\Captcha\Captcha;
use App\Services\Settings\Settings;

class RegisterController extends Controller
{
    public function render(Settings $settings, Captcha $captcha)
    {
        return new JsonResponse(Status::SUCCESS, [
            'accessModeAny' => $settings->get('auth.access_mode')->getValue() === AccessMode::ANY,
            'accessModeAuth' => $settings->get('auth.access_mode')->getValue() === AccessMode::ANY,
            'captcha' => $captcha->view()
        ]);
    }

    public function handle(
        RegisterRequest $request,
        RegisterHandler $handler): JsonResponse
    {
        try {
            $dto = $handler->handle(
                (string)$request->get('username'),
                (string)$request->get('email'),
                (string)$request->get('password')
            );

            if ($dto->isSuccessfully()) {
                if ($dto->isActivated()) {
                    return (new JsonResponse(Status::SUCCESS, [
                        'redirect' => 'frontend.auth.servers'
                    ]))->addNotification(new Success(__('msg.frontend.auth.register.success')));
                }

                return new JsonResponse(Status::SUCCESS, [
                    'redirect' => 'frontend.auth.activation.sent'
                ]);
            }

            return (new JsonResponse(Status::FAILURE))
                ->addNotification(new Error(__('msg.auth.register.fail')));

        } catch (UsernameAlreadyExistsException $e) {
            return (new JsonResponse('username_already_exists'))
                ->addNotification(new Error(__('msg.frontend.auth.register.username_already_exist')));
        } catch (EmailAlreadyExistsException $e) {
            return (new JsonResponse('email_already_exists'))
                ->addNotification(new Error(__('msg.frontend.auth.register.email_already_exist')));
        }
    }
}
