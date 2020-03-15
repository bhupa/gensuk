<?php

use Illuminate\Database\Seeder;

class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= [
            ['name'=>'Gens Uk','email'=>'gensuk@gmail.com','password'=>bcrypt('gens@123')],
            ['name'=>'Gens Uk','email'=>'nijbhup27@gmail.com','password'=>bcrypt('gens@123')],

        ];

        DB::table('users')->insert($users);
    }
}
