<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

  protected $model = User::class;
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'prefix'            => fake()->title(),
      'name'              => fake()->name(),
      'role'              => fake()->randomElement(['admin', 'member', 'vendor']),
      'email'             => fake()->unique()->safeEmail(),
      'email_verified_at' => fake()->boolean() ? now() : null,
      // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
      // password
      'password'          => 'password123',
      'remember_token'    => Str::random(10),
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   */
  public function unverified(): static
  {
    return $this->state(fn(array $attributes) => [
      'email_verified_at' => null,
    ]);
  }
  public function superAdmin(): Factory
  {
    return $this->state(fn(array $attributes) => [
      'prefix'            => 'Mr.',
      'name'              => 'Kamal Kunwar',
      'role'              => 'super_admin',
      'email'             => 'kamal@admin.com',
      'password'          => 'password123',
      'email_verified_at' => now(),
    ]);
  }

}