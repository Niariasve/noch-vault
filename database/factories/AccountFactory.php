<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Efectivo',
                'Banco Pichincha',
                'Banco Pacifico',
                'Tarjeta de crédito',
                'Caja chica',
            ]),
            'initial_balance' => fake()->randomFloat(2, 0, 500),
        ];
    }
}
