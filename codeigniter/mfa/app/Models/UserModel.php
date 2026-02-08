<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    // REQUIRED: allow fields to be saved
    protected $allowedFields = [
       'email',
    'password',
    'mfa_secret',
    'mfa_enabled',
    'created_at'
    ];

    // SQLite handles timestamps
    protected $useTimestamps = false;

    // Optional: validation
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[6]',
    ];
}
