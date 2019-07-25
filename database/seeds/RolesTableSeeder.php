<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role'=> 'Admin', 'fixed_salary' => '8000000'],
            ['role' =>'HR', 'fixed_salary' => '6500000'],
            ['role' => 'Staff', 'fixed_salary' => '6200000']
        ]);
    }
}
