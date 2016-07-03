<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'username' => 'Niir',
            'email' => 'sebdesquirez@gmail.com',
            'role' => 'teacher',
            'password' => \Illuminate\Support\Facades\Hash::make('passpass'),
        ]);
    }
}