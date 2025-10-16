<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $systems = [
            ['name' => 'System B'],
            ['name' => 'System C'],
            ['name' => 'System D'],
            ['name' => 'System E'],
            ['name' => 'System Moragahakanda'],
            ['name' => 'System H'],
            ['name' => 'System Huruluwewa'],
            ['name' => 'System Udawalawa'],
            ['name' => 'System L'],
            ['name' => 'System Rambakenoya'],
        ];
        DB::table('systems')->insert($systems);
    }
}
