<?php

declare(strict_types=1);


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */
final class BillingFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_account_number' => fake()->uuid(),
            'invoice_number' => fake()->uuid(),
            'site_identifier' => fake()->uuid(),
            'billing_start_date' => now(),
            'billing_end_date' => now(),
            'total_amount' => (string) fake()->numberBetween(0, 10000),
            'electricity_usage' => (string) fake()->numberBetween(0, 10000),
        ];
    }
}
