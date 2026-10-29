<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['name' => 'Efectivo', 'initial_balance' => 250.00],
            ['name' => 'Banco Pichincha', 'initial_balance' => 1500.00],
            ['name' => 'Banco Pacifico', 'initial_balance' => 800.00],
            ['name' => 'Caja chica', 'initial_balance' => 500.00],
        ];

        foreach ($accounts as $account) {
            Account::factory()->create($account);
        }
    }
}
