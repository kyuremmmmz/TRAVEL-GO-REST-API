<?php

namespace Database\Seeders;

use App\Models\roles;
use App\Models\user_roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        roles::create(['name'=>'admin']);
        roles::create(['name'=> 'editor']);
    }
}
