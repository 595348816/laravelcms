<?php

use Illuminate\Database\Seeder;

class VisaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visa_users=factory(\App\Models\VisaUser::class)
            ->times(5)
            ->make();
        \App\Models\VisaUser::insert($visa_users->makeVisible(['password'])->toArray());
    }
}
