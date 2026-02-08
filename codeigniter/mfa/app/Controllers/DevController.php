<?php

namespace App\Controllers;

use App\Models\UserModel;

class DevController extends BaseController
{
    public function insertUser()
    {
        $userModel = new UserModel();

        $userModel->insert([
            'email' => 'admin@example.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'mfa_enabled' => 0,
        ]);

        return 'User inserted';
    }
}
