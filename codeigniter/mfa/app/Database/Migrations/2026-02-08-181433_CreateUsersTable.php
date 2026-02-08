<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up(){
    $this->forge->addField([
        'id' => [
            'type' => 'INTEGER',
            'constraint' => 9,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'email' => [
            'type' => 'TEXT',
            'unique' => true,
        ],
        'password' => [
            'type' => 'TEXT',
        ],
        'mfa_secret' => [
            'type' => 'TEXT',
            'null' => true,
        ],
        'mfa_enabled' => [
            'type' => 'INTEGER',
            'default' => 0,
        ],
        'created_at' => [
            'type' => 'DATETIME',
            'default' => 'CURRENT_TIMESTAMP',
        ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('users');
}


    public function down()
    {
        //
    }
}
