<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'cpf' => '11122233344',
        'name' => 'João',
        'phone' => '99999999999',
        'birth' => '2000-01-01',
        'gender' => 'M',
        'email' => 'joao@sistema.com',
        'password' => bcrypt('123456'),
      ]);
        // $this->call(UsersTableSeeder::class);
    }
}
