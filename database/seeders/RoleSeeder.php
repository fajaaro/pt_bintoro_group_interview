<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $this->storeRole('admin');
        $this->storeRole('staff');
    }

    private function storeRole($name)
    {
    	$role = new Role();
    	$role->name = $name;
    	$role->save();
    }
}
