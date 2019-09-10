<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'Pablo',
            'username'=>'plisken',
        	'email'=>'solorzanopablo81@gmail.com',
        	'password'=>bcrypt('Guayllabamba1509'),
            'admin'=> true
        ]);
    }
}
