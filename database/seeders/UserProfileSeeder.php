<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profiles;
use Illuminate\Support\Facades\Hash;

class UserProfileSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin' => [
                'name' => 'Admin Utama',
                'email' => 'admin@cmsserang.test',
            ],
            'editor' => [
                'name' => 'Editor Satu',
                'email' => 'editor@cmsserang.test',
            ],
            'author' => [
                'name' => 'Penulis Satu',
                'email' => 'author@cmsserang.test',
            ],
            'reader' => [
                'name' => 'Pembaca Satu',
                'email' => 'reader@cmsserang.test',
            ],
        ];

        foreach ($roles as $role => $data) {
            $user = User::create([
                'name' => $data['name'],
                'role' => $role,
                'email' => $data['email'],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);

            Profiles::create([
                'user_id' => $user->id,
                'full_name' => $data['name'],
                'bio' => 'Bio untuk ' . $data['name'],
                'avatar_url' => null,
                'social_links' => json_encode([
                    'facebook' => null,
                    'twitter' => null,
                ]),
            ]);
        }
    }
}
