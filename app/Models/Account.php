<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    protected $fillable = [
        'name',
        'initial_balance',
    ];

    protected function casts(): array
    {
        return [
            'initial_balance' => 'decimal:2',
        ];
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function balance(): Attribute
    {
        return Attribute::make(
            get: function () {
                $income = $this->transactions()
                    ->whereHas('category', fn ($query) => $query->where('type', 'income')
                    )
                    ->sum('amount');

                $expenses = $this->transactions()
                    ->whereHas('category', fn ($query) => $query->where('type', 'expense')
                    )
                    ->sum('amount');

                return bcadd(
                    (string) $this->initial_balance,
                    bcsub((string) $income, (string) $expenses, 2),
                    2,
                );
            }
        );
    }
}
