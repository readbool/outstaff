<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Billing;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => \sprintf('test+%s@example.com', fake()->uuid()),
        ]);

        $siteIdentifier = fake()->uuid();

        Site::factory()->count(10)->create([
            'user_id' => $user->getId(),
            'identifier' => $siteIdentifier,
        ]);

        Billing::factory()->count(10)->create([
            'site_identifier' => $siteIdentifier,
        ]);
    }
}
