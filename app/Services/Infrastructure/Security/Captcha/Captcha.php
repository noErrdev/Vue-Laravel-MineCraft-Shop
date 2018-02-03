<?php
declare(strict_types = 1);

namespace App\Services\Infrastructure\Security\Captcha;

interface Captcha
{
    public function verify(string $code, string $ip): bool;

    public function view(): string;
}
