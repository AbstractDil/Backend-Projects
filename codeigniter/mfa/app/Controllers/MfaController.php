<?php

namespace App\Controllers;

use App\Services\MfaService;
use App\Models\UserModel;

class MfaController extends BaseController
{
    /**
     * Show QR code for MFA setup
     */
    public function setup()
    {
        // 1. Ensure user is logged in
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        // 2. Fetch user from DB
        $userModel = new UserModel();
        $user      = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login');
        }

        // 3. Generate MFA secret
        $mfa    = new MfaService();
        $secret = $mfa->generateSecret();

        // 4. Store secret TEMPORARILY in session
        session()->set('mfa_setup_secret', $secret);

        // 5. Generate QR URL
        $qrUrl = $mfa->getQrUrl(
            'nandy.sagar',        // Issuer
            $user['email'],      // Account name
            $secret
        );

        return view('mfa/setup', [
            'qrUrl' => $qrUrl
        ]);
    }

    /**
     * Verify OTP during MFA setup
     */
    public function verifySetup()
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        $otp    = $this->request->getPost('otp');
        $secret = session()->get('mfa_setup_secret');

        if (!$otp || !$secret) {
            return redirect()->back()->with('error', 'Session expired. Try again.');
        }

        $mfa = new MfaService();

        // 1. Verify OTP
        if (!$mfa->verifyOtp($secret, $otp)) {
            return redirect()->back()->with('error', 'Invalid OTP');
        }

        // 2. Save secret permanently
        $userModel = new UserModel();

        $userModel->update($userId, [
            'mfa_secret'  => base64_encode($secret), // SQLite-safe
            'mfa_enabled' => 1
        ]);

        // 3. Cleanup
        session()->remove('mfa_setup_secret');

        return redirect()->to('/dashboard')
            ->with('success', 'Authenticator enabled successfully');
    }

    public function challenge(){
        /*
    $userId = session()->get('user_id');

    if (!$userId) {
        return redirect()->to('/login');
    }
        */

    return view('mfa/challenge');
}

public function verifyChallenge()
{
    $userId = session()->get('user_id');
    /*

    if (!$userId) {
        return redirect()->to('/login');
    }
        */

    $otp = $this->request->getPost('otp');

    $userModel = new UserModel();
    $user      = $userModel->find($userId);

    $secret = base64_decode($user['mfa_secret']);

    $mfa = new MfaService();

    if (!$mfa->verifyOtp($secret, $otp)) {
        return redirect()->back()->with('error', 'Invalid code');
    }

    session()->set('mfa_verified', true);

    return redirect()->to('/dashboard');
}


}
