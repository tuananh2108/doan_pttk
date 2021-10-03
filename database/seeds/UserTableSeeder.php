<?php

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
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'contact' => '0123456789',
                'address' => 'Thanh Hóa',
                'role_id' => 1
            ],
            [
                'name' => 'Tuấn Anh',
                'email' => 'tuananh@gmail.com',
                'password' => bcrypt('123456'),
                'contact' => '0329561925',
                'address' => 'Thanh Hóa',
                'role_id' => 2
            ],
            [
                'name' => 'Minh',
                'email' => 'minh@gmail.com',
                'password' => bcrypt('123456'),
                'contact' => '1234567890',
                'address' => 'Thái Bình',
                'role_id' => 2
            ]
        ];
        DB::table('users')->insert($data);
    }
}
