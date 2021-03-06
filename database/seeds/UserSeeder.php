<?php

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
        $users = factory(App\Models\User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token', 'activation_token'])->toArray());
    }
}
