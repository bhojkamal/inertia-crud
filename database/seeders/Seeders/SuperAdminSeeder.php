<?php

namespace Database\Seeders\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

/**
 * Class SuperAdminSeeder
 *
 * @package Database\Seeders\Seeders
 */
class SuperAdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(): void
  {
    if (!User::where('email', 'kamal@admin.com')->exists()) {
      UserFactory::new()->superAdmin()->create();
    }
  }
}