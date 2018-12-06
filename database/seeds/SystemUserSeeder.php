<?php

use Illuminate\Database\Seeder;

class SystemUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=factory(\App\Models\User::class)
            ->times(1)
            ->make()
            ->each(function($user,$index){
                $user->name='admin';
            });
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();
        \App\Models\User::insert($user_array);
    }
}
