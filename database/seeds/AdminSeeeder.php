<?php

use Illuminate\Database\Seeder;

class AdminSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'=>'Zakir ahmed',
            'email' => 'ahmedjakir257@gmail.com',
            'password' => bcrypt('Ad009256'),
        ]);
    }
}
