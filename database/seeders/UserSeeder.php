<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'Jorge Bayter',
            'email' => 'doctorbayter@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Jeff Cote',
            'email' => 'hello@jeffcote.me',
            'password' => bcrypt('01020304'),
        ]);
    }
}
