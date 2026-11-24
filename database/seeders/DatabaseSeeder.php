<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use RuntimeException;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminEmail = config('biodata.admin_email');
        $adminPassword = config('biodata.admin_password');

        if (! is_string($adminEmail) || ! is_string($adminPassword) || $adminPassword === '') {
            throw new RuntimeException('Set BIODATA_ADMIN_EMAIL and BIODATA_ADMIN_PASSWORD before seeding outside local development.');
        }

        $admin = User::query()->firstOrNew(['email' => $adminEmail]);

        if (! $admin->exists) {
            $admin->name = 'Admin Biodata';
            $admin->password = $adminPassword;
        }

        $admin->is_admin = true;
        $admin->save();

        Profile::query()->firstOrCreate(['id' => 1], Profile::defaults());
    }
}
