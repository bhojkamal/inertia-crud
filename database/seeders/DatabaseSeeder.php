<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\UserFactory;
use Database\Seeders\Fakers\UserFaker;
use Database\Seeders\Seeders\SuperAdminSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  protected array $seeders = [
    SuperAdminSeeder::class,
  ];

  protected array $fakers = [
    UserFaker::class,
  ];
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call($this->seeders);
    if (app()->environment() === 'production') {
      return;
    }
    $confirmation = $this->command->confirm(
      'Do you want to run fakers? Fakers create dummy data for the test purpose.'
    );
    if ($confirmation) {
      $this->call($this->fakers);
    }
  }
}