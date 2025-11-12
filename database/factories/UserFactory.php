<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currentTime = now();
        $data = [
            [
                'name' => 'Primary Admin',
                'username' => 'admin',
            ],
            [
                'name' => 'Secondary Admin',
                'username' => 'admin2',
            ]
        ];

        return array_map(function ($user) use ($currentTime) {
            return [
                'name' => $user['name'],
                'username' => $user['username'],
                'password' => static::$password ??= Hash::make('password'),
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ];
        }, $data);
    }
}
