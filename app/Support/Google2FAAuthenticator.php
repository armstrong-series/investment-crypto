<?php

namespace App\Support;
use PragmaRX\Google2FALaravel\Support\Authenticator;


class Google2FAAuthenticator extends Authenticator
{
    protected function canPassWithoutCheckingOTP()
    {
        if($this->getUser()->twoFactorAuthentication == null)
            return true;
        return
            !$this->getUser()->twoFactorAuthentication->google2fa_enable || !$this->isEnabled() || $this->noUserIsAuthenticated() ||
            $this->twoFactorAuthStillValid();
    }

    protected function getGoogle2FASecretKey()
    {
        $secret = $this->getUser()->twoFactorAuthentication->{$this->config('otp_secret_column')};

        if (is_null($secret) || empty($secret)) {
            // throw new InvalidSecretKey('Secret key cannot be empty.');
            $message = "Secret key cannot be empty";
            return response()->json([
              'message' =>   $message
            ], 400);
        }

        return $secret;
    }

}