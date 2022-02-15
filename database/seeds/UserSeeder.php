<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@ace.com',
                'password'=>bcrypt('1111')

            ),
            array(
                'name'=>'Employee',
                'email'=>'employee@ace.com',
                'password'=>bcrypt('1111')

            ),
        );

        DB::table('users')->insert($data);


    }
}