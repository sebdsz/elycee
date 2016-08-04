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

        $json = '{
            "users": {
            "teacher": [
            {
                "username": "Alexandre"
            }
        ],
        "first_class":
                [
                    {
                        "username": "Abel"
                    },
                    {
                        "username": "Al"
                    },
                    {
                        "username": "Alan"
                    },
                    {
                        "username": "Arthur"
                    },
                    {
                        "username": "Carl"
                    },
                    {
                        "username": "Blaise"
                    },
                    {
                        "username": "Isaac"
                    },
                    {
                        "username": "Steve"
                    }
                ],
        "final_class": [
            {
                "username": "Alfred"
            },
            {
                "username": "Brendan"
            },
            {
                "username": "David"
            },
            {
                "username": "George"
            },
            {
                "username": "Jim"
            },
            {
                "username": "Leslie"
            },
            {
                "username": "Maria"
            },
            {
                "username": "Rasmus"
            },
            {
                "username": "Tim"
            }
        ]

    }
}';

        $users = json_decode($json, true);

        foreach ($users as $roles) {
            foreach ($roles as $role => $users) {
                foreach ($users as $user) {

                    switch ($role) {
                        case 'teacher' :
                            App\User::create([
                                'username' => $user['username'],
                                'role' => 'teacher',
                                'password' => \Illuminate\Support\Facades\Hash::make('passpass'),
                            ]);
                            break;
                        case 'first_class' :
                            App\User::create([
                                'username' => $user['username'],
                                'role' => 'first_class',
                                'password' => \Illuminate\Support\Facades\Hash::make('passpass'),
                            ]);
                            break;
                        case 'final_class' :
                            App\User::create([
                                'username' => $user['username'],
                                'role' => 'final_class',
                                'password' => \Illuminate\Support\Facades\Hash::make('passpass'),
                            ]);
                            break;
                    }

                }
            }
        }
    }
}