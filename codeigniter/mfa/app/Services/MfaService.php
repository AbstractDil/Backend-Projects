<?php

namespace App\Services;

use PragmaRX\Google2FA\Google2FA;

class MfaService
{
    protected Google2FA $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
        $this->google2fa->setWindow(1); // ±30 sec
    }

    public function generateSecret(): string
    {
        return $this->google2fa->generateSecretKey();
    }

    public function getQrUrl(string $app, string $email, string $secret): string
    {
        return $this->google2fa->getQRCodeUrl(
            $app,
            $email,
            $secret
        );
    }

    public function verifyOtp(string $secret, string $otp): bool
    {
        return $this->google2fa->verifyKey($secret, $otp);
    }
}
