<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->storeUser(1, 'User Admin', 'admin@fajar.com', 'fajar123');
        $this->storeUser(2, 'User Staff', 'staff@fajar.com', 'fajar123');
    }

    private function storeUser($roleId, $name, $email, $password)
    {
    	$user = new User();
    	$user->role_id = $roleId;
    	$user->name = $name;
    	$user->email = $email;
    	$user->password = Hash::make($password);
    	$user->save();
    }
}
