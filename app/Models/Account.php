<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LogicException;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static> withBalance();
 */
class Account extends Model
{
    use HasFactory;
    
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

    #[Scope]
    protected function withBalance(Builder $query): void
    {
        $query
            ->withSum([
                'transactions as total_income' => fn (Builder $query) => 
                    $query->whereHas(
                        'category',
                        fn (Builder $query) =>
                            $query->where('type', 'income')
                    ),
            ], 'amount')
            ->withSum([
                'transactions as total_expense' => fn (Builder $query) =>
                    $query->whereHas(
                        'category',
                        fn (Builder $query) =>
                            $query->where('type', 'expense')
                    ),
            ], 'amount');
    }

    protected function balance(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $attributes = $this->getAttributes();

                if (
                    ! array_key_exists('initial_balance', $attributes) ||
                    ! array_key_exists('total_income', $attributes) ||
                    ! array_key_exists('total_expense', $attributes)
                ) {
                    throw new LogicException(
                        'Balance requires aggregates. '
                        . 'Consult Account using withBalance().'
                    );
                }

                return bcadd(
                    (string) $this->initial_balance,
                    bcsub(
                        (string) ($attributes['total_income'] ?? 0),
                        (string) ($attributes['total_expense'] ?? 0),
                        2
                    ),
                    2
                );
            } 
        );
    }
}
