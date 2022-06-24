<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->rolesSeeder();
    }

    private function rolesSeeder(): void
    {
        $roles = [
            'Admin',
            'Totem'
        ];
        collect($roles)->each(function ($role) {
            Roles::create([
                'slug' => Str::slug($role),
                'name' => $role
            ]);
        });
    }
}
