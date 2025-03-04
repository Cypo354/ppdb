<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;    


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::firstOrCreate([
            'name' => 'superadmin',
            'display_name' => 'Super Admin'
        ]);

        Role::firstOrCreate([
            'name' => 'operator',
            'display_name' => 'Operator'
        ]);

        Role::firstOrCreate([
            'name' => 'kepala_sekolah',
            'display_name' => 'Kepala Sekolah'
        ]);

        
    }
}
