<?php

namespace App\Commands;

use App\Models\UserModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SetUserPasswords extends BaseCommand
{
    protected $group = 'Custom';
    protected $name = 'users:set-passwords';
    protected $description = 'Sets one hashed password for all existing users.';

    public function run(array $params)
    {
        $password = $params[0] ?? 'admin123';

        $userModel = new UserModel();
        $users = $userModel->findAll();

        foreach ($users as $user) {
            $userModel->update($user['id'], [
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
        }

        CLI::write('Passwords were hashed successfully.', 'green');
        CLI::write('Login password: ' . $password, 'yellow');
    }
}