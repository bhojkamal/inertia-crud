<?php

namespace Database\Seeders\Fakers;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserFaker extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    UserFactory::new()->count(rand(10, 15))->create();
  }
}