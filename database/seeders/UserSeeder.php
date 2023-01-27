<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(20)->create();

        \App\Models\User::factory()->create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@admin.com',
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'firstname' => 'Editor',
            'lastname' => 'Editor',
            'email' => 'editor@editor.com',
            'role_id' => 2
        ]);

        \App\Models\User::factory()->create([
            'firstname' => 'Viewer',
            'lastname' => 'Viewer',
            'email' => 'viewer@viewer.com',
            'role_id' => 3
        ]);
    }
}
