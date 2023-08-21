<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('ali123456'),
            'phone' => '1234567890',
            'image' => 'admin.jpg'
        ]);
    }
}
