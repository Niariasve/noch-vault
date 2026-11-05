<?php

namespace App\Support\Validation;

final class AccountRules
{
    public static function create(): array
    {
        return [
            'name' => 'required|string|max:255',
            'initial_balance' => 'required|numeric|decimal:0,2',
        ];
    }

    public static function update(): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}
