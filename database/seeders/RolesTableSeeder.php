<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $Roles = [
           ['name' => 'Admin'],
           ['name' => 'User'],
           ['name' => 'RPM'],
           ['name'=>'DRPM']
       ];
       DB::table('roles')->insert($Roles);
    }
}
